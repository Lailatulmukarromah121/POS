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
            overflow: hidden;
            max-width: 600px;
            width: 100%;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 1.8em;
            margin-bottom: 5px;
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

        .profile-card {
            text-align: center;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3em;
            margin: 0 auto 20px;
            color: white;
        }

        .profile-avatar.admin {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .profile-avatar.manager {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .profile-avatar.cashier {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .profile-name {
            font-size: 1.8em;
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .profile-role {
            background: #e8eaf6;
            color: #667eea;
            display: inline-block;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .info-section {
            margin-top: 30px;
            text-align: left;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            align-items: center;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #667eea;
            font-weight: bold;
        }

        .info-value {
            color: #333;
            text-align: right;
        }

        .info-row.important {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }

        .department-badge {
            background: #667eea;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.85em;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
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

        @media (max-width: 500px) {
            .content {
                padding: 20px;
            }

            .info-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .info-value {
                text-align: left;
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title }}</h1>
        </div>

        <div class="content">
            @if(isset($error))
                <div class="error-message">
                    ⚠️ {{ $error }}
                </div>
                <a href="/" class="back-link">← Kembali ke Home</a>
            @else
                <div class="profile-card">
                    <div class="profile-avatar {{ strtolower($user['role']) }}">
                        👤
                    </div>

                    <div class="profile-name">{{ $user['full_name'] }}</div>
                    <div class="profile-role">{{ $user['role'] }}</div>

                    <div class="info-section">
                        <div class="info-row important">
                            <span class="info-label">📧 Email</span>
                            <span class="info-value">{{ $user['email'] }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">🏢 Departemen</span>
                            <span class="info-value">
                                <span class="department-badge">{{ $user['department'] }}</span>
                            </span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">☎️ Telepon</span>
                            <span class="info-value">{{ $user['phone'] }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">📅 Tanggal Bergabung</span>
                            <span class="info-value">{{ date('d M Y', strtotime($user['join_date'])) }}</span>
                        </div>

                        <div class="info-row">
                            <span class="info-label">⏱️ Masa Kerja</span>
                            <span class="info-value">
                                @php
                                    $joinDate = new DateTime($user['join_date']);
                                    $today = new DateTime();
                                    $interval = $today->diff($joinDate);
                                    $years = $interval->y;
                                    $months = $interval->m;
                                @endphp
                                {{ $years }} tahun {{ $months }} bulan
                            </span>
                        </div>
                    </div>

                    <a href="/" class="back-link">← Kembali ke Home</a>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
