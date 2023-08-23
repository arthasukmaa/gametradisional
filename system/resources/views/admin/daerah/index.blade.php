@extends('tempelate.base')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title fw-semibold ">DATA DAERAH</h5>
                    <a href="#add" class="btn btn-success" data-bs-toggle="modal">Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table" id="datatable">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Nama Daerah</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                            <tr>
                                <td><center>{{ $loop->iteration }}</center></td>
                                <td><center>{{ $item->nama_daerah }}</center></td>
                               
                                <td>
                                    <center>
                                        <div class="btn-group">
                                            <a href="#edit{{ $item->id }}" class="btn btn-primary" data-bs-toggle="modal">Edit</a>
                                            <a href="#hapus{{ $item->id }}" class="btn btn-danger" data-bs-toggle="modal">Hapus</a>
                                        </div>
                                    </center>
                                </td>
                            </tr> 

                             <!-- Modal Edit -->
                            <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="{{ url('admin/daerah/editAct', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header d-flex flex-column">
                                                <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">FORM EDIT DAERAH</h1>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label>Nama Daerah</label>
                                                        <select name="nama_daerah" class="form-control @error('nama_daerah') is-invalid @enderror">
                                                            <option value=""> --- Pilih ---</option>
                                                            <option value="ACEH" @if ($item->nama_daerah == "ACEH") selected @endif> ACEH</option>
                                                            <option value="SUMATERA UTARA" @if ($item->nama_daerah == "SUMATERA UTARA") selected @endif> SUMATERA UTARA</option>
                                                            <option value="SUMATERA BARAT" @if ($item->nama_daerah == "SUMATERA BARAT") selected @endif> SUMATERA BARAT</option>
                                                            <option value="RIAU" @if ($item->nama_daerah == "RIAU") selected @endif> RIAU</option>
                                                            <option value="JAMBI" @if ($item->nama_daerah == "JAMBI") selected @endif> JAMBI</option>
                                                            <option value="SUMATERA SELATAN" @if ($item->nama_daerah == "SUMATERA SELATAN") selected @endif> SUMATERA SELATAN</option>
                                                            <option value="BENGKULU" @if ($item->nama_daerah == "BENGKULU") selected @endif> BENGKULU</option>
                                                            <option value="LAMPUNG" @if ($item->nama_daerah == "LAMPUNG") selected @endif> LAMPUNG</option>
                                                            <option value="KEPULAUAN BANGKA BELITUNG" @if ($item->nama_daerah == "KEPULAUAN BANGKA BELITUNG") selected @endif> KEPULAUAN BANGKA BELITUNG</option>
                                                            <option value="KEPULAUAN RIAU" @if ($item->nama_daerah == "KEPULAUAN RIAU") selected @endif> KEPULAUAN RIAU</option>
                                                            <option value="DKI JAKARTA" @if ($item->nama_daerah == "DKI JAKARTA") selected @endif> DKI JAKARTA</option>
                                                            <option value="JAWA BARAT" @if ($item->nama_daerah == "JAWA BARAT") selected @endif> JAWA BARAT</option>
                                                            <option value="JAWA TENGAH" @if ($item->nama_daerah == "JAWA TENGAH") selected @endif> JAWA TENGAH</option>
                                                            <option value="DAERAH ISTIMEWA YOGYAKARTA" @if ($item->nama_daerah == "DAERAH ISTIMEWA YOGYAKARTA") selected @endif> DAERAH ISTIMEWA YOGYAKARTA</option>
                                                            <option value="JAWA TIMUR" @if ($item->nama_daerah == "JAWA TIMUR") selected @endif> JAWA TIMUR</option>
                                                            <option value="BANTEN" @if ($item->nama_daerah == "BANTEN") selected @endif> BANTEN</option>
                                                            <option value="BALI" @if ($item->nama_daerah == "BALI") selected @endif> BALI</option>
                                                            <option value="NUSA TENGGARA BARAT" @if ($item->nama_daerah == "NUSA TENGGARA BARAT") selected @endif> NUSA TENGGARA BARAT</option>
                                                            <option value="NUSA TENGGARA TIMUR" @if ($item->nama_daerah == "NUSA TENGGARA TIMUR") selected @endif> NUSA TENGGARA TIMUR</option>
                                                            <option value="KALIMANTAN BARAT" @if ($item->nama_daerah == "KALIMANTAN BARAT") selected @endif> KALIMANTAN BARAT</option>
                                                            <option value="KALIMANTAN TENGAH" @if ($item->nama_daerah == "KALIMANTAN TENGAH") selected @endif> KALIMANTAN TENGAH</option>
                                                            <option value="KALIMANTAN SELATAN" @if ($item->nama_daerah == "KALIMANTAN SELATAN") selected @endif> KALIMANTAN SELATAN</option>
                                                            <option value="KALIMANTAN TIMUR" @if ($item->nama_daerah == "KALIMANTAN TIMUR") selected @endif> KALIMANTAN TIMUR</option>
                                                            <option value="KALIMANTAN UTARA" @if ($item->nama_daerah == "KALIMANTAN UTARA") selected @endif> KALIMANTAN UTARA</option>
                                                            <option value="SULAWESI UTARA" @if ($item->nama_daerah == "SULAWESI UTARA") selected @endif> SULAWESI UTARA</option>
                                                            <option value="SULAWESI TENGAH" @if ($item->nama_daerah == "SULAWESI TENGAH") selected @endif> SULAWESI TENGAH</option>
                                                            <option value="SULAWESI SELATAN" @if ($item->nama_daerah == "SULAWESI SELATAN") selected @endif> SULAWESI SELATAN</option>
                                                            <option value="SULAWESI TENGGARA" @if ($item->nama_daerah == "SULAWESI TENGGARA") selected @endif> SULAWESI TENGGARA</option>
                                                            <option value="GORONTALO" @if ($item->nama_daerah == "GORONTALO") selected @endif> GORONTALO</option>
                                                            <option value="SULAWESI BARAT" @if ($item->nama_daerah == "SULAWESI BARAT") selected @endif> SULAWESI BARAT</option>
                                                            <option value="MALUKU" @if ($item->nama_daerah == "MALUKU") selected @endif> MALUKU</option>
                                                            <option value="MALUKU UTARA" @if ($item->nama_daerah == "MALUKU UTARA") selected @endif> MALUKU UTARA</option>
                                                            <option value="PAPUA" @if ($item->nama_daerah == "PAPUA") selected @endif> PAPUA</option>
                                                            <option value="PAPUA BARAT" @if ($item->nama_daerah == "PAPUA BARAT") selected @endif> PAPUA BARAT</option> 
                                                                                                
                                                            <option value="PAPUA TENGAH" @if ($item->nama_daerah == "PAPUA TENGAH") selected @endif> PAPUA TENGAH</option>                                    
                                                            <option value="PAPUA PEGUNUNGAN" @if ($item->nama_daerah == "PAPUA PEGUNUNGAN") selected @endif> PAPUA PEGUNUNGAN</option>                                    
                                                            <option value="PAPUA SELATAN" @if ($item->nama_daerah == "PAPUA SELATAN") selected @endif> PAPUA SELATAN</option>                                    
                                                            <option value="PAPUA BARAT DAYA" @if ($item->nama_daerah == "PAPUA BARAT DAYA") selected @endif> PAPUA BARAT DAYA</option>                                    
                                                        </select>
                                                        @error('nama_daerah')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
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

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="hapus{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action="{{ url('admin/daerah/hapus', $item->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header d-flex flex-column">
                                                <div class="icons">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle-filled" width="100" height="100" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
                                                     </svg>
                                                </div>
                                                <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">HAPUS DAERAH</h1>
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

    <!-- Modal Tambah -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ url('admin/daerah/tambahAct') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header d-flex flex-column">
                        <h1 class="modal-title fs-5 text-center mb-3" id="exampleModalLabel">FORM TAMBAH DAERAH BARU</h1>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label>Nama Daerah</label>
                                <select name="nama_daerah" class="form-control @error('nama_daerah') is-invalid @enderror">
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
                                @error('nama_daerah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                                @enderror
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
     <!-- Include jQuery -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <!-- Include Bootstrap JS -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#add').modal('show');
        @endif
        </script>
@endsection


