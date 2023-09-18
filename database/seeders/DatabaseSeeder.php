<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Navitem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Navitem::factory()->createMany([[
            'label' => 'Hello',
            'link' => '#hello',
        ],[
            'label' => 'Projects',
            'link' => '#projects',
        ],[
            'label' => 'Contact',
            'link' => '#contact',
        ]]);
    }
}
