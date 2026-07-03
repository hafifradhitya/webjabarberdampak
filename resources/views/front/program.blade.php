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
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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
      color: var(--primary-green);
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
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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
    <div class="program-grid">
      
      @forelse($prokers as $proker)
      @php
        $prokerImage = $proker->gambar ? asset('storage/' . $proker->gambar) : 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&q=80&w=900';
        $prokerModalId = 'prokerModal' . $proker->id;
      @endphp
      <div class="program-card">
        <img src="{{ $prokerImage }}" alt="{{ $proker->nama_proker }}" class="program-img">
        <div class="program-content">
          <span class="program-category">{{ strtoupper($proker->status ?? 'PROGRAM') }}</span>
          <h3 class="program-title">{{ $proker->nama_proker }}</h3>
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
            <span class="program-category">{{ strtoupper($proker->status ?? 'PROGRAM') }}</span>
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

    </div>
  </section>

  <!-- Completed Activities -->
  <section class="completed-activities">
    <div class="container">
      <h2 class="section-title">Aktivitas yang Telah Terlaksana</h2>
      <p class="section-subtitle">Dokumentasi dari berbagai kegiatan dan program kerja yang sukses kami selenggarakan.</p>
      
      <div class="activity-grid">
        @forelse($kegiatans as $index => $kegiatan)
        @php
          $activityThumbnail = $kegiatan->documentations->first()
            ? asset('storage/' . $kegiatan->documentations->first()->image_path)
            : ($kegiatan->banner ? asset('storage/' . $kegiatan->banner) : 'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&q=80&w=600');
        @endphp
        <a href="{{ url('/detail-kegiatan', $kegiatan->slug) }}" class="activity-item" style="display: {{ $index < 3 ? 'block' : 'none' }};">
          <div class="activity-card">
            <img src="{{ $activityThumbnail }}" alt="{{ $kegiatan->nama_kegiatan }}">
            <div class="activity-overlay">
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
      </div>
      
      @if(count($kegiatans) > 3)
      <div style="text-align: center; margin-top: 40px; padding-bottom: 60px;">
        <button id="loadMoreBtn" class="btn btn-primary" onclick="loadMoreActivities()">Muat Lebih Banyak Aktivitas</button>
      </div>
      @endif

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
  <script type="module" src="./main.js"></script>
  <script>
    function loadMoreActivities() {
        const hiddenItems = document.querySelectorAll('.activity-item[style*="display: none"]');
        hiddenItems.forEach(item => {
            item.style.display = 'block';
        });
        document.getElementById('loadMoreBtn').style.display = 'none';
    }

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
  </script>
</body>
</html>
