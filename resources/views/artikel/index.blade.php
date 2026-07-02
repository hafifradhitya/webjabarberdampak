@extends('layouts.app')
@section('content_title', 'Artikel')
@section('content')

<div class="card">
    <div class="p-2 d-flex flex-wrap justify-content-between border gap-2">
        <h4 class="h5">Daftar Artikel</h4>
        <div>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahArtikel">
                <i class="fas fa-plus mr-1"></i> Tambah Artikel
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped" id="table2">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul Artikel</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Tanggal Publish</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artikels as $index => $artikel)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $artikel->judul }}</td>
                        <td>{{ $artikel->kategori ? ucfirst($artikel->kategori) : '-' }}</td>
                        <td>{{ $artikel->penulis ?? '-' }}</td>
                        <td>{{ $artikel->tanggal_publish ? $artikel->tanggal_publish->format('d/m/Y') : '-' }}</td>
                        <td>
                            <span class="badge bg-{{ $artikel->status == 'published' ? 'success' : 'secondary' }}">
                                {{ ucfirst($artikel->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex flex-wrap align-items-center" style="gap: 0.5rem;">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditArtikel{{ $artikel->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="{{ route('artikel.destroy', $artikel->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    {{-- Modal Edit Artikel --}}
                    <div class="modal fade" id="modalEditArtikel{{ $artikel->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title text-white">
                                        <i class="fas fa-edit mr-2"></i>Edit Artikel
                                    </h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Judul Artikel <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="judul" value="{{ $artikel->judul }}" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select class="form-control" name="kategori">
                                                        <option value="">Pilih Kategori</option>
                                                        <option value="berita" {{ $artikel->kategori == 'berita' ? 'selected' : '' }}>Berita</option>
                                                        <option value="pengumuman" {{ $artikel->kategori == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                                        <option value="edukasi" {{ $artikel->kategori == 'edukasi' ? 'selected' : '' }}>Edukasi</option>
                                                        <option value="lainnya" {{ (!in_array($artikel->kategori, ['', 'berita', 'pengumuman', 'edukasi']) && $artikel->kategori) ? 'selected' : '' }}>Lainnya</option>
                                                    </select>
                                                    <input type="text" class="form-control mt-2 kategori-lainnya-input" name="kategori_lainnya" placeholder="Masukkan kategori lainnya" value="{{ (!in_array($artikel->kategori, ['', 'berita', 'pengumuman', 'edukasi']) && $artikel->kategori) ? $artikel->kategori : '' }}" style="display: {{ (!in_array($artikel->kategori, ['', 'berita', 'pengumuman', 'edukasi']) && $artikel->kategori) ? 'block' : 'none' }};">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Publish</label>
                                                    <input type="date" class="form-control" name="tanggal_publish" value="{{ $artikel->tanggal_publish ? $artikel->tanggal_publish->format('Y-m-d') : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Penulis</label>
                                            <input type="text" class="form-control" name="penulis" value="{{ $artikel->penulis }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Konten <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="konten" rows="6" required>{{ $artikel->konten }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="draft" {{ $artikel->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                                <option value="published" {{ $artikel->status == 'published' ? 'selected' : '' }}>Published</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-warning">
                                            <i class="fas fa-save mr-1"></i> Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah Artikel --}}
<div class="modal fade" id="modalTambahArtikel" tabindex="-1" role="dialog" aria-labelledby="modalTambahArtikelLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="modalTambahArtikelLabel">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Artikel
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul_artikel">Judul Artikel <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul_artikel" name="judul" placeholder="Masukkan judul artikel" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori_artikel">Kategori</label>
                                <select class="form-control" id="kategori_artikel" name="kategori">
                                    <option value="">Pilih Kategori</option>
                                    <option value="berita">Berita</option>
                                    <option value="pengumuman">Pengumuman</option>
                                    <option value="edukasi">Edukasi</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                                <input type="text" class="form-control mt-2 kategori-lainnya-input" name="kategori_lainnya" placeholder="Masukkan kategori lainnya" style="display: none;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_publish">Tanggal Publish</label>
                                <input type="date" class="form-control" id="tanggal_publish" name="tanggal_publish">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Nama penulis">
                    </div>
                    <div class="form-group">
                        <label for="konten_artikel">Konten <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="konten_artikel" name="konten" rows="6" placeholder="Tulis konten artikel di sini..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar_artikel">Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar_artikel" name="gambar" accept="image/*">
                            <label class="custom-file-label" for="gambar_artikel">Pilih gambar...</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status_artikel">Status</label>
                        <select class="form-control" id="status_artikel" name="status">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    // Custom file input label
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // Toggle Kategori Lainnya input
    $('select[name="kategori"]').on('change', function() {
        let val = $(this).val();
        let $input = $(this).closest('.form-group').find('.kategori-lainnya-input');
        
        if (val === 'lainnya') {
            $input.show().attr('required', true);
        } else {
            $input.hide().removeAttr('required').val('');
        }
    });
</script>
@endpush
