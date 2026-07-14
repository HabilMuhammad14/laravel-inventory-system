<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Barang</title>
  <style>
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:Arial,sans-serif;display:flex;min-height:100vh;background:#f5f5f3}

    .sidebar{width:240px;background:#fff;border-right:1px solid #e5e5e5;display:flex;flex-direction:column;flex-shrink:0;transition:transform .25s}
    .sidebar-header{padding:18px 16px;display:flex;align-items:center;gap:10px;border-bottom:1px solid #e5e5e5}
    .logo-circle{width:36px;height:36px;background:#dbeafe;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
    .logo-circle svg{width:18px;height:18px;stroke:#1a56db;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
    .logo-text{font-size:14px;font-weight:700;color:#111}
    .logo-sub{font-size:11px;color:#999;margin-top:1px}
    .nav{padding:12px 10px;flex:1}
    .nav-label{font-size:10px;color:#aaa;text-transform:uppercase;letter-spacing:.06em;padding:0 8px;margin-bottom:8px}
    .nav-item{display:flex;align-items:center;gap:9px;padding:9px 10px;border-radius:8px;text-decoration:none;color:#555;font-size:13.5px;margin-bottom:2px}
    .nav-item svg{width:16px;height:16px;stroke:currentColor;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;flex-shrink:0}
    .nav-item:hover{background:#f5f5f3}
    .nav-item.active{background:#dbeafe;color:#1a56db}

    .main{flex:1;display:flex;flex-direction:column;min-width:0}
    .topbar{background:#fff;border-bottom:1px solid #e5e5e5;padding:13px 20px;display:flex;justify-content:space-between;align-items:center;gap:12px}
    .topbar-left{display:flex;align-items:center;gap:10px;min-width:0}
    .topbar-title{font-size:13px;color:#777;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
    .topbar-user{display:flex;align-items:center;gap:8px;flex-shrink:0}
    .avatar{width:30px;height:30px;border-radius:50%;background:#dbeafe;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:600;color:#1a56db;flex-shrink:0}
    .user-name{font-size:13px;color:#333;white-space:nowrap}
    .btn-user{padding:5px 11px;background:#dbeafe;border:1px solid #93c5fd;border-radius:6px;color:#1a56db;font-size:12px;text-decoration:none}
    .btn-user:hover{background:#bfdbfe}
    .btn-logout{padding:5px 11px;background:transparent;border:1px solid #ddd;border-radius:6px;color:#666;font-size:12px;text-decoration:none}
    .btn-logout:hover{background:#f5f5f3;color:#333}

    .content{padding:24px 20px;flex:1;overflow-y:auto}
    .page-header{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:20px;gap:12px;flex-wrap:wrap}
    .page-title{font-size:28px;font-weight:300;color:#333;margin-bottom:4px}
    .page-sub{font-size:13px;color:#999}
    .btn-cetak{padding:7px 16px;background:#1a56db;color:#fff;border:none;border-radius:6px;font-size:13px;cursor:pointer;display:inline-flex;align-items:center;gap:6px;white-space:nowrap;flex-shrink:0}
    .btn-cetak svg{width:14px;height:14px;stroke:#fff;fill:none;stroke-width:2;stroke-linecap:round;stroke-linejoin:round}
    .btn-cetak:hover{background:#1648c0}

    .summary-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));gap:12px;margin-bottom:20px}
    .summary-card{background:#fff;border:1px solid #e5e5e5;border-radius:10px;padding:16px}
    .summary-title{font-size:11.5px;color:#999;margin-bottom:8px;text-transform:uppercase;letter-spacing:.04em}
    .summary-value{font-size:26px;font-weight:300;color:#222;font-variant-numeric:tabular-nums}
    .summary-card.blue .summary-value{color:#1a56db}
    .summary-card.purple .summary-value{color:#7c3aed}
    .summary-card.green .summary-value{color:#16a34a}
    .summary-card.orange .summary-value{color:#d97706}
    .summary-card.red .summary-value{color:#b91c1c}

    .card{background:#fff;border:1px solid #e5e5e5;border-radius:12px;overflow:hidden;overflow-x:auto}
    .tabel{width:100%;border-collapse:collapse;font-size:13px;min-width:580px}
    .tabel thead tr{background:#fafaf9}
    .tabel th{padding:11px 14px;text-align:left;font-size:11px;font-weight:600;color:#aaa;letter-spacing:.05em;text-transform:uppercase;border-bottom:1px solid #eee;white-space:nowrap}
    .tabel th.num{text-align:right}
    .tabel td{padding:11px 14px;border-bottom:1px solid #f0f0f0;color:#333;vertical-align:middle}
    .tabel td.num{text-align:right;font-variant-numeric:tabular-nums}
    .tabel tbody tr:last-child td{border-bottom:none}
    .tabel tbody tr:hover td{background:#fafcff}
    .badge-id{display:inline-block;background:#f5f5f3;border:1px solid #e5e5e5;border-radius:5px;padding:2px 8px;font-size:11.5px;font-family:monospace;color:#666}
    .badge-stok{display:inline-block;padding:3px 10px;border-radius:20px;font-size:11.5px;font-weight:500}
    .badge-stok.aman{background:#dcfce7;color:#16a34a}
    .badge-stok.menipis{background:#fef9c3;color:#854d0e}
    .badge-stok.habis{background:#fee2e2;color:#b91c1c}

    .hamburger{display:none;background:none;border:none;cursor:pointer;padding:4px}
    .hamburger span{display:block;width:20px;height:2px;background:#555;margin:4px 0;border-radius:2px}
    .overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.35);z-index:99}

    @media print{
      .sidebar,.topbar,.btn-cetak,.hamburger{display:none}
      .main{display:block}
      .content{padding:0}
      .card{border:none;border-radius:0}
      .summary-grid{grid-template-columns:repeat(5,1fr)}
    }
    @media(max-width:768px){
      .sidebar{position:fixed;inset:0 auto 0 0;z-index:100;transform:translateX(-100%)}
      .sidebar.open{transform:translateX(0)}
      .overlay.show{display:block}
      .hamburger{display:block}
      .user-name{display:none}
      .topbar-title{font-size:12px}
      .content{padding:16px 12px}
      .page-title{font-size:22px}
      .summary-grid{grid-template-columns:repeat(auto-fill,minmax(120px,1fr))}
    }
    @media(max-width:480px){
      .topbar{padding:11px 12px}
      .summary-grid{grid-template-columns:1fr 1fr}
    }
  </style>
</head>
<body>

<div class="overlay" id="overlay" onclick="closeSidebar()"></div>

<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div class="logo-circle">
      <svg viewBox="0 0 24 24"><path d="M20 7H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/><path d="M16 3H8a2 2 0 0 0-2 2v2h12V5a2 2 0 0 0-2-2z"/></svg>
    </div>
    <div>
      <div class="logo-text">Inventaris</div>
      <div class="logo-sub">Toko Sembako UM</div>
    </div>
  </div>
  <nav class="nav">
    <div class="nav-label">Menu Pemilik</div>
    <a class="nav-item " href="{{route('pemilik.dashboard')}}">
      <svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      Beranda
    </a>
    <a class="nav-item active" href="{{route('pemilik.laporan-barang')}}">
      <svg viewBox="0 0 24 24"><rect x="2" y="3" width="7" height="7"/><rect x="15" y="3" width="7" height="7"/><rect x="15" y="14" width="7" height="7"/><rect x="2" y="14" width="7" height="7"/></svg>
      Laporan Barang
    </a>
    <a class="nav-item" href="{{route('pemilik.laporan-transaksi')}}">
      <svg viewBox="0 0 24 24"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>
      Laporan Transaksi
    </a>
    <a class="nav-item" href="{{route('pemilik.laporan-stok')}}">
      <svg viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
      Laporan Stok
    </a>
    <a class="nav-item" href="{{route('pemilik.laporan-supplier')}}">
      <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
      Supplier
    </a>
  </nav>
</div>
<div class="main">
  <div class="topbar">
    <div class="topbar-left">
      <button class="hamburger" onclick="openSidebar()" aria-label="Buka menu">
        <span></span><span></span><span></span>
      </button>
      <span class="topbar-title">Sistem Inventaris Toko Sembako Utama Mandiri</span>
    </div>
    <div class="topbar-user">
      <div class="avatar">HM</div>
      <span class="user-name">Habil Muhammad</span>
      <a href="{{route('pemilik.kelola-user')}}" class="btn-user">Kelola User</a>
      <form action="{{ route('logout') }}" method="POST" style="display:inline">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
      </form>
    </div>
  </div>
  <div class="content">
    <div class="page-header">
      <div>
        <div class="page-title">Laporan Barang</div>
        <div class="page-sub">Informasi seluruh data barang toko.</div>
      </div>
      <button class="btn-cetak" onclick="window.print()">
        <svg viewBox="0 0 24 24"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
        Cetak Laporan
      </button>
    </div>
    <div class="summary-grid">
      <div class="summary-card blue">
        <div class="summary-title">Jumlah Barang</div>
        <div class="summary-value">{{ $totalBarang }}</div>
      </div>
      <div class="summary-card purple">
        <div class="summary-title">Kategori</div>
        <div class="summary-value">{{ $totalKategori }}</div>
      </div>
      <div class="summary-card green">
        <div class="summary-title">Barang Aman</div>
        <div class="summary-value">{{ $barangAman }}</div>
      </div>
      <div class="summary-card orange">
        <div class="summary-title">Stok Menipis</div>
        <div class="summary-value">{{ $stokMenipis }}</div>
      </div>
      <div class="summary-card red">
        <div class="summary-title">Barang Habis</div>
        <div class="summary-value">{{ $barangHabis }}</div>
      </div>
    </div>
    <div class="card">
      <table class="tabel">
        <thead>
          <tr>
            <th style="width:36px">#</th>
            <th style="width:100px">ID Barang</th>
            <th style="min-width:150px">Nama Barang</th>
            <th style="width:120px">Kategori</th>
            <th style="width:90px">Satuan</th>
            <th class="num" style="width:110px">Harga</th>
            <th class="num" style="width:80px">Stok</th>
          </tr>
        </thead>
        <tbody>
          @foreach($barangs as $barang)
          @php
            $stokClass = $barang->stok <= 0 ? 'habis' : ($barang->stok <= 20 ? 'menipis' : 'aman');
          @endphp
          <tr>
            <td style="color:#aaa;font-size:12px">{{ $loop->iteration }}</td>
            <td><span class="badge-id">{{ $barang->kode_barang }}</span></td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
            <td>{{ $barang->satuan }}</td>
            <td class="num">Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
            <td class="num"><span class="badge-stok {{ $stokClass }}">{{ $barang->stok }}</span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
  function openSidebar(){
    document.getElementById('sidebar').classList.add('open');
    document.getElementById('overlay').classList.add('show');
  }
  function closeSidebar(){
    document.getElementById('sidebar').classList.remove('open');
    document.getElementById('overlay').classList.remove('show');
  }
</script>

</body>
</html>
