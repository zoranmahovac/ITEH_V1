<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brosura extends Model
{
    use HasFactory;



    public $table='brosura';

    protected $fillable = [
       'season', 'start_date', 'end_date','avg_price','id',
    ];
}
