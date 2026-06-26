<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventaris - Supplier</title>
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
  font-weight: normal;
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
  transition: 0.2s;
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
  overflow: hidden;
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
  font-size: 13px;
}

.content{
  padding: 20px;
  overflow-y: auto;
}

.main-title{
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 15px;
}

.page-title{
  font-size: 42px;
  font-weight: 300;
  color: #666;
}

.btn-tambah{
  padding: 9px 16px;
  background: #1a73e8;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 13px;
  transition: 0.2s;
}

.btn-tambah:hover{
  background: #1665cc;
}

.table-container{
  background: white;
  border: 1px solid #e5e5e5;
  border-radius: 4px;
  padding: 12px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.05);
  overflow-x: auto;
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
  padding: 12px;
  text-align: left;
  font-weight: 500;
  color: #777;
  border-bottom: 1px solid #eaeaea;
  white-space: nowrap;
}

.tabel td{
  padding: 10px 12px;
  border-bottom: 1px solid #f0f0f0;
  color: #444;
  white-space: nowrap;
  vertical-align: middle;
}

.tabel tbody tr:hover{
  background: #fafcff;
}

.input-row{
  background: #f8fbff;
}

.input-row input{
  width: 100%;
  padding: 6px 8px;
  border: 1px solid #d8d8d8;
  border-radius: 3px;
  font-size: 12px;
  outline: none;
  height: 32px;
}

.input-row input:focus{
  border-color: #1a73e8;
}

.btn-simpan{
  padding: 6px 10px;
  background: #1a73e8;
  border: none;
  color: white;
  border-radius: 3px;
  cursor: pointer;
  font-size: 12px;
}

.btn-simpan:hover{
  background: #1665cc;
}

.btn-edit,
.btn-hapus{
  display: inline-block;
  padding: 4px 9px;
  font-size: 12px;
  text-decoration: none;
  border-radius: 3px;
  transition: 0.2s;
}

.btn-edit{
  background: #eef4ff;
  border: 1px solid #1a73e8;
  color: #1a73e8;
}

.btn-edit:hover{
  background: #1a73e8;
  color: white;
}

.btn-hapus{
  background: #fff1f0;
  border: 1px solid #d93025;
  color: #d93025;
}

.btn-hapus:hover{
  background: #d93025;
  color: white;
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
  transition: 0.2s;
}

.btn-logout:hover{
  background: white;
  color: #1a73e8;
}
.error-text{
  display:block;
  color:#d93025;
  font-size:11px;
  margin-top:4px;
}

.input-error{
  border-color:#d93025 !important;
  background:#fff5f5;
}
  </style>
</head>
<body>

  <div class="sidebar">

    <div class="sidebar-header">

      <div class="logo-icon">
        <img src="logo.png" alt="Logo">
      </div>

      <div class="logo-text">
        Inventaris
        <span>Toko Sembako UM</span>
      </div>

    </div>

    <nav class="nav">

      <div class="nav-label">Menu</div>


      <a class="nav-item " href="../Dashboard/dashboard.html">
        <img src="home (1).png" alt="">
        Beranda
      </a>

      <a class="nav-item" href="../barangPage/barang.html">
        <img src="boxes.png" alt="">
        Barang
      </a>

      <a class="nav-item" href="../TransaksiPage/TransaksiMasuk/transaksi.html" alt="">
        <img src="transaction.png" alt="">
        Transaksi
      </a>

      <a class="nav-item active" href="../supplierPage/supplier.html">
        <img src="supplier.png" alt="../supplierPage/supplier.html">
        Supplier
      </a>

      <a class="nav-item" href="../laporanStokPage/stok.html">
        <img src="stock.png" alt="../laporanStokPage/stok.html">
        Laporan Stok
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
          Supplier
        </div>

        <!-- <button class="btn-tambah">
          + Tambah Supplier
        </button> -->

      </div>

      <div class="table-container">
         @if ($errors->any())
         <div style="
             background:#fff1f0;
             border:1px solid #d93025;
             color:#d93025;
             padding:12px;
             border-radius:4px;
             margin-bottom:15px;
         ">
             <ul style="margin-left:18px;">
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
              <th>ID Supplier</th>
              <th>Nama Supplier</th>
              <th>Alamat</th>
              <th>No Telepon</th>
              <th>Aksi</th>
            </tr>

          </thead>
          <tbody>
            <form action="{{route('supplier.store')}}" method="post">
            @csrf
            <tr class="input-row">
              <td>#</td>
              <td>
                <input type="text" placeholder="SUP011" name="id_supplier">
              </td>
              <td>
                <input type="text" placeholder="Nama Supplier" name="nama_supplier">
              </td>
              <td>
                <input type="text" placeholder="Alamat Supplier" name="alamat">
              </td>
              <td>
                <input type="text" placeholder="08xxxxxxxxxx" name="no_telepon">
              </td>
              <td>
                <button class="btn-simpan" type="submit">
                  Simpan
                </button>
              </td>
            </form>
        </tr>
            @foreach ($suppliers as $supplier)
           @if (isset($editSupplier) && $editSupplier->id == $supplier->id)

           <form action="{{ route('supplier.update', $supplier) }}"
                 method="POST">
               @csrf
               @method('PUT')

           <tr class="input-row">
               <td>{{ $loop->iteration }}</td>

               <td>
                   <input
                       type="text"
                       name="id_supplier"
                       value="{{ old('id_supplier', $supplier->id_supplier) }}"
                       class="{{ $errors->has('id_supplier') ? 'input-error' : '' }}"
                   >

                   @error('id_supplier')
                       <span class="error-text">{{ $message }}</span>
                   @enderror
               </td>

               <td>
                   <input
                       type="text"
                       name="nama_supplier"
                       value="{{ old('nama_supplier', $supplier->nama_supplier) }}"
                       class="{{ $errors->has('nama_supplier') ? 'input-error' : '' }}"
                   >

                   @error('nama_supplier')
                       <span class="error-text">{{ $message }}</span>
                   @enderror
               </td>

               <td>
                   <input
                       type="text"
                       name="alamat"
                       value="{{ old('alamat', $supplier->alamat) }}"
                       class="{{ $errors->has('alamat') ? 'input-error' : '' }}"
                   >

                   @error('alamat')
                       <span class="error-text">{{ $message }}</span>
                   @enderror
               </td>

               <td>
                   <input
                       type="text"
                       name="no_telepon"
                       value="{{ old('no_telepon', $supplier->no_telepon) }}"
                       class="{{ $errors->has('no_telepon') ? 'input-error' : '' }}"
                   >

                   @error('no_telepon')
                       <span class="error-text">{{ $message }}</span>
                   @enderror
               </td>

               <td>
                   <button type="submit" class="btn-simpan">
                       Simpan
                   </button>

                   <a href="{{ route('supplier.index') }}"
                      class="btn-hapus">
                       Batal
                   </a>
               </td>
           </tr>

           </form>

           @else

           <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $supplier->id_supplier }}</td>
               <td>{{ $supplier->nama_supplier }}</td>
               <td>{{ $supplier->alamat }}</td>
               <td>{{ $supplier->no_telepon }}</td>

               <td>
                   <a href="{{ route('supplier.edit', $supplier) }}"
                      class="btn-edit">
                       Edit
                   </a>

                   <a href="{{ route('supplier.hapus', $supplier) }}"
                      class="btn-hapus">
                       Hapus
                   </a>
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
