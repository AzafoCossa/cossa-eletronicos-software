<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserIdentifier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        $user = new User();
        $user->full_name = "Azafo Alexandre Cossa";
        $user->password = Hash::make("Eletr0nic0s@dmin");
        $user->save();

        $user->assignRole('Admin');

        $userIdentifier = new UserIdentifier(['value' => "azafocossa@outlook.com", 'user_identifier_type_id' => 1]);

        $user->identifiers()->save($userIdentifier);
    }
}
