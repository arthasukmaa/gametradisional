<?php
 
 namespace App\Models;
 use Illuminate\Support\Str;
 use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;
 
class Galeripermainan extends Model
{
    protected $table = "galeri_permainan";

    protected $fillable = [
        'id',
        'id_permainan',
        'gambar',
    ];

 
}