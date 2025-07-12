
# Setup Proyek Laratih

Dokumen ini berisi langkah-langkah lengkap untuk membuat proyek Laravel baru dengan nama laratih, menginstal Breeze, dan menambahkan model `Siswa` beserta migrasinya.

---

## 1. Buat Proyek Laravel Baru
```bash
composer create-project --prefer-dist laravel/laravel laratih
```

## 2. Instal Laravel Breeze (Starter Kit Auth)
```bash
composer require laravel/breeze --dev
```

## 3. Jalankan Instalasi Breeze
```bash
php artisan breeze:install
```

## 4. Instal Dependensi NPM
```bash
npm install
```


## 5. Compile Asset Front-End
```bash
npm run dev
```
>Jalankan ini setiap membuka code editor dari awal ketika mau mulai ngoding

## 6. Model dan Migration untuk Tabel `Siswa`
```bash
php artisan make:model Siswa -m
```
>Perintah dalam Laravel Artisan CLI (Command Line Interface) untuk membuat model beserta file migrasinya secara otomatis.

## 7. Buat Controller untuk `Siswa`
```bash
php artisan make:controller SiswaController --model=Siswa
```

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

## ⚙️ 9. Konfigurasi Koneksi Database di `.env`
Pastikan Anda mengatur koneksi database dengan benar. Contoh konfigurasi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=latiahn
DB_USERNAME=root
DB_PASSWORD=
```

## 10. Jalankan Migrasi Database
```bash
php artisan migrate
```
> Perintah Artisan CLI pada Laravel yang digunakan untuk menjalankan migrasi database, yaitu membuat struktur tabel-tabel di database sesuai definisi yang telah ditulis dalam file-file migrasi.

### Fungsi php artisan migrate
- Membaca semua file di folder database/migrations/.
- Mengeksekusi perintah Schema::create, Schema::table, dll di dalam file migrasi tersebut.
- Menyimpan informasi migrasi yang sudah dijalankan ke dalam tabel migrations di database.
- Hanya menjalankan file migrasi yang belum pernah dijalankan sebelumnya.

### Contoh Penggunaan:
Misalnya kamu punya file `2024_01_01_000000_create_siswas_table.php` yang berisi:

```bash
Schema::create('siswas', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->timestamps();
});
```
Ketika kamu menjalankan:

```bash
php artisan migrate
```
Maka Laravel akan membuat tabel siswas di database.

## 11. Buat Data User Dummy Melalui Seeder
```bash
php artisan db:seed
```
Isi seperti kode berikut dalam function run(): di file seeder yang berada di direktori database/seeders/ `SiswaSeeder.php`:
```bash
Siswa::factory()->create([
    'nama' => 'Fathur Rahman',
    'alamat' => 'Hagu Selatan',
    'agama' => 'Islam',
    'jenis_kelamin' => '1', // 1 untuk laki-laki
    'asal_sekolah' => 'SMK Negeri 1 Lhokseumawe',
]);
```

## 12. Jalankan Server Lokal
Aplikasi Laravel siap digunakan dengan Breeze dan model `Siswa` telah tersedia. Pastikan untuk menjalankan server lokal:

```bash
php artisan serve
```
