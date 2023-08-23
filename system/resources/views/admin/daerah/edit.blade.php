@extends('tempelate.base')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-semibold mb-4">EDIT DATA PERMAINAN</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/permainan/editAct', $list->id) }}" method="POST" enctype="multipart/form-data"
                        novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="">Nama Permainan</label>
                                    <input type="text" name="nama" value="{{ $list->nama }}"
                                        placeholder="Nama permainan ..." class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="">Asal Daerah</label>
                                    <select name="nama_daerah"
                                        class="form-control @error('nama_daerah') is-invalid @enderror">
                                        <option value=""> --- Pilih ---</option>
                                        <option value="ACEH" @if ($item->nama_daerah == 'ACEH') selected @endif> ACEH
                                        </option>
                                        <option value="SUMATERA UTARA" @if ($item->nama_daerah == 'SUMATERA UTARA') selected @endif>
                                            SUMATERA UTARA</option>
                                        <option value="SUMATERA BARAT" @if ($item->nama_daerah == 'SUMATERA BARAT') selected @endif>
                                            SUMATERA BARAT</option>
                                        <option value="RIAU" @if ($item->nama_daerah == 'RIAU') selected @endif> RIAU
                                        </option>
                                        <option value="JAMBI" @if ($item->nama_daerah == 'JAMBI') selected @endif> JAMBI
                                        </option>
                                        <option value="SUMATERA SELATAN" @if ($item->nama_daerah == 'SUMATERA SELATAN') selected @endif>
                                            SUMATERA SELATAN</option>
                                        <option value="BENGKULU" @if ($item->nama_daerah == 'BENGKULU') selected @endif> BENGKULU
                                        </option>
                                        <option value="LAMPUNG" @if ($item->nama_daerah == 'LAMPUNG') selected @endif> LAMPUNG
                                        </option>
                                        <option value="KEPULAUAN BANGKA BELITUNG"
                                            @if ($item->nama_daerah == 'KEPULAUAN BANGKA BELITUNG') selected @endif> KEPULAUAN BANGKA BELITUNG
                                        </option>
                                        <option value="KEPULAUAN RIAU" @if ($item->nama_daerah == 'KEPULAUAN RIAU') selected @endif>
                                            KEPULAUAN RIAU</option>
                                        <option value="DKI JAKARTA" @if ($item->nama_daerah == 'DKI JAKARTA') selected @endif> DKI
                                            JAKARTA</option>
                                        <option value="JAWA BARAT" @if ($item->nama_daerah == 'JAWA BARAT') selected @endif> JAWA
                                            BARAT</option>
                                        <option value="JAWA TENGAH" @if ($item->nama_daerah == 'JAWA TENGAH') selected @endif>
                                            JAWA TENGAH</option>
                                        <option value="DAERAH ISTIMEWA YOGYAKARTA"
                                            @if ($item->nama_daerah == 'DAERAH ISTIMEWA YOGYAKARTA') selected @endif> DAERAH ISTIMEWA YOGYAKARTA
                                        </option>
                                        <option value="JAWA TIMUR" @if ($item->nama_daerah == 'JAWA TIMUR') selected @endif> JAWA
                                            TIMUR</option>
                                        <option value="BANTEN" @if ($item->nama_daerah == 'BANTEN') selected @endif> BANTEN
                                        </option>
                                        <option value="BALI" @if ($item->nama_daerah == 'BALI') selected @endif> BALI
                                        </option>
                                        <option value="NUSA TENGGARA BARAT"
                                            @if ($item->nama_daerah == 'NUSA TENGGARA BARAT') selected @endif> NUSA TENGGARA BARAT
                                        </option>
                                        <option value="NUSA TENGGARA TIMUR"
                                            @if ($item->nama_daerah == 'NUSA TENGGARA TIMUR') selected @endif> NUSA TENGGARA TIMUR
                                        </option>
                                        <option value="KALIMANTAN BARAT"
                                            @if ($item->nama_daerah == 'KALIMANTAN BARAT') selected @endif> KALIMANTAN BARAT</option>
                                        <option value="KALIMANTAN TENGAH"
                                            @if ($item->nama_daerah == 'KALIMANTAN TENGAH') selected @endif> KALIMANTAN TENGAH</option>
                                        <option value="KALIMANTAN SELATAN"
                                            @if ($item->nama_daerah == 'KALIMANTAN SELATAN') selected @endif> KALIMANTAN SELATAN</option>
                                        <option value="KALIMANTAN TIMUR"
                                            @if ($item->nama_daerah == 'KALIMANTAN TIMUR') selected @endif> KALIMANTAN TIMUR</option>
                                        <option value="KALIMANTAN UTARA"
                                            @if ($item->nama_daerah == 'KALIMANTAN UTARA') selected @endif> KALIMANTAN UTARA</option>
                                        <option value="SULAWESI UTARA" @if ($item->nama_daerah == 'SULAWESI UTARA') selected @endif>
                                            SULAWESI UTARA</option>
                                        <option value="SULAWESI TENGAH" @if ($item->nama_daerah == 'SULAWESI TENGAH') selected @endif>
                                            SULAWESI TENGAH</option>
                                        <option value="SULAWESI SELATAN"
                                            @if ($item->nama_daerah == 'SULAWESI SELATAN') selected @endif> SULAWESI SELATAN</option>
                                        <option value="SULAWESI TENGGARA"
                                            @if ($item->nama_daerah == 'SULAWESI TENGGARA') selected @endif> SULAWESI TENGGARA</option>
                                        <option value="GORONTALO" @if ($item->nama_daerah == 'GORONTALO') selected @endif>
                                            GORONTALO</option>
                                        <option value="SULAWESI BARAT" @if ($item->nama_daerah == 'SULAWESI BARAT') selected @endif>
                                            SULAWESI BARAT</option>
                                        <option value="MALUKU" @if ($item->nama_daerah == 'MALUKU') selected @endif> MALUKU
                                        </option>
                                        <option value="MALUKU UTARA" @if ($item->nama_daerah == 'MALUKU UTARA') selected @endif>
                                            MALUKU UTARA</option>
                                        <option value="PAPUA" @if ($item->nama_daerah == 'PAPUA') selected @endif> PAPUA
                                        </option>
                                        <option value="PAPUA BARAT" @if ($item->nama_daerah == 'PAPUA BARAT') selected @endif>
                                            PAPUA BARAT</option>

                                        <option value="PAPUA TENGAH" @if ($item->nama_daerah == 'PAPUA TENGAH') selected @endif>
                                            PAPUA TENGAH</option>
                                        <option value="PAPUA PEGUNUNGAN"
                                            @if ($item->nama_daerah == 'PAPUA PEGUNUNGAN') selected @endif> PAPUA PEGUNUNGAN</option>
                                        <option value="PAPUA SELATAN" @if ($item->nama_daerah == 'PAPUA SELATAN') selected @endif>
                                            PAPUA SELATAN</option>
                                        <option value="PAPUA BARAT DAYA"
                                            @if ($item->nama_daerah == 'PAPUA BARAT DAYA') selected @endif> PAPUA BARAT DAYA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="">Vidio</label>
                                    <input type="file" name="vidio" placeholder="Vidio ..."
                                        class="form-control @error('vidio') is-invalid @enderror" autocomplete="off"
                                        multiple>
                                    @error('vidio')
                                        <label class="text-danger text-right">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="">Deskripsi permainan</label>
                                    <textarea id="tiny-textarea" name="deskripsi" class="form-control" autocomplete="off" placeholder="Deskripsi ..."
                                        required>{{ $list->deskripsi }}</textarea>
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
@endsection
