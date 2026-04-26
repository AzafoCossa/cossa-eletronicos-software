<?php

namespace Database\Factories;

use App\Models\Block;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Block>
 */
class BlockFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => 'Bairro Central',
            'district_id' => District::factory()->create(),
        ];
    }
}