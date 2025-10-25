@extends('layouts.dashboard')

@section('title', 'Edit Hero Section - Dashboard')

@section('page-title', 'Hero Section')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Hero Section</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            Edit konten hero section yang tampil di halaman utama website
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ route('dashboard.hero.update') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Konten Hero</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Badge Text</label>
                        <input type="text" class="form-control" name="badge" value="{{ old('badge', $hero->badge ?? 'Papua Heritage') }}" required>
                        <small class="text-muted">Text badge kecil di atas judul</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Judul Utama</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title', $hero->title ?? 'Suku Marori Wasur') }}" required maxlength="200">
                        <small class="text-muted">Maksimal 200 karakter</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Subtitle</label>
                        <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle', $hero->subtitle ?? 'Melestarikan Budaya, Memberdayakan Ekonomi') }}" required maxlength="300">
                        <small class="text-muted">Maksimal 300 karakter</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" required rows="4">{{ old('description', $hero->description ?? 'Warisan leluhur dari hutan Wasur untuk Indonesia. Bergabunglah dalam perjalanan kami menjaga tradisi dan memberdayakan masyarakat adat Papua.') }}</textarea>
                        <small class="text-muted">Deskripsi hero section</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tombol Primary Text</label>
                            <input type="text" class="form-control" name="btn_primary_text" value="{{ old('btn_primary_text', $hero->btn_primary_text ?? 'Jelajahi Produk') }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tombol Primary Link</label>
                            <input type="text" class="form-control" name="btn_primary_link" value="{{ old('btn_primary_link', $hero->btn_primary_link ?? '#produk') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tombol Secondary Text</label>
                            <input type="text" class="form-control" name="btn_secondary_text" value="{{ old('btn_secondary_text', $hero->btn_secondary_text ?? 'Kenali Kami') }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Tombol Secondary Link</label>
                            <input type="text" class="form-control" name="btn_secondary_link" value="{{ old('btn_secondary_link', $hero->btn_secondary_link ?? '#tentang') }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Background Image</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Upload Gambar Background</label>
                        <input type="file" class="form-control" name="background_image" accept="image/*" onchange="previewImage(this, 'bg-preview')">
                        <small class="text-muted">Ukuran rekomendasi: 1920x1080px, Format: JPG/PNG, Max: 2MB</small>
                    </div>
                    @if(isset($hero) && $hero->background_image)
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini:</label>
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $hero->background_image) }}" alt="Current Background" class="img-fluid rounded" style="max-height: 200px;">
                        </div>
                    </div>
                    @endif
                    <div class="text-center">
                        <label class="form-label">Preview Gambar Baru:</label>
                        <img id="bg-preview" src="" alt="Preview" class="img-fluid rounded" style="max-height: 300px; display: none;">
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mb-3">
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-2"></i>Simpan Perubahan
                </button>
                <a href="{{ route('dashboard.hero') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-clockwise me-2"></i>Reset
                </a>
                <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-primary">
                    <i class="bi bi-eye me-2"></i>Lihat Website
                </a>
            </div>
        </form>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Preview</h5>
            </div>
            <div class="card-body">
                <div class="preview-box" style="background: linear-gradient(135deg, #FFFBF0 0%, #F5E6D3 100%); padding: 2rem; border-radius: 8px; text-align: center;">
                    <span id="preview-badge" style="display: inline-block; background: rgba(74, 124, 89, 0.12); color: #4A7C59; padding: 6px 16px; border-radius: 50px; font-size: 0.75rem; margin-bottom: 1rem; border: 1px solid rgba(74, 124, 89, 0.25);">{{ $hero->badge ?? 'Papua Heritage' }}</span>
                    <h2 id="preview-title" style="font-size: 1.75rem; color: #5C4033; margin-bottom: 0.75rem;">{{ $hero->title ?? 'Suku Marori Wasur' }}</h2>
                    <p id="preview-subtitle" style="font-size: 0.95rem; color: #6D5D4F; margin-bottom: 0.5rem;">{{ $hero->subtitle ?? 'Melestarikan Budaya, Memberdayakan Ekonomi' }}</p>
                    <p id="preview-description" style="font-size: 0.85rem; color: #6D5D4F; margin-bottom: 1.5rem;">{{ Str::limit($hero->description ?? 'Warisan leluhur dari hutan Wasur...', 80) }}</p>
                    <div style="display: flex; gap: 0.5rem; justify-content: center; flex-wrap: wrap;">
                        <button id="preview-btn-primary" style="background: #5C4033; color: white; border: none; padding: 0.5rem 1.5rem; border-radius: 50px; font-size: 0.85rem;">{{ $hero->btn_primary_text ?? 'Jelajahi Produk' }}</button>
                        <button id="preview-btn-secondary" style="background: #4A7C59; color: white; border: none; padding: 0.5rem 1.5rem; border-radius: 50px; font-size: 0.85rem;">{{ $hero->btn_secondary_text ?? 'Kenali Kami' }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Tips</h5>
            </div>
            <div class="card-body">
                <ul class="mb-0" style="font-size: 0.9rem; line-height: 1.8;">
                    <li>Gunakan judul yang singkat dan menarik</li>
                    <li>Deskripsi maksimal 2-3 kalimat</li>
                    <li>Background image harus berkualitas tinggi</li>
                    <li>Pastikan teks mudah dibaca</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Live Preview Updates
    document.addEventListener('DOMContentLoaded', function() {
        // Badge preview
        document.querySelector('input[name="badge"]').addEventListener('input', function(e) {
            document.getElementById('preview-badge').textContent = e.target.value;
        });

        // Title preview
        document.querySelector('input[name="title"]').addEventListener('input', function(e) {
            document.getElementById('preview-title').textContent = e.target.value;
        });

        // Subtitle preview
        document.querySelector('input[name="subtitle"]').addEventListener('input', function(e) {
            document.getElementById('preview-subtitle').textContent = e.target.value;
        });

        // Description preview
        document.querySelector('textarea[name="description"]').addEventListener('input', function(e) {
            const text = e.target.value;
            const limit = 80;
            document.getElementById('preview-description').textContent =
                text.length > limit ? text.substring(0, limit) + '...' : text;
        });

        // Primary button preview
        document.querySelector('input[name="btn_primary_text"]').addEventListener('input', function(e) {
            document.getElementById('preview-btn-primary').textContent = e.target.value;
        });

        // Secondary button preview
        document.querySelector('input[name="btn_secondary_text"]').addEventListener('input', function(e) {
            document.getElementById('preview-btn-secondary').textContent = e.target.value;
        });
    });

    // Image Preview Function
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
