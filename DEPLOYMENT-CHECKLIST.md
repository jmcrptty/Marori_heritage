# 🚀 CHECKLIST DEPLOYMENT - WEBSITE MARORI WASUR

## ✅ STATUS KESIAPAN: **HAMPIR SIAP** (90%)

Website Marori Wasur sudah hampir siap untuk di-hosting. Berikut adalah review lengkap dan langkah-langkah yang perlu dilakukan sebelum deployment.

---

## 📋 YANG SUDAH SIAP

### ✅ Struktur Aplikasi
- [x] Laravel 12 (versi terbaru) sudah terinstall
- [x] Composer dependencies lengkap
- [x] NPM dependencies sudah terkonfigurasi
- [x] File struktur Laravel sudah lengkap
- [x] .gitignore sudah benar (file sensitif tidak ter-commit)

### ✅ Konfigurasi File Upload
- [x] MAX_AUDIO_UPLOAD_SIZE sudah dikonfigurasi (50MB)
- [x] public/index.php sudah override PHP upload limits
- [x] public/.user.ini sudah ada untuk shared hosting
- [x] public/.htaccess sudah ada
- [x] PoetryController sudah handle upload dengan aman

### ✅ Fitur Website
- [x] Hero Section dengan parallax background
- [x] About Section
- [x] Products Section
- [x] Researchers/Team Section
- [x] Marori Poetry Section dengan audio player
- [x] Media Gallery (Video & Photo)
- [x] Contact Section
- [x] Admin Dashboard untuk manage konten
- [x] Authentication system (Laravel Breeze)
- [x] Responsive design untuk semua ukuran layar
- [x] Traditional Papua pattern overlay

### ✅ Database
- [x] Migrations sudah lengkap
- [x] Models sudah ada
- [x] Relationships sudah proper
- [x] Session menggunakan database (bukan file)

---

## ⚠️ YANG PERLU DISESUAIKAN SEBELUM HOSTING

### 🔴 CRITICAL - Wajib Dilakukan

#### 1. **Environment Configuration (.env)**
File `.env` saat ini masih dalam mode development. Ubah nilai berikut:

```bash
# Dari:
APP_ENV=local
APP_DEBUG=true
APP_URL=http://marori.test
LOG_LEVEL=debug

# Menjadi:
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domainanda.com  # Ganti dengan domain asli
LOG_LEVEL=error
```

#### 2. **Database Configuration**
Update kredensial database dengan yang disediakan hosting:

```bash
DB_CONNECTION=mysql
DB_HOST=localhost  # Biasanya localhost di shared hosting
DB_PORT=3306
DB_DATABASE=nama_database_production
DB_USERNAME=user_database_production
DB_PASSWORD=password_yang_kuat_dan_aman
```

#### 3. **App Name**
```bash
APP_NAME="Suku Marori Wasur"  # Nama website yang benar
```

#### 4. **Generate Production APP_KEY**
Jika belum ada atau ingin generate ulang:
```bash
php artisan key:generate
```

### 🟡 IMPORTANT - Sangat Disarankan

#### 5. **Email Configuration**
Jika website perlu mengirim email (notifikasi, contact form):

```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com  # Atau SMTP hosting Anda
MAIL_PORT=587
MAIL_USERNAME=email@domain.com
MAIL_PASSWORD=password_email_atau_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@domain.com
MAIL_FROM_NAME="${APP_NAME}"
```

#### 6. **Compile Assets untuk Production**
Jalankan command ini sebelum upload:

```bash
npm install
npm run build
```

Ini akan mengcompile dan optimize CSS/JS di folder `public/build/`

#### 7. **Optimize Laravel untuk Production**
Setelah upload ke server, jalankan:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
```

#### 8. **Storage Symlink**
Pastikan storage link sudah dibuat di server:

```bash
php artisan storage:link
```

Ini membuat symbolic link dari `storage/app/public` ke `public/storage`

#### 9. **File Permissions**
Set permission yang benar di server (via SSH atau File Manager):

```bash
# Untuk folders
chmod 755 storage
chmod 755 bootstrap/cache

# Untuk files di storage dan cache (recursive)
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Owner (biasanya sudah otomatis set oleh hosting)
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

Atau jika tidak ada akses SSH, lewat cPanel File Manager:
- `storage/` → 755 atau 775
- `storage/app/` → 755 atau 775
- `storage/framework/` → 755 atau 775
- `storage/logs/` → 755 atau 775
- `bootstrap/cache/` → 755 atau 775

#### 10. **Update .env.example**
Tambahkan konfigurasi audio upload ke `.env.example`:

```bash
# Audio Upload Configuration (in KB)
MAX_AUDIO_UPLOAD_SIZE=51200
```

---

## 🔧 LANGKAH-LANGKAH DEPLOYMENT

### A. Persiapan Lokal (Sebelum Upload)

1. **Update .env untuk production** (lihat poin 1-4 di atas)

2. **Compile assets:**
   ```bash
   npm run build
   ```

3. **Test aplikasi lokal dengan production mode:**
   ```bash
   # Backup .env terlebih dahulu
   cp .env .env.backup

   # Edit .env ke production mode
   # Test aplikasi
   php artisan serve

   # Jika ada error, perbaiki dulu
   # Setelah OK, restore .env untuk lanjut development
   ```

4. **Optimize autoloader:**
   ```bash
   composer install --optimize-autoloader --no-dev
   ```

   ⚠️ **NOTE**: Flag `--no-dev` akan remove dev dependencies. Jika masih development, jangan gunakan flag ini.

5. **Clear cache lokal:**
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear
   ```

### B. Upload ke Server

#### Via cPanel / File Manager:
1. Upload semua file kecuali:
   - `/node_modules/` (tidak perlu di-upload)
   - `/vendor/` (akan diinstall di server)
   - `.env` (buat manual di server)
   - `storage/` (buat struktur di server)

2. Struktur folder di hosting:
   ```
   public_html/  atau  www/  atau  httpdocs/
   ├── (isi folder public/)
   └── marori/  (folder di luar public_html)
       ├── app/
       ├── bootstrap/
       ├── config/
       ├── database/
       ├── resources/
       ├── routes/
       ├── storage/
       └── vendor/
   ```

3. **Update index.php di public_html**:
   Edit `public_html/index.php` baris:
   ```php
   require __DIR__.'/../marori/vendor/autoload.php';
   $app = require_once __DIR__.'/../marori/bootstrap/app.php';
   ```

#### Via Git (Recommended):
```bash
# Di server (SSH)
cd /home/username/
git clone https://github.com/username/marori.git
cd marori

# Install dependencies
composer install --optimize-autoloader --no-dev
npm install
npm run build

# Setup
cp .env.example .env
php artisan key:generate
php artisan storage:link

# Permissions
chmod -R 775 storage bootstrap/cache
```

### C. Konfigurasi di Server

1. **Buat file .env di server** dengan konfigurasi production

2. **Buat database** via cPanel MySQL Databases

3. **Import database** atau jalankan migrations:
   ```bash
   php artisan migrate --force
   ```

4. **Seed data jika perlu:**
   ```bash
   php artisan db:seed
   ```

5. **Storage link:**
   ```bash
   php artisan storage:link
   ```

6. **Cache optimization:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

7. **Test website** - buka domain Anda di browser

---

## 🔒 SECURITY CHECKLIST

- [ ] APP_DEBUG=false (jangan tampilkan error detail ke user)
- [ ] APP_ENV=production
- [ ] .env tidak bisa diakses dari web (sudah ada di .gitignore)
- [ ] APP_KEY sudah di-generate
- [ ] Database password kuat
- [ ] CSRF protection aktif (default Laravel)
- [ ] SQL injection protection (gunakan Eloquent, jangan raw query)
- [ ] File upload validation sudah ada di PoetryController
- [ ] HTTPS enabled di hosting (SSL Certificate)
- [ ] Rate limiting untuk login/API jika perlu

---

## 📊 PERFORMANCE OPTIMIZATION

### Sudah Ada:
- ✅ Lazy loading untuk images
- ✅ Efficient CSS dengan Tailwind
- ✅ Image optimization dengan proper size
- ✅ Vite untuk fast asset building
- ✅ Database indexing di migrations

### Recommended untuk Production:
- [ ] Enable OPcache di PHP settings
- [ ] Enable gzip compression di .htaccess
- [ ] Use CDN untuk static assets (opsional)
- [ ] Setup queue workers untuk background tasks (opsional)
- [ ] Setup Redis/Memcached untuk cache (opsional, tapi meningkatkan performa)

---

## 🧪 TESTING SETELAH DEPLOY

1. **Homepage**: Cek semua sections load dengan benar
2. **Hero section**: Background image muncul
3. **Products**: Gambar produk muncul
4. **Researchers**: Photo team members muncul
5. **Poetry**: Audio player berfungsi
6. **Media Gallery**:
   - Video YouTube embed berfungsi
   - Photo gallery berfungsi
   - Lightbox berfungsi
7. **Contact**:
   - Google Maps embed muncul
   - Social media links benar
8. **Admin Dashboard**:
   - Login berfungsi
   - CRUD operations berfungsi
   - Upload file berfungsi (test upload audio/image)
9. **Responsive**: Test di mobile, tablet, desktop
10. **SSL**: Check HTTPS aktif dan tidak ada mixed content warning

---

## 🆘 TROUBLESHOOTING

### Error: "500 Internal Server Error"
**Solusi:**
```bash
# Check .env file sudah ada dan benar
# Check file permissions (storage & bootstrap/cache)
chmod -R 775 storage bootstrap/cache

# Check .htaccess ada di public/
# Check PHP version (minimal 8.2)

# Enable error display temporarily:
# Di index.php tambahkan di paling atas:
ini_set('display_errors', 1);
error_reporting(E_ALL);
```

### Error: "Storage not found" / Images tidak muncul
**Solusi:**
```bash
php artisan storage:link

# Atau manual buat symlink:
ln -s /path/to/storage/app/public /path/to/public/storage
```

### Error: "Class not found"
**Solusi:**
```bash
composer dump-autoload
php artisan clear-compiled
php artisan cache:clear
php artisan config:clear
```

### Upload file gagal / "413 Payload Too Large"
**Solusi:**
1. Check `.user.ini` sudah ada di folder public/
2. Check `.htaccess` sudah ada
3. Jika masih gagal, hubungi hosting support untuk increase PHP upload limits

### CSS/JS tidak load setelah npm run build
**Solusi:**
```bash
# Clear cache browser
# Check file ada di public/build/
# Check APP_URL di .env sesuai domain
# Check Vite config di vite.config.js
```

---

## 📞 CHECKLIST HOSTING REQUIREMENTS

Pastikan hosting Anda memenuhi requirements ini:

- [ ] PHP >= 8.2
- [ ] MySQL >= 5.7 atau MariaDB >= 10.3
- [ ] PHP Extensions:
  - [ ] BCMath
  - [ ] Ctype
  - [ ] Fileinfo
  - [ ] JSON
  - [ ] Mbstring
  - [ ] OpenSSL
  - [ ] PDO
  - [ ] Tokenizer
  - [ ] XML
  - [ ] cURL
  - [ ] GD Library (untuk image processing)
- [ ] Composer available (atau bisa upload vendor/ manual)
- [ ] SSH access (recommended tapi tidak wajib)
- [ ] Storage minimal 1GB (untuk uploads)
- [ ] Memory limit minimal 256MB (sudah di-set di .user.ini)

---

## ✅ FINAL CHECKLIST SEBELUM LAUNCH

### Pre-Launch:
- [ ] Semua .env values sudah production
- [ ] Assets sudah di-compile (`npm run build`)
- [ ] Database sudah ada dan terisi
- [ ] Images/uploads sudah ada di storage
- [ ] SSL certificate aktif (HTTPS)
- [ ] Google Analytics / tracking code sudah ditambahkan (opsional)

### Post-Launch:
- [ ] Test semua fitur
- [ ] Test di berbagai browser (Chrome, Firefox, Safari)
- [ ] Test di mobile devices
- [ ] Test speed dengan GTmetrix atau PageSpeed Insights
- [ ] Setup backup otomatis database & files
- [ ] Monitor error logs di `storage/logs/laravel.log`

---

## 📝 CATATAN TAMBAHAN

### Backup Strategy
Sangat disarankan setup backup rutin:
1. **Database**: Export via cPanel phpMyAdmin setiap minggu
2. **Files**: Backup folder storage/ dan .env setiap minggu
3. **Full backup**: Via cPanel backup setiap bulan

### Maintenance
- Update Laravel dependencies setiap 3-6 bulan
- Monitor storage usage (uploads)
- Clear logs lama: `storage/logs/laravel.log`
- Monitor database size

### Update Content
Admin bisa update konten via dashboard:
- `/admin/hero` - Hero section
- `/admin/about` - About section
- `/admin/products` - Products
- `/admin/researchers` - Team members
- `/admin/poetry` - Poetry dengan audio
- `/admin/videos` - Video gallery
- `/admin/photos` - Photo gallery
- `/admin/contact` - Contact info

---

## 🎯 KESIMPULAN

**Website SUDAH HAMPIR SIAP untuk di-hosting!**

Yang perlu dilakukan:
1. ✏️ Edit file `.env` untuk production (5 menit)
2. 📦 Jalankan `npm run build` (2 menit)
3. 🚀 Upload ke hosting (15-30 menit)
4. ⚙️ Konfigurasi di server (10 menit)
5. ✅ Testing (15 menit)

**Total waktu setup: ~1 jam**

Jika ada kendala saat deployment, silakan cek bagian Troubleshooting di atas atau hubungi support hosting Anda.

---

**Good luck dengan deployment! 🚀**

*Last updated: 2025-01-06*
