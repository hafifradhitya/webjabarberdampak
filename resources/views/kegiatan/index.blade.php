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
                        <th>Banner</th>
                        <th>Dokumentasi</th>
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
                            @if($kegiatan->banner)
                                <img src="{{ asset('storage/' . $kegiatan->banner) }}" alt="Banner" width="96" height="40" class="img-thumbnail" style="object-fit: cover;">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-light">{{ $kegiatan->documentations->count() }}/5 gambar</span>
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
                                            <label>Banner Kegiatan</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="banner" accept="image/*" id="customFileEdit{{ $kegiatan->id }}">
                                                <label class="custom-file-label" for="customFileEdit{{ $kegiatan->id }}">Pilih file banner</label>
                                            </div>
                                            @if($kegiatan->banner)
                                                <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin mengubah banner.</small>
                                            @endif
                                            <small class="text-muted d-block">Ukuran Canva: Banner (Landscape) 1000 x 500 mm, rasio 2:1. Export PNG/JPG, maksimal 15 MB.</small>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" rows="4">{{ $kegiatan->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Dokumentasi Kegiatan</label>
                                            @if($kegiatan->documentations->isNotEmpty())
                                                <div class="row mb-2">
                                                    @foreach($kegiatan->documentations as $documentation)
                                                        <div class="col-6 col-md-4 mb-3">
                                                            <div class="border rounded p-2 h-100">
                                                                <img src="{{ asset('storage/' . $documentation->image_path) }}" alt="Dokumentasi {{ $loop->iteration }}" class="img-fluid rounded mb-2" style="height: 90px; width: 100%; object-fit: cover;">
                                                                <input type="text" class="form-control form-control-sm mb-2" name="caption_dokumentasi[{{ $documentation->id }}]" value="{{ $documentation->caption }}" maxlength="160" placeholder="Keterangan gambar">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="hapusDokumentasi{{ $documentation->id }}" name="hapus_dokumentasi[]" value="{{ $documentation->id }}" data-delete-doc>
                                                                    <label class="custom-control-label small" for="hapusDokumentasi{{ $documentation->id }}">Hapus gambar ini</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p class="text-muted small mb-2">Belum ada dokumentasi.</p>
                                            @endif
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="dokumentasiEdit{{ $kegiatan->id }}" name="dokumentasi[]" accept="image/*" multiple data-doc-input data-existing="{{ $kegiatan->documentations->count() }}">
                                                <label class="custom-file-label" for="dokumentasiEdit{{ $kegiatan->id }}">Tambah dokumentasi</label>
                                            </div>
                                            <div class="mt-2" data-doc-caption-list></div>
                                            <small class="text-muted">Total dokumentasi maksimal 5 gambar. Bisa pilih beberapa file sekaligus.</small>
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
                </tbody>
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
                        <label for="banner">Banner Kegiatan <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="banner" name="banner" accept="image/*" required>
                            <label class="custom-file-label" for="banner">Pilih file banner</label>
                        </div>
                        <small class="text-muted d-block mt-1">Ukuran Canva: Banner (Landscape) 1000 x 500 mm, rasio 2:1. Export PNG/JPG, maksimal 15 MB.</small>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_kegiatan">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi_kegiatan" name="deskripsi" rows="4" placeholder="Masukkan deskripsi kegiatan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="dokumentasi_kegiatan">Dokumentasi Kegiatan</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="dokumentasi_kegiatan" name="dokumentasi[]" accept="image/*" multiple data-doc-input data-existing="0">
                            <label class="custom-file-label" for="dokumentasi_kegiatan">Pilih maksimal 5 gambar</label>
                        </div>
                        <div class="mt-2" data-doc-caption-list></div>
                        <small class="text-muted">Opsional. Maksimal 5 gambar, ukuran setiap gambar maksimal 5 MB.</small>
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

@push('script')
<script>
    function renderDocumentationCaptions(input) {
        const form = input.closest('form');
        const captionList = form.querySelector('[data-doc-caption-list]');

        if (!captionList) {
            return;
        }

        captionList.innerHTML = '';

        Array.from(input.files).forEach(function(file, index) {
            const group = document.createElement('div');
            group.className = 'input-group input-group-sm mb-2';

            const prepend = document.createElement('div');
            prepend.className = 'input-group-prepend';

            const label = document.createElement('span');
            label.className = 'input-group-text';
            label.textContent = 'Gambar ' + (index + 1);

            const caption = document.createElement('input');
            caption.type = 'text';
            caption.className = 'form-control';
            caption.name = 'dokumentasi_caption[]';
            caption.maxLength = 160;
            caption.placeholder = 'Keterangan singkat untuk ' + file.name;

            prepend.appendChild(label);
            group.appendChild(prepend);
            group.appendChild(caption);
            captionList.appendChild(group);
        });
    }

    document.querySelectorAll('input[type="file"][name="banner"]').forEach(function(input) {
        input.addEventListener('change', function() {
            const form = input.closest('form');
            const label = form.querySelector('label[for="' + input.id + '"]');

            if (label) {
                label.textContent = input.files.length ? input.files[0].name : 'Pilih file banner';
            }
        });
    });

    document.querySelectorAll('[data-doc-input]').forEach(function(input) {
        input.addEventListener('change', function() {
            const form = input.closest('form');
            const label = form.querySelector('label[for="' + input.id + '"]');
            const existing = Number(input.dataset.existing || 0);
            const deleted = form.querySelectorAll('[data-delete-doc]:checked').length;
            const nextTotal = existing - deleted + input.files.length;
            const captionList = form.querySelector('[data-doc-caption-list]');

            if (nextTotal > 5) {
                alert('Total dokumentasi kegiatan maksimal 5 gambar.');
                input.value = '';
                if (captionList) {
                    captionList.innerHTML = '';
                }
                if (label) {
                    label.textContent = 'Pilih maksimal 5 gambar';
                }
                return;
            }

            if (label) {
                label.textContent = input.files.length
                    ? input.files.length + ' gambar dipilih'
                    : 'Pilih maksimal 5 gambar';
            }

            renderDocumentationCaptions(input);
        });
    });
</script>
@endpush
