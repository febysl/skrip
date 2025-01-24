<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Pengajuan Surat</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- CDN Font Awesome -->
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        .brand {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .background {
            background-image: url('img/brand.jpg');
            /* Menggunakan gambar logo sebagai background */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            /* Tambahkan efek gelap */
            z-index: 1;
        }

        .background h1,
        .background p {
            padding: 6px;
            position: relative;
            z-index: 2;
        }

        .background h1 {
            font-size: 48px;
            margin: 0;
        }

        .background p {
            font-size: 24px;
            margin: 10px 0;
        }

        /* Tambahkan margin-bottom untuk memastikan konten tidak terpotong */
        .content-wrapper {
            margin-top: 50px;
            /* Mengatur jarak dari gambar background */
        }

        /* Menambahkan style untuk gambar dan deskripsi */
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* Agar elemen berada di tengah */
            gap: 40px;
            margin-top: 50px;
            /* Mengatur margin atas agar lebih terpusat */
            margin-bottom: 50px;
            padding: 20px;
        }

        .flex-item {
            flex: 1;
            min-width: 320px;
            max-width: 500px;
            /* Menjaga ukuran maksimal */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            background-color: #e2d6c8;
        }

        /* Animasi hover untuk elemen */
        .flex-item:hover {
            transform: scale(1.05);
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            border: 4px solid #E6F4EA;
        }

        /* Container utama */


        /* Styling Background */
        .background {
            background-image: url('img/brand.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .background h1 {
            font-size: 56px;
            margin: 0;
            text-transform: uppercase;
            font-weight: 700;
            z-index: 2;
        }

        .background p {
            font-size: 24px;
            margin-top: 10px;
            z-index: 2;
        }

        /* Flex container untuk gambar dan deskripsi */
        .flex-container {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
            padding: 40px 10px;
        }

        .flex-item {
            flex: 1;
            max-width: 500px;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .flex-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .image-container img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .description-container {
            background-color: #E6F4EA;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: justify;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .description-container h1 {
            color: #1d4ed8;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .description-container p {
            color: #4b5563;
            font-size: 20px;
            line-height: 1.8;
            margin-top: 10px;
        }

        .box {
            background-color: rgb(226, 239, 247);
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .box h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #3B82F6;
            /* Warna biru */
        }

        /* Cards section styling */
        .cards-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 50px;
            margin: 50px;
            justify-items: center;

        }

        .card-item {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(20px);
            /* Memindahkan kartu sedikit ke bawah */
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
            border-left: 5px solid #3B82F6;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-item:hover {
            transform: translateY(-10px) scale(1.1);
            /* Membesarkan kartu dengan scale */
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
            /* Bayangan lebih jelas */
            background-color: #f0f4f8;
            /* Ubah latar belakang untuk efek hover */
        }

        .card-item .card-body {
            transition: color 0.3s ease;
            /* Animasi perubahan warna */
        }

        .card-item:hover .card-body h3 {
            color: #1d4ed8;
            /* Ubah warna judul saat hover */
        }

        .card-item:hover .card-body p {
            color: #555;
            /* Ubah warna deskripsi saat hover */
        }

        /* Hover effect untuk gambar */
        .flex-item:hover {
            transform: scale(1.05);
            /* Membesarkan gambar saat hover */
        }

        /* Styling untuk gambar dalam card */
        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            border: 4px solid #E6F4EA;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .card-body h3 {
            margin-bottom: 10px;
            color: #3B82F6;
            font-weight: 600;
        }

        .card-body p {
            margin: 0;
            color: #333;
            line-height: 1.6;
        }

        /* Animasi untuk munculnya kartu */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Penundaan animasi pada setiap kartu */
        .card-item:nth-child(1) {
            animation-delay: 0.2s;
        }

        .card-item:nth-child(2) {
            animation-delay: 0.4s;
        }

        .card-item:nth-child(3) {
            animation-delay: 0.6s;
        }

        .card-item:nth-child(4) {
            animation-delay: 0.8s;
        }

        .card-item:nth-child(5) {
            animation-delay: 1s;
        }

        /* Hover effect untuk kartu */
        .card-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }


        /* Footer Styling */
.footer {
    background-color: #2c3e50;
    color: white;
    padding: 40px 20px;
    text-align: center;
    font-family: 'Roboto', sans-serif;
}

/* .footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-logo .logo {
    width: 150px;
    height: auto;
    object-fit: contain;
    margin-bottom: 20px;
    display: block;
} */

.footer-content {
    display: flex;
    justify-content: space-between;
    gap: 40px;
    text-align: left;
    flex-wrap: wrap;
    margin-top: 20px;
}

.footer-address, .footer-contact {
    flex: 1;
    min-width: 250px;
    margin-top: 10px;
}

.footer-address h4, .footer-contact h4 {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 10px;

    color: #ecf0f1;
}

.footer-address p, .footer-contact p {
    font-size: 14px;
    line-height: 1.6;
    color: #bdc3c7;

}

.social-links {
    margin-top: 10px;
}

.social-icon {
    color: #ecf0f1;
    font-size: 20px;
    margin: 0 10px;
    text-decoration: none;
    transition: transform 0.3s ease;
}

.social-icon:hover {
    transform: scale(1.1);
}
.footer-container {
    display: flex;
    justify-content: space-between; /* Meratakan elemen secara horizontal */
    align-items: start; /* Selaraskan elemen secara vertikal */
    text-align: start;
    gap: 100px; /* Jarak antar elemen */
    max-width: 1200px; /* Batas lebar untuk presisi */
    margin: 0 auto; /* Pusatkan footer di tengah layar */
    padding: 10px;

}


.footer-logo {
    display: flex;
    align-items: center;
    text-align: start;
    gap: 5px;
    margin-right: 15px;
    margin-top: 4px
}

.footer-bottom {
    margin-top: 30px;
    background-color: #34495e;
    padding: 20px;
}

.footer-bottom p {
    font-size: 14px;
    color: #bdc3c7;
}

/* Responsif untuk tampilan mobile */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: row !important; /* Mengubah menjadi kolom */

    }


    .footer-content {
        text-align: center;
        flex-direction: column ;
        gap: 20px;

    }


    .footer-address, .footer-contact {
        width: 100%;
    }
}


        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .cards-container {
                grid-template-columns: repeat(2, 1fr);

            }

            .flex-container {
                flex-direction: column;
                gap: 30px;
            }
        }

        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .flex-container {
                flex-direction: column;
                gap: 30px;
            }
        }

        .custom-hr {
            border: 1px solid white;
            /* Mengubah warna garis menjadi putih */
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <x-app-layout>
        <div class="mt-20">
            <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <div class="background">
                    <h1>Selamat Datang</h1>
                    <p>Website Pengajuan Surat<br>Desa Gebangkerep</p>
                </div>
            </div>

            <!-- Flexbox untuk gambar dan deskripsi -->
            <div class="content-wrapper">
                <div class="container mx-auto p-8">
                    <div class="flex-container">
                        <!-- Gambar -->
                        <div class="flex-item image-container">
                            <img src="img/gbk.png" alt="Desa Gebangkerep" class="w-full h-auto rounded-lg ">
                        </div>
                        <!-- Deskripsi -->
                        <div class="flex-item description-container">
                            <h1>Website Pengajuan Surat Online</h1>
                            <p>
                                Website pengajuan surat online adalah layanan digital yang dirancang untuk memudahkan
                                masyarakat dalam
                                mengurus berbagai kebutuhan administrasi, seperti pembuatan surat keterangan domisili,
                                surat pengantar,
                                surat izin, dan dokumen resmi lainnya. Melalui platform ini, pengguna dapat dengan cepat
                                mengisi formulir
                                pengajuan, mengunggah dokumen yang diperlukan, dan memantau prosesnya tanpa harus datang
                                langsung ke
                                kantor desa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mx-auto p-8">
                <div
                    class="box flex flex-col bg-gradient-to-r from-blue-300 via-white to-blue-400 rounded-xl shadow-xl p-8 border border-[#E6F4EA]">
                    <h2 class="text-3xl font-extrabold mb-6 text-blue-600 text-center">Langkah-langkah Pengajuan Surat
                    </h2>
                    <hr class="custom-hr">
                    <div class="cards-container">
                        <div class="card-item animate-card">
                            <div class="card-header">
                                <i class="fas fa-user-circle card-icon"></i> <!-- Ikon untuk step 1 -->
                            </div>
                            <div class="card-body">
                                <h3 class="text-xl font-semibold text-blue-500">1. Registrasi atau Login</h3>
                                <p class="text-lg">Jika Anda belum terdaftar, lakukan registrasi terlebih dahulu atau
                                    login jika sudah memiliki akun.</p>
                            </div>
                        </div>
                        <div class="card-item animate-card">
                            <div class="card-header">
                                <i class="fas fa-envelope card-icon"></i> <!-- Ikon untuk step 2 -->
                            </div>
                            <div class="card-body">
                                <h3 class="text-xl font-semibold text-blue-500">2. Pilih Jenis Surat</h3>
                                <p class="text-lg">Pastikan jenis surat yang akan diajukan sesuai dengan kebutuhan Anda dengan membaca informasi yang tersedia pada halaman Jenis Surat.</p>
                            </div>
                        </div>
                        <div class="card-item animate-card">
                            <div class="card-header">
                                <i class="fas fa-edit card-icon"></i> <!-- Ikon untuk step 3 -->
                            </div>
                            <div class="card-body">
                                <h3 class="text-xl font-semibold text-blue-500">3. Isi Formulir Pengajuan</h3>
                                <p class="text-lg">Isi formulir dengan data yang diperlukan dan unggah dokumen yang
                                    diminta.</p>
                            </div>
                        </div>
                        <div class="card-item animate-card">
                            <div class="card-header">
                                <i class="fas fa-check-circle card-icon"></i> <!-- Ikon untuk step 4 -->
                            </div>
                            <div class="card-body">
                                <h3 class="text-xl font-semibold text-blue-500">4. Verifikasi dan Proses</h3>
                                <p class="text-lg">Petugas yang bertanggung jawab akan memverifikasi data Anda, kemudian surat akan diproses.
                                </p>
                            </div>
                        </div>
                        <div class="card-item animate-card">
                            <div class="card-header">
                                <i class="fas fa-download card-icon"></i> <!-- Ikon untuk step 5 -->
                            </div>
                            <div class="card-body">
                                <h3 class="text-xl font-semibold text-blue-500">5. Unduh Surat</h3>
                                <p class="text-lg">Setelah disetujui, Anda dapat mengunduh surat yang sudah selesai diproses pada halaman status.</p>
                            </div>
                        </div>
                        <div class="card-item animate-card">
                            <div class="card-header">
                                <i class="fas fa-exclamation-circle card-icon"></i> <!-- Ikon untuk step 6 -->
                            </div>
                            <div class="card-body">
                                <h3 class="text-xl font-semibold text-blue-500">6. Konfirmasi Apabila Terjadi Kesalahan
                                </h3>
                                <p class="text-lg">Jika ada kesalahan dalam pengisian data atau proses pengajuan,
                                    lakukan konfirmasi kepada pihak desa untuk perbaikan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="footer-container flex">
                    <div class="footer-logo p-3">
                        <img src="img/logo.png" alt="Logo Desa Gebangkerep" class="logo">
                        <div class="text-group text-left mb-2">
                            <h3 class="text-lg font-semibold leading-tight">Desa Gebangkerep</h3>
                            <h3 class="text-lg font-semibold leading-tight">Kab Pekalongan</h3>
                        </div>
                    </div>


                    <div class="ml-3">
                        <div class="footer-address">
                            <h4>Alamat Balaidesa</h4>
                            <p>Desa Gebangkerep, Kecamatan Sragi, Kabupaten Pekalongan, Provinsi Jawa Tengah, Indonesia</p>
                        </div>
                        <div class="footer-contact">
                            <h4>Kontak Kami</h4>
                            <p>Telp: (021) 123-4567</p>
                            <p>Email: kontak@desagebankerep.id</p>
                            <div class="social-links">
                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                            </div>

                    </div>
                    </div>

                </div>
                <div class="footer-bottom">
                    <p>&copy; 2024 Desa Gebangkerep.</p>
                </div>
            </footer>



        </div>
    </x-app-layout>
</body>

</html>
