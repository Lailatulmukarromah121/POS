# Tutorial Lengkap: Membuat Project Laravel Sederhana (MVC)

## 📋 Daftar Isi
1. [Persiapan & Setup](#persiapan--setup)
2. [Membuat Controller](#membuat-controller)
3. [Konfigurasi Routing](#konfigurasi-routing)
4. [Membuat Blade Views](#membuat-blade-views)
5. [Struktur File & Penjelasan](#struktur-file--penjelasan)
6. [Menjalankan Project](#menjalankan-project)

---

## Persiapan & Setup

### Prasyarat
- PHP 8.0 atau lebih tinggi
- Composer sudah terinstall
- Laravel Framework sudah terinstall atau siap dibuat

### Langkah 1: Membuat Project Laravel
```bash
composer create-project laravel/laravel pos
cd pos
```

Jika sudah ada project, pastikan berada di folder project:
```bash
cd c:\laragon\www\POS
```

---

## Membuat Controller

### Penjelasan Controller
**Controller** adalah kelas yang mengurus logika bisnis aplikasi. Controller menerima request dari routing, memproses data, dan mengirimnya ke view.

### Langkah 2: Membuat 5 Controller dengan Artisan

Jalankan perintah berikut di terminal (dalam folder project):

#### 1. Buat HomeController
```bash
php artisan make:controller HomeController
```

#### 2. Buat AboutController
```bash
php artisan make:controller AboutController
```

#### 3. Buat ArticleController
```bash
php artisan make:controller ArticleController
```

#### 4. Buat UserController
```bash
php artisan make:controller UserController
```

#### 5. Buat ProductController
```bash
php artisan make:controller ProductController
```

**Hasil**: Semua controller akan dibuat di folder `app/Http/Controllers/`

---

## Konfigurasi Routing

### Penjelasan Routing
**Routing** adalah pemetaan URL ke controller dan method. Ketika user mengakses URL tertentu, Laravel akan mengarahkan ke method yang sesuai di controller.

### Langkah 3: Edit File `routes/web.php`

File routes/web.php akan berisi semua routing aplikasi kami. Lihat file `routes/web.php` yang sudah kami buat.

---

## Membuat Blade Views

### Penjelasan Blade Template
**Blade** adalah template engine Laravel yang memudahkan pembuatan view dengan syntax khusus. File Blade berakhiran `.blade.php`

### Langkah 4: Membuat Folder Resources Views

Folder `resources/views/` sudah ada secara default. Kita akan membuat file-file blade di sini.

**File yang akan dibuat:**
1. `resources/views/home.blade.php`
2. `resources/views/about.blade.php`
3. `resources/views/article.blade.php`
4. `resources/views/user.blade.php`
5. `resources/views/category.blade.php`

---

## Struktur File & Penjelasan

### Struktur Folder Project
```
pos/
├── app/
│   └── Http/
│       └── Controllers/
│           ├── HomeController.php
│           ├── AboutController.php
│           ├── ArticleController.php
│           ├── UserController.php
│           └── ProductController.php
├── routes/
│   └── web.php
├── resources/
│   └── views/
│       ├── home.blade.php
│       ├── about.blade.php
│       ├── article.blade.php
│       ├── user.blade.php
│       └── category.blade.php
└── ...
```

### Alur Kerja MVC dalam Aplikasi Kami

```
User Request
    ↓
routes/web.php (Routing)
    ↓
Controller (Logika)
    ↓
View (Tampilan)
    ↓
Response ke Browser
```

**Contoh Alur:**
- User mengakses `http://localhost:8000/`
- Laravel mencari route `/` di `routes/web.php`
- Route mengarahkan ke `HomeController@index`
- HomeController menjalankan method `index()`
- Controller mengirim data ke `home.blade.php`
- View menampilkan HTML ke browser

---

## Menjalankan Project

### Langkah 5: Jalankan Development Server

```bash
php artisan serve
```

**Output:**
```
Laravel development server started on [http://127.0.0.1:8000]
```

### Langkah 6: Akses Aplikasi

Buka browser dan kunjungi:
- Home: `http://localhost:8000/`
- About: `http://localhost:8000/about`
- Articles: `http://localhost:8000/articles/1`, `http://localhost:8000/articles/2`
- User Profile: `http://localhost:8000/user/5/name/Ahmad`
- Categories:
  - `http://localhost:8000/category/food-beverage`
  - `http://localhost:8000/category/beauty-health`
  - `http://localhost:8000/category/home-care`
  - `http://localhost:8000/category/baby-kid`

---

## 📝 Penjelasan Konsep MVC

### Model
- Menangani logika data dan database
- Dalam project ini belum digunakan (opsional)

### View
- Menampilkan data ke user
- Berisi HTML dan Blade syntax
- File: `resources/views/*.blade.php`

### Controller
- Menangani logika bisnis
- MenerimaRequest dari routing
- Mengirim data ke view
- File: `app/Http/Controllers/*.php`

---

## 🎯 Ringkasan Langkah Pembuatan

| No | Langkah | Perintah/File |
|----|---------|---------------|
| 1 | Buat Project | `composer create-project laravel/laravel pos` |
| 2 | Buat Controller | `php artisan make:controller [NamaController]` |
| 3 | Setup Routing | Edit `routes/web.php` |
| 4 | Buat Views | Edit `resources/views/*.blade.php` |
| 5 | Jalankan Server | `php artisan serve` |

---

## 💡 Tips & Trik

1. **Rebuild View Cache** jika ada perubahan:
   ```bash
   php artisan view:cache
   php artisan cache:clear
   ```

2. **Debugging** menggunakan `dd()` di controller:
   ```php
   dd($data); // Dump and die
   ```

3. **Akses data di Blade** dengan `{{ }}`:
   ```blade
   {{ $name }} // Output variable
   ```

4. **Kondisional di Blade** menggunakan `@if` dan `@foreach`:
   ```blade
   @if ($count > 0)
       <p>Ada {{ $count }} artikel</p>
   @endif
   
   @foreach ($items as $item)
       <li>{{ $item }}</li>
   @endforeach
   ```

---

## ✅ Checklist Verifikasi

- [ ] Semua 5 Controller sudah dibuat
- [ ] routes/web.php sudah dikonfigurasi dengan semua routing
- [ ] Semua 5 Blade view sudah dibuat
- [ ] Setiap view menerima data dari controller
- [ ] Development server berjalan tanpa error
- [ ] Semua URL bisa diakses dan menampilkan data dengan benar

---

**Selamat! Project Laravel MVC Anda sudah siap! 🎉**
