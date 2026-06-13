# Historians_fixed

## 📖 Tentang Historians

Historians adalah platform edukasi sejarah berbasis web yang dirancang untuk membantu pengguna mempelajari berbagai peristiwa sejarah secara interaktif, modern, dan mudah dipahami.

Website ini menyediakan kumpulan peristiwa sejarah yang dilengkapi dengan gambar, deskripsi, serta sumber referensi terpercaya sehingga pengguna dapat memperoleh informasi yang lebih mendalam mengenai suatu peristiwa.

Selain sebagai media pembelajaran, Historians juga dilengkapi dengan sistem manajemen konten yang memungkinkan administrator untuk menambahkan, mengubah, dan menghapus data sejarah melalui dashboard admin.

---

## ✨ Fitur Utama

### Pengguna Umum
- Tampilan landing page interaktif
- Daftar peristiwa sejarah unggulan
- Halaman detail sejarah
- Galeri gambar peristiwa
- Tautan sumber referensi terpercaya
- Desain responsif dan modern

### Administrator
- Sistem login autentikasi
- Dashboard manajemen konten
- CRUD (Create, Read, Update, Delete) data sejarah
- Upload gambar peristiwa
- Pengelolaan sumber referensi
- Monitoring jumlah data sejarah

---

## 🛠 Teknologi yang Digunakan

### Frontend
- HTML5
- CSS3
- JavaScript

### Backend
- PHP Native

### Database
- MySQL / MariaDB

### Server
- Apache (XAMPP)

---

## 📂 Struktur Proyek

```text
Historians/
│
├── admin/
│   ├── dashboard.php
│   ├── add.php
│   ├── edit.php
│   ├── delete.php
│   └── auth.php
│
├── assets/
│   ├── style.css
│   └── app.js
│
├── uploads/
│
├── config.php
├── index.php
├── detail.php
├── login.php
├── logout.php
└── README.md
```

---

## 🚀 Cara Menjalankan

### 1. Clone Repository

```bash
git clone https://github.com/Richelieau/Historians_fixed.git
```

### 2. Pindahkan ke Folder htdocs

```text
C:\xampp\htdocs\
```

### 3. Buat Database

Masuk ke phpMyAdmin lalu buat database:

```sql
CREATE DATABASE Historians_fixed;
```

### 4. Import Database

Import file SQL yang tersedia ke dalam database.

### 5. Konfigurasi Koneksi

Sesuaikan file `config.php`

```php
<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "Historians_fixed"
);
?>
```

### 6. Jalankan Server

Aktifkan:

- Apache
- MySQL

pada XAMPP Control Panel.

### 7. Akses Website

```text
http://localhost/Historians_fixed
```

---

## Main Update

Penambahan section Shopping bagi user dalam membantu mereka memahami pelajar sejarah ini dengan membeli buku buku valid akan kebenarannya!

## 🎯 Tujuan Pengembangan

Historians dikembangkan sebagai media pembelajaran sejarah digital yang lebih menarik dan interaktif dibandingkan metode konvensional. Platform ini bertujuan membantu siswa, mahasiswa, maupun masyarakat umum dalam memahami berbagai peristiwa sejarah melalui visualisasi dan penyajian informasi yang terstruktur.

---

## 🔮 Pengembangan Selanjutnya

Beberapa fitur yang direncanakan:

- Sistem kategori sejarah
- Pencarian data sejarah
- Komentar dan diskusi
- Timeline interaktif
- Dashboard statistik
- Integrasi Google Drive
- Sistem multi-role (Admin & Super Admin)
- Monitoring kegiatan siswa
- Visualisasi data kehadiran dan penilaian

---

## 👨‍💻 Pengembang

Dikembangkan oleh:

**Raghib Abiyyudzaky**

Sebagai proyek pembelajaran dan pengembangan platform edukasi sejarah berbasis web.

---

## 📜 Lisensi

Proyek ini dibuat untuk tujuan pendidikan, pembelajaran, dan pengembangan portofolio.
