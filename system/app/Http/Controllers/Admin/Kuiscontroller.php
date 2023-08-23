<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permainan;
use App\Models\Galeripermainan;
use App\Models\Kuis;
 
 
class Kuiscontroller extends Controller
{
   
    function index(){

        $data['list'] = Kuis::get();
        return view('admin.kuis.index', $data);
    }

    function tambah(){

        return view('admin.kuis.tambah');
    }
    
    function tambahAct(Request $r){

        $r->validate([
            'level' => 'required|unique:kuis',
            'gambar' => 'required',
            'pertanyaan' => 'required',
            'a' => 'required',
            'b' => 'required',
            'c' => 'required',
            'd' => 'required',
            'jawaban' => 'required',
        ]);
       
        $kuis = new Kuis;
        $kuis->level = $r->level;
        $kuis->handleUploadFoto();
        $kuis->pertanyaan = $r->pertanyaan;
        $kuis->a = $r->a;
        $kuis->b = $r->b;
        $kuis->c = $r->c;
        $kuis->d = $r->d;
        $kuis->jawaban = $r->jawaban;
        $simpan = $kuis->save();
        if ($simpan == 1) {
            return redirect('admin/kuis')->with('success','Data kuis berhasil ditambahkan');
        }else{
            return back()->with('danger', 'Terjadi kesalahan saat menambahkan data kuis, coba ulangi kembali.');
        }
    }

    function detail(Kuis $kuis){
        $data['list'] = $kuis;
        return view('admin.kuis.detail', $data);
    }

    function edit(Kuis $kuis){
        $data['list'] = $kuis;
        return view('admin.kuis.edit', $data);
    }

    function editAct(Request $r, Kuis $kuis){


        if ($r->gambar == null) {
            $kuis->level = $r->level;
            $kuis->pertanyaan = $r->pertanyaan;
            $kuis->a = $r->a;
            $kuis->b = $r->b;
            $kuis->c = $r->c;
            $kuis->d = $r->d;
            $kuis->jawaban = $r->jawaban;
            $simpan = $kuis->update();
            if ($simpan == 1) {
                return redirect('admin/kuis')->with('success','Data kuis berhasil diupdate');
            }else{
                return back()->with('danger', 'Terjadi kesalahan saat mengupdate data kuis, coba ulangi kembali.');
            }
        }else{

            $hapusFileLama = $kuis->handleDeleteFoto();
            
            if ($hapusFileLama) {
                $kuis->level = $r->level;
                $kuis->handleUploadFoto();
                $kuis->pertanyaan = $r->pertanyaan;
                $kuis->a = $r->a;
                $kuis->b = $r->b;
                $kuis->c = $r->c;
                $kuis->d = $r->d;
                $kuis->jawaban = $r->jawaban;
                $simpan = $kuis->save();
                if ($simpan == 1) {
                    return redirect('admin/kuis')->with('success','Data kuis berhasil diupdate');
                }else{
                    return back()->with('danger', 'Terjadi kesalahan saat mengupdate data kuis, coba ulangi kembali.');
                }
            }else{
                return back()->with('danger', 'Terjadi kesalahan saat menghapus gambar lama, coba ulangi kembali.');
            }

        }
       
    }

    function hapus(Kuis $kuis){
        $hapusFileLama = $kuis->handleDeleteFoto();
        if ($hapusFileLama) {
            $kuis->delete();
            return back()->with('success', 'Data telah dihapus');
        }
        return back()->with('danger', 'Terjadi kesalahan saat menghapus data, coba ulangi kembali !');
    }

    

    
}