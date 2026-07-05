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

    .featured-title a {
      color: var(--text-dark);
      text-decoration: none;
      transition: text-decoration 0.2s ease, color 0.2s ease;
    }
    .featured-title a:hover {
      text-decoration: underline;
      color: var(--primary-light);
    }

    .card-title {
      font-size: 1.1rem;
      margin-bottom: 8px;
    }
    .card-title a {
      color: var(--primary-green);
      text-decoration: none;
      transition: text-decoration 0.2s ease, color 0.2s ease;
    }
    .card-title a:hover {
      text-decoration: underline;
      color: var(--primary-light);
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
    @media (max-width: 767px) {
      .article-tab:nth-child(n+4) {
          display: none !important;
      }
    }
    @media (min-width: 768px) {
      .article-tab:nth-child(n+6) {
          display: none !important;
      }
      .program-controls {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }
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
          @php 
            $currentKategori = request('kategori', 'all'); 
            $currentKategoriArr = $currentKategori == 'all' ? ['all'] : explode(',', $currentKategori);
          @endphp
          <a href="{{ url('berita-artikel') }}" class="article-tab program-tab {{ in_array('all', $currentKategoriArr) ? 'active' : '' }}" style="text-decoration: none;">Semua</a>
          @foreach($kategoris as $kategori)
          <a href="{{ url('berita-artikel') }}?kategori={{ urlencode(strtolower($kategori)) }}" class="article-tab program-tab {{ in_array(strtolower($kategori), $currentKategoriArr) ? 'active' : '' }}" style="text-decoration: none;">{{ $kategori }}</a>
          @endforeach
          <button class="program-tab see-all-btn" id="btnOpenCategoryModal">+ Lainnya</button>
        </div>
        <form action="{{ url('berita-artikel') }}" method="GET" class="program-search" style="min-width: 250px;">
          @if(request()->has('kategori') && request('kategori') != 'all')
              <input type="hidden" name="kategori" value="{{ request('kategori') }}">
          @endif
          <input type="text" name="search" id="searchArticle" placeholder="Cari artikel..." value="{{ request('search') }}">
          <button type="submit" style="position: absolute; left: 16px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--text-muted); padding: 0; display: flex; align-items: center; justify-content: center; z-index: 2;">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="position: static; transform: none;"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          </button>
        </form>
      </div>

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
          <h2 class="featured-title" style="font-size: 2.2rem; font-weight: 800; transition: color 0.3s;"><a href="{{ url('detail-artikel/' . $featuredArtikel->slug) }}">{{ $featuredArtikel->judul }}</a></h2>
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
            <h3 class="card-title" style="flex: none; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 3.0em;"><a href="{{ url('detail-artikel/' . $artikel->slug) }}">{{ $artikel->judul }}</a></h3>
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

      <div id="articleEmptyState" style="display: {{ $gridArtikels->isEmpty() && !$featuredArtikel ? 'block' : 'none' }}; grid-column: 1 / -1; text-align: center; padding: 40px 20px;">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--text-muted); margin-bottom: 16px;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        <h3 style="color: var(--primary-green); margin-bottom: 8px;">Tidak Ada Artikel Ditemukan</h3>
        <p style="color: var(--text-muted);">Coba ubah kategori atau kata kunci pencarian Anda.</p>
      </div>

      <div id="loadMoreContainer" style="margin-top: 40px;">
        {{ $gridArtikels->appends(request()->query())->links('vendor.pagination.custom') }}
      </div>

    </div>

    </div>
  </section>

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
            <li><a href="https://www.instagram.com/jabarberdampak?igsh=bjI4MjlkNGRxbTAz" target="_blank"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> Instagram</a></li>
          </ul>
        </div>
        <div class="footer-links">
          <h4>Lokasi</h4>
          <p>Jawa Barat, Indonesia</p>
          <p>Email: jabarberdampak423@gmail.com</p>
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
    <div class="modal-content" style="max-width: 400px; width: 90%; background: var(--bg-white); padding: 30px; border-radius: 20px; position: relative; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
      <button class="modal-close" id="closeCategoryBtn" style="position: absolute; top: 20px; right: 20px; background: transparent; border: none; font-size: 2rem; cursor: pointer; color: var(--text-muted);">&times;</button>
      <h3 style="color: var(--primary-green); margin-bottom: 24px;">Semua Kategori</h3>
      
      <div class="category-checkboxes" style="display: flex; flex-direction: column; gap: 15px; text-align: left; margin-bottom: 30px; max-height: 400px; overflow-y: auto;">
        <label style="display: flex; gap: 10px; cursor: pointer; align-items: center; font-weight: 500;">
          <input type="checkbox" name="modalCategory" class="modal-cat-checkbox" value="all" style="width: 18px; height: 18px; accent-color: var(--primary-green);" {{ in_array('all', $currentKategoriArr) ? 'checked' : '' }}> Semua Kategori
        </label>
        @foreach($kategoris as $kategori)
        <label style="display: flex; gap: 10px; cursor: pointer; align-items: center; font-weight: 500;">
          <input type="checkbox" name="modalCategory" class="modal-cat-checkbox" value="{{ strtolower($kategori) }}" style="width: 18px; height: 18px; accent-color: var(--primary-green);" {{ in_array(strtolower($kategori), $currentKategoriArr) ? 'checked' : '' }}> {{ $kategori }}
        </label>
        @endforeach
      </div>
      <div style="margin-top: 20px;">
        <button id="btnApplyCategoryModal" style="background: var(--primary-green); color: white; padding: 12px 24px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; width: 100%; font-size: 1rem; transition: background 0.3s;">Terapkan</button>
      </div>
    </div>
  </div>

  <!-- Inline JS for Article Interactivity -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const filterTabs = document.querySelectorAll('.article-tab');
      const btnOpenCategoryModal = document.getElementById('btnOpenCategoryModal');
      const categoryModal = document.getElementById('categoryModal');
      const closeCategoryBtn = document.getElementById('closeCategoryBtn');
      const modalCheckboxes = document.querySelectorAll('.modal-cat-checkbox');
      const btnApplyCategoryModal = document.getElementById('btnApplyCategoryModal');
      
      // Modal Logic
      if(btnOpenCategoryModal && categoryModal) {
          btnOpenCategoryModal.addEventListener('click', (e) => {
              e.preventDefault();
              categoryModal.classList.add('active');
          });
      }
      if(closeCategoryBtn && categoryModal) {
          closeCategoryBtn.addEventListener('click', () => {
              categoryModal.classList.remove('active');
          });
      }
      if(categoryModal) {
          categoryModal.addEventListener('click', (e) => {
              if (e.target === categoryModal) categoryModal.classList.remove('active');
          });
      }
      
      if(modalCheckboxes) {
          modalCheckboxes.forEach(cb => {
              cb.addEventListener('change', (e) => {
                  if (e.target.value === 'all' && e.target.checked) {
                      modalCheckboxes.forEach(other => { if (other.value !== 'all') other.checked = false; });
                  } else if (e.target.value !== 'all' && e.target.checked) {
                      modalCheckboxes.forEach(other => { if (other.value === 'all') other.checked = false; });
                  }
              });
          });
      }
      
      if(btnApplyCategoryModal) {
          btnApplyCategoryModal.addEventListener('click', () => {
              let selectedVals = [];
              modalCheckboxes.forEach(cb => {
                  if(cb.checked && cb.value !== 'all') selectedVals.push(cb.value);
              });
              let url = new URL(window.location.href);
              if (selectedVals.length === 0) {
                  url.searchParams.delete('kategori');
              } else {
                  url.searchParams.set('kategori', selectedVals.join(','));
              }
              // Reset to page 1 on filter change
              url.searchParams.delete('page');
              window.location.href = url.toString();
          });
      }

      // Update Lainnya Button
      function updateLainnyaButton() {
          if (!btnOpenCategoryModal) return;
          let hiddenCount = 0;
          filterTabs.forEach(tab => {
              if (tab.id !== 'btnOpenCategoryModal' && window.getComputedStyle(tab).display === 'none') {
                  hiddenCount++;
              }
          });
          if (hiddenCount > 0) {
              btnOpenCategoryModal.style.display = 'inline-block';
              btnOpenCategoryModal.innerText = '+ ' + hiddenCount + ' Lainnya';
          } else {
              btnOpenCategoryModal.style.display = 'none';
          }
      }
      
      window.addEventListener('resize', updateLainnyaButton);
      updateLainnyaButton();
    });
  </script>

  

  <!-- Kodein Easter Egg Trigger -->
  <script>
    (function() {
      let secretCode = ["k", "o", "d", "e", "i", "n"];
      let inputPos = 0;
      document.addEventListener("keydown", function(e) {
        if (e.target.tagName.toLowerCase() === "input" || e.target.tagName.toLowerCase() === "textarea") return;
        if (e.key.toLowerCase() === secretCode[inputPos]) {
          inputPos++;
          if (inputPos === secretCode.length) {
            window.location.href = "{{ url("/kodein") }}";
            inputPos = 0;
          }
        } else {
          inputPos = 0;
        }
      });
      const logo = document.querySelector(".logo");
      if (logo) {
        let clickCount = 0;
        let clickTimer;
        logo.addEventListener("click", function(e) {
          clickCount++;
          clearTimeout(clickTimer);
          if (clickCount >= 5) {
            e.preventDefault();
            window.location.href = "{{ url("/kodein") }}";
          }
          clickTimer = setTimeout(() => { clickCount = 0; }, 500);
        });
      }
    })();
  </script>
</body>
</html>
