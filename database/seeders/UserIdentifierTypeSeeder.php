<?php

namespace Database\Seeders;

use App\Models\UserIdentifierType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserIdentifierTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_identifier_types')->delete();

        $types = [
            'email',
            'phone',
        ];

        foreach ($types as $type) {
            UserIdentifierType::create([
                'name' => $type,
            ]);
        }
    }
}
