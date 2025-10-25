<!-- Topbar -->
<div class="topbar">
    <div class="topbar-left">
        <h1>@yield('page-title', 'Dashboard')</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>
    <div class="topbar-right">
        <a href="{{ url('/') }}" target="_blank" class="topbar-btn">
            <i class="bi bi-eye"></i>
            Lihat Website
        </a>
        <a href="#" class="topbar-btn topbar-btn-primary" onclick="event.preventDefault(); if(confirm('Simpan semua perubahan?')) alert('Perubahan berhasil disimpan!');">
            <i class="bi bi-save"></i>
            Simpan Semua
        </a>
    </div>
</div>
