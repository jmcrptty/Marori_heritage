@extends('layouts.dashboard')

@section('title', 'Edit Produk - Dashboard')

@section('page-title', 'Produk')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Produk</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            Kelola produk yang ditampilkan di website. Tambah, edit, atau hapus produk.
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Produk ({{ $products->count() }})</h5>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="bi bi-plus-lg me-1"></i>Tambah Produk Baru
                </button>
            </div>
            <div class="card-body">
                @if($products->count() > 0)
                <div class="row g-3">
                    @foreach($products as $product)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100">
                            <div style="height: 200px; background: linear-gradient(135deg, #FFFBF0 0%, #F5E6D3 100%); display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                <i class="bi bi-image" style="font-size: 3rem; color: #8B6F47;"></i>
                                @endif
                            </div>
                            <div class="card-body">
                                @php
                                    $badgeClass = 'bg-secondary';
                                    if($product->category == 'Kerajinan Tangan') $badgeClass = 'bg-success';
                                    elseif($product->category == 'Makanan') $badgeClass = 'bg-warning';
                                    elseif($product->category == 'Aksesoris') $badgeClass = 'bg-info';
                                    elseif($product->category == 'Kesehatan') $badgeClass = 'bg-danger';
                                @endphp
                                <span class="badge {{ $badgeClass }} mb-2">{{ $product->category }}</span>
                                <h6 class="card-title">{{ $product->name }}</h6>
                                <p class="card-text small text-muted">{{ Str::limit($product->description, 60) }}</p>
                                <p class="fw-bold text-primary mb-2">{{ $product->price }}</p>
                                @if($product->shopee_link || $product->tokopedia_link)
                                <div class="mb-2">
                                    @if($product->shopee_link)
                                    <a href="{{ $product->shopee_link }}" target="_blank" class="badge bg-warning text-dark text-decoration-none me-1">
                                        <i class="bi bi-shop"></i> Shopee
                                    </a>
                                    @endif
                                    @if($product->tokopedia_link)
                                    <a href="{{ $product->tokopedia_link }}" target="_blank" class="badge bg-success text-decoration-none">
                                        <i class="bi bi-bag"></i> Tokopedia
                                    </a>
                                    @endif
                                </div>
                                @endif
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary flex-fill"
                                            onclick='editProduct(@json($product->id), @json($product->name), @json($product->category), @json($product->description), @json($product->price), @json($product->image), @json($product->shopee_link), @json($product->tokopedia_link))'>
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <form action="{{ route('dashboard.products.delete', $product->id) }}" method="POST" onsubmit="return confirmDelete('{{ addslashes($product->name) }}')" class="d-inline">
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
                    <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                    <p class="text-muted mt-3">Belum ada produk. Klik "Tambah Produk Baru" untuk menambahkan.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select name="category" class="form-select" required>
                                <option value="Kerajinan Tangan" {{ old('category') == 'Kerajinan Tangan' ? 'selected' : '' }}>Kerajinan Tangan</option>
                                <option value="Makanan" {{ old('category') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                                <option value="Aksesoris" {{ old('category') == 'Aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                <option value="Kesehatan" {{ old('category') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga <span class="text-danger">*</span></label>
                        <input type="text" name="price" class="form-control" placeholder="Rp 100.000 - Rp 500.000" required value="{{ old('price') }}">
                        <small class="text-muted">Contoh: Rp 100.000 - Rp 500.000 atau Rp 45.000 / kg</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Produk</label>
                        <input type="file" id="add_product_image_input" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB.</small>
                    </div>

                    <!-- Crop Container for Add Product -->
                    <div id="add_product_crop_container" style="display: none;">
                        <div class="alert alert-info mb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Ukuran Rekomendasi:</strong> Aspect Ratio 1:1 (Square/Persegi)
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="crop-preview-container mb-3" style="background: #f8f9fa; border: 2px dashed #dee2e6; border-radius: 8px; padding: 15px; max-height: 400px; overflow: hidden;">
                                    <img id="add_product_crop_image" style="max-width: 100%; display: block;">
                                </div>
                                <div class="d-flex gap-2 justify-content-center">
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="resetAddProductCrop()">
                                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="rotateAddProductImage(-90)">
                                        <i class="bi bi-arrow-counterclockwise"></i> Putar Kiri
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="rotateAddProductImage(90)">
                                        <i class="bi bi-arrow-clockwise"></i> Putar Kanan
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Preview Produk</label>
                                <div class="product-preview-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                    <div class="product-preview-image" style="width: 100%; aspect-ratio: 1/1; background: linear-gradient(135deg, #FFFBF0 0%, #F5E6D3 100%); display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                        <canvas id="add_product_preview_canvas" style="width: 100%; height: 100%; object-fit: cover;"></canvas>
                                    </div>
                                    <div class="p-2 text-center">
                                        <small class="text-muted">Tampilan di website</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link Shopee (opsional)</label>
                            <input type="url" name="shopee_link" class="form-control" value="{{ old('shopee_link') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link Tokopedia (opsional)</label>
                            <input type="url" name="tokopedia_link" class="form-control" value="{{ old('tokopedia_link') }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editProductForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="edit_name" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select name="category" id="edit_category" class="form-select" required>
                                <option value="Kerajinan Tangan">Kerajinan Tangan</option>
                                <option value="Makanan">Makanan</option>
                                <option value="Aksesoris">Aksesoris</option>
                                <option value="Kesehatan">Kesehatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" id="edit_description" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga <span class="text-danger">*</span></label>
                        <input type="text" name="price" id="edit_price" class="form-control" placeholder="Rp 100.000 - Rp 500.000" required>
                        <small class="text-muted">Contoh: Rp 100.000 - Rp 500.000 atau Rp 45.000 / kg</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Produk Saat Ini</label>
                        <div id="current_image_preview" class="mb-2"></div>
                        <input type="file" id="edit_product_image_input" class="form-control" accept="image/*">
                        <small class="text-muted">Format: JPG, PNG, WEBP. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                    </div>

                    <!-- Crop Container for Edit Product -->
                    <div id="edit_product_crop_container" style="display: none;">
                        <div class="alert alert-info mb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Ukuran Rekomendasi:</strong> Aspect Ratio 1:1 (Square/Persegi)
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="crop-preview-container mb-3" style="background: #f8f9fa; border: 2px dashed #dee2e6; border-radius: 8px; padding: 15px; max-height: 400px; overflow: hidden;">
                                    <img id="edit_product_crop_image" style="max-width: 100%; display: block;">
                                </div>
                                <div class="d-flex gap-2 justify-content-center">
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="resetEditProductCrop()">
                                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="rotateEditProductImage(-90)">
                                        <i class="bi bi-arrow-counterclockwise"></i> Putar Kiri
                                    </button>
                                    <button type="button" class="btn btn-sm btn-secondary" onclick="rotateEditProductImage(90)">
                                        <i class="bi bi-arrow-clockwise"></i> Putar Kanan
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Preview Produk</label>
                                <div class="product-preview-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                    <div class="product-preview-image" style="width: 100%; aspect-ratio: 1/1; background: linear-gradient(135deg, #FFFBF0 0%, #F5E6D3 100%); display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                        <canvas id="edit_product_preview_canvas" style="width: 100%; height: 100%; object-fit: cover;"></canvas>
                                    </div>
                                    <div class="p-2 text-center">
                                        <small class="text-muted">Tampilan di website</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link Shopee (opsional)</label>
                            <input type="url" name="shopee_link" id="edit_shopee_link" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Link Tokopedia (opsional)</label>
                            <input type="url" name="tokopedia_link" id="edit_tokopedia_link" class="form-control">
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
// Variables for Add Product cropper
let addProductCropper = null;
let addProductOriginalImage = null;

// Variables for Edit Product cropper
let editProductCropper = null;
let editProductOriginalImage = null;

// ============================================
// ADD PRODUCT CROPPER FUNCTIONALITY
// ============================================

document.getElementById('add_product_image_input').addEventListener('change', function(e) {
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
            addProductOriginalImage = event.target.result;
            document.getElementById('add_product_crop_image').src = event.target.result;
            document.getElementById('add_product_crop_container').style.display = 'block';

            // Destroy previous cropper if exists
            if (addProductCropper) {
                addProductCropper.destroy();
            }

            const image = document.getElementById('add_product_crop_image');
            addProductCropper = new Cropper(image, {
                aspectRatio: 1, // 1:1 ratio for square product images
                viewMode: 1,
                autoCropArea: 1,
                responsive: true,
                crop: function(event) {
                    updateAddProductPreview();
                }
            });
        };
        reader.readAsDataURL(file);
    }
});

function updateAddProductPreview() {
    if (!addProductCropper) return;

    const canvas = document.getElementById('add_product_preview_canvas');
    const previewCanvas = addProductCropper.getCroppedCanvas({
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

function resetAddProductCrop() {
    if (addProductCropper) {
        addProductCropper.reset();
    }
}

function rotateAddProductImage(degrees) {
    if (addProductCropper) {
        addProductCropper.rotate(degrees);
    }
}

// Handle Add Product Form Submission
document.querySelector('#addProductModal form').addEventListener('submit', function(e) {
    if (addProductCropper) {
        e.preventDefault();

        addProductCropper.getCroppedCanvas({
            maxWidth: 800,
            maxHeight: 800,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high',
        }).toBlob(function(blob) {
            const formData = new FormData();

            // Add all form fields
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('name', document.querySelector('#addProductModal [name="name"]').value);
            formData.append('category', document.querySelector('#addProductModal [name="category"]').value);
            formData.append('description', document.querySelector('#addProductModal [name="description"]').value);
            formData.append('price', document.querySelector('#addProductModal [name="price"]').value);
            formData.append('shopee_link', document.querySelector('#addProductModal [name="shopee_link"]').value);
            formData.append('tokopedia_link', document.querySelector('#addProductModal [name="tokopedia_link"]').value);

            // Add cropped image
            formData.append('image', blob, 'product-image.jpg');

            // Submit via AJAX
            fetch('{{ route("dashboard.products.store") }}', {
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
                    alert(data.message || 'Terjadi kesalahan saat menyimpan produk');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan produk');
            });
        }, 'image/jpeg', 0.9);
    }
});

// Reset cropper when Add modal is closed
document.getElementById('addProductModal').addEventListener('hidden.bs.modal', function() {
    if (addProductCropper) {
        addProductCropper.destroy();
        addProductCropper = null;
    }
    document.getElementById('add_product_crop_container').style.display = 'none';
    document.getElementById('add_product_image_input').value = '';
});

// ============================================
// EDIT PRODUCT CROPPER FUNCTIONALITY
// ============================================

document.getElementById('edit_product_image_input').addEventListener('change', function(e) {
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
            editProductOriginalImage = event.target.result;
            document.getElementById('edit_product_crop_image').src = event.target.result;
            document.getElementById('edit_product_crop_container').style.display = 'block';

            // Destroy previous cropper if exists
            if (editProductCropper) {
                editProductCropper.destroy();
            }

            const image = document.getElementById('edit_product_crop_image');
            editProductCropper = new Cropper(image, {
                aspectRatio: 1, // 1:1 ratio for square product images
                viewMode: 1,
                autoCropArea: 1,
                responsive: true,
                crop: function(event) {
                    updateEditProductPreview();
                }
            });
        };
        reader.readAsDataURL(file);
    }
});

function updateEditProductPreview() {
    if (!editProductCropper) return;

    const canvas = document.getElementById('edit_product_preview_canvas');
    const previewCanvas = editProductCropper.getCroppedCanvas({
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

function resetEditProductCrop() {
    if (editProductCropper) {
        editProductCropper.reset();
    }
}

function rotateEditProductImage(degrees) {
    if (editProductCropper) {
        editProductCropper.rotate(degrees);
    }
}

// Handle Edit Product Form Submission
document.getElementById('editProductForm').addEventListener('submit', function(e) {
    if (editProductCropper) {
        e.preventDefault();

        editProductCropper.getCroppedCanvas({
            maxWidth: 800,
            maxHeight: 800,
            imageSmoothingEnabled: true,
            imageSmoothingQuality: 'high',
        }).toBlob(function(blob) {
            const formData = new FormData();

            // Add all form fields
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('name', document.getElementById('edit_name').value);
            formData.append('category', document.getElementById('edit_category').value);
            formData.append('description', document.getElementById('edit_description').value);
            formData.append('price', document.getElementById('edit_price').value);
            formData.append('shopee_link', document.getElementById('edit_shopee_link').value);
            formData.append('tokopedia_link', document.getElementById('edit_tokopedia_link').value);

            // Add cropped image
            formData.append('image', blob, 'product-image.jpg');

            const form = document.getElementById('editProductForm');

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
                    alert(data.message || 'Terjadi kesalahan saat menyimpan produk');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menyimpan produk');
            });
        }, 'image/jpeg', 0.9);
    }
});

// Reset cropper when Edit modal is closed
document.getElementById('editProductModal').addEventListener('hidden.bs.modal', function() {
    if (editProductCropper) {
        editProductCropper.destroy();
        editProductCropper = null;
    }
    document.getElementById('edit_product_crop_container').style.display = 'none';
    document.getElementById('edit_product_image_input').value = '';
});

// ============================================
// EXISTING FUNCTIONS
// ============================================

function editProduct(id, name, category, description, price, image, shopee, tokopedia) {
    // Reset cropper if exists
    if (editProductCropper) {
        editProductCropper.destroy();
        editProductCropper = null;
    }
    document.getElementById('edit_product_crop_container').style.display = 'none';

    // Set form action
    document.getElementById('editProductForm').action = "{{ url('dashboard/products/update') }}/" + id;

    // Fill form fields
    document.getElementById('edit_name').value = name || '';
    document.getElementById('edit_category').value = category || 'Kerajinan Tangan';
    document.getElementById('edit_description').value = description || '';
    document.getElementById('edit_price').value = price || '';
    document.getElementById('edit_shopee_link').value = shopee || '';
    document.getElementById('edit_tokopedia_link').value = tokopedia || '';

    // Show current image preview
    const imagePreview = document.getElementById('current_image_preview');
    if (image && image !== 'null') {
        imagePreview.innerHTML = `
            <div class="border rounded p-2 bg-light">
                <img src="/storage/${image}" alt="${name}"
                     style="max-width: 100%; max-height: 200px; object-fit: contain; display: block; margin: 0 auto; border-radius: 8px;"
                     onerror="this.parentElement.innerHTML='<p class=text-danger><i class=bi bi-exclamation-circle></i> Gagal memuat gambar</p>'">
            </div>
        `;
    } else {
        imagePreview.innerHTML = '<p class="text-muted small"><i class="bi bi-image"></i> Belum ada foto</p>';
    }

    // Clear file input
    document.getElementById('edit_product_image_input').value = '';

    // Show modal
    var editModal = new bootstrap.Modal(document.getElementById('editProductModal'));
    editModal.show();
}

function confirmDelete(productName) {
    return confirm('Yakin ingin menghapus produk "' + productName + '"?\nTindakan ini tidak dapat dibatalkan.');
}
</script>
@endpush
