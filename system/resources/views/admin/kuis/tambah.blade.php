@extends('tempelate.base')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-semibold mb-4">TAMBAH DATA KUIS</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/kuis/tambahAct') }}" method="POST" enctype="multipart/form-data"
                        novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">Level Kuis</label>
                                    <select name="level" id="" class="form-control @error('level') is-invalid @enderror">
                                        <option value="">--- Pilih ---</option>
                                        @for ($i = 1; $i < 11; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('level') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">Gambar</label>
                                    <input type="file" name="gambar" placeholder="Gabar ..." class="form-control @error('gambar') is-invalid @enderror"
                                        autocomplete="off">
                                        @error('gambar') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="">Pertanyaan</label>
                                    <textarea name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" autocomplete="off" placeholder="Pertanyaan ..."
                                    ></textarea>
                                        @error('pertanyaan') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="">Pilihan A</label>
                                    <input type="text" name="a" placeholder="Pilihan A ..." class="form-control @error('a') is-invalid @enderror"
                                        autocomplete="off">
                                        @error('a') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="">Pilihan B</label>
                                    <input type="text" name="b" placeholder="Pilihan B ..." class="form-control @error('b') is-invalid @enderror"
                                        autocomplete="off">
                                        @error('b') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="">Pilihan C</label>
                                    <input type="text" name="c" placeholder="Pilihan C ..." class="form-control @error('c') is-invalid @enderror"
                                        autocomplete="off">
                                        @error('c') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label for="">Pilihan D</label>
                                    <input type="text" name="d" placeholder="Pilihan D ..." class="form-control @error('d') is-invalid @enderror"
                                        autocomplete="off">
                                        @error('d') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="">Jawaban</label>
                                    <input type="text" name="jawaban" placeholder="Jawaban ..." class="form-control @error('jawaban') is-invalid @enderror"
                                        autocomplete="off">
                                        @error('jawaban') <span class="text-danger">{{ $message }}</span> @enderror
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
   
@endsection
