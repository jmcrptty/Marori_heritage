@extends('layouts.dashboard')

@section('title', 'Edit Hero Section - Dashboard')

@section('page-title', 'Hero Section')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Hero Section</li>
@endsection

@section('content')
<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">
                    <i class="bi bi-check-circle-fill me-2"></i>Berhasil!
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-check-circle text-success" style="font-size: 4rem;"></i>
                <h4 class="mt-3">{{ Session::get('success') }}</h4>
                <p class="text-muted">Perubahan telah disimpan dengan sukses</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-primary">
                    <i class="bi bi-eye me-2"></i>Lihat Website
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="errorModalLabel">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>Terjadi Kesalahan!
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="bi bi-x-circle text-danger" style="font-size: 4rem;"></i>
                </div>
                @if($errors->any())
                <ul class="list-unstyled mb-0">
                    @foreach($errors->all() as $error)
                    <li class="mb-2"><i class="bi bi-dot"></i> {{ $error }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

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
                        <input type="file" name="background_image" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB. Rekomendasi aspect ratio 16:9.</small>
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

@push('scripts')
<script>
    // Live Preview Updates
    document.addEventListener('DOMContentLoaded', function() {
        // Show success modal if session has success message
        @if(Session::has('success'))
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
        @endif

        // Show error modal if there are validation errors
        @if($errors->any())
        const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();
        @endif

        // Load existing background image to preview box if exists
        @if(isset($hero) && $hero->background_image)
        const previewBoxMain = document.getElementById('preview-box-main');
        const bgImageUrl = `url('{{ asset('storage/' . $hero->background_image) }}')`;

        if (previewBoxMain) {
            previewBoxMain.style.backgroundImage = bgImageUrl;
        }
        @endif

        // Badge preview
        document.querySelector('input[name="badge"]').addEventListener('input', function(e) {
            document.getElementById('preview-badge').textContent = e.target.value.toUpperCase();
        });

        // Title preview
        document.querySelector('input[name="title"]').addEventListener('input', function(e) {
            document.getElementById('preview-title').textContent = e.target.value;
        });

        // Subtitle preview
        document.querySelector('input[name="subtitle"]').addEventListener('input', function(e) {
            document.getElementById('preview-subtitle').textContent = e.target.value;
        });

        // Description preview with character limit
        document.querySelector('textarea[name="description"]').addEventListener('input', function(e) {
            const text = e.target.value;
            const limit = 120;
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

        // Image preview when file is selected
        const imageInput = document.querySelector('input[name="background_image"]');
        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    console.log('File selected:', file.name, 'Size:', file.size, 'Type:', file.type);

                    // Check file size
                    if (file.size > 2 * 1024 * 1024) {
                        alert('Ukuran file terlalu besar! Maksimal 2MB.');
                        e.target.value = '';
                        return;
                    }

                    // Preview the selected image
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const previewBoxMain = document.getElementById('preview-box-main');
                        if (previewBoxMain) {
                            previewBoxMain.style.backgroundImage = `url('${event.target.result}')`;
                        }
                        console.log('Image preview updated successfully');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Debug form submission
        const heroForm = document.querySelector('form[action="{{ route('dashboard.hero.update') }}"]');
        if (heroForm) {
            heroForm.addEventListener('submit', function(e) {
                console.log('Form is being submitted...');
                console.log('Form action:', this.action);
                console.log('Form method:', this.method);
                console.log('Form enctype:', this.enctype);

                // Log all form data
                const formData = new FormData(this);
                for (let pair of formData.entries()) {
                    if (pair[1] instanceof File) {
                        console.log(pair[0] + ':', 'File -', pair[1].name, pair[1].size, 'bytes');
                    } else {
                        console.log(pair[0] + ':', pair[1]);
                    }
                }
            });
        }
    });
</script>
@endpush
