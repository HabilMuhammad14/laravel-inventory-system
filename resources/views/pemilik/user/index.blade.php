@extends('layouts.app')
@section('title', 'Kelola User')
@section('page-title', 'Kelola User')

@section('content')
<div class="page-header">
    <h1>Kelola User</h1>
    <p>Tambah dan kelola akun pegawai yang dapat mengakses sistem.</p>
</div>

<div class="card">
    <div class="card-header">
        <span class="card-title">Daftar Pengguna</span>
        <button class="btn btn-primary btn-sm" onclick="openModal('modalTambah')">+ Tambah User</button>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID User</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $i => $u)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $u->id_pengguna }}</td>
                    <td>{{ $u->nama ?? '-' }}</td>
                    <td>{{ $u->username }}</td>
                    <td>
                        <span class="badge {{ $u->role === 'pemilik' ? 'badge-blue' : 'badge-green' }}">
                            {{ ucfirst($u->role) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge {{ ($u->status ?? 'aktif') === 'aktif' ? 'badge-green' : 'badge-gray' }}">
                            {{ ucfirst($u->status ?? 'Aktif') }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm"
                                onclick="openModalEdit(
                                    '{{ $u->id_pengguna }}',
                                    '{{ addslashes($u->nama ?? '') }}',
                                    '{{ $u->username }}',
                                    '{{ $u->role }}',
                                    '{{ $u->status ?? 'aktif' }}'
                                )">Edit</button>
                            @if(auth()->user()->id_pengguna !== $u->id_pengguna)
                            <form action="{{ route('pemilik.user.destroy', $u->id_pengguna) }}" method="POST"
                                  onsubmit="return confirm('Hapus user ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" style="text-align:center; color:#64748B; padding:24px;">Belum ada data user.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal-backdrop" id="modalTambah">
    <div class="modal">
        <div class="modal-header">
            <span class="modal-title">Tambah User</span>
            <button class="modal-close" onclick="closeModal('modalTambah')">×</button>
        </div>
        <form action="{{ route('pemilik.user.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" required/>
            </div>
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username untuk login" required/>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="pegawai">Pegawai</option>
                        <option value="pemilik">Pemilik</option>
                    </select>
                </div>
            </div>
            <div class="btn-group" style="justify-content:flex-end; margin-top:6px;">
                <button type="button" class="btn btn-secondary" onclick="closeModal('modalTambah')">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal-backdrop" id="modalEdit">
    <div class="modal">
        <div class="modal-header">
            <span class="modal-title">Edit User</span>
            <button class="modal-close" onclick="closeModal('modalEdit')">×</button>
        </div>
        <form id="formEdit" action="" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" id="edit_nama" name="nama" class="form-control" required/>
            </div>
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" id="edit_username" name="username" class="form-control" required/>
            </div>
            <div class="form-group">
                <label class="form-label">Password Baru <span style="color:#94A3B8;">(kosongkan jika tidak diubah)</span></label>
                <input type="password" name="password" class="form-control" placeholder="Password baru"/>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Role</label>
                    <select id="edit_role" name="role" class="form-control" required>
                        <option value="pegawai">Pegawai</option>
                        <option value="pemilik">Pemilik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select id="edit_status" name="status" class="form-control" required>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="btn-group" style="justify-content:flex-end; margin-top:6px;">
                <button type="button" class="btn btn-secondary" onclick="closeModal('modalEdit')">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
function openModalEdit(id, nama, username, role, status) {
    document.getElementById('edit_nama').value = nama;
    document.getElementById('edit_username').value = username;
    document.getElementById('edit_role').value = role;
    document.getElementById('edit_status').value = status;
    document.getElementById('formEdit').action = '/pemilik/user/' + id;
    openModal('modalEdit');
}
</script>
@endpush
