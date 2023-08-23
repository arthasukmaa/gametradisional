<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Player;
 
 
class Playercontroller extends Controller
{
   
    function index(){

        $data['list'] = Player::get();
        return view('admin.player.index', $data);
    }

    
    function tambahAct(Request $r){

        $r->validate([
            'nama' => 'required|unique:player',
            'avatar' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
       
        $player = new Player;
        $player->nama = $r->nama;
        $player->handleUploadFoto();
        $player->email = $r->email;
        $player->password = bcrypt($r->password);
        $simpan = $player->save();
        if ($simpan == 1) {
            return back()->with('success','Data player berhasil ditambahkan');
        }else{
            return back()->with('danger', 'Terjadi kesalahan saat menambahkan data player, coba ulangi kembali.');
        }
    }

    function editAct(Request $r, Player $player){

        if ($r->password == null) {

            if ($r->avatar == null) {
                $player->nama = $r->nama;
                $player->email = $r->email;
                $simpan = $player->update();
                if ($simpan == 1) {
                    return back()->with('success','Data player berhasil diupdate');
                }else{
                    return back()->with('danger', 'Terjadi kesalahan saat mengupdate data player, coba ulangi kembali.');
                }
            }else{
                $hapusFileLama = $player->handleDeleteFoto();

                if ($hapusFileLama) {
                    $player->nama = $r->nama;
                    $player->handleUploadFoto();
                    $player->email = $r->email;
                    $simpan = $player->update();
                    if ($simpan == 1) {
                        return back()->with('success','Data player berhasil diupdate');
                    }else{
                        return back()->with('danger', 'Terjadi kesalahan saat mengupdate data player, coba ulangi kembali.');
                    }
                }else{
                    return back()->with('danger', 'Terjadi kesalahan saat mengupdate data player, coba ulangi kembali.');
                }
            }
        }else{
            if ($r->avatar == null) {
                $player->nama = $r->nama;
                $player->email = $r->email;
                $player->password = bcrypt($r->password);
                $simpan = $player->update();
                if ($simpan == 1) {
                    return back()->with('success','Data player berhasil diupdate');
                }else{
                    return back()->with('danger', 'Terjadi kesalahan saat mengupdate data player, coba ulangi kembali.');
                }
            }else{
                $hapusFileLama = $player->handleDeleteFoto();

                if ($hapusFileLama) {
                    $player->nama = $r->nama;
                    $player->handleUploadFoto();
                    $player->email = $r->email;
                    $player->password = bcrypt($r->password);
                    $simpan = $player->update();
                    if ($simpan == 1) {
                        return back()->with('success','Data player berhasil diupdate');
                    }else{
                        return back()->with('danger', 'Terjadi kesalahan saat mengupdate data player, coba ulangi kembali.');
                    }
                }else{
                    return back()->with('danger', 'Terjadi kesalahan saat mengupdate data player, coba ulangi kembali.');
                }
            }
        }
    }

    function hapus(Player $player){
        $hapusFileLama = $player->handleDeleteFoto();

        if ($hapusFileLama) {
            $simpan = $player->delete();
            if ($simpan == 1) {
                return back()->with('success','Data player berhasil dihapus');
            }else{
                return back()->with('danger', 'Terjadi kesalahan saat menghapus data player, coba ulangi kembali.');
            }
        }else{
            return back()->with('danger', 'Terjadi kesalahan saat menghapus data player, coba ulangi kembali.');
        }
    }
}