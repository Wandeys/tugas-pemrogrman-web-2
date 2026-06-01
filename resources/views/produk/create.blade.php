<x-app>


    <x-slot:title>
        {{ $title }}
    </x-slot>

    <form method="POST" action="{{ route('produk.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                name="name"value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori</label>

            <select class="form-select" @error('kategori_id') is-invalid
             @enderror id="kategori_id"
                name="kategori_id">
                <option value="">Choose Kategori</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" @selected(old('kategori_id') == $kategori)>
                        {{ $kategori->name_kategori }}
                    </option>
                @endforeach
            </select>


            @error('kategori_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                name="harga"value="{{ old('harga') }}" step="0.01">
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok"
                name="stok"value="{{ old('stok') }}" step="1">
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="bahan" class="form-label">Bahan</label>
            <input type="text" class="form-control @error('bahan') is-invalid @enderror" id="bahan"
                name="bahan"value="{{ old('bahan') }}">
            @error('bahan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <a class="btn btn-warning" href="{{ route('produk.index') }}" role="button">Cancel</a>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</x-app>
