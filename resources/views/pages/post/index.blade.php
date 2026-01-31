<x-layouts.app :settings="$settings">
  <section class="section" style="padding-top: 150px;">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <!-- <h2>Berita & Artikel</h2> -->
        <p>Informasi terbaru seputar kesehatan dan kegiatan rumah sakit</p>
      </div>

      <div class="row gy-4">
        @forelse($posts as $post)
          <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0">
              @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
              @endif
              <div class="card-body">
                <span class="badge bg-primary mb-2">{{ $post->category ?? 'Berita' }}</span>
                <h5 class="card-title fw-bold"><a href="{{ route('post.show', $post->slug) }}" class="text-decoration-none text-dark">{{ $post->title }}</a></h5>
                <p class="card-text text-muted small">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                <a href="{{ route('post.show', $post->slug) }}" class="btn btn-outline-primary btn-sm mt-2">Baca Selengkapnya</a>
              </div>
              <div class="card-footer bg-white border-0 text-muted small">
                <i class="bi bi-calendar"></i> {{ $post->created_at->format('d M Y') }}
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-center py-5">
            <div class="empty-state mb-4">
               <i class="bi bi-newspaper display-1 text-muted" style="font-size: 5rem; opacity: 0.2;"></i>
            </div>
            <h4 class="fw-bold text-secondary mb-2">Belum ada Berita</h4>
            <p class="text-muted">Saat ini belum ada berita atau artikel yang tersedia. <br>Nantikan informasi terbaru dari kami.</p>
          </div>
        @endforelse
      </div>

      <div class="mt-5 d-flex justify-content-center">
        {{ $posts->links() }}
      </div>

    </div>
  </section>
</x-layouts.app>
