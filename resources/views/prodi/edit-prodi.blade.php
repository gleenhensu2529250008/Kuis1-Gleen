<x-layout title="Edit Prodi">
    <h1>Edit Prodi</h1>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/prodi/{{ $prodi->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Pilih Fakultas --}}
        <div class="mb-3">
            <label class="form-label">Fakultas</label>
            <select name="fakultas_id" class="form-select">
                <option value="">Pilih Fakultas</option>
                @foreach ($fakultas as $item)
                    <option value="{{ $item->id }}"
                        {{ $prodi->fakultas_id == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nama Prodi --}}
        <div class="mb-3">
            <label class="form-label">Nama Prodi</label>
            <input name="nama_prodi" type="text" class="form-control"
                value="{{ old('nama_prodi', $prodi->nama_prodi) }}">
        </div>

        {{-- Nama Kaprodi --}}
        <div class="mb-3">
            <label class="form-label">Nama Kaprodi</label>
            <input name="nama_kaprodi" type="text" class="form-control"
                value="{{ old('nama_kaprodi', $prodi->nama_kaprodi) }}">
        </div>

        {{-- Foto Kaprodi --}}
        <div class="mb-3">
            <label class="form-label">Photo Kaprodi</label>

            {{-- Tampilkan foto lama --}}
            @if ($prodi->photo_kaprodi)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $prodi->photo_kaprodi) }}"
                        class="img-thumbnail" style="width: 150px;">
                    <p class="text-muted small mt-1">Foto saat ini. Upload foto baru untuk menggantinya.</p>
                </div>
            @endif

            <input name="photo_kaprodi" type="file" accept="image/*" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="/prodi" class="btn btn-secondary">Kembali</a>
    </form>
</x-layout>