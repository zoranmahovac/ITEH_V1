<?php

namespace App\Http\Controllers;

use App\Models\Aranzman;
use App\Models\User;
use App\Models\Agencija;
use Illuminate\Http\Request;

use App\Http\Resources\UserResource;
use App\Http\Resources\AranzmanResource;

use App\Http\Resources\AgencijaResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AranzmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
 //       $user = Auth::user();
  //  $aranzmani = $user->aranzmani(); //->paginate(10);

  //  return AranzmanResource::collection($aranzmani);




        $user = Auth::user();



        $aranzmani = $user->aranzmani;
        return AranzmanResource::collection($aranzmani);
      
     
    }




    public function indexAll()//vracanje svih aranzmana
    {
        $aranzmani=Aranzman::all();
        return AranzmanResource::collection($aranzmani);

        //$aranzmani = Aranzman::paginate(3);
        //return view('aranzmani.paginated',compact('aranzmani'));

    }

    public function get_paginated()
    {
        $aranzmani = Aranzman::paginate(3);
        return view('aranzmani.paginated',compact('aranzmani'));
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
    { // Check if the user is authenticated
        if (!Auth::check()) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
    
        $validator = Validator::make($request->all(), [
            'prevoz' => 'required|string|max:100',
            'destinacija' => 'required|string|max:100',
            'cena' => 'required',
            'br_mesta' => 'required',
            'agencija_id' => 'required',
            'datum' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        // Retrieve the authenticated user
        $user = Auth::user();
    
        // Check if the user ID is available
        if (!$user || !$user->id) {
            return response()->json(['error' => 'User ID not available'], 400);
        }
    
        try {
            $aranzman = Aranzman::create([
                'prevoz' => $request->prevoz,
                'destinacija' => $request->destinacija,
                'cena' => $request->cena,
                'br_mesta' => $request->br_mesta,
                'datum' => $request->datum,
                'agencija_id' => $request->agencija_id,
                'user_id' => $user->id,
            ]);
    
            return response()->json(['Aranzman uspesno kreiran.', new AranzmanResource($aranzman)]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aranzman  $aranzman
     * @return \Illuminate\Http\Response
     */
    public function show(Aranzman $aranzman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aranzman  $aranzman
     * @return \Illuminate\Http\Response
     */
    public function edit(Aranzman $aranzman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aranzman  $aranzman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aranzman $aranzman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aranzman  $aranzman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aranzman $aranzman)
    {


    }
}
