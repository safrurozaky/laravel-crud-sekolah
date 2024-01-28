@extends('index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKelasModal">Tambah
                    Kelas</button>
            </div>
        </div>

        <div class="row">
            <div class="col card">
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kelas</th>
                                <th>Nama Kelas</th>
                                <th>Wali Kelas</th>
                                <th>Jumlah Siswa</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Diedit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @foreach ($data as $val)
                                {{-- yang menjadi alias di samping di pakai juga di bawah bagian href --}}
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $val->kode_kelas }}</td>
                                    <td>{{ $val->nama_kelas }}</td>
                                    <td>{{ $val->wali_kelas }}</td>
                                    <td>{{ $val->jml_siswa }}</td>
                                    <td>{{ $val->created_at }}</td>
                                    <td>{{ $val->updated_at }}</td>
                                    <th>
                                        <a href="{{ route('kelas.detail', [$val->id]) }}"
                                            class="btn btn-sm btn-success">Detail</a>
                                        {{-- $val diatas disesuaikan dengan variabel yang dipakai diatas ya --}}
                                        <a href="{{ route('kelas.edit', [$val->id]) }}"
                                            class="btn btn-sm btn-secondary">Edit</a>
                                        <a href="#" onclick="deleteData(this)"
                                            data-src="{{ route('kelas.hapus', [$val->id]) }}"
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
    <div class="modal fade" id="tambahKelasModal" tabindex="-1" role="dialog" aria-labelledby="tambahKelasModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKelasModalLabel">Tambah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('kelas.tambah') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <label for="">Kode Kelas</label>
                                <input type="text" name="kode_kelas" class="form-control" required>
                                <!-- name disamping itu disesuaikan dengan kode_kelas tabel di db nya ya -->
                                @if ($errors->has('kode_kelas'))
                                    <span class="text-danger">{{ @errors->first('kode_kelas') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Nama Kelas</label>
                                <input type="text" name="nama_kelas" class="form-control" required>
                                @if ($errors->has('nama_kelas'))
                                    <!-- nama_kelas itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                                    <span class="text-danger">{{ @errors->first('nama_kelas') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Wali Kelas</label>
                                <input type="text" name="wali_kelas" class="form-control" required>
                                @if ($errors->has('wali_kelas'))
                                    <!-- wali_kelas itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                                    <span class="text-danger">{{ @errors->first('wali_kelas') }}</span>
                                @endif
                            </div>
                            <div class="row">
                                <label for="">Jumlah Siswa</label>
                                <input type="number" name="jml_siswa" class="form-control" required>
                                @if ($errors->has('jml_siswa'))
                                    <!-- jml_siswa itu nama field di tabel, harus disesuaikan nanti jangan lupa -->
                                    <span class="text-danger">{{ @errors->first('jml_siswa') }}</span>
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
