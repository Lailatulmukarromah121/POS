<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - POS System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            padding: 40px;
            max-width: 900px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            color: #667eea;
            font-size: 2.8em;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 1.1em;
        }

        .subtitle {
            color: #764ba2;
            font-size: 1.3em;
            margin-top: 15px;
            font-weight: bold;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .menu-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 140px;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
        }

        .menu-icon {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .menu-title {
            font-size: 1.3em;
            font-weight: bold;
        }

        .menu-desc {
            font-size: 0.85em;
            margin-top: 8px;
            opacity: 0.9;
        }

        .category-section {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #e8eaf6;
        }

        .category-title {
            color: #667eea;
            font-size: 1.5em;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .category-btn {
            background: #f8f9fa;
            border: 2px solid #667eea;
            color: #667eea;
            padding: 15px;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s;
            font-weight: bold;
            font-size: 0.9em;
        }

        .category-btn:hover {
            background: #667eea;
            color: white;
            transform: translateY(-3px);
        }

        .info-box {
            background: #e8eaf6;
            border: 2px solid #667eea;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
            color: #333;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .header h1 {
                font-size: 2em;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.6em;
            }

            .category-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🛍️ {{ $title }}</h1>
            <p class="subtitle">{{ $welcome_message }}</p>
            <p>Sistem Manajemen Point of Sales Terintegrasi</p>
        </div>

        <!-- Menu Utama -->
        <div class="menu-grid">
            <a href="/" class="menu-card">
                <div class="menu-icon">🏠</div>
                <div class="menu-title">Beranda</div>
                <div class="menu-desc">Halaman Utama</div>
            </a>
            <a href="/user/1/name/ahmad" class="menu-card">
                <div class="menu-icon">👤</div>
                <div class="menu-title">Profil User</div>
                <div class="menu-desc">Lihat Profil Pengguna</div>
            </a>
            <a href="/sales" class="menu-card">
                <div class="menu-icon">💰</div>
                <div class="menu-title">Penjualan</div>
                <div class="menu-desc">Riwayat Transaksi</div>
            </a>
            <a href="/category/food-beverage" class="menu-card">
                <div class="menu-icon">🛒</div>
                <div class="menu-title">Produk</div>
                <div class="menu-desc">Kelola Produk</div>
            </a>
        </div>

        <!-- Kategori Produk -->
        <div class="category-section">
            <div class="category-title">📂 Kategori Produk</div>
            <div class="category-grid">
                <a href="/category/food-beverage" class="category-btn">🍔 Makanan & Minuman</a>
                <a href="/category/beauty-health" class="category-btn">💄 Kecantikan & Kesehatan</a>
                <a href="/category/home-care" class="category-btn">🧹 Perawatan Rumah</a>
                <a href="/category/baby-kid" class="category-btn">👶 Bayi & Anak-anak</a>
            </div>
        </div>

        <div class="info-box">
            <strong>ℹ️ Informasi Sistem:</strong>
            <p style="margin-top: 10px;">
                Aplikasi ini mendemonstrasikan implementasi arsitektur MVC (Model-View-Controller) 
                dengan Laravel. Gunakan menu di atas untuk navigasi dan eksplorasi fitur-fitur POS.
            </p>
        </div>
    </div>
</body>
</html>
