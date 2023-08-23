<?php
 
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Permainan;
use App\Models\Galeripermainan;
use App\Models\Kuis;
use App\Models\Player;
use App\Models\Nilai;
 
 
class Playerhomecontroller extends Controller
{
    public function index(){ 
        $data = Permainan::with('galeri')->groupBy('asal_daerah')->get();
        return ResponseFormater::createApi(200, 'Success', $data);
    }

    public function daerahPermainan($daerah){
        $data = Permainan::with('galeri')->where('asal_daerah', $daerah)->get();
        return ResponseFormater::createApi(200, 'Success', $data);
    }

    public function hitungNilai($player){
        $data = DB::table('nilai')
        ->where('id_player', $player)
        ->sum('skor');
        return ResponseFormater::createApi(200, 'Success', $data);
    }

    public function kuis($player){
       
        $data['kuis'] = Kuis::get();
        $data['nilai'] = Nilai::where('id_player', $player)->get();
        $data['jumlahJawaban'] = Nilai::where('id_player', $player)->count();
        $data['jumlahKuis'] = Kuis::count();
        $data['jumlahSkor'] = Nilai::where('id_player', $player)->sum('skor');

        return ResponseFormater::createApi(200, 'Success', $data);

    }

    public function updateFoto(Player $player){
        $hapusFileLama = $player->handleDeleteFoto();
        if ($hapusFileLama) {
            $player->handleUploadFoto();
            $simpan = $player->update();
            if ($simpan == 1) {
                return ResponseFormater::createApi(200, 'Success', null);
            }else{
                return ResponseFormater::createApi(404, 'Error', null);
            }
        }
       
        
    }
    public function updatedataProfile(Request $request, Player $player){

        if ($request->password != null) {
            $player->nama = $request->nama;
            $player->email = $request->email;
            $player->password = bcrypt($request->password);
            $update = $player->update();
            if ($update == 1) {
                return ResponseFormater::createApi(200, 'Success', null);
            }else{
                return ResponseFormater::createApi(200, 'Terjadi kesalahan, coba ulangi kembali!', null);
            }
        }else{
            $player->nama = $request->nama;
            $player->email = $request->email;
            $update = $player->update();
            if ($update == 1) {
                return ResponseFormater::createApi(200, 'Success', null);
            }else{
                return ResponseFormater::createApi(200, 'Terjadi kesalahan, coba ulangi kembali!', null);
            }
        }

    }

    public function jawabanKuis(Request $request){

        $nilai = new Nilai;
        $nilai->id_player = $request->id_player;
        $nilai->id_kuis = $request->id_kuis;
        $nilai->skor = $request->skor;

        $simpan = $nilai->save();

        if ($simpan == 1) {
            return ResponseFormater::createApi(200, 'Success', $simpan);
        }else{
            return ResponseFormater::createApi(404, 'Error', null);
        }

    }

    public function resetJawaban($player){
        $hapus = Nilai::where('id_player', $player)->delete();
        return ResponseFormater::createApi(200, 'Success', null);
    }


}