@extends('layouts.dashboard')

@section('title', 'Edit Kontak - Dashboard')

@section('page-title', 'Kontak')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Kontak</li>
@endsection

@section('content')
<!-- Error Alert -->
@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
    <div class="d-flex align-items-start">
        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
        <div>
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<form action="{{ route('dashboard.contact.update') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <!-- Contact Information -->
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-info-circle text-primary me-2"></i>Informasi Kontak
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-whatsapp text-success me-1"></i> Nomor WhatsApp
                        </label>
                        <input type="text" class="form-control" name="whatsapp"
                               value="{{ old('whatsapp', $contact->whatsapp ?? '') }}"
                               placeholder="+62 812-3456-7890" required>
                        <small class="text-muted">Format: +62 XXX-XXXX-XXXX</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-link-45deg text-primary me-1"></i> Link WhatsApp
                        </label>
                        <input type="url" class="form-control" name="whatsapp_link"
                               value="{{ old('whatsapp_link', $contact->whatsapp_link ?? '') }}"
                               placeholder="https://wa.me/6281234567890" required>
                        <small class="text-muted">Format: https://wa.me/628XXXXXXXXXX</small>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-envelope text-danger me-1"></i> Email
                        </label>
                        <input type="email" class="form-control" name="email"
                               value="{{ old('email', $contact->email ?? '') }}"
                               placeholder="marori@wasur.com" required>
                    </div>

                    <div class="mb-0">
                        <label class="form-label fw-semibold">
                            <i class="bi bi-geo-alt text-warning me-1"></i> Alamat
                        </label>
                        <textarea class="form-control" name="address" rows="3" required
                                  placeholder="Taman Nasional Wasur&#10;Merauke, Papua Selatan&#10;Indonesia">{{ old('address', $contact->address ?? '') }}</textarea>
                        <small class="text-muted">Pisahkan setiap baris untuk alamat multi-baris</small>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-share text-info me-2"></i>Media Sosial
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label fw-semibold mb-0">
                                <i class="bi bi-instagram text-danger me-1"></i> Instagram
                            </label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_instagram_active" id="is_instagram_active"
                                       {{ old('is_instagram_active', $contact->is_instagram_active ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_instagram_active">Aktif</label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="instagram"
                               value="{{ old('instagram', $contact->instagram ?? '') }}"
                               placeholder="https://instagram.com/maroriwasur">
                        <small class="text-muted">Centang "Aktif" jika ingin ditampilkan di website</small>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label fw-semibold mb-0">
                                <i class="bi bi-facebook text-primary me-1"></i> Facebook
                            </label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_facebook_active" id="is_facebook_active"
                                       {{ old('is_facebook_active', $contact->is_facebook_active ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_facebook_active">Aktif</label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="facebook"
                               value="{{ old('facebook', $contact->facebook ?? '') }}"
                               placeholder="https://facebook.com/maroriwasur">
                        <small class="text-muted">Centang "Aktif" jika ingin ditampilkan di website</small>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label fw-semibold mb-0">
                                <i class="bi bi-youtube text-danger me-1"></i> YouTube
                            </label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_youtube_active" id="is_youtube_active"
                                       {{ old('is_youtube_active', $contact->is_youtube_active ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_youtube_active">Aktif</label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="youtube"
                               value="{{ old('youtube', $contact->youtube ?? '') }}"
                               placeholder="https://youtube.com/@maroriwasur">
                        <small class="text-muted">Centang "Aktif" jika ingin ditampilkan di website</small>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label fw-semibold mb-0">
                                <i class="bi bi-tiktok text-dark me-1"></i> TikTok
                            </label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_tiktok_active" id="is_tiktok_active"
                                       {{ old('is_tiktok_active', $contact->is_tiktok_active ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_tiktok_active">Aktif</label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="tiktok"
                               value="{{ old('tiktok', $contact->tiktok ?? '') }}"
                               placeholder="https://tiktok.com/@maroriwasur">
                        <small class="text-muted">Centang "Aktif" jika ingin ditampilkan di website</small>
                    </div>

                    <div class="mb-0">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label fw-semibold mb-0">
                                <i class="bi bi-twitter-x text-dark me-1"></i> Twitter / X
                            </label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_twitter_active" id="is_twitter_active"
                                       {{ old('is_twitter_active', $contact->is_twitter_active ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_twitter_active">Aktif</label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="twitter"
                               value="{{ old('twitter', $contact->twitter ?? '') }}"
                               placeholder="https://twitter.com/maroriwasur">
                        <small class="text-muted">Centang "Aktif" jika ingin ditampilkan di website</small>
                    </div>
                </div>
            </div>

            <!-- Marketplace -->
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-shop text-success me-2"></i>Marketplace
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Shopee Section -->
                    <div class="mb-4 pb-4 border-bottom">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="mb-0 fw-bold">
                                <i class="bi bi-bag-check text-danger me-1"></i> Shopee
                            </h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_shopee_active" id="is_shopee_active"
                                       {{ old('is_shopee_active', $contact->is_shopee_active ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_shopee_active">Aktif</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Shopee URL</label>
                                <input type="text" class="form-control" name="shopee_url"
                                       value="{{ old('shopee_url', $contact->shopee_url ?? '') }}"
                                       placeholder="https://shopee.co.id/marori.official">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Username Toko</label>
                                <input type="text" class="form-control" name="shopee_username"
                                       value="{{ old('shopee_username', $contact->shopee_username ?? '') }}"
                                       placeholder="@marori.official">
                            </div>
                        </div>
                        <small class="text-muted">Centang "Aktif" jika ingin ditampilkan di website</small>
                    </div>

                    <!-- Tokopedia Section -->
                    <div class="mb-0">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h6 class="mb-0 fw-bold">
                                <i class="bi bi-shop-window text-success me-1"></i> Tokopedia
                            </h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_tokopedia_active" id="is_tokopedia_active"
                                       {{ old('is_tokopedia_active', $contact->is_tokopedia_active ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_tokopedia_active">Aktif</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tokopedia URL</label>
                                <input type="text" class="form-control" name="tokopedia_url"
                                       value="{{ old('tokopedia_url', $contact->tokopedia_url ?? '') }}"
                                       placeholder="https://tokopedia.com/maroriwasur">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nama Toko</label>
                                <input type="text" class="form-control" name="tokopedia_store_name"
                                       value="{{ old('tokopedia_store_name', $contact->tokopedia_store_name ?? '') }}"
                                       placeholder="Marori Wasur Official">
                            </div>
                        </div>
                        <small class="text-muted">Centang "Aktif" jika ingin ditampilkan di website</small>
                    </div>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-geo-alt text-danger me-2"></i>Google Maps
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h6 class="mb-0 fw-bold">
                            <i class="bi bi-map text-danger me-1"></i> Peta Lokasi
                        </h6>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_maps_active" id="is_maps_active"
                                   {{ old('is_maps_active', $contact->is_maps_active ?? false) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_maps_active">Aktif</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Google Maps Embed URL</label>
                        <textarea class="form-control" name="maps_embed_url" rows="4"
                                  placeholder="https://www.google.com/maps/embed?pb=...">{{ old('maps_embed_url', $contact->maps_embed_url ?? '') }}</textarea>
                        <small class="text-muted">
                            <i class="bi bi-info-circle me-1"></i>
                            Cara: Buka Google Maps → Klik "Share" → Klik "Embed a map" → Copy link yang muncul
                        </small>
                    </div>
                    <small class="text-muted">Centang "Aktif" jika ingin ditampilkan di website</small>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-flex gap-2 mb-4">
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-check-circle me-2"></i>Simpan Perubahan
                </button>
            </div>
        </div>

        <!-- Preview Sidebar -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Preview Kontak</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex align-items-center gap-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
                            <div style="font-size: 2rem;"><i class="bi bi-whatsapp text-success"></i></div>
                            <div>
                                <strong style="display: block; margin-bottom: 4px;">WhatsApp</strong>
                                <small style="color: #6c757d;">{{ $contact->whatsapp ?? '+62 812-3456-7890' }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center gap-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
                            <div style="font-size: 2rem;"><i class="bi bi-envelope text-danger"></i></div>
                            <div>
                                <strong style="display: block; margin-bottom: 4px;">Email</strong>
                                <small style="color: #6c757d;">{{ $contact->email ?? 'marori@wasur.com' }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center gap-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
                            <div style="font-size: 2rem;"><i class="bi bi-geo-alt text-warning"></i></div>
                            <div>
                                <strong style="display: block; margin-bottom: 4px;">Lokasi</strong>
                                <small style="color: #6c757d;">{!! nl2br(e($contact->address ?? 'Taman Nasional Wasur')) !!}</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="d-flex align-items-center gap-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
                            <div style="font-size: 2rem;"><i class="bi bi-share text-info"></i></div>
                            <div>
                                <strong style="display: block; margin-bottom: 8px;">Media Sosial</strong>
                                <div class="d-flex flex-wrap gap-2">
                                    @if($contact && $contact->instagram)
                                    <span class="badge bg-danger">Instagram</span>
                                    @endif
                                    @if($contact && $contact->facebook)
                                    <span class="badge bg-primary">Facebook</span>
                                    @endif
                                    @if($contact && $contact->youtube)
                                    <span class="badge bg-danger">YouTube</span>
                                    @endif
                                    @if($contact && $contact->tiktok)
                                    <span class="badge bg-dark">TikTok</span>
                                    @endif
                                    @if($contact && $contact->twitter)
                                    <span class="badge bg-dark">Twitter</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0">Tips</h5>
                </div>
                <div class="card-body">
                    <ul class="mb-0" style="font-size: 0.9rem; line-height: 1.8;">
                        <li>Pastikan nomor WhatsApp aktif</li>
                        <li>Email harus valid dan ter-monitor</li>
                        <li>Tambahkan semua media sosial yang aktif</li>
                        <li>Update link marketplace secara berkala</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>

<style>
    .form-control:focus {
        border-color: #4A6B5A;
        box-shadow: 0 0 0 0.2rem rgba(74, 107, 90, 0.15);
    }

    .btn-success {
        background: linear-gradient(135deg, #4A6B5A 0%, #5A7868 100%);
        border: none;
    }

    .btn-success:hover {
        background: linear-gradient(135deg, #3a5b4a 0%, #4a6858 100%);
    }

    .alert {
        border-left: 4px solid;
    }

    .alert-success {
        border-left-color: #198754;
    }

    .alert-danger {
        border-left-color: #dc3545;
    }
</style>
@endsection
