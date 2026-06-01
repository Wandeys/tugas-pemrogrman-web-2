<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::latest();
        $keyword = request('keyword');
        if ($produks) {
            $produks->where('name', 'like', '%'.$keyword.'%');
        }

        return view('produk.index', [
            'title' => 'Produk',
            'produks' => $produks->paginate(15)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create', [
            'title' => 'Create Produk',
            'kategoris' => Kategori::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
      {
        $validated = $request->validate([
        'name' => ['required','max:255'],
        'kategori_id' => ['required','exists:kategoris,id'],
        'harga' => ['required','numeric','min:0'],
        'stok' => ['required','integer','min:0'],
        'bahan' => ['required','max:255'],
    ],[
        'name.required'=> 'Nama tidak boleh kosong',
        'name.max'=> 'Nama tidak boleh lebih dari :max karakter',
        'kategori_id.required'=> 'Jenis produk tidak boleh kosong',
        'kategori_id.exists'=> 'Jenis produk tidak valid',
        'harga.required'=> 'Harga tidak boleh kosong',
        'harga.numeric'=> 'Harga harus berupa angka',
        'harga.min'=> 'Harga tidak boleh kurang dari :min',
        'stok.required'=> 'Stok tidak boleh kosong',
        'stok.integer'=> 'Stok harus berupa angka',
        'stok.min'=> 'Stok tidak boleh kurang dari :min',
        'bahan.required'=> 'Bahan tidak boleh kosong',
        'bahan.max'=> 'Bahan tidak boleh lebih dari :max karakter',
    ]);
 
  Produk::create( $validated );
  return to_route('produk.index')->withSuccess('Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', [
            'title' => 'Edit Produk',
            'kategoris' => Kategori::latest()->get(),
            'produk'=> $produk,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
           {
        $validated = $request->validate([
        'name' => ['required','max:255'],
        'kategori_id' => ['required','exists:kategoris,id'],
        'harga' => ['required','numeric','min:0'],
        'stok' => ['required','integer','min:0'],
        'bahan' => ['required','max:255'],
    ],[
        'name.required'=> 'Nama tidak boleh kosong',
        'name.max'=> 'Nama tidak boleh lebih dari :max karakter',
        'kategori_id.required'=> 'Jenis produk tidak boleh kosong',
        'kategori_id.exists'=> 'Jenis produk tidak valid',
        'harga.required'=> 'Harga tidak boleh kosong',
        'harga.numeric'=> 'Harga harus berupa angka',
        'harga.min'=> 'Harga tidak boleh kurang dari :min',
        'stok.required'=> 'Stok tidak boleh kosong',
        'stok.integer'=> 'Stok harus berupa angka',
        'stok.min'=> 'Stok tidak boleh kurang dari :min',
        'bahan.required'=> 'Bahan tidak boleh kosong',
        'bahan.max'=> 'Bahan tidak boleh lebih dari :max karakter',
    ]);
 
  $produk->update( $validated );
  return to_route('produk.index')->withSuccess('Produk berhasil diubah');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
      $produk->delete( $produk );
  return to_route('produk.index')->withSuccess('Data produk berhasil dihapus');
    }
}
