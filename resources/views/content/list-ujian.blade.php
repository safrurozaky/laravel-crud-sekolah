@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahUjianModal">Tambah Nilai
                    Ujian</button>
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
                                <th>Mata Pelajaran</th>
                                <th>Tanggal Ujian</th>
                                <th>Nilai Ujian</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diedit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Safru Rozaky</td>
                                <td>Matematika</td>
                                <td>25 Jan 2024</td>
                                <td>90</td>
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
    <div class="modal fade" id="tambahUjianModal" tabindex="-1" role="dialog" aria-labelledby="tambahUjianModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUjianModalLabel">Tambah Nilai Ujian</h5>
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
                                <label for="">Mata Pelajaran</label>
                                <select name="pelajaran" class="form-control" required>
                                    <option value="">Pilih Mata Pelajaran</option>
                                </select>
                                @if ($errors->has('pelajaran'))
                                    <!-- pelajaran itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                                    <span class="text-danger">{{ @errors->first('pelajaran') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Tanggal Ujian</label>
                                <input type="date" name="tgl_ujian" class="form-control" required>
                                @if ($errors->has('tgl_ujian'))
                                    <!-- tgl_ujian itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                                    <span class="text-danger">{{ @errors->first('tgl_ujian') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Nilai Ujian</label>
                                <input type="number" name="nilai" class="form-control" required>
                                @if ($errors->has('nilai'))
                                    <!-- nilai itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                                    <span class="text-danger">{{ @errors->first('nilai') }}</span>
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
