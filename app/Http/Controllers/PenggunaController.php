<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function list()
    {
        $data = User::get(); //variabel data harus sesuai dengan variabel di foreach pada view
        return view('content.list-pengguna', compact('data'));
    }

    public function tambahPengguna()
    {
        $validate = request()->validate([
            'nama' => ['required'],
            'nip' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'role' => ['required'],
            'password' => ['required'],
            'retype_password' => ['required', 'same:password']
        ]);

        $email = User::where('email', request('email'))->exists();
        if ($email) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'email ' . request('email') . ' sudah terdaftar'
            ]);
        }
        $nip = User::where('nip', request('nip'))->exists();
        if ($nip) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'nip ' . request('nip') . ' sudah terdaftar'
            ]);
        }

        $ins = User::create([
            'nama' => request('nama'),
            'nip' => request('nip'),
            'email' => request('email'),
            'role' => request('role'),
            'password' => bcrypt(request('password')),
        ]);
        if ($ins) {
            return redirect()->back()->with([
                'error' => false,
                'message' => 'Tambah Pengguna Berhasil'
            ]);
        } //karna kita pakai return di sebelumnya, jadi ngga usah pakai else, ngebuang kode,,wkwk
        return redirect()->back()->with([
            'error' => true,
            'message' => 'Tambah Pengguna Gagal'
        ]);
    }

    public function detailPengguna($id)
    {
        $data = User::find($id);
        if ($data == null) {
            return redirect()->route('pengguna.index')->with([
                'error' => true,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return view('content.detail-pengguna', compact('data'));
    }

    public function updatePengguna($id)
    {
        $validate = request()->validate([
            'nama'=>['required'],
            'nip'=>['required','numeric'],
            'email'=>['required','email'],
            'role'=>['required'],
            'password'=>['nullable'],
            'retype_password'=>['nullable','same:password']
        ]);
        $pengguna = User::where('email',request('email'));
        $oldEmail = $pengguna->first()->email;
        if($oldEmail != request("email")){
            if($pengguna->exist()){
                return redirect()->back()->with([
                    'error'=>true,
                    'message'=>'email '.request('email').' sudah terdaftar'
                ]);
            }
        }
        $data = User::find($id);
        if($data==null){
            return redirect()->route('pengguna.list')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        $updateData = [
            'nama'=>request('nama'),
            'nip'=>request('nip'),
            'email'=>request('email'),
            'role'=>request('role'),
            
        ];
        if(request()->has('password') && request('password')!=null){
            $updateData['password']=bcrypt(request('password'));
        }
        $upd = $data->update($updateData);
        if($upd){
            return redirect()->route('pengguna.list')->with([
                'error'=>false,
                'message'=>'Ubah User Berhasil'
            ]);
        }
        return redirect()->back()->with([
            'error'=>true,
            'message'=>'Ubah User Gagal'
        ]);
    }

    public function editPengguna($id)
    {
        $data = User::find($id);
        if($data==null){
            return redirect()->route('pengguna.list')->with([
                'error'=>true,
                'message'=>'Data Tidak Ditemukan'
            ]);
        }
        return view('content.edit-pengguna',compact('data'));
    }

    public function hapusPengguna($id)
    {
        $data = User::find($id);
        if ($data == null) {
            return redirect()->route('pengguna.list')->with([
                'error' => true,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        $del = $data->delete();
        if ($del) {
            return redirect()->route('pengguna.list')->with([
                'error' => false,
                'message' => 'Hapus pengguna Berhasil'
            ]);
        }
        return redirect()->route('pengguna.list')->with([
            'error' => true,
            'message' => 'Hapus pengguna Gagal'
        ]);
    }
}
