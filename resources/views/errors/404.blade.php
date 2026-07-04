<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found - Akses Ditolak</title>
    <style>
        body {
            background-color: #0a0a0a;
            color: #00ff41;
            font-family: 'Courier New', Courier, monospace;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            flex-direction: column;
            text-align: center;
        }
        .container {
            border: 1px solid #00ff41;
            padding: 40px;
            box-shadow: 0 0 15px rgba(0, 255, 65, 0.2);
            max-width: 600px;
            background: rgba(0, 0, 0, 0.8);
        }
        h1 {
            font-size: 5rem;
            margin: 0 0 15px 0;
            text-shadow: 0 0 10px #00ff41;
            color: #ff003c;
        }
        p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 25px;
            color: #cccccc;
        }
        .highlight {
            color: #00ff41;
        }
        .blinking-cursor {
            font-weight: bold;
            font-size: 1.2rem;
            animation: 1s blink step-end infinite;
        }
        @keyframes blink {
            from, to { opacity: 0; }
            50% { opacity: 1; }
        }
        a {
            color: #0a0a0a;
            background-color: #00ff41;
            text-decoration: none;
            padding: 10px 20px;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s;
            display: inline-block;
            margin-top: 15px;
        }
        a:hover {
            background-color: #ff003c;
            color: #ffffff;
            box-shadow: 0 0 15px #ff003c;
            border-color: #ff003c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <p>
            Tersesat? Atau sedang mencoba mencari celah? <br><br>
            Kamu sedang berada di area <span class="highlight">yang tidak ada</span>. <br>
            Tidak ada data yang bisa kamu ambil di sini. Sistem telah mencatat anomali akses ini.<br><br>
            Pergilah sebelum jejak digitalmu terekam lebih jauh.
        </p>
        <div style="text-align: left; background: #000; padding: 15px; border-radius: 5px; color:#00ff41; margin-bottom: 20px;">
            <span style="color:#ff003c;">root@server</span><span style="color:#fff;">:</span><span style="color:#00aaff;">~</span>$ Connection refused.<br>
            <span style="color:#ff003c;">root@server</span><span style="color:#fff;">:</span><span style="color:#00aaff;">~</span>$ <span class="blinking-cursor">_</span>
        </div>
        <a href="{{ url('/') }}">Menyerah & Kembali</a>
    </div>
</body>
</html>
