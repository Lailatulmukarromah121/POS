<!DOCTYPE html>
<html>
<head>
    <title>Tambah User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            max-width: 500px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .btn-cancel {
            background-color: #ccc;
            color: black;
            margin-left: 10px;
        }
        .btn-cancel:hover {
            background-color: #bbb;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah User Baru</h1>
        <form action="/user/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="level_id">Level:</label>
                <select id="level_id" name="level_id" required>
                    <option value="">-- Pilih Level --</option>
                    <option value="1">Administrator</option>
                    <option value="2">Manager</option>
                    <option value="3">Staff/Kasir</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Simpan</button>
                <button type="button" class="btn-cancel" onclick="history.back()">Batal</button>
            </div>
        </form>
    </div>
</body>
</html>
