@props(['title' => 'Data belum tersedia', 'subtitle' => 'Silakan cek kembali nanti', 'icon' => 'bi bi-inbox'])

<div class="empty-state-wrapper">
  <div class="empty-state-content">
    <div class="empty-state-icon">
      <i class="{{ $icon }}"></i>
    </div>
    <h4 class="empty-state-title">{{ $title }}</h4>
    <p class="empty-state-subtitle">{{ $subtitle }}</p>
  </div>
</div>

<style>
  .empty-state-wrapper {
    width: 100%;
    padding: 3rem 1rem;
    text-align: center;
  }

  .empty-state-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1rem;
  }

  .empty-state-icon {
    font-size: 3rem;
    color: #d0d5dd;
    margin-bottom: 0.5rem;
  }

  .empty-state-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #6b7280;
    margin: 0;
  }

  .empty-state-subtitle {
    font-size: 0.95rem;
    color: #9ca3af;
    margin: 0.5rem 0 0 0;
  }

  @media (max-width: 768px) {
    .empty-state-wrapper {
      padding: 2rem 0.75rem;
    }

    .empty-state-icon {
      font-size: 2.5rem;
    }

    .empty-state-title {
      font-size: 1rem;
    }

    .empty-state-subtitle {
      font-size: 0.9rem;
    }
  }
</style>
