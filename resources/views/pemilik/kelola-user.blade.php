<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola User</title>
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
    .page-header{margin-bottom:20px}
    .page-title{font-size:28px;font-weight:300;color:#333;margin-bottom:4px}
    .page-sub{font-size:13px;color:#999}

    .card{background:#fff;border:1px solid #e5e5e5;border-radius:12px;overflow:hidden;overflow-x:auto}
    .tabel{width:100%;border-collapse:collapse;font-size:13px;min-width:640px}
    .tabel thead tr{background:#fafaf9}
    .tabel th{padding:11px 14px;text-align:left;font-size:11px;font-weight:600;color:#aaa;letter-spacing:.05em;text-transform:uppercase;border-bottom:1px solid #eee;white-space:nowrap}
    .tabel td{padding:11px 14px;border-bottom:1px solid #f0f0f0;color:#333;vertical-align:middle}
    .tabel tbody tr:last-child td{border-bottom:none}
    .tabel tbody tr:hover td{background:#fafcff}
    .form-row td{background:#eff6ff}
    .form-row:hover td{background:#eff6ff !important}
    .edit-row td{background:#eff6ff}
    .edit-row:hover td{background:#eff6ff !important}

    .form-input{width:100%;height:32px;padding:5px 10px;border:1px solid #ddd;border-radius:6px;font-size:12px;color:#333;outline:none}
    .form-input:focus{border-color:#3b82f6;box-shadow:0 0 0 2px #dbeafe}
    .form-select{width:100%;height:32px;padding:5px 8px;border:1px solid #ddd;border-radius:6px;font-size:12px;color:#333;outline:none;background:#fff}
    .form-select:focus{border-color:#3b82f6;box-shadow:0 0 0 2px #dbeafe}
    .input-error{border-color:#fca5a5 !important;background:#fef2f2}
    .error-text{display:block;color:#b91c1c;font-size:11px;margin-top:3px}

    .btn-simpan{padding:5px 12px;background:#1a56db;color:#fff;border:none;border-radius:6px;font-size:12px;cursor:pointer;white-space:nowrap}
    .btn-simpan:hover{background:#1648c0}
    .btn-batal{padding:5px 10px;background:transparent;border:1px solid #ddd;border-radius:6px;color:#666;font-size:12px;cursor:pointer;white-space:nowrap;text-decoration:none;display:inline-flex;align-items:center}
    .btn-batal:hover{background:#f5f5f3}
    .btn-edit{display:inline-flex;align-items:center;gap:3px;padding:4px 10px;font-size:12px;text-decoration:none;border-radius:6px;border:1px solid #93c5fd;color:#1a56db;background:#eff6ff;white-space:nowrap}
    .btn-hapus{display:inline-flex;align-items:center;gap:3px;padding:4px 10px;font-size:12px;text-decoration:none;border-radius:6px;border:1px solid #fca5a5;color:#b91c1c;background:#fef2f2;white-space:nowrap}
    .btn-edit:hover{background:#dbeafe}
    .btn-hapus:hover{background:#fee2e2}
    .aksi-group{display:flex;gap:5px;flex-wrap:wrap}

    .badge-role{display:inline-block;padding:3px 10px;border-radius:20px;font-size:11.5px;font-weight:500}
    .badge-role.pemilik{background:#ede9fe;color:#7c3aed}
    .badge-role.pengguna{background:#dbeafe;color:#1a56db}

    .error-box{background:#fef2f2;border:1px solid #fca5a5;border-radius:8px;padding:10px 14px;margin-bottom:14px;font-size:13px;color:#b91c1c}

    .hamburger{display:none;background:none;border:none;cursor:pointer;padding:4px}
    .hamburger span{display:block;width:20px;height:2px;background:#555;margin:4px 0;border-radius:2px}
    .overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.35);z-index:99}

    @media(max-width:768px){
      .sidebar{position:fixed;inset:0 auto 0 0;z-index:100;transform:translateX(-100%)}
      .sidebar.open{transform:translateX(0)}
      .overlay.show{display:block}
      .hamburger{display:block}
      .user-name{display:none}
      .topbar-title{font-size:12px}
      .content{padding:16px 12px}
      .page-title{font-size:22px}
    }
    @media(max-width:480px){
      .topbar{padding:11px 12px}
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
    <a class="nav-item " href="{{route('pemilik.laporan-barang')}}">
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
      <a href="" class="btn-logout">Logout</a>
    </div>
  </div>

  <div class="content">
    <div class="page-header">
      <div class="page-title">Kelola User</div>
      <div class="page-sub">Tambah dan kelola akun pegawai sistem inventaris.</div>
    </div>

    @if ($errors->any())
    <div class="error-box">
      <ul style="padding-left:16px">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="card">
      <table class="tabel">
<thead>
          <tr>
            <th style="width:36px">#</th>
            <th style="min-width:140px">Nama</th>
            <th style="min-width:160px">Email</th>
            <th style="min-width:130px">Password</th>
            <th style="width:100px">Role</th>
            <th style="width:120px">Aksi</th>
          </tr>
        </thead>
        <tbody>

          {{-- ======= FORM TAMBAH ======= --}}
          <form action="{{route('pemilik.kelola-user.store')}}" method="POST">
            @csrf
            <tr class="form-row">
              <td style="color:#aaa;font-size:12px">#</td>
              <td>
                <input type="text" class="form-input {{ $errors->has('name') ? 'input-error' : '' }}" placeholder="Nama lengkap" name="name" value="{{ old('name') }}">
                @error('name')<span class="error-text">{{ $message }}</span>@enderror
              </td>
              <td>
                <input type="email" class="form-input {{ $errors->has('email') ? 'input-error' : '' }}" placeholder="email@contoh.com" name="email" value="{{ old('email') }}">
                @error('email')<span class="error-text">{{ $message }}</span>@enderror
              </td>
              <td>
                <input type="password" class="form-input {{ $errors->has('password') ? 'input-error' : '' }}" placeholder="Min. 8 karakter" name="password">
                @error('password')<span class="error-text">{{ $message }}</span>@enderror
              </td>
              <td>
                <select class="form-select" name="role">
                  <option value="pegawai" {{ old('role') == 'pegawai' ? 'selected' : '' }}>Pegawai</option>
                  <option value="pemilik" {{ old('role') == 'pemilik' ? 'selected' : '' }}>Pemilik</option>
                </select>
              </td>
              <td>
                <div class="aksi-group">
                  <button class="btn-simpan" type="submit">Simpan</button>
                  <button class="btn-batal" type="reset">Batal</button>
                </div>
              </td>
            </tr>
          </form>

          {{-- ======= LOOP DATA ======= --}}
          @foreach($users as $user)
            @if(isset($editUser) && $editUser->id == $user->id)

              {{-- ======= FORM EDIT ======= --}}
              <form action="{{route('pemilik.kelola-user.update', $user)}}" method="POST">
                @csrf
                @method('PUT')
                <tr class="edit-row">
                  <td style="color:#aaa;font-size:12px">{{ $loop->iteration }}</td>
                  <td>
                    <input type="text" class="form-input {{ $errors->has('name') ? 'input-error' : '' }}" name="name" value="{{ old('name', $user->name) }}">
                    @error('name')<span class="error-text">{{ $message }}</span>@enderror
                  </td>
                  <td>
                    <input type="email" class="form-input {{ $errors->has('email') ? 'input-error' : '' }}" name="email" value="{{ old('email', $user->email) }}">
                    @error('email')<span class="error-text">{{ $message }}</span>@enderror
                  </td>
                  <td>
                    <span style="font-size:12px;color:#aaa">Tidak diubah</span>
                  </td>
                  <td>
                    <select class="form-select" name="role">
                      <option value="pegawai" {{ old('role', $user->role) == 'pegawai' ? 'selected' : '' }}>Pegawai</option>
                      <option value="pemilik" {{ old('role', $user->role) == 'pemilik' ? 'selected' : '' }}>Pemilik</option>
                    </select>
                  </td>
                  <td>
                    <div class="aksi-group">
                      <button type="submit" class="btn-simpan">Simpan</button>
                      <a href="{{ route('pemilik.kelola-user') }}" class="btn-batal">Batal</a>
                    </div>
                  </td>
                </tr>
              </form>
            @else
              <tr>
                <td style="color:#aaa;font-size:12px">{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td style="color:#aaa;letter-spacing:2px">••••••••</td>
                <td><span class="badge-role {{ $user->role }}">{{ ucfirst($user->role) }}</span></td>
                <td>
                  <div class="aksi-group">
                    <a href="{{route('pemilik.kelola-user.edit', $user)}}" class="btn-edit">Edit</a>
                    <a href="{{route('pemilik.kelola-user.hapus', $user)}}" class="btn-hapus">Hapus</a>
                  </div>
                </td>
              </tr>
            @endif
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
