<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
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
            padding: 60px 40px;
            text-align: center;
            max-width: 600px;
        }

        .error-code {
            font-size: 5em;
            color: #f5576c;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .error-title {
            font-size: 2em;
            color: #333;
            margin-bottom: 15px;
        }

        .error-message {
            color: #666;
            font-size: 1.1em;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .back-link {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s;
            font-size: 1em;
        }

        .back-link:hover {
            background: #764ba2;
        }

        .suggestions {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 30px;
            border-left: 4px solid #667eea;
            text-align: left;
        }

        .suggestions h3 {
            color: #667eea;
            margin-bottom: 10px;
        }

        .suggestions ul {
            margin-left: 20px;
            color: #666;
            line-height: 1.8;
        }

        .suggestions li {
            margin-bottom: 8px;
        }

        @media (max-width: 500px) {
            .container {
                padding: 40px 20px;
            }

            .error-code {
                font-size: 3em;
            }

            .error-title {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">404</div>
        <div class="error-title">Halaman Tidak Ditemukan</div>
        
        <div class="error-message">
            😕 Maaf, halaman yang Anda cari tidak dapat ditemukan. 
            URL mungkin salah atau halaman telah dihapus.
        </div>

        <a href="/" class="back-link">← Kembali ke Home</a>

        <div class="suggestions">
            <h3>💡 Saran untuk Anda:</h3>
            <ul>
                <li><a href="/" style="color: #667eea; text-decoration: none;">Home</a> - Kembali ke halaman utama</li>
                <li><a href="/about" style="color: #667eea; text-decoration: none;">About</a> - Pelajari tentang kami</li>
                <li><a href="/articles/1" style="color: #667eea; text-decoration: none;">Artikel</a> - Baca artikel kami</li>
                <li><a href="/category/food-beverage" style="color: #667eea; text-decoration: none;">Produk</a> - Lihat daftar produk</li>
            </ul>
        </div>
    </div>
</body>
</html>
