@extends('tempelate.base')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-semibold mb-4">TAMBAH DATA PERMAINAN</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/permainan/tambahAct') }}" method="POST" enctype="multipart/form-data" class="needs-validation"
                        >
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="">Nama Permainan</label>
                                    <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama permainan ..."
                                        class="form-control @error('nama') is-invalid @enderror" autocomplete="off" >
                                    @error('nama')
                                        <label class="text-danger text-right">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="">Asal Daerah</label>
                                    <select name="asal_daerah" class="form-control @error('asal_daerah') is-invalid @enderror" id="select">
              
                                    </select>
                                    @error('asal_daerah')
                                        <label class="text-danger text-right">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="">Gambar</label>
                                    <input type="file" name="gambar[]" placeholder="Gambar ..." class="form-control @error('gambar') is-invalid @enderror"
                                        autocomplete="off"  multiple>
                                        @error('gambar')
                                        <label class="text-danger text-right">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="">Vidio</label>
                                    <input type="file" name="vidio" placeholder="Vidio ..." class="form-control @error('vidio') is-invalid @enderror"
                                        autocomplete="off"  multiple>
                                        @error('vidio')
                                        <label class="text-danger text-right">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="">Deskripsi permainan</label>
                                    <textarea id="tiny-textarea" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" autocomplete="off" placeholder="Deskripsi ..."
                                        ></textarea>
                                        @error('deskripsi')
                                        <label class="text-danger text-right">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary full-right">SIMPAN</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('public') }}/assets/assets/libs/jquery/dist/jquery.min.js"></script>
    <script>
        const api_url = "./../../public/data.json";
        async function getapi(url) {
            const response = await fetch(url);
            var data = await response.json();
            show(data);
        }
        getapi(api_url);
        function show(data) {
            let tab = '';
            for (let r of data) {
                tab += `<option value="${r.nama}"> ${r.nama}</option>`;
            }
            $('#select').html(tab)
        }
    </script>
@endsection
