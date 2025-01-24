<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Pengajuan Surat')</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar (for large screens) -->
        <div class="sidebar w-1/5 bg-[#E6F4EA] h-full p-4 box-border hidden lg:block z-50">
            <div class="text-center flex items-center justify-center mb-8 mt-4">
                <img src="{{ asset('img/logo.png') }}" alt="Logo Desa Gebangkerep" class="w-20 h-20 gap-4 mb-4">
                <div class="text-group text-left mb-2">
                    <h3 class="text-lg font-semibold leading-tight">Desa Gebangkerep</h3>
                    <h3 class="text-lg font-semibold leading-tight">Kab Pekalongan</h3>
                </div>
            </div>
            <nav>
                <a href="/admin" class="block p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('admin') ? 'bg-green-700 text-white font-bold' : '' }}">
                    Dashboard
                </a>
                <hr class="border-t-2 border-gray-200">
                <a href="/kelolaSurat" class="block p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('kelolaSurat') ? 'bg-green-700 text-white font-bold' : '' }}">
                    Kelola Surat
                </a>
                <hr class="border-t-2 border-gray-200">
                {{-- <a href="/kelolaStatus" class="block p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('kelolaStatus') ? 'bg-green-700 text-white font-bold' : '' }}">
                    Kelola Status
                </a> --}}
                {{-- <hr class="border-t-2 border-gray-200"> --}}
                <a href="/data" class="block p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('data') ? 'bg-green-700 text-white font-bold' : '' }}">
                    Data Surat
                </a>
                <hr class="border-t-2 border-gray-200">
                <a href="/kelolaSuratMasuk" class="block p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('kelolaSuratMasuk') ? 'bg-green-700 text-white font-bold' : '' }}">
                    Kelola Surat Masuk
                </a>
                <hr class="border-t-2 border-gray-200">
                <form method="POST" action="{{ route('logout') }}" class="inline-block w-full">
                    @csrf
                    <button type="submit" class="w-full text-left p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('keluar') ? 'bg-green-700 text-white font-bold' : '' }}">
                        Keluar
                    </button>
                </form>
                <hr class="border-t-2 border-gray-200">
            </nav>
        </div>

        <!-- Main Content -->
        <div class="content w-full lg:w-4/5 overflow-auto">
            <!-- Header -->
            <div class="header bg-gray-200 h-16 mb-4 flex items-center justify-between p-4 fixed w-full z-50">
                <!-- Logo and Text (only on mobile/tablet) -->
                <div class="flex items-center lg:hidden">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo Desa Gebangkerep" class="w-12 h-12 mr-4">
                    <div>
                        <h3 class="text-lg font-semibold leading-tight">Desa Gebangkerep</h3>
                        <h3 class="text-lg font-semibold leading-tight">Kab Pekalongan</h3>
                    </div>
                </div>

                <!-- Hamburger Icon (only on mobile/tablet) -->
                <button id="hamburger" class="lg:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Header Title (only on desktop) -->
                <div class="hidden lg:block flex-1 text-right mr-4 fixed">
                    <h3 class="text-xl font-semibold leading-tight">Helo Admin!</h3>
                </div>
            </div>

            <!-- Sidebar Menu (for small screens) -->
            <div id="sidebar-menu" class="lg:hidden fixed inset-0 bg-gray-700 bg-opacity-50 hidden z-50">
                <div id="sidebar-content" class="sidebar w-3/4 bg-[#E6F4EA] h-full p-4 box-border max-w-xs">
                    <div class="text-center flex items-center justify-center mb-4">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo Desa Gebangkerep" class="w-16 h-16 gap-4 mb-4">
                        <div class="text-group text-left mb-2">
                            <h3 class="text-lg font-semibold leading-tight">Desa Gebangkerep</h3>
                            <h3 class="text-lg font-semibold leading-tight">Kab Pekalongan</h3>
                        </div>
                    </div>
                    <nav>
                        <a href="/admin" class="block p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('admin') ? 'bg-green-700 text-white font-bold' : '' }}">
                            Dashboard
                        </a>
                        <hr class="border-t-2 border-gray-200">
                        <a href="/kelolaSurat" class="block p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('kelolaSurat') ? 'bg-green-700 text-white font-bold' : '' }}">
                            Kelola Surat
                        </a>
                        <hr class="border-t-2 border-gray-200">
                        {{-- <a href="/kelolaStatus" class="block p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('kelolaStatus') ? 'bg-green-700 text-white font-bold' : '' }}">
                            Kelola Status
                        </a> --}}
                        <a href="/data" class="block p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('data') ? 'bg-green-700 text-white font-bold' : '' }}">
                            Data Surat
                        </a>
                        <hr class="border-t-2 border-gray-200">
                        <a href="/kelolaSuratMasuk" class="block p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('kelolaSuratMasuk') ? 'bg-green-700 text-white font-bold' : '' }}">
                            Kelola Surat Masuk
                        </a>
                        <hr class="border-t-2 border-gray-200">
                        <form method="POST" action="{{ route('logout') }}" class="inline-block w-full">
                            @csrf
                            <button type="submit" class="w-full text-left p-2.5 pl-4 pr-4 text-gray-700 rounded mt-2.5 mb-2.5 transition-colors duration-300 ease-in-out hover:bg-green-300 hover:text-white {{ request()->is('keluar') ? 'bg-green-700 text-white font-bold' : '' }}">
                                Keluar
                            </button>
                            <hr class="border-t-2 border-gray-200">
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="py-6 px-10 mt-16">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        // Referensi elemen
        const hamburger = document.getElementById('hamburger');
        const sidebarMenu = document.getElementById('sidebar-menu');
        const sidebarContent = document.getElementById('sidebar-content');

        // Fungsi untuk toggle sidebar saat tombol hamburger diklik
        hamburger.addEventListener('click', () => {
            sidebarMenu.classList.toggle('hidden');
        });

        // Tutup sidebar ketika klik di luar elemen sidebar-content
        sidebarMenu.addEventListener('click', (event) => {
            if (!sidebarContent.contains(event.target)) {
                sidebarMenu.classList.add('hidden');
            }
        });
        console.log(event.target); // Melihat elemen yang diklik

    </script>

</body>

</html>
