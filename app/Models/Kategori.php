<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name_kategori','deskripsi','kode_kategori'])]
class Kategori extends Model
{
     public function produks(): HasMany
    {
        return $this->hasMany(Produk::class);
    }
}
