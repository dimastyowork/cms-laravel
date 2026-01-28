// Image Resize Handler untuk Filament RichEditor
document.addEventListener('DOMContentLoaded', function () {
    // Fungsi untuk menambahkan kontrol resize pada gambar
    function addImageControls() {
        const richEditors = document.querySelectorAll('.filament-rich-editor');

        richEditors.forEach(editor => {
            const images = editor.querySelectorAll('img');

            images.forEach(img => {
                // Skip jika sudah ada wrapper
                if (img.parentElement.classList.contains('image-wrapper')) {
                    return;
                }

                // Buat wrapper
                const wrapper = document.createElement('div');
                wrapper.className = 'image-wrapper';
                wrapper.style.width = img.width ? `${img.width}px` : 'auto';

                // Wrap gambar
                img.parentNode.insertBefore(wrapper, img);
                wrapper.appendChild(img);

                // Tambahkan menu kontrol
                addImageMenu(wrapper, img);

                // Tambahkan event click untuk resize
                img.addEventListener('click', function (e) {
                    e.preventDefault();
                    showImageSizeMenu(img);
                });
            });
        });
    }

    // Fungsi untuk menampilkan menu ukuran gambar
    function showImageSizeMenu(img) {
        // Hapus menu yang sudah ada
        const existingMenu = document.querySelector('.image-size-menu');
        if (existingMenu) {
            existingMenu.remove();
        }

        // Buat menu baru
        const menu = document.createElement('div');
        menu.className = 'image-size-menu';
        menu.style.cssText = `
            position: absolute;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            padding: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            gap: 0.5rem;
        `;

        // Tombol ukuran
        const sizes = [{
                label: '25%',
                value: 'small'
            },
            {
                label: '50%',
                value: 'medium'
            },
            {
                label: '75%',
                value: 'large'
            },
            {
                label: '100%',
                value: 'full'
            }
        ];

        sizes.forEach(size => {
            const btn = document.createElement('button');
            btn.textContent = size.label;
            btn.className = 'px-3 py-1 text-sm rounded hover:bg-gray-100 transition';
            btn.style.cssText = `
                padding: 0.25rem 0.75rem;
                font-size: 0.875rem;
                border-radius: 0.375rem;
                border: 1px solid #e5e7eb;
                background: ${img.dataset.size === size.value ? '#3b82f6' : 'white'};
                color: ${img.dataset.size === size.value ? 'white' : '#374151'};
                cursor: pointer;
            `;

            btn.addEventListener('click', function (e) {
                e.stopPropagation();
                img.dataset.size = size.value;
                menu.remove();
            });

            menu.appendChild(btn);
        });

        // Posisikan menu
        const rect = img.getBoundingClientRect();
        menu.style.top = `${rect.bottom + window.scrollY + 5}px`;
        menu.style.left = `${rect.left + window.scrollX}px`;

        document.body.appendChild(menu);

        // Hapus menu saat klik di luar
        setTimeout(() => {
            document.addEventListener('click', function closeMenu(e) {
                if (!menu.contains(e.target) && e.target !== img) {
                    menu.remove();
                    document.removeEventListener('click', closeMenu);
                }
            });
        }, 100);
    }

    // Fungsi untuk menambahkan menu pada gambar
    function addImageMenu(wrapper, img) {
        // Set default size jika belum ada
        if (!img.dataset.size) {
            img.dataset.size = 'full';
        }
    }

    // Jalankan saat halaman load
    addImageControls();

    // Jalankan ulang saat ada perubahan di editor (untuk gambar baru)
    const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            if (mutation.addedNodes.length) {
                addImageControls();
            }
        });
    });

    // Observe semua rich editor
    const richEditors = document.querySelectorAll('.filament-rich-editor');
    richEditors.forEach(editor => {
        observer.observe(editor, {
            childList: true,
            subtree: true
        });
    });
});
