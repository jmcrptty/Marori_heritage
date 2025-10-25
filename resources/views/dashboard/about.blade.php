@extends('layouts.dashboard')

@section('title', 'Edit Tentang Kami - Dashboard')

@section('page-title', 'Tentang Kami')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Tentang Kami</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            Edit konten section Tentang Kami yang menjelaskan profil Suku Marori
        </div>
    </div>
</div>

<form action="#" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Header Section</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Badge</label>
                        <input type="text" class="form-control" name="badge" value="Tentang Kami" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Judul Section</label>
                        <input type="text" class="form-control" name="title" value="Penjaga Hutan Wasur" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Subtitle</label>
                        <textarea class="form-control" name="subtitle" rows="2" required>Mengenal lebih dekat kehidupan, tradisi, dan visi masyarakat Suku Marori dalam melestarikan budaya Papua</textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Konten Utama</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Judul "Siapa Kami?"</label>
                        <input type="text" class="form-control" name="who_title" value="Siapa Kami?" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Paragraf 1</label>
                        <textarea class="form-control" name="who_paragraph1" rows="4" required oninput="updateCharCount(this, 'p1-count')">Suku Marori adalah masyarakat adat asli Papua yang telah mendiami kawasan Taman Nasional Wasur di Merauke, Papua Selatan selama ribuan tahun. Kami adalah penjaga hutan dan savana yang hidup harmonis dengan alam, menjaga keseimbangan ekosistem dengan kearifan lokal yang diwariskan turun-temurun.</textarea>
                        <small class="text-muted" id="p1-count">0 karakter</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Paragraf 2</label>
                        <textarea class="form-control" name="who_paragraph2" rows="4" required>Kehidupan kami sangat bergantung pada hutan Wasur yang kaya akan keanekaragaman hayati. Dari hutan ini, kami memperoleh bahan makanan, obat-obatan tradisional, dan material untuk kerajinan tangan yang menjadi sumber penghidupan masyarakat.</textarea>
                    </div>

                    <hr class="my-4">

                    <div class="mb-4">
                        <label class="form-label">Judul "Visi & Misi"</label>
                        <input type="text" class="form-control" name="vision_title" value="Visi & Misi Kami" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Visi</label>
                        <textarea class="form-control" name="vision_text" rows="3" required>Kami berkomitmen untuk menjaga kelestarian budaya Marori sambil mengembangkan ekonomi masyarakat melalui produk berkualitas tinggi yang ramah lingkungan dan berkelanjutan.</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Misi</label>
                        <textarea class="form-control" name="mission_text" rows="3" required>Melalui produksi kerajinan tangan dan produk lokal, kami memberdayakan masyarakat adat untuk memiliki kehidupan yang lebih baik tanpa meninggalkan akar budaya dan tradisi leluhur.</textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Statistik</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Stat 1 - Angka</label>
                            <input type="text" class="form-control" name="stat1_number" value="1000" required>
                            <label class="form-label mt-2">Label</label>
                            <input type="text" class="form-control" name="stat1_label" value="Tahun Sejarah" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Stat 2 - Angka</label>
                            <input type="text" class="form-control" name="stat2_number" value="500" required>
                            <label class="form-label mt-2">Label</label>
                            <input type="text" class="form-control" name="stat2_label" value="Keluarga" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Stat 3 - Angka</label>
                            <input type="text" class="form-control" name="stat3_number" value="50" required>
                            <label class="form-label mt-2">Label</label>
                            <input type="text" class="form-control" name="stat3_label" value="Pengrajin" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Gambar</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Upload Gambar Masyarakat</label>
                        <input type="file" class="form-control" name="about_image" accept="image/*" onchange="previewImage(this, 'about-preview')">
                        <small class="text-muted">Ukuran rekomendasi: 800x600px</small>
                    </div>
                    <div class="text-center">
                        <img id="about-preview" src="https://via.placeholder.com/600x450/FFF8E7/8B6F47?text=Masyarakat+Suku+Marori" alt="Preview" class="img-fluid rounded" style="max-height: 300px;">
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-2"></i>Simpan Perubahan
                </button>
                <button type="button" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-clockwise me-2"></i>Reset
                </button>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Preview Stats</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <div style="background: #FFF8E7; padding: 1rem; border-radius: 8px; text-align: center;">
                                <h3 style="color: #8B6F47; font-size: 2rem; margin-bottom: 0.25rem;">1000+</h3>
                                <p style="color: #6D5D4F; font-size: 0.85rem; margin: 0;">Tahun Sejarah</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div style="background: #FFF8E7; padding: 1rem; border-radius: 8px; text-align: center;">
                                <h3 style="color: #8B6F47; font-size: 2rem; margin-bottom: 0.25rem;">500+</h3>
                                <p style="color: #6D5D4F; font-size: 0.85rem; margin: 0;">Keluarga</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div style="background: #FFF8E7; padding: 1rem; border-radius: 8px; text-align: center;">
                                <h3 style="color: #8B6F47; font-size: 2rem; margin-bottom: 0.25rem;">50+</h3>
                                <p style="color: #6D5D4F; font-size: 0.85rem; margin: 0;">Pengrajin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Tips Konten</h5>
                </div>
                <div class="card-body">
                    <ul class="mb-0" style="font-size: 0.9rem; line-height: 1.8;">
                        <li>Ceritakan sejarah dengan jelas</li>
                        <li>Gunakan bahasa yang mudah dipahami</li>
                        <li>Tampilkan angka statistik yang menarik</li>
                        <li>Gunakan foto berkualitas tinggi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
