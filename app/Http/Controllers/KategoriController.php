<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $kategoris = Kategori::latest();
    $keyword = request('keyword');
if($kategoris){
 $kategoris ->where('name_kategori','like','%'. $keyword . '%');
}

        return view('kategori.index', [
            'title' => 'Kategori',
            'kategoris'=> $kategoris->paginate(5)->withQueryString(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
               return view('kategori.create', ['title' => 'Create Kategori']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
   {
        $validated = $request->validate([
        'name_kategori' => ['required','max:255'],
        'deskripsi' => ['required','max:255'],
        'kode_kategori' => ['required','unique:kategoris'],
    ],[
        'name_kategori.required'=> 'Nama Kategori tidak boleh kosong',
        'name_kategori.max'=> 'Nama Kategori tidak boleh lebih dari :max karakter',
        'deskripsi.required'=> 'Deskripsi tidak boleh kosong',
        'kode_kategori.required'=> 'Kode Kategori tidak boleh kosong',
        'kode_kategori.unique'=> 'Kode Kategori sudah digunakan',
    ]);
 
  Kategori::create( $validated );
  return to_route('kategori.index')->withSuccess('Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
       return view('kategori.show', [
            'title' => 'Detail Kategori',
    'kategori'=> $kategori,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
      return view('kategori.edit', [
            'title' => 'Edit Kategori',
            'kategori'=> $kategori,
            ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
     {
 
        $validated = $request->validate([
        'name_kategori' => ['required','max:255'],
        'deskripsi' => ['required','max:255'],
        'kode_kategori' => ['required','unique:kategoris'],
    ],[
        'name_kategori.required'=> 'Nama Kategori tidak boleh kosong',
        'name_kategori.max'=> 'Nama Kategori tidak boleh lebih dari :max karakter',
        'deskripsi.required'=> 'Deskripsi tidak boleh kosong',
        'kode_kategori.required'=> 'Kode Kategori tidak boleh kosong',
        'kode_kategori.unique'=> 'Kode Kategori sudah digunakan',
    ]);
 
    $kategori->update( $validated );
    return to_route('kategori.index')->withSuccess('Data kategori berhasil diubah');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
       $kategori->delete( $kategori);
  return to_route('kategori.index')->withSuccess('Data kategori berhasil dihapus');
    }
}
