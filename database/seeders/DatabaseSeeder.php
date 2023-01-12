<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         \App\Models\Profile::create([
            'club_name' => 'Gas Motor Club',
            'club_name_abbreviation' => 'GMC',
            'email' => 'gmc@gmail.com',
            'phone' => '08756496xxx',
            'club_logo' => 'logo.jpg',
            'address' => 'alamat',
            'description' => 'deskripsi'
        ]);

         \App\Models\Visidanmisi::create([
            'title' => 'Visi dan Misi',
            'content' => 'Ini adalah isi dari VIsi dan Misi'
        ]);

        \App\Models\User::create([
            'name' => 'Panjul',
            'username' => 'panjul',
            'email' => 'panjul@example.com',
            'password' => '$2y$10$Slknqz..I3.nHDRpcWbpr.byVymwHfFznsM6DWQvA/qNrTBlI3x7K',
            'level' => 'author'
        ]);
        
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$Slknqz..I3.nHDRpcWbpr.byVymwHfFznsM6DWQvA/qNrTBlI3x7K',
            'level' => 'admin'
        ]);
    }
}
