<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori Barang</title>
  {{-- <link rel="stylesheet" href="kategori.css"> --}}
  <style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body{
  font-family: Arial, sans-serif;
  display: flex;
  height: 100vh;
  background: #f3f3f3;
}

.sidebar{
  width: 250px;
  background: #1a73e8;
  display: flex;
  flex-direction: column;
}

.sidebar-header{
  padding: 24px;
  display: flex;
  align-items: center;
  gap: 10px;
  border-bottom: 1px solid rgba(255,255,255,0.2);
}

.logo-icon{
  width: 42px;
  height: 42px;
  background: white;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.logo-icon img{
  width: 22px;
  height: 22px;
}

.logo-text{
  color: white;
  font-size: 16px;
  font-weight: bold;
}

.logo-text span{
  display: block;
  font-size: 11px;
  opacity: 0.7;
}

.nav{
  background: white;
  flex: 1;
  padding: 15px;
}

.nav-label{
  font-size: 11px;
  color: #888;
  margin-bottom: 10px;
  text-transform: uppercase;
}

.nav-item{
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 10px 12px;
  border-radius: 5px;
  text-decoration: none;
  color: #444;
  font-size: 14px;
  margin-bottom: 4px;
}

.nav-item img{
  width: 16px;
  height: 16px;
}

.nav-item:hover,
.nav-item.active{
  background: #e8f0fe;
}

.main{
  flex: 1;
  display: flex;
  flex-direction: column;
}

.topbar{
  background: #1a73e8;
  color: white;
  padding: 18px 24px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.topbar-title{
  font-size: 14px;
}

.topbar-user{
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 13px;
}

.btn-logout{
  padding: 6px 12px;
  background: rgba(255,255,255,0.15);
  border: 1px solid rgba(255,255,255,0.3);
  border-radius: 4px;
  color: white;
  text-decoration: none;
  font-size: 12px;
}

.btn-logout:hover{
  background: white;
  color: #1a73e8;
}

.content{
  padding: 20px;
}

.main-title{
  margin-bottom: 15px;
}

.page-title{
  font-size: 42px;
  font-weight: 300;
  color: #666;
}

.table-container{
  background: white;
  border: 1px solid #e5e5e5;
  border-radius: 3px;
  padding: 12px;
}

.tabel{
  width: 100%;
  border-collapse: collapse;
  font-size: 13px;
}

.tabel thead{
  background: #fafafa;
}

.tabel th{
  padding: 12px 14px;
  text-align: left;
  color: #777;
  border-bottom: 1px solid #eaeaea;
}

.tabel td{
  padding: 13px 12px;
  border-bottom: 1px solid #f0f0f0;
  color: #444;
}

.form-row td{
  background: #fafcff;
}

.form-input{
  width: 100%;
  height: 30px;
  padding: 5px 8px;
  border: 1px solid #dcdcdc;
  border-radius: 3px;
  font-size: 12px;
}

.form-aksi{
  display: flex;
  gap: 5px;
}

.btn-simpan,
.btn-batal{
  padding: 5px 10px;
  font-size: 11px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}

.btn-simpan{
  background: #1a73e8;
  color: white;
}

.btn-batal{
  background: #f1f1f1;
  color: #555;
}

.btn-edit,
.btn-hapus{
  display: inline-block;
  padding: 4px 10px;
  font-size: 12px;
  text-decoration: none;
  border-radius: 3px;
}

.btn-edit{
  background: #eef4ff;
  border: 1px solid #1a73e8;
  color: #1a73e8;
}

.btn-hapus{
  background: #fff1f0;
  border: 1px solid #d93025;
  color: #d93025;
}
  </style>
</head>
<body>

<div class="sidebar">

  <div class="sidebar-header">

    <div class="logo-icon">
      <img src="logo.png" alt="">
    </div>

    <div class="logo-text">
      Inventaris
      <span>Toko Sembako UM</span>
    </div>

  </div>

  <nav class="nav">

    <div class="nav-label">Menu</div>

    <a class="nav-item" href="../Dashboard/dashboard.html">
      <img src="home (1).png" alt="">
      Beranda
    </a>

    <a class="nav-item active" href="../kategoriPage/kategori.html">
      <img src="boxes.png" alt="">
      Kategori
    </a>

  </nav>

</div>

<div class="main">

  <div class="topbar">

    <div class="topbar-title">
      Sistem Inventaris Toko Sembako Utama Mandiri
    </div>

    <div class="topbar-user">
      Habil Muhammad

      <a href="/LoginPage/login.html" class="btn-logout">
        Logout
      </a>
    </div>

  </div>

  <div class="content">

    <div class="main-title">

      <div class="page-title">
        Kategori Barang
      </div>
    </div>
    <div class="table-container">
     @if ($errors->any())
     <div style="color:red;">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
     @endif
      <table class="tabel">
        <thead>
          <tr>
            <th>#</th>
            <th>ID Kategori</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <form action="{{route('kategori.store')}}" method="post">
            @csrf
            <tr class="form-row">
              <td>#</td>
              <td>
                <input type="text" class="form-input" placeholder="ID Kategori" name="kode_kategori">
              </td>
              <td>
                <input type="text" class="form-input" placeholder="Nama Kategori" name="nama_kategori">
              </td>
              <td>
                <div class="form-aksi">
                  <button class="btn-simpan" type="submit">
                    Simpan
                  </button>
                  <button class="btn-batal" type="reset">
                    Batal
                  </button>
                </div>
              </td>
            </tr>
        </form>
          @foreach ($kategoris as $kategori )
          @if(isset($editKategori) && $editKategori->id == $kategori->id)
             <form action="{{ route('kategori.update', $kategori) }}"
                     method="POST">
                   @csrf
                   @method('PUT')
                   <td>{{ $loop->iteration }}</td>
                   <td>
                       <input type="text"
                              name="kode_kategori"
                              value="{{ $kategori->kode_kategori }}">
                   </td>

                   <td>
                       <input type="text"
                              name="nama_kategori"
                              value="{{ $kategori->nama_kategori }}">
                   </td>
                   <td>
                       <button type="submit">Simpan</button>
                       <a href="{{ route('kategori.index') }}">
                           Batal
                       </a>
                   </td>
               </form>
            </tr>
            @else
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kategori->kode_kategori}}</td>
                <td>{{$kategori->nama_kategori}}</td>
                <td>
                <a href="{{route('kategori.edit', $kategori)}}" class="btn-edit">Edit</a>
                <a href="{{route('kategori.hapus', $kategori)}}" class="btn-hapus">Hapus</a>
                </td>
            </tr>
            @endif
          @endforeach
        </tbody>

      </table>

    </div>

  </div>

</div>

</body>
</html>
