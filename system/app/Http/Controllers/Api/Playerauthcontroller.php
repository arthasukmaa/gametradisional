<?php
 
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Player;
 
 
class Playerauthcontroller extends Controller
{
    public function login(Request $request){
       
        if(Auth::guard('player')->attempt(['email'=> $request->email, 'password' => $request->password])){

            $data = Auth::guard('player')->user();
            return ResponseFormater::createApi(200, 'Success', $data);

        }
        return ResponseFormater::createApi(404, 'Error', 'Login gagal, coba ulangi kembali atau periksa email dan password anda !');

    }

    function registrasi(Request $request){

        $dataValidasi = [
            'nama' => 'required|unique:player',
            'avatar' => 'required',
            'email' => 'required',
            'password' => 'required',
        ];
        $validasi = Validator::make($request->all(),$dataValidasi);

        if($validasi->fails()){
            return ResponseFormater::createApi(404, 'Error', $validasi->messages());
        }else{
            $player = new Player;
            $player->nama = $request->nama;
            $player->handleUploadFoto();
            $player->email = $request->email;
            $player->password = bcrypt($request->password);
            $simpan = $player->save();
            if ($simpan == 1) {
                return ResponseFormater::createApi(200, 'Success', 'Sukses membuat akun, Silahkan login !');
            }else{
                return ResponseFormater::createApi(404, 'Error', 'Terjadi kesalahan, coba ulangi kembali');
            }
        }
    }

    function cekLogin($player){
        $data = Player::find($player);
        if ($data) {
            return ResponseFormater::createApi(200, 'Success', $data);
        }
        return ResponseFormater::createApi(404, 'Error', null);
    }

}