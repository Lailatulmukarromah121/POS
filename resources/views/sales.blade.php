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
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            color: #667eea;
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 1.1em;
        }

        .transactions {
            display: grid;
            gap: 20px;
        }

        .transaction-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #667eea;
        }

        .transaction-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .transaction-id {
            font-size: 1.3em;
            font-weight: bold;
            color: #333;
        }

        .transaction-date {
            color: #666;
            font-size: 0.9em;
        }

        .transaction-cashier {
            background: #667eea;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85em;
        }

        .transaction-items {
            margin-bottom: 20px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .item:last-child {
            border-bottom: none;
        }

        .item-name {
            flex: 1;
            color: #333;
        }

        .item-qty {
            color: #666;
            margin: 0 15px;
            min-width: 40px;
            text-align: center;
        }

        .item-price {
            color: #666;
            margin: 0 15px;
            min-width: 80px;
            text-align: right;
        }

        .item-total {
            color: #667eea;
            font-weight: bold;
            min-width: 100px;
            text-align: right;
        }

        .transaction-total {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            font-size: 1.05em;
        }

        .subtotal-row {
            color: #666;
        }

        .tax-row {
            color: #666;
        }

        .grand-total-row {
            font-size: 1.3em;
            font-weight: bold;
            color: #667eea;
            padding: 10px 0;
            margin-top: 10px;
            border-top: 2px solid #667eea;
        }

        .payment-info {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
            font-size: 0.95em;
        }

        .payment-method {
            color: #666;
        }

        .payment-method span {
            background: #764ba2;
            color: white;
            padding: 3px 10px;
            border-radius: 15px;
            font-size: 0.9em;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s;
        }

        .back-link:hover {
            background: #764ba2;
        }

        @media (max-width: 768px) {
            .transaction-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .item {
                flex-direction: column;
                gap: 5px;
            }

            .payment-info {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title }}</h1>
            <p>📊 Riwayat transaksi penjualan POS</p>
        </div>

        <div class="transactions">
            @foreach ($transactions as $transaction)
                <div class="transaction-card">
                    <div class="transaction-header">
                        <div>
                            <div class="transaction-id">{{ $transaction['id'] }}</div>
                            <div class="transaction-date">{{ $transaction['date'] }}</div>
                        </div>
                        <div class="transaction-cashier">💳 {{ $transaction['cashier'] }}</div>
                    </div>

                    <div class="transaction-items">
                        @foreach ($transaction['items'] as $item)
                            <div class="item">
                                <div class="item-name">{{ $item['name'] }}</div>
                                <div class="item-qty">{{ $item['qty'] }}x</div>
                                <div class="item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</div>
                                <div class="item-total">Rp {{ number_format($item['total'], 0, ',', '.') }}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="transaction-total">
                        <div class="total-row subtotal-row">
                            <span>Subtotal:</span>
                            <span>Rp {{ number_format($transaction['subtotal'], 0, ',', '.') }}</span>
                        </div>
                        <div class="total-row tax-row">
                            <span>Pajak (10%):</span>
                            <span>Rp {{ number_format($transaction['tax'], 0, ',', '.') }}</span>
                        </div>
                        <div class="total-row grand-total-row">
                            <span>Total:</span>
                            <span>Rp {{ number_format($transaction['total'], 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="payment-info">
                        <div class="payment-method">
                            Metode Pembayaran: <span>{{ $transaction['payment_method'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <a href="/" class="back-link">← Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
