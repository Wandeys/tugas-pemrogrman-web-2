<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Kategori::create(['name_kategori'=>'Kursi','deskripsi'=>'Berbagai jenis kursi rumah dan kantor','kode_kategori'=>'KRS001']);
       Kategori::create(['name_kategori'=>'Meja','deskripsi'=>'Produk meja untuk belajar dan makan','kode_kategori'=>'MJA001']);
       Kategori::create(['name_kategori'=>'Lemari','deskripsi'=>'Berbagai jenis lemari pakaian dan penyimpanan','kode_kategori'=>'LMR001']);
       Kategori::create(['name_kategori'=>'Rak','deskripsi'=>'Berbagai jenis rak penyimpanan','kode_kategori'=>'RAK001']);
       Kategori::create(['name_kategori'=>'Dipan','deskripsi'=>'Berbagai jenis dipan','kode_kategori'=>'DPN001']);
       Kategori::create(['name_kategori'=>'Kitchen Set','deskripsi'=>'Furnitur dapur modern dan custom','kode_kategori'=>'KST001']);
    }
}
