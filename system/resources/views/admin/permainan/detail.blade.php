@extends('tempelate.base')
@section('content')
    <style>
        .card-image {
            position: relative;
            margin-bottom: 30px;
        }

        .card-image-action {
            position: absolute;
            width: 100%;
            height: 250px;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.3);
            opacity: 0;
            transition: all .5s linear;
        }

        .card-image:hover .card-image-action {
            opacity: 1;
        }
    </style>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambah" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ url('admin/permainan/tambahGambar', $list[0]->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">TAMBAH GAMBAR</h1>
                        
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="">Pilih Gambar</label>
                                    <input type="file" name="gambar[]"
                                        class="form-control" autocomplete="off" multiple required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-center">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">DETAIL PERMAINAN PERMAINAN</h5>
                    <ul>
                        <li>
                            <span class="fw-semibold">Nama Permainan</span>
                            <p>{{ $list[0]->nama }}</p>
                        </li>
                        <li>
                            <span class="fw-semibold">Asal Daerah </span>
                            <p>{{ $list[0]->asal_daerah }}</p>
                        </li>
                        <li>
                            <span class="fw-semibold">Deskripsi </span>
                            <p>{!! $list[0]->deskripsi !!}</p>
                        </li>
                    </ul>
                    <video controls width="100%" height="360" class="my-5">
                        <source src="{{ url('public') }}/{{ $list[0]->vidio }}" type="video/mp4">
                        <!-- Add additional source elements for other video formats, if needed -->
                        Your browser does not support the video tag.
                    </video>
                    <div class="d-flex align-items-center justify-content-between mb-5">
                        <h5 class="card-title fw-semibold mb-4">GALERI PERMAINAN</h5>
                        <a href="#tambah" class="btn btn-success" data-bs-toggle="modal">Tambah Gambar</a>
                    </div>
                    <div class="row">
                        @foreach ($list[0]->galeri as $galeri)
                            <div class="col-md-4">
                                <div class="card-image">
                                    <img src="{{ url('public') }}/{{ $galeri->gambar }}" alt=""
                                        style="width: 100%;height: 250px">
                                    <div class="card-image-action d-flex align-items-center justify-content-center">
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $galeri->id }}">Update</button>
                                        <button class="btn btn-danger mx-3" data-bs-toggle="modal"
                                            data-bs-target="#hapus{{ $galeri->id }}">Hapus</button>
                                    </div>
                                </div>
                            </div>

                            


                            <!-- Modal Update -->
                            <div class="modal fade" id="edit{{ $galeri->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{ url('admin/permainan/updateGambar', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">UPDATE GAMBAR</h1>
                                                
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-3">
                                                            <label for="">Pilih Gambar</label>
                                                            <input type="file" name="gambar"
                                                                class="form-control" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">BATAL</button>
                                                <button type="submit" class="btn btn-primary">UPDATE</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Modal Hapus -->
                            <div class="modal fade" id="hapus{{ $galeri->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{ url('admin/permainan/hapusGambar', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header d-flex flex-column">
                                                <div class="icons">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="100" height="100" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
                                                     </svg>
                                                </div>
                                                <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">HAPUS GABMAR</h1>
                                                <p class="text-center">Yakin ingin menghapus gambar ini ?!, Data yang telah dihapus tidak bisa dikembalikan lagi.</p>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
