# 📋 Panduan Perintah PHP Artisan untuk Project Laravel POS

## Daftar Perintah Artisan yang Digunakan

### 1️⃣ Membuat Project Laravel
```bash
# Membuat project baru di folder pos
composer create-project laravel/laravel pos

# Masuk ke folder project
cd pos
```

---

### 2️⃣ Membuat Semua Controller

#### HomeController - Halaman Utama
```bash
php artisan make:controller HomeController
```
**File dibuat:** `app/Http/Controllers/HomeController.php`

#### AboutController - Halaman Tentang Kami
```bash
php artisan make:controller AboutController
```
**File dibuat:** `app/Http/Controllers/AboutController.php`

#### ArticleController - Halaman Artikel
```bash
php artisan make:controller ArticleController
```
**File dibuat:** `app/Http/Controllers/ArticleController.php`

#### UserController - Halaman Profil User
```bash
php artisan make:controller UserController
```
**File dibuat:** `app/Http/Controllers/UserController.php`

#### ProductController - Halaman Kategori Produk
```bash
php artisan make:controller ProductController
```
**File dibuat:** `app/Http/Controllers/ProductController.php`

---

### 3️⃣ Membuat Blade Views (Otomatis)

Views akan dibuat di folder `resources/views/`:
```
resources/views/
├── home.blade.php           # Halaman utama
├── about.blade.php          # Tentang kami
├── article.blade.php        # Detail artikel
├── user.blade.php           # Profil user
├── category.blade.php       # Kategori produk
└── 404.blade.php            # Halaman 404
```

**Catatan:** Blade views tidak dibuat otomatis, harus dibuat manual di folder `resources/views/`

---

### 4️⃣ Membuat Migration & Model (Opsional)

Jika ingin menggunakan database:

```bash
# Membuat Migration untuk users
php artisan make:migration create_users_table

# Membuat Model User
php artisan make:model User

# Membuat Model dan Migration sekaligus
php artisan make:model Article -m

# Jalankan Migration
php artisan migrate
```

---

### 5️⃣ Membuat Resource Controller (Alternatif)

Jika ingin membuat controller dengan 7 method bawaan (index, create, store, show, edit, update, destroy):

```bash
php artisan make:controller ProductController --resource
```

---

## 🚀 Menjalankan Project

### Start Development Server
```bash
php artisan serve
```

**Output:**
```
Laravel development server started on [http://127.0.0.1:8000]
```

**Akses di browser:**
- `http://localhost:8000/` atau `http://127.0.0.1:8000/`

---

## 📱 Test URL yang Tersedia

Setelah menjalankan `php artisan serve`, kunjungi URL berikut:

### Route Dasar
| URL | Controller | Method | Deskripsi |
|-----|-----------|--------|-----------|
| `/` | HomeController | index | Halaman Utama |
| `/about` | AboutController | index | Tentang Kami |
| `/articles/1` | ArticleController | show | Artikel ID 1 |
| `/articles/2` | ArticleController | show | Artikel ID 2 |
| `/articles/3` | ArticleController | show | Artikel ID 3 |
| `/user/1/name/ahmad` | UserController | profile | Profil User ID 1 |
| `/user/2/name/siti` | UserController | profile | Profil User ID 2 |
| `/user/5/name/ahmad` | UserController | profile | Profil User ID 5 |

### Route Kategori (dengan Prefix)
| URL | Controller | Method | Kategori |
|-----|-----------|--------|----------|
| `/category/food-beverage` | ProductController | showByCategory | Makanan & Minuman |
| `/category/beauty-health` | ProductController | showByCategory | Kecantikan & Kesehatan |
| `/category/home-care` | ProductController | showByCategory | Perawatan Rumah |
| `/category/baby-kid` | ProductController | showByCategory | Bayi & Anak-anak |

---

## 🛠️ Perintah Utility Lainnya

### 1. Clear Cache
```bash
php artisan cache:clear
php artisan view:cache
php artisan config:cache
```

### 2. List Semua Route
```bash
php artisan route:list
```

### 3. Generate Key Aplikasi
```bash
php artisan key:generate
```

### 4. Create Tinker Shell (untuk debugging)
```bash
php artisan tinker
```

### 5. Database Commands
```bash
# Reset database
php artisan migrate:reset

# Rollback migration terakhir
php artisan migrate:rollback

# Jalankan seeder
php artisan db:seed
```

### 6. View Cache Commands
```bash
# Cache semua views
php artisan view:cache

# Clear view cache
php artisan view:clear
```

---

## 📊 Struktur File Akhir

```
pos/
├── app/
│   └── Http/
│       └── Controllers/
│           ├── HomeController.php      ✅
│           ├── AboutController.php     ✅
│           ├── ArticleController.php   ✅
│           ├── UserController.php      ✅
│           └── ProductController.php   ✅
│
├── routes/
│   └── web.php                         ✅
│
├── resources/
│   └── views/
│       ├── home.blade.php              ✅
│       ├── about.blade.php             ✅
│       ├── article.blade.php           ✅
│       ├── user.blade.php              ✅
│       ├── category.blade.php          ✅
│       └── 404.blade.php               ✅
│
├── public/
├── config/
├── database/
├── storage/
├── tests/
├── .env
├── .env.example
├── composer.json
├── artisan
└── ...
```

---

## ✅ Checklist Implementasi

- [x] Membuat 5 Controller (HomeController, AboutController, ArticleController, UserController, ProductController)
- [x] Konfigurasi Routing di routes/web.php
- [x] Membuat 6 Blade Views (home, about, article, user, category, 404)
- [x] Setiap Controller mengirim data ke view dengan array atau with()
- [x] Menggunakan route prefix untuk kategori produk
- [x] Implementasi MVC pattern lengkap

---

## 💡 Tips Debugging

### 1. Jika View Tidak Ditemukan
```
ViewNotFoundException
```

**Solusi:**
- Pastikan file view ada di folder `resources/views/`
- Gunakan perintah: `php artisan view:clear`

### 2. Jika Route Tidak Ditemukan
```
NotFoundHttpException
```

**Solusi:**
- Periksa route di `routes/web.php`
- Gunakan perintah: `php artisan route:list` untuk list semua route
- Pastikan URL sesuai dengan route yang didefinisikan

### 3. Jika Controller Tidak Ditemukan
```
ReflectionException
```

**Solusi:**
- Pastikan namespace controller benar: `namespace App\Http\Controllers;`
- Pastikan import controller di routes/web.php benar

### 4. Debugging dengan dd()
```php
// Di controller
dd($data); // Dump and die - akan menampilkan data dan stop
```

---

## 🎓 Konsep MVC yang Diterapkan

### 🔄 Alur Request

```
1. User mengakses URL: /articles/1
   ↓
2. Laravel mencari route di routes/web.php
   ↓
3. Route ditemukan: Route::get('/articles/{id}', [ArticleController::class, 'show'])
   ↓
4. Laravel memanggil ArticleController@show($id)
   ↓
5. Controller memproses data (cari artikel dari array)
   ↓
6. Controller mengirim data ke view: return view('article', $data)
   ↓
7. View (article.blade.php) menerima data
   ↓
8. View menampilkan data dengan HTML
   ↓
9. Browser menampilkan halaman kepada user
```

### Penjelasan Setiap Komponen

**Model (opsional dalam project ini)**
- Menangani data dan database
- Belum digunakan dalam project sederhana ini

**View (article.blade.php)**
```php
@foreach($articles as $article)
    <h2>{{ $article['title'] }}</h2>
@endforeach
```

**Controller (ArticleController.php)**
```php
public function show($id) {
    $articles = [...];
    $data = ['article' => $articles[$id]];
    return view('article', $data);
}
```

---

## 🚀 Next Steps (Langkah Selanjutnya)

Untuk pengembangan lebih lanjut:

1. **Tambah Database**
   ```bash
   php artisan make:model Article -m
   ```

2. **Tambah Validation**
   ```php
   $validated = $request->validate([
       'name' => 'required|string',
       'email' => 'required|email'
   ]);
   ```

3. **Tambah Authentication**
   ```bash
   php artisan make:auth
   ```

4. **Tambah API Routes**
   ```php
   Route::apiResource('articles', ArticleController::class);
   ```

---

**Selamat! Anda sudah memahami konsep MVC di Laravel! 🎉**
