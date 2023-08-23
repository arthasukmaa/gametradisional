@extends('tempelate.base')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title fw-semibold ">DATA KUIS</h5>
                    <a href="{{ url('admin/kuis/tambah') }}" class="btn btn-success">Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Level</center></th>
                                <th><center>Pertanyaan</center></th>
                                <th><center>Jawaban</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                            <tr>
                                <td><center>{{ $loop->iteration }}</center></td>
                                <td><center>{{ $item->level }}</center></td>
                                <td><center>{{ $item->pertanyaan }}</center></td>
                                <td><center>{{ $item->jawaban }}</center></td>
                                <td>
                                    <center>
                                        <div class="btn-group">
                                            <a href="{{ url('admin/kuis/detail', $item->id) }}" class="btn btn-warning">Detail</a>
                                            <a href="{{ url('admin/kuis/edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="#hapus{{ $item->id }}" class="btn btn-danger" data-bs-toggle="modal">Hapus</a>
                                        </div>
                                    </center>
                                </td>
                            </tr> 

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{ url('admin/kuis/hapus', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header d-flex flex-column">
                                                <div class="icons">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="100" height="100" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
                                                     </svg>
                                                </div>
                                                <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">HAPUS KUIS</h1>
                                                <p class="text-center">Yakin ingin menghapus data ini ?!, Data yang telah dihapus tidak bisa dikembalikan lagi.</p>
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
@endsection
