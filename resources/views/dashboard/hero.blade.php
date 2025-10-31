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
                    @if(isset($hero) && $hero->background_image)
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label>
                        <div class="border rounded p-2 bg-light" style="max-width: 400px;">
                            <img src="{{ asset('storage/' . $hero->background_image) }}" alt="Current Background" class="img-fluid rounded" style="aspect-ratio: 16/9; object-fit: cover;">
                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Upload Gambar Baru (Opsional)</label>
                        <input type="file" id="hero_image_input" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB.</small>
                    </div>

                    <div id="hero_crop_container" style="display: none;">
                        <div class="alert alert-info mb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Ukuran Rekomendasi:</strong> Aspect Ratio 16:9 (Landscape). Foto akan ditampilkan dengan rasio ini di hero section.
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Crop Foto</label>
                                    <div class="crop-preview-container">
                                        <img id="hero_crop_image" style="max-width: 100%; display: block;">
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="resetHeroCrop()">
                                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="rotateHeroImage(-90)">
                                        <i class="bi bi-arrow-counterclockwise"></i> Putar Kiri
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="rotateHeroImage(90)">
                                        <i class="bi bi-arrow-clockwise"></i> Putar Kanan
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Preview Hero</label>
                                <div class="hero-preview-card">
                                    <div class="hero-preview-section" id="hero_preview_section">
                                        <canvas id="hero_preview_canvas" style="display: none;"></canvas>
                                        <div class="hero-preview-content">
                                            <span class="hero-preview-badge" id="preview-badge-crop">{{ strtoupper($hero->badge ?? 'WARISAN BUDAYA') }}</span>
                                            <h1 class="hero-preview-title" id="preview-title-crop">{{ $hero->title ?? 'Suku Marori Wasur' }}</h1>
                                            <p class="hero-preview-description" id="preview-description-crop">{{ Str::limit($hero->description ?? 'Warisan leluhur dari hutan Wasur untuk Indonesia.', 60) }}</p>
                                            <div class="hero-preview-buttons">
                                                <button class="btn-preview-primary" id="preview-btn-primary-crop">{{ $hero->btn_primary_text ?? 'Jelajahi Produk' }}</button>
                                                <button class="btn-preview-outline" id="preview-btn-secondary-crop">{{ $hero->btn_secondary_text ?? 'Kenali Kami' }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hero-preview-info">
                                        <small class="text-muted">Tampilan di hero section</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="cropped_background_image" id="hero_cropped_image">
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
                <h5 class="card-title">Preview Lengkap</h5>
            </div>
            <div class="card-body p-0">
                <div class="preview-box-main" id="preview-box-main" style="background: #000; background-size: cover; background-position: center; padding: 2.5rem 2rem; border-radius: 0; min-height: 400px; display: flex; align-items: center; justify-content: flex-start; position: relative;">
                    <div style="position: relative; z-index: 2; max-width: 100%;">
                        <span id="preview-badge" style="display: inline-block; background: rgba(255, 255, 255, 0.15); color: #ffffff; padding: 8px 20px; border-radius: 50px; font-size: 0.65rem; margin-bottom: 1rem; border: 1px solid rgba(255, 255, 255, 0.3); font-weight: 700; letter-spacing: 2px; text-transform: uppercase;">{{ strtoupper($hero->badge ?? 'WARISAN BUDAYA') }}</span>
                        <h2 id="preview-title" style="font-size: 2rem; color: #ffffff; margin-bottom: 1rem; font-weight: 900; line-height: 1.15; letter-spacing: -1px; text-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);">{{ $hero->title ?? 'Suku Marori Wasur' }}</h2>
                        <p id="preview-subtitle" style="font-size: 0.95rem; color: #ffffff; margin-bottom: 0.75rem; text-shadow: 0 1px 10px rgba(0, 0, 0, 0.2); font-weight: 400;">{{ $hero->subtitle ?? 'Melestarikan Budaya, Memberdayakan Ekonomi' }}</p>
                        <p id="preview-description" style="font-size: 0.9rem; color: #ffffff; margin-bottom: 1.5rem; line-height: 1.7; text-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);">{{ Str::limit($hero->description ?? 'Warisan leluhur dari hutan Wasur untuk Indonesia. Bergabunglah dalam perjalanan kami menjaga tradisi dan memberdayakan masyarakat adat Papua.', 120) }}</p>
                        <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                            <button id="preview-btn-primary" style="background: #8B6F47; color: white; border: 2px solid #8B6F47; padding: 12px 28px; border-radius: 8px; font-size: 0.9rem; font-weight: 600;">{{ $hero->btn_primary_text ?? 'Jelajahi Produk' }}</button>
                            <button id="preview-btn-secondary" style="background: transparent; color: white; border: 2px solid rgba(255, 255, 255, 0.3); padding: 12px 28px; border-radius: 8px; font-size: 0.9rem; font-weight: 600;">{{ $hero->btn_secondary_text ?? 'Kenali Kami' }}</button>
                        </div>
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

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
<style>
.crop-preview-container {
    max-height: 400px;
    overflow: hidden;
    background: #f8f9fa;
    border-radius: 8px;
    padding: 10px;
}
.crop-preview-container img {
    max-width: 100%;
}
.hero-preview-card {
    background: #fff;
    border: 2px solid #dee2e6;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
.hero-preview-section {
    aspect-ratio: 16 / 9;
    position: relative;
    background: #000;
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 20px;
    overflow: hidden;
}
.hero-preview-content {
    position: relative;
    z-index: 2;
    max-width: 100%;
}
.hero-preview-badge {
    display: inline-block;
    color: #ffffff;
    background: rgba(255, 255, 255, 0.15);
    font-size: 0.4rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    padding: 4px 10px;
    border-radius: 20px;
    margin-bottom: 8px;
    text-transform: uppercase;
    border: 1px solid rgba(255, 255, 255, 0.3);
}
.hero-preview-title {
    font-size: 0.9rem;
    font-weight: 900;
    color: #ffffff;
    line-height: 1.15;
    margin-bottom: 8px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    letter-spacing: -0.5px;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}
.hero-preview-description {
    color: #ffffff;
    font-size: 0.5rem;
    line-height: 1.5;
    margin-bottom: 10px;
    text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
}
.hero-preview-buttons {
    display: flex;
    gap: 5px;
    flex-wrap: wrap;
}
.btn-preview-primary,
.btn-preview-outline {
    font-size: 0.45rem;
    padding: 4px 10px;
    border-radius: 4px;
    font-weight: 600;
    border: none;
    cursor: default;
}
.btn-preview-primary {
    background: #8B6F47;
    color: white;
}
.btn-preview-outline {
    background: transparent;
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
}
.hero-preview-info {
    padding: 12px;
    text-align: center;
    background: #f8f9fa;
    border-top: 1px solid #dee2e6;
}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
<script>
let heroCropper = null;
let heroOriginalImage = null;

// Hero Image Crop Functions
document.getElementById('hero_image_input').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar! Maksimal 2MB.');
            e.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(event) {
            heroOriginalImage = event.target.result;
            document.getElementById('hero_crop_image').src = event.target.result;
            document.getElementById('hero_crop_container').style.display = 'block';

            // Destroy existing cropper if any
            if (heroCropper) {
                heroCropper.destroy();
            }

            // Initialize cropper with 16:9 aspect ratio (hero landscape)
            const image = document.getElementById('hero_crop_image');
            heroCropper = new Cropper(image, {
                aspectRatio: 16 / 9, // 16:9 ratio for hero
                viewMode: 1,
                autoCropArea: 1,
                responsive: true,
                background: false,
                zoomable: true,
                scalable: true,
                cropBoxResizable: true,
                cropBoxMovable: true,
                crop: function(event) {
                    updateHeroPreview();
                }
            });

            // Initial preview
            setTimeout(() => updateHeroPreview(), 100);
        };
        reader.readAsDataURL(file);
    }
});

// Update Hero Preview with Background Image
function updateHeroPreview() {
    if (!heroCropper) return;

    const canvas = document.getElementById('hero_preview_canvas');
    const previewSection = document.getElementById('hero_preview_section');
    const previewBoxMain = document.getElementById('preview-box-main');
    const previewCanvas = heroCropper.getCroppedCanvas({
        width: 640,
        height: 360, // 16:9 ratio
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
    });

    if (previewCanvas) {
        const ctx = canvas.getContext('2d');
        canvas.width = previewCanvas.width;
        canvas.height = previewCanvas.height;
        ctx.drawImage(previewCanvas, 0, 0);

        // Set preview section background to cropped image
        const imageUrl = previewCanvas.toDataURL('image/jpeg', 0.9);
        previewSection.style.backgroundImage = `url('${imageUrl}')`;

        // Also update main preview box in sidebar
        if (previewBoxMain) {
            previewBoxMain.style.backgroundImage = `url('${imageUrl}')`;
        }
    }
}

function resetHeroCrop() {
    if (heroCropper && heroOriginalImage) {
        heroCropper.destroy();
        document.getElementById('hero_crop_image').src = heroOriginalImage;
        heroCropper = new Cropper(document.getElementById('hero_crop_image'), {
            aspectRatio: 16 / 9, // 16:9 ratio
            viewMode: 1,
            autoCropArea: 1,
            responsive: true,
            background: false,
            zoomable: true,
            scalable: true,
            cropBoxResizable: true,
            cropBoxMovable: true,
            crop: function(event) {
                updateHeroPreview();
            }
        });

        setTimeout(() => updateHeroPreview(), 100);
    }
}

function rotateHeroImage(degree) {
    if (heroCropper) {
        heroCropper.rotate(degree);
        setTimeout(() => updateHeroPreview(), 100);
    }
}

// Submit Form with Cropped Image
document.querySelector('form').addEventListener('submit', function(e) {
    if (heroCropper) {
        e.preventDefault();

        heroCropper.getCroppedCanvas({
            maxWidth: 1920,
            maxHeight: 1080,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high',
        }).toBlob(function(blob) {
            const formData = new FormData();

            // Add all form fields
            formData.append('_token', document.querySelector('input[name="_token"]').value);
            formData.append('badge', document.querySelector('input[name="badge"]').value);
            formData.append('title', document.querySelector('input[name="title"]').value);
            formData.append('subtitle', document.querySelector('input[name="subtitle"]').value);
            formData.append('description', document.querySelector('textarea[name="description"]').value);
            formData.append('btn_primary_text', document.querySelector('input[name="btn_primary_text"]').value);
            formData.append('btn_primary_link', document.querySelector('input[name="btn_primary_link"]').value);
            formData.append('btn_secondary_text', document.querySelector('input[name="btn_secondary_text"]').value);
            formData.append('btn_secondary_link', document.querySelector('input[name="btn_secondary_link"]').value);
            formData.append('background_image', blob, 'hero-background.jpg');

            // Submit form
            fetch(e.target.action, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert('Gagal menyimpan. Silakan coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan.');
            });
        }, 'image/jpeg', 0.9);
    }
});
</script>
<script>
    // Live Preview Updates
    document.addEventListener('DOMContentLoaded', function() {
        // Load existing background image to both preview boxes if exists
        @if(isset($hero) && $hero->background_image)
        const previewSection = document.getElementById('hero_preview_section');
        const previewBoxMain = document.getElementById('preview-box-main');
        const bgImageUrl = `url('{{ asset('storage/' . $hero->background_image) }}')`;

        if (previewSection) {
            previewSection.style.backgroundImage = bgImageUrl;
        }
        if (previewBoxMain) {
            previewBoxMain.style.backgroundImage = bgImageUrl;
        }
        @endif

        // Badge preview - update both preview boxes
        document.querySelector('input[name="badge"]').addEventListener('input', function(e) {
            document.getElementById('preview-badge').textContent = e.target.value;
            document.getElementById('preview-badge-crop').textContent = e.target.value.toUpperCase();
        });

        // Title preview - update both preview boxes
        document.querySelector('input[name="title"]').addEventListener('input', function(e) {
            document.getElementById('preview-title').textContent = e.target.value;
            document.getElementById('preview-title-crop').textContent = e.target.value;
        });

        // Subtitle preview
        document.querySelector('input[name="subtitle"]').addEventListener('input', function(e) {
            document.getElementById('preview-subtitle').textContent = e.target.value;
        });

        // Description preview - update both preview boxes
        document.querySelector('textarea[name="description"]').addEventListener('input', function(e) {
            const text = e.target.value;
            const limit = 80;
            const limitCrop = 60;

            // Update main preview (right sidebar)
            document.getElementById('preview-description').textContent =
                text.length > limit ? text.substring(0, limit) + '...' : text;

            // Update crop preview
            document.getElementById('preview-description-crop').textContent =
                text.length > limitCrop ? text.substring(0, limitCrop) + '...' : text;
        });

        // Primary button preview - update both preview boxes
        document.querySelector('input[name="btn_primary_text"]').addEventListener('input', function(e) {
            document.getElementById('preview-btn-primary').textContent = e.target.value;
            document.getElementById('preview-btn-primary-crop').textContent = e.target.value;
        });

        // Secondary button preview - update both preview boxes
        document.querySelector('input[name="btn_secondary_text"]').addEventListener('input', function(e) {
            document.getElementById('preview-btn-secondary').textContent = e.target.value;
            document.getElementById('preview-btn-secondary-crop').textContent = e.target.value;
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
