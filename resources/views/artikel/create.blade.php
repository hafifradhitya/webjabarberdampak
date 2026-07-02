@extends('layouts.app')
@section('content_title', 'Tambah Artikel')
@section('content')

    @push('style')
        <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/summernote/summernote-bs4.min.css">
        <style>
            .editor-container {
                background-color: #fff;
                padding: 40px;
                border-radius: 8px;
                box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
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
                border-bottom: 1px solid #eee;
            }

            .note-editable {
                padding-left: 0 !important;
                padding-right: 0 !important;
                font-size: 1.2rem;
                color: #444;
                font-family: 'Source Sans Pro', sans-serif;
                min-height: 400px;
            }
        </style>
    @endpush
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Top Navbar / Actions -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('artikel.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success px-4">
                <i class="fas fa-save mr-1"></i> Simpan Artikel
            </button>
        </div>

        <div class="row">
            <!-- Kolom Kiri: Editor -->
            <div class="col-md-8">
                <div class="editor-container">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="text" name="judul" class="title-input" placeholder="Title" required
                        value="{{ old('judul') }}">
                    <textarea id="konten" name="konten" required>{{ old('konten') }}</textarea>
                </div>
            </div>

            <!-- Kolom Kanan: Pengaturan -->
            <div class="col-md-4">
                <div class="editor-container">
                    <h5 class="mb-4">Pengaturan Tambahan</h5>

                    <div class="form-group">
                        <label>Gambar Utama (Thumbnail)</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar" accept="image/*" id="gambarInput">
                            <label class="custom-file-label" for="gambarInput">Pilih gambar</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" id="kategoriSelect">
                            <option value="">Pilih Kategori</option>
                            <option value="berita">Berita</option>
                            <option value="pengumuman">Pengumuman</option>
                            <option value="edukasi">Edukasi</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                        <input type="text" class="form-control mt-2" name="kategori_lainnya" id="kategoriLainnyaInput"
                            placeholder="Kategori lainnya..." style="display: none;">
                    </div>

                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" class="form-control" name="penulis" value="{{ old('penulis') }}"
                            placeholder="Masukkan Nama Penulis">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Publish</label>
                        <input type="date" class="form-control" name="tanggal_publish" value="{{ old('tanggal_publish') }}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="draft">Simpan sebagai Draft</option>
                            <option value="published">Langsung Publish</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

@push('script')
    <script src="{{ asset('adminlte') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function () {
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

        $('#kategoriSelect').on('change', function () {
            if ($(this).val() === 'lainnya') {
                $('#kategoriLainnyaInput').show().attr('required', true);
            } else {
                $('#kategoriLainnyaInput').hide().removeAttr('required').val('');
            }
        });
    </script>
@endpush