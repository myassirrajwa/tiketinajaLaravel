<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        \App\Models\User::factory()->create([
            'name' => 'rajwa',
            'email' => 'rajwa@gmail.com',
            'password'=>'rajwa210408',
        ]);

        Event::create([
            "title"=>"sana",
            "image"=>"image/bromo.jpg",
            "deskripsi"=>"ini gunung",
            "harga"=>1000000,
            "creator_id" => 1
        ]);

        Event::create([
            "title"=>"sinii",
            "image"=>"image/butik.jpg",
            "deskripsi"=>"ini adalah pemandangan",
            "harga"=>2000000,
            "creator_id" => 1
        ]);

        Event::create([
            "title"=>"gunung",
            "image"=>"image/Komodo.jpg",
            "deskripsi"=>"ini hewan",
            "harga"=>100000,
            "creator_id" => 1
        ]);

    }
}
