@extends('tempelate.base')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-semibold mb-4">EDIT DATA PERMAINAN</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/permainan/editAct', $list->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="">Nama Permainan</label>
                                    <input type="text" name="nama" value="{{ $list->nama }}" placeholder="Nama permainan ..."
                                        class="form-control" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="">Asal Daerah</label>
                                    <select name="asal_daerah"
                                    class="form-control @error('asal_daerah') is-invalid @enderror">
                                    <option value=""> --- Pilih ---</option>
                                    <option value="ACEH" @if ($list->asal_daerah == 'ACEH') selected @endif> ACEH
                                    </option>
                                    <option value="SUMATERA UTARA" @if ($list->asal_daerah == 'SUMATERA UTARA') selected @endif>
                                        SUMATERA UTARA</option>
                                    <option value="SUMATERA BARAT" @if ($list->asal_daerah == 'SUMATERA BARAT') selected @endif>
                                        SUMATERA BARAT</option>
                                    <option value="RIAU" @if ($list->asal_daerah == 'RIAU') selected @endif> RIAU
                                    </option>
                                    <option value="JAMBI" @if ($list->asal_daerah == 'JAMBI') selected @endif> JAMBI
                                    </option>
                                    <option value="SUMATERA SELATAN" @if ($list->asal_daerah == 'SUMATERA SELATAN') selected @endif>
                                        SUMATERA SELATAN</option>
                                    <option value="BENGKULU" @if ($list->asal_daerah == 'BENGKULU') selected @endif> BENGKULU
                                    </option>
                                    <option value="LAMPUNG" @if ($list->asal_daerah == 'LAMPUNG') selected @endif> LAMPUNG
                                    </option>
                                    <option value="KEPULAUAN BANGKA BELITUNG"
                                        @if ($list->asal_daerah == 'KEPULAUAN BANGKA BELITUNG') selected @endif> KEPULAUAN BANGKA BELITUNG
                                    </option>
                                    <option value="KEPULAUAN RIAU" @if ($list->asal_daerah == 'KEPULAUAN RIAU') selected @endif>
                                        KEPULAUAN RIAU</option>
                                    <option value="DKI JAKARTA" @if ($list->asal_daerah == 'DKI JAKARTA') selected @endif> DKI
                                        JAKARTA</option>
                                    <option value="JAWA BARAT" @if ($list->asal_daerah == 'JAWA BARAT') selected @endif> JAWA
                                        BARAT</option>
                                    <option value="JAWA TENGAH" @if ($list->asal_daerah == 'JAWA TENGAH') selected @endif>
                                        JAWA TENGAH</option>
                                    <option value="DAERAH ISTIMEWA YOGYAKARTA"
                                        @if ($list->asal_daerah == 'DAERAH ISTIMEWA YOGYAKARTA') selected @endif> DAERAH ISTIMEWA YOGYAKARTA
                                    </option>
                                    <option value="JAWA TIMUR" @if ($list->asal_daerah == 'JAWA TIMUR') selected @endif> JAWA
                                        TIMUR</option>
                                    <option value="BANTEN" @if ($list->asal_daerah == 'BANTEN') selected @endif> BANTEN
                                    </option>
                                    <option value="BALI" @if ($list->asal_daerah == 'BALI') selected @endif> BALI
                                    </option>
                                    <option value="NUSA TENGGARA BARAT"
                                        @if ($list->asal_daerah == 'NUSA TENGGARA BARAT') selected @endif> NUSA TENGGARA BARAT
                                    </option>
                                    <option value="NUSA TENGGARA TIMUR"
                                        @if ($list->asal_daerah == 'NUSA TENGGARA TIMUR') selected @endif> NUSA TENGGARA TIMUR
                                    </option>
                                    <option value="KALIMANTAN BARAT"
                                        @if ($list->asal_daerah == 'KALIMANTAN BARAT') selected @endif> KALIMANTAN BARAT</option>
                                    <option value="KALIMANTAN TENGAH"
                                        @if ($list->asal_daerah == 'KALIMANTAN TENGAH') selected @endif> KALIMANTAN TENGAH</option>
                                    <option value="KALIMANTAN SELATAN"
                                        @if ($list->asal_daerah == 'KALIMANTAN SELATAN') selected @endif> KALIMANTAN SELATAN</option>
                                    <option value="KALIMANTAN TIMUR"
                                        @if ($list->asal_daerah == 'KALIMANTAN TIMUR') selected @endif> KALIMANTAN TIMUR</option>
                                    <option value="KALIMANTAN UTARA"
                                        @if ($list->asal_daerah == 'KALIMANTAN UTARA') selected @endif> KALIMANTAN UTARA</option>
                                    <option value="SULAWESI UTARA" @if ($list->asal_daerah == 'SULAWESI UTARA') selected @endif>
                                        SULAWESI UTARA</option>
                                    <option value="SULAWESI TENGAH" @if ($list->asal_daerah == 'SULAWESI TENGAH') selected @endif>
                                        SULAWESI TENGAH</option>
                                    <option value="SULAWESI SELATAN"
                                        @if ($list->asal_daerah == 'SULAWESI SELATAN') selected @endif> SULAWESI SELATAN</option>
                                    <option value="SULAWESI TENGGARA"
                                        @if ($list->asal_daerah == 'SULAWESI TENGGARA') selected @endif> SULAWESI TENGGARA</option>
                                    <option value="GORONTALO" @if ($list->asal_daerah == 'GORONTALO') selected @endif>
                                        GORONTALO</option>
                                    <option value="SULAWESI BARAT" @if ($list->asal_daerah == 'SULAWESI BARAT') selected @endif>
                                        SULAWESI BARAT</option>
                                    <option value="MALUKU" @if ($list->asal_daerah == 'MALUKU') selected @endif> MALUKU
                                    </option>
                                    <option value="MALUKU UTARA" @if ($list->asal_daerah == 'MALUKU UTARA') selected @endif>
                                        MALUKU UTARA</option>
                                    <option value="PAPUA" @if ($list->asal_daerah == 'PAPUA') selected @endif> PAPUA
                                    </option>
                                    <option value="PAPUA BARAT" @if ($list->asal_daerah == 'PAPUA BARAT') selected @endif>
                                        PAPUA BARAT</option>

                                    <option value="PAPUA TENGAH" @if ($list->asal_daerah == 'PAPUA TENGAH') selected @endif>
                                        PAPUA TENGAH</option>
                                    <option value="PAPUA PEGUNUNGAN"
                                        @if ($list->asal_daerah == 'PAPUA PEGUNUNGAN') selected @endif> PAPUA PEGUNUNGAN</option>
                                    <option value="PAPUA SELATAN" @if ($list->asal_daerah == 'PAPUA SELATAN') selected @endif>
                                        PAPUA SELATAN</option>
                                    <option value="PAPUA BARAT DAYA"
                                        @if ($list->asal_daerah == 'PAPUA BARAT DAYA') selected @endif> PAPUA BARAT DAYA</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                                    <textarea id="tiny-textarea" name="deskripsi"  class="form-control" autocomplete="off"
                                        placeholder="Deskripsi ..." required>{{ $list->deskripsi }}</textarea>
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
