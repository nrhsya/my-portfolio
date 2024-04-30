<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Client;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'project_type' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'budget' => $this->faker->randomFloat(0, 0, 9999999999.),
            'description' => $this->faker->text(),
        ];
    }
}
