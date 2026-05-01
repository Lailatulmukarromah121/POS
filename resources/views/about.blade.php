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
            max-width: 900px;
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
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.1em;
            opacity: 0.9;
        }

        .content {
            padding: 40px;
        }

        .company-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .info-item {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }

        .info-item h3 {
            color: #667eea;
            margin-bottom: 10px;
        }

        .info-item p {
            color: #666;
            line-height: 1.6;
        }

        .team-section {
            margin-top: 40px;
            border-top: 2px solid #eee;
            padding-top: 30px;
        }

        .team-section h2 {
            color: #667eea;
            margin-bottom: 20px;
            font-size: 1.8em;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .team-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            transition: transform 0.3s;
        }

        .team-card:hover {
            transform: translateY(-5px);
        }

        .team-card h3 {
            font-size: 1.3em;
            margin-bottom: 5px;
        }

        .team-card .position {
            background: rgba(255, 255, 255, 0.2);
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9em;
            margin-bottom: 10px;
        }

        .team-card .email {
            font-size: 0.85em;
            opacity: 0.9;
            margin-top: 10px;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            background: #667eea;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .back-link:hover {
            background: #764ba2;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8em;
            }

            .company-info {
                grid-template-columns: 1fr;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title }}</h1>
            <p>{{ $company_motto }}</p>
        </div>

        <div class="content">
            <div class="company-info">
                <div class="info-item">
                    <h3>📊 Nama Perusahaan</h3>
                    <p><strong>{{ $company_name }}</strong></p>
                </div>

                <div class="info-item">
                    <h3>📅 Tahun Berdiri</h3>
                    <p><strong>{{ $founded_year }}</strong></p>
                </div>

                <div class="info-item">
                    <h3>👥 Jumlah Karyawan</h3>
                    <p><strong>{{ $employees }} Orang</strong></p>
                </div>

                <div class="info-item">
                    <h3>🎯 Visi Kami</h3>
                    <p>Menjadi solusi teknologi terdepan di Asia Tenggara</p>
                </div>
            </div>

            <div style="background: #e8eaf6; padding: 20px; border-radius: 8px; margin-top: 20px;">
                <h3 style="color: #667eea; margin-bottom: 10px;">📝 Tentang Kami</h3>
                <p style="color: #666; line-height: 1.8;">
                    {{ $description }}
                    <br><br>
                    Dengan teknologi terkini dan tim profesional, kami berkomitmen untuk memberikan 
                    solusi terbaik bagi bisnis retail dan restoran di seluruh Indonesia.
                </p>
            </div>

            <div class="team-section">
                <h2>👨‍💼 Tim Kami</h2>
                <div class="team-grid">
                    @foreach($team_members as $member)
                        <div class="team-card">
                            <h3>{{ $member['name'] }}</h3>
                            <div class="position">{{ $member['position'] }}</div>
                            <div class="email">📧 {{ $member['email'] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <a href="/" class="back-link">← Kembali ke Home</a>
        </div>
    </div>
</body>
</html>
