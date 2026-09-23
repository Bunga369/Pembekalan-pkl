<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Peminjaman</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">

        <div class="d-flex justify-content-between mb-3">
            <h4>Data Peminjaman</h4>

            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
                + Catat Peminjaman
            </a>
        </div>

        @if (session('sukses'))
            <div class="alert alert-success">
                {{ session('sukses') }}
            </div>
        @endif

        @if (session('gagal'))
            <div class="alert alert-danger">
                {{ session('gagal') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Buku</th>
                    <th>Anggota</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($peminjaman as $item)
                    <tr>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->anggota->nama }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->tanggal_kembali ?? '-' }}</td>

                        <td>
                            {{ $item->status }}
                        </td>

                        <td>
                            @if ($item->status === 'dipinjam')
                                <form action="{{ route('peminjaman.kembalikan', $item) }}" method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button class="btn btn-sm btn-success">
                                        Kembalikan
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Belum ada peminjaman.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</body>

</html>