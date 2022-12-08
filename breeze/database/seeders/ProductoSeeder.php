<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::insert(
            [
                [
                    'prdNombre'=>'Nikon Z6',
                    'prdPrecio'=>1650,
                    'idMarca'=>1,
                    'idCategoria'=>2,
                    'prdDescripcion'=>'Cuerpo de cámara sin espejo formato full frame. Resolución 24.5 MPX. Bluetooth, Wi-Fi, GPS. ISO 100-51200',
                    'prdImagen'=>'nikon-z6.jpg',
                    'prdActivo'=>1
                ],
                [
                    'prdNombre'=>'iPhone 12 Pro (256GB) gold',
                    'prdPrecio'=>1200,
                    'idMarca'=>2,
                    'idCategoria'=>1,
                    'prdDescripcion'=>'Apple iPhone 12 Pro de 256GB color dorado, libre de carrier.',
                    'prdImagen'=>'iphone-12-pro-gold.png',
                    'prdActivo'=>1
                ],
                [
                    'prdNombre'=>'Marshall Acton II',
                    'prdPrecio'=>300,
                    'idMarca'=>4,
                    'idCategoria'=>4,
                    'prdDescripcion'=>'Altavoz inalámbrico Marshall Acton II. Wi-Fi y Bluetooth multihabitación color negro.',
                    'prdImagen'=>'marshall-acton.jpg',
                    'prdActivo'=>1
                ],
                [
                    'prdNombre'=>'Homepod Mini',
                    'prdPrecio'=>99,
                    'idMarca'=>2,
                    'idCategoria'=>4,
                    'prdDescripcion'=>'Altavoz inteligente inalámbrico. Compatible con Siri. Wifi, Bluetooth. Compatible con multihabitación.',
                    'prdImagen'=>'homepod-mini.jpg',
                    'prdActivo'=>1
                ],
                [
                    'prdNombre'=>'Samsung Class QLED Q80T Series',
                    'prdPrecio'=>1200,
                    'idMarca'=>5,
                    'idCategoria'=>5,
                    'prdDescripcion'=>'Smart TV Samsung Class QLED Q80T Series, 65", 4K, UHD',
                    'prdImagen'=>'Q80T.jpg',
                    'prdActivo'=>1
                ],
                [
                    'prdNombre'=>'P40 Pro Plus 512GB',
                    'prdPrecio'=>1250,
                    'idMarca'=>6,
                    'idCategoria'=>1,
                    'prdDescripcion'=>'Smartphone Huawei P40 Pro Plus 5G 512GB',
                    'prdImagen'=>'P40-pro-plus.jpg',
                    'prdActivo'=>1
                ]
            ]
        );
    }
}
