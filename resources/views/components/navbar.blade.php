<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar dengan Pop-up</title>
    <!-- Menambahkan Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Navbar Styling */
        .navbar {
            background-color: #f5f5f5;
            padding: 10px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .brand {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .navbar img {
            width: 60px;
            height: auto;
        }

        .navbar .menu {
            display: flex;
            gap: 20px;
        }

        .navbar .menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .navbar .menu a.active {
            color: #007bff; /* Warna teks ketika item aktif */
            font-weight: bold;
            text-decoration: underline;
        }

        .navbar .menu a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .navbar .auth-buttons button {
            background-color: #80d3c9;
            border: none;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            margin-left: 10px;
            font-weight: 500;
        }

        .navbar .auth-buttons button:hover {
            background-color: #66b8ad;
        }

        /* Profil Icon */
        .navbar .profile-icon {
            font-size: 24px;
            color: #333;
            cursor: pointer;
        }

        /* Styling untuk Pop-up Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2;
        }

        /* Pop-up Modal (Login dan Register) */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 320px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            text-align: center;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            z-index: 3;
        }

        .popup h2 {
            font-size: 16px;
            color: #333;
            margin: 0;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .popup input[type="text"],
        .popup input[type="password"],
        .popup input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .popup button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            box-sizing: border-box;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .popup button:hover,
        .popup button:active {
            background-color: #45a049;
        }

        /* Tombol untuk membuka pop-up */
        .open-login,
        .open-register {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .open-login:hover,
        .open-register:hover {
            background-color: #0056b3;
        }

        .forgot-password {
            display: block;
            font-size: 16px;
            color: #007bff;
            text-align: right;
        }
        .login-link a,
        .register-link a{
            color: #007bff;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="brand">
            <img src="img/logo.png" alt="Logo Desa Gebangkerep">
            <span>Desa Gebangkerep<br>Kab Pekalongan</span>
        </div>
        <div class="menu">
            <a href="/">Dashboard</a>
            <a href="/jenis">Jenis-Jenis Surat</a>
            <a href="/pengajuan">Pelayanan</a>
            <a href="/status">Status</a>
        </div>
        <div class="auth-buttons" id="auth-buttons">
            <button onclick="openPopup('login')" id="loginBtn">LOGIN</button>
            <button onclick="openPopup('register')" id="registerBtn">REGISTER</button>
        </div>
        <div class="profile" id="profile-section" style="display: none;">
            <i class="fas fa-user profile-icon" id="profile-icon" onclick="viewProfile()"></i>
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="closePopups()"></div>

    <!-- Pop-up Login -->
    <div class="popup" id="loginPopup">
        <h2>Login User</h2>

        <img src="img/logo.png" alt="Logo"> <!-- Ganti "logo.png" dengan URL logo yang sesuai -->

        <form>
            <input type="text" placeholder="Username" required>
            <input type="password" placeholder="Password" required>
            <a href="#" class="forgot-password">forgot your password?</a>

            <button type="submit">Login</button>
        </form>
        <div class="login-link">
            Don't have an account? <a onclick="openPopup('register')">Register here</a>
        </div>
    </div>

    <!-- Pop-up Register -->
    <div class="popup" id="registerPopup">
        <h2>Register User</h2>
        <img src="img/logo.png" alt="Logo">

        <form>
            <input type="text" placeholder="Username" required>
            <input type="email" placeholder="Email" required>
            <input type="password" placeholder="Password" required>
            <input type="password" placeholder="Confirm Password" required>
            <button type="submit">Register</button>
        </form>
        <div class="register-link">
            Already have an account? <a onclick="openPopup('login')">Login here</a>
        </div>
    </div>

    <script>
        // Fungsi untuk membuka pop-up login atau register
        function openPopup(type) {
            console.log("Opening " + type.charAt(0).toUpperCase() + type.slice(1) + " Popup");

            // Menutup semua pop-up terlebih dahulu
            closePopups();

            // Menampilkan pop-up yang dipilih
            document.getElementById(type + 'Popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

        // Fungsi untuk menutup pop-up login dan register
        function closePopups() {
            document.getElementById('loginPopup').style.display = 'none';
            document.getElementById('registerPopup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }

        // Fungsi untuk mengganti tampilan setelah login
        function userLogin() {
            // Menyembunyikan tombol login dan register
            document.getElementById('auth-buttons').style.display = 'none';
            // Menampilkan ikon profil
            document.getElementById('profile-section').style.display = 'block';
        }

        // Panggil userLogin() setelah login berhasil
        // Contoh simulasi
