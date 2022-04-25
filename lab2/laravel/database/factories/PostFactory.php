<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class PostFactory extends Factory
{
    
    public function definition()
    {
        return [
            'title' => $this->faker->text(15),
            'user_id' => User::factory(User::class),
            'desc' => $this->faker->text(200)
           
        ];
    }
}
