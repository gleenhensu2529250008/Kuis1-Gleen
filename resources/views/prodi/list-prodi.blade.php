<x-layout title="List Prodi">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">List Prodi</h1>
        <a href="/prodi/create" class="btn btn-primary">+ Add Prodi</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr class="text-center">
                    <th width="5%">No</th>
                    <th>Nama Prodi</th>
                    <th>Nama Kaprodi</th>
                    <th>Fakultas</th>
                    <th>Photo Kaprodi</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($prodi as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_prodi }}</td>
                        <td>{{ $item->nama_kaprodi }}</td>
                        <td>{{ $item->fakultas->name }}</td>
                        <td class="text-center">
                            <img src="{{ asset('storage/' . $item->photo_kaprodi) }}"
                                class="img-thumbnail" style="width: 80px;">
                        </td>
                        <td class="text-center">
                            <div class="d-flex gap-2 justify-content-center">

                                {{-- Tombol Edit --}}
                                <a href="/prodi/{{ $item->id }}/edit"
                                    class="btn btn-warning btn-sm">Edit</a>

                                {{-- Tombol Hapus --}}
                                <form action="/prodi/{{ $item->id }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                {{-- Tombol Detail --}}
                                <a href="/prodi/{{ $item->id }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Data prodi belum tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</x-layout>