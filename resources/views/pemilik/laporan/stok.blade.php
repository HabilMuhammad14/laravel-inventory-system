@extends('layouts.app')
@section('title', 'Laporan Stok')
@section('page-title', 'Laporan Stok Barang')

@section('content')
<div class="page-header">
    <h1>Laporan Stok Barang</h1>
    <p>Pantau kondisi persediaan barang secara keseluruhan.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Barang</div>
        <div class="stat-value">{{ $totalBarang ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Barang Masuk</div>
        <div class="stat-value" style="color:#16A34A;">{{ $totalMasuk ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Barang Keluar</div>
        <div class="stat-value" style="color:#D97706;">{{ $totalKeluar ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Retur</div>
        <div class="stat-value" style="color:#2563EB;">{{ $totalRetur ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Stok</div>
        <div class="stat-value">{{ $totalStok ?? 0 }}</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <span class="card-title">Rincian Stok per Barang</span>
        <a href="{{ route('pemilik.laporan.stok.cetak') }}" target="_blank" class="btn btn-secondary btn-sm">🖨️ Cetak Laporan</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok Awal</th>
                    <th>Barang Masuk</th>
                    <th>Barang Keluar</th>
                    <th>Retur</th>
                    <th>Stok Akhir</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($stok as $i => $s)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $s->id_barang }}</td>
                    <td>{{ $s->nama_barang }}</td>
                    <td>{{ $s->stok_awal ?? 0 }}</td>
                    <td style="color:#16A34A; font-weight:600;">+{{ $s->total_masuk ?? 0 }}</td>
                    <td style="color:#D97706; font-weight:600;">-{{ $s->total_keluar ?? 0 }}</td>
                    <td style="color:#2563EB; font-weight:600;">{{ $s->total_retur ?? 0 }}</td>
                    <td style="font-weight:700;">{{ $s->stok_akhir ?? 0 }}</td>
                    <td>
                        @if(($s->stok_akhir ?? 0) <= 0)
                            <span class="badge badge-red">Habis</span>
                        @elseif(($s->stok_akhir ?? 0) <= 10)
                            <span class="badge badge-amber">Menipis</span>
                        @else
                            <span class="badge badge-green">Aman</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="9" style="text-align:center; color:#64748B; padding:24px;">Belum ada data stok.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
