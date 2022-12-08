<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::insert(
            [
                [ 'mkNombre'=>'Nikon' ],
                [ 'mkNombre'=>'Apple' ],
                [ 'mkNombre'=>'Audiotechnica' ],
                [ 'mkNombre'=>'Marshall' ],
                [ 'mkNombre'=>'Samsung' ],
                [ 'mkNombre'=>'Huawei' ]
            ]
        );
    }
}
