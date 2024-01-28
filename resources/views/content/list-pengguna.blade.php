@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPenggunaModal">Tambah
                    Pengguna</button>
            </div>
        </div>

        <div class="row">
            <div class="col card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diedit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($data as $val)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $val->nama }}</td>
                                    <td>{{ $val->nip }}</td>
                                    <td>{{ $val->email }}</td>
                                    <td>{{ $val->role }}</td>
                                    <td>{{ $val->created_at }}</td>
                                    <td>{{ $val->updated_at }}</td>
                                    <th>
                                        <a href="{{ route('pengguna.detail', [$val->id]) }}"
                                            class="btn btn-sm btn-success">Detail</a>
                                        <a href="{{ route('pengguna.edit', [$val->id]) }}"
                                            class="btn btn-sm btn-secondary">Edit</a>
                                        <a href="#" onclick="deleteData(this)"
                                            data-src="{{ route('pengguna.hapus', [$val->id]) }}"
                                            class="btn btn-sm btn-danger">Hapus</a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahPenggunaModal" tabindex="-1" role="dialog"
        aria-labelledby="tambahPenggunaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPenggunaModalLabel">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pengguna.tambah') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" required
                                    value="{{ old('nama') }}">
                                <!-- name disamping itu disesuaikan dengan nama tabel di db nya ya -->
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ @errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">NIP</label>
                                <input type="number" name="nip" class="form-control" required
                                    value="{{ old('nip') }}">
                                @if ($errors->has('nip'))
                                    <span class="text-danger">{{ @errors->first('nip') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" required
                                    value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ @errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="">Pilih Role</option>
                                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Staf" {{ old('role') == 'Staf' ? 'selected' : '' }}>Staf</option>
                                </select>
                                @if ($errors->has('role'))
                                    <span class="text-danger">{{ @errors->first('role') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required
                                    value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ @errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Retype Password</label>
                                <input type="password" name="retype_password" class="form-control" required
                                    value="{{ old('retype_password') }}">
                                @if ($errors->has('retype_password'))
                                    <span class="text-danger">{{ @errors->first('retype_password') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
