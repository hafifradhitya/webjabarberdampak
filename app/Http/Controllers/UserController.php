<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        confirmDelete('Hapus User', 'Apakah anda yakin ingin menghapus data ini?');
        return view('users.index', compact('users'));
    }
  
    public function store(Request $request) 
    {
        $id = $request->id;

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email' . ($id ? ",$id" : ''),
            'password' => 'nullable|min:8|confirmed',
        ], [
            'name.required'  => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email'    => 'Email tidak valid',
            'email.unique'   => 'Email sudah terdaftar',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
        ]);

        $data = $request->only(['name', 'email']);

        if (!$id) {
            $data['password'] = Hash::make($request->filled('password') ? $request->password : 'password');
        }

        User::updateOrCreate(['id' => $id], $data);

        toast()->success($id ? 'User berhasil diperbarui' : 'User berhasil disimpan');
        return redirect()->route('users.index');
    }


    public function gantiPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ], [
            'old_password.required' => 'Password lama harus diisi',
            'password.required' => 'Password baru harus diisi',
            'password.min' => 'Password baru minimal 8 karakter',
            'password.confirmed' => 'Password baru tidak sama dengan konfirmasi password',
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->old_password, $user->password)) {
            toast()->error('Password lama tidak sesuai');
            return redirect()->route('dashboard');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        toast()->success('Password berhasil diubah');
        return redirect()->route('dashboard');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);

        if(Auth::id() == $id){
            toast()->error('Tidak dapat menghapus akun yang sedang login');
            return redirect()->route('users.index');
        }

        $user->delete();
        toast()->success('User berhasil dihapus');
        return redirect()->route('users.index');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $user = User::find($request->id);
        $user->update([
            'password' => Hash::make('password'),
        ]);
        toast()->success('Password berhasil direset');
        return redirect()->route('users.index');
    }
}
