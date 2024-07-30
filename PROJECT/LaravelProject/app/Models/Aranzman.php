<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aranzman extends Model
{
    use HasFactory;


    public $table='aranzman';

    protected $fillable = [
       'id', 'cena',	'br_mesta',	'datum','prevoz', 'user_id', 'destinacija', 'agencija_id',
    ];



    public function turisticka_agencija() {
        return $this->belongsTo(Agencija::class);
    }
    
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
