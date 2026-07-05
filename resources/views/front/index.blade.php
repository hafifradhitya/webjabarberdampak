<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jabar Berdampak - Organisasi Lingkungan & Kepemudaan</title>
  <meta name="description"
    content="Website resmi Jabar Berdampak, organisasi pemuda yang berfokus pada penghijauan, ekonomi kreatif, dan pengembangan kepemimpinan." />
  @vite(['resources/css/base.css', 'resources/css/navbar.css', 'resources/css/hero.css', 'resources/css/footer.css', 'resources/css/modal.css', 'resources/css/filter.css', 'resources/js/navbar.js', 'resources/js/carousel.js', 'resources/js/modal.js', 'resources/js/filter.js'])
  <style>
    /* Specific styles for index.html */
    .features {
      padding: var(--spacing-xl) 0;
      background-color: var(--bg-white);
    }

    .about-organization {
      padding: 88px 0;
      background: linear-gradient(180deg, var(--primary-green) 0%, var(--primary-green) 46%, #f5faf5 46%, #f5faf5 100%);
      overflow: hidden;
    }

    .info-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      color: var(--primary-gold);
      font-size: 0.88rem;
      font-weight: 700;
      letter-spacing: 0;
      margin-bottom: 18px;
      text-transform: uppercase;
    }

    .info-eyebrow::before {
      content: "";
      width: 9px;
      height: 9px;
      border-radius: 50%;
      background: var(--primary-gold);
      box-shadow: 0 0 0 4px rgba(250, 208, 44, 0.2);
    }

    .about-grid {
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(360px, 0.9fr);
      gap: 48px;
      align-items: center;
    }

    .about-copy h2 {
      color: var(--text-light);
      font-size: 3.1rem;
      line-height: 1.12;
      margin-bottom: 22px;
    }

    .about-highlight {
      color: var(--primary-gold);
    }

    .about-copy p {
      color: rgba(255, 255, 255, 0.84);
      font-size: 1.05rem;
      line-height: 1.85;
      max-width: 680px;
      margin-bottom: 18px;
    }

    .about-visual {
      position: relative;
      padding-bottom: 74px;
    }

    .about-photo {
      position: relative;
      min-height: 370px;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 26px 70px rgba(0, 0, 0, 0.28);
    }

    .about-photo img {
      width: 100%;
      height: 100%;
      min-height: 370px;
      object-fit: cover;
      display: block;
    }

    .about-photo::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(14, 59, 33, 0.08), rgba(14, 59, 33, 0.46));
    }

    .about-stat-panel {
      position: absolute;
      left: 28px;
      right: 28px;
      bottom: 0;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      background: var(--bg-white);
      border: 1px solid rgba(14, 59, 33, 0.1);
      border-radius: 8px;
      box-shadow: 0 20px 50px rgba(14, 59, 33, 0.18);
      overflow: hidden;
    }

    .about-stat {
      padding: 22px 20px;
      border-right: 1px solid rgba(14, 59, 33, 0.1);
    }

    .about-stat:last-child {
      border-right: 0;
    }

    .about-stat strong {
      display: block;
      color: var(--primary-green);
      font-size: 2.15rem;
      line-height: 1;
      margin-bottom: 8px;
    }

    .about-stat span {
      color: var(--text-muted);
      font-size: 0.92rem;
      line-height: 1.45;
    }

    .impact-block {
      margin-top: 76px;
    }

    .impact-intro {
      max-width: 760px;
      margin-bottom: 32px;
    }

    .impact-intro .info-eyebrow {
      color: var(--primary-green);
    }

    .impact-intro .info-eyebrow::before {
      background: var(--primary-green);
      box-shadow: 0 0 0 4px rgba(14, 59, 33, 0.12);
    }

    .impact-intro h2 {
      color: var(--primary-green);
      font-size: 2.65rem;
      line-height: 1.18;
      margin-bottom: 14px;
    }

    .impact-intro p {
      color: var(--text-muted);
      font-size: 1.05rem;
      line-height: 1.8;
      margin: 0;
    }

    .info-card-grid,
    .impact-card-grid {
      display: grid;
      gap: 20px;
    }

    .info-card-grid {
      grid-template-columns: repeat(3, 1fr);
    }

    .impact-card-grid {
      grid-template-columns: repeat(4, 1fr);
    }

    .info-card,
    .impact-card {
      background: var(--bg-white);
      border: 1px solid rgba(14, 59, 33, 0.11);
      border-radius: 8px;
      padding: 28px;
      min-height: 210px;
      box-shadow: 0 14px 34px rgba(14, 59, 33, 0.07);
    }

    .info-icon,
    .impact-icon {
      width: 44px;
      height: 44px;
      border-radius: 8px;
      display: grid;
      place-items: center;
      margin-bottom: 22px;
    }

    .info-icon {
      background: rgba(14, 59, 33, 0.09);
      color: var(--primary-green);
    }

    .impact-icon {
      background: rgba(250, 208, 44, 0.16);
      color: var(--primary-gold);
    }

    .impact-card {
      background: linear-gradient(180deg, var(--secondary-green), var(--primary-green));
      border-color: rgba(255, 255, 255, 0.12);
      color: var(--text-light);
    }

    .impact-card h3 {
      color: var(--text-light);
    }

    .impact-card p {
      color: rgba(255, 255, 255, 0.78);
    }

    .info-card h3,
    .info-card h3 {
      color: #253225;
      font-size: 1.25rem;
      margin-bottom: 12px;
    }

    .info-card p {
      color: #626a62;
      line-height: 1.7;
      margin: 0;
    }

    .vision-mission {
      background-color: var(--bg-light);
      padding: var(--spacing-xl) 0;
    }

    .vm-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: var(--spacing-lg);
      margin-top: var(--spacing-lg);
    }

    .vm-card {
      background: var(--bg-white);
      padding: var(--spacing-lg);
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      position: relative;
    }

    .vm-card h3 {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: var(--spacing-md);
    }

    .vm-icon {
      width: 48px;
      height: 48px;
      background-color: rgba(56, 176, 0, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary-green);
    }

    .org-structure {
      padding: var(--spacing-xl) 0;
      background-color: var(--bg-white);
      overflow-x: auto;
      /* Enable scrolling for wide trees */
    }

    .org-wrapper {
      position: relative;
      max-width: 1000px;
      margin: 0 auto;
    }

    .carousel-container {
      width: 100%;
      overflow: hidden;
      padding: var(--spacing-md) 0;
      border-radius: 20px;
    }

    .carousel-track {
      display: flex;
      transition: transform 0.5s ease-in-out;
      width: 100%;
      gap: 20px;
    }

    .carousel-card {
      background: var(--bg-white);
      padding: 24px 20px;
      border-radius: 20px;
      box-shadow: 0 14px 34px rgba(14, 59, 33, 0.07);
      text-align: center;
      flex: 0 0 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      box-sizing: border-box;
      border: 1px solid rgba(14, 59, 33, 0.11);
      border-top: 4px solid var(--primary-gold);
      transition: all 0.3s ease;
      position: relative;
    }

    .carousel-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(14, 59, 33, 0.12);
    }

    @media (min-width: 768px) {
      .carousel-card {
        flex: 0 0 calc(50% - 10px);
      }
    }

    @media (min-width: 1024px) {
      .carousel-card {
        flex: 0 0 calc(33.333% - 13.33px);
      }
    }

    .profile-img {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 12px;
      border: 4px solid var(--bg-white);
      box-shadow: 0 8px 24px rgba(14, 59, 33, 0.15);
      transition: transform 0.3s ease;
    }

    .carousel-card:hover .profile-img {
      transform: scale(1.05);
    }

    .profile-name {
      font-weight: 700;
      color: var(--primary-green);
      font-size: 1.15rem;
      margin-bottom: 4px;
      line-height: 1.2;
    }

    .profile-role {
      color: var(--text-muted);
      font-size: 0.9rem;
    }

    .profile-divisi {
      margin-top: 8px;
      background: rgba(56, 176, 0, 0.1);
      color: var(--primary-green);
      padding: 4px 12px;
      border-radius: 50px;
      font-size: 0.8rem;
      font-weight: 600;
    }

    .btn-detail {
      margin-top: 16px;
      padding: 10px 24px;
      font-size: 0.95rem;
      background-color: var(--primary-gold);
      color: var(--primary-green);
      border-radius: 50px;
      text-decoration: none;
      font-weight: 700;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn-detail::after {
      content: "→";
      transition: transform 0.3s ease;
    }

    .btn-detail:hover {
      background-color: #d4af37;
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(250, 208, 44, 0.3);
    }

    .btn-detail:hover::after {
      transform: translateX(4px);
    }

    .carousel-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: var(--bg-white);
      color: var(--primary-green);
      border: 1px solid rgba(14, 59, 33, 0.1);
      width: 48px;
      height: 48px;
      border-radius: 50%;
      cursor: pointer;
      z-index: 10;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      box-shadow: 0 6px 16px rgba(14, 59, 33, 0.1);
    }

    .carousel-btn:hover {
      background: var(--primary-green);
      color: var(--bg-white);
      transform: translateY(-50%) scale(1.1);
      box-shadow: 0 8px 20px rgba(14, 59, 33, 0.2);
    }

    .prev-btn {
      left: -70px;
    }

    .next-btn {
      right: -70px;
    }

    @media (max-width: 1200px) {
      .prev-btn {
        left: -20px;
      }
      .next-btn {
        right: -20px;
      }
    }

    @media (max-width: 768px) {
      .prev-btn {
        left: 10px;
      }
      .next-btn {
        right: 10px;
      }
    }

    /* Modal Styles */
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.6);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.3s;
    }

    .modal-overlay.active {
      opacity: 1;
      pointer-events: auto;
    }

    .modal-content {
      background: var(--bg-white);
      width: 95%;
      max-width: 800px;
      max-height: 90vh;
      display: flex;
      flex-direction: column;
      border-radius: 20px;
      position: relative;
      transform: translateY(-20px);
      transition: transform 0.3s;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
      overflow: hidden;
    }

    .modal-overlay.active .modal-content {
      transform: translateY(0);
    }

    .modal-close {
      position: absolute;
      top: 16px;
      right: 20px;
      background: var(--bg-white);
      border: none;
      font-size: 2rem;
      cursor: pointer;
      color: var(--text-muted);
      line-height: 1;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
      z-index: 10;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .modal-close:hover {
      color: #ff4d4d;
      background: #fff0f0;
      transform: scale(1.1);
    }

    .modal-body {
      display: flex;
      flex-direction: column;
      flex: 1;
      min-height: 0;
    }

    .modal-left {
      padding: 40px 24px;
      background: #fcfcfc;
      text-align: center;
      border-bottom: 1px solid rgba(14, 59, 33, 0.08);
      position: relative;
      flex-shrink: 0;
    }

    .modal-left::after {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 60px;
      background: var(--primary-green);
    }

    .modal-right {
      padding: 32px 32px;
      text-align: left;
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 0;
    }

    @media (min-width: 768px) {
      .modal-body {
        flex-direction: row;
      }
      .modal-left {
        width: 35%;
        border-bottom: none;
        border-right: 1px solid rgba(14, 59, 33, 0.08);
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 60px;
      }
      .modal-left::after {
        height: 100px;
      }
      .modal-right {
        width: 65%;
        padding: 40px 40px;
      }
    }

    .modal-img {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 20px;
      border: 4px solid var(--bg-white);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 2;
    }

    .modal-name {
      font-size: 1.4rem;
      color: var(--primary-green);
      margin-bottom: 4px;
      line-height: 1.3;
      font-weight: 700;
    }

    .modal-role {
      font-weight: 700;
      color: var(--text-muted);
      font-size: 1.05rem;
      margin: 0 0 10px 0;
    }

    .modal-divisi {
      display: inline-block;
      background: rgba(250, 208, 44, 0.15);
      color: #9c7b05;
      padding: 6px 16px;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 700;
      margin: 0 0 20px 0;
    }

    .modal-socials {
      display: flex;
      gap: 12px;
      justify-content: center;
      margin-top: 8px;
    }

    .modal-socials a {
      color: var(--text-muted);
      background: #fff;
      border: 1px solid rgba(14, 59, 33, 0.1);
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      transition: all 0.3s;
    }

    .modal-socials a:hover {
      color: var(--bg-white);
      background: var(--primary-green);
      border-color: var(--primary-green);
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(14, 59, 33, 0.15);
    }

    .modal-desc {
      text-align: left;
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 0;
    }

    .modal-desc h4 {
      margin-bottom: 12px;
      color: var(--text-muted);
      font-size: 0.95rem;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .modal-desc-text {
      padding-right: 16px;
      flex: 1;
      overflow-y: auto;
      min-height: 0;
    }

    .modal-desc-text::-webkit-scrollbar {
      width: 6px;
    }
    .modal-desc-text::-webkit-scrollbar-track {
      background: #f1f1f1; 
      border-radius: 4px;
    }
    .modal-desc-text::-webkit-scrollbar-thumb {
      background: #c1c1c1; 
      border-radius: 4px;
    }
    .modal-desc-text::-webkit-scrollbar-thumb:hover {
      background: #a8a8a8; 
    }

    .modal-desc p {
      font-size: 0.95rem;
      color: #4a5568;
      line-height: 1.7;
      margin: 0;
    }

    @media (max-width: 1024px) {
      .about-grid {
        grid-template-columns: 1fr;
        gap: 36px;
      }

      .about-copy h2 {
        font-size: 2.6rem;
      }

      .impact-card-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      .about-organization {
        padding: 56px 0;
        background: linear-gradient(180deg, var(--primary-green) 0%, var(--primary-green) 25%, #f5faf5 25%, #f5faf5 100%);
      }

      .about-grid,
      .info-card-grid,
      .impact-card-grid {
        grid-template-columns: 1fr;
      }

      .about-copy h2,
      .impact-intro h2 {
        font-size: 2rem;
      }

      .about-visual {
        padding-bottom: 0;
      }

      .about-photo,
      .about-photo img {
        min-height: 280px;
      }

      .about-stat-panel {
        position: static;
        grid-template-columns: 1fr;
        margin-top: 14px;
      }

      .about-stat {
        border-right: 0;
        border-bottom: 1px solid rgba(14, 59, 33, 0.1);
      }

      .about-stat:last-child {
        border-bottom: 0;
      }

      .info-card,
      .impact-card {
        min-height: auto;
      }

      .vm-grid {
        grid-template-columns: 1fr;
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
          <li><a href="{{ url('/') }}" class="active">Beranda</a></li>
          <li><a href="{{ url('/program-kegiatan') }}">Program & Aktivitas</a></li>
          <li><a href="{{ url('/berita-artikel') }}">Artikel</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container hero-content">
      <h1>Melestarikan Alam, Membangun Pemimpin Masa Depan</h1>
      <p>Memberdayakan pemuda untuk menjaga masa depan bumi kita melalui tindakan berkelanjutan, pendidikan
        kepemimpinan, dan kesadaran lingkungan.</p>
      <div class="hero-buttons">
        <a href="{{ url('/program-kegiatan') }}" class="btn btn-gold">Lihat Program Kami</a>
        <a href="#about" class="btn btn-outline">Pelajari Lebih Lanjut</a>
      </div>
    </div>
  </section>

  <!-- About Organization -->
  <section id="about" class="about-organization">
    <div class="container">
      <div class="about-grid">
        <div class="about-copy">
          <div class="info-eyebrow">Tentang Kami</div>
          <h2>Setiap wilayah punya cerita, kami rajut jadi <span class="about-highlight">gerakan berdampak</span></h2>
          <p>Jabar Berdampak adalah organisasi kepemudaan dan gerakan relawan yang berfokus pada pengembangan kapasitas
            pemuda, kepedulian lingkungan, aksi sosial, serta pemberdayaan masyarakat di Jawa Barat.</p>
          <p>BPH (Badan Pengurus Harian) menjalankan koordinasi harian, memastikan program berjalan terarah, relawan
            terhubung dengan peran yang sesuai, dan setiap kegiatan tercatat sebagai bagian dari dampak bersama.</p>
        </div>

        <div class="about-visual">
          <div class="about-photo">
            <img src="https://images.unsplash.com/photo-1527525443983-6e60c75fff46?auto=format&fit=crop&q=80&w=900"
              alt="Relawan muda berdiskusi dan berkolaborasi">
          </div>
          <div class="about-stat-panel" aria-label="Ringkasan Jabar Berdampak">
            <div class="about-stat">
              <strong>27</strong>
              <span>Kabupaten dan kota cakupan jaringan relawan</span>
            </div>
            <div class="about-stat">
              <strong>1</strong>
              <span>Basis data terpadu untuk pendataan anggota dan kegiatan</span>
            </div>
            <div class="about-stat">
              <strong>4</strong>
              <span>Bidang dampak utama yang dijalankan bersama</span>
            </div>
          </div>
        </div>
      </div>

      <div class="impact-block">
        <div class="impact-intro">
          <div class="info-eyebrow">Kenapa Pendataan</div>
          <h2>Data yang rapi, dampak yang nyata</h2>
          <p>Pendataan bukan sekadar administrasi. Ini fondasi agar program, bantuan, pelatihan, dan dokumentasi
            kegiatan bisa tersusun jelas, dapat dievaluasi, serta sampai kepada orang dan wilayah yang tepat.</p>
        </div>

        <div class="info-card-grid">
          <article class="info-card">
            <div class="info-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M20 6 9 17l-5-5"></path>
                <rect x="3" y="3" width="18" height="18" rx="5"></rect>
              </svg>
            </div>
            <h3>Identitas yang jelas</h3>
            <p>Setiap anggota dan relawan terverifikasi sejak awal, sehingga koordinasi program lebih akuntabel dan
              bebas data ganda.</p>
          </article>

          <article class="info-card">
            <div class="info-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M16 8c-2 0-5 1-6 4-1 2 0 4 2 4 3 0 5-4 4-8Z"></path>
              </svg>
            </div>
            <h3>Sebaran yang merata</h3>
            <p>Data wilayah membantu pengurus menyalurkan program ke titik yang paling membutuhkan di tingkat kabupaten
              dan kota.</p>
          </article>

          <article class="info-card">
            <div class="info-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M4 19V5"></path>
                <path d="M9 19v-8"></path>
                <path d="M14 19v-5"></path>
                <path d="M19 19V9"></path>
                <path d="M3 19h18"></path>
              </svg>
            </div>
            <h3>Laporan yang terbuka</h3>
            <p>Setiap kegiatan terdokumentasi rapi agar kontribusi dapat dipertanggungjawabkan kepada publik dan sesama
              relawan.</p>
          </article>
        </div>
      </div>

      <div class="impact-block">
        <div class="impact-intro">
          <div class="info-eyebrow">Bidang Dampak</div>
          <h2>Empat motif gerakan relawan</h2>
          <p>Program Jabar Berdampak bergerak dalam empat bidang utama, menyesuaikan kapasitas relawan dan kebutuhan
            masyarakat di lapangan.</p>
        </div>

        <div class="impact-card-grid">
          <article class="impact-card">
            <div class="impact-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M11 20A7 7 0 0 1 4 13c0-5 7-9 16-9 0 9-4 16-9 16Z"></path>
                <path d="M9 15c2-4 5-7 11-11"></path>
              </svg>
            </div>
            <h3>Lingkungan</h3>
            <p>Penghijauan, pengelolaan sampah, konservasi, dan pelatihan praktik ramah lingkungan.</p>
          </article>

          <article class="impact-card">
            <div class="impact-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="m22 10-10-5-10 5 10 5 10-5Z"></path>
                <path d="M6 12v5c3 2 9 2 12 0v-5"></path>
              </svg>
            </div>
            <h3>Pendidikan</h3>
            <p>Pendampingan belajar, literasi, pelatihan kepemimpinan, dan pengembangan keterampilan pemuda.</p>
          </article>

          <article class="impact-card">
            <div class="impact-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path
                  d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8Z">
                </path>
              </svg>
            </div>
            <h3>Sosial & Kemanusiaan</h3>
            <p>Bantuan warga, aksi tanggap kebutuhan sosial, dan pendampingan komunitas rentan.</p>
          </article>

          <article class="impact-card">
            <div class="impact-icon">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M3 17 9 11l4 4 7-7"></path>
                <path d="M14 8h6v6"></path>
              </svg>
            </div>
            <h3>Ekonomi Kerakyatan</h3>
            <p>Pendampingan UMKM, pelatihan wirausaha, ekonomi kreatif, dan penguatan peluang usaha lokal.</p>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- Vision & Mission -->
  <section id="vision" class="vision-mission">
    <div class="container">
      <h2 class="section-title">Visi & Misi</h2>
      <p class="section-subtitle">Tujuan dan komitmen kami untuk membawa dampak positif bagi lingkungan dan masyarakat.
      </p>

      <div class="vm-grid">
        <div class="vm-card">
          <h3>
            <div class="vm-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M2 12h4l3-9 5 18 3-9h5" />
              </svg>
            </div>
            Visi Kami
          </h3>
          <p>Menjadi wadah pembentukan generasi muda yang peduli lingkungan, berjiwa pemimpin, berwawasan luas, serta
            mampu berperan aktif dalam menegakkan nilai-nilai keberlanjutan dan kelestarian alam di Jawa Barat dan
            sekitarnya.</p>
        </div>

        <div class="vm-card">
          <h3>
            <div class="vm-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <polygon
                  points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
              </svg>
            </div>
            Misi Kami
          </h3>
          <ul>
            <li>• Mendidik generasi muda menjadi pemimpin yang bertanggung jawab terhadap lingkungan.</li>
            <li>• Membangun ekonomi kreatif berbasis daur ulang dan inovasi hijau.</li>
            <li>• Mendorong aksi nyata melalui program penghijauan dan restorasi alam.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Organization Structure -->
  <section class="org-structure">
    <div class="container">
      <h2 class="section-title">Struktur Organisasi</h2>
      <p class="section-subtitle">Para individu di balik Jabar Berdampak yang berkomitmen untuk mewujudkan visi dan misi
        kami.</p>

      <!-- Carousel Slider -->
      <div class="org-wrapper">
        <button class="carousel-btn prev-btn" id="orgPrevBtn" aria-label="Previous">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <div class="carousel-container">
          <div class="carousel-track" id="orgCarousel">
            <!-- BPH -->
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/8.jpeg') }}" alt="Griyandi"
                class="profile-img">
              <div class="profile-name">Griyandi</div>
              <div class="profile-role">Ketua</div>
              <div class="profile-divisi">BPH</div>
              <div class="profile-desc" style="display: none;">
                GRIYANDI<br>
                INSTAGRAM: ya_ndhi<br><br>
                MAHASISWA SEKOLAH TINGGI ILMU DAKWAH MOHAMMAD NATSIR BEKASI<br><br>
                KETUA LEADERSHIP TRAINING CENTER STID MOHAMMAD NATSIR BEKASI<br><br>
                FOUNDER JAWA BARAT BERDAMPAK
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/2.jpeg') }}"
                alt="Muhamad Farhan Fauzi" class="profile-img">
              <div class="profile-name">Muhamad Farhan Fauzi</div>
              <div class="profile-role">Wakil Ketua</div>
              <div class="profile-divisi">BPH</div>
              <div class="profile-desc" style="display: none;">
                <strong>Biodata Singkat</strong><br><br>
                Nama: Muhamad Farhan Fauzi<br>
                Ig : fhnfauzii<br>
                Minat: Kepemimpinan, Public Speaking, Pengembangan Soft Skill, dan Pengembangan Komunitas<br>
                Motto: "Terus belajar, bertumbuh, dan memberikan dampak positif bagi sekitar."<br><br>
                <strong>Perkenalan singkat</strong><br>
                Halo semuanya, perkenalkan nama saya Muhamad Farhan Fauzi. Saat ini saya dipercaya sebagai Wakil Ketua
                Komunitas Jabar Berdampak. Saya memiliki ketertarikan pada bidang kepemimpinan, public speaking, dan
                pengembangan soft skill. Melalui peran ini, saya berkomitmen untuk berkontribusi dalam membangun
                komunitas yang aktif, kolaboratif, dan memberikan manfaat bagi masyarakat. Senang bisa bertemu dan
                belajar bersama teman-teman semua.
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/gita.jpeg') }}"
                alt="Gita Nurazizah" class="profile-img">
              <div class="profile-name">Gita Nurazizah</div>
              <div class="profile-role">Sekretaris 1</div>
              <div class="profile-divisi">BPH</div>
              <div class="profile-desc" style="display: none;">
                <strong>Biografi:</strong><br>
                Gita Nurazizah merupakan mahasiswi Universitas Islam Negeri Siber Syekh Nurjati Cirebon yang aktif
                dalam bidang kepemudaan, kepemimpinan, dan organisasi. Saat ini merupakan Founder Duta Inspirator Muda
                Indonesia, sekaligus mengemban amanah sebagai Sekretaris Umum 2 HIMA-ILHA periode 2026-2027 dan
                Pengurus Pusat Duta Prestasi Muda Indonesia. Berbagai prestasi tingkat nasional telah diraih di bidang
                akademik, keagamaan, kepenulisan, dan desain poster sebagai wujud dedikasi dalam mengembangkan potensi
                diri. Setiap proses menjadi kesempatan untuk terus belajar, bertumbuh, berkarya, serta menghadirkan
                manfaat dan dampak positif bagi masyarakat.<br><br>
                <strong>Deskripsi Singkat:</strong><br>
                Percaya bahwa ilmu, kepemimpinan, dan kepedulian merupakan fondasi untuk menciptakan perubahan yang
                bermakna. Berkomitmen untuk terus bertumbuh, menginspirasi, serta menghadirkan manfaat melalui karya,
                kolaborasi, dan pengabdian kepada masyarakat.
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/7.jpeg') }}"
                alt="Nabila Syafia Tanjung" class="profile-img">
              <div class="profile-name">Nabila Syafia Tanjung</div>
              <div class="profile-role">Sekretaris 2</div>
              <div class="profile-divisi">BPH</div>
              <div class="profile-desc" style="display: none;">
                <strong>Biografi:</strong><br>
                Nabila Syafia Tanjung merupakan siswi kelas XI jurusan Akuntansi di SMKS Sandikta. Saat ini dipercaya
                sebagai Sekretaris 2 Komunitas Jabar Berdampak. Memiliki ketertarikan pada bidang administrasi,
                akuntansi, komunikasi, dan pengembangan diri. Senang mempelajari hal-hal baru serta terus berusaha
                mengembangkan kemampuan melalui berbagai pengalaman dan kesempatan belajar.<br><br>
                <strong>Perkenalan Singkat:</strong><br>
                Halo, saya Nabila Syafia Tanjung. Senang dapat menjadi bagian dari Komunitas Jabar Berdampak sebagai
                Sekretaris 2. Semoga melalui komunitas ini saya dapat terus belajar, berkolaborasi, dan memberikan
                kontribusi positif bagi komunitas maupun masyarakat.
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/edgina.jpeg') }}"
                alt="Edgina Anastasia" class="profile-img">
              <div class="profile-name">Edgina Anastasia</div>
              <div class="profile-role">Bendahara</div>
              <div class="profile-divisi">BPH</div>
              <div class="profile-desc" style="display: none;">
                <strong>Nama:</strong> Edgina Anastasia<br>
                <strong>Instagram:</strong> xorain_cutee<br>
                <strong>Divisi:</strong> Bendahara<br><br>
                Seorang pelajar yang aktif dalam bidang akademik, organisasi, dan kepemudaan. Peraih Medali Emas Olimpiade Bahasa Indonesia Tingkat Nasional dan Medali Perak Lomba Bahasa Indonesia Tingkat Nasional.<br><br>
                Pernah menjabat sebagai Bendahara MPK, Ketua Ekstrakurikuler Informatika Club, serta Duta Inisiatif Indonesia. 
                Memiliki minat yang besar dalam bidang kepemimpinan, pengembangan diri, dan pemberdayaan generasi muda, serta berkomitmen untuk terus berkarya dan memberikan dampak positif bagi masyarakat.
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>

            <!-- Divisi Humas -->
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/11.jpeg') }}"
                alt="Ai Risa Yuliandini" class="profile-img">
              <div class="profile-name">Ai Risa Yuliandini</div>
              <div class="profile-role">Koordinator</div>
              <div class="profile-divisi">Divisi Humas</div>
              <div class="profile-desc" style="display: none;">
                Nama Lengkap: Ai Risa Yuliandini<br>
                Domisili: Desa Bojong, Kec. Rongga, Kab.Bandung barat, Provinsi Jawa barat<br>
                Jenis Kelamin: Perempuan<br>
                Status Keaktifan: Aktif<br>
                Divisi yang Dipilih: HUMAS/Public Relation<br>
                Username Instagram: @airisaofficial<br>
                Username Youtube: Ai Risa Official<br>
                Username TikTok: @airisaofficial<br>
                Foto Diri: -<br><br>
                Deskripsi Singkat Tentang Diri: Mahasiswa aktif, adaptif, kontributif, komunikatif, tanggung jawab,
                pengalaman sebagai Brand Ambassador open your mind indonesia, Brand Ambassador Prodi Hubungan Masyarakat
                dan Komunikasi digital, Narasumber podcast aksi menginspirasi, Narasumber Program Diksi, Host
                VoxDigi/Mc/Moderator, pemateri sosialisasi sekolah²- lintas kecamatan. Pengalaman organisasi (Forum
                Mahasiswa Rongga, Himpunan mahasiswa, PMII, FOSISI KBB, Komunitas seniman Rongga, dll) Hobi badminton,
                alasan memilih divisi humas karena Divisi Humas selaras dengan program studi saya, sehingga saya ingin
                mengimplementasikan ilmu yang dipelajari sekaligus mengembangkan kemampuan komunikasi dalam praktik
                organisasi.
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/10.jpeg') }}"
                alt="Jelita Maria Hasianna Siagian" class="profile-img">
              <div class="profile-name">Jelita Maria H. S.</div>
              <div class="profile-role">Anggota</div>
              <div class="profile-divisi">Divisi Humas</div>
              <div class="profile-desc" style="display: none;">
                Jelita Maria Hasianna Siagian siswi SMKN 06 Kota Bekasi, jurusan Rekayasa Perangkat Lunak. Seorang ENTJ
                yang selalu berani mencoba hal baru dan menerapkannya secara terstruktur, dari langkah kecil sampai jadi
                sesuatu yang besar.<br>
                Peringkat 1 Olimpiade Bahasa Inggris provinsi Jawa Barat.<br>
                Medali Emas Olimpiade Matematika Nasional Pemuda Pancasila<br>
                Ketua & Leader Karya Ilmiah Remaja<br>
                Leader English Club<br>
                Punya minat luas di musik, public speaking, matematika & sains, bahasa asing, sampai desain.
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/6.jpeg') }}" alt="Kartikasari"
                class="profile-img">
              <div class="profile-name">Kartikasari</div>
              <div class="profile-role">Anggota</div>
              <div class="profile-divisi">Divisi Humas</div>
              <div class="profile-desc" style="display: none;">
                Nama: Kartikasari<br>
                Asal: Ciamis<br>
                IG: hii.qtikaa<br>
                Divisi: Humas<br><br>
                Halo semua! 👐🏻✨<br>
                Perkenalkan, nama saya Kartikasari. Saat ini, saya dapet kesempatan keren banget buat bergabung di
                komunitas Jabar Berdampak sebagai bagian dari Divisi Humas.<br><br>
                Selain kesibukan saya sehari-hari sebagai mahasiswi Kebidanan yang dituntut harus selalu aktif dan
                adaptif dalam berbagai hal, saya juga punya ketertarikan besar di dunia public speaking, komunikasi, dan
                pengen terus mengasah leadership skill saya.<br><br>
                Lewat komunitas ini, saya pengen berkontribusi nyata supaya bisa memberikan dampak positif dan manfaat
                langsung bagi masyarakat luas. Senang banget bisa bergabung, kenalan, dan berproses bareng kalian semua
                di sini.
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>

            <!-- Divisi PDD -->
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/fateeh.jpeg') }}" alt="M. Fateeh"
                class="profile-img">
              <div class="profile-name">M. Fateeh</div>
              <div class="profile-role">Koordinator</div>
              <div class="profile-divisi">Divisi PDD</div>
              <div class="profile-desc" style="display: none;">
                <strong>Nama:</strong> M. Fateeh<br>
                <strong>Kampus:</strong> Institut Muslim Cendekia, Sukabumi<br>
                <strong>Instagram:</strong> mfateeeh07<br><br>
                <strong>Prestasi Akademik:</strong><br>
                - Juara 1 Olimpiade Bahasa Arab Generasi Sains Nasional (OLGENSAINS)<br>
                - Juara 2 Olimpiade Bahasa Arab Pelajar Pancasila Nasional (OP2N)<br>
                - Juara 2 Olimpiade Bahasa Arab Kompetisi Siswa Sains Nasional (KS2N)<br>
                - Juara 2 Olimpiade Bahasa Arab Indonesia Future Science Olympiad (IFSO)<br>
                - Juara 3 Bahasa Arab Olimpiade Sains Madrasah Indonesia (OSMI) 2025<br>
                - Juara 3 Bahasa Arab Olimpiade Kompetisi Sains Indonesia (KSI Vol. 2)<br>
                - Juara 2 Kompetisi Desain Poster Islami (KDPI)<br>
                - Juara Harapan 1 Pidato Bahasa Arab, Said Arabic Competition (SAC)<br>
                - Juara Harapan 2 Bahasa Arab, Indonesian Science Language Olympiad (ISLO) 2026<br>
                - Medali Emas Mahasiswa, Cendekia Language Competition (CLC) 2025<br>
                - Medali Emas Olimpiade Bulughul Maram<br>
                - Medali Emas Mahasiswa, Olimpiade Bahasa Arab (OLBA) 2025<br>
                - Predikat Mumtaz Olimpiade Nahwu Shorof Online (ONS3) Mahasiswa<br>
                - Medali Perak Olimpiade Akidah Akhlak Mahasiswa Tingkat Nasional (Olimnus Islamic 2025)<br>
                - Medali Perunggu Bahasa Inggris Mahasiswa (OLAN 2025)<br>
                - Predikat Mumtaz dan Gelar Non-Akademik C.MA., C.M.BA. pada uji kompetensi Internasional Program Pelatihan dan Sertifikasi Guru Bahasa Arab Profesional<br>
                - Peserta Aktif Olimpiade Bahasa Arab Nasional TOAFL (Skor: 597)<br><br>
                <strong>Pengalaman Organisasi:</strong><br>
                - Ketua Putra Pencinta Alam (TRAPALA) 2018-2019<br>
                - Founder Fatih Archery Tasikmalaya (2018)<br>
                - Anggota Divisi Media Dakwah DEMA 2022-2023<br>
                - Ketua Kamar Asrama (2024-2025)<br>
                - Ketua Divisi Dakwah DEMA 2024-2025<br>
                - Ketua UKM Archery Arraayah 2024-2025<br>
                - Ketua Lomba OLISIA Nasional 2025<br>
                - Anggota Divisi Media Komunitas Ciamis Mengaji 2025-2026<br>
                - Anggota Divisi Media Arrayah Peduli 2025-2026<br>
                - Ketua PUBDEKDOK Gemmi Persis Al-Ishlah 2025-2026<br>
                - Anggota Pers Media Institut Muslim Cendekia (2026)<br>
                - Anggota Syabab Creative Academy (SCA) 2026
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/9.jpeg') }}"
                alt="Safa Azzaira Putri" class="profile-img">
              <div class="profile-name">Safa Azzaira Putri</div>
              <div class="profile-role">Anggota</div>
              <div class="profile-divisi">Divisi PDD</div>
              <div class="profile-desc" style="display: none;">
                Nama : Safa Azzaira Putri<br>
                Unsername IG : @sapaavyii_<br>
                Divisi pilihan : Divisi PDD<br>
                Saya berasal dari sekolah SMKS Sandikta di Kota Bekasi, mempunyai ketertarikan dalam bidang organisasi,
                editing, serta pengembangan diri. Saya senang mempelajari hal-hal baru dan aktif mengikuti berbagai
                kegiatan yang dapat menambahkan pengalaman.
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>

            <!-- Divisi Acara -->
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/13.jpeg') }}" alt="Nadia Sapitri" class="profile-img">
              <div class="profile-name">Nadia Sapitri</div>
              <div class="profile-role">Koordinator</div>
              <div class="profile-divisi">Divisi Acara</div>
              <div class="profile-desc" style="display: none;">
                Hallo kk kk🤩🙌🏻<br>
                Kenalin yaa, aku Nadia sapitri, boleh panggil aku Nanad. Aku berasal dari Kota Sukabumi, Jawa Barat, dan
                sekarang masih berstatus sebagai pelajar.<br>
                Aku orangnya suka belajar hal baru, senang ikut kegiatan, dan pengen terus berkembang. Menurut aku,
                setiap pengalaman itu pasti ada pelajarannya, makanya aku selalu berusaha buat aktif di organisasi,
                komunitas, dan kegiatan yang bisa nambah ilmu sekaligus relasi.<br>
                Senang bisa kenal sama kk kk semua🤩<br>
                Semoga kita bisa saling support, berkembang bareng, dan bikin banyak hal positif ke depannya yaa🤩🙌🏻
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/12.jpeg') }}"
                alt="Wan Mochammad Hanief M." class="profile-img">
              <div class="profile-name">Wan Mochammad H.</div>
              <div class="profile-role">Anggota</div>
              <div class="profile-divisi">Divisi Acara</div>
              <div class="profile-desc" style="display: none;">
                Nama : Wan Mochammad Hanief Maulana As Shiedieqy<br>
                Daerah : Bandung<br>
                Instagram : wan_hanief<br>
                Kampus : Universitas Muhammadiyah Bandung<br>
                Prestasi :<br>
                1. Juara 1 Lomba Baca Puisi Umum Tingkat Nasional<br>
                2. Juara 2 Lomba Baca Puisi Umum Tingkat Nasional<br>
                3. Juara 3 Lomba Cipta Pantun Umum Tingkat Nasional
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/3.jpeg') }}" alt="Zaskia Zen"
                class="profile-img">
              <div class="profile-name">Zaskia Zen</div>
              <div class="profile-role">Anggota</div>
              <div class="profile-divisi">Divisi Acara</div>
              <div class="profile-desc" style="display: none;">
                <strong>Deskripsi Perkenalan Singkat</strong><br><br>
                Saya Zaskia Zen pdari Divisi Acara. Senang bisa menjadi bagian dari kepanitiaan ini. Saya pribadi yang
                bertanggung jawab, dan senang bekerja sama dalam tim. Melalui kepanitiaan ini, saya berharap dapat
                berkontribusi dalam menyukseskan setiap rangkaian acara, sekaligus menambah pengalaman, relasi, dan ilmu
                baru.<br><br>
                <strong>Biografi</strong><br><br>
                Perkenalkan, saya Zaskia Zen, siswi SMK Tanjung Priok 2 yang memiliki ketertarikan pada bidang
                organisasi, kepemimpinan, serta pengembangan diri. Saya aktif mengikuti berbagai kegiatan kepanitiaan,
                program duta, dan kompetisi sebagai wadah untuk belajar, mengasah kemampuan, serta memperluas
                pengalaman. Saya percaya bahwa setiap kesempatan ialah proses untuk terus berkembang, membangun relasi
                yang baik, dan memberikan manfaat bagi lingkungan sekitar. Dengan semangat belajar dan tanggung jawab,
                saya berusaha memberikan kontribusi terbaik dalam setiap kegiatan yang saya ikuti.
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/zahwa.jpeg') }}"
                alt="Nazwa Mutiara Tarisa" class="profile-img">
              <div class="profile-name">Nazwa Mutiara Tarisa</div>
              <div class="profile-role">Anggota</div>
              <div class="profile-divisi">Divisi Acara</div>
              <div class="profile-desc" style="display: none;">
                <strong>Pengalaman Organisasi:</strong><br>
                - Bagian Kebersihan OSIS SMP<br>
                - Pengurus Rayon Kelas 9 SMA<br>
                - Himpunan Mahasiswa (Hima) Agroteknologi<br>
                - Unit Kegiatan Mahasiswa (UKM) Departemen Tilawah<br>
                - Panitia Pekan Olahraga Mahasiswa (Porma)<br><br>
                <strong>Prestasi:</strong><br>
                - Juara 3 Olimpiade MIPA SD Tingkat Kabupaten<br>
                - Medali Perunggu Olimpiade Kompetisi Sains Nasional (KSN-P) Biologi Tingkat Nasional<br>
                - Medali Perunggu Olimpiade IOS Matematika Tingkat Nasional<br>
                - Medali Emas Olimpiade PSPI Biologi Tingkat Nasional<br>
                - Medali Perunggu Olimpiade ION Bahasa Indonesia Tingkat Nasional<br>
                - Medali Emas Olimpiade NSC Biologi Tingkat Nasional<br>
                - Medali Emas Olimpiade OSPENAS Bahasa Indonesia Tingkat Nasional<br>
                - Medali Emas Olimpiade KSN Biologi Tingkat Nasional
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/heln.jpeg') }}"
                alt="Heln Syakina Azzahra" class="profile-img">
              <div class="profile-name">Heln Syakina Azzahra</div>
              <div class="profile-role">Anggota</div>
              <div class="profile-divisi">Divisi Acara</div>
              <div class="profile-desc" style="display: none;">
                <strong>Pengalaman & Pencapaian:</strong><br>
                - Duta Motivator Muda Pendidikan Indonesia Batch 7<br>
                - Pengurus Forum Anak Kabupaten Tasikmalaya (Hak dan Perlindungan Khusus)<br>
                - Penyelenggara Seminar Youth Education Summit<br>
                - Juara 1 Puisi PORSADIN<br>
                - Juara 1 Kaligrafi Tingkat Kecamatan<br>
                - Juara Puisi Daar El Fikri Language Contest (2 Kali)
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/1.jpeg') }}" alt="Ri'ayah Hilmiyaty 'Adilah" class="profile-img">
              <div class="profile-name">Ri'ayah Hilmiyaty 'A.</div>
              <div class="profile-role">Anggota</div>
              <div class="profile-divisi">Divisi Acara</div>
              <div class="profile-desc" style="display: none;">
                Nama Lengkap: Ri’ayah Hilmiyaty ‘Adilah<br>
                Domisili: Purwakarta<br>
                Jenis Kelamin: Perempuan<br>
                Instagram/TikTok: @riaaaayyy<br>
                Divisi: Acara<br>
                Status Keaktifan: Aktif<br><br>
                Jelasin kamu gimana orangnya:<br>
                Aku seorang ESFP yang komunikatif, adaptif, dan penuh energi🤩. Aku senang berinteraksi dengan orang
                baru dan menghidupkan suasana kelompok.<br>
                Meskipun pembawaanku santai, seru, dan ekspresif, aku tetap tipe orang yang terstruktur, fokus, dan
                bertanggung jawab penuh kalau udah diberi amanah untuk mengeksekusi suatu tugas atau project. Let's
                collaborate and make things happen!
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/sinta.jpeg') }}" alt="Sinta Riyanti" class="profile-img">
              <div class="profile-name">Sinta Riyanti</div>
              <div class="profile-role">Anggota</div>
              <div class="profile-divisi">Divisi Acara</div>
              <div class="profile-desc" style="display: none;">
                <strong>Nama:</strong> Sinta Riyanti<br>
                <strong>Instagram:</strong> ssnta.girl<br>
                <strong>Instansi:</strong> UIN Siber Syekh Nurjati Cirebon<br><br>
                Halo semuanya, perkenalkan nama saya Sinta Riyanti dari Divisi Acara Komunitas Jabar Berdampak. 
                Saya memilih bergabung di divisi ini karena sangat tertarik dengan proses perencanaan dan pelaksanaan sebuah kegiatan. 
                Saya senang bekerja sama dalam tim, belajar hal-hal baru, serta selalu berusaha untuk bertanggung jawab penuh terhadap tugas yang diberikan. 
                Semoga melalui komunitas ini, saya bisa memberikan kontribusi terbaik sekaligus mendapatkan banyak pengalaman baru yang berharga.
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
            <div class="carousel-card">
              <img src="{{ asset('assets/gambarorganisasi/5.jpeg') }}" alt="Adinda Maimanah" class="profile-img">
              <div class="profile-name">Adinda Maimanah</div>
              <div class="profile-role">Anggota</div>
              <div class="profile-divisi">Divisi Acara</div>
              <div class="profile-desc" style="display: none;">
                Nama : Adinda Maimanah<br>
                Asal : Cirebon<br>
                Ig : dnd_mnh<br>
                Divisi : acara<br><br>
                Halo semua👐🏻, perkenalkan nama saya adinda Maimanah, sekarang ini sayang sedang mengikuti komunitas
                Jabar berdampak sebagai divisi acara, saya memiliki ketertarikan dalam publick speaking, melatih skill
                kepemimpinan dan komunikasi saya, saya berkontribusi dengan komunitas agar dapat memberikan manfaat bagi
                masyarakat sekitar, senang bisa bergabung dan belajar bersama mohon dukungannya semua😊
              </div>
              <a href="#" class="btn-detail">Lihat Detail</a>
            </div>
          </div>
        </div>
        <button class="carousel-btn next-btn" id="orgNextBtn" aria-label="Next">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </button>
      </div>
    </div>
  </section>

  <!-- Modal Detail Profil -->
  <div class="modal-overlay" id="profileModal">
    <div class="modal-content">
      <button class="modal-close" id="closeModalBtn">&times;</button>
      <div class="modal-body">
        <div class="modal-left">
          <img src="" alt="" id="modalImg" class="modal-img">
          <h3 id="modalName" class="modal-name">Nama</h3>
          <p id="modalRole" class="modal-role">Jabatan</p>
          <p id="modalDivisi" class="modal-divisi">Divisi</p>
          <div class="modal-socials" id="modalSocials">
             <a href="#" id="modalIg" target="_blank" aria-label="Instagram" style="display:none;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
             </a>
          </div>
        </div>
        <div class="modal-right">
          <div class="modal-desc">
            <h4>Tentang</h4>
            <div class="modal-desc-text">
              <p id="modalDescContent">Anggota dari Jabar Berdampak yang berdedikasi tinggi untuk pelestarian lingkungan dan pemberdayaan pemuda di Jawa Barat.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-grid">
        <div>
          <img src="{{ asset('assets/logo-jaber.png') }}" alt="Logo Jabar Berdampak" class="footer-logo-img" style="max-width: 180px; height: auto; margin-bottom: 15px;">
          <p>Membangun masa depan yang berkelanjutan, satu komunitas pada satu waktu. Bergabunglah dalam perjalanan kami
            menuju bumi yang lebih hijau.</p>
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
            <li><a href="#"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                  <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg> Instagram</a></li>
            <li><a href="#"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                </svg> Facebook</a></li>
            <li><a href="#"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path
                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                  </path>
                </svg> Twitter (X)</a></li>
            <li><a href="#"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                  <rect x="2" y="9" width="4" height="12"></rect>
                  <circle cx="4" cy="4" r="2"></circle>
                </svg> LinkedIn</a></li>
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
