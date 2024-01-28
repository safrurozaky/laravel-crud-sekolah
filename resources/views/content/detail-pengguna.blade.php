@extends('index')
@section('content')
    <div class="container">
        <div class="row">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" disabled>
        </div>
        <div class="row">
            <label for="">NIP</label>
            <input type="text" name="nip" class="form-control" value="{{ $data->nip }}" disabled>
        </div>
        <div class="row">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" value="{{ $data->email }}" disabled>
        </div>
        <div class="row">
            <label for="">Role</label>
            <input type="text" name="role" class="form-control" value="{{ $data->role }}" disabled>
        </div>
        <div class="row">
            <label for="">Tanggal Dibuat</label>
            <input type="text" name="created_at" class="form-control" value="{{ $data->created_at }}" disabled>
        </div>
        <div class="row">
            <label for="">Tanggal Diedit</label>
            <input type="text" name="updated_at" class="form-control" value="{{ $data->updated_at }}" disabled>
        </div>
    </div>
@endsection
