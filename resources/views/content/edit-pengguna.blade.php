@extends('index')
@section('content')
    <div class="container">
        <form action="{{ route('pengguna.update', [$data->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $data->nama }}" required>
                @if ($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            <div class="row">
                <label for="">Nip</label>
                <textarea name="nip" class="form-control" required>{{ $data->nip }}</textarea>
                @if ($errors->has('nip'))
                    <span class="text-danger">{{ $errors->first('nip') }}</span>
                @endif
            </div>
            <div class="row">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $data->email }}" required>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="row">
                <label for="">Role</label>
                <select name="role" class="form-control" required>
                    <option value="{{ $data->role }}">Pilih Role</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Staf" {{ old('role') == 'Staf' ? 'selected' : '' }}>Staf</option>
                </select>
                @if ($errors->has('role'))
                    <span class="text-danger">{{ $errors->first('role') }}</span>
                @endif
            </div>
            <div class="row">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="row">
                <label for="">Retype Password</label>
                <input type="password" name="retype_password" class="form-control" value="{{ old('retype_password') }}">
                @if ($errors->has('retype_password'))
                    <span class="text-danger">{{ $errors->first('retype_password') }}</span>
                @endif
            </div>
            <div class="row mt-2">
                <button type="submit" class="btn btn-success">Ubah Data</button>
            </div>
        </form>
    </div>
@endsection
