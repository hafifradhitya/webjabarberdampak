<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editor - {{ config('app.name', 'Jabar Berdampak') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/summernote/summernote-bs4.min.css">

    <style>
        body {
            background-color: #fff;
        }
        .editor-navbar {
            border-bottom: 1px solid #eaeaea;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .editor-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .title-input {
            width: 100%;
            border: none;
            outline: none;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
            font-family: 'Source Sans Pro', sans-serif;
        }
        .title-input::placeholder {
            color: #ccc;
        }
        .note-editor.note-frame {
            border: none;
        }
        .note-editor.note-frame .note-statusbar {
            display: none;
        }
        .note-toolbar {
            background-color: transparent;
            border-bottom: none;
            padding-left: 0;
            padding-right: 0;
        }
        .note-editable {
            padding-left: 0 !important;
            padding-right: 0 !important;
            font-size: 1.2rem;
            color: #444;
            font-family: 'Source Sans Pro', sans-serif;
            min-height: 400px;
        }
        .note-btn {
            color: #555;
            background-color: transparent;
            border-color: transparent;
        }
        .note-btn:hover {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
@include('sweetalert::alert')

@yield('content')

<!-- jQuery -->
<script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('adminlte') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte') }}/plugins/summernote/summernote-bs4.min.js"></script>

<script>
$(function () {
    bsCustomFileInput.init();
    $('#konten').summernote({
        placeholder: 'Tulis ceritamu...',
        tabsize: 2,
        height: 500,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
});
</script>
@stack('script')
</body>
</html>
