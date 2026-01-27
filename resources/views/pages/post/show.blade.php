<x-layouts.app :settings="$settings">
  <section class="section" style="padding-top: 150px;">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <article class="blog-details">
            @if($post->image)
              <div class="post-img mb-4">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid rounded shadow-sm w-100">
              </div>
            @endif

            <h1 class="title fw-bold mb-3">{{ $post->title }}</h1>

            <div class="meta-top mb-4 d-flex align-items-center text-muted">
              <span class="d-flex align-items-center me-4"><i class="bi bi-person me-2"></i> Admin</span>
              <span class="d-flex align-items-center me-4"><i class="bi bi-clock me-2"></i> <time datetime="{{ $post->created_at }}">{{ $post->created_at->format('d M Y') }}</time></span>
              <span class="d-flex align-items-center"><i class="bi bi-folder me-2"></i> {{ $post->category ?? 'Umum' }}</span>
            </div>

            <div class="content lh-lg">
              {!! $post->content !!}
            </div>

            <div class="mt-5">
                <a href="{{ route('post.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali ke Berita</a>
            </div>

          </article>
        </div>
      </div>
    </div>
  </section>
</x-layouts.app>
