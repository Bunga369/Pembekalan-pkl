<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h4>Daftar Buku</h4>

            <a href="{{ route('buku.create') }}" class="btn btn-primary">
                + Tambah Buku
            </a>
        </div>

        @if (session('sukses'))
            <div class="alert alert-success">
                {{ session('sukses') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>ISBN</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($buku as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->isbn }}</td>
                        <td>{{ $item->stok }}</td>

                        <td>
                            <a href="{{ route('buku.edit', $item) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('buku.destroy', $item) }}" method="POST" class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus buku ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            Belum ada data buku.
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>

    </div>

</body>

</html>