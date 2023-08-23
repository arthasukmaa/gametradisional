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
                                    <select name="asal_daerah" class="form-control @error('nama_daerah') is-invalid @enderror">
                                        <option value=""> --- Pilih ---</option>
                                        <option value="ACEH"> ACEH</option>
                                        <option value="SUMATERA UTARA"> SUMATERA UTARA</option>
                                        <option value="SUMATERA BARAT"> SUMATERA BARAT</option>
                                        <option value="RIAU"> RIAU</option>
                                        <option value="JAMBI"> JAMBI</option>
                                        <option value="SUMATERA SELATAN"> SUMATERA SELATAN</option>
                                        <option value="BENGKULU"> BENGKULU</option>
                                        <option value="LAMPUNG"> LAMPUNG</option>
                                        <option value="KEPULAUAN BANGKA BELITUNG"> KEPULAUAN BANGKA BELITUNG</option>
                                        <option value="KEPULAUAN RIAU"> KEPULAUAN RIAU</option>
                                        <option value="DKI JAKARTA"> DKI JAKARTA</option>
                                        <option value="JAWA BARAT"> JAWA BARAT</option>
                                        <option value="JAWA TENGAH"> JAWA TENGAH</option>
                                        <option value="DAERAH ISTIMEWA YOGYAKARTA"> DAERAH ISTIMEWA YOGYAKARTA</option>
                                        <option value="JAWA TIMUR"> JAWA TIMUR</option>
                                        <option value="BANTEN"> BANTEN</option>
                                        <option value="BALI"> BALI</option>
                                        <option value="NUSA TENGGARA BARAT"> NUSA TENGGARA BARAT</option>
                                        <option value="NUSA TENGGARA TIMUR"> NUSA TENGGARA TIMUR</option>
                                        <option value="KALIMANTAN BARAT"> KALIMANTAN BARAT</option>
                                        <option value="KALIMANTAN TENGAH"> KALIMANTAN TENGAH</option>
                                        <option value="KALIMANTAN SELATAN"> KALIMANTAN SELATAN</option>
                                        <option value="KALIMANTAN TIMUR"> KALIMANTAN TIMUR</option>
                                        <option value="KALIMANTAN UTARA"> KALIMANTAN UTARA</option>
                                        <option value="SULAWESI UTARA"> SULAWESI UTARA</option>
                                        <option value="SULAWESI TENGAH"> SULAWESI TENGAH</option>
                                        <option value="SULAWESI SELATAN"> SULAWESI SELATAN</option>
                                        <option value="SULAWESI TENGGARA"> SULAWESI TENGGARA</option>
                                        <option value="GORONTALO"> GORONTALO</option>
                                        <option value="SULAWESI BARAT"> SULAWESI BARAT</option>
                                        <option value="MALUKU"> MALUKU</option>
                                        <option value="MALUKU UTARA"> MALUKU UTARA</option>
                                        <option value="PAPUA"> PAPUA</option>
                                        <option value="PAPUA BARAT"> PAPUA BARAT</option>                                    
                                        <option value="PAPUA TENGAH"> PAPUA TENGAH</option>                                    
                                        <option value="PAPUA PEGUNUNGAN"> PAPUA PEGUNUNGAN</option>                                    
                                        <option value="PAPUA SELATAN"> PAPUA SELATAN</option>                                    
                                        <option value="PAPUA BARAT DAYA"> PAPUA BARAT DAYA</option>                                    
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
    
@endsection
