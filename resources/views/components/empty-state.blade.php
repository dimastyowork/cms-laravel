@props([
    'title' => 'Data belum tersedia',
    'subtitle' => 'Mohon maaf, sepertinya belum ada informasi yang bisa kami tampilkan saat ini.',
    'icon' => 'bi bi-folder2-open'
])

<div class="empty-state-wrapper" data-aos="fade-up">
    <div class="empty-state-content">
        <div class="empty-state-icon-wrapper">
            <i class="{{ $icon }}"></i>
        </div>
        <h3 class="empty-state-title">{{ $title }}</h3>
        <p class="empty-state-subtitle">{{ $subtitle }}</p>
    </div>
</div>

<style>
    .empty-state-wrapper {
        width: 100%;
        padding: 4rem 1.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f9fafb; /* Light gray background/subtle card feel */
        border-radius: 12px;
        margin: 2rem 0;
        border: 1px dashed #e5e7eb;
    }

    .empty-state-content {
        max-width: 400px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .empty-state-icon-wrapper {
        width: 80px;
        height: 80px;
        background: #eff6ff; /* Light blueish tint */
        color: #3b82f6; /* Primary blue */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease;
    }

    .empty-state-wrapper:hover .empty-state-icon-wrapper {
        transform: scale(1.05);
    }

    .empty-state-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .empty-state-subtitle {
        font-size: 1rem;
        color: #6b7280;
        line-height: 1.6;
        margin: 0;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .empty-state-wrapper {
            padding: 3rem 1rem;
        }

        .empty-state-icon-wrapper {
            width: 64px;
            height: 64px;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .empty-state-title {
            font-size: 1.1rem;
        }
    }
</style>
