@extends('layouts.dashboard')

@section('title', 'Edit Kontak - Dashboard')

@section('page-title', 'Kontak')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Kontak</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            Kelola informasi kontak yang ditampilkan di website
        </div>
    </div>
</div>

<form action="#" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informasi Kontak</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Nomor WhatsApp</label>
                        <input type="text" class="form-control" name="whatsapp" value="+62 812-3456-7890" required>
                        <small class="text-muted">Format: +62 XXX-XXXX-XXXX</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Link WhatsApp</label>
                        <input type="url" class="form-control" name="whatsapp_link" value="https://wa.me/6281234567890" required>
                        <small class="text-muted">Format: https://wa.me/628XXXXXXXXXX</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="marori@wasur.com" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" name="address" rows="3" required>Taman Nasional Wasur
Merauke, Papua Selatan
Indonesia</textarea>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Media Sosial</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Instagram</label>
                        <input type="url" class="form-control" name="instagram" placeholder="https://instagram.com/marori_wasur">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Facebook</label>
                        <input type="url" class="form-control" name="facebook" placeholder="https://facebook.com/marori.wasur">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">YouTube</label>
                        <input type="url" class="form-control" name="youtube" placeholder="https://youtube.com/@marori_wasur">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Jam Operasional</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Senin - Jumat</label>
                            <input type="text" class="form-control" name="weekday_hours" value="08:00 - 17:00 WIT" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Sabtu</label>
                            <input type="text" class="form-control" name="saturday_hours" value="08:00 - 14:00 WIT" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Minggu & Hari Libur</label>
                            <input type="text" class="form-control" name="sunday_hours" value="Tutup" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Respon WhatsApp</label>
                            <input type="text" class="form-control" name="whatsapp_response" value="24/7" required>
                        </div>
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
                    <h5 class="card-title">Preview Kontak</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
                            <div style="font-size: 2rem;">📱</div>
                            <div>
                                <strong style="display: block; margin-bottom: 4px;">WhatsApp</strong>
                                <small style="color: #6c757d;">+62 812-3456-7890</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
                            <div style="font-size: 2rem;">📧</div>
                            <div>
                                <strong style="display: block; margin-bottom: 4px;">Email</strong>
                                <small style="color: #6c757d;">marori@wasur.com</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
                            <div style="font-size: 2rem;">📍</div>
                            <div>
                                <strong style="display: block; margin-bottom: 4px;">Lokasi</strong>
                                <small style="color: #6c757d;">Taman Nasional Wasur<br>Merauke, Papua Selatan</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-0">
                        <div class="d-flex align-items-center gap-3 p-3" style="background: #f8f9fa; border-radius: 8px;">
                            <div style="font-size: 2rem;">🌐</div>
                            <div>
                                <strong style="display: block; margin-bottom: 8px;">Media Sosial</strong>
                                <div class="d-flex gap-2">
                                    <span class="badge bg-primary">Instagram</span>
                                    <span class="badge bg-primary">Facebook</span>
                                    <span class="badge bg-primary">YouTube</span>
                                </div>
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
                        <li>Pastikan nomor WhatsApp aktif</li>
                        <li>Email harus valid dan ter-monitor</li>
                        <li>Update jam operasional secara berkala</li>
                        <li>Tambahkan semua media sosial yang aktif</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
