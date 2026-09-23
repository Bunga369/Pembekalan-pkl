@extends('layouts.app')

@section('content')
    <h4>Catat Peminjaman Baru</h4>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <div class="mb-2">
            <label for="buku_id">Buku</label>
            <select name="buku_id" id="buku_id" class="form-select">
                @foreach ($buku as $b)
                    <option value="{{ $b->id }}">
                        {{ $b->judul }} (stok: {{ $b->stok }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label for="anggota_id">Anggota</label>
            <select name="anggota_id" id="anggota_id" class="form-select">
                @foreach ($anggota as $a)
                    <option value="{{ $a->id }}">
                        {{ $a->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ date('Y-m-d') }}">
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </form>


@endsection