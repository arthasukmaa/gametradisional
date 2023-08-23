<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Daerah;
 
 
class DaerahController extends Controller
{
   
    function index(){

        $data['list'] = Daerah::get();
        return view('admin.daerah.index', $data);
    }

    function tambahAct(Request $request){

        $request->validate([
            'nama_daerah' => ['required', 'unique:daerah'],
        ]);
        $daerah = new Daerah;
        $daerah->nama_daerah = $request->nama_daerah;
        $simpan = $daerah->save();
        if ($simpan == 1) {
            return back()->with('success', 'Data daerah berhasil ditambahkan.');
        }
        return back()->with('danger', 'Terjadi kesalahan saat menambahkan data, coba ulangi kembali !');
    }

    function editAct(Daerah $daerah, Request $request){
        $daerah->nama_daerah = $request->nama_daerah;
        $simpan = $daerah->update();
        if ($simpan == 1) {
            return back()->with('success', 'Data daerah berhasil diupdate.');
        }
        return back()->with('danger', 'Terjadi kesalahan saat mengupdate data, coba ulangi kembali !');
    }
    function hapus(Daerah $daerah){
        $simpan = $daerah->delete();
        if ($simpan == 1) {
            return back()->with('success', 'Data daerah berhasil dihapus.');
        }
        return back()->with('danger', 'Terjadi kesalahan saat menghapus data, coba ulangi kembali !');
    }


    
    
    

    
}