<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Experience;

class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'job_title' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'company_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'location' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'description' => $this->faker->text(),
        ];
    }
}
