<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kodein - Jasa Pembuatan Website & Desain</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('assets/logo-jaber.png') }}">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary-green: #0e3b21;
            --primary-light: #165b33;
            --primary-gold: #c9a444;
            --bg-light: #f8faf9;
            --text-dark: #1a1a1a;
            --text-muted: #666666;
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(255, 255, 255, 0.6);
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, var(--bg-light) 0%, #e8eee8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            animation: fadeIn 1s ease-out;
            padding: 20px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Ambient Orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            z-index: 0;
            animation: float 10s ease-in-out infinite alternate;
        }
        .orb-1 {
            width: 400px;
            height: 400px;
            background: rgba(201, 164, 68, 0.15);
            top: -100px;
            left: -100px;
        }
        .orb-2 {
            width: 500px;
            height: 500px;
            background: rgba(14, 59, 33, 0.12);
            bottom: -150px;
            right: -100px;
            animation-delay: -5s;
        }
        @keyframes float {
            0% { transform: translate(0, 0); }
            100% { transform: translate(30px, 30px); }
        }

        /* Glass Card Container */
        .kodein-card {
            position: relative;
            z-index: 1;
            background: var(--glass-bg);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid var(--glass-border);
            border-radius: 28px;
            padding: 50px;
            box-shadow: 0 30px 60px rgba(14, 59, 33, 0.08);
            text-align: center;
            max-width: 800px;
            width: 100%;
            transform: translateY(20px);
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards 0.2s;
            opacity: 0;
        }

        @keyframes slideUp {
            to { transform: translateY(0); opacity: 1; }
        }

        /* Top Label */
        .showcase-label {
            display: inline-block;
            background: rgba(14, 59, 33, 0.05);
            color: var(--primary-green);
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 25px;
            border: 1px solid rgba(14, 59, 33, 0.1);
        }
        .showcase-label i {
            color: var(--primary-gold);
            margin-right: 5px;
        }

        /* Logo Area */
        .kodein-logo-img {
            max-width: 100%;
            height: auto;
            max-height: 80px;
            margin: 0 auto;
            display: block;
            object-fit: contain;
        }

        .kodein-logo-text {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--primary-green);
            letter-spacing: -1.5px;
            margin: 0;
            line-height: 1;
            background: linear-gradient(135deg, var(--primary-green) 0%, #2b7a4b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .kodein-logo-text span {
            color: var(--primary-gold);
            -webkit-text-fill-color: var(--primary-gold);
        }

        /* Typewriter */
        .tagline-container {
            height: 30px;
            margin-top: 15px;
            margin-bottom: 40px;
        }
        .typewriter {
            font-size: 1.2rem;
            color: var(--text-muted);
            font-weight: 500;
            display: inline-block;
            border-right: 2px solid var(--primary-gold);
            padding-right: 5px;
            animation: blink 0.75s step-end infinite;
        }
        @keyframes blink {
            from, to { border-color: transparent }
            50% { border-color: var(--primary-gold); }
        }

        /* Services Grid */
        .services-wrapper {
            margin-bottom: 45px;
        }
        .services-title {
            font-size: 1rem;
            color: var(--primary-green);
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 15px;
            margin: 0 auto;
        }
        .service-pill {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(14, 59, 33, 0.08);
            padding: 14px 20px;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-dark);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        }
        .service-pill i {
            color: var(--primary-gold);
            font-size: 1.1rem;
        }
        .service-pill:hover {
            transform: translateY(-3px);
            background: white;
            box-shadow: 0 10px 20px rgba(14, 59, 33, 0.08);
            border-color: rgba(14, 59, 33, 0.15);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-wa {
            background: #25D366; /* WhatsApp Green */
            color: white;
            box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3);
        }
        .btn-wa:hover {
            background: #128C7E;
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(37, 211, 102, 0.4);
        }
        .btn-ig {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            color: white;
            box-shadow: 0 10px 20px rgba(220, 39, 67, 0.2);
        }
        .btn-ig:hover {
            filter: brightness(1.1);
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(220, 39, 67, 0.3);
        }

        /* Back Link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.3s;
        }
        .back-link:hover {
            color: var(--primary-green);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .kodein-card {
                padding: 40px 20px;
            }
            .kodein-logo-text {
                font-size: 2.8rem;
            }
            .action-buttons {
                flex-direction: column;
            }
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="kodein-card">
        
        <div class="showcase-label">
            <i class="fa-solid fa-sparkles"></i> Menyukai website ini? Ini adalah salah satu mahakarya kami.
        </div>

        <!-- Ganti dengan tag <img src="..."> jika Anda punya logo sendiri -->
        <img src="{{ asset('assets/logo-kodein.png') }}" alt="Kodein Logo" class="kodein-logo-img">

        <div class="tagline-container">
            <span class="typewriter" id="typewriter"></span>
        </div>

        <div class="services-wrapper">
            <div class="services-title">Layanan Kami</div>
            <div class="services-grid">
                <div class="service-pill"><i class="fa-solid fa-layer-group"></i> Template</div>
                <div class="service-pill"><i class="fa-solid fa-laptop-code"></i> Pembuatan Website</div>
                <div class="service-pill"><i class="fa-brands fa-figma"></i> Convert Figma to Web</div>
                <div class="service-pill"><i class="fa-solid fa-magnifying-glass-chart"></i> UI/UX Review</div>
                <div class="service-pill"><i class="fa-solid fa-shop"></i> Pembuatan Web UMKM</div>
                <div class="service-pill"><i class="fa-solid fa-rocket"></i> Landing Page Generator</div>
                <div class="service-pill"><i class="fa-solid fa-table-columns"></i> Dashboard Customization</div>
                <div class="service-pill"><i class="fa-solid fa-database"></i> Pembuatan Database</div>
            </div>
        </div>

        <div class="action-buttons">
            <!-- Ganti href wa.me dengan nomor asli Anda (tanpa 0 di depan, pakai 62) -->
            <a href="https://wa.me/6281234567890?text=Halo%20Kodein,%20saya%20ingin%20konsultasi%20pembuatan%20website" target="_blank" class="btn btn-wa">
                <i class="fa-brands fa-whatsapp fa-lg"></i> Konsultasi Gratis
            </a>
            <a href="https://www.instagram.com/kodeinofficial26/?utm_source=ig_web_button_share_sheet" target="_blank" class="btn btn-ig">
                <i class="fa-brands fa-instagram fa-lg"></i> @kodeinofficial26
            </a>
        </div>

        <a href="{{ url('/') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Website
        </a>

    </div>

    <script>
        // Efek Mengetik Otomatis "Kodein Aja."
        const text = "Kodein Aja.";
        const element = document.getElementById('typewriter');
        let i = 0;

        function typeWriter() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(typeWriter, 100); // Kecepatan mengetik
            } else {
                // Hentikan kedip kursor setelah selesai
                element.style.animation = 'none';
                element.style.borderRight = '2px solid var(--primary-gold)';
            }
        }

        // Mulai mengetik setelah kartu selesai muncul
        setTimeout(typeWriter, 1200);
    </script>
</body>
</html>
