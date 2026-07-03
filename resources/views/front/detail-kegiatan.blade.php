<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Kegiatan - Jabar Berdampak</title>
  @vite(['resources/css/base.css', 'resources/css/navbar.css', 'resources/css/hero.css', 'resources/css/footer.css', 'resources/css/modal.css', 'resources/css/filter.css', 'resources/js/navbar.js', 'resources/js/carousel.js', 'resources/js/modal.js', 'resources/js/filter.js'])
  <style>
    /* CSS Khusus Detail */
    .detail-hero {
      width: 100%;
      height: 400px;
      object-fit: cover;
      margin-top: -15px;
    }
    .detail-container {
      max-width: 900px;
      margin: -60px auto 60px;
      background: var(--bg-white);
      border-radius: 20px;
      padding: var(--spacing-xl);
      box-shadow: 0 10px 40px rgba(0,0,0,0.08);
      position: relative;
      z-index: 10;
    }
    .badge-status {
      display: inline-block;
      padding: 6px 16px;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 700;
      margin-bottom: 20px;
      text-transform: uppercase;
    }
    .badge-upcoming { background: #fff3cd; color: #856404; }
    .badge-ongoing { background: #cce5ff; color: #004085; }
    .badge-completed { background: #d4edda; color: #155724; }
    
    .detail-title {
      font-size: 2.5rem;
      color: var(--primary-green);
      margin-bottom: 24px;
      line-height: 1.2;
    }
    .meta-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-bottom: 40px;
      padding-bottom: 30px;
      border-bottom: 1px solid var(--bg-light);
    }
    .meta-item h4 {
      font-size: 0.9rem;
      color: var(--text-muted);
      margin-bottom: 5px;
    }
    .meta-item p {
      font-weight: 600;
      color: var(--text-dark);
      font-size: 1.1rem;
    }
    .detail-content {
      font-size: 1.1rem;
      line-height: 1.8;
      color: var(--text-dark);
    }
    .content-section {
      margin-bottom: 36px;
    }
    .content-section h2 {
      color: var(--primary-green);
      font-size: 1.45rem;
      margin-bottom: 12px;
    }
    .documentation-gallery {
      margin: 12px 0 36px;
    }
    .documentation-frame {
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      background: var(--bg-light);
      aspect-ratio: 16 / 9;
    }
    .documentation-frame img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .gallery-nav {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 42px;
      height: 42px;
      border: 0;
      border-radius: 50%;
      background: rgba(14, 59, 33, 0.86);
      color: white;
      cursor: pointer;
      font-size: 1.35rem;
      display: grid;
      place-items: center;
    }
    .gallery-nav:hover {
      background: var(--primary-green);
    }
    .gallery-nav.prev {
      left: 14px;
    }
    .gallery-nav.next {
      right: 14px;
    }
    .gallery-thumbs {
      display: flex;
      gap: 12px;
      overflow-x: auto;
      padding: 14px 2px 4px;
      scroll-snap-type: x mandatory;
    }
    .gallery-thumb {
      flex: 0 0 92px;
      height: 68px;
      border: 2px solid transparent;
      border-radius: 8px;
      padding: 0;
      overflow: hidden;
      background: transparent;
      cursor: pointer;
      scroll-snap-align: start;
    }
    .gallery-thumb img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .gallery-thumb.active {
      border-color: var(--primary-green);
    }
    @media (max-width: 768px) {
      .detail-container {
        padding: var(--spacing-lg);
        margin-top: -30px;
      }
      .detail-title {
        font-size: 2rem;
      }
      .gallery-nav {
        width: 36px;
        height: 36px;
      }
      .gallery-thumb {
        flex-basis: 78px;
        height: 58px;
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

  <!-- Hero Image (Thumbnail) -->
  <img src="{{ $kegiatan->thumbnail ? asset('storage/' . $kegiatan->thumbnail) : 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=1200' }}" alt="{{ $kegiatan->nama_kegiatan }}" class="detail-hero">

  <!-- Main Content -->
  <main class="container">
    <div class="detail-container">
      @php
        $statusClass = [
          'upcoming' => 'badge-upcoming',
          'ongoing' => 'badge-ongoing',
          'completed' => 'badge-completed',
        ][$kegiatan->status] ?? 'badge-upcoming';
      @endphp
      <span class="badge-status {{ $statusClass }}">{{ strtoupper($kegiatan->status ?? 'AKTIVITAS') }}</span>
      <h1 class="detail-title">{{ $kegiatan->nama_kegiatan }}</h1>
      
      <div class="meta-grid">
        <div class="meta-item">
          <h4>Tanggal Pelaksanaan</h4>
          <p>{{ $kegiatan->tanggal_kegiatan ? $kegiatan->tanggal_kegiatan->format('d M Y') : '-' }}</p>
        </div>
        <div class="meta-item">
          <h4>Lokasi</h4>
          <p>{{ $kegiatan->lokasi ?? '-' }}</p>
        </div>
      </div>

      @if($kegiatan->documentations->isNotEmpty())
      <section class="content-section documentation-gallery" data-activity-gallery>
        <h2>Dokumentasi Kegiatan</h2>
        <div class="documentation-frame">
          <img src="{{ asset('storage/' . $kegiatan->documentations->first()->image_path) }}" alt="Dokumentasi {{ $kegiatan->nama_kegiatan }}" data-gallery-main>
          @if($kegiatan->documentations->count() > 1)
            <button type="button" class="gallery-nav prev" data-gallery-prev aria-label="Dokumentasi sebelumnya">&lsaquo;</button>
            <button type="button" class="gallery-nav next" data-gallery-next aria-label="Dokumentasi berikutnya">&rsaquo;</button>
          @endif
        </div>
        @if($kegiatan->documentations->count() > 1)
        <div class="gallery-thumbs">
          @foreach($kegiatan->documentations as $documentation)
            <button type="button" class="gallery-thumb {{ $loop->first ? 'active' : '' }}" data-gallery-thumb data-src="{{ asset('storage/' . $documentation->image_path) }}" aria-label="Lihat dokumentasi {{ $loop->iteration }}">
              <img src="{{ asset('storage/' . $documentation->image_path) }}" alt="Thumbnail dokumentasi {{ $loop->iteration }}">
            </button>
          @endforeach
        </div>
        @endif
      </section>
      @endif

      <div class="detail-content">
        @if($kegiatan->deskripsi)
          <section class="content-section">
            <h2>Deskripsi</h2>
            {!! nl2br(e($kegiatan->deskripsi)) !!}
          </section>
        @endif
        
        <a href="{{ url('/program-kegiatan') }}" class="btn btn-outline-green">&larr; Kembali ke Aktivitas</a>
      </div>
    </div>
  </main>

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
    document.querySelectorAll('[data-activity-gallery]').forEach(function(gallery) {
      const mainImage = gallery.querySelector('[data-gallery-main]');
      const thumbs = Array.from(gallery.querySelectorAll('[data-gallery-thumb]'));
      const prev = gallery.querySelector('[data-gallery-prev]');
      const next = gallery.querySelector('[data-gallery-next]');
      let activeIndex = 0;

      function setActive(index) {
        if (!thumbs.length) {
          return;
        }

        activeIndex = (index + thumbs.length) % thumbs.length;
        const activeThumb = thumbs[activeIndex];
        mainImage.src = activeThumb.dataset.src;
        thumbs.forEach(function(thumb, thumbIndex) {
          thumb.classList.toggle('active', thumbIndex === activeIndex);
        });
        activeThumb.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
      }

      thumbs.forEach(function(thumb, index) {
        thumb.addEventListener('click', function() {
          setActive(index);
        });
      });

      if (prev) {
        prev.addEventListener('click', function() {
          setActive(activeIndex - 1);
        });
      }

      if (next) {
        next.addEventListener('click', function() {
          setActive(activeIndex + 1);
        });
      }
    });
  </script>
</body>
</html>
