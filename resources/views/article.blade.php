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
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 40px;
        }

        .header h1 {
            font-size: 2em;
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
            font-weight: bold;
        }

        .article-meta {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 2px solid #eee;
        }

        .meta-item {
            font-size: 0.9em;
            color: #666;
        }

        .meta-item strong {
            color: #667eea;
        }

        .meta-item.category {
            background: #e8eaf6;
            padding: 5px 10px;
            border-radius: 20px;
            color: #667eea;
        }

        .article-content {
            line-height: 1.8;
            color: #333;
            font-size: 1.1em;
        }

        .article-content h2 {
            color: #667eea;
            margin: 20px 0 10px 0;
            font-size: 1.5em;
        }

        .article-content p {
            margin-bottom: 15px;
        }

        .stats {
            display: flex;
            gap: 20px;
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .stat {
            text-align: center;
            flex: 1;
        }

        .stat-number {
            font-size: 1.8em;
            font-weight: bold;
            color: #667eea;
        }

        .stat-label {
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
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
        }

        .nav-links a:hover {
            background: #764ba2;
        }

        @media (max-width: 600px) {
            .content {
                padding: 20px;
            }

            .header h1 {
                font-size: 1.5em;
            }

            .article-meta {
                flex-direction: column;
                gap: 10px;
            }

            .stats {
                flex-direction: column;
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
            <h1>📰 {{ $title }}</h1>
        </div>

        <div class="content">
            @if(isset($error))
                <div class="error-message">
                    ⚠️ {{ $error }}
                </div>
                <div class="nav-links">
                    <a href="/">← Kembali ke Home</a>
                    <a href="/articles/1">Baca Artikel 1</a>
                    <a href="/articles/2">Baca Artikel 2</a>
                </div>
            @else
                <h2>{{ $article['title'] }}</h2>

                <div class="article-meta">
                    <div class="meta-item">
                        <strong>✍️ Penulis:</strong> {{ $article['author'] }}
                    </div>
                    <div class="meta-item">
                        <strong>📅 Tanggal:</strong> {{ $article['date'] }}
                    </div>
                    <div class="meta-item category">
                        🏷️ {{ $article['category'] }}
                    </div>
                </div>

                <div class="article-content">
                    <p>{{ $article['content'] }}</p>

                    <h2>Konten Lengkap</h2>
                    <p>
                        Artikel ini membahas secara detail tentang {{ strtolower($article['title']) }}. 
                        Kami telah mengumpulkan informasi terbaik dari berbagai sumber terpercaya untuk memberikan 
                        pengetahuan yang komprehensif kepada Anda.
                    </p>

                    <p>
                        Semoga artikel ini bermanfaat dan dapat meningkatkan pemahaman Anda tentang topik ini. 
                        Jika Anda memiliki pertanyaan atau saran, jangan ragu untuk menghubungi kami.
                    </p>
                </div>

                <div class="stats">
                    <div class="stat">
                        <div class="stat-number">{{ $article['views'] }}</div>
                        <div class="stat-label">Pembaca</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">{{ date('Y', strtotime($article['date'])) }}</div>
                        <div class="stat-label">Tahun Publikasi</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">5</div>
                        <div class="stat-label">Rating ⭐</div>
                    </div>
                </div>

                <div class="nav-links">
                    <a href="/">← Home</a>
                    <a href="/articles/1">Artikel 1</a>
                    <a href="/articles/2">Artikel 2</a>
                    <a href="/articles/3">Artikel 3</a>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
