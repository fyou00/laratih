
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

## 8. Isi File Migration `siswa`
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

## 9. Konfigurasi Koneksi Database di `.env`
Pastikan Anda mengatur koneksi database dengan benar. Contoh konfigurasi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=latihan
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


# Membuat CRUD Sederhana: Data Siswa

Berikut ini adalah panduan step-by-step membuat halaman dan fungsi **Index (Read)**, **Tambah Data (Create)**, **Edit (Update)**, **Hapus (Delete)** data siswa menggunakan Laravel Breeze.

---

Sebelum membuat views, pertama kita harus membuat route terlebih dahulu. Baris kode berikut digunakan dalam file web.php untuk mendaftarkan routing berbasis resource di Laravel.
## 🌐 Tambahkan Route ke `routes/web.php`

```php
use App\Http\Controllers\SiswaController;

Route::resource('siswa', SiswaController::class);
```
Dengan pendekatan ini, Laravel secara otomatis menghasilkan tujuh route standar untuk operasi CRUD (Create, Read, Update, Delete) seperti index, create, store, show, edit, update, dan destroy yang semuanya diarahkan ke method dengan nama yang sesuai di dalam SiswaController.

---

## 1. CREATE
### 1.1 Buat folder view
Buat folder `siswa` di dalam direktori:
```
resources/views/siswa
```

### 1.2 Buat File `index.blade.php`

Buat file `resources/views/siswa/index.blade.php` dan isi dengan kode awal berikut:

```blade
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in index page!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

---



---

## 3. Tambahkan Method `index()` di SiswaController

Edit file `app/Http/Controllers/SiswaController.php` dan timpa bagian baris kode fungsi index dengan kode berikut:

```php
public function index()
{
    $siswas = Siswa::all();
    return view('siswa.index', ['siswas' => $siswas]);
}
```

---

## 4. Tambahkan Link Navigasi ke Menu

Edit file `resources/views/layouts/navigation.blade.php` dan tambahkan kode ini dibawah `x-nav-link Dashboard`:

```blade
<x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.*')">
    {{ __('Siswa') }}
</x-nav-link>
```

---

## 5. Tampilkan Tabel Data di `index.blade.php`

**Hapus** baris:

```blade
{{ __("You're logged in index page!") }}
```

**dan timpa dengan:**

```blade
<table class="table-auto w-full border mt-4 text-left">
    <thead>
        <tr class="bg-gray-200">
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Nama</th>
            <th class="border px-4 py-2">Alamat</th>
            <th class="border px-4 py-2">Agama</th>
            <th class="border px-4 py-2">Jenis Kelamin</th>
            <th class="border px-4 py-2">Asal Sekolah</th>
            <th class="border px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswas as $siswa)
        <tr>
            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">{{ $siswa->nama }}</td>
            <td class="border px-4 py-2">{{ $siswa->alamat }}</td>
            <td class="border px-4 py-2">{{ $siswa->agama }}</td>
            <td class="border px-4 py-2">
                {{ $siswa->jenis_kelamin ? 'Laki-laki' : 'Perempuan' }}
            </td>
            <td class="border px-4 py-2">{{ $siswa->asal_sekolah }}</td>
            <td class="border px-4 py-2">Edit | Delete</td>
        </tr>
        @endforeach
    </tbody>
</table>
```

---

## ✅ Selesai

Sekarang halaman `/siswa` sudah bisa menampilkan daftar data siswa dari database.
