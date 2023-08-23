<?php
 
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Helpers\ResponseFormater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Player;
 
 
class Authcontroller extends Controller
{
    public function index(){
     
       return view('admin.login');

    }
    public function aksilogin(Request $request){

        if(Auth::guard('admin')->attempt(['email'=> $request->email, 'password' => $request->password])){

          return redirect('admin/dashboard')->with('success', 'Selamat datang Admin !');

        }
        return back()->with('danger', 'Periksa email atau pasword anda !');
        

    }

    function logout(){
      
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }



}