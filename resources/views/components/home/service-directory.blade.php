@props(['services'])

<section id="service-directory" class="service-directory section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Direktori Pelayanan</h2>
        <p>Daftar lengkap layanan kesehatan yang tersedia di RS Asa Bunda</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-start">
            @php
                $categoryOrder = [
                    'Pelayanan Medis',
                    'Pelayanan Klinik',
                    'Pelayanan Perawatan',
                    'Pelayanan Penunjang Medis',
                    'Homecare'
                ];
                
                $grouped = $services->groupBy('category');
                $finalGroups = [];

                // Masukkan kategori yang sudah ditentukan urutannya
                foreach ($categoryOrder as $cat) {
                    if ($grouped->has($cat)) {
                        $finalGroups[$cat] = $grouped->get($cat)->sortBy('sort_order');
                    }
                }

                // Masukkan kategori tambahan yang mungkin ada di database tapi tidak ada di list urutan
                foreach ($grouped as $cat => $items) {
                    if (!isset($finalGroups[$cat])) {
                        $finalGroups[$cat] = $items->sortBy('sort_order');
                    }
                }
            @endphp

            @foreach($finalGroups as $category => $items)
                @php $catId = Str::slug($category); @endphp
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="directory-card modern-card">
                        <div class="directory-header collapsed" 
                             role="button" 
                             data-bs-toggle="collapse" 
                             data-bs-target="#collapse-{{ $catId }}" 
                             aria-expanded="false" 
                             aria-controls="collapse-{{ $catId }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="category-title">{{ $category }}</h3>
                                <i class="bi bi-chevron-down toggle-icon"></i>
                            </div>
                            <div class="title-accent"></div>
                        </div>
                        <div class="collapse" id="collapse-{{ $catId }}">
                            <ul class="directory-list mt-3">
                                @foreach($items as $item)
                                    <li class="directory-item">
                                        <div class="item-content">
                                            <div class="item-main">
                                                @if($item->link)
                                                    <a href="{{ $item->link }}" class="item-title">{{ $item->title }}</a>
                                                @else
                                                    <span class="item-title">{{ $item->title }}</span>
                                                @endif
                                                @if($item->description)
                                                    <p class="item-description">{{ $item->description }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .service-directory {
        padding: 60px 0;
        background-color: #f8fbff;
    }

    .directory-card {
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(0,0,0,0.03);
    }

    .directory-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .directory-header {
        margin-bottom: 0;
        position: relative;
    }

    .directory-header[role="button"] {
        cursor: pointer;
    }

    .directory-header[role="button"] .toggle-icon {
        transition: transform 0.3s ease;
        color: #3fbbc0;
        font-size: 1.2rem;
    }

    .directory-header[role="button"]:not(.collapsed) .toggle-icon {
        transform: rotate(180deg);
    }

    .category-title {
        font-size: 18px;
        font-weight: 700;
        color: #2c4964;
        margin: 0;
    }

    .title-accent {
        width: 40px;
        height: 3px;
        background: #3fbbc0;
        margin-top: 10px;
        border-radius: 2px;
    }

    .directory-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .directory-item {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px dashed #eee;
    }

    .directory-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .item-title {
        display: block;
        font-size: 16px;
        font-weight: 600;
        color: #3fbbc0;
        text-decoration: none;
        margin-bottom: 5px;
        transition: color 0.2s;
    }

    a.item-title:hover {
        color: #2c4964;
    }

    .item-description {
        font-size: 13px;
        color: #777;
        margin: 0;
        line-height: 1.5;
    }

    .modern-card {
        border-radius: 12px;
        overflow: hidden;
    }
</style>
