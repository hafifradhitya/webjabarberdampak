<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Artikel Edukasi - Jabar Berdampak</title>
  <meta name="description" content="Baca artikel terbaru dari Jabar Berdampak tentang lingkungan, pendidikan, dan aksi kepemudaan." />
  @vite(['resources/css/base.css', 'resources/css/navbar.css', 'resources/css/hero.css', 'resources/css/footer.css', 'resources/css/modal.css', 'resources/css/filter.css', 'resources/js/navbar.js', 'resources/js/carousel.js', 'resources/js/modal.js', 'resources/js/filter.js'])
  <style>
    .page-header {
      background: var(--primary-green);
      color: var(--text-light);
      text-align: center;
      padding: var(--spacing-xl) 0;
      margin-bottom: var(--spacing-xl);
    }
    
    .page-header h1 {
      color: var(--text-light);
      font-size: 2.5rem;
      margin-bottom: 16px;
    }

    .article-layout {
      display: block;
      margin-bottom: var(--spacing-xl);
    }

    /* Featured Article */
    .featured-article {
      background: var(--bg-white);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      margin-bottom: var(--spacing-lg);
    }
    
    .featured-img {
      width: 100%;
      height: 350px;
      object-fit: cover;
    }

    .featured-content {
      padding: var(--spacing-lg);
    }

    .article-meta {
      display: flex;
      gap: 16px;
      color: var(--text-muted);
      font-size: 0.9rem;
      margin-bottom: 12px;
    }
    
    .article-meta span {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .featured-title {
      font-size: 1.8rem;
      color: var(--primary-green);
      margin-bottom: 16px;
      line-height: 1.3;
    }

    /* Article Grid */
    .article-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: var(--spacing-md);
    }

    .article-card {
      background: var(--bg-white);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      transition: transform 0.3s ease;
    }

    .article-card:hover {
      transform: translateY(-4px);
    }

    .card-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .card-content {
      padding: var(--spacing-md);
    }

    .card-title {
      font-size: 1.1rem;
      color: var(--primary-green);
      margin-bottom: 8px;
    }

    .card-excerpt {
      font-size: 0.9rem;
      color: var(--text-muted);
      margin-bottom: 16px;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    /* Sidebar */
    .sidebar-widget {
      background: var(--bg-white);
      border-radius: 16px;
      padding: var(--spacing-md);
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      margin-bottom: var(--spacing-lg);
    }
    
    .widget-title {
      font-size: 1.2rem;
      color: var(--primary-green);
      margin-bottom: 16px;
      border-bottom: 2px solid var(--primary-gold);
      padding-bottom: 8px;
      display: inline-block;
    }

    .category-list {
      list-style: none;
    }
    
    .category-list li {
      margin-bottom: 12px;
    }
    
    .category-list a {
      color: var(--text-dark);
      display: flex;
      justify-content: space-between;
      transition: color 0.3s;
    }
    
    .category-list a:hover {
      color: var(--primary-green);
      font-weight: 500;
    }
    
    .category-count {
      background: var(--bg-light);
      padding: 2px 8px;
      border-radius: 12px;
      font-size: 0.8rem;
      color: var(--text-muted);
    }

    .category-count {
      background: var(--bg-light);
      padding: 2px 8px;
      border-radius: 12px;
      font-size: 0.8rem;
      color: var(--text-muted);
    }
  </style>
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

  <div class="page-header">
    <div class="container">
      <h1>Wawasan Lingkungan</h1>
      <p>Membangun kesadaran melalui narasi alam yang mendalam dan berkelanjutan.</p>
    </div>
  </div>

  <section class="container article-layout">
    <div class="main-content">
      
      <div class="filter-bar">
        <div class="selected-categories" id="selectedCategoriesContainer"></div>
        <button id="btnOpenCategory" class="btn btn-outline" style="display: flex; gap: 8px; align-items: center; border-color: var(--primary-green); color: var(--primary-green);">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg> Pilih Kategori
        </button>
      </div>

      @php
          $featuredArtikel = $artikels->first();
          $gridArtikels = $artikels->slice(1);
      @endphp

      <!-- Featured Article -->
      @if($featuredArtikel)
      <article class="featured-article">
        <img src="{{ $featuredArtikel->gambar ? asset('storage/' . $featuredArtikel->gambar) : 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=800' }}" alt="{{ $featuredArtikel->judul }}" class="featured-img">
        <div class="featured-content">
          <div class="article-meta">
            <span class="category" style="color: var(--accent-green); font-weight: 600;">{{ $featuredArtikel->kategori }}</span>
            <span class="date">{{ $featuredArtikel->tanggal_publish ? $featuredArtikel->tanggal_publish->format('d M Y') : '-' }}</span>
          </div>
          <h2 class="featured-title">{{ $featuredArtikel->judul }}</h2>
          <p style="color: var(--text-muted); margin-bottom: 20px;">{{ Str::limit(strip_tags($featuredArtikel->konten), 150) }}</p>
          <a href="{{ url('/detail-artikel', $featuredArtikel->slug) }}" class="btn btn-primary">Baca Selengkapnya</a>
        </div>
      </article>
      @endif

      <!-- Article Grid -->
      <div class="article-grid">
        @forelse($gridArtikels as $artikel)
        <article class="article-card">
          <img src="{{ $artikel->gambar ? asset('storage/' . $artikel->gambar) : 'https://images.unsplash.com/photo-1618477461853-cf6ed80fbfc9?auto=format&fit=crop&q=80&w=400' }}" alt="{{ $artikel->judul }}" class="card-img">
          <div class="card-content">
            <div class="article-meta">
              <span style="color: var(--accent-green); font-weight: 600;">{{ $artikel->kategori }}</span>
            </div>
            <h3 class="card-title">{{ $artikel->judul }}</h3>
            <p class="card-excerpt">{{ Str::limit(strip_tags($artikel->konten), 100) }}</p>
            <a href="{{ url('/detail-artikel', $artikel->slug) }}" style="color: var(--primary-green); font-weight: 600; font-size: 0.9rem;">Baca »</a>
          </div>
        </article>
        @empty
          @if(!$featuredArtikel)
          <div class="col-12 text-center py-5">
            <p>Belum ada artikel yang dipublikasikan.</p>
          </div>
          @endif
        @endforelse
      </div>

    </div>

    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-grid">
        <div>
          <div class="footer-logo">Jabar Berdampak</div>
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

  <!-- Category Filter Modal -->
  <div class="modal-overlay" id="categoryModal">
    <div class="modal-content" style="max-width: 400px; width: 90%; background: var(--bg-white); padding: 30px; border-radius: 20px; position: relative; text-align: center;">
      <button class="modal-close" id="closeCategoryBtn" style="position: absolute; top: 20px; right: 20px; background: transparent; border: none; font-size: 2rem; cursor: pointer; color: var(--text-muted);">&times;</button>
      <h3 style="color: var(--primary-green); margin-bottom: 24px;">Pilih Kategori</h3>
      
      <div class="category-checkboxes" style="display: flex; flex-direction: column; gap: 15px; text-align: left; margin-bottom: 30px; max-height: 400px; overflow-y: auto;">
        @forelse($kategoris as $kategori)
        <label style="display: flex; gap: 10px; cursor: pointer; align-items: center; font-weight: 500;">
          <input type="checkbox" class="cat-filter" value="{{ $kategori }}" style="width: 18px; height: 18px; accent-color: var(--primary-green);"> {{ $kategori }}
        </label>
        @empty
        <p style="color: var(--text-muted);">Belum ada kategori.</p>
        @endforelse
      </div>
      
      <button class="btn btn-primary" id="applyCategoryBtn" style="width: 100%;">Terapkan Filter</button>
    </div>
  </div>

  
</body>
</html>
