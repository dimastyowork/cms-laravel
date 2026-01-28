(function() {
    'use strict';
    
    let initialized = false;
    let editorInstances = new Map();
    
    function initImageResize() {
        if (initialized) return;
        
        const observer = new MutationObserver(() => {
            findAndSetupEditors();
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
        
        findAndSetupEditors();
        initialized = true;
    }
    
    function findAndSetupEditors() {
        const editors = document.querySelectorAll('.tiptap, .ProseMirror');
        
        editors.forEach(editorEl => {
            if (editorInstances.has(editorEl)) return;
            
            const editorInstance = findTipTapInstance(editorEl);
            if (editorInstance) {
                editorInstances.set(editorEl, editorInstance);
            }
            
            editorEl.addEventListener('click', handleImageClick);
        });
    }
    
    function findTipTapInstance(element) {
        
        for (let key in element) {
            if (key.startsWith('__vue') || key.startsWith('__reactProps')) {
                const props = element[key];
                if (props && props.editor) return props.editor;
            }
        }
        
        let current = element;
        while (current) {
            if (current._x_dataStack) {
                for (let data of current._x_dataStack) {
                    if (data.editor || data.state?.editor) {
                        return data.editor || data.state.editor;
                    }
                }
            }
            current = current.parentElement;
        }
        
        return null;
    }
    
    function handleImageClick(e) {
        if (e.target.tagName !== 'IMG') return;
        
        const img = e.target;
        const editorEl = img.closest('.tiptap, .ProseMirror');
        
        if (!editorEl) return;
        
        e.preventDefault();
        e.stopPropagation();
        
        const editorInstance = editorInstances.get(editorEl);
        showImageMenu(img, editorEl, editorInstance);
    }
    
    function showImageMenu(img, editorEl, editorInstance) {
        const existing = document.querySelector('.img-resize-menu');
        if (existing) existing.remove();
        
        const menu = document.createElement('div');
        menu.className = 'img-resize-menu';
        menu.style.cssText = `
            position: fixed !important; background: #ffffff !important;
            border: 1px solid #e5e7eb !important; border-radius: 8px !important;
            padding: 16px !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
            z-index: 999999 !important; min-width: 220px !important;
        `;
        
        menu.innerHTML = `
            <style>
                .img-resize-menu * { box-sizing: border-box; }
                .img-resize-menu button {
                    width: 100%; padding: 10px 14px; border: 1px solid #e5e7eb;
                    border-radius: 6px; background: #ffffff; cursor: pointer;
                    text-align: left; font-size: 14px; font-weight: 500;
                    color: #374151; transition: all 0.15s; margin-bottom: 6px;
                }
                .img-resize-menu button:hover { background: #f3f4f6; border-color: #d1d5db; }
                .img-resize-menu button.delete {
                    border-color: #fecaca; background: #fef2f2;
                    color: #dc2626; margin-top: 8px;
                }
                .img-resize-menu button.delete:hover { background: #fee2e2; border-color: #fca5a5; }
                .img-resize-menu hr { margin: 10px 0; border: none; border-top: 1px solid #e5e7eb; }
                .img-resize-menu .menu-title {
                    font-weight: 600; font-size: 14px; color: #111827;
                    margin-bottom: 12px; padding-bottom: 8px; border-bottom: 1px solid #e5e7eb;
                }
            </style>
            <div class="menu-title">Ukuran Gambar</div>
            <button data-size="25%">Kecil (25%)</button>
            <button data-size="50%">Sedang (50%)</button>
            <button data-size="75%">Besar (75%)</button>
            <button data-size="100%">Penuh (100%)</button>
            <hr>
            <button data-size="300px">300 pixel</button>
            <button data-size="500px">500 pixel</button>
            <button data-size="700px">700 pixel</button>
            <hr>
            <button class="delete" data-action="delete">Hapus Gambar</button>
        `;
        
        const rect = img.getBoundingClientRect();
        let top = rect.bottom + window.scrollY + 10;
        let left = rect.left + window.scrollX;
        
        document.body.appendChild(menu);
        const menuRect = menu.getBoundingClientRect();
        
        if (menuRect.right > window.innerWidth - 20) left = window.innerWidth - menuRect.width - 20;
        if (menuRect.bottom > window.innerHeight - 20) top = rect.top + window.scrollY - menuRect.height - 10;
        if (left < 20) left = 20;
        if (top < 20) top = 20;
        
        menu.style.top = top + 'px';
        menu.style.left = left + 'px';
        
        menu.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                
                const size = this.dataset.size;
                const action = this.dataset.action;
                
                if (action === 'delete') {
                    if (confirm('Hapus gambar ini?')) {
                        if (editorInstance && editorInstance.commands) {
                            editorInstance.commands.deleteSelection();
                        } else {
                            img.remove();
                        }
                        menu.remove();
                        showNotification('Gambar berhasil dihapus');
                    }
                } else if (size) {
                    resizeImage(img, size, editorEl, editorInstance);
                    menu.remove();
                    showNotification('Ukuran gambar diubah ke ' + size);
                }
            });
        });
        
        setTimeout(() => {
            document.addEventListener('click', function closeMenu(e) {
                if (!menu.contains(e.target) && e.target !== img) {
                    menu.remove();
                    document.removeEventListener('click', closeMenu);
                }
            });
        }, 100);
    }
    
    function resizeImage(img, size, editorEl, editorInstance) {
        const src = img.getAttribute('src');
        const alt = img.getAttribute('alt') || '';
        const dataId = img.getAttribute('data-id') || '';
        
        const newStyle = `width: ${size}; max-width: 100%; height: auto;`;
        
        if (editorInstance && editorInstance.commands) {
            try {
                const { from } = editorInstance.state.selection;
                
                editorInstance.chain()
                    .focus()
                    .updateAttributes('image', {
                        src: src,
                        alt: alt,
                        'data-id': dataId,
                        style: newStyle
                    })
                    .run();
                    
            } catch (e) {
                replaceImageHTML(img, src, alt, dataId, size, editorEl);
            }
        } else {
            replaceImageHTML(img, src, alt, dataId, size, editorEl);
        }
    }
    
    function replaceImageHTML(img, src, alt, dataId, size, editorEl) {
        const parent = img.closest('p');
        
        const newStyle = `width: ${size}; max-width: 100%; height: auto;`;
        const newImgHTML = `<img src="${src}" alt="${alt}" ${dataId ? `data-id="${dataId}"` : ''} style="${newStyle}">`;
        
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = newImgHTML;
        const newImg = tempDiv.firstChild;
        
        img.replaceWith(newImg);
        
        setTimeout(() => {
            const content = editorEl.innerHTML;
            
            ['input', 'change'].forEach(eventType => {
                editorEl.dispatchEvent(new Event(eventType, { bubbles: true }));
            });
            
            const wireComponent = editorEl.closest('[wire\\:id]');
            if (wireComponent && window.Livewire) {
                const wireId = wireComponent.getAttribute('wire:id');
                try {
                    const component = window.Livewire.find(wireId);
                    if (component) {
                        if (typeof component.set === 'function') {
                            component.set('data.content', content);
                        }
                        else if (typeof component.call === 'function') {
                            component.call('$set', 'data.content', content);
                        }
                        else if (component.data && component.data.content !== undefined) {
                            component.data.content = content;
                            if (typeof component.$wire?.commit === 'function') {
                                component.$wire.commit();
                            }
                        }
                    }
                } catch (e) {
                }
            }
        }, 100);
    }
    
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed !important; top: 20px !important; right: 20px !important;
            background: #ffffff !important; color: #111827 !important;
            padding: 14px 20px !important; border-radius: 6px !important;
            border: 1px solid #e5e7eb !important;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1) !important;
            z-index: 9999999 !important; font-size: 14px !important; font-weight: 500 !important;
        `;
        
        notification.textContent = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 0.3s';
            setTimeout(() => notification.remove(), 300);
        }, 2000);
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initImageResize);
    } else {
        initImageResize();
    }
    
})();
