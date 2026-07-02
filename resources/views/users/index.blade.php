@extends('layouts.app')
@section('content_title', 'Data Users')
@section('content')
<div class="card">
    <div class="p-2 d-flex flex-wrap justify-content-between border gap-2">
        <h4 class="h5">Data Users</h4>
        <div>
            <x-user.form-user />
        </div>
    </div>
  
    <div class="card-body">
        <x-alert :errors="$errors" />

        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped" id="table2">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Email</th>  
                        <th>Nama Users</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="text-break">{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <div class="d-flex flex-wrap align-items-center" style="gap: 0.5rem 1rem; padding: 4px 0;">
                                    <div>
                                        <x-user.form-user :id="$user->id" :name="$user->name" :email="$user->email" />
                                    </div>

                                    <div>
                                        <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger" data-confirm-delete="true">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>

                                    <div>
                                        <x-user.reset-password :id="$user->id" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
