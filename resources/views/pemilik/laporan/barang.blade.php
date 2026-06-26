@extends('layouts.app')
@section('title', 'Laporan Barang')
@section('page-title', 'Laporan Barang')

@section('content')
<div class="page-header">
    <h1>Laporan Barang</h1>
    <p>Informasi seluruh data barang yang terdapat pada sistem inventaris.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Jumlah Barang</div>
        <div class="stat-value">{{ $jumlahBarang ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Kategori</div>
        <div class="stat-value">{{ $jumlahKategori ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Barang Aman</div>
        <div class="stat-value" style="color:#16A34A;">{{ $barangAman ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Stok Menipis</div>
        <div class="stat-value" style="color:#D97706;">{{ $barangMenipis ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Barang Habis</div>
        <div class="stat-value" style="color:#DC2626;">{{ $barangHabis ?? 0 }}</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <span class="card-title">Daftar Seluruh Barang</span>
        <a href="{{ route('pemilik.laporan.barang.cetak') }}" target="_blank" class="btn btn-secondary btn-sm">🖨️ Cetak Laporan</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barang as $i => $b)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $b->id_barang }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td>{{ $b->nama_kategori ?? '-' }}</td>
                    <td>{{ $b->satuan }}</td>
                    <td>Rp {{ number_format($b->harga, 0, ',', '.') }}</td>
                    <td style="font-weight:700;">{{ $b->stok ?? 0 }}</td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center; color:#64748B; padding:24px;">Belum ada data barang.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
