<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agencija;

class Agencija extends Model
{
    use HasFactory;

    protected $table='agencija';


    protected $fillable = [
       'id', 'naziv',	'adresa',	'telefon',	'gmail', 
    ];
    

    public function aranzmani() {
        return $this->hasMany(Aranzman::class);
    }
}
