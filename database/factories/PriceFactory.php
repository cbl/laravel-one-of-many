<?php

namespace Database\Factories;

use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PriceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Price::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => rand(min: 100, max: 10000),
            'publish_at' => $this->faker->dateTimeBetween(
                startDate: '-30 days',
                endDate: '+30 days'
            )
        ];
    }
}
