<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Not Found | Tidak Ditemukan</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo-jaber.png') }}">
    <style>
        :root {
            --primary-green: #0e3b21;
            --primary-gold: #fad02c;
            --bg-light: #f5faf5;
            --text-main: #253225;
            --text-muted: #626a62;
            --font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: var(--font-family);
            background-color: var(--bg-light);
            color: var(--text-main);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .error-container {
            background: #ffffff;
            padding: 50px 40px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(14, 59, 33, 0.08);
            max-width: 600px;
            width: 90%;
            border-top: 6px solid var(--primary-gold);
            border-bottom: 6px solid var(--primary-green);
        }
        .error-code {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-green);
            margin-bottom: 24px;
            letter-spacing: 1px;
            border-bottom: 1px solid rgba(14, 59, 33, 0.1);
            padding-bottom: 24px;
        }
        .error-message {
            font-size: 1.25rem;
            color: var(--text-main);
            margin-bottom: 15px;
            font-weight: 600;
        }
        .error-description {
            font-size: 1.05rem;
            color: var(--text-muted);
            margin-bottom: 35px;
            line-height: 1.7;
            padding: 0 10px;
        }
        .path-highlight {
            font-weight: 700;
            color: var(--primary-green);
            word-break: break-all;
            background-color: rgba(250, 208, 44, 0.15);
            padding: 2px 8px;
            border-radius: 4px;
        }
        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: var(--primary-gold);
            color: var(--primary-green);
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(250, 208, 44, 0.3);
            border: none;
            cursor: pointer;
        }
        .btn-back:hover {
            background-color: #e5bd20;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(250, 208, 44, 0.4);
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">
            404 | NOT FOUND | TIDAK DITEMUKAN
        </div>
        <p class="error-message">
            Maaf, halaman <span class="path-highlight">/{{ request()->path() }}</span> tidak dapat kami temukan.
        </p>
        <p class="error-description">
            Sepertinya Anda sedikit keluar jalur. Halaman yang Anda tuju mungkin telah dipindahkan, dihapus, atau tautannya sudah tidak aktif.<br><br>
            Jangan khawatir, mari kembali ke rute yang benar dan lanjutkan perjalanan Anda dalam memberikan dampak positif bersama <strong>Jabar Berdampak</strong>.
        </p>
        <a href="javascript:history.back()" class="btn-back">
            &larr; Kembali ke Halaman Sebelumnya
        </a>
    </div>
</body>
</html>
