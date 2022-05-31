<?php

namespace Database\Seeders;

use App\Models\Libraries;
use App\Models\Library;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Library::create([
            'library_name' => 'Perpustakaan Kota',
            'library_desc' => 'Ut proident nostrud cupidatat nisi aliquip cupidatat labore consectetur incididunt minim.',
            'location' =>  'Jl. Surabaya'
        ]);

        Library::create([
            'library_name' => 'Perpustakaan Unesa',
            'library_desc' => 'Ut proident nostrud cupidatat nisi aliquip cupidatat labore consectetur incididunt minim.',
            'location' =>  'Jl. Lidah Wetan, Unesa Kampus Utama'
        ]);
    }
}
