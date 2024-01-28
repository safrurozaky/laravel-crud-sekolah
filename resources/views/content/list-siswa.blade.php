@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahSiswaModal">Tambah
                    Siswa</button>
            </div>
        </div>

        <div class="row">
            <div class="col card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Nama Kelas</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diedit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Safru Rozaky</td>
                                <td>01 Jan 2020</td>
                                <td>Laki-Laki</td>
                                <td>Jakarta Selatan</td>
                                <td>XII MIPA 4</td>
                                <td>01 Jan 2024, 13:00:00</td>
                                <td>01 Jan 2024, 13:00:00</td>
                                <th>
                                    <a href="#" class="btn btn-sm btn-success">Detail</a>
                                    <a href="#" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahSiswaModal" tabindex="-1" role="dialog" aria-labelledby="tambahSiswaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSiswaModalLabel">Tambah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="">
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <label for="">Nama Siswa</label>
                                <input type="text" name="nama" class="form-control" required>
                                <!-- name disamping itu disesuaikan dengan nama tabel di db nya ya -->
                                @if ($errors->has('nama'))
                                    <span class="text-danger">{{ @errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" required>
                                @if ($errors->has('tgl_lahir'))
                                    <!-- tgl_lahir itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                                    <span class="text-danger">{{ @errors->first('tgl_lahir') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" class="form-control" required>
                                @if ($errors->has('jenis_kelamin'))
                                    <!-- jenis_kelamin itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                                    <span class="text-danger">{{ @errors->first('jenis_kelamin') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Alamat</label>
                                <textarea name="alamat" class="form-control" required></textarea>
                                @if ($errors->has('alamat'))
                                    <!-- alamat itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                                    <span class="text-danger">{{ @errors->first('alamat') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Nama Kelas</label>
                                <select name="kelas_id" class="form-control" required>
                                    <option value="">Pilih Kelas</option>
                                </select>
                                @if ($errors->has('kelas_id'))
                                    <!-- kelas_id itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                                    <span class="text-danger">{{ @errors->first('kelas_id') }}</span>
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
