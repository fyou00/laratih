
# 📘 Panduan Setup Proyek Laravel dengan Breeze dan Model `Siswa`

Dokumen ini berisi langkah-langkah lengkap untuk membuat proyek Laravel baru, menginstal Breeze, dan menambahkan model `Siswa` beserta migrasinya.

---

## 🔧 1. Buat Proyek Laravel Baru
```bash
composer create-project --prefer-dist laravel/laravel laratih
```

---

## 🌬️ 2. Instal Laravel Breeze (Starter Kit Auth)
```bash
composer require laravel/breeze --dev
```

---

## 🚀 3. Jalankan Instalasi Breeze
```bash
php artisan breeze:install
```

---

## 📦 4. Instal Dependensi NPM
```bash
npm install
```

---

## 🛠️ 5. Compile Asset Front-End
```bash
npm run dev
```

---

## 🧱 6. Buat Model dan Migration untuk Tabel `Siswa`
```bash
php artisan make:model Siswa
```

---

## 🎮 7. Buat Controller untuk `Siswa`
```bash
php artisan make:controller SiswaController --model=Siswa
```

---

## 🗄️ 8. Isi File Migration `siswa`
Edit file migration yang berada di direktori `database/migrations/` (nama file mirip `xxxx_xx_xx_create_siswas_table.php`) dengan kode berikut:

```php
Schema::create('siswas', function (Blueprint $table) {
    $table->id();
    $table->string('nama', 100);
    $table->text('alamat');
    $table->string('agama');
    $table->boolean('jenis_kelamin'); // 1 untuk laki-laki, 0 untuk perempuan
    $table->string('asal_sekolah');
    $table->timestamps();
});
```

---

## ⚙️ 9. Konfigurasi Koneksi Database di `.env`
Pastikan Anda mengatur koneksi database dengan benar. Contoh konfigurasi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dev_mahasiswa
DB_USERNAME=root
DB_PASSWORD=
```

---

## 📥 10. Jalankan Migrasi Database
```bash
php artisan migrate
```

---

## 👤 11. Buat User Dummy Melalui Seeder
```bash
php artisan db:seed
```

---

## ✅ Selesai!
Aplikasi Laravel siap digunakan dengan Breeze dan model `Siswa` telah tersedia. Pastikan untuk menjalankan server lokal:

```bash
php artisan serve
```

---
