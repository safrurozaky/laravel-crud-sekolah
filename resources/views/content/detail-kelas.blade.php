@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <label for="">Kode Kelas</label>
            <input type="text" name="kode_kelas" class="form-control" value="{{ $data->kode_kelas }}" disabled>
            <!-- name disamping itu disesuaikan dengan kode_kelas tabel di db nya ya -->
        </div>
        <div class="row">
            <label for="">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="{{ $data->nama_kelas }}" disabled>
        </div>
        <div class="row">
            <label for="">Wali Kelas</label>
            <input type="text" name="wali_kelas" class="form-control" value="{{ $data->wali_kelas }}" disabled>
        </div>
        <div class="row">
            <label for="">Jumlah Siswa</label>
            <input type="number" name="jml_siswa" class="form-control" value="{{ $data->jml_siswa }}" disabled>
        </div>
        <div class="row">
            <label for="">Tanggal Dibuat</label>
            <input type="text" name="created_at" class="form-control" value="{{ $data->created_at }}" disabled>
        </div>
        <div class="row">
            <label for="">Tanggal Diubah</label>
            <input type="text" name="updated_at" class="form-control" value="{{ $data->updated_at }}" disabled>
        </div>
    </div>
@endsection
