@extends('layouts.dashboard')

@section('title', 'Edit Budaya - Dashboard')

@section('page-title', 'Budaya')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Budaya</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            Kelola item-item budaya yang ditampilkan di website. Item diurutkan dari yang paling lama ditambahkan.
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Item Budaya ({{ $cultures->count() }} items)</h5>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addCultureModal">
                    <i class="bi bi-plus-lg me-1"></i>Tambah Item Baru
                </button>
            </div>
            <div class="card-body">
                @if($cultures->isEmpty())
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        Belum ada item budaya. Klik "Tambah Item Baru" untuk menambahkan.
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">Foto</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th style="width: 150px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cultures as $culture)
                                <tr>
                                    <td>
                                        @if($culture->image)
                                            <img src="{{ asset($culture->image) }}" alt="{{ $culture->title }}"
                                                 class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                                        @else
                                            <div class="bg-secondary d-flex align-items-center justify-content-center"
                                                 style="width: 80px; height: 80px; border-radius: 8px;">
                                                <i class="bi bi-image text-white" style="font-size: 2rem;"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $culture->title }}</strong>
                                        @if($culture->description)
                                            <br><small class="text-muted">{{ Str::limit($culture->description, 60) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $culture->category }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                                data-bs-target="#editCultureModal{{ $culture->id }}" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <form action="{{ route('dashboard.culture.destroy', $culture) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Yakin ingin menghapus {{ $culture->title }}?')" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Modal for each culture -->
                                <div class="modal fade" id="editCultureModal{{ $culture->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <form action="{{ route('dashboard.culture.update', $culture) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Item Budaya</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Judul <span class="text-danger">*</span></label>
                                                            <input type="text" name="title" class="form-control"
                                                                   value="{{ $culture->title }}" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                                                            <input type="text" name="category" class="form-control"
                                                                   value="{{ $culture->category }}" placeholder="Kesenian, Budaya, dll" required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Foto</label>
                                                        <input type="file" name="image" class="form-control" accept="image/*">
                                                        @if($culture->image)
                                                            <div class="mt-3">
                                                                <p class="text-muted mb-2">Foto saat ini:</p>
                                                                <img src="{{ asset($culture->image) }}" alt="{{ $culture->title }}"
                                                                     class="img-thumbnail" style="max-width: 300px;">
                                                            </div>
                                                        @endif
                                                        <small class="text-muted">Kosongkan jika tidak ingin mengubah foto</small>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Deskripsi</label>
                                                        <textarea name="description" class="form-control" rows="4">{{ $culture->description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="bi bi-save me-1"></i>Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Add Culture Modal -->
<div class="modal fade" id="addCultureModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('dashboard.culture.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Item Budaya Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control"
                                   placeholder="Tari Kreasi" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="form-control"
                                   placeholder="Kesenian, Budaya, Arsitektur, dll" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto <span class="text-danger">*</span></label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4"
                                  placeholder="Deskripsi singkat tentang item budaya ini..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus-lg me-1"></i>Tambah Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
