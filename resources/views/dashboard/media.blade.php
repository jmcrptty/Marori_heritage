@extends('layouts.dashboard')

@section('title', 'Kelola Media Gallery')

@section('content')
<div class="content-header">
    <h1>Kelola Media Gallery</h1>
    <p class="text-muted">Kelola video dan foto galeri yang ditampilkan di website</p>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<!-- Video Gallery Management -->
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-play-circle me-2"></i>Video Gallery</h5>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addVideoModal">
            <i class="bi bi-plus-circle me-1"></i>Tambah Video
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>Thumbnail</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>YouTube URL</th>
                        <th>Featured</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Video 1 -->
                    <tr>
                        <td>1</td>
                        <td>
                            <img src="https://img.youtube.com/vi/KpCwki0hWDQ/mqdefault.jpg" alt="Video 1" class="img-thumbnail" style="width: 80px;">
                        </td>
                        <td>Kehidupan Suku Marori di Taman Nasional Wasur</td>
                        <td>Dokumenter tentang kehidupan sehari-hari masyarakat Suku Marori...</td>
                        <td>
                            <a href="https://www.youtube.com/watch?v=KpCwki0hWDQ" target="_blank" class="text-decoration-none">
                                <i class="bi bi-youtube text-danger"></i> KpCwki0hWDQ
                            </a>
                        </td>
                        <td><span class="badge bg-success">Ya</span></td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editVideoModal1">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete('video', 1)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Video 2 -->
                    <tr>
                        <td>2</td>
                        <td>
                            <img src="https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg" alt="Video 2" class="img-thumbnail" style="width: 80px;">
                        </td>
                        <td>Proses Pembuatan Noken Tradisional</td>
                        <td>Melihat langsung proses pembuatan tas noken...</td>
                        <td>
                            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="text-decoration-none">
                                <i class="bi bi-youtube text-danger"></i> dQw4w9WgXcQ
                            </a>
                        </td>
                        <td><span class="badge bg-secondary">Tidak</span></td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editVideoModal2">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete('video', 2)">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Photo Gallery Management -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-images me-2"></i>Photo Gallery</h5>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPhotoModal">
            <i class="bi bi-plus-circle me-1"></i>Tambah Foto
        </button>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <!-- Photo 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img src="https://via.placeholder.com/600x400/8B6F47/FFFFFF?text=Rumah+Adat" class="card-img-top" alt="Photo 1">
                    <div class="card-body">
                        <h6 class="card-title">Rumah Adat Marori</h6>
                        <p class="card-text text-muted small">Arsitektur tradisional dengan bahan alami</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPhotoModal1">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete('photo', 1)">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Photo 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img src="https://via.placeholder.com/600x400/4A7C59/FFFFFF?text=Kerajinan" class="card-img-top" alt="Photo 2">
                    <div class="card-body">
                        <h6 class="card-title">Kerajinan Tangan</h6>
                        <p class="card-text text-muted small">Proses pembuatan noken dan ukiran</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPhotoModal2">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete('photo', 2)">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Photo 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img src="https://via.placeholder.com/600x400/5C4033/FFFFFF?text=Tarian+Adat" class="card-img-top" alt="Photo 3">
                    <div class="card-body">
                        <h6 class="card-title">Tarian Tradisional</h6>
                        <p class="card-text text-muted small">Pertunjukan tari perang khas Marori</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPhotoModal3">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete('photo', 3)">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hero Video Background Settings -->
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-camera-video me-2"></i>Hero Video Background</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dashboard.media.updateHeroVideo') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Aktifkan Video Background</label>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="enableVideoBackground" name="enable_video_background" checked>
                    <label class="form-check-label" for="enableVideoBackground">
                        Gunakan video YouTube sebagai background hero section
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <label for="heroVideoUrl" class="form-label">YouTube Video URL atau ID</label>
                <input type="text" class="form-control" id="heroVideoUrl" name="hero_video_url" value="KpCwki0hWDQ" placeholder="Contoh: KpCwki0hWDQ atau https://www.youtube.com/watch?v=KpCwki0hWDQ">
                <div class="form-text">Masukkan YouTube Video ID atau URL lengkap</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Preview</label>
                <div class="ratio ratio-16x9" style="max-width: 600px;">
                    <iframe id="previewIframe" src="https://www.youtube.com/embed/KpCwki0hWDQ" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-2"></i>Simpan Pengaturan
            </button>
        </form>
    </div>
</div>

<!-- Modal: Add Video -->
<div class="modal fade" id="addVideoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Video Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('dashboard.media.addVideo') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="videoTitle" class="form-label">Judul Video</label>
                        <input type="text" class="form-control" id="videoTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="videoDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="videoDescription" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="videoUrl" class="form-label">YouTube Video URL atau ID</label>
                        <input type="text" class="form-control" id="videoUrl" name="youtube_url" placeholder="Contoh: KpCwki0hWDQ" required>
                    </div>
                    <div class="mb-3">
                        <label for="videoViews" class="form-label">Jumlah Views (opsional)</label>
                        <input type="text" class="form-control" id="videoViews" name="views" placeholder="Contoh: 12.5K">
                    </div>
                    <div class="mb-3">
                        <label for="videoDate" class="form-label">Tanggal Upload (opsional)</label>
                        <input type="text" class="form-control" id="videoDate" name="upload_date" placeholder="Contoh: 2 bulan lalu">
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="videoFeatured" name="is_featured">
                            <label class="form-check-label" for="videoFeatured">
                                Jadikan video featured (tampilan besar)
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Video</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Add Photo -->
<div class="modal fade" id="addPhotoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Foto Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('dashboard.media.addPhoto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="photoTitle" class="form-label">Judul Foto</label>
                        <input type="text" class="form-control" id="photoTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="photoCaption" class="form-label">Caption</label>
                        <textarea class="form-control" id="photoCaption" name="caption" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photoFile" class="form-label">Upload Foto</label>
                        <input type="file" class="form-control" id="photoFile" name="photo" accept="image/*" required>
                        <div class="form-text">Format: JPG, PNG, WEBP. Maksimal 2MB</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Foto</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete(type, id) {
        if (confirm(`Apakah Anda yakin ingin menghapus ${type} ini?`)) {
            // Submit delete form
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/dashboard/media/delete-${type}/${id}`;

            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';

            const methodField = document.createElement('input');
            methodField.type = 'hidden';
            methodField.name = '_method';
            methodField.value = 'DELETE';

            form.appendChild(csrfToken);
            form.appendChild(methodField);
            document.body.appendChild(form);
            form.submit();
        }
    }

    // Preview hero video
    document.getElementById('heroVideoUrl')?.addEventListener('input', function(e) {
        let videoId = e.target.value;

        // Extract video ID from URL if full URL is provided
        if (videoId.includes('youtube.com') || videoId.includes('youtu.be')) {
            const urlParams = new URLSearchParams(new URL(videoId).search);
            videoId = urlParams.get('v') || videoId.split('/').pop();
        }

        // Update preview iframe
        document.getElementById('previewIframe').src = `https://www.youtube.com/embed/${videoId}`;
    });
</script>

<style>
    .img-thumbnail {
        object-fit: cover;
        height: 60px;
    }

    .table td {
        vertical-align: middle;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
</style>
@endsection
