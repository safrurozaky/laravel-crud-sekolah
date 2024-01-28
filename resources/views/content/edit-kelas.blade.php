@extends('index')
@section('content')
    <div class="container">
        <form action="{{ route('kelas.update', [$data->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <label for="">Kode Kelas</label>
                <input type="text" name="kode_kelas" class="form-control" value="{{ $data->kode_kelas }}" required>
                @if ($errors->has('kode_kelas'))
                    <span class="text-danger">{{ $errors->first('kode_kelas') }}</span>
                @endif
                <!-- name disamping itu disesuaikan dengan kode_kelas tabel di db nya ya -->
            </div>
            <div class="row">
                <label for="">Nama Kelas</label>
                <input type="text" name="nama_kelas" class="form-control" value="{{ $data->nama_kelas }}" required>
                @if ($errors->has('nama_kelas'))
                    <!-- nama_kelas itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                    <span class="text-danger">{{ $errors->first('nama_kelas') }}</span>
                @endif
            </div>
            <div class="row">
                <label for="">Wali Kelas</label>
                <input type="text" name="wali_kelas" class="form-control" value="{{ $data->wali_kelas }}" required>
                @if ($errors->has('wali_kelas'))
                    <!-- wali_kelas itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                    <span class="text-danger">{{ $errors->first('wali_kelas') }}</span>
                @endif
            </div>
            <div class="row">
                <label for="">Jumlah Siswa</label>
                <input type="number" name="jml_siswa" class="form-control" value="{{ $data->jml_siswa }}" required>
                @if ($errors->has('jml_siswa'))
                    <!-- jml_siswa itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                    <span class="text-danger">{{ $errors->first('jml_siswa') }}</span>
                @endif
            </div>
            <div class="row mt-2">
                <button type="submit" class="btn btn-success">Ubah Data</button>
            </div>
        </form>
    </div>
@endsection
