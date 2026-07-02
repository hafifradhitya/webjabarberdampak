@extends('layouts.app')
@section('content_title', 'Artikel')
@section('content')

<div class="card">
    <div class="p-2 d-flex flex-wrap justify-content-between border gap-2">
        <h4 class="h5">Daftar Artikel</h4>
        <div>
            <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-1"></i> Tambah Artikel
            </a>
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
                                <a href="{{ route('artikel.preview', $artikel->id) }}" class="btn btn-info btn-sm" target="_blank" title="Preview">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('artikel.destroy', $artikel->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
