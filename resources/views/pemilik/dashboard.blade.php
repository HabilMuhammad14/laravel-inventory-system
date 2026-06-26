@extends('layouts.app')
@section('title', 'Dashboard Pemilik')
@section('page-title', 'Dashboard Pemilik')

@section('content')
<div class="page-header">
    <h1>Dashboard Pemilik</h1>
    <p>Ringkasan informasi inventaris toko secara keseluruhan.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Jumlah Barang</div>
        <div class="stat-value">{{ $jumlahBarang ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Supplier</div>
        <div class="stat-value">{{ $totalSupplier ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Transaksi</div>
        <div class="stat-value">{{ $totalTransaksi ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Total Stok</div>
        <div class="stat-value">{{ $totalStok ?? 0 }}</div>
    </div>
</div>

{{-- Menu Shortcut --}}
<div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(150px,1fr)); gap:12px; margin-bottom:24px;">
    <a href="{{ route('pemilik.laporan.barang') }}" style="text-decoration:none;">
        <div class="card" style="text-align:center; padding:22px 12px; cursor:pointer; transition:box-shadow .15s;"
             onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,.08)'"
             onmouseout="this.style.boxShadow='none'">
            <div style="font-size:28px; margin-bottom:8px;">📦</div>
            <div style="font-size:12.5px; font-weight:600; color:#1E293B;">Laporan Barang</div>
            <div style="font-size:11px; color:#64748B; margin-top:2px;">Lihat data seluruh barang</div>
        </div>
    </a>
    <a href="{{ route('pemilik.laporan.transaksi') }}" style="text-decoration:none;">
        <div class="card" style="text-align:center; padding:22px 12px; cursor:pointer; transition:box-shadow .15s;"
             onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,.08)'"
             onmouseout="this.style.boxShadow='none'">
            <div style="font-size:28px; margin-bottom:8px;">🔄</div>
            <div style="font-size:12.5px; font-weight:600; color:#1E293B;">Laporan Transaksi</div>
            <div style="font-size:11px; color:#64748B; margin-top:2px;">Lihat aktivitas transaksi</div>
        </div>
    </a>
    <a href="{{ route('pemilik.laporan.stok') }}" style="text-decoration:none;">
        <div class="card" style="text-align:center; padding:22px 12px; cursor:pointer; transition:box-shadow .15s;"
             onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,.08)'"
             onmouseout="this.style.boxShadow='none'">
            <div style="font-size:28px; margin-bottom:8px;">📊</div>
            <div style="font-size:12.5px; font-weight:600; color:#1E293B;">Laporan Stok</div>
            <div style="font-size:11px; color:#64748B; margin-top:2px;">Pantau kondisi stok barang</div>
        </div>
    </a>
    <a href="{{ route('pemilik.supplier.index') }}" style="text-decoration:none;">
        <div class="card" style="text-align:center; padding:22px 12px; cursor:pointer; transition:box-shadow .15s;"
             onmouseover="this.style.boxShadow='0 4px 16px rgba(0,0,0,.08)'"
             onmouseout="this.style.boxShadow='none'">
            <div style="font-size:28px; margin-bottom:8px;">🚚</div>
            <div style="font-size:12.5px; font-weight:600; color:#1E293B;">Supplier</div>
            <div style="font-size:11px; color:#64748B; margin-top:2px;">Lihat data supplier toko</div>
        </div>
    </a>
</div>

{{-- Barang Stok Menipis --}}
<div class="card">
    <div class="card-header">
        <span class="card-title">⚠️ Barang dengan Stok Menipis</span>
        <a href="{{ route('pemilik.laporan.stok') }}" class="btn btn-secondary btn-sm">Lihat Semua Stok</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangMenipis as $i => $b)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $b->id_barang }}</td>
                    <td>{{ $b->nama_barang }}</td>
                    <td style="font-weight:700;">{{ $b->stok_akhir }}</td>
                    <td>
                        @if($b->stok_akhir <= 0)
                            <span class="badge badge-red">Habis</span>
                        @else
                            <span class="badge badge-amber">Menipis</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" style="text-align:center; color:#64748B; padding:24px;">Semua stok barang dalam kondisi aman. ✅</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
