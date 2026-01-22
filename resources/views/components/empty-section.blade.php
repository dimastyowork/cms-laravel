@props(['title' => 'Bagian ini belum memiliki konten', 'subtitle' => 'Data akan ditampilkan segera setelah tersedia', 'icon' => 'bi bi-inbox', 'fullHeight' => false])

<div class="empty-section-container {{ $fullHeight ? 'full-height' : '' }}">
  <div class="empty-section-content">
    <div class="empty-section-icon">
      <i class="{{ $icon }}"></i>
    </div>
    <h4 class="empty-section-title">{{ $title }}</h4>
    <p class="empty-section-subtitle">{{ $subtitle }}</p>
  </div>
</div>

<style>
  .empty-section-container {
    width: 100%;
    padding: 2.5rem 1rem;
    text-align: center;
  }

  .empty-section-container.full-height {
    min-height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .empty-section-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75rem;
  }

  .empty-section-icon {
    font-size: 2.5rem;
    color: #d0d5dd;
    margin-bottom: 0.5rem;
    animation: float 3s ease-in-out infinite;
  }

  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
  }

  .empty-section-title {
    font-size: 1rem;
    font-weight: 600;
    color: #6b7280;
    margin: 0;
  }

  .empty-section-subtitle {
    font-size: 0.9rem;
    color: #9ca3af;
    margin: 0.25rem 0 0 0;
  }

  @media (max-width: 768px) {
    .empty-section-container {
      padding: 1.5rem 0.75rem;
    }

    .empty-section-icon {
      font-size: 2rem;
    }

    .empty-section-title {
      font-size: 0.95rem;
    }

    .empty-section-subtitle {
      font-size: 0.85rem;
    }

    .empty-section-container.full-height {
      min-height: 300px;
    }
  }
</style>
