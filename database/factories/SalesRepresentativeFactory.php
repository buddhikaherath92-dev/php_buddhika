<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SalesRepresentative;
use App\Models\SalesRoute;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalesRepresentative>
 */
class SalesRepresentativeFactory extends Factory
{

     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesRepresentative::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email'=> $this->faker->safeEmail(),
            'telephone' => $this->faker->e164PhoneNumber(),
            'joined_at' => $this->faker->date(),
            'sales_route_id' => $this->faker->numberBetween(1, SalesRoute::count()),
            'sales_manager_id' => $this->faker->numberBetween(1, User::count())
        ];
    }
}
