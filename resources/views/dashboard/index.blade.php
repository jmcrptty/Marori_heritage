@extends('layouts.dashboard')

@section('title', 'Dashboard - Suku Marori Wasur')

@section('page-title', 'Dashboard Overview')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stats-card">
            <div class="stats-icon primary">
                <i class="bi bi-star"></i>
            </div>
            <div class="stats-content">
                <h3>1</h3>
                <p>Hero Section</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stats-card">
            <div class="stats-icon success">
                <i class="bi bi-book"></i>
            </div>
            <div class="stats-content">
                <h3>6</h3>
                <p>Item Budaya</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stats-card">
            <div class="stats-icon warning">
                <i class="bi bi-box-seam"></i>
            </div>
            <div class="stats-content">
                <h3>6</h3>
                <p>Produk Aktif</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stats-card">
            <div class="stats-icon info">
                <i class="bi bi-eye"></i>
            </div>
            <div class="stats-content">
                <h3>1,234</h3>
                <p>Total Visitor</p>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <a href="{{ route('dashboard.hero') }}" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2" style="padding: 1.25rem;">
                            <i class="bi bi-star" style="font-size: 1.5rem;"></i>
                            <span>Edit Hero Section</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('dashboard.products') }}" class="btn btn-outline-success w-100 d-flex align-items-center justify-content-center gap-2" style="padding: 1.25rem;">
                            <i class="bi bi-plus-circle" style="font-size: 1.5rem;"></i>
                            <span>Tambah Produk</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-info w-100 d-flex align-items-center justify-content-center gap-2" style="padding: 1.25rem;">
                            <i class="bi bi-eye" style="font-size: 1.5rem;"></i>
                            <span>Lihat Website</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Management Overview -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Content Management</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Section</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <i class="bi bi-star me-2"></i>
                                    <strong>Hero Section</strong>
                                </td>
                                <td><span class="badge bg-success">Published</span></td>
                                <td><small class="text-muted">2 hari yang lalu</small></td>
                                <td>
                                    <a href="{{ route('dashboard.hero') }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="bi bi-info-circle me-2"></i>
                                    <strong>Tentang Kami</strong>
                                </td>
                                <td><span class="badge bg-success">Published</span></td>
                                <td><small class="text-muted">5 hari yang lalu</small></td>
                                <td>
                                    <a href="{{ route('dashboard.about') }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="bi bi-book me-2"></i>
                                    <strong>Budaya</strong>
                                </td>
                                <td><span class="badge bg-success">6 Items</span></td>
                                <td><small class="text-muted">1 minggu yang lalu</small></td>
                                <td>
                                    <a href="{{ route('dashboard.culture') }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i> Kelola
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="bi bi-box-seam me-2"></i>
                                    <strong>Produk</strong>
                                </td>
                                <td><span class="badge bg-warning">6 Items</span></td>
                                <td><small class="text-muted">3 hari yang lalu</small></td>
                                <td>
                                    <a href="{{ route('dashboard.products') }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i> Kelola
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <i class="bi bi-telephone me-2"></i>
                                    <strong>Kontak</strong>
                                </td>
                                <td><span class="badge bg-success">Published</span></td>
                                <td><small class="text-muted">1 bulan yang lalu</small></td>
                                <td>
                                    <a href="{{ route('dashboard.contact') }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title">Recent Activity</h5>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="d-flex gap-3 mb-3">
                        <div class="flex-shrink-0">
                            <div style="width: 36px; height: 36px; background: rgba(74, 124, 89, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-pencil text-success"></i>
                            </div>
                        </div>
                        <div>
                            <p class="mb-1" style="font-size: 0.9rem;"><strong>Hero Section</strong> diupdate</p>
                            <small class="text-muted">2 hari yang lalu</small>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mb-3">
                        <div class="flex-shrink-0">
                            <div style="width: 36px; height: 36px; background: rgba(255, 193, 7, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-plus-circle text-warning"></i>
                            </div>
                        </div>
                        <div>
                            <p class="mb-1" style="font-size: 0.9rem;">Produk baru <strong>ditambahkan</strong></p>
                            <small class="text-muted">3 hari yang lalu</small>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <div class="flex-shrink-0">
                            <div style="width: 36px; height: 36px; background: rgba(92, 64, 51, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-trash" style="color: #5C4033;"></i>
                            </div>
                        </div>
                        <div>
                            <p class="mb-1" style="font-size: 0.9rem;">Item budaya <strong>dihapus</strong></p>
                            <small class="text-muted">1 minggu yang lalu</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">System Info</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <small class="text-muted">Version</small>
                    <p class="mb-0"><strong>1.0.0</strong></p>
                </div>
                <div class="mb-3">
                    <small class="text-muted">Last Backup</small>
                    <p class="mb-0"><strong>1 Jan 2025</strong></p>
                </div>
                <div>
                    <small class="text-muted">Storage Used</small>
                    <p class="mb-2"><strong>245 MB / 1 GB</strong></p>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 24.5%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
