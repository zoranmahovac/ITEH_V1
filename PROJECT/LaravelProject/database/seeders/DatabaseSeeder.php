<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Agencija;
use \App\Models\Aranzman;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Aranzman::truncate();
        Agencija::truncate();


        $ag1 = Agencija::factory()->create();
        $ag2 = Agencija::factory()->create();

   


        $user = User::factory()->create();
       
        $a1 = Aranzman::factory(2)->create([
           'user_id'=> $user->id,
           'agencija_id'=> $ag1->id,

       ] );  




       $a2 = Aranzman::factory(2)->create([
        'user_id'=> $user->id,
        'agencija_id'=>$ag2->id,

    ] );  







    }
}
