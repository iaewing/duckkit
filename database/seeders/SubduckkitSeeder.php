<?php

namespace Database\Seeders;

use App\Models\Subduckkit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubduckkitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subduckkit::factory(200)->create();
    }
}
