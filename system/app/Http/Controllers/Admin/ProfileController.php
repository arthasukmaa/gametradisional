<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Player;
use App\Models\Admin;
 
 
class ProfileController extends Controller
{
   
    function index(){
        $data['list'] = Auth::guard()->user();
        return view('admin.profile.index', $data);
    }

    function edit(Request $req, Admin $admin){


        if($req->foto != null){
            $hapusFotoLama = $admin->handleDeleteFoto();
            if ($hapusFotoLama) {
                if($req->password != null){
                    $admin->nama = $req->nama;
                    $admin->email = $req->email;
                    $admin->password = bcrypt($req->password);
                    $admin->handleUploadFoto();
                    $update = $admin->update();
                    if ( $update == 1) {
                        return back()->with('success', 'Data berhasil diupdate !');
                    }else{
                        return back()->with('success', 'Data gagal diupdate !');
                    }
                }else{
                    $admin->nama = $req->nama;
                    $admin->email = $req->email;
                    $admin->handleUploadFoto();
                    $update = $admin->update();
                    if ( $update == 1) {
                        return back()->with('success', 'Data berhasil diupdate !');
                    }else{
                        return back()->with('success', 'Data gagal diupdate !');
                    }
                }
            }
        }else{
            if($req->password != null){
                $admin->nama = $req->nama;
                $admin->email = $req->email;
                $admin->password = bcrypt($req->password);
                $update = $admin->update();
                if ( $update == 1) {
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('success', 'Data gagal diupdate !');
                }
            }else{
                $admin->nama = $req->nama;
                $admin->email = $req->email;
                $update = $admin->update();
                if ( $update == 1) {
                    return back()->with('success', 'Data berhasil diupdate !');
                }else{
                    return back()->with('success', 'Data gagal diupdate !');
                }
            }
        }
    }

}