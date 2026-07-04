<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Artikel - Jabar Berdampak</title>
  @vite(['resources/css/base.css', 'resources/css/navbar.css', 'resources/css/hero.css', 'resources/css/footer.css', 'resources/css/modal.css', 'resources/css/filter.css', 'resources/js/navbar.js', 'resources/js/carousel.js', 'resources/js/modal.js', 'resources/js/filter.js'])
  <style>
    /* CSS Khusus Detail Artikel */
    .article-container {
      max-width: 800px;
      margin: var(--spacing-xl) auto;
      background: var(--bg-white);
      padding: var(--spacing-xl);
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    .article-meta {
      display: flex;
      align-items: center;
      gap: 15px;
      margin-bottom: 20px;
    }
    .article-category {
      background: var(--primary-gold);
      color: var(--primary-green);
      padding: 4px 16px;
      border-radius: 50px;
      font-weight: 700;
      font-size: 0.85rem;
      text-transform: uppercase;
    }
    .article-date {
      color: var(--text-muted);
      font-size: 0.9rem;
    }
    .article-title {
      font-size: 3rem;
      color: var(--primary-green);
      line-height: 1.2;
      margin-bottom: 20px;
      letter-spacing: -1px;
    }
    .article-author {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 1px solid var(--bg-light);
    }
    .author-img {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      object-fit: cover;
    }
    .author-info h4 {
      margin: 0;
      font-size: 1rem;
      color: var(--text-dark);
    }
    .author-info p {
      margin: 0;
      font-size: 0.85rem;
      color: var(--text-muted);
    }
    
    .article-cover {
      width: 100%;
      height: auto;
      max-height: 450px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 40px;
    }
    
    .article-content {
      font-size: 1.15rem;
      line-height: 1.9;
      color: var(--text-dark);
    }
    .article-content p {
      margin-bottom: 20px;
    }
    .article-content h2, .article-content h3 {
      color: var(--primary-green);
      margin-top: 40px;
      margin-bottom: 15px;
    }
    .article-content blockquote {
      border-left: 5px solid var(--primary-gold);
      padding-left: 20px;
      margin: 30px 0;
      font-size: 1.3rem;
      font-style: italic;
      color: var(--primary-green);
    }
    
    @media (max-width: 768px) {
      .article-container {
        padding: var(--spacing-lg);
        margin: var(--spacing-md) auto;
      }
      .article-title {
        font-size: 2.2rem;
      }
      .article-content {
        font-size: 1.05rem;
      }
    }
  </style>
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('assets/logo-jaber.png') }}">
</head>
<body>

  <!-- Navbar -->
  <header class="sticky-header">
    <div class="container">
      <nav class="navbar">
        <div class="logo">Jabar Berdampak</div>
        <button class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <ul class="nav-links">
          <li><a href="{{ url('/') }}">Beranda</a></li>
          <li><a href="{{ url('/program-kegiatan') }}">Program & Aktivitas</a></li>
          <li><a href="{{ url('/berita-artikel') }}" class="active">Artikel</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container">
    <article class="article-container">
      <div class="article-meta">
        <span class="article-category">{{ $artikel->kategori }}</span>
        <span class="article-date">{{ $artikel->tanggal_publish ? $artikel->tanggal_publish->format('d M Y') : '-' }}</span>
      </div>
      
      <h1 class="article-title">{{ $artikel->judul }}</h1>
      
      <div class="article-author">
        <img src="https://ui-avatars.com/api/?name={{ urlencode($artikel->penulis) }}&background=0E3B21&color=fff" alt="Penulis" class="author-img">
        <div class="author-info">
          <h4>{{ $artikel->penulis }}</h4>
          <p>Penulis Kontributor</p>
        </div>
      </div>

      <img src="{{ $artikel->gambar ? asset('storage/' . $artikel->gambar) : 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80' }}" alt="Cover Artikel" class="article-cover">

      <div class="article-content">
        {!! $artikel->konten !!}
        
        <!-- Share Widget -->
        <div class="share-widget" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid var(--bg-light); display: flex; flex-wrap: wrap; align-items: center; gap: 16px;">
          <strong style="color: var(--text-dark);">Bagikan:</strong>
          <button onclick="window.copyLinkToClipboard(window.location.href)" class="share-btn copy-link" style="background: var(--bg-light); color: var(--text-dark); padding: 8px 16px; border: 1px solid #ddd; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg> Salin Tautan</button>
          <a href="https://api.whatsapp.com/send?text={{ urlencode($artikel->judul . ' - ' . url()->current()) }}" target="_blank" class="share-btn whatsapp" style="background: #25D366; color: white; padding: 8px 16px; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> WhatsApp</a>
          <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($artikel->judul) }}" target="_blank" class="share-btn twitter" style="background: #000000; color: white; padding: 8px 16px; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg> X (Twitter)</a>
          <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="share-btn facebook" style="background: #1877F2; color: white; padding: 8px 16px; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> Facebook</a>
          <a href="https://www.instagram.com/" target="_blank" class="share-btn instagram" style="background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); color: white; padding: 8px 16px; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> Instagram</a>
        </div>

      @php
        $relatedArticles = \App\Models\Artikel::where('status', 'Published')
                              ->where('id', '!=', $artikel->id)
                              ->where('kategori', $artikel->kategori)
                              ->latest()
                              ->take(3)
                              ->get();
        
        if($relatedArticles->count() < 3) {
            $more = \App\Models\Artikel::where('status', 'Published')
                              ->where('id', '!=', $artikel->id)
                              ->whereNotIn('id', $relatedArticles->pluck('id'))
                              ->latest()
                              ->take(3 - $relatedArticles->count())
                              ->get();
            $relatedArticles = $relatedArticles->merge($more);
        }
      @endphp
      
      @if($relatedArticles->count() > 0)
      <div class="related-articles" style="margin-top: 50px; padding-top: 40px; border-top: 2px solid var(--bg-light);">
        <h3 style="color: var(--primary-green); margin-bottom: 20px; font-size: 1.5rem;">Artikel Terkait</h3>
        
        <div style="position: relative; margin: 0 -10px; padding: 0 10px;">
            <button class="carousel-btn prev-btn related-prev" aria-label="Previous" style="position: absolute; left: -20px; top: 50%; transform: translateY(-50%); z-index: 10; width: 40px; height: 40px; border-radius: 50%; background: var(--primary-green); color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            
            <div class="related-track" style="display: flex; gap: 20px; overflow-x: auto; scroll-snap-type: x mandatory; scrollbar-width: none; padding-bottom: 20px;">
              <style>.related-track::-webkit-scrollbar { display: none; }</style>
              @foreach($relatedArticles as $related)
              <a href="{{ url('/detail-artikel', $related->slug) }}" style="flex: 0 0 clamp(260px, 45%, 320px); scroll-snap-align: start; display: block; background: var(--bg-white); border: 1px solid #e8eee8; border-radius: 12px; overflow: hidden; transition: transform 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.03);" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="{{ $related->gambar ? asset('storage/' . $related->gambar) : 'https://images.unsplash.com/photo-1618477461853-cf6ed80fbfc9?auto=format&fit=crop&q=80&w=400' }}" alt="{{ $related->judul }}" style="width: 100%; height: 160px; object-fit: cover;">
                <div style="padding: 20px;">
                  <span style="color: var(--accent-green); font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">{{ $related->kategori }}</span>
                  <h4 style="margin: 8px 0 0; font-size: 1.1rem; color: var(--text-dark); line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $related->judul }}</h4>
                </div>
              </a>
              @endforeach
            </div>
            
            <button class="carousel-btn next-btn related-next" aria-label="Next" style="position: absolute; right: -20px; top: 50%; transform: translateY(-50%); z-index: 10; width: 40px; height: 40px; border-radius: 50%; background: var(--primary-green); color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const track = document.querySelector('.related-track');
                const btnPrev = document.querySelector('.related-prev');
                const btnNext = document.querySelector('.related-next');
                
                if(track && btnPrev && btnNext) {
                    btnNext.addEventListener('click', () => {
                        const cardWidth = track.querySelector('a').offsetWidth + 20;
                        track.scrollBy({ left: cardWidth, behavior: 'smooth' });
                    });
                    btnPrev.addEventListener('click', () => {
                        const cardWidth = track.querySelector('a').offsetWidth + 20;
                        track.scrollBy({ left: -cardWidth, behavior: 'smooth' });
                    });
                }
            });
        </script>
      </div>
      @endif
        
        <div style="margin-top: 40px; text-align: center;">
            <a href="{{ url('/berita-artikel') }}" class="btn btn-outline-green">&larr; Kembali ke Daftar Artikel</a>
        </div>
      </div>
    </article>
  </main>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-grid">
        <div>
          <img src="{{ asset('assets/logo-jaber.png') }}" alt="Logo Jabar Berdampak" class="footer-logo-img" style="max-width: 180px; height: auto; margin-bottom: 15px;">
          <p>Membangun masa depan yang berkelanjutan, satu komunitas pada satu waktu. Bergabunglah dalam perjalanan kami menuju bumi yang lebih hijau.</p>
        </div>
        <div class="footer-links">
          <h4>Tautan Cepat</h4>
          <ul>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/program-kegiatan') }}">Program</a></li>
            <li><a href="{{ url('/berita-artikel') }}">Artikel</a></li>
            <li><a href="#">Kontak Kami</a></li>
          </ul>
        </div>
        <div class="footer-links">
          <h4>Media Sosial</h4>
          <ul class="social-icons">
            <li><a href="#"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> Instagram</a></li>
            <li><a href="#"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> Facebook</a></li>
            <li><a href="#"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg> Twitter (X)</a></li>
            <li><a href="#"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg> LinkedIn</a></li>
          </ul>
        </div>
        <div class="footer-links">
          <h4>Lokasi</h4>
          <p>Jawa Barat, Indonesia</p>
          <p>Email: jawabaratberdampak@gmail.com</p>
          <p>Telepon: 085719305028</p>
        </div>
      </div>
      <div class="footer-bottom">
        &copy; <span id="currentYear">2024</span> Jabar Berdampak. All rights reserved.
      </div>
    </div>
  </footer>
  <script type="module" src="./main.js"></script>
</body>
</html>
