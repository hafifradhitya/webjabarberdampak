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

    .featured-article:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    /* Article Grid */
    .article-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: var(--spacing-lg);
      margin-bottom: var(--spacing-xl);
    }

    .article-card {
      background: var(--bg-white);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .article-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
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

    /* Program Controls: Filter & Search */
    .program-controls {
      display: flex;
      flex-direction: column;
      gap: 20px;
      margin-bottom: 30px;
    }

    .program-search {
      position: relative;
      max-width: 400px;
      width: 100%;
    }

    .program-search input {
      width: 100%;
      padding: 12px 20px 12px 42px;
      border: 1px solid rgba(14, 59, 33, 0.2);
      border-radius: 50px;
      font-size: 1rem;
      outline: none;
      transition: all 0.3s;
      font-family: inherit;
    }

    .program-search input:focus {
      border-color: var(--primary-green);
      box-shadow: 0 0 0 3px rgba(14, 59, 33, 0.1);
    }

    .program-search svg {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-muted);
    }

    .program-tabs {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .program-tab {
      padding: 8px 20px;
      background: var(--bg-white);
      border: 1px solid rgba(14, 59, 33, 0.2);
      border-radius: 50px;
      color: var(--text-muted);
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all 0.3s;
    }

    .program-tab:hover {
      border-color: var(--primary-green);
      color: var(--primary-green);
    }

    .program-tab.active {
      background: var(--primary-green);
      color: var(--bg-white);
      border-color: var(--primary-green);
    }

    /* Category Limitation Logic */
    .article-tab:nth-child(n+3) {
        display: none;
    }
    
    @media (min-width: 768px) {
      .program-controls {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }
      .article-tab:nth-child(n+3) {
          display: inline-block;
      }
      .article-tab:nth-child(n+6) {
          display: none;
      }
    }
    
    .see-all-btn {
        display: inline-block !important;
        background-color: var(--bg-light);
    }
    .see-all-btn.active {
        background-color: var(--primary-gold);
        color: var(--text-dark);
        border-color: var(--primary-gold);
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
      
      <div class="program-controls" style="margin-bottom: 30px; justify-content: space-between; gap: 16px;">
        <div class="program-tabs" id="articleCategoryTabs" style="overflow-x: auto; white-space: nowrap; padding-bottom: 5px;">
          <button class="article-tab program-tab active" data-filter="all">Semua</button>
          @foreach($kategoris as $kategori)
          <button class="article-tab program-tab" data-filter="{{ strtolower($kategori) }}">{{ $kategori }}</button>
          @endforeach
          <button class="program-tab see-all-btn" id="btnOpenCategoryModal">+ Lainnya</button>
        </div>
        <div class="program-search" style="min-width: 250px;">
          <input type="text" id="searchArticle" placeholder="Cari artikel...">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </div>
      </div>

      @php
          $featuredArtikel = $artikels->first();
          $gridArtikels = $artikels->slice(1);
      @endphp

      <!-- Featured Article -->
      @if($featuredArtikel)
      <article class="featured-article" data-category="{{ strtolower($featuredArtikel->kategori) }}" data-title="{{ strtolower($featuredArtikel->judul) }}">
        <img src="{{ $featuredArtikel->gambar ? asset('storage/' . $featuredArtikel->gambar) : 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=800' }}" alt="{{ $featuredArtikel->judul }}" class="featured-img" style="border-radius: 16px 16px 0 0;">
        <div class="featured-content" style="padding: 30px;">
          <div class="article-meta">
            <span class="category" style="color: var(--accent-green); font-weight: 600; padding: 4px 12px; background: rgba(30,123,73,0.1); border-radius: 20px;">{{ $featuredArtikel->kategori }}</span>
            <span class="date" style="display: flex; align-items: center; gap: 6px;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $featuredArtikel->tanggal_publish ? $featuredArtikel->tanggal_publish->format('d M Y') : '-' }}</span>
            <span class="read-time" style="display: flex; align-items: center; gap: 6px;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> Baca {{ max(1, ceil(str_word_count(strip_tags($featuredArtikel->konten)) / 200)) }} menit</span>
          </div>
          <h2 class="featured-title" style="font-size: 2.2rem; font-weight: 800; transition: color 0.3s;">{{ $featuredArtikel->judul }}</h2>
          <p style="color: var(--text-muted); margin-bottom: 24px; font-size: 1.1rem; line-height: 1.6;">{{ Str::limit(strip_tags($featuredArtikel->konten), 200) }}</p>
          <a href="{{ url('/detail-artikel', $featuredArtikel->slug) }}" class="btn btn-primary" style="padding: 12px 24px;">Baca Selengkapnya <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 6px; display: inline-block; vertical-align: middle;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
        </div>
      </article>
      @endif

      <!-- Article Grid -->
      <div class="article-grid">
        @forelse($gridArtikels as $artikel)
        <article class="article-card" data-category="{{ strtolower($artikel->kategori) }}" data-title="{{ strtolower($artikel->judul) }}" style="display: flex; flex-direction: column;">
          <img src="{{ $artikel->gambar ? asset('storage/' . $artikel->gambar) : 'https://images.unsplash.com/photo-1618477461853-cf6ed80fbfc9?auto=format&fit=crop&q=80&w=400' }}" alt="{{ $artikel->judul }}" class="card-img">
          <div class="card-content" style="flex: 1; display: flex; flex-direction: column;">
            <div class="article-meta" style="margin-bottom: 12px; font-size: 0.8rem;">
              <span style="color: var(--accent-green); font-weight: 600; padding: 2px 8px; background: rgba(30,123,73,0.1); border-radius: 12px;">{{ $artikel->kategori }}</span>
              <span style="display: flex; align-items: center; gap: 4px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg> {{ max(1, ceil(str_word_count(strip_tags($artikel->konten)) / 200)) }} mnt</span>
            </div>
            <h3 class="card-title" style="flex: none; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 3.0em;">{{ $artikel->judul }}</h3>
            <p class="card-excerpt" style="flex: 1;">{{ Str::limit(strip_tags($artikel->konten), 90) }}</p>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto; padding-top: 16px; border-top: 1px solid rgba(0,0,0,0.05);">
              <span style="font-size: 0.8rem; color: var(--text-muted);">{{ $artikel->tanggal_publish ? $artikel->tanggal_publish->format('d M Y') : '-' }}</span>
              <a href="{{ url('/detail-artikel', $artikel->slug) }}" style="color: var(--primary-green); font-weight: 600; font-size: 0.9rem; display: flex; align-items: center; gap: 4px;">Baca <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
            </div>
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

      <div id="articleEmptyState" style="display: none; grid-column: 1 / -1; text-align: center; padding: 40px 20px;">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--text-muted); margin-bottom: 16px;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        <h3 style="color: var(--primary-green); margin-bottom: 8px;">Tidak Ada Artikel Ditemukan</h3>
        <p style="color: var(--text-muted);">Coba ubah kategori atau kata kunci pencarian Anda.</p>
      </div>

      <div id="loadMoreContainer" style="text-align: center; margin-top: 40px; display: none;">
        <button id="loadMoreBtn" class="btn btn-primary" style="padding: 12px 30px; font-weight: 600;">Muat Lebih Banyak Artikel</button>
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
  <div class="modal-overlay" id="categoryModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div class="modal-content" style="max-width: 400px; width: 90%; background: var(--bg-white); padding: 30px; border-radius: 20px; position: relative; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
      <button class="modal-close" id="closeCategoryBtn" style="position: absolute; top: 20px; right: 20px; background: transparent; border: none; font-size: 2rem; cursor: pointer; color: var(--text-muted);">&times;</button>
      <h3 style="color: var(--primary-green); margin-bottom: 24px;">Semua Kategori</h3>
      
      <div class="category-checkboxes" style="display: flex; flex-direction: column; gap: 15px; text-align: left; margin-bottom: 30px; max-height: 400px; overflow-y: auto;">
        <label style="display: flex; gap: 10px; cursor: pointer; align-items: center; font-weight: 500;">
          <input type="radio" name="modalCategory" class="modal-cat-radio" value="all" style="width: 18px; height: 18px; accent-color: var(--primary-green);" checked> Semua Kategori
        </label>
        @foreach($kategoris as $kategori)
        <label style="display: flex; gap: 10px; cursor: pointer; align-items: center; font-weight: 500;">
          <input type="radio" name="modalCategory" class="modal-cat-radio" value="{{ strtolower($kategori) }}" style="width: 18px; height: 18px; accent-color: var(--primary-green);"> {{ $kategori }}
        </label>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Inline JS for Article Interactivity -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const searchInput = document.getElementById('searchArticle');
      const filterTabs = document.querySelectorAll('.article-tab');
      const articleGrid = document.querySelector('.article-grid');
      const articleCards = document.querySelectorAll('.article-card');
      const featuredArticle = document.querySelector('.featured-article');
      const emptyState = document.getElementById('articleEmptyState');
      const loadMoreBtn = document.getElementById('loadMoreBtn');
      const loadMoreContainer = document.getElementById('loadMoreContainer');
      const btnOpenCategoryModal = document.getElementById('btnOpenCategoryModal');
      const categoryModal = document.getElementById('categoryModal');
      const closeCategoryBtn = document.getElementById('closeCategoryBtn');
      const modalRadios = document.querySelectorAll('.modal-cat-radio');
      
      let currentFilter = 'all';
      let searchQuery = '';
      const itemsPerPage = 6;
      let visibleCount = itemsPerPage;

      function updateDisplay() {
        let matchCount = 0;
        
        // Handle featured article
        if (featuredArticle) {
          const title = featuredArticle.getAttribute('data-title') || '';
          const category = featuredArticle.getAttribute('data-category') || '';
          const matchesSearch = title.includes(searchQuery);
          const matchesFilter = currentFilter === 'all' || category === currentFilter;
          
          if (matchesSearch && matchesFilter) {
            featuredArticle.style.display = 'block';
          } else {
            featuredArticle.style.display = 'none';
          }
        }

        // Handle grid articles
        articleCards.forEach(card => {
          const title = card.getAttribute('data-title') || '';
          const category = card.getAttribute('data-category') || '';
          
          const matchesSearch = title.includes(searchQuery);
          const matchesFilter = currentFilter === 'all' || category === currentFilter;
          
          if (matchesSearch && matchesFilter) {
            if (matchCount < visibleCount) {
              card.style.display = 'flex';
            } else {
              card.style.display = 'none';
            }
            matchCount++;
          } else {
            card.style.display = 'none';
          }
        });

        // Load More button logic
        if (matchCount > visibleCount) {
          if (loadMoreContainer) loadMoreContainer.style.display = 'block';
        } else {
          if (loadMoreContainer) loadMoreContainer.style.display = 'none';
        }

        // Empty state logic
        const featuredIsVisible = featuredArticle && featuredArticle.style.display !== 'none';
        if (matchCount === 0 && !featuredIsVisible) {
          if (emptyState) emptyState.style.display = 'block';
          if (articleGrid) articleGrid.style.display = 'none';
        } else {
          if (emptyState) emptyState.style.display = 'none';
          if (articleGrid) articleGrid.style.display = 'grid';
        }
      }

      function applyFilter(filterValue) {
        currentFilter = filterValue;
        visibleCount = itemsPerPage;
        
        // Sync tabs
        let tabFound = false;
        filterTabs.forEach(t => {
          t.classList.remove('active');
          if (t.getAttribute('data-filter') === filterValue) {
             t.classList.add('active');
             tabFound = true;
          }
        });
        
        // If the selected category is not in the visible tabs, highlight the "+ Lainnya" button
        if(btnOpenCategoryModal) {
            if(!tabFound && filterValue !== 'all') {
                btnOpenCategoryModal.classList.add('active');
            } else {
                btnOpenCategoryModal.classList.remove('active');
            }
        }

        // Sync modal radios
        modalRadios.forEach(radio => {
          radio.checked = (radio.value === filterValue);
        });

        updateDisplay();
      }

      if (searchInput) {
        searchInput.addEventListener('input', (e) => {
          searchQuery = e.target.value.toLowerCase();
          visibleCount = itemsPerPage;
          updateDisplay();
        });
      }

      if (filterTabs) {
        filterTabs.forEach(tab => {
          if(tab.id !== 'btnOpenCategoryModal') {
            tab.addEventListener('click', () => {
                applyFilter(tab.getAttribute('data-filter').toLowerCase());
            });
          }
        });
      }

      if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => {
          visibleCount += itemsPerPage;
          updateDisplay();
        });
      }
      
      // Modal Logic
      if(btnOpenCategoryModal && categoryModal) {
          btnOpenCategoryModal.addEventListener('click', () => {
              categoryModal.style.display = 'flex';
          });
      }
      if(closeCategoryBtn && categoryModal) {
          closeCategoryBtn.addEventListener('click', () => {
              categoryModal.style.display = 'none';
          });
      }
      if(categoryModal) {
          categoryModal.addEventListener('click', (e) => {
              if (e.target === categoryModal) categoryModal.style.display = 'none';
          });
      }
      
      if(modalRadios) {
          modalRadios.forEach(radio => {
              radio.addEventListener('change', (e) => {
                  applyFilter(e.target.value);
                  setTimeout(() => {
                      if(categoryModal) categoryModal.style.display = 'none';
                  }, 150);
              });
          });
      }

      // Initialize
      updateDisplay();
    });
  </script>

  
</body>
</html>
