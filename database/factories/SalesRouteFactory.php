<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SalesRoute;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalesRoute>
 */
class SalesRouteFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesRoute::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'route' => $this->faker->city(),
        ];
    }
}
