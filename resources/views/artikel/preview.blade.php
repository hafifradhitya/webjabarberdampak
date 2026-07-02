<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preview: {{ $artikel->judul }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Source Sans Pro', sans-serif;
            color: #333;
        }
        .preview-navbar {
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .article-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            padding: 50px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .article-category {
            text-transform: uppercase;
            font-size: 0.85rem;
            font-weight: 700;
            color: #007bff;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }
        .article-title {
            font-size: 2.8rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #111;
        }
        .article-meta {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }
        .author-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 1.2rem;
            margin-right: 15px;
        }
        .meta-details {
            display: flex;
            flex-direction: column;
        }
        .meta-author {
            font-weight: 600;
            font-size: 1rem;
            color: #333;
        }
        .meta-date {
            font-size: 0.9rem;
            color: #777;
        }
        .article-image {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 40px;
        }
        .article-content {
            font-size: 1.15rem;
            line-height: 1.8;
            color: #444;
        }
        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .article-content h1, .article-content h2, .article-content h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
            color: #222;
        }
        .badge-status {
            font-size: 0.8rem;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="preview-navbar">
        <div>
            <a href="{{ route('artikel.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Admin
            </a>
        </div>
        <div>
            <span class="mr-3 font-weight-bold">Mode Preview</span>
            @if($artikel->status == 'published')
                <span class="badge badge-success badge-status">Published</span>
            @else
                <span class="badge badge-secondary badge-status">Draft</span>
            @endif
        </div>
    </div>

    <div class="container">
        <div class="article-container">
            
            <div class="article-category">
                {{ $artikel->kategori ?: 'Tanpa Kategori' }}
            </div>

            <h1 class="article-title">{{ $artikel->judul }}</h1>

            <div class="article-meta">
                <div class="author-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="meta-details">
                    <span class="meta-author">{{ $artikel->penulis ?: 'Anonim' }}</span>
                    <span class="meta-date">
                        {{ $artikel->tanggal_publish ? $artikel->tanggal_publish->translatedFormat('d F Y') : 'Belum ditentukan' }} 
                        &bull; {{ $artikel->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>

            @if($artikel->gambar)
                <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="article-image">
            @endif

            <div class="article-content">
                {!! $artikel->konten !!}
            </div>

        </div>
    </div>

</body>
</html>
