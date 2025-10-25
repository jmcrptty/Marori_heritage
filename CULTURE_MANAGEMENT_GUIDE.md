# Panduan Manajemen Budaya (Culture Items)

## Fitur yang Tersedia

Backend untuk mengelola card budaya dengan fitur lengkap:

### ✅ Fitur CRUD
1. **Create** - Tambah item budaya baru
2. **Read** - Lihat semua item budaya
3. **Update** - Edit item budaya yang ada
4. **Delete** - Hapus item budaya

### ✅ Fitur Tambahan
- Upload gambar untuk setiap item
- Toggle aktif/nonaktif (tampil/sembunyi di website)
- Urutan custom untuk slider
- Kategori item (Kesenian, Budaya, Arsitektur, dll)
- Icon Bootstrap sebagai fallback jika tidak ada gambar

## Setup Database

### 1. Migrate Database
```bash
php artisan migrate
```

### 2. Jalankan Seeder (Data Default)
```bash
php artisan db:seed --class=CultureItemSeeder
```

Seeder akan menambahkan 8 item budaya default:
- Tari Kreasi (Kesenian)
- Tari Manimbong (Kesenian)
- Ma'badong (Budaya)
- Baka/Nase (Budaya)
- Rumah Adat Marori (Arsitektur)
- Pakaian Adat (Tradisi)
- Senjata Tradisional (Warisan)
- Upacara Adat (Ritual)

### 3. Setup Storage untuk Upload Gambar
```bash
php artisan storage:link
```

## Cara Menggunakan

### Akses Dashboard
1. Login ke dashboard: `/dashboard`
2. Klik menu "Budaya" di sidebar

### Menambah Item Baru
1. Klik tombol "Tambah Item Baru"
2. Isi form:
   - **Judul**: Nama item budaya (required)
   - **Kategori**: Jenis budaya (required)
   - **Icon Bootstrap**: Kode icon dari Bootstrap Icons (required)
   - **Gambar**: Upload gambar (optional, max 2MB)
   - **Deskripsi**: Penjelasan singkat (optional)
   - **Urutan**: Urutan tampil di slider (auto-generated)
   - **Aktif**: Centang untuk menampilkan di website
3. Klik "Tambah Item"

### Mengedit Item
1. Klik tombol Edit (icon pensil) pada item yang ingin diedit
2. Ubah data yang diperlukan
3. Klik "Simpan Perubahan"

### Menghapus Item
1. Klik tombol Hapus (icon tempat sampah)
2. Konfirmasi penghapusan
3. Item akan terhapus dari database dan gambar akan dihapus dari storage

### Toggle Status Aktif/Nonaktif
- Klik icon mata (eye) untuk mengaktifkan/menonaktifkan item
- Item nonaktif tidak akan ditampilkan di website

## Tampilan Frontend

### Auto Slider
- Card budaya akan otomatis slide setiap 3 detik
- Slide bergerak 1 card per 1 card (bukan per halaman)
- Responsive design:
  - Desktop: 4 cards visible
  - Tablet: 3 cards visible
  - Mobile landscape: 2 cards visible
  - Mobile portrait: 1 card visible

### Interaksi
- Hover pada card untuk efek animasi
- Klik tombol kiri/kanan untuk navigasi manual
- Klik indicator dots untuk jump ke posisi tertentu
- Hover pada slider akan pause auto-slide

## File yang Terkait

### Backend
- **Migration**: `database/migrations/2024_01_01_000003_create_culture_items_table.php`
- **Model**: `app/Models/CultureItem.php`
- **Controller**: `app/Http/Controllers/Dashboard/CultureController.php`
- **Routes**: `routes/web.php`
- **Seeder**: `database/seeders/CultureItemSeeder.php`

### Frontend
- **Dashboard View**: `resources/views/dashboard/culture.blade.php`
- **Public View**: `resources/views/sections/culture.blade.php`
- **Controller**: `app/Http/Controllers/HomeController.php`

## Database Schema

```sql
culture_items:
- id (bigint, primary key)
- icon (string, 100) - Bootstrap icon class
- title (string, 200) - Nama item
- category (string, 100) - Kategori item
- image (string) - Path gambar
- description (text) - Deskripsi
- order (integer) - Urutan tampil
- is_active (boolean) - Status aktif
- created_at (timestamp)
- updated_at (timestamp)
```

## Tips

1. **Icon Bootstrap**: Cari icon di https://icons.getbootstrap.com/
   - Format: `bi-nama-icon` (contoh: `bi-person-arms-up`)

2. **Gambar**:
   - Format yang didukung: JPG, PNG, GIF
   - Ukuran maksimal: 2MB
   - Resolusi rekomendasi: 800x600px

3. **Urutan**:
   - Semakin kecil angka, semakin depan posisinya
   - Sistem akan auto-generate urutan baru di posisi terakhir

4. **Kategori**:
   - Bebas, bisa custom sesuai kebutuhan
   - Contoh: Kesenian, Budaya, Arsitektur, Tradisi, Warisan, Ritual

## Troubleshooting

### Gambar tidak muncul?
```bash
php artisan storage:link
```

### Error saat hapus item?
Pastikan permission folder `storage/app/public/culture-images` sudah benar

### Slider tidak jalan?
Cek apakah ada error di console browser (F12)

## Kontak
Untuk pertanyaan lebih lanjut, hubungi developer.
