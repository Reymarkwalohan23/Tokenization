<?php

namespace Database\Factories;

use App\Models\applicationform;
use Illuminate\Database\Eloquent\Factories\Factory;

class applicationformFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = applicationform::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->word,
        'lastname' => $this->faker->word,
        'age' => $this->faker->randomDigitNotNull,
        'department' => $this->faker->word,
        'phone' => $this->faker->randomDigitNotNull,
        'email' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
