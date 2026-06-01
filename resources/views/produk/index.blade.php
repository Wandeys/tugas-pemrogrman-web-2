<x-app>


    <x-slot:title>
        {{ $title }}
    </x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession


    <a class="btn btn-primary mb-3" href="{{ route('produk.create') }}" role="button">Create</a>

    <form action="">

        <div class="row g-3 mb-3">
            <div class="col md-4">
                <input type="text" class="form-control" id="keyword" name="keyword"
                    placeholder="Search produk name..." value="{{ request('keyword') }}">
            </div>
            <div class="col-md-4">
                <select class="form-select" id="kategori_id" name="kategori_id">
                    <option value="">All Kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}"{{ request('kategori_id') == $kategori->id ? 'selected':}}>
                            {{ $kategori->name_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>

    </form>



    <ul class="list-group">
        @foreach ($produks as $produk)
            <li class="list-group-item">
                {{ $produks->firstItem() + $loop->index }}.
                {{ $produk->name }}--{{ $produk->kategori_id }}--{{ $produk->harga }} --
                {{ $produk->stok }}--{{ $produk->bahan }}-- {{ $produk->kategori->name_kategori }}

                <a class="btn btn-info btn-sm" href="{{ route('produk.show', $produk) }}" role="button">Detail</a>
                <a class="btn btn-warning btn-sm" href="{{ route('produk.edit', $produk) }}" role="button">edit</a>
                <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure/Anda Yakin?')">Delete</button>

                </form>

            </li>
        @endforeach


    </ul>

    {{ $produks->links() }}

</x-app>
