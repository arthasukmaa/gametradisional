@extends('tempelate.base')
@section('content')
<style>
    .li-item{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }
    .li-item .left{
        display: block;
        padding: 0;
        margin: 0;
        font-weight: bold
    }
</style>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ url('public') }}/{{ $list->foto }}" alt="" width="100%" height="350px">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title fw-semibold ">PROFILE</h5>
                </div>
                <div class="card-body">
                    <ul>
                        <li class="li-item">
                            <span class="left">Nama</span>
                            <span class="right">{{ $list->nama }}</span>
                        </li>
                        <li class="li-item">
                            <span class="left">Email</span>
                            <span class="right">{{ $list->email }}</span>
                        </li>
                        <li class="li-item">
                            <span class="left">Password</span>
                            <span class="right">{{ $list->password }}</span>
                        </li>
                        <li class="li-footer">
                            <a href="#edit" class="btn btn-primary"
                                data-bs-toggle="modal">EDIT</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ url('admin/profile/edit', $list->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header d-flex flex-column">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">EDIT PROFILE</h1>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" value="{{ $list->nama }}" class="form-control" placeholder="Nama ..."
                                    autocomplete="off" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ $list->email }}" class="form-control" placeholder="Email player ..."
                                    autocomplete="off" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control"
                                    placeholder="Password ..." autocomplete="off" >
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Foto / Gambar</label>
                                <input type="file" name="foto" class="form-control"
                                    placeholder="Foto ..." autocomplete="off" >
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-center">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-success">EDIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
