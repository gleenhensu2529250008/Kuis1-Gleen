<x-layout title="Detail Prodi">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Detail Prodi</h1>
        <a href="/prodi" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <tbody>

                    <tr>
                        <td width="200px"><strong>Nama Prodi</strong></td>
                        <td width="10px">:</td>
                        <td>{{ $prodi->nama_prodi }}</td>
                    </tr>

                    <tr>
                        <td><strong>Nama Kaprodi</strong></td>
                        <td>:</td>
                        <td>{{ $prodi->nama_kaprodi }}</td>
                    </tr>

                    <tr>
                        <td><strong>Fakultas</strong></td>
                        <td>:</td>
                        <td>{{ $prodi->fakultas->name }}</td>
                    </tr>

                    <tr>
                        <td><strong>Photo Kaprodi</strong></td>
                        <td>:</td>
                        <td>
                            <img
                                src="{{ asset('storage/' . $prodi->photo_kaprodi) }}"
                                class="img-thumbnail"
                                style="width: 200px;">
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

</x-layout>