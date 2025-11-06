@extends('layouts.dashboard')

@section('title', 'Kelola Puisi Marori - Dashboard')

@section('page-title', 'Puisi Marori')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Puisi Marori</li>
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
            Kelola puisi tradisional Marori yang ditampilkan di website. Tambah, edit, atau hapus puisi beserta audio dan terjemahannya.
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="bi bi-mic me-2"></i>Daftar Puisi ({{ $poetries->count() }})</h5>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addPoetryModal">
            <i class="bi bi-plus-lg me-1"></i>Tambah Puisi Baru
        </button>
    </div>
    <div class="card-body">
        @if($poetries->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="50">#</th>
                        <th>Judul</th>
                        <th>Puisi (Marori)</th>
                        <th>Terjemahan</th>
                        <th>Penulis</th>
                        <th width="100" class="text-center">Audio</th>
                        <th width="100" class="text-center">Status</th>
                        <th width="100" class="text-center">Urutan</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($poetries as $index => $poetry)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <strong class="text-primary">{{ $poetry->title ?? 'Tanpa Judul' }}</strong>
                        </td>
                        <td>
                            <div class="text-truncate" style="max-width: 200px;" title="{{ $poetry->content }}">
                                {{ Str::limit($poetry->content, 80) }}
                            </div>
                        </td>
                        <td>
                            <div class="text-truncate" style="max-width: 200px;" title="{{ $poetry->translation }}">
                                {{ Str::limit($poetry->translation, 80) }}
                            </div>
                        </td>
                        <td>
                            <small class="text-muted">
                                <i class="bi bi-person"></i> {{ $poetry->author ?? '-' }}
                            </small>
                        </td>
                        <td class="text-center">
                            @if($poetry->audio_file)
                            <span class="badge bg-success">
                                <i class="bi bi-volume-up-fill"></i> Ada
                            </span>
                            @else
                            <span class="badge bg-secondary">
                                <i class="bi bi-volume-mute"></i> Belum Ada
                            </span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($poetry->is_active)
                            <span class="badge bg-success">Aktif</span>
                            @else
                            <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <input type="number"
                                   class="form-control form-control-sm text-center order-input"
                                   value="{{ $poetry->order }}"
                                   data-poetry-id="{{ $poetry->id }}"
                                   style="width: 70px; display: inline-block;">
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-outline-primary"
                                        onclick="editPoetry({{ $poetry->id }}, {{ json_encode($poetry->title) }}, {{ json_encode($poetry->content) }}, {{ json_encode($poetry->translation) }}, {{ json_encode($poetry->author) }}, {{ json_encode($poetry->audio_file) }}, {{ $poetry->is_active ? 'true' : 'false' }}, {{ $poetry->order }})"
                                        title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('admin.poetry.destroy', $poetry->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus puisi ini?')"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-5">
            <i class="bi bi-mic" style="font-size: 3rem; color: #ccc;"></i>
            <p class="text-muted mt-3">Belum ada puisi. Klik "Tambah Puisi Baru" untuk menambahkan.</p>
        </div>
        @endif
    </div>
</div>

<!-- Add Poetry Modal -->
<div class="modal fade" id="addPoetryModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{ route('admin.poetry.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Puisi Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Judul -->
                    <div class="mb-3">
                        <label class="form-label">Judul Puisi</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Opsional">
                        <small class="text-muted">Opsional - Judul untuk identifikasi puisi</small>
                    </div>

                    <div class="row">
                        <!-- Content -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Puisi (Bahasa Marori) <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" rows="8" required placeholder="Masukkan puisi dalam bahasa Marori...">{{ old('content') }}</textarea>
                        </div>

                        <!-- Translation -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Terjemahan (Bahasa Indonesia) <span class="text-danger">*</span></label>
                            <textarea name="translation" class="form-control" rows="8" required placeholder="Masukkan terjemahan...">{{ old('translation') }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Audio -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">File Audio (MP3/WAV/OGG)</label>
                            <input type="file" name="audio_file" id="add_audio_file" class="form-control" accept=".mp3,.wav,.ogg">
                            <small class="text-muted d-block">Max: 50MB</small>
                            <div id="add_file_info" class="mt-2"></div>
                        </div>

                        <!-- Author -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Penulis / Penutur</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author') }}" placeholder="Nama penulis atau penutur">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Order -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Urutan Tampil</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}" min="0">
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="add_is_active" checked>
                                <label class="form-check-label" for="add_is_active">Aktifkan puisi ini</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Tambah Puisi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Poetry Modal -->
<div class="modal fade" id="editPoetryModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="editPoetryForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Puisi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <!-- Judul -->
                    <div class="mb-3">
                        <label class="form-label">Judul Puisi</label>
                        <input type="text" name="title" id="edit_title" class="form-control" placeholder="Opsional">
                    </div>

                    <div class="row">
                        <!-- Content -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Puisi (Bahasa Marori) <span class="text-danger">*</span></label>
                            <textarea name="content" id="edit_content" class="form-control" rows="8" required></textarea>
                        </div>

                        <!-- Translation -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Terjemahan (Bahasa Indonesia) <span class="text-danger">*</span></label>
                            <textarea name="translation" id="edit_translation" class="form-control" rows="8" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Audio -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">File Audio Saat Ini</label>
                            <div id="current_audio_preview" class="mb-2"></div>
                            <input type="file" name="audio_file" id="edit_audio_file" class="form-control" accept=".mp3,.wav,.ogg">
                            <small class="text-muted d-block">Upload file baru untuk mengganti. Max: 50MB</small>
                            <div id="edit_file_info" class="mt-2"></div>
                        </div>

                        <!-- Author -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Penulis / Penutur</label>
                            <input type="text" name="author" id="edit_author" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Order -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Urutan Tampil</label>
                            <input type="number" name="order" id="edit_order" class="form-control" min="0">
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" name="is_active" id="edit_is_active">
                                <label class="form-check-label" for="edit_is_active">Aktifkan puisi ini</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// File upload preview - Add form
const addAudioInput = document.getElementById('add_audio_file');
if (addAudioInput) {
    addAudioInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        const infoDiv = document.getElementById('add_file_info');

        if (file) {
            const sizeMB = (file.size / 1024 / 1024).toFixed(2);
            infoDiv.innerHTML = `
                <div class="alert alert-info alert-sm p-2">
                    <small><strong>File dipilih:</strong> ${file.name}</small><br>
                    <small><strong>Ukuran:</strong> ${sizeMB} MB</small><br>
                    <small><strong>Tipe:</strong> ${file.type}</small>
                </div>
            `;
        } else {
            infoDiv.innerHTML = '';
        }
    });
}

// File upload preview - Edit form
const editAudioInput = document.getElementById('edit_audio_file');
if (editAudioInput) {
    editAudioInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        const infoDiv = document.getElementById('edit_file_info');

        if (file) {
            const sizeMB = (file.size / 1024 / 1024).toFixed(2);
            infoDiv.innerHTML = `
                <div class="alert alert-info alert-sm p-2">
                    <small><strong>File dipilih:</strong> ${file.name}</small><br>
                    <small><strong>Ukuran:</strong> ${sizeMB} MB</small><br>
                    <small><strong>Tipe:</strong> ${file.type}</small>
                </div>
            `;
        } else {
            infoDiv.innerHTML = '';
        }
    });
}

// Auto-save order on change
let orderTimeout;
document.querySelectorAll('.order-input').forEach(input => {
    input.addEventListener('input', function() {
        clearTimeout(orderTimeout);
        const poetryId = this.dataset.poetryId;
        const newOrder = this.value;

        orderTimeout = setTimeout(() => {
            fetch('{{ route("admin.poetry.updateOrder") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    poetry_id: poetryId,
                    order: newOrder
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.style.borderColor = '#28a745';
                    setTimeout(() => {
                        this.style.borderColor = '';
                    }, 1000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal mengupdate urutan');
            });
        }, 800);
    });
});

// Edit Poetry Function
function editPoetry(id, title, content, translation, author, audio_file, is_active, order) {
    document.getElementById('editPoetryForm').action = "{{ url('dashboard/poetry/update') }}/" + id;
    document.getElementById('edit_title').value = title || '';
    document.getElementById('edit_content').value = content || '';
    document.getElementById('edit_translation').value = translation || '';
    document.getElementById('edit_author').value = author || '';
    document.getElementById('edit_order').value = order || 0;
    document.getElementById('edit_is_active').checked = is_active ? true : false;

    // Show current audio
    const audioPreview = document.getElementById('current_audio_preview');
    if (audio_file && audio_file !== 'null' && audio_file !== null) {
        audioPreview.innerHTML = `
            <div class="alert alert-success p-2 mb-2">
                <small class="d-block mb-1"><i class="bi bi-volume-up-fill"></i> Audio tersedia</small>
                <audio controls class="w-100" style="height: 35px;">
                    <source src="/storage/${audio_file}" type="audio/mpeg">
                </audio>
            </div>
        `;
    } else {
        audioPreview.innerHTML = '<p class="text-muted small mb-2"><i class="bi bi-volume-mute"></i> Belum ada audio</p>';
    }

    // Show modal
    var editModal = new bootstrap.Modal(document.getElementById('editPoetryModal'));
    editModal.show();
}
</script>
@endpush
