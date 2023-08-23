<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Permainan;
use App\Models\Galeripermainan;
 
 
class Permainancontroller extends Controller
{
   
    function index(){

        $data['list'] = Permainan::get();
        return view('admin.permainan.index', $data);
    }

    function tambah(){

        return view('admin.permainan.tambah');
    }
    
    function tambahAct(Request $r){

        $r->validate([
            'nama' => 'required|unique:permainan',
            'asal_daerah' => 'required',
            'deskripsi' => 'required|unique:permainan',
            'vidio' => 'required|unique:permainan',
            'gambar' => 'required',
        ]);
       
        $permainan = new Permainan;
        $permainan->nama = $r->nama;
        $permainan->asal_daerah = $r->asal_daerah;
        $permainan->handleUploadVidio();
        $permainan->deskripsi = $r->deskripsi;
        $simpan = $permainan->save();
        if ($simpan == 1) {
            if ($r->file('gambar')){
                $file = $r->file('gambar');

                for ($i=0; $i < count($r->file('gambar')); $i++) { 
                    $fileName = time().rand(1,99).'.'.$file[$i]->extension();  
    
                    $ext = $file[$i]->storeAs('Galeripermainan', $fileName);

                    $galeri = new Galeripermainan;
                    $galeri->id_permainan = $permainan->id;
                    $galeri->gambar = 'app/'.$ext;
                    $galeri->save();
                }
                return redirect('admin/permainan')->with('success','Data permainan berhasil ditambahkan');
            }
    
            return back()->with('danger', 'Terjadi kesalahan saat menambahkan data, coba ulangi kembali.');

        }else{
            return back()->with('danger', 'Terjadi kesalahan saat menambahkan data permainan, coba ulangi kembali.');
        }
    }

    function detail($id){
        $data['list'] = Permainan::where('id', $id)->with('galeri')->get();
        return view('admin.permainan.detail', $data);
    }

    function edit(Permainan $id){
        $data['list'] = $id;
        return view('admin.permainan.edit', $data);
    }

    function editAct(Request $r, Permainan $id){
        $permainan = $id;
        if ($r->vidio != null) {
            
            $permainan->nama = $r->nama;
            $permainan->asal_daerah = $r->asal_daerah;
            $permainan->handleUploadVidio();
            $permainan->deskripsi = $r->deskripsi;
            $permainan->update();
            return redirect('admin/permainan')->with('success', 'Data berhasil di update');
        }else{
            $permainan->nama = $r->nama;
            $permainan->asal_daerah = $r->asal_daerah;
            $permainan->handleUploadVidio();
            $permainan->deskripsi = $r->deskripsi;
            $permainan->update();
            return redirect('admin/permainan')->with('success', 'Data berhasil di update');
        }
        

        
    }

    function hapus($id){
        $p = Permainan::where('id', $id)->with('galeri')->get();
        $permainan = $p[0];
        $galeri = $permainan->galeri;
        
        for ($i=0; $i < count($galeri); $i++) { 
            $file = $galeri[$i]->gambar;
            $path = public_path($file);
            if(file_exists($path)){
                unlink($path);
            }
            $hapusGaleri = Galeripermainan::where('id_permainan', $id)->delete();
        }



        Permainan::where('id', $id)->delete();
        return back()->with('success','Data berhasil dihapus');
        
    }

    function tambahGambar(Request $r, Permainan $id){


        $file = $r->file('gambar');
        for ($i=0; $i < count($file); $i++) { 
            $fileName = time().rand(1,99).'.'.$file[$i]->extension();  
            $ext = $file[$i]->storeAs('Galeripermainan', $fileName);

            $galeri = new Galeripermainan;
            $galeri->id_permainan = $id->id;
            $galeri->gambar = 'app/'.$ext;
            $galeri->save();
        }

        return back()->with('success','Data gambar berhasil ditambahkan');
    }


    function updateGambar(Request $r, Galeripermainan $id){
        
        $file = $r->file('gambar');
        $path = public_path($id->gambar);


        if(file_exists($path)){
            unlink($path);
            $fileName = time().rand(1,99).'.'.$file->extension();  
            $ext = $file->storeAs('Galeripermainan', $fileName);
            $id->gambar = 'app/'.$ext;
            $id->update();
            return back()->with('success', 'Berhasil mengupdate image');
        }else{
            return back()->with('danger', 'Terjadi kesalahan saat mengupdate gambar, coba ulangi kembali !');
        }

    }

    function hapusGambar(Galeripermainan $id){
        $path = public_path($id->gambar);


        if(file_exists($path)){
            unlink($path);
            $id->delete();
            return back()->with('success', 'Berhasil menghapus data image');
        }else{
            return back()->with('danger', 'Terjadi kesalahan saat menghapus data gambar, coba ulangi kembali !');
        }
    }

    
}