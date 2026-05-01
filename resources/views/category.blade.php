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
            padding: 40px 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .header h1 {
            font-size: 2.2em;
            margin-bottom: 10px;
        }

        .content {
            padding: 40px;
        }

        .error-message {
            background: #fee;
            border: 2px solid #f00;
            color: #c00;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
        }

        .error-message strong {
            display: block;
            font-size: 1.1em;
            margin-bottom: 15px;
        }

        .available-categories {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .category-link {
            background: #e8eaf6;
            color: #667eea;
            padding: 15px;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            transition: all 0.3s;
            border: 2px solid #667eea;
        }

        .category-link:hover {
            background: #667eea;
            color: white;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .product-card {
            background: #f8f9fa;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            border-left: 4px solid #667eea;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .product-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .product-name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-body {
            padding: 20px;
        }

        .product-description {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .product-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }

        .price {
            font-size: 1.3em;
            color: #667eea;
            font-weight: bold;
        }

        .stock {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
        }

        .stock.low {
            color: #f5576c;
        }

        .stock.medium {
            color: #ffa400;
        }

        .stock.high {
            color: #43e97b;
        }

        .add-to-cart {
            width: 100%;
            background: #667eea;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .add-to-cart:hover {
            background: #764ba2;
        }

        .category-stats {
            background: #e8eaf6;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
        }

        .category-stats h2 {
            color: #667eea;
            margin-bottom: 10px;
        }

        .nav-links {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .nav-links a {
            background: #667eea;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
            font-size: 0.9em;
        }

        .nav-links a:hover {
            background: #764ba2;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.5em;
            }

            .content {
                padding: 20px;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .nav-links {
                flex-direction: column;
            }

            .nav-links a {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🛒 {{ $title }}</h1>
        </div>

        <div class="content">
            @if(isset($error))
                <div class="error-message">
                    <strong>⚠️ {{ $error }}</strong>

                    @if(isset($available_categories))
                        <p>Silakan pilih kategori yang tersedia:</p>
                        <div class="available-categories">
                            @foreach($available_categories as $slug => $name)
                                <a href="/category/{{ $slug }}" class="category-link">
                                    {{ $name }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>

                <a href="/" class="nav-links" style="display: inline-block;">← Kembali ke Home</a>
            @else
                <div class="category-stats">
                    <h2>📦 {{ $category['category_name'] }}</h2>
                    <p>Total Produk: <strong>{{ count($category['items']) }}</strong> item</p>
                </div>

                <div class="products-grid">
                    @foreach($category['items'] as $product)
                        <div class="product-card">
                            <div class="product-header">
                                <div class="product-name">{{ $product['name'] }}</div>
                                <div style="font-size: 2em;">💼</div>
                            </div>

                            <div class="product-body">
                                <p class="product-description">{{ $product['description'] }}</p>

                                <div class="product-info">
                                    <span class="price">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                                    <span class="stock 
                                        @if($product['stock'] < 20) low
                                        @elseif($product['stock'] < 50) medium
                                        @else high @endif">
                                        📊 {{ $product['stock'] }}
                                    </span>
                                </div>

                                <button class="add-to-cart">
                                    🛒 Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="category-stats" style="margin-top: 30px;">
                    <p>💡 Catatan: Klik tombol untuk menambahkan produk ke keranjang belanja Anda</p>
                </div>
            @endif

            <div class="nav-links">
                <a href="/">← Home</a>
                <a href="/category/food-beverage">🍔 Makanan & Minuman</a>
                <a href="/category/beauty-health">💄 Kecantikan & Kesehatan</a>
                <a href="/category/home-care">🧹 Perawatan Rumah</a>
                <a href="/category/baby-kid">👶 Bayi & Anak-anak</a>
            </div>
        </div>
    </div>
</body>
</html>
