@extends('layouts.app')
@section('title', 'Laporan Transaksi')
@section('page-title', 'Laporan Transaksi')

@section('content')
<div class="page-header">
    <h1>Laporan Transaksi</h1>
    <p>Informasi seluruh transaksi barang masuk, keluar, dan retur.</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Transaksi</div>
        <div class="stat-value">{{ $totalTransaksi ?? 0 }}</div>
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
        <div class="stat-label">Retur Barang</div>
        <div class="stat-value" style="color:#2563EB;">{{ $totalRetur ?? 0 }}</div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <span class="card-title">Riwayat Seluruh Transaksi</span>
        <a href="{{ route('pemilik.laporan.transaksi.cetak') }}" target="_blank" class="btn btn-secondary btn-sm">🖨️ Cetak Laporan</a>
    </div>
    <div class="card-body" style="padding-bottom:0;">
        <div id="tabTrx" class="tabs">
            <button class="tab-btn active" data-tab="trx-masuk" onclick="switchTab('tabTrx','trx-masuk')">📥 Masuk</button>
            <button class="tab-btn" data-tab="trx-keluar" onclick="switchTab('tabTrx','trx-keluar')">📤 Keluar</button>
            <button class="tab-btn" data-tab="trx-retur" onclick="switchTab('tabTrx','trx-retur')">↩️ Retur</button>
        </div>

        {{-- MASUK --}}
        <div id="trx-masuk" class="tab-pane active">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Transaksi</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>ID Barang</th>
                            <th>Jumlah</th>
                            <th>ID Supplier</th>
                            <th>ID User</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksiMasuk as $i => $t)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $t->id_transaksi_masuk }}</td>
                            <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }}</td>
                            <td><span class="badge badge-green">Masuk</span></td>
                            <td>{{ $t->id_barang }}</td>
                            <td style="font-weight:600; color:#16A34A;">+{{ $t->jumlah }}</td>
                            <td>{{ $t->id_supplier }}</td>
                            <td>{{ $t->id_user }}</td>
                            <td>{{ $t->keterangan ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="9" style="text-align:center; color:#64748B; padding:24px;">Belum ada transaksi masuk.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- KELUAR --}}
        <div id="trx-keluar" class="tab-pane">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Transaksi</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>ID Barang</th>
                            <th>Jumlah</th>
                            <th>ID User</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksiKeluar as $i => $t)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $t->id_transaksi_keluar }}</td>
                            <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }}</td>
                            <td><span class="badge badge-amber">Keluar</span></td>
                            <td>{{ $t->id_barang }}</td>
                            <td style="font-weight:600; color:#D97706;">-{{ $t->jumlah }}</td>
                            <td>{{ $t->id_user }}</td>
                            <td>{{ $t->keterangan ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="8" style="text-align:center; color:#64748B; padding:24px;">Belum ada transaksi keluar.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- RETUR --}}
        <div id="trx-retur" class="tab-pane">
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Retur</th>
                            <th>Tanggal</th>
                            <th>Jenis</th>
                            <th>ID Barang</th>
                            <th>Jumlah</th>
                            <th>ID Supplier</th>
                            <th>ID User</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transaksiRetur as $i => $t)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $t->id_transaksi_retur }}</td>
                            <td>{{ \Carbon\Carbon::parse($t->tanggal)->format('d/m/Y') }}</td>
                            <td><span class="badge badge-blue">Retur</span></td>
                            <td>{{ $t->id_barang }}</td>
                            <td style="font-weight:600; color:#2563EB;">{{ $t->jumlah }}</td>
                            <td>{{ $t->id_supplier }}</td>
                            <td>{{ $t->id_user }}</td>
                            <td>{{ $t->keterangan ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="9" style="text-align:center; color:#64748B; padding:24px;">Belum ada transaksi retur.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
