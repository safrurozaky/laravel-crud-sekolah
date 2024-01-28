<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function list()
    {
        $data = Kelas::get(); //variabel data harus sesuai dengan variabel di foreach pada view
        return view('content.list-kelas', compact('data'));
    }

    public function tambahKelas()
    {
        $validate = request()->validate([
            'kode_kelas' => ['required'],
            'nama_kelas' => ['required'],
            'wali_kelas' => ['required'],
            'jml_siswa' => ['required', 'numeric']
        ]);

        $kode_kelas = Kelas::where('kode_kelas', request('kode_kelas'))->exists();
        if ($kode_kelas) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'kode kelas ' . request('Kode_kelas') . ' sudah terdaftar'
            ]);
        }
        $nama_kelas = Kelas::where('nama_kelas', request('nama_kelas'))->exists();
        if ($nama_kelas) {
            return redirect()->back()->with([
                'error' => true,
                'message' => 'Nama Kelas ' . request('nama_kelas') . ' sudah terdaftar'
            ]);
        }

        $ins = Kelas::create([
            'kode_kelas' => request('kode_kelas'),
            'nama_kelas' => request('nama_kelas'),
            'wali_kelas' => request('wali_kelas'),
            'jml_siswa' => request('jml_siswa'),
        ]);
        if ($ins) {
            return redirect()->back()->with([
                'error' => false,
                'message' => 'Tambah Kelas Berhasil'
            ]);
        } //karna kita pakai return di sebelumnya, jadi ngga usah pakai else, ngebuang kode,,wkwk
        return redirect()->back()->with([
            'error' => true,
            'message' => 'Tambah Kelas Gagal'
        ]);
    }

    public function detailKelas($id)
    {
        $data = Kelas::find($id);
        if ($data == null) {
            return redirect()->route('kelas.list')->with([
                'error' => true,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return view('content.detail-kelas', compact('data'));
    }

    public function updateKelas($id)
    {
        $validate = request()->validate([
            'kode_kelas' => ['required'],
            'nama_kelas' => ['required'],
            'wali_kelas' => ['required'],
            'jml_siswa' => ['required', 'numeric']
        ]); //ambil dari tambah

        $data = Kelas::find($id);
        if ($data == null) {
            return redirect()->route('kelas.list')->with([
                'error' => true,
                'message' => 'Data Tidak Ditemukan'
            ]);
        } //ambil dari detail

        $upd = $data->update([
            'kode_kelas' => request('kode_kelas'),
            'nama_kelas' => request('nama_kelas'),
            'wali_kelas' => request('wali_kelas'),
            'jml_siswa' => request('jml_siswa'),
        ]); //ambil dari tambah

        if ($upd) {
            return redirect()->route('kelas.list')->with([
                'error' => false,
                'message' => 'Tambah Kelas Berhasil'
            ]);
        } //karna kita pakai return di sebelumnya, jadi ngga usah pakai else, ngebuang kode,,wkwk
        return redirect()->back()->with([
            'error' => true,
            'message' => 'Tambah Kelas Gagal'
        ]); //ambil dari tambah
    }

    public function editKelas($id)
    {
        $data = Kelas::find($id);
        if ($data == null) {
            return redirect()->route('kelas.list')->with([
                'error' => true,
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        return view('content.edit-kelas', compact('data')); //ambil dari detail
    }

    public function hapusKelas($id)
    {
        $data = Kelas::find($id);
        if ($data == null) {
            return redirect()->route('kelas.list')->with([
                'error' => true,
                'message' => 'Data Tidak Ditemukan'
            ]);
        } //ambil dari edit
        $del = $data->delete();
        if ($del) {
            return redirect()->route('kelas.list')->with([
                'error' => false,
                'message' => 'Hapus kelas Berhasil'
            ]);
        }
        return redirect()->route('kelas.list')->with([
            'error' => true,
            'message' => 'Hapus kelas Gagal'
        ]); //ambil dari update
    }    
}
