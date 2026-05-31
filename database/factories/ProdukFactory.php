<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name' => fake()->name(),
           'kategori_id'=> Kategori:: inRandomOrder()->first()->id,
           'harga'=> fake()->numberBetween(100000,3000000),
           'stok'=> fake()->numberBetween(1,200),
           'bahan'=> fake()->randomElement([
            'Kayu Jati',
            'Kayu Maoni',
            'Kayu Pinus',
            'Rotan',
            'Aluminium',
            'Kaca',
            'Multiplek',
            'MDF',
            'Besi',
           ]),
        ];
    }
}
