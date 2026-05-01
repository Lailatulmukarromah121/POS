# 📋 Ringkasan Source Code

File ini berisi ringkasan singkat dari setiap file kode source project.

## 🎮 CONTROLLERS

### 1. HomeController.php
```php
class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'Halaman Utama',
            'welcome_message' => 'Selamat Datang di Aplikasi POS',
            'subtitle' => 'Point of Sale System',
            'features' => [...]
        ];
        return view('home', $data);
    }
}
```
**Fungsi:** Menampilkan halaman utama
**Route:** GET /
**View:** home.blade.php

---

### 2. AboutController.php
```php
class AboutController extends Controller {
    public function index() {
        $data = [
            'title' => 'Tentang Kami',
            'company_name' => 'PT Maju Jaya Indonesia',
            'founded_year' => 2020,
            'team_members' => [...]
        ];
        return view('about', $data);
    }
}
```
**Fungsi:** Menampilkan info perusahaan & tim
**Route:** GET /about
**View:** about.blade.php

---

### 3. ArticleController.php
```php
class ArticleController extends Controller {
    public function show($id) {
        $articles = [1 => [...], 2 => [...], 3 => [...]];
        
        if (isset($articles[$id])) {
            return view('article', ['article' => $articles[$id]]);
        } else {
            return view('article', ['error' => 'Artikel tidak ditemukan']);
        }
    }
}
```
**Fungsi:** Menampilkan detail artikel by ID
**Route:** GET /articles/{id}
**View:** article.blade.php
**Parameter:** $id (integer)

---

### 4. UserController.php
```php
class UserController extends Controller {
    public function profile($id, $name) {
        $users = [1 => [...], 2 => [...], ...];
        
        if (isset($users[$id])) {
            if (strtolower($users[$id]['name']) === strtolower($name)) {
                return view('user', ['user' => $users[$id]]);
            } else {
                return view('user', ['error' => 'Nama tidak sesuai']);
            }
        }
    }
}
```
**Fungsi:** Menampilkan profil user by ID & nama
**Route:** GET /user/{id}/name/{name}
**View:** user.blade.php
**Parameter:** $id (integer), $name (string)

---

### 5. ProductController.php
```php
class ProductController extends Controller {
    public function showByCategory($category) {
        $products = [
            'food-beverage' => [...],
            'beauty-health' => [...],
            'home-care' => [...],
            'baby-kid' => [...]
        ];
        
        if (isset($products[$category])) {
            return view('category', ['category' => $products[$category]]);
        } else {
            return view('category', ['error' => '...', 'available_categories' => ...]);
        }
    }
}
```
**Fungsi:** Menampilkan produk by kategori
**Route:** GET /category/{category}
**View:** category.blade.php
**Parameter:** $category (string slug)

---

## 🛣️ ROUTING (routes/web.php)

### Route Dasar
```php
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);
Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);
```

### Route dengan Prefix
```php
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'showByCategory'])
        ->defaults('category', 'food-beverage');
    Route::get('/beauty-health', [ProductController::class, 'showByCategory'])
        ->defaults('category', 'beauty-health');
    Route::get('/home-care', [ProductController::class, 'showByCategory'])
        ->defaults('category', 'home-care');
    Route::get('/baby-kid', [ProductController::class, 'showByCategory'])
        ->defaults('category', 'baby-kid');
});
```

### Route Fallback
```php
Route::fallback(function () {
    return view('404');
});
```

---

## 👁️ VIEWS (Blade Syntax)

### Syntax Dasar Blade
```blade
{{ $variable }}                      <!-- Output variable -->
@if ($condition)
    <!-- kode -->
@endif

@foreach ($items as $item)
    {{ $item['name'] }}
@endforeach

@foreach ($items as $item)
    <li>{{ $item }}</li>
@endforeach

@php
    $variable = 'value';
@endphp
```

### home.blade.php - Ringkasan
```blade
@foreach($features as $feature)
    <div class="feature-item">
        <strong>✓ {{ $feature }}</strong>
    </div>
@endforeach

<a href="/">🏠 Home</a>
<a href="/about">ℹ️ Tentang Kami</a>
<!-- ... link ke halaman lain -->
```

### about.blade.php - Ringkasan
```blade
<h1>{{ $title }}</h1>
<p><strong>{{ $company_name }}</strong></p>

@foreach($team_members as $member)
    <div class="team-card">
        <h3>{{ $member['name'] }}</h3>
        <div>{{ $member['position'] }}</div>
        <div>{{ $member['email'] }}</div>
    </div>
@endforeach
```

### article.blade.php - Ringkasan
```blade
@if(isset($error))
    <div class="error-message">{{ $error }}</div>
@else
    <h2>{{ $article['title'] }}</h2>
    <p><strong>Penulis:</strong> {{ $article['author'] }}</p>
    <p><strong>Tanggal:</strong> {{ $article['date'] }}</p>
    <p>{{ $article['content'] }}</p>
@endif
```

### user.blade.php - Ringkasan
```blade
@if(isset($error))
    <div class="error-message">{{ $error }}</div>
@else
    <div class="profile-name">{{ $user['full_name'] }}</div>
    <div class="profile-role">{{ $user['role'] }}</div>
    <p><strong>Email:</strong> {{ $user['email'] }}</p>
    <p><strong>Departemen:</strong> {{ $user['department'] }}</p>
@endif
```

### category.blade.php - Ringkasan
```blade
@if(isset($error))
    <div class="error-message">{{ $error }}</div>
@else
    <h2>{{ $category['category_name'] }}</h2>
    
    @foreach($category['items'] as $product)
        <div class="product-card">
            <div>{{ $product['name'] }}</div>
            <p>Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
            <p>Stok: {{ $product['stock'] }}</p>
        </div>
    @endforeach
@endif
```

---

## 📊 Data Structure

### Article Data
```php
[
    'id' => 1,
    'title' => 'Judul Artikel',
    'author' => 'Nama Author',
    'date' => '2026-04-25',
    'content' => 'Isi artikel...',
    'views' => 1250,
    'category' => 'Tutorial'
]
```

### User Data
```php
[
    'id' => 1,
    'name' => 'ahmad',
    'full_name' => 'Ahmad Hermawan',
    'email' => 'ahmad@posmaju.id',
    'role' => 'Admin',
    'department' => 'Development',
    'phone' => '08123456789',
    'join_date' => '2021-06-15'
]
```

### Product Data
```php
[
    'id' => 1,
    'name' => 'Kopi Arabika Premium',
    'price' => 35000,
    'stock' => 50,
    'description' => 'Kopi pilihan dari daerah Toraja'
]
```

### Category Data
```php
[
    'category_name' => 'Makanan & Minuman',
    'category_slug' => 'food-beverage',
    'items' => [
        [ 'id' => 1, 'name' => '...', 'price' => ..., ... ],
        [ 'id' => 2, 'name' => '...', 'price' => ..., ... ],
        ...
    ]
]
```

---

## 🔄 Method Chaining Examples

### Dalam Controller
```php
// Cara 1: Kirim dengan array
return view('home', $data);

// Cara 2: Kirim dengan with()
return view('home')
    ->with('title', 'Halaman Utama')
    ->with('message', 'Selamat datang');

// Cara 3: Kirim dengan array assoc
return view('article', ['article' => $article, 'error' => null]);
```

---

## 🎯 Passing Data Examples

### Simple Data
```php
// Controller
$data = ['title' => 'Home'];
return view('home', $data);

// View
{{ $title }}  <!-- Output: Home -->
```

### Array Data
```php
// Controller
$data = ['features' => ['Feature 1', 'Feature 2', 'Feature 3']];
return view('home', $data);

// View
@foreach($features as $feature)
    <li>{{ $feature }}</li>
@endforeach
```

### Nested Data
```php
// Controller
$data = ['user' => ['name' => 'Ahmad', 'email' => 'ahmad@mail.com']];
return view('user', $data);

// View
{{ $user['name'] }}      <!-- Output: Ahmad -->
{{ $user['email'] }}     <!-- Output: ahmad@mail.com -->
```

---

## 🔗 URL Examples

### Dengan Parameter Dinamis
```
/articles/1         → ArticleController@show(1)
/articles/2         → ArticleController@show(2)
/articles/100       → ArticleController@show(100)

/user/1/name/ahmad     → UserController@profile(1, 'ahmad')
/user/5/name/siti      → UserController@profile(5, 'siti')
/user/99/name/budi     → UserController@profile(99, 'budi')
```

### Dengan Prefix
```
/category/food-beverage      → ProductController@showByCategory('food-beverage')
/category/beauty-health      → ProductController@showByCategory('beauty-health')
/category/home-care          → ProductController@showByCategory('home-care')
/category/baby-kid           → ProductController@showByCategory('baby-kid')
```

---

## 📝 Common Blade Syntax

```blade
{{-- Comment --}}                          <!-- Comment Blade -->
{{ $var }}                                 <!-- Output -->
{{ $var ?? 'default' }}                    <!-- Null coalescing -->
@if (@endif)                              <!-- Conditional -->
@for @endfor                              <!-- Loop -->
@foreach @endforeach                       <!-- ForEach -->
@while @endwhile                           <!-- While -->
@foreach ($items as $key => $value)        <!-- ForEach with key -->
@php @endphp                               <!-- Raw PHP -->
{{ number_format($price, 0) }}             <!-- Format number -->
{{ date('d M Y', strtotime($date)) }}      <!-- Format date -->
{{ strtolower($text) }}                    <!-- String functions -->
{{ implode(', ', $array) }}                <!-- Array functions -->
```

---

## 🚀 Quick Copy-Paste Templates

### Buat Controller Baru
```bash
php artisan make:controller NamaController
```

### Basic Controller Method
```php
public function index() {
    $data = ['title' => 'Page Title'];
    return view('viewname', $data);
}
```

### Route Dengan Parameter
```php
Route::get('/path/{param}', [Controller::class, 'method']);
```

### Route Dengan Multiple Parameter
```php
Route::get('/path/{id}/sub/{name}', [Controller::class, 'method']);
```

### Route Group Dengan Prefix
```php
Route::prefix('prefix')->group(function () {
    Route::get('/path', [Controller::class, 'method']);
});
```

---

**Referensi Cepat - Gunakan file ini untuk quick lookup! 📚**
