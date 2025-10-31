@extends('layouts.dashboard')

@section('title', 'Dashboard - Suku Marori Wasur')

@section('page-title', 'Dashboard Overview')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="alert alert-info mb-4">
    <i class="bi bi-info-circle me-2"></i>
    <strong>Dashboard Overview</strong> - Kelola semua konten website dari sini
</div>

<!-- Section Previews -->
<div class="row g-4">
    <!-- Hero Section -->
    <div class="col-lg-6">
        <div class="section-preview-card">
            <div class="section-preview-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="section-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="bi bi-star"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Hero Section</h5>
                        <small class="text-muted">Bagian utama halaman website</small>
                    </div>
                </div>
                <a href="{{ route('dashboard.hero') }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
            <div class="section-preview-body">
                <div class="preview-content">
                    <div class="preview-icon">
                        <i class="bi bi-star"></i>
                    </div>
                    <div class="preview-stats">
                        @if($stats['hero'] > 0)
                            <span class="badge bg-success">Sudah dikonfigurasi</span>
                            <p class="text-muted mt-2 mb-0">Hero section telah diatur dengan gambar dan konten</p>
                        @else
                            <span class="badge bg-warning">Belum dikonfigurasi</span>
                            <p class="text-muted mt-2 mb-0">Hero section belum diatur</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Culture Section -->
    <div class="col-lg-6">
        <div class="section-preview-card">
            <div class="section-preview-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="section-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <i class="bi bi-book"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Budaya</h5>
                        <small class="text-muted">Kelola item budaya Suku Marori</small>
                    </div>
                </div>
                <a href="{{ route('dashboard.culture') }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i> Kelola
                </a>
            </div>
            <div class="section-preview-body">
                <div class="preview-content">
                    <div class="preview-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <div class="preview-stats">
                        <h2 class="mb-1">{{ $stats['culture_items'] }}</h2>
                        <p class="text-muted mb-0">Item budaya yang terdaftar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="col-lg-6">
        <div class="section-preview-card">
            <div class="section-preview-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="section-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Produk</h5>
                        <small class="text-muted">Kelola produk lokal</small>
                    </div>
                </div>
                <a href="{{ route('dashboard.products') }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i> Kelola
                </a>
            </div>
            <div class="section-preview-body">
                <div class="preview-content">
                    <div class="preview-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="preview-stats">
                        <h2 class="mb-1">{{ $stats['products'] }}</h2>
                        <p class="text-muted mb-0">Produk lokal yang terdaftar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Researchers Section -->
    <div class="col-lg-6">
        <div class="section-preview-card">
            <div class="section-preview-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="section-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                        <i class="bi bi-people"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Tim Peneliti</h5>
                        <small class="text-muted">Kelola profil tim peneliti</small>
                    </div>
                </div>
                <a href="{{ route('dashboard.researchers') }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i> Kelola
                </a>
            </div>
            <div class="section-preview-body">
                <div class="preview-content">
                    <div class="preview-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="preview-stats">
                        <h2 class="mb-1">{{ $stats['researchers'] }}</h2>
                        <p class="text-muted mb-0">Anggota tim peneliti</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Media Gallery Section -->
    <div class="col-lg-6">
        <div class="section-preview-card">
            <div class="section-preview-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="section-icon" style="background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);">
                        <i class="bi bi-images"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Galeri Media</h5>
                        <small class="text-muted">Kelola foto dan video</small>
                    </div>
                </div>
                <a href="{{ route('dashboard.media') }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i> Kelola
                </a>
            </div>
            <div class="section-preview-body">
                <div class="preview-content">
                    <div class="preview-icon">
                        <i class="bi bi-images"></i>
                    </div>
                    <div class="preview-stats">
                        <h2 class="mb-1">{{ $stats['total_media'] }}</h2>
                        <p class="text-muted mb-0">Total media ({{ $stats['videos'] }} video, {{ $stats['photos'] }} foto)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="col-lg-6">
        <div class="section-preview-card">
            <div class="section-preview-header">
                <div class="d-flex align-items-center gap-3">
                    <div class="section-icon" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div>
                        <h5 class="mb-1">Kontak</h5>
                        <small class="text-muted">Kelola informasi kontak</small>
                    </div>
                </div>
                <a href="{{ route('dashboard.contact') }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
            <div class="section-preview-body">
                <div class="preview-content">
                    <div class="preview-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div class="preview-stats">
                        @if($stats['contact'] > 0)
                            <span class="badge bg-success">Sudah dikonfigurasi</span>
                            <p class="text-muted mt-2 mb-0">Informasi kontak, sosial media, dan lokasi telah diatur</p>
                        @else
                            <span class="badge bg-warning">Belum dikonfigurasi</span>
                            <p class="text-muted mt-2 mb-0">Informasi kontak belum diatur</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.section-preview-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.06);
}

.section-preview-card:hover {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
    transform: translateY(-2px);
}

.section-preview-header {
    padding: 20px;
    background: #f8f9fa;
    border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.section-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    flex-shrink: 0;
}

.section-preview-header h5 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #2c3e50;
}

.section-preview-body {
    padding: 0;
    min-height: 180px;
}

.preview-content {
    height: 180px;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 15px;
    padding: 20px;
}

.preview-icon {
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: #495057;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.preview-stats {
    text-align: center;
}

.preview-stats h2 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0;
}

.preview-stats p {
    font-size: 0.9rem;
    margin: 0;
}

.preview-stats .badge {
    font-size: 0.85rem;
    padding: 6px 12px;
    font-weight: 600;
}

@media (max-width: 991px) {
    .section-preview-card {
        margin-bottom: 1rem;
    }

    .preview-stats h2 {
        font-size: 2rem;
    }
}
</style>
@endsection
