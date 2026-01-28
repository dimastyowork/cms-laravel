<x-layouts.app :settings="$settings">
  <section class="section" style="padding-top: 150px;">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <article class="blog-details">
            <style>
              .blog-details .header-content .badge { padding: 8px 15px; border-radius: 50px; font-weight: 600; letter-spacing: 0.5px; }
              .blog-details .post-img .image-wrapper { position: relative; border-radius: 24px; transition: transform 0.3s ease; }
              .blog-details .content img { max-width: 100% !important; height: auto !important; border-radius: 16px; box-shadow: 0 10px 20px rgba(0,0,0,0.05); margin: 30px auto; display: block; }
              .blog-details .content p { margin-bottom: 25px; line-height: 1.8; }
              
              /* Table Styling */
              .blog-details .content table { width: 100%; border-collapse: collapse; margin: 30px 0; border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden; }
              .blog-details .content table th { background-color: #f9fafb; font-weight: 700; color: #111827; text-align: left; padding: 15px; border: 1px solid #e5e7eb; }
              .blog-details .content table td { padding: 15px; border: 1px solid #e5e7eb; color: #4b5563; }
              .blog-details .content table tr:nth-child(even) { background-color: #f3f4f6; }
              .blog-details .content table tr:hover { background-color: #eff6ff; }
            </style>

            <div class="header-content mb-4 text-center">
              <span class="badge bg-primary mb-3 text-uppercase shadow-sm">{{ $post->category ?? 'Berita' }}</span>
              <h1 class="title fw-bold mb-4 display-5 text-dark">{{ $post->title }}</h1>
              
              <div class="meta-top d-flex align-items-center justify-content-center text-muted small">
                <span class="d-flex align-items-center mx-3"><i class="bi bi-person-circle me-2 text-primary"></i> Admin</span>
                <span class="d-flex align-items-center mx-3"><i class="bi bi-calendar3 me-2 text-primary"></i> <time datetime="{{ $post->created_at }}">{{ $post->created_at->format('d M Y') }}</time></span>
                <span class="d-flex align-items-center mx-3"><i class="bi bi-tag-fill me-2 text-primary"></i> {{ $post->category ?? 'Umum' }}</span>
              </div>
            </div>

            @if($post->image)
              <div class="post-img mb-5">
                <div class="image-wrapper shadow-lg overflow-hidden">
                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid w-100" style="max-height: 500px; object-fit: cover; object-position: center;">
                </div>
              </div>
            @endif

            <div class="content text-dark">
              {!! $post->content !!}
            </div>

            <div class="mt-5 pt-4 border-top">
                <a href="{{ route('post.index') }}" class="btn btn-primary rounded-pill px-4"><i class="bi bi-arrow-left me-2"></i> Kembali ke Berita</a>
            </div>

          </article>
        </div>
      </div>
    </div>
  </section>
</x-layouts.app>
