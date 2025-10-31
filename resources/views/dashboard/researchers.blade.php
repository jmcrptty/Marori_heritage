@extends('layouts.dashboard')

@section('title', 'Kelola Tim Peneliti - Dashboard')

@section('page-title', 'Tim Peneliti')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Tim Peneliti</li>
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
            Kelola tim peneliti yang ditampilkan di website.
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="bi bi-people me-2"></i>Daftar Tim Peneliti ({{ $researchers->count() }})</h5>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addResearcherModal">
            <i class="bi bi-plus-lg me-1"></i>Tambah Peneliti
        </button>
    </div>
    <div class="card-body">
        @if($researchers->count() > 0)
        <div class="row g-3">
            @foreach($researchers as $researcher)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100">
                    <div style="height: 200px; overflow: hidden; background: linear-gradient(135deg, #4A6B5A 0%, #5A7868 100%); display: flex; align-items: center; justify-content: center;">
                        @if($researcher->photo)
                        <img src="{{ asset('storage/' . $researcher->photo) }}"
                             alt="{{ $researcher->name }}"
                             style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                        <i class="bi bi-person-circle" style="font-size: 5rem; color: white;"></i>
                        @endif
                    </div>
                    <div class="card-body">
                        <h6 class="card-title fw-bold">{{ $researcher->name }}</h6>
                        <p class="card-text small text-primary mb-1">{{ $researcher->role }}</p>
                        <p class="card-text small text-muted">{{ $researcher->institution }}</p>
                        <div class="d-flex gap-2 mt-3">
                            <button class="btn btn-sm btn-outline-primary flex-fill"
                                    onclick='editResearcher(@json($researcher->id), @json($researcher->name), @json($researcher->role), @json($researcher->institution), @json($researcher->photo))'>
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                            <form action="{{ route('dashboard.researchers.delete', $researcher->id) }}" method="POST" onsubmit="return confirm('Yakin hapus peneliti ini?')">
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
            <i class="bi bi-people" style="font-size: 3rem; color: #ccc;"></i>
            <p class="text-muted mt-3">Belum ada peneliti. Klik "Tambah Peneliti" untuk menambahkan.</p>
        </div>
        @endif
    </div>
</div>

<!-- Add Researcher Modal -->
<div class="modal fade" id="addResearcherModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('dashboard.researchers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Peneliti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="Dr. John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan/Peran <span class="text-danger">*</span></label>
                        <input type="text" name="role" class="form-control" placeholder="Antropolog" required>
                        <small class="text-muted">Contoh: Antropolog, Etnografer, Peneliti Lapangan, Linguistik</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Institusi <span class="text-danger">*</span></label>
                        <input type="text" name="institution" class="form-control" placeholder="Universitas Papua" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Peneliti</label>
                        <input type="file" id="add_researcher_photo_input" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB.</small>
                    </div>

                    <!-- Crop Container for Add Researcher -->
                    <div id="add_researcher_crop_container" style="display: none;">
                        <div class="alert alert-info mb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Ukuran Rekomendasi:</strong> Aspect Ratio 1:1 (Square/Persegi) untuk foto profil
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="crop-preview-container mb-3" style="background: #f8f9fa; border: 2px dashed #dee2e6; border-radius: 8px; padding: 15px; max-height: 400px; overflow: hidden;">
                                    <img id="add_researcher_crop_image" style="max-width: 100%; display: block;">
                                </div>
                                <div class="d-flex gap-2 justify-content-center">
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="resetAddResearcherCrop()">
                                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="rotateAddResearcherImage(-90)">
                                        <i class="bi bi-arrow-counterclockwise"></i> Putar Kiri
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="rotateAddResearcherImage(90)">
                                        <i class="bi bi-arrow-clockwise"></i> Putar Kanan
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Preview Profil</label>
                                <div class="researcher-preview-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                    <div class="researcher-preview-image" style="width: 100%; aspect-ratio: 1/1; background: linear-gradient(135deg, #4A6B5A 0%, #5A7868 100%); display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                        <canvas id="add_researcher_preview_canvas" style="width: 100%; height: 100%; object-fit: cover;"></canvas>
                                    </div>
                                    <div class="p-2 text-center">
                                        <small class="text-muted">Tampilan di website</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah Peneliti</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Researcher Modal -->
<div class="modal fade" id="editResearcherModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editResearcherForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Peneliti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="edit_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jabatan/Peran <span class="text-danger">*</span></label>
                        <input type="text" name="role" id="edit_role" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Institusi <span class="text-danger">*</span></label>
                        <input type="text" name="institution" id="edit_institution" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Saat Ini</label>
                        <div id="current_photo_preview" class="mb-2"></div>
                        <input type="file" id="edit_researcher_photo_input" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                    </div>

                    <!-- Crop Container for Edit Researcher -->
                    <div id="edit_researcher_crop_container" style="display: none;">
                        <div class="alert alert-info mb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Ukuran Rekomendasi:</strong> Aspect Ratio 1:1 (Square/Persegi) untuk foto profil
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="crop-preview-container mb-3" style="background: #f8f9fa; border: 2px dashed #dee2e6; border-radius: 8px; padding: 15px; max-height: 400px; overflow: hidden;">
                                    <img id="edit_researcher_crop_image" style="max-width: 100%; display: block;">
                                </div>
                                <div class="d-flex gap-2 justify-content-center">
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="resetEditResearcherCrop()">
                                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="rotateEditResearcherImage(-90)">
                                        <i class="bi bi-arrow-counterclockwise"></i> Putar Kiri
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="rotateEditResearcherImage(90)">
                                        <i class="bi bi-arrow-clockwise"></i> Putar Kanan
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Preview Profil</label>
                                <div class="researcher-preview-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                    <div class="researcher-preview-image" style="width: 100%; aspect-ratio: 1/1; background: linear-gradient(135deg, #4A6B5A 0%, #5A7868 100%); display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                        <canvas id="edit_researcher_preview_canvas" style="width: 100%; height: 100%; object-fit: cover;"></canvas>
                                    </div>
                                    <div class="p-2 text-center">
                                        <small class="text-muted">Tampilan di website</small>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<!-- Cropper.js CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
@endpush

@push('scripts')
<!-- Cropper.js JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

<script>
// Variables for Add Researcher cropper
let addResearcherCropper = null;
let addResearcherOriginalImage = null;

// Variables for Edit Researcher cropper
let editResearcherCropper = null;
let editResearcherOriginalImage = null;

// ============================================
// ADD RESEARCHER CROPPER FUNCTIONALITY
// ============================================

document.getElementById('add_researcher_photo_input').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        // Validate file size (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 2MB.');
            this.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(event) {
            addResearcherOriginalImage = event.target.result;
            document.getElementById('add_researcher_crop_image').src = event.target.result;
            document.getElementById('add_researcher_crop_container').style.display = 'block';

            // Destroy previous cropper if exists
            if (addResearcherCropper) {
                addResearcherCropper.destroy();
            }

            const image = document.getElementById('add_researcher_crop_image');
            addResearcherCropper = new Cropper(image, {
                aspectRatio: 1, // 1:1 ratio for square profile photos
                viewMode: 1,
                autoCropArea: 1,
                responsive: true,
                crop: function(event) {
                    updateAddResearcherPreview();
                }
            });
        };
        reader.readAsDataURL(file);
    }
});

function updateAddResearcherPreview() {
    if (!addResearcherCropper) return;

    const canvas = document.getElementById('add_researcher_preview_canvas');
    const previewCanvas = addResearcherCropper.getCroppedCanvas({
        width: 400,
        height: 400, // 1:1 ratio
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
    });

    const ctx = canvas.getContext('2d');
    canvas.width = previewCanvas.width;
    canvas.height = previewCanvas.height;
    ctx.drawImage(previewCanvas, 0, 0);
}

function resetAddResearcherCrop() {
    if (addResearcherCropper) {
        addResearcherCropper.reset();
    }
}

function rotateAddResearcherImage(degrees) {
    if (addResearcherCropper) {
        addResearcherCropper.rotate(degrees);
    }
}

// Handle Add Researcher Form Submission
document.querySelector('#addResearcherModal form').addEventListener('submit', function(e) {
    if (addResearcherCropper) {
        e.preventDefault();

        addResearcherCropper.getCroppedCanvas({
            maxWidth: 800,
            maxHeight: 800,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high',
        }).toBlob(function(blob) {
            const formData = new FormData();

            // Add all form fields
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('name', document.querySelector('#addResearcherModal [name="name"]').value);
            formData.append('role', document.querySelector('#addResearcherModal [name="role"]').value);
            formData.append('institution', document.querySelector('#addResearcherModal [name="institution"]').value);

            // Add cropped photo
            formData.append('photo', blob, 'researcher-photo.jpg');

            // Submit via AJAX
            fetch('{{ route("dashboard.researchers.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert(data.message || 'Terjadi kesalahan saat menyimpan peneliti');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan peneliti');
            });
        }, 'image/jpeg', 0.9);
    }
});

// Reset cropper when Add modal is closed
document.getElementById('addResearcherModal').addEventListener('hidden.bs.modal', function() {
    if (addResearcherCropper) {
        addResearcherCropper.destroy();
        addResearcherCropper = null;
    }
    document.getElementById('add_researcher_crop_container').style.display = 'none';
    document.getElementById('add_researcher_photo_input').value = '';
});

// ============================================
// EDIT RESEARCHER CROPPER FUNCTIONALITY
// ============================================

document.getElementById('edit_researcher_photo_input').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        // Validate file size (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file terlalu besar. Maksimal 2MB.');
            this.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(event) {
            editResearcherOriginalImage = event.target.result;
            document.getElementById('edit_researcher_crop_image').src = event.target.result;
            document.getElementById('edit_researcher_crop_container').style.display = 'block';

            // Destroy previous cropper if exists
            if (editResearcherCropper) {
                editResearcherCropper.destroy();
            }

            const image = document.getElementById('edit_researcher_crop_image');
            editResearcherCropper = new Cropper(image, {
                aspectRatio: 1, // 1:1 ratio for square profile photos
                viewMode: 1,
                autoCropArea: 1,
                responsive: true,
                crop: function(event) {
                    updateEditResearcherPreview();
                }
            });
        };
        reader.readAsDataURL(file);
    }
});

function updateEditResearcherPreview() {
    if (!editResearcherCropper) return;

    const canvas = document.getElementById('edit_researcher_preview_canvas');
    const previewCanvas = editResearcherCropper.getCroppedCanvas({
        width: 400,
        height: 400, // 1:1 ratio
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
    });

    const ctx = canvas.getContext('2d');
    canvas.width = previewCanvas.width;
    canvas.height = previewCanvas.height;
    ctx.drawImage(previewCanvas, 0, 0);
}

function resetEditResearcherCrop() {
    if (editResearcherCropper) {
        editResearcherCropper.reset();
    }
}

function rotateEditResearcherImage(degrees) {
    if (editResearcherCropper) {
        editResearcherCropper.rotate(degrees);
    }
}

// Handle Edit Researcher Form Submission
document.getElementById('editResearcherForm').addEventListener('submit', function(e) {
    if (editResearcherCropper) {
        e.preventDefault();

        editResearcherCropper.getCroppedCanvas({
            maxWidth: 800,
            maxHeight: 800,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high',
        }).toBlob(function(blob) {
            const formData = new FormData();

            // Add all form fields
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('name', document.getElementById('edit_name').value);
            formData.append('role', document.getElementById('edit_role').value);
            formData.append('institution', document.getElementById('edit_institution').value);

            // Add cropped photo
            formData.append('photo', blob, 'researcher-photo.jpg');

            const form = document.getElementById('editResearcherForm');

            // Submit via AJAX
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert(data.message || 'Terjadi kesalahan saat menyimpan peneliti');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan peneliti');
            });
        }, 'image/jpeg', 0.9);
    }
});

// Reset cropper when Edit modal is closed
document.getElementById('editResearcherModal').addEventListener('hidden.bs.modal', function() {
    if (editResearcherCropper) {
        editResearcherCropper.destroy();
        editResearcherCropper = null;
    }
    document.getElementById('edit_researcher_crop_container').style.display = 'none';
    document.getElementById('edit_researcher_photo_input').value = '';
});

// ============================================
// EXISTING FUNCTIONS
// ============================================

function editResearcher(id, name, role, institution, photo) {
    // Reset cropper if exists
    if (editResearcherCropper) {
        editResearcherCropper.destroy();
        editResearcherCropper = null;
    }
    document.getElementById('edit_researcher_crop_container').style.display = 'none';

    console.log('Edit researcher form action:', "{{ url('dashboard/researchers/update') }}/" + id);

    document.getElementById('editResearcherForm').action = "{{ url('dashboard/researchers/update') }}/" + id;
    document.getElementById('edit_name').value = name || '';
    document.getElementById('edit_role').value = role || '';
    document.getElementById('edit_institution').value = institution || '';

    // Show current photo preview
    const photoPreview = document.getElementById('current_photo_preview');
    if (photo && photo !== 'null') {
        photoPreview.innerHTML = `
            <div class="border rounded p-2 bg-light">
                <img src="/storage/${photo}" alt="${name}"
                     style="max-width: 100%; max-height: 200px; object-fit: contain; display: block; margin: 0 auto; border-radius: 8px;"
                     onerror="this.parentElement.innerHTML='<p class=text-danger><i class=bi bi-exclamation-circle></i> Gagal memuat gambar</p>'">
            </div>
        `;
    } else {
        photoPreview.innerHTML = '<p class="text-muted small"><i class="bi bi-person-circle"></i> Belum ada foto</p>';
    }

    document.getElementById('edit_researcher_photo_input').value = '';

    var editModal = new bootstrap.Modal(document.getElementById('editResearcherModal'));
    editModal.show();
}
</script>
@endpush
