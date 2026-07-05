<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $kegiatan->nama_kegiatan }} - Jabar Berdampak</title>
  @vite(['resources/css/base.css', 'resources/css/navbar.css', 'resources/css/hero.css', 'resources/css/footer.css', 'resources/css/modal.css', 'resources/css/filter.css', 'resources/js/navbar.js', 'resources/js/carousel.js', 'resources/js/modal.js', 'resources/js/filter.js'])
  <style>
    body {
      background: #f4f7f4;
    }
    .detail-hero-wrap {
      width: 100%;
      height: clamp(300px, 50vw, 640px);
      margin-top: -15px;
      position: relative;
      overflow: hidden;
      background: var(--primary-green);
    }
    .detail-hero-wrap::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(14, 59, 33, 0.06), rgba(14, 59, 33, 0.34));
      pointer-events: none;
    }
    .detail-hero {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .detail-container {
      max-width: 1100px;
      margin: -72px auto 72px;
      position: relative;
      z-index: 10;
    }
    .summary-panel {
      background: var(--bg-white);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 18px 52px rgba(14, 59, 33, 0.1);
    }
    .summary-header {
      max-width: 780px;
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
      margin-bottom: 34px;
      padding-bottom: 28px;
      border-bottom: 1px solid #e8eee8;
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
    .detail-content img,
    .detail-content video,
    .detail-content iframe {
      max-width: 100% !important;
      height: auto !important;
      border-radius: 8px;
    }
    .detail-content p {
      margin-bottom: 0;
    }
    .description-section {
      margin-top: 38px;
      padding-top: 38px;
      border-top: 1px solid #e8eee8;
    }
    .detail-section-title {
      color: var(--primary-green);
      font-size: 1.45rem;
      margin-bottom: 12px;
    }
    .detail-actions {
      margin-top: 34px;
    }
    .documentation-section {
      margin-top: 38px;
      padding-top: 38px;
      border-top: 1px solid #e8eee8;
    }
    .section-kicker {
      color: #9a7b00;
      font-size: 0.78rem;
      font-weight: 800;
      letter-spacing: 0.08em;
      margin-bottom: 8px;
      text-transform: uppercase;
    }
    .documentation-heading {
      max-width: 720px;
      margin-bottom: 22px;
    }
    .documentation-heading h2 {
      font-size: 1.7rem;
      margin-bottom: 8px;
    }
    .documentation-heading p {
      color: var(--text-muted);
      font-size: 1rem;
      margin: 0;
    }
    .documentation-layout {
      display: grid;
      grid-template-columns: minmax(0, 1.5fr) minmax(280px, 0.75fr);
      gap: 24px;
      align-items: stretch;
    }
    .documentation-gallery {
      min-width: 0;
    }
    .documentation-frame {
      position: relative;
      overflow: hidden;
      border-radius: 16px;
      background: #e8efe8;
      aspect-ratio: 16 / 10;
    }
    .documentation-frame img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }
    .documentation-counter {
      position: absolute;
      left: 16px;
      bottom: 16px;
      padding: 6px 12px;
      border-radius: 50px;
      background: rgba(14, 59, 33, 0.86);
      color: white;
      font-size: 0.82rem;
      font-weight: 700;
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
    .documentation-info {
      display: flex;
      min-width: 0;
      flex-direction: column;
      justify-content: space-between;
      gap: 18px;
      border-left: 4px solid var(--primary-gold);
      padding-left: 22px;
    }
    .documentation-info h3 {
      font-size: 1.25rem;
      line-height: 1.35;
      margin-bottom: 8px;
    }
    .documentation-info p {
      color: var(--text-muted);
      line-height: 1.7;
      margin: 0;
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
    .empty-documentation {
      border: 1px dashed #c7d6ca;
      border-radius: 14px;
      padding: 16px;
      color: var(--text-muted);
      background: #fbfdfb;
    }
    @media (max-width: 768px) {
      .detail-hero-wrap {
        height: clamp(260px, 58vw, 360px);
      }
      .detail-container {
        margin: -42px auto 54px;
      }
      .summary-panel {
        padding: 26px 20px;
        border-radius: 18px;
      }
      .detail-title {
        font-size: 2rem;
      }
      .documentation-layout {
        grid-template-columns: 1fr;
      }
      .documentation-info {
        border-left: 0;
        border-top: 4px solid var(--primary-gold);
        padding-left: 0;
        padding-top: 18px;
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
    
    .related-item h4 {
      transition: text-decoration 0.2s ease, color 0.2s ease;
    }
    .related-item:hover h4 {
      text-decoration: underline;
      color: var(--primary-light) !important;
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

  @php
    $heroImage = $kegiatan->banner
      ? asset('storage/' . $kegiatan->banner)
      : 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?auto=format&fit=crop&q=80&w=1200';
    $documentations = $kegiatan->documentations;
    $hasDocumentations = $documentations->isNotEmpty();
    $galleryCount = $hasDocumentations ? $documentations->count() : 1;
    $firstDocumentation = $documentations->first();
    $mainDocumentationImage = $hasDocumentations ? asset('storage/' . $firstDocumentation->image_path) : $heroImage;
    $mainDocumentationCaption = $hasDocumentations
      ? ($firstDocumentation->caption ?: 'Dokumentasi visual dari kegiatan ' . $kegiatan->nama_kegiatan . '.')
      : 'Gambar utama kegiatan sebagai gambaran awal dokumentasi.';
    $statusClass = [
      'upcoming' => 'badge-upcoming',
      'ongoing' => 'badge-ongoing',
      'completed' => 'badge-completed',
    ][$kegiatan->status] ?? 'badge-upcoming';
    $statusLabel = [
      'upcoming' => 'Akan Datang',
      'ongoing' => 'Sedang Berlangsung',
      'completed' => 'Selesai',
    ][$kegiatan->status] ?? 'Aktivitas';
  @endphp

  <!-- Hero Image (Banner) -->
  <div class="detail-hero-wrap">
    <img src="{{ $heroImage }}" alt="{{ $kegiatan->nama_kegiatan }}" class="detail-hero">
  </div>

  <!-- Main Content -->
  <main class="container">
    <div class="detail-container">
      <article class="summary-panel">
        <div class="summary-header">
          <span class="badge-status {{ $statusClass }}">{{ $statusLabel }}</span>
          <h1 class="detail-title">{{ $kegiatan->nama_kegiatan }}</h1>
        </div>

        <div class="meta-grid">
          <div class="meta-item">
            <h4>Tanggal Pelaksanaan</h4>
            <p>{{ $kegiatan->tanggal_kegiatan ? $kegiatan->tanggal_kegiatan->format('d M Y') : '-' }}</p>
          </div>
          <div class="meta-item">
            <h4>Lokasi</h4>
            <p>{{ $kegiatan->lokasi ?? '-' }}</p>
          </div>
          <div class="meta-item">
            <h4>Dokumentasi</h4>
            <p>{{ $hasDocumentations ? $documentations->count() . ' gambar' : 'Belum ditambahkan' }}</p>
          </div>
        </div>

        <section class="documentation-section" data-activity-gallery>
          <div class="documentation-heading">
            <div class="section-kicker">Dokumentasi</div>
            <h2>Gambaran Kegiatan</h2>
            <p>Rangkuman visual dari suasana, proses, dan momen penting kegiatan.</p>
          </div>

          <div class="documentation-layout">
            <div class="documentation-gallery">
              <div class="documentation-frame">
                <img src="{{ $mainDocumentationImage }}" alt="Dokumentasi {{ $kegiatan->nama_kegiatan }}" data-gallery-main>
                <div class="documentation-counter">
                  <span data-gallery-current>1</span>/<span>{{ $galleryCount }}</span>
                </div>
                @if($documentations->count() > 1)
                  <button type="button" class="gallery-nav prev" data-gallery-prev aria-label="Dokumentasi sebelumnya">&lsaquo;</button>
                  <button type="button" class="gallery-nav next" data-gallery-next aria-label="Dokumentasi berikutnya">&rsaquo;</button>
                @endif
              </div>
            </div>

            <div class="documentation-info">
              <div>
                <div class="section-kicker">Overview Gambar</div>
                <h3 data-gallery-title>{{ $hasDocumentations ? 'Dokumentasi 1' : 'Dokumentasi Utama' }}</h3>
                <p data-gallery-caption>{{ $mainDocumentationCaption }}</p>
              </div>

              @if($hasDocumentations)
                <div class="gallery-thumbs" aria-label="Daftar dokumentasi kegiatan">
                  @foreach($documentations as $documentation)
                    @php
                      $documentationImage = asset('storage/' . $documentation->image_path);
                      $documentationCaption = $documentation->caption ?: 'Dokumentasi visual dari kegiatan ' . $kegiatan->nama_kegiatan . '.';
                    @endphp
                    <button
                      type="button"
                      class="gallery-thumb {{ $loop->first ? 'active' : '' }}"
                      data-gallery-thumb
                      data-src="{{ $documentationImage }}"
                      data-title="Dokumentasi {{ $loop->iteration }}"
                      data-caption="{{ $documentationCaption }}"
                      aria-label="Lihat dokumentasi {{ $loop->iteration }}"
                    >
                      <img src="{{ $documentationImage }}" alt="Thumbnail dokumentasi {{ $loop->iteration }}">
                    </button>
                  @endforeach
                </div>
              @else
                <div class="empty-documentation">Dokumentasi tambahan belum tersedia.</div>
              @endif
            </div>
          </div>
        </section>

        <section class="detail-content description-section">
          <h2 class="detail-section-title">Deskripsi</h2>
          <p>{!! nl2br(e($kegiatan->deskripsi ?: 'Deskripsi kegiatan belum tersedia.')) !!}</p>
        </section>

        <!-- Share Widget -->
        <div class="share-widget" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid var(--bg-light); display: flex; flex-wrap: wrap; align-items: center; gap: 16px;">
          <strong style="color: var(--text-dark);">Bagikan:</strong>
          <button onclick="window.copyLinkToClipboard(window.location.href)" class="share-btn copy-link" style="background: var(--bg-light); color: var(--text-dark); padding: 8px 16px; border: 1px solid #ddd; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; cursor: pointer; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg> Salin Tautan</button>
          <a href="https://api.whatsapp.com/send?text={{ urlencode($kegiatan->nama_kegiatan . ' - ' . url()->current()) }}" target="_blank" class="share-btn whatsapp" style="background: #25D366; color: white; padding: 8px 16px; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg> WhatsApp</a>
          <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($kegiatan->nama_kegiatan) }}" target="_blank" class="share-btn twitter" style="background: #000000; color: white; padding: 8px 16px; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg> X (Twitter)</a>
          <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="share-btn facebook" style="background: #1877F2; color: white; padding: 8px 16px; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg> Facebook</a>
          <a href="https://www.instagram.com/" target="_blank" class="share-btn instagram" style="background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); color: white; padding: 8px 16px; border-radius: 50px; display: flex; align-items: center; gap: 8px; font-weight: 500; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg> Instagram</a>
        </div>

      @php
        $relatedKegiatans = \App\Models\Kegiatan::with('documentations')->where('id', '!=', $kegiatan->id)
                              ->latest()
                              ->take(3)
                              ->get();
      @endphp
      
      @if($relatedKegiatans->count() > 0)
      <div class="related-articles" style="margin-top: 50px; padding-top: 40px; border-top: 2px solid var(--bg-light);">
        <h3 style="color: var(--primary-green); margin-bottom: 20px; font-size: 1.5rem;">Aktivitas Lainnya</h3>
        
        <div style="position: relative; margin: 0 -10px; padding: 0 10px;">
            <button class="carousel-btn prev-btn related-prev" aria-label="Previous" style="position: absolute; left: -20px; top: 50%; transform: translateY(-50%); z-index: 10; width: 40px; height: 40px; border-radius: 50%; background: var(--primary-green); color: white; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            
            <div class="related-track" style="display: flex; gap: 20px; overflow-x: auto; scroll-snap-type: x mandatory; scrollbar-width: none; padding-bottom: 20px;">
              <style>.related-track::-webkit-scrollbar { display: none; }</style>
              @foreach($relatedKegiatans as $related)
              <a href="{{ url('/detail-kegiatan', $related->slug) }}" class="related-item" style="flex: 0 0 clamp(260px, 45%, 320px); scroll-snap-align: start; display: block; background: var(--bg-white); border: 1px solid #e8eee8; border-radius: 12px; overflow: hidden; transition: transform 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.03);" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <img src="{{ $related->banner ? asset('storage/' . $related->banner) : 'https://images.unsplash.com/photo-1618477461853-cf6ed80fbfc9?auto=format&fit=crop&q=80&w=400' }}" alt="{{ $related->nama_kegiatan }}" style="width: 100%; height: 160px; object-fit: cover;">
                <div style="padding: 20px;">
                  <span style="color: var(--accent-green); font-size: 0.75rem; font-weight: 700; text-transform: uppercase;">{{ match(strtolower($related->status)) { 'upcoming' => 'Akan Datang', 'ongoing' => 'Sedang Berjalan', 'completed' => 'Selesai', default => 'Aktivitas' } }}</span>
                  <h4 style="margin: 8px 0 0; font-size: 1.1rem; color: var(--text-dark); line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $related->nama_kegiatan }}</h4>
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

        <div class="detail-actions" style="text-align: center;">
          <a href="{{ url('/program-kegiatan') }}" class="btn btn-outline-green">&larr; Kembali ke Aktivitas</a>
        </div>
      </article>
    </div>
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
    document.querySelectorAll('[data-activity-gallery]').forEach(function(gallery) {
      const mainImage = gallery.querySelector('[data-gallery-main]');
      const title = gallery.querySelector('[data-gallery-title]');
      const caption = gallery.querySelector('[data-gallery-caption]');
      const current = gallery.querySelector('[data-gallery-current]');
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
        mainImage.alt = activeThumb.getAttribute('aria-label') || mainImage.alt;
        if (title) {
          title.textContent = activeThumb.dataset.title || 'Dokumentasi';
        }
        if (caption) {
          caption.textContent = activeThumb.dataset.caption || '';
        }
        if (current) {
          current.textContent = activeIndex + 1;
        }
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
