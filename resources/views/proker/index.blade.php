@extends('layouts.app')
@section('content_title', 'Program Kerja')
@section('content')

<div class="card">
    <div class="p-2 d-flex flex-wrap justify-content-between border gap-2">
        <h4 class="h5">Daftar Program Kerja (Proker)</h4>
        <div>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambahProker">
                <i class="fas fa-plus mr-1"></i> Tambah Proker
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped" id="table2">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Program Kerja</th>
                        <th>Periode</th>
                        <th>Penanggung Jawab</th>
                        <th>Progress</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prokers as $index => $proker)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $proker->nama_proker }}</td>
                        <td>
                            {{ $proker->tanggal_mulai->format('d/m/Y') }} 
                            {{ $proker->tanggal_selesai ? ' - ' . $proker->tanggal_selesai->format('d/m/Y') : '' }}
                        </td>
                        <td>{{ $proker->penanggung_jawab ?? '-' }}</td>
                        <td>
                            @php
                                $progress = 0;
                                if ($proker->status == 'completed') $progress = 100;
                                elseif ($proker->status == 'ongoing') $progress = 50;
                                elseif ($proker->status == 'planning') $progress = 10;
                            @endphp
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-{{ $proker->status == 'completed' ? 'success' : ($proker->status == 'ongoing' ? 'warning' : 'primary') }}" style="width: {{ $progress }}%"></div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-{{ $proker->status == 'completed' ? 'success' : ($proker->status == 'ongoing' ? 'warning' : ($proker->status == 'cancelled' ? 'danger' : 'primary')) }}">
                                {{ ucfirst($proker->status) }}
                            </span>
                        </td>
                        <td>
                            @if($proker->gambar)
                                <a href="{{ asset('storage/' . $proker->gambar) }}" target="_blank" class="btn btn-info btn-sm">
                                    <i class="fas fa-image"></i>
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-wrap align-items-center" style="gap: 0.5rem;">
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditProker{{ $proker->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="{{ route('proker.destroy', $proker->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    {{-- Modal Edit Proker --}}
                    <div class="modal fade" id="modalEditProker{{ $proker->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h5 class="modal-title text-white">
                                        <i class="fas fa-edit mr-2"></i>Edit Program Kerja
                                    </h5>
                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('proker.update', $proker->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Program Kerja <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="nama_proker" value="{{ $proker->nama_proker }}" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Mulai <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" name="tanggal_mulai" value="{{ $proker->tanggal_mulai->format('Y-m-d') }}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tanggal Selesai</label>
                                                    <input type="date" class="form-control" name="tanggal_selesai" value="{{ $proker->tanggal_selesai ? $proker->tanggal_selesai->format('Y-m-d') : '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Penanggung Jawab</label>
                                            <input type="text" class="form-control" name="penanggung_jawab" value="{{ $proker->penanggung_jawab }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" rows="4">{{ $proker->deskripsi }}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Anggaran</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="number" class="form-control" name="anggaran" value="{{ (int)$proker->anggaran }}" min="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="planning" {{ $proker->status == 'planning' ? 'selected' : '' }}>Perencanaan</option>
                                                        <option value="ongoing" {{ $proker->status == 'ongoing' ? 'selected' : '' }}>Sedang Berjalan</option>
                                                        <option value="completed" {{ $proker->status == 'completed' ? 'selected' : '' }}>Selesai</option>
                                                        <option value="cancelled" {{ $proker->status == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar_edit_{{ $proker->id }}" name="gambar" accept="image/*">
                                                <label class="custom-file-label" for="gambar_edit_{{ $proker->id }}">Pilih file gambar</label>
                                            </div>
                                            @if($proker->gambar)
                                                <div class="mt-2">
                                                    <img src="{{ asset('storage/' . $proker->gambar) }}" alt="Gambar Proker" class="img-thumbnail" style="max-height: 100px;">
                                                </div>
                                            @endif
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

{{-- Modal Tambah Proker --}}
<div class="modal fade" id="modalTambahProker" tabindex="-1" role="dialog" aria-labelledby="modalTambahProkerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title text-white" id="modalTambahProkerLabel">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Program Kerja
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('proker.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_proker">Nama Program Kerja <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama_proker" name="nama_proker" placeholder="Masukkan nama program kerja" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_mulai">Tanggal Mulai <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="penanggung_jawab">Penanggung Jawab</label>
                        <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" placeholder="Masukkan nama penanggung jawab">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_proker">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi_proker" name="deskripsi" rows="4" placeholder="Masukkan deskripsi program kerja"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="anggaran">Anggaran</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" id="anggaran" name="anggaran" value="0" placeholder="0" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status_proker">Status</label>
                                <select class="form-control" id="status_proker" name="status">
                                    <option value="planning">Perencanaan</option>
                                    <option value="ongoing">Sedang Berjalan</option>
                                    <option value="completed">Selesai</option>
                                    <option value="cancelled">Dibatalkan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*" required>
                            <label class="custom-file-label" for="gambar">Pilih file gambar</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save mr-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function () {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    });
</script>
@endpush

@endsection
