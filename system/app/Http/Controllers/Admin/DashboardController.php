<?php
 
 namespace App\Http\Controllers\Admin;
 use App\Http\Controllers\Controller;
 use App\Models\Kuis;
 use App\Models\Permainan;
 use App\Models\Player;
 
class DashboardController extends Controller
{
   
    function index(){
        $data['permainan'] = Permainan::count();
        $data['kuis'] = Kuis::count();
        $data['player'] = Player::count();

        return view('admin.dashboard', $data);
    }
}