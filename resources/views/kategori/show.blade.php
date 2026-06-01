<x-app>


    <x-slot:title>
        {{ $title }}
    </x-slot>


    <a class="btn btn-warning mb-3" href="{{ route('kategori.index') }}" role="button">Back</a>

    {{-- kategori --}}
    <h6>Data Kategori</h6>
    <ul class="list-group">
        <li class="list-group-item">name_kategori: {{ $kategori->name_kategori }}</li>
        <li class="list-group-item">
            Create At: {{ $kategori->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">
            Last Update: {{ $kategori->updated_at->diffForHumans() }}</li>
    </ul>

    {{-- produk --}}
    <h6>Data Produk</h6>
    <ul class="list-group">
        @foreach ($kategori->produks as $produk)
            <li class="list-group-item">{{ $produk->name }}</li>
        @endforeach

    </ul>



</x-app>
