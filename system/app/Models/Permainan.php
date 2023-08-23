<?php
 
 namespace App\Models;
 use Illuminate\Support\Str;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
 
class Permainan extends Model
{
    
    protected $table = "permainan";


    protected $fillable = [
        'id',
        'nama',
        'asal_daerah',
        'vidio',
        'deskripsi',
    ];

    function handleUploadVidio(){
        if(request()->hasFile('vidio')){
            $this->handleDeleteVidio();
            $foto = request()->file('vidio');
            $destination = "Vidio";
            $randomStr = Str::random(5);
            $filename = $this->id."-".time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->vidio = "app/".$url;
            $this->save;
        }
    }
    function handleDeleteVidio(){
        $foto= $this->vidio;
        if($foto){
            $path = public_path($foto);
            if(file_exists($path)){
                unlink($path);
            }
            return true;
        }
    }

    function galeri(){
        return $this->hasMany(Galeripermainan::class, 'id_permainan', 'id');
    }

    function limit(){
        return Str::limit($this->deskripsi, 60);
    }

    
}