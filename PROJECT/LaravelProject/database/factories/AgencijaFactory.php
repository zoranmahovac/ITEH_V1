<?php

namespace Database\Factories;
use \App\Models\Agencija;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agencija>
 */
class AgencijaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model=\App\Models\Agencija::class;



    public function definition()
    {
        return [
            'naziv'=>$this->faker->company,
            'adresa'=>$this->faker->address,
            'telefon'=>$this->faker->phoneNumber,
            'gmail'=>$this->faker->email,

  
        ];
    }
}
