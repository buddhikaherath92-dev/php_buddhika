<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SalesManagerComment;
use App\Models\SalesRepresentative;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SalesManagerComment>
 */
class SalesManagerCommentFactory extends Factory
{

     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SalesManagerComment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->realText(),
            'commentor_id'  => $this->faker->numberBetween(1, User::count()),
            'sales_representative_id' => $this->faker->numberBetween(1, SalesRepresentative::count())
        ];
    }
}
