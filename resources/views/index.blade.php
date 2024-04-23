@extends('layouts')

@section('content')
    <div class="container">

        <h1 class="text-center mt-5">Data Mahasiswa</h1>

        <div class="col-md-12">
            @include('alert')
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row justify-content-end pr-3 mb-2">
                            @if (Auth::check())
                                <a href="{{ route('Mahasiswa.create') }}" class="btn btn-primary px-5 mr-2"
                                    style="border-radius: 10px;">Tambah
                                    Data</a>
                                <a href="{{ route('Logout') }}" class="btn btn-primary px-5"
                                    style="border-radius: 10px;">Logout</a>
                            @else
                                <a href="{{ route('Login') }}" class="btn btn-primary px-5"
                                    style="border-radius: 10px;">Login</a>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Tempat Lahir</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Agama</th>
                                        <th scope="col">Status</th>
                                        @auth
                                            <th scope="col">Aksi</th>
                                        @endauth
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>
                                                <img class="shadow-sm" src="{{ asset('/storage/' . $item->foto) }}"
                                                    alt="" width="40">
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nim }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->tempat_lahir }}</td>
                                            <td>{{ $item->tgl_lahir }}</td>
                                            <td>{{ $item->agama }}</td>
                                            <td>{{ $item->status }}</td>
                                            @auth
                                                <td>
                                                    <form action="{{ route('Mahasiswa.destroy', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('Mahasiswa.edit', $item->id) }}"
                                                            class="badge bg-warning text-white">Edit</a>
                                                        <button type="submit"
                                                            class="badge bg-danger text-white border-0">Hapus</button>
                                                    </form>
                                                </td>
                                            @endauth
                                        </tr>
                                    @empty
                                        <tr>
                                            <th scope="row" class="text-center" colspan="{{ Auth::check() ? 11 : 10 }}">
                                                Tidak
                                                ada data</th>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
