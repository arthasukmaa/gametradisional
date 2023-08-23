<?php
 
 namespace App\Models;
 use Illuminate\Support\Str;
 use Illuminate\Database\Eloquent\Model;
 
class Kuis extends Model
{
    
    protected $table = "kuis";

    protected $fillable = [
        'level',
        'gambar',
        'pertanyaan',
        'a',
        'b',
        'c',
        'd',
        'jawaban',
    ];

    function handleUploadFoto(){
        if(request()->hasFile('gambar')){
            $this->handleDeleteFoto();
            $foto = request()->file('gambar');
            $destination = "Kuis";
            $randomStr = Str::random(5);
            $filename = $this->id."-".time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->gambar = "app/".$url;
            $this->save;
        }
    }
    function handleDeleteFoto(){
        $foto= $this->gambar;
        if($foto){
            $path = public_path($foto);
            if(file_exists($path)){
                unlink($path);
            }
            return true;
        }
    }

    function limit(){
        return Str::limit($this->pertanyaan, 60);
    }

    
}