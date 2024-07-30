<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgencijaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


     protected $table='agencija';


    public function toArray($request)
    {
        return [
        'id'=>$this->resource->id,
        'naziv'=>$this->resource->naziv,
        'telefon'=>$this->resource->telefon,
        'adresa'=>$this->resource->adresa,
        'gmail'=>$this->resource->gmail
        ];
    }
}
