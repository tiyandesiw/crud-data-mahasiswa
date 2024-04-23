@extends('layouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-sm-12 col-12 mb-5">

                <div class="mt-5">
                    <a href="{{ route('Mahasiswa.index') }}" class="btn btn-primary"><- Kembali</a>
                            @include('alert')
                </div>

                <div class="card bg-light shadow-sm mt-3">

                    <div class="card-body">
                        <h3 class="text-center"><b>Tambah Data</b></h3>

                        <form action="{{ route('Mahasiswa.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="nim">NIM</label>
                                <input type="text" name="nim" required id="nim" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" required id="nama" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" required id="alamat" class="form-control">
                            </div>

                            <div class="form-group mb-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" required id="email" class="form-control">
                            </div>

                            <div class="row mb-2">
                                <div class="form-group col-6">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" required id="tempat_lahir"
                                        class="form-control">
                                </div>

                                <div class="form-group col-6">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" required id="tgl_lahir" class="form-control">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="form-group col-6">
                                    <label for="agama">Agama</label>
                                    <input type="text" name="agama" required id="agama" class="form-control">
                                </div>

                                <div class="form-group col-6">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Lulus">Lulus</option>
                                        <option value="Cuti">Cuti</option>
                                        <option value="Drop Out">Drop Out</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" required
                                    accept=".jpg,.png">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-4">Simpan</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
