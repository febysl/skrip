<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar dengan Pop-up</title>
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
            color: #007bff;
            /* Warna teks ketika item aktif */
            font-weight: bold;
            /* Membuat teks menjadi tebal */
            text-decoration: underline;
            /* Memberikan garis bawah pada teks */
        }

        .navbar .menu a:hover {
            color: #0056b3;
            /* Warna teks saat hover */
            text-decoration: underline;
            /* Memberikan garis bawah saat hover */
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

        .popup form label {
            display: block;
            text-align: left;
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
        .register-link a {
            color: #007bff;
            cursor: pointer;
        }

        .popup img {
            width: 60px;
            /* Menyesuaikan ukuran logo */
            margin: 15px 0;
        }


        /* Styling untuk Tombol Auth */
        .auth-buttons a {
            display: inline-block;
            margin: 0 5px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #4CAF50;
            background-color: #ffffff;
            border: 2px solid #4CAF50;
            border-radius: 25px;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .auth-buttons a:hover {
            background-color: #4CAF50;
            color: #ffffff;
            box-shadow: 0px 4px 15px rgba(76, 175, 80, 0.5);
            transform: translateY(-3px);
        }

        .auth-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        /* Responsivitas untuk Tombol */
        @media (max-width: 768px) {
            .auth-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .auth-buttons a {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="brand" onclick="navigateToDashboard()" style="cursor: pointer;">
            <img src="img/logo.png" alt="Logo Desa Gebangkerep">
            <span>Desa Gebangkerep<br>Kab Pekalongan</span>
        </div>

        <div class="menu">
            <a href="/">Dashboard</a>
            <a href="/jenis">Jenis-Jenis Surat</a>
            <a href="/pelayanan">Pelayanan</a>
            <a href="/status">Status</a>
            <a href="/suratMasuk">Surat Masuk</a>

        </div>
        <div class="auth-buttons">
            @if (Route::has('login'))
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>


    </div>

    {{-- <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="closePopups()"></div>
    <div class="popup" id="loginPopup">
        <h2>Login User</h2>

        <img src="img/logo.png" alt="Logo"> <!-- Ganti "logo.png" dengan URL logo yang sesuai -->

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Label untuk Username -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Masukkan Username" required>

            <!-- Label untuk Password -->
            <label for="login-password">Password:</label>
            <input type="password" id="login-password" name="password" placeholder="Masukkan Password" required>

            <a href="#" class="forgot-password">Forgot your password?</a>
            <button type="submit">Login</button>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>
        <div class="login-link">
            Don't have an account? <a onclick="openPopup('register')">Register here</a>
        </div>
    </div>


    <div class="popup" id="registerPopup">
        <h2>Register User</h2>
        <img src="img/logo.png" alt="Logo"> <!-- Ganti "logo.png" dengan URL logo yang sesuai -->

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Label untuk Username -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Masukkan Username" required>

            <!-- Label untuk Email -->
            <label for="register-email">Email:</label>
            <input type="email" id="register-email" name="email" placeholder="Masukkan Email" required>

            <!-- Label untuk Password -->
            <label for="register-password">Password:</label>
            <input type="password" id="register-password" name="password" placeholder="Masukkan Password" required>

            <button type="submit">Register</button>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>
        <div class="register-link">
            Already have an account? <a onclick="openPopup('login')">Login here</a>
        </div>
    </div> --}}


    <script>
        function handleButtonClick() {
            console.log("Button clicked!");
        }






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

        // Menambahkan kelas 'active' pada menu yang sesuai dengan halaman saat ini
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname; // Ambil path halaman saat ini
            const menuItems = document.querySelectorAll('.navbar .menu a'); // Semua elemen menu

            // Menghapus kelas 'active' dari semua menu
            menuItems.forEach(function(item) {
                item.classList.remove('active');
            });

            // Memeriksa setiap item menu untuk mencocokkan path URL
            menuItems.forEach(function(item) {
                const menuItemPath = item.getAttribute('href'); // Ambil href dari elemen menu

                // Cek apakah menu item path cocok dengan current path
                if (currentPath === menuItemPath) {
                    item.classList.add('active'); // Menambahkan kelas active pada menu yang cocok
                }
            });
        });

        function navigateToDashboard() {
            window.location.href = '/'; // Ganti '/' dengan URL dashboard jika berbeda
        }
    </script>

</body>

</html>
