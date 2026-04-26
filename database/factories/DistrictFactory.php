<?php

namespace Database\Factories;

use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<District>
 */
class DistrictFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => 'Cidade de maputo',
            'province_id' => Province::factory()->create(),
        ];
    }
}