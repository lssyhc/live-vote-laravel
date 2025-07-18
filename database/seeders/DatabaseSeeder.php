<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Poll;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Poll::factory()->count(10)->has(Option::factory()->count(4))->create();
    }
}
