<x-app>


    <x-slot:title>
        {{ $title }}
    </x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession


    <a class="btn btn-primary mb-3" href="{{ route('kategori.create') }}" role="button">Create</a>

    <form action="">

        <div class="row g-3 mb-3">
            <div class="col md-8">
                <input type="text" class="form-control" id="keyword" name="keyword"
                    placeholder="Search kategori name ...">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>

    </form>

    <ul class="list-group">
        @foreach ($kategoris as $kategori)
            <li class="list-group-item">
                {{ $kategoris->firstItem() + $loop->index }}.
                {{ $kategori->name_kategori }}--{{ $kategori->deskripsi }}--{{ $kategori->kode_kategori }}

                <a class="btn btn-info btn-sm" href="{{ route('kategori.show', $kategori) }}" role="button">Detail</a>
                <a class="btn btn-warning btn-sm" href="{{ route('kategori.edit', $kategori) }}" role="button">edit</a>
                <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure/Anda Yakin?')">Delete</button>

                </form>

            </li>
        @endforeach


    </ul>

    {{ $kategoris->links() }}

</x-app>
