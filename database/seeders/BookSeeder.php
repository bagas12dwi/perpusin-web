<?php

namespace Database\Seeders;

use App\Models\Books;
use App\Models\Libraries;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Books::create([
            "library_id" => 2,
            "title" => 'Laut Bercerita',
            'description' => 'Eiusmod commodo duis id ea dolor elit. Laborum eiusmod aute quis amet fugiat fugiat magna officia elit cupidatat. Et cupidatat culpa est laborum amet aliquip sint cillum qui.',
            'imgLocation' => 'book1.png',
            'author' => 'Leila S. Chudori',
            'publisher' => 'Gramedia',
            'isOnline' => false,
            'stock' => 2,
            'amercement_price' => 3000
        ]);
        Books::create([
            "library_id" => 1,
            "title" => 'Gadis Kretek',
            'description' => 'Eiusmod commodo duis id ea dolor elit. Laborum eiusmod aute quis amet fugiat fugiat magna officia elit cupidatat. Et cupidatat culpa est laborum amet aliquip sint cillum qui.',
            'imgLocation' => 'book2.png',
            'author' => 'Ratih Kumala',
            'publisher' => 'Gramedia',
            'isOnline' => false,
            'stock' => 2,
            'amercement_price' => 3000
        ]);
        Books::create([
            "library_id" => 1,
            "title" => 'Amba',
            'description' => 'Eiusmod commodo duis id ea dolor elit. Laborum eiusmod aute quis amet fugiat fugiat magna officia elit cupidatat. Et cupidatat culpa est laborum amet aliquip sint cillum qui.',
            'imgLocation' => 'book1.png',
            'author' => 'Laksmi Pamuntjak',
            'publisher' => 'Gramedia',
            'isOnline' => false,
            'stock' => 3,
            'amercement_price' => 3000
        ]);
        Books::create([
            "library_id" => 1,
            "title" => 'Orang Orang Proyek',
            'description' => 'Eiusmod commodo duis id ea dolor elit. Laborum eiusmod aute quis amet fugiat fugiat magna officia elit cupidatat. Et cupidatat culpa est laborum amet aliquip sint cillum qui.',
            'imgLocation' => 'book1.png',
            'author' => 'Ahmad Tohari',
            'publisher' => 'Gramedia',
            'isOnline' => false,
            'stock' => 3,
            'amercement_price' => 4000
        ]);
    }
}
