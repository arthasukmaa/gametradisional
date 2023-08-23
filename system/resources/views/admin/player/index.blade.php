@extends('tempelate.base')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title fw-semibold ">DATA PLAYER</h5>
                    {{-- <a href="#add" class="btn btn-success" data-bs-toggle="modal">Tambah</a> --}}
                </div>
                <div class="card-body" >
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th>
                                    <center>No.</center>
                                </th>
                                <th>
                                    <center>Nama</center>
                                </th>
                                <th>
                                    <center>Email</center>
                                </th>
                                <th>
                                    <center>Password</center>
                                </th>
                                <th>
                                    <center>Aksi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>
                                        <center>{{ $loop->iteration }}</center>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ url('public') }}/{{ $item->avatar }}" alt=""
                                                style="width: 45px;height:45px;border-radius:50%">
                                            <span class="d-block mx-3">{{ $item->nama }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <center>{{ $item->email }}</center>
                                    </td>
                                    <td>
                                        <center>{{ $item->limit() }}</center>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="btn-group">
                                                {{-- <a href="#edit{{ $item->id }}" class="btn btn-primary"
                                                    data-bs-toggle="modal">Edit</a> --}}
                                                {{-- <a href="#hapus{{ $item->id }}" class="btn btn-danger"
                                                    data-bs-toggle="modal">Hapus</a> --}}
                                            </div>
                                        </center>
                                    </td>
                                </tr>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ url('admin/player/editAct', $item->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header d-flex flex-column">
                                                    <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">
                                                        FORM UPDATE PLAYER</h1>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label>Nama Player</label>
                                                            <input type="text" name="nama" value="{{ $item->nama }}" class="form-control"
                                                                placeholder="Nama player ..." autocomplete="off" required>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label>Avatar / Gambar</label>
                                                            <input type="file" name="avatar" class="form-control"
                                                                placeholder="Avatar player ..." autocomplete="off">
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label>Email</label>
                                                            <input type="text" name="email" value="{{ $item->email }}" class="form-control"
                                                                placeholder="Email player ..." autocomplete="off" required>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label>Password baru</label>
                                                            <input type="text" name="password" class="form-control"
                                                                placeholder="Password baru player ..." autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex align-items-center justify-content-center">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">BATAL</button>
                                                    <button type="submit" class="btn btn-primary">UPDATE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <form action="{{ url('admin/player/hapus', $item->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header d-flex flex-column">
                                                    <div class="icons">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-alert-circle-filled"
                                                            width="100" height="100" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z"
                                                                stroke-width="0" fill="currentColor"></path>
                                                        </svg>
                                                    </div>
                                                    <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">
                                                        HAPUS PLAYER</h1>
                                                    <p class="text-center">Yakin ingin menghapus data ini ?!, Data yang
                                                        telah dihapus tidak bisa dikembalikan lagi.</p>
                                                </div>

                                                <div class="modal-footer d-flex align-items-center justify-content-center">
                                                    <button type="button" class="btn btn-success"
                                                        data-bs-dismiss="modal">BATAL</button>
                                                    <button type="submit" class="btn btn-danger">HAPUS</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ url('admin/player/tambahAct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header d-flex flex-column">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">FORM TAMBAH PLAYER BARU</h1>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Nama Player</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama player ..."
                                    autocomplete="off" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Avatar / Gambar</label>
                                <input type="file" name="avatar" class="form-control"
                                    placeholder="Avatar player ..." autocomplete="off" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email player ..."
                                    autocomplete="off" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control"
                                    placeholder="Password player ..." autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-center">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-success">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
