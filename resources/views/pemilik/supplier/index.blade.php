@extends('layouts.app')
@section('title', 'Laporan Supplier')
@section('page-title', 'Laporan Supplier')

@section('content')
<div class="page-header">
    <h1>Laporan Supplier</h1>
    <p>Informasi supplier yang bekerja sama dengan toko.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Supplier</div>
        <div class="stat-value">{{ $totalSupplier ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Supplier Aktif</div>
        <div class="stat-value" style="color:#16A34A;">{{ $supplierAktif ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Supplier Nonaktif</div>
        <div class="stat-value" style="color:#DC2626;">{{ $supplierNonaktif ?? 0 }}</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Barang Disuplai</div>
        <div class="stat-value">{{ $barangDisuplai ?? 0 }}</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <span class="card-title">Daftar Supplier</span>
        <a href="{{ route('pemilik.laporan.supplier.cetak') }}" target="_blank" class="btn btn-secondary btn-sm">🖨️ Cetak Laporan</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($supplier as $i => $s)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $s->id_supplier }}</td>
                    <td>{{ $s->nama_supplier }}</td>
                    <td>{{ $s->alamat }}</td>
                    <td>{{ $s->no_telp }}</td>
                    <td>
                        <span class="badge {{ ($s->status ?? 'aktif') === 'aktif' ? 'badge-green' : 'badge-gray' }}">
                            {{ ucfirst($s->status ?? 'Aktif') }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" style="text-align:center; color:#64748B; padding:24px;">Belum ada data supplier.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
