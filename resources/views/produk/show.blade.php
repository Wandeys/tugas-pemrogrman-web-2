<x-app>


    <x-slot:title>
        {{ $title }}
    </x-slot>


    <a class="btn btn-warning mb-3" href="{{ route('produk.index') }}" role="button">Back</a>

    <h6>Data Produk</h6>
    <li class="list-group-item">{{ $produk->name }}</li>
    <li class="list-group-item">{{ $produk->kategori->name }}</li>
    <li class="list-group-item">{{ $produk->harga }}</li>
    <li class="list-group-item">{{ $produk->stok }}</li>
    <li class="list-group-item">{{ $produk->bahan }}</li>


</x-app>
