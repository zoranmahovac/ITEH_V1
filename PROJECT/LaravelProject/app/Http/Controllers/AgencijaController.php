<?php

namespace App\Http\Controllers;

use App\Models\Agencija;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\AgencijaResource;
class AgencijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//paginacija u indexu
    {
        $agencije=Agencija::all();
        return AgencijaResource::collection($agencije);

       /* $agencije = Agencija::paginate(1);
        return AgencijaResource::collection($agencije);*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validirano = $request->validate([
            'naziv' => 'required|string|max:255',
            'gmail' => 'required|email',
            'adresa' => 'required|string|max:255',
            'telefon'=> 'required|string|max:12',
        ]);
        

        

          $agencija = Agencija::create($validirano);

        
         


        
          return response()->json(['message' => 'Uspesno sacuvana agencija!', 'data' => $agencija], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agencija  $agencija
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $a=Agencija::find($id);





        if(is_null($a))
            return response()->json('Agencija nije pronadjena. ', 404);
        return new AgencijaResource($a);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agencija  $agencija
     * @return \Illuminate\Http\Response
     */
    public function edit(Agencija $agencija)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agencija  $agencija
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agencija $agencija, $id): JsonResponse
    {
             // Validacija
             $request->validate([
                'naziv' => 'required|string|max:255',
                'gmail' => 'required|email',
                'adresa' => 'required|string|max:255',
                
              
            ]);
    
            try {
                
                $agencija = Agencija::findOrFail($id);
    
                
                $agencija->update($request->all());
    
              
                return response()->json(['message' => 'Agencija izmenjena.', 'data' => $agencija], 200);
            } catch (\Exception $e) {
                  //npr. ako ne postoji resurs sa datim ID-jem
                return response()->json(['message' => 'Neuspesna izmena agencije.', 'error' => $e->getMessage()], 500);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agencija  $agencija
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        
    try {
        $agencija = Agencija::findOrFail($id);
        $agencija->delete();
        return response()->json(['message' => 'Agencija uspešno obrisana.'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Greška prilikom brisanja agencije.', 'error' => $e->getMessage()], 500);
    }
    }
}
