<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Prospect;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        $user->giveVoteCredits(100);

        Prospect::factory()->create([
            'name' => 'Seed Test Prospect'
        ]);

        Prospect::factory()->create([
            'name' => 'Seed second Prospect'
        ]);
    }
}
