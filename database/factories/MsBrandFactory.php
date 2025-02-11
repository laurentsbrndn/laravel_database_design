<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MsBrand;
use App\Models\MsCompany;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MsBrand>
 */
class MsBrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand_name' => $this->faker->unique()->word,
            'company_id' => MsCompany::inRandomOrder()->first()->company_id ?? MsCompany::factory(),
        ];
    }
}
