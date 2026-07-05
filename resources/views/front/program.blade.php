<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Program & Aktivitas - Jabar Berdampak</title>
  <meta name="description" content="Program kerja dan aktivitas yang telah dilaksanakan oleh Jabar Berdampak." />
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

    .program-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: var(--spacing-lg);
      margin-bottom: var(--spacing-xl);
    }

    .program-card {
      background: var(--bg-white);
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0,0,0,0.05);
      transition: transform 0.3s ease;
    }
    
    .program-card:hover {
      transform: translateY(-5px);
    }
    
    .program-img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .program-content {
      padding: var(--spacing-md);
    }

    .program-category {
      display: inline-block;
      background: rgba(250, 208, 44, 0.2);
      color: #b08d00;
      padding: 4px 12px;
      border-radius: 50px;
      font-size: 0.8rem;
      font-weight: 700;
      margin-bottom: 12px;
    }

    .program-title {
      font-size: 1.25rem;
      margin-bottom: 12px;
    }
    .program-title a {
      color: var(--primary-green);
      text-decoration: none;
      transition: text-decoration 0.2s ease, color 0.2s ease;
    }
    .program-title a:hover {
      text-decoration: underline;
      color: var(--primary-light);
    }

    .program-desc {
      color: var(--text-muted);
      font-size: 0.95rem;
      margin-bottom: 16px;
      display: -webkit-box;
      -webkit-line-clamp: 4;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .program-detail-btn {
      padding: 6px 16px;
      font-size: 0.9rem;
    }

    .proker-modal {
      position: fixed;
      inset: 0;
      z-index: 1000;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 24px;
      background: rgba(5, 20, 12, 0.68);
    }

    .proker-modal.active {
      display: flex;
    }

    .proker-modal-panel {
      width: min(920px, 100%);
      max-height: min(86vh, 820px);
      background: var(--bg-white);
      border-radius: 8px;
      box-shadow: 0 28px 80px rgba(0, 0, 0, 0.28);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      position: relative;
    }

    .proker-modal-media {
      background: var(--primary-green);
      width: 100%;
      max-height: 420px;
      overflow: hidden;
    }

    .proker-modal-media img {
      width: 100%;
      height: auto;
      max-height: 420px;
      object-fit: contain;
      display: block;
      background: var(--primary-green);
    }

    .proker-modal-body {
      padding: 34px;
      overflow-y: auto;
    }

    .proker-modal-close {
      position: absolute;
      top: 14px;
      right: 14px;
      width: 38px;
      height: 38px;
      border: 0;
      border-radius: 50%;
      background: rgba(14, 59, 33, 0.9);
      color: var(--text-light);
      font-size: 1.35rem;
      line-height: 1;
      cursor: pointer;
      display: grid;
      place-items: center;
      z-index: 2;
    }

    .proker-modal-close:hover {
      background: var(--secondary-green);
    }

    .proker-modal-title {
      color: var(--primary-green);
      font-size: 2rem;
      line-height: 1.18;
      margin: 12px 0 22px;
    }

    .proker-modal-meta {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
      padding: 18px 0 24px;
      border-top: 1px solid #e8eee8;
      border-bottom: 1px solid #e8eee8;
      margin-bottom: 24px;
    }

    .proker-meta-item span {
      display: block;
      color: var(--text-muted);
      font-size: 0.82rem;
      font-weight: 700;
      margin-bottom: 4px;
    }

    .proker-meta-item strong {
      color: var(--text-dark);
      font-size: 0.98rem;
    }

    .proker-modal-desc {
      color: var(--text-dark);
      font-size: 1.02rem;
      line-height: 1.82;
    }

    body.modal-open {
      overflow: hidden;
    }

    /* Completed Activities Section */
    .completed-activities {
      background-color: var(--bg-light);
      padding: var(--spacing-xl) 0;
      margin-bottom: 0;
    }

    .activity-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: var(--spacing-lg);
    }

    .activity-card {
      position: relative;
      border-radius: 16px;
      overflow: hidden;
      aspect-ratio: 4/3;
    }

    .activity-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .activity-card:hover img {
      transform: scale(1.05);
    }

    .activity-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(14, 59, 33, 0.9), transparent);
      padding: 20px;
      color: var(--text-light);
    }

    .activity-title {
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 4px;
      color: var(--text-light);
      transition: text-decoration 0.2s ease;
    }
    
    .activity-item:hover .activity-title {
      text-decoration: underline;
    }

    .activity-date {
      font-size: 0.85rem;
      opacity: 0.8;
    }

    @media (max-width: 820px) {
      .proker-modal {
        padding: 16px;
      }
      .proker-modal-panel {
        max-height: 90vh;
      }
      .proker-modal-media {
        max-height: 260px;
      }
      .proker-modal-media img {
        max-height: 260px;
      }
      .proker-modal-body {
        padding: 24px;
      }
      .proker-modal-title {
        font-size: 1.55rem;
      }
      .proker-modal-meta {
        grid-template-columns: 1fr;
      }
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

    @media (min-width: 768px) {
      .program-controls {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
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
          <li><a href="{{ url('/program-kegiatan') }}" class="active">Program & Aktivitas</a></li>
          <li><a href="{{ url('/berita-artikel') }}">Artikel</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="page-header">
    <div class="container">
      <h1>Program Kerja</h1>
      <p>Inisiatif strategis kami untuk mengembangkan potensi pemuda dan melestarikan lingkungan.</p>
    </div>
  </div>

  <section class="container">
    <div class="program-controls">
      <div class="program-tabs">
        <button class="program-tab active" data-filter="all">Semua</button>
        <button class="program-tab" data-filter="planning">Perencanaan</button>
        <button class="program-tab" data-filter="ongoing">Sedang Berjalan</button>
        <button class="program-tab" data-filter="completed">Selesai</button>
        <button class="program-tab" data-filter="cancelled">Dibatalkan</button>
      </div>
      <div class="program-search">
        <input type="text" id="searchProgram" placeholder="Cari program kerja...">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
      </div>
    </div>

    <div class="program-grid" id="programGrid">
      
      @forelse($prokers as $proker)
      @php
        $prokerImage = $proker->gambar ? asset('storage/' . $proker->gambar) : 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&q=80&w=900';
        $prokerModalId = 'prokerModal' . $proker->id;
        $prokerStatusLabel = match(strtolower($proker->status ?? '')) {
            'planning' => 'Perencanaan',
            'ongoing' => 'Sedang Berjalan',
            'completed' => 'Selesai',
            'cancelled' => 'Dibatalkan',
            default => 'Program'
        };
      @endphp
      <div class="program-card">
        <img src="{{ $prokerImage }}" alt="{{ $proker->nama_proker }}" class="program-img">
        <div class="program-content">
          <span class="program-category" data-status="{{ strtolower($proker->status ?? '') }}">{{ strtoupper($prokerStatusLabel) }}</span>
          <h3 class="program-title"><a href="javascript:void(0)" data-proker-open="{{ $prokerModalId }}">{{ $proker->nama_proker }}</a></h3>
          <p class="program-desc">{{ $proker->deskripsi }}</p>
          <button type="button" class="btn btn-outline-green program-detail-btn" data-proker-open="{{ $prokerModalId }}">Detail Program</button>
        </div>
      </div>

      <div class="proker-modal" id="{{ $prokerModalId }}" role="dialog" aria-modal="true" aria-labelledby="{{ $prokerModalId }}Title">
        <div class="proker-modal-panel">
          <button type="button" class="proker-modal-close" data-proker-close aria-label="Tutup detail program">&times;</button>
          <div class="proker-modal-media">
            <img src="{{ $prokerImage }}" alt="{{ $proker->nama_proker }}">
          </div>
          <div class="proker-modal-body">
            <span class="program-category">{{ strtoupper($prokerStatusLabel) }}</span>
            <h2 class="proker-modal-title" id="{{ $prokerModalId }}Title">{{ $proker->nama_proker }}</h2>

            <div class="proker-modal-meta">
              <div class="proker-meta-item">
                <span>Tanggal Pelaksanaan</span>
                <strong>{{ $proker->tanggal_mulai ? $proker->tanggal_mulai->format('d M Y') : '-' }} - {{ $proker->tanggal_selesai ? $proker->tanggal_selesai->format('d M Y') : '-' }}</strong>
              </div>
              <div class="proker-meta-item">
                <span>Penanggung Jawab</span>
                <strong>{{ $proker->penanggung_jawab ?? '-' }}</strong>
              </div>
              <div class="proker-meta-item">
                <span>Anggaran</span>
                <strong>Rp {{ number_format($proker->anggaran ?? 0, 0, ',', '.') }}</strong>
              </div>
              <div class="proker-meta-item">
                <span>Status</span>
                <strong>{{ ucfirst($proker->status ?? 'program') }}</strong>
              </div>
            </div>

            <div class="proker-modal-desc">
              {!! nl2br(e($proker->deskripsi ?: 'Deskripsi program belum tersedia.')) !!}
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12 text-center py-5">
        <p>Belum ada program kerja yang ditambahkan.</p>
      </div>
      @endforelse
      
      <div id="programEmptyState" style="display: none; grid-column: 1 / -1; text-align: center; padding: 40px 20px;">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--text-muted); margin-bottom: 16px;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        <h3 style="color: var(--primary-green); margin-bottom: 8px;">Tidak Ada Program Ditemukan</h3>
        <p style="color: var(--text-muted);">Coba ubah filter kategori atau kata kunci pencarian Anda.</p>
      </div>

    </div>
  </section>

  <!-- Completed Activities -->
  <section class="completed-activities">
    <div class="container">
      <h2 class="section-title">Aktivitas yang Telah Terlaksana</h2>
      <p class="section-subtitle">Dokumentasi dari berbagai kegiatan dan program kerja yang sukses kami selenggarakan.</p>
      
      <div class="program-controls" style="margin-bottom: 24px; justify-content: space-between;">
        <div class="program-tabs">
          <button class="activity-tab program-tab active" data-filter="all">Semua</button>
          <button class="activity-tab program-tab" data-filter="upcoming">Akan Datang</button>
          <button class="activity-tab program-tab" data-filter="ongoing">Sedang Berlangsung</button>
          <button class="activity-tab program-tab" data-filter="completed">Selesai</button>
        </div>
        <div class="program-search">
          <input type="text" id="searchActivity" placeholder="Cari aktivitas...">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </div>
      </div>

      <div class="activity-grid" id="activityGrid">
        @forelse($kegiatans as $index => $kegiatan)
        @php
          $activityThumbnail = $kegiatan->documentations->first()
            ? asset('storage/' . $kegiatan->documentations->first()->image_path)
            : ($kegiatan->banner ? asset('storage/' . $kegiatan->banner) : 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&q=80&w=600');
        @endphp
        <a href="{{ url('/detail-kegiatan', $kegiatan->slug) }}" class="activity-item" style="display: none;">
          <div class="activity-card">
            <img src="{{ $activityThumbnail }}" alt="{{ $kegiatan->nama_kegiatan }}">
            <div class="activity-overlay">
              <span class="activity-category" data-status="{{ strtolower($kegiatan->status ?? '') }}" style="display: none;"></span>
              <h3 class="activity-title">{{ $kegiatan->nama_kegiatan }}</h3>
              <span class="activity-date">{{ $kegiatan->tanggal_kegiatan ? $kegiatan->tanggal_kegiatan->format('d M Y') : '-' }}</span>
            </div>
          </div>
        </a>
        @empty
        <div class="col-12 text-center py-5">
          <p>Belum ada aktivitas yang ditambahkan.</p>
        </div>
        @endforelse
        
        <div id="activityEmptyState" style="display: none; grid-column: 1 / -1; text-align: center; padding: 40px 20px;">
          <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="color: var(--text-muted); margin-bottom: 16px;"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
          <h3 style="color: var(--primary-green); margin-bottom: 8px;">Tidak Ada Aktivitas Ditemukan</h3>
          <p style="color: var(--text-muted);">Coba ubah filter kategori atau kata kunci pencarian Anda.</p>
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
  <script type="module" src="./main.js"></script>
  <script>
    // --- MODAL LOGIC ---
    const prokerModals = document.querySelectorAll('.proker-modal');

    function closeProkerModals() {
      prokerModals.forEach(modal => modal.classList.remove('active'));
      document.body.classList.remove('modal-open');
    }

    document.querySelectorAll('[data-proker-open]').forEach(button => {
      button.addEventListener('click', () => {
        const modal = document.getElementById(button.dataset.prokerOpen);
        if (!modal) {
          return;
        }

        closeProkerModals();
        modal.classList.add('active');
        document.body.classList.add('modal-open');
        modal.querySelector('[data-proker-close]')?.focus();
      });
    });

    document.querySelectorAll('[data-proker-close]').forEach(button => {
      button.addEventListener('click', closeProkerModals);
    });

    prokerModals.forEach(modal => {
      modal.addEventListener('click', event => {
        if (event.target === modal) {
          closeProkerModals();
        }
      });
    });

    document.addEventListener('keydown', event => {
      if (event.key === 'Escape') {
        closeProkerModals();
      }
    });

    // --- FILTER, SEARCH & LOAD MORE FOR PROGRAMS (TOP SECTION) ---
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('searchProgram');
        const filterTabs = document.querySelector('.program-controls').querySelectorAll('.program-tab');
        const programCards = document.querySelectorAll('.program-card');
        const programGrid = document.getElementById('programGrid');
        
        let currentFilter = 'all';
        let searchQuery = '';
        const itemsPerPage = 3;
        let visibleCount = itemsPerPage;

        // Create Load More Button dynamically
        const loadMoreProgramBtn = document.createElement('button');
        loadMoreProgramBtn.className = 'btn btn-primary';
        loadMoreProgramBtn.textContent = 'Muat Lebih Banyak Program';
        loadMoreProgramBtn.style.margin = '30px auto';
        loadMoreProgramBtn.style.display = 'none';
        
        const loadMoreContainer = document.createElement('div');
        loadMoreContainer.style.textAlign = 'center';
        loadMoreContainer.style.width = '100%';
        loadMoreContainer.style.gridColumn = '1 / -1'; // span full width if in grid
        loadMoreContainer.appendChild(loadMoreProgramBtn);
        
        if (programGrid) {
            programGrid.parentNode.insertBefore(loadMoreContainer, programGrid.nextSibling);
        }

        function updateDisplay() {
            let matchCount = 0;
            
            programCards.forEach(card => {
                // Ignore empty states if they have this class
                if (!card.classList.contains('program-card')) return;
                
                const titleEl = card.querySelector('.program-title');
                const catEl = card.querySelector('.program-category');
                
                if (titleEl && catEl) {
                    const title = titleEl.textContent.toLowerCase();
                    const category = catEl.getAttribute('data-status') || '';
                    
                    const matchesSearch = title.includes(searchQuery);
                    const matchesFilter = currentFilter === 'all' || category.includes(currentFilter);
                    
                    if (matchesSearch && matchesFilter) {
                        if (matchCount < visibleCount) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                        matchCount++;
                    } else {
                        card.style.display = 'none';
                    }
                }
            });

            if (matchCount > visibleCount) {
                loadMoreProgramBtn.style.display = 'inline-block';
            } else {
                loadMoreProgramBtn.style.display = 'none';
            }
            
            const emptyState = document.getElementById('programEmptyState');
            if (emptyState) {
                emptyState.style.display = matchCount === 0 ? 'block' : 'none';
            }
        }

        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                searchQuery = e.target.value.toLowerCase();
                visibleCount = itemsPerPage; // reset load more
                updateDisplay();
            });
        }

        if (filterTabs.length > 0) {
            filterTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    filterTabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    currentFilter = tab.getAttribute('data-filter').toLowerCase();
                    visibleCount = itemsPerPage; // reset load more
                    updateDisplay();
                });
            });
        }

        loadMoreProgramBtn.addEventListener('click', () => {
            visibleCount += itemsPerPage;
            updateDisplay();
        });

        // Initialize display
        if (programCards.length > 0) {
            updateDisplay();
        }

        // --- FILTER, SEARCH & LOAD MORE FOR ACTIVITIES (BOTTOM SECTION) ---
        const searchActivity = document.getElementById('searchActivity');
        const activityItems = document.querySelectorAll('.activity-item');
        const activityGrid = document.getElementById('activityGrid');
        const activityFilterTabs = document.querySelectorAll('.activity-tab');
        
        let activityCurrentFilter = 'all';
        let activitySearchQuery = '';
        const activityItemsPerPage = 3;
        let activityVisibleCount = activityItemsPerPage;

        // Create Load More Button for Activities
        const loadMoreActivityBtn = document.createElement('button');
        loadMoreActivityBtn.className = 'btn btn-primary';
        loadMoreActivityBtn.textContent = 'Muat Lebih Banyak Aktivitas';
        loadMoreActivityBtn.style.margin = '40px auto';
        loadMoreActivityBtn.style.display = 'none';
        
        const loadMoreActivityContainer = document.createElement('div');
        loadMoreActivityContainer.style.textAlign = 'center';
        loadMoreActivityContainer.style.width = '100%';
        loadMoreActivityContainer.style.gridColumn = '1 / -1';
        loadMoreActivityContainer.style.paddingBottom = '40px';
        loadMoreActivityContainer.appendChild(loadMoreActivityBtn);
        
        if (activityGrid) {
            activityGrid.parentNode.insertBefore(loadMoreActivityContainer, activityGrid.nextSibling);
        }

        function updateActivityDisplay() {
            let matchCount = 0;
            
            activityItems.forEach(item => {
                const titleEl = item.querySelector('.activity-title');
                const catEl = item.querySelector('.activity-category');
                
                if (titleEl && catEl) {
                    const title = titleEl.textContent.toLowerCase();
                    const category = catEl.getAttribute('data-status') || '';
                    
                    const matchesSearch = title.includes(activitySearchQuery);
                    const matchesFilter = activityCurrentFilter === 'all' || category.includes(activityCurrentFilter);
                    
                    if (matchesSearch && matchesFilter) {
                        if (matchCount < activityVisibleCount) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                        matchCount++;
                    } else {
                        item.style.display = 'none';
                    }
                }
            });

            if (matchCount > activityVisibleCount) {
                loadMoreActivityBtn.style.display = 'inline-block';
            } else {
                loadMoreActivityBtn.style.display = 'none';
            }
            
            const activityEmptyState = document.getElementById('activityEmptyState');
            if (activityEmptyState) {
                activityEmptyState.style.display = matchCount === 0 ? 'block' : 'none';
            }
        }

        if (searchActivity) {
            searchActivity.addEventListener('input', (e) => {
                activitySearchQuery = e.target.value.toLowerCase();
                activityVisibleCount = activityItemsPerPage; // reset load more
                updateActivityDisplay();
            });
        }
        
        if (activityFilterTabs.length > 0) {
            activityFilterTabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    activityFilterTabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');
                    activityCurrentFilter = tab.getAttribute('data-filter').toLowerCase();
                    activityVisibleCount = activityItemsPerPage; // reset load more
                    updateActivityDisplay();
                });
            });
        }

        loadMoreActivityBtn.addEventListener('click', () => {
            activityVisibleCount += activityItemsPerPage;
            updateActivityDisplay();
        });

        // Initialize Activity display
        if (activityItems.length > 0) {
            updateActivityDisplay();
        }
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
