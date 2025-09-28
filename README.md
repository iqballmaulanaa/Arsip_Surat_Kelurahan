# 📂 Aplikasi Arsip Surat Kelurahan

## 🎯 Tujuan
Aplikasi ini dibuat untuk membantu kelurahan dalam mengarsipkan surat-surat resmi agar lebih mudah dikelola, dicari, serta diakses kembali jika diperlukan.

## ✨ Fitur
- Manajemen surat:
  - Tambah, edit, hapus surat
  - Upload file PDF surat
  - Unduh file PDF surat
- Pencarian surat berdasarkan:
  - Nomor surat
  - Kategori surat
  - Judul surat
- Manajemen kategori surat
- Preview dokumen PDF langsung di aplikasi
- Update otomatis waktu unggah ketika surat diperbarui

## 🛠️ Teknologi yang Digunakan
- **Laravel 12** – Framework PHP
- **Bootstrap 5** – Tampilan UI
- **MySQL** – Database
- **phpMyAdmin** – Manajemen database
- **Composer & NPM** – Dependency management

## 🚀 Cara Menjalankan
```bash
1. Clone repository
   git clone https://github.com/iqballmaulanaa/Arsip_Surat_Kelurahan.git

2. Masuk ke folder project
   cd Arsip_Surat_Kelurahan

3. Install dependencies
   composer install
   npm install && npm run dev

4. Copy konfigurasi environment
   cp .env.example .env
   (Lalu sesuaikan konfigurasi database di file .env)

5. Generate key aplikasi
   php artisan key:generate

6. Import database
   - Buka phpMyAdmin
   - Buat database baru, misalnya arsip_surat_kelurahan
   - Import file .sql yang ada di folder database/

7. Jalankan server lokal
   php artisan serve
   (Aplikasi bisa diakses melalui http://localhost:8000)
