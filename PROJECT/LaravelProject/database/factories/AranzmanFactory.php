<?php

namespace Database\Factories;
use \App\Models\Agencija;
use \App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aranzman>
 */
class AranzmanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        
//id	cena	br_mesta	datum	prevoz	user_id	created_at	updated_at	destinacija	agencija_id	

        return [
           
            'cena' => $this->faker->randomFloat(2, 100, 1000),
            'br_mesta' => $this->faker->randomNumber(2),
            'datum' => $this->faker->date,
            'prevoz' => $this->faker->word,
            'destinacija' => $this->faker->word,
            'user_id' => User::factory(),
            'agencija_id' => Agencija::factory(),


        ];
    }
}
