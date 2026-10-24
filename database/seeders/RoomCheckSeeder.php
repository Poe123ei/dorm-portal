<?php

namespace Database\Seeders;

use App\Models\RoomCheck;
use Illuminate\Database\Seeder;

class RoomCheckSeeder extends Seeder
{
    public function run(): void
    {
        RoomCheck::factory()->count(100)->create();
    }
}
