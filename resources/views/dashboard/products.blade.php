@extends('layouts.dashboard')

@section('title', 'Edit Produk - Dashboard')

@section('page-title', 'Produk')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Produk</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            Kelola produk yang ditampilkan di website. Tambah, edit, atau hapus produk.
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Produk</h5>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="bi bi-plus-lg me-1"></i>Tambah Produk Baru
                </button>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <!-- Product Card 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div style="height: 200px; background: linear-gradient(135deg, #FFFBF0 0%, #F5E6D3 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-bag" style="font-size: 3rem; color: #8B6F47;"></i>
                            </div>
                            <div class="card-body">
                                <span class="badge bg-success mb-2">Kerajinan Tangan</span>
                                <h6 class="card-title">Noken Marori</h6>
                                <p class="card-text small text-muted">Tas rajutan tradisional dari serat kulit kayu...</p>
                                <p class="fw-bold text-primary mb-3">Rp 250.000 - Rp 500.000</p>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary flex-fill">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirmDelete('Noken Marori')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 2 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div style="height: 200px; background: linear-gradient(135deg, #FFFBF0 0%, #F5E6D3 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-tree" style="font-size: 3rem; color: #8B6F47;"></i>
                            </div>
                            <div class="card-body">
                                <span class="badge bg-success mb-2">Kerajinan Tangan</span>
                                <h6 class="card-title">Ukiran Kayu Merbau</h6>
                                <p class="card-text small text-muted">Patung dan ukiran dari kayu merbau khas Papua...</p>
                                <p class="fw-bold text-primary mb-3">Rp 350.000 - Rp 2.000.000</p>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary flex-fill">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 3 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div style="height: 200px; background: linear-gradient(135deg, #FFFBF0 0%, #F5E6D3 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-basket" style="font-size: 3rem; color: #8B6F47;"></i>
                            </div>
                            <div class="card-body">
                                <span class="badge bg-warning mb-2">Makanan</span>
                                <h6 class="card-title">Sagu Wasur Organik</h6>
                                <p class="card-text small text-muted">Tepung sagu murni 100% organik hasil panen...</p>
                                <p class="fw-bold text-primary mb-3">Rp 45.000 / kg</p>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary flex-fill">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 4 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div style="height: 200px; background: linear-gradient(135deg, #FFFBF0 0%, #F5E6D3 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-gem" style="font-size: 3rem; color: #8B6F47;"></i>
                            </div>
                            <div class="card-body">
                                <span class="badge bg-info mb-2">Aksesoris</span>
                                <h6 class="card-title">Gelang Kulit Rusa</h6>
                                <p class="card-text small text-muted">Gelang handmade dari kulit rusa asli...</p>
                                <p class="fw-bold text-primary mb-3">Rp 75.000 - Rp 150.000</p>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary flex-fill">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 5 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div style="height: 200px; background: linear-gradient(135deg, #FFFBF0 0%, #F5E6D3 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-palette" style="font-size: 3rem; color: #8B6F47;"></i>
                            </div>
                            <div class="card-body">
                                <span class="badge bg-success mb-2">Kerajinan Tangan</span>
                                <h6 class="card-title">Lukisan Kulit Kayu</h6>
                                <p class="card-text small text-muted">Lukisan motif tradisional di atas kulit kayu...</p>
                                <p class="fw-bold text-primary mb-3">Rp 200.000 - Rp 800.000</p>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary flex-fill">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Card 6 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div style="height: 200px; background: linear-gradient(135deg, #FFFBF0 0%, #F5E6D3 100%); display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-droplet" style="font-size: 3rem; color: #8B6F47;"></i>
                            </div>
                            <div class="card-body">
                                <span class="badge bg-danger mb-2">Kesehatan</span>
                                <h6 class="card-title">Minyak Buah Merah</h6>
                                <p class="card-text small text-muted">Minyak buah merah asli Papua dengan khasiat tinggi...</p>
                                <p class="fw-bold text-primary mb-3">Rp 150.000 / 100ml</p>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary flex-fill">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select">
                                <option>Kerajinan Tangan</option>
                                <option>Makanan</option>
                                <option>Aksesoris</option>
                                <option>Kesehatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="text" class="form-control" placeholder="Rp 100.000 - Rp 500.000" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Icon Bootstrap</label>
                        <input type="text" class="form-control" placeholder="bi bi-bag">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link Shopee (opsional)</label>
                            <input type="url" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link Tokopedia (opsional)</label>
                            <input type="url" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success">Tambah Produk</button>
            </div>
        </div>
    </div>
</div>
@endsection
