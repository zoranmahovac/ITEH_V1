<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Agencija;

class AranzmanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {


        $agencijaData = Agencija::find($this->resource->agencija_id); 

        return [
            'id'=>$this->resource->id,
            'cena'=>$this->resource->cena,
            'br_mesta'=>$this->resource->br_mesta,
            'datum'=>$this->resource->datum,
            'prevoz'=>$this->resource->prevoz,
            
        
          //  'agencija'=>new AgencijaResource($this->resource->agencija),  //relationship method!!
            
          'agencija'=>new AgencijaResource($agencijaData),
          'user'=>new UserResource($this->resource->user)
          ];
    }




    

   /* public function with($request)
    {
        return [
            'meta' => [
                'pagination' => [
                    'total' => $this->resource->total(),
                    'count' => $this->resource->count(),
                    'per_page' => $this->resource->perPage(),
                    'current_page' => $this->resource->currentPage(),
                    'total_pages' => $this->resource->lastPage(),
                    'links' => [
                        'prev' => $this->resource->previousPageUrl(),
                        'next' => $this->resource->nextPageUrl(),
                    ],
                ],
            ],
        ];
    }*/
























}
