@extends('layouts.dashboard')

@section('title', 'Kelola Akun Admin - Dashboard')

@section('page-title', 'Kelola Akun Admin')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Kelola Akun Admin</li>
@endsection

@section('content')
<!-- Success Alert -->
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
    <div class="d-flex align-items-center">
        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
        <div>{{ session('success') }}</div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Error Alert -->
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
    <div class="d-flex align-items-center">
        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
        <div>{{ session('error') }}</div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Validation Errors -->
@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
    <div class="d-flex align-items-start">
        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
        <div>
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Header -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #F8F9FA 0%, #E9ECEF 100%); border: 2px solid rgba(0, 0, 0, 0.08);">
            <div class="card-body p-4" style="color: #1a1a1a;">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="icon-shape bg-dark bg-opacity-10 rounded-circle p-3 me-3" style="color: #1a1a1a;">
                            <i class="bi bi-people-fill fs-4"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 fw-bold">Kelola Akun Admin</h4>
                            <p class="mb-0 text-muted">Total {{ $users->count() }} akun admin</p>
                        </div>
                    </div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Admin
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Admin List -->
<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead style="background-color: #f8f9fa;">
                            <tr>
                                <th class="px-4 py-3" style="width: 50px;">#</th>
                                <th class="py-3">Nama</th>
                                <th class="py-3">Email</th>
                                <th class="py-3">Dibuat</th>
                                <th class="py-3 text-center" style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                            <tr>
                                <td class="px-4">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-primary bg-opacity-10 text-primary me-3">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $user->name }}</div>
                                            @if($user->id === auth()->id())
                                            <small class="badge bg-dark">Anda</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <small class="text-muted">{{ $user->created_at->format('d M Y, H:i') }}</small>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary me-1"
                                            onclick='editUser(@json($user->id), @json($user->name), @json($user->email))'
                                            title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    @if($user->id !== auth()->id() && $users->count() > 1)
                                    <form action="{{ route('dashboard.admin.delete', $user->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus akun {{ $user->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    @else
                                    <button class="btn btn-sm btn-outline-secondary" disabled title="Tidak dapat dihapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                    Belum ada akun admin
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('dashboard.admin.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-person-plus me-2"></i>Tambah Akun Admin
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" required
                               placeholder="Nama Admin">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" name="email" required
                               placeholder="admin@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control" name="password" required
                               placeholder="Minimal 8 karakter">
                        <small class="text-muted">Minimal 8 karakter</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required
                               placeholder="Ulangi password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editUserForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="bi bi-pencil me-2"></i>Edit Akun Admin
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" id="edit_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" name="email" id="edit_email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password Baru</label>
                        <input type="password" class="form-control" name="password" id="edit_password"
                               placeholder="Kosongkan jika tidak ingin mengubah">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="Ulangi password baru">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .icon-shape {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
    }

    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .alert {
        border-left: 4px solid;
    }

    .alert-success {
        border-left-color: #8B0000;
        background-color: #FFE5E5;
    }

    .alert-danger {
        border-left-color: #dc3545;
    }

    .btn-primary {
        background: #8B0000;
        border: 2px solid #8B0000;
        color: white;
    }

    .btn-primary:hover {
        background: #DC143C;
        border-color: #DC143C;
        color: white;
    }
</style>

<script>
function editUser(id, name, email) {
    const form = document.getElementById('editUserForm');
    form.action = `/dashboard/admin/update/${id}`;

    document.getElementById('edit_name').value = name;
    document.getElementById('edit_email').value = email;
    document.getElementById('edit_password').value = '';

    const modal = new bootstrap.Modal(document.getElementById('editUserModal'));
    modal.show();
}
</script>
@endsection
