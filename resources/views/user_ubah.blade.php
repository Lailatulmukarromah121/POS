<!DOCTYPE html>
<html>
<head>
    <title>Ubah User</title>
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
        <h1>Ubah Data User</h1>
        <form method="post" action="/user/ubah_simpan/{{ $data->user_id }}">
            {{ csrf_field() }}
            @method('PUT')

            <div class="form-group">
                <label>User ID:</label>
                <input type="text" name="user_id" value="{{ $data->user_id }}" readonly>
            </div>

            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" value="{{ $data->username }}" required>
            </div>

            <div class="form-group">
                <label>Nama:</label>
                <input type="text" name="nama" value="{{ $data->nama }}" required>
            </div>

            <div class="form-group">
                <label>Password (kosongkan jika tidak ingin mengubah):</label>
                <input type="password" name="password" placeholder="Masukkan password baru">
            </div>

            <div class="form-group">
                <label>Level ID:</label>
                <select name="level_id" required>
                    <option value="1" {{ $data->level_id == 1 ? 'selected' : '' }}>Administrator</option>
                    <option value="2" {{ $data->level_id == 2 ? 'selected' : '' }}>Manager</option>
                    <option value="3" {{ $data->level_id == 3 ? 'selected' : '' }}>Staff/Kasir</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit">Simpan Perubahan</button>
                <button type="button" class="btn-cancel" onclick="history.back()">Batal</button>
            </div>
        </form>
    </div>
</body>
</html>
