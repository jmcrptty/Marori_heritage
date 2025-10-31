@extends('layouts.dashboard')

@section('title', 'Kelola Media Gallery - Dashboard')

@section('page-title', 'Media Gallery')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Media Gallery</li>
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

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            Kelola video dan foto galeri yang ditampilkan di website.
        </div>
    </div>
</div>

<!-- Video Gallery Section -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="bi bi-play-circle me-2"></i>Video Gallery ({{ $videos->count() }})</h5>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addVideoModal">
            <i class="bi bi-plus-lg me-1"></i>Tambah Video
        </button>
    </div>
    <div class="card-body">
        @if($videos->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 100px;">Thumbnail</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $index => $video)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/mqdefault.jpg"
                                 alt="{{ $video->title }}"
                                 class="img-thumbnail"
                                 style="width: 80px; height: 60px; object-fit: cover;">
                        </td>
                        <td>
                            <strong>{{ $video->title }}</strong>
                        </td>
                        <td>{{ Str::limit($video->description, 60) }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary"
                                    onclick='editVideo(@json($video->id), @json($video->title), @json($video->description), @json($video->youtube_url))'>
                                <i class="bi bi-pencil"></i>
                            </button>
                            <form action="{{ route('dashboard.media.video.delete', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus video ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-play-circle" style="font-size: 3rem; color: #ccc;"></i>
            <p class="text-muted mt-3">Belum ada video. Klik "Tambah Video" untuk menambahkan.</p>
        </div>
        @endif
    </div>
</div>

<!-- Photo Gallery Section -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="bi bi-images me-2"></i>Photo Gallery ({{ $photos->count() }})</h5>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addPhotoModal">
            <i class="bi bi-plus-lg me-1"></i>Tambah Foto
        </button>
    </div>
    <div class="card-body">
        @if($photos->count() > 0)
        <div class="row g-3">
            @foreach($photos as $photo)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100">
                    <div style="height: 200px; overflow: hidden; background: #f5f5f5; display: flex; align-items: center; justify-content: center;">
                        @if($photo->image_path)
                        <img src="{{ asset('storage/' . $photo->image_path) }}"
                             alt="{{ $photo->title }}"
                             style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                        <div class="text-center">
                            <i class="bi bi-image" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="text-muted small mt-2">Belum ada foto</p>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">{{ $photo->title }}</h6>
                        <p class="card-text small text-muted">{{ Str::limit($photo->caption, 50) }}</p>
                        <div class="mb-2">
                            @if($photo->is_active)
                            <span class="badge bg-success">Aktif</span>
                            @else
                            <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-primary flex-fill"
                                    onclick='editPhoto(@json($photo->id), @json($photo->title), @json($photo->caption), @json($photo->image_path), {{ $photo->is_active ? "true" : "false" }})'>
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                            <form action="{{ route('dashboard.media.photo.delete', $photo->id) }}" method="POST" onsubmit="return confirm('Yakin hapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-images" style="font-size: 3rem; color: #ccc;"></i>
            <p class="text-muted mt-3">Belum ada foto. Klik "Tambah Foto" untuk menambahkan.</p>
        </div>
        @endif
    </div>
</div>

<!-- Add Video Modal -->
<div class="modal fade" id="addVideoModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('dashboard.media.video.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Video YouTube</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Video <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">YouTube URL <span class="text-danger">*</span></label>
                        <input type="url" name="youtube_url" class="form-control" placeholder="https://www.youtube.com/watch?v=..." required>
                        <small class="text-muted">Contoh: https://www.youtube.com/watch?v=dQw4w9WgXcQ</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah Video</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Video Modal -->
<div class="modal fade" id="editVideoModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editVideoForm" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Video <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="edit_video_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" id="edit_video_description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">YouTube URL <span class="text-danger">*</span></label>
                        <input type="url" name="youtube_url" id="edit_video_url" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Photo Modal -->
<div class="modal fade" id="addPhotoModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('dashboard.media.photo.store') }}" method="POST" enctype="multipart/form-data" id="addPhotoForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Foto <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="add_photo_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Caption <span class="text-danger">*</span></label>
                        <textarea name="caption" id="add_photo_caption" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Foto <span class="text-danger">*</span></label>
                        <input type="file" id="add_photo_input" class="form-control" accept="image/*" required>
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB.</small>
                    </div>
                    <div id="add_crop_container" style="display: none;">
                        <div class="alert alert-info mb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Ukuran Rekomendasi:</strong> Aspect Ratio 4:5 (Portrait). Foto akan ditampilkan dengan rasio ini di galeri website.
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Crop Foto</label>
                                    <div class="crop-preview-container">
                                        <img id="add_crop_image" style="max-width: 100%; display: block;">
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="resetAddCrop()">
                                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="rotateAddImage(-90)">
                                        <i class="bi bi-arrow-counterclockwise"></i> Putar Kiri
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="rotateAddImage(90)">
                                        <i class="bi bi-arrow-clockwise"></i> Putar Kanan
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Preview Galeri</label>
                                <div class="gallery-preview-card">
                                    <div class="gallery-preview-image">
                                        <canvas id="add_preview_canvas"></canvas>
                                    </div>
                                    <div class="gallery-preview-info">
                                        <small class="text-muted">Tampilan di galeri website</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="cropped_image" id="add_cropped_image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah Foto</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Photo Modal -->
<div class="modal fade" id="editPhotoModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editPhotoForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul Foto <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="edit_photo_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Caption <span class="text-danger">*</span></label>
                        <textarea name="caption" id="edit_photo_caption" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Saat Ini</label>
                        <div id="current_photo_preview" class="mb-3"></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Foto Baru (Opsional)</label>
                        <input type="file" id="edit_photo_input" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                    </div>
                    <div id="edit_crop_container" style="display: none;">
                        <div class="alert alert-info mb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Ukuran Rekomendasi:</strong> Aspect Ratio 4:5 (Portrait). Foto akan ditampilkan dengan rasio ini di galeri website.
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Crop Foto Baru</label>
                                    <div class="crop-preview-container">
                                        <img id="edit_crop_image" style="max-width: 100%; display: block;">
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="resetEditCrop()">
                                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="rotateEditImage(-90)">
                                        <i class="bi bi-arrow-counterclockwise"></i> Putar Kiri
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="rotateEditImage(90)">
                                        <i class="bi bi-arrow-clockwise"></i> Putar Kanan
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Preview Galeri</label>
                                <div class="gallery-preview-card">
                                    <div class="gallery-preview-image">
                                        <canvas id="edit_preview_canvas"></canvas>
                                    </div>
                                    <div class="gallery-preview-info">
                                        <small class="text-muted">Tampilan di galeri website</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="cropped_image" id="edit_cropped_image">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" id="edit_photo_active">
                        <label class="form-check-label" for="edit_photo_active">
                            Status aktif
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
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
.gallery-preview-card {
    background: #fff;
    border: 2px solid #dee2e6;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
.gallery-preview-image {
    aspect-ratio: 4 / 5;
    background: #000;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.gallery-preview-image canvas {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
}
.gallery-preview-info {
    padding: 12px;
    text-align: center;
    background: #f8f9fa;
    border-top: 1px solid #dee2e6;
}
#current_photo_preview .border {
    display: inline-block;
}
#current_photo_preview img {
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
<script>
let addCropper = null;
let editCropper = null;
let addOriginalImage = null;
let editOriginalImage = null;

// Add Photo Crop Functions
document.getElementById('add_photo_input').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar! Maksimal 2MB.');
            e.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(event) {
            addOriginalImage = event.target.result;
            document.getElementById('add_crop_image').src = event.target.result;
            document.getElementById('add_crop_container').style.display = 'block';

            // Destroy existing cropper if any
            if (addCropper) {
                addCropper.destroy();
            }

            // Initialize cropper with 4:5 aspect ratio (gallery default)
            const image = document.getElementById('add_crop_image');
            addCropper = new Cropper(image, {
                aspectRatio: 0.8, // 4:5 ratio for gallery
                viewMode: 1,
                autoCropArea: 1,
                responsive: true,
                background: false,
                zoomable: true,
                scalable: true,
                cropBoxResizable: true,
                cropBoxMovable: true,
                crop: function(event) {
                    updateAddPreview();
                }
            });

            // Initial preview
            setTimeout(() => updateAddPreview(), 100);
        };
        reader.readAsDataURL(file);
    }
});

// Update Add Preview Canvas
function updateAddPreview() {
    if (!addCropper) return;

    const canvas = document.getElementById('add_preview_canvas');
    const previewCanvas = addCropper.getCroppedCanvas({
        width: 300,
        height: 375, // 4:5 ratio
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
    });

    if (previewCanvas) {
        const ctx = canvas.getContext('2d');
        canvas.width = previewCanvas.width;
        canvas.height = previewCanvas.height;
        ctx.drawImage(previewCanvas, 0, 0);
    }
}

// Submit Add Photo Form with Cropped Image
document.getElementById('addPhotoForm').addEventListener('submit', function(e) {
    if (addCropper) {
        e.preventDefault();

        addCropper.getCroppedCanvas({
            maxWidth: 2000,
            maxHeight: 2000,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high',
        }).toBlob(function(blob) {
            const formData = new FormData();
            formData.append('title', document.getElementById('add_photo_title').value);
            formData.append('caption', document.getElementById('add_photo_caption').value);
            formData.append('image', blob, 'cropped-photo.jpg');
            formData.append('_token', document.querySelector('input[name="_token"]').value);

            // Submit form
            fetch(document.getElementById('addPhotoForm').action, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert('Gagal upload foto. Silakan coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat upload foto.');
            });
        }, 'image/jpeg', 0.9);
    }
});

function resetAddCrop() {
    if (addCropper && addOriginalImage) {
        addCropper.destroy();
        document.getElementById('add_crop_image').src = addOriginalImage;
        addCropper = new Cropper(document.getElementById('add_crop_image'), {
            aspectRatio: 0.8, // 4:5 ratio
            viewMode: 1,
            autoCropArea: 1,
            responsive: true,
            background: false,
            zoomable: true,
            scalable: true,
            cropBoxResizable: true,
            cropBoxMovable: true,
            crop: function(event) {
                updateAddPreview();
            }
        });

        setTimeout(() => updateAddPreview(), 100);
    }
}

function rotateAddImage(degree) {
    if (addCropper) {
        addCropper.rotate(degree);
        setTimeout(() => updateAddPreview(), 100);
    }
}

// Edit Photo Crop Functions
document.getElementById('edit_photo_input').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar! Maksimal 2MB.');
            e.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(event) {
            editOriginalImage = event.target.result;
            document.getElementById('edit_crop_image').src = event.target.result;
            document.getElementById('edit_crop_container').style.display = 'block';

            // Destroy existing cropper if any
            if (editCropper) {
                editCropper.destroy();
            }

            // Initialize cropper with 4:5 aspect ratio (gallery default)
            const image = document.getElementById('edit_crop_image');
            editCropper = new Cropper(image, {
                aspectRatio: 0.8, // 4:5 ratio for gallery
                viewMode: 1,
                autoCropArea: 1,
                responsive: true,
                background: false,
                zoomable: true,
                scalable: true,
                cropBoxResizable: true,
                cropBoxMovable: true,
                crop: function(event) {
                    updateEditPreview();
                }
            });

            // Initial preview
            setTimeout(() => updateEditPreview(), 100);
        };
        reader.readAsDataURL(file);
    }
});

// Update Edit Preview Canvas
function updateEditPreview() {
    if (!editCropper) return;

    const canvas = document.getElementById('edit_preview_canvas');
    const previewCanvas = editCropper.getCroppedCanvas({
        width: 300,
        height: 375, // 4:5 ratio
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
    });

    if (previewCanvas) {
        const ctx = canvas.getContext('2d');
        canvas.width = previewCanvas.width;
        canvas.height = previewCanvas.height;
        ctx.drawImage(previewCanvas, 0, 0);
    }
}

// Submit Edit Photo Form with Cropped Image
document.getElementById('editPhotoForm').addEventListener('submit', function(e) {
    if (editCropper) {
        e.preventDefault();

        editCropper.getCroppedCanvas({
            maxWidth: 2000,
            maxHeight: 2000,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high',
        }).toBlob(function(blob) {
            const formData = new FormData();
            formData.append('title', document.getElementById('edit_photo_title').value);
            formData.append('caption', document.getElementById('edit_photo_caption').value);
            formData.append('image', blob, 'cropped-photo.jpg');
            formData.append('is_active', document.getElementById('edit_photo_active').checked ? '1' : '0');
            formData.append('_token', document.querySelector('#editPhotoForm input[name="_token"]').value);

            // Submit form
            fetch(document.getElementById('editPhotoForm').action, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert('Gagal update foto. Silakan coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat update foto.');
            });
        }, 'image/jpeg', 0.9);
    } else {
        // No cropper, submit form normally (no new image uploaded)
        return true;
    }
});

function resetEditCrop() {
    if (editCropper && editOriginalImage) {
        editCropper.destroy();
        document.getElementById('edit_crop_image').src = editOriginalImage;
        editCropper = new Cropper(document.getElementById('edit_crop_image'), {
            aspectRatio: 0.8, // 4:5 ratio
            viewMode: 1,
            autoCropArea: 1,
            responsive: true,
            background: false,
            zoomable: true,
            scalable: true,
            cropBoxResizable: true,
            cropBoxMovable: true,
            crop: function(event) {
                updateEditPreview();
            }
        });

        setTimeout(() => updateEditPreview(), 100);
    }
}

function rotateEditImage(degree) {
    if (editCropper) {
        editCropper.rotate(degree);
        setTimeout(() => updateEditPreview(), 100);
    }
}

// Clean up croppers when modals are closed
document.getElementById('addPhotoModal').addEventListener('hidden.bs.modal', function () {
    if (addCropper) {
        addCropper.destroy();
        addCropper = null;
    }
    document.getElementById('add_crop_container').style.display = 'none';
    document.getElementById('addPhotoForm').reset();
});

document.getElementById('editPhotoModal').addEventListener('hidden.bs.modal', function () {
    if (editCropper) {
        editCropper.destroy();
        editCropper = null;
    }
    document.getElementById('edit_crop_container').style.display = 'none';
});

// Original functions
function editVideo(id, title, description, url) {
    console.log('Edit video form action:', "{{ url('dashboard/media/video/update') }}/" + id);

    document.getElementById('editVideoForm').action = "{{ url('dashboard/media/video/update') }}/" + id;
    document.getElementById('edit_video_title').value = title || '';
    document.getElementById('edit_video_description').value = description || '';
    document.getElementById('edit_video_url').value = url || '';

    var editModal = new bootstrap.Modal(document.getElementById('editVideoModal'));
    editModal.show();
}

function editPhoto(id, title, caption, imagePath, active) {
    const formAction = "{{ url('dashboard/media/photo/update') }}/" + id;
    console.log('Edit photo form action:', formAction);

    // Reset cropper if exists
    if (editCropper) {
        editCropper.destroy();
        editCropper = null;
    }
    document.getElementById('edit_crop_container').style.display = 'none';

    document.getElementById('editPhotoForm').action = formAction;
    document.getElementById('edit_photo_title').value = title || '';
    document.getElementById('edit_photo_caption').value = caption || '';
    document.getElementById('edit_photo_active').checked = active;

    const photoPreview = document.getElementById('current_photo_preview');
    if (imagePath && imagePath !== 'null') {
        photoPreview.innerHTML = `
            <div class="border rounded p-2 bg-light" style="max-width: 250px;">
                <img src="/storage/${imagePath}" alt="${title}"
                     style="width: 100%; height: auto; max-height: 250px; object-fit: contain; display: block; border-radius: 8px; aspect-ratio: 4/5;"
                     onerror="this.parentElement.innerHTML='<p class=text-danger><i class=bi bi-exclamation-circle></i> Gagal memuat gambar</p>'">
            </div>
        `;
    } else {
        photoPreview.innerHTML = '<p class="text-muted small"><i class="bi bi-image"></i> Belum ada foto</p>';
    }

    document.getElementById('edit_photo_input').value = '';

    var editModal = new bootstrap.Modal(document.getElementById('editPhotoModal'));
    editModal.show();
}

// Log form submission
document.addEventListener('DOMContentLoaded', function() {
    const editPhotoForm = document.getElementById('editPhotoForm');
    if (editPhotoForm) {
        editPhotoForm.addEventListener('submit', function(e) {
            console.log('Form submitted to:', this.action);
            console.log('Form data:', new FormData(this));
        });
    }
});
</script>
@endpush
