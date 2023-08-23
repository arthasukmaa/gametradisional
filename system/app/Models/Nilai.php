<?php
 
 namespace App\Models;
 use Illuminate\Database\Eloquent\Model;
 
class Nilai extends Model
{
    
    protected $table = "nilai";


    protected $fillable = [
        'id_player',
        'id_kuis',
        'skor',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    
}