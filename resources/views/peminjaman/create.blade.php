@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Catat Peminjaman Baru</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('peminjaman.store') }}" method="POST">
                            @csrf

                            {{-- Buku --}}
                            <div class="mb-3">
                                <label for="buku_id" class="form-label">
                                    Buku
                                </label>

                                <select name="buku_id" id="buku_id" class="form-select" required>
                                    <option value="">-- Pilih Buku --</option>

                                    @foreach ($buku as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->judul }} (Stok: {{ $item->stok }})
                                        </option>
                                    @endforeach
                                </select>

                                @error('buku_id')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Anggota --}}
                            <div class="mb-3">
                                <label for="anggota_id" class="form-label">
                                    Anggota
                                </label>

                                <select name="anggota_id" id="anggota_id" class="form-select" required>
                                    <option value="">-- Pilih Anggota --</option>

                                    @foreach ($anggota as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('anggota_id')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Tanggal Pinjam --}}
                            <div class="mb-3">
                                <label for="tanggal_pinjam" class="form-label">
                                    Tanggal Pinjam
                                </label>

                                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control"
                                    value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required>

                                @error('tanggal_pinjam')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="d-flex gap-2">
                                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    Simpan Peminjaman
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection