@extends('layouts.app')
@section('content_title', 'Kegiatan')
@section('content')

<div class="card">
    <div class="p-2 d-flex flex-wrap justify-content-between border gap-2">
        <h4 class="h5">Daftar Kegiatan</h4>
        <div>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahKegiatan">
                <i class="fas fa-plus mr-1"></i> Tambah Kegiatan
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped" id="table2">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Thumbnail</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kegiatans as $index => $kegiatan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($kegiatan->thumbnail)
                                <img src="{{ asset('storage/' . $kegiatan->thumbnail) }}" alt="Thumbnail" width="50" height="50" class="img-thumbnail" style="object-fit: cover;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                        <td>{{ $kegiatan->tanggal_kegiatan->format('d/m/Y') }}</td>
                        <td>{{ $kegiatan->lokasi ?? '-' }}</td>
                        <td>
                            <span class="badge bg-{{ $kegiatan->status == 'completed' ? 'success' : ($kegiatan->status == 'ongoing' ? 'warning' : 'primary') }}">
                                {{ ucfirst($kegiatan->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex flex-wrap align-items-center" style="gap: 0.5rem;">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditKegiatan{{ $kegiatan->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="{{ route('kegiatan.destroy', $kegiatan->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    {{-- Modal Edit Kegiatan --}}
                    <div class="modal fade" id="modalEditKegiatan{{ $kegiatan->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title text-white">
                                        <i class="fas fa-edit mr-2"></i>Edit Kegiatan
                                    </h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Kegiatan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Kegiatan <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" name="tanggal_kegiatan" value="{{ $kegiatan->tanggal_kegiatan->format('Y-m-d') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Lokasi</label>
                                                    <input type="text" class="form-control" name="lokasi" value="{{ $kegiatan->lokasi }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Thumbnail</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="thumbnail" accept="image/*" id="customFileEdit{{ $kegiatan->id }}">
                                                <label class="custom-file-label" for="customFileEdit{{ $kegiatan->id }}">Pilih file gambar</label>
                                            </div>
                                            @if($kegiatan->thumbnail)
                                                <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin mengubah thumbnail.</small>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" rows="4">{{ $kegiatan->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option value="upcoming" {{ $kegiatan->status == 'upcoming' ? 'selected' : '' }}>Akan Datang</option>
                                                <option value="ongoing" {{ $kegiatan->status == 'ongoing' ? 'selected' : '' }}>Sedang Berlangsung</option>
                                                <option value="completed" {{ $kegiatan->status == 'completed' ? 'selected' : '' }}>Selesai</option>
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

{{-- Modal Tambah Kegiatan --}}
<div class="modal fade" id="modalTambahKegiatan" tabindex="-1" role="dialog" aria-labelledby="modalTambahKegiatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="modalTambahKegiatanLabel">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Kegiatan
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan nama kegiatan" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_kegiatan">Tanggal Kegiatan <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan lokasi kegiatan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" accept="image/*" required>
                            <label class="custom-file-label" for="thumbnail">Pilih file gambar</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_kegiatan">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi_kegiatan" name="deskripsi" rows="4" placeholder="Masukkan deskripsi kegiatan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status_kegiatan">Status</label>
                        <select class="form-control" id="status_kegiatan" name="status">
                            <option value="upcoming">Akan Datang</option>
                            <option value="ongoing">Sedang Berlangsung</option>
                            <option value="completed">Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
