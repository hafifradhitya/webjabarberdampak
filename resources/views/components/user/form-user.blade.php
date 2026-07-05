<div>
    <button type="button" class="btn {{ $id ? 'btn-warning' : 'btn-primary' }}" data-toggle="modal" data-target="#formUser{{ $id ?? '' }}">
        @if ($id)
            <i class="fas fa-edit"></i>
        @else
            User Baru
        @endif
    </button>

    <div class="modal fade" id="formUser{{ $id ?? '' }}">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id ?? '' }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">  
                        <h4 class="modal-title">{{ $id ? 'Form Edit User' : 'Form User Baru' }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group my-1">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ $id ? $email : old('email') }}">
                        </div>

                        <div class="form-group my-1">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ $id ? $name : old('name') }}">
                        </div>

                        @unless ($id)
                            <div class="alert alert-info my-3">
                                User baru bisa login memakai email yang didaftarkan. Isi password awal di bawah, atau biarkan kosong untuk memakai password default <strong>password</strong>.
                            </div>

                            <div class="form-group my-1">
                                <label>Password Awal</label>
                                <input type="password" name="password" class="form-control" autocomplete="new-password" placeholder="Minimal 8 karakter">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group my-1">
                                <label>Konfirmasi Password Awal</label>
                                <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password" placeholder="Ulangi password awal">
                            </div>
                        @endunless
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
