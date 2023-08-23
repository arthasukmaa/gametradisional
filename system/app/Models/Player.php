<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class Player extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "player";

    protected $fillable = [
        'nama',
        'avatar',
        'email',
        'password',
    ];


    function handleUploadFoto(){
        if(request()->hasFile('avatar')){
            $this->handleDeleteFoto();
            $foto = request()->file('avatar');
            $destination = "Player";
            $randomStr = Str::random(5);
            $filename = $this->id."-".time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->avatar = "app/".$url;
            $this->save;
        }
    }
    function handleDeleteFoto(){
        $foto= $this->avatar;
        if($foto){
            $path = public_path($foto);
            if(file_exists($path)){
                unlink($path);
            }
            return true;
        }
    }
    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    function limit(){
        return Str::limit($this->password, 30);
    }
}
