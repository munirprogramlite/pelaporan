# 📱 Sistem Pelaporan Barang Rusak

Aplikasi mobile sederhana untuk melaporkan kerusakan barang/fasilitas. Dibangun menggunakan **MIT App Inventor** untuk sisi klien (Android) dan **PHP + MySQL** untuk sisi server (Backend & Dashboard Web).

## 🚀 Fitur Utama
* **Aplikasi Mobile (Siswa/Pelapor):**
  * Registrasi & Login Akun.
  * Form Pelaporan (Deskripsi Kerusakan + Ambil Foto).
* **Dashboard Web (Admin/Pengawas):**
  * Melihat riwayat seluruh laporan.
  * Mencetak rekapitulasi laporan.

## 🛠️ Teknologi yang Digunakan
* **Frontend Mobile:** MIT App Inventor
* **Backend:** PHP (Native)
* **Database:** MySQL (Laragon / XAMPP)

## ⚙️ Cara Instalasi & Menjalankan Project

### 1. Konfigurasi Backend & Web (Laptop/Server)
1. Clone repository ini atau download sebagai ZIP.
2. Pindahkan folder project ke direktori server lokal Anda (contoh: `C:\laragon\www\laporan` atau `C:\xampp\htdocs\laporan`).
3. Buka phpMyAdmin, buat database baru dengan nama `db_laporan`.
4. Import file `db_laporan.sql` yang ada di dalam repository ini ke dalam database tersebut.
5. Pastikan terdapat folder bernama `uploads/` di dalam folder utama project (untuk menyimpan foto laporan). Jika tidak ada, silakan buat folder baru dengan nama tersebut.
6. Dashboard web sudah bisa diakses melalui browser di `http://localhost/laporan`.

### 2. Konfigurasi Aplikasi Mobile (MIT App Inventor)
**⚠️ PENTING:** Aplikasi MIT App Inventor menggunakan IP lokal (IPv4) untuk berkomunikasi dengan server PHP. Anda **wajib** mengubah IP Address sebelum melakukan *build*.

1. Buka [MIT App Inventor](http://ai2.appinventor.mit.edu/).
2. Import project dengan file `.aia` yang tersedia di repository ini (Pilih *Projects* > *Import project (.aia) from my computer*).
3. Buka **Command Prompt (CMD)** di laptop yang menjalankan server, ketik `ipconfig`, dan catat angka **IPv4 Address** (misal: `192.168.x.x`).
4. Pastikan HP dan Laptop terhubung ke **jaringan WiFi/Hotspot yang sama**.
5. Di MIT App Inventor, buka mode **Blocks** pada layar **Lapor** dan layar **Register** / **Login**.
6. Cari blok URL dan ganti IP Address lama menjadi IPv4 laptop Anda saat ini.
   * *Contoh ubah:* `http://192.168.53.197/laporan/...` menjadi `http://IP_BARU_ANDA/laporan/...`
7. Lakukan proses *Build* (jadikan `.apk`) atau tes menggunakan MIT AI2 Companion.

## 📝 Catatan Pengujian
* Untuk menguji sebagai Admin di web, ubah nilai `role` menjadi `2` atau `3` pada tabel `users` di database.
* Untuk menguji aplikasi mobile, cukup lakukan registrasi dari HP, dan akun tersebut otomatis memiliki hak akses sebagai pelapor.