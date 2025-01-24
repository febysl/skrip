<style>
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
</style>


<nav x-data="{ open: false }" class="bg-white border-b border-gray-100  fixed top-0 left-0 w-full z-50 shadow">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo Section -->
            <a href="{{ Auth::check() ? route('dashboard') : '/' }}" class="flex items-center cursor-pointer">
                <img src="img/logo.png" alt="Logo Desa Gebangkerep" class="w-20 h-auto sm:w-24 lg:w-32">
                <span class="ml-2 text-gray-800 text-sm sm:text-sm lg:text-base">
                    Desa Gebangkerep<br>Kab Pekalongan
                </span>
            </a>


            <!-- Main Navigation Links (Desktop) -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('data.jenis')" :active="request()->routeIs('data.jenis')">
                    {{ __('Jenis Surat') }}
                </x-nav-link>
                <x-nav-link :href="route('pengajuan.pelayanan')" :active="request()->routeIs('pengajuan.pelayanan')">
                    {{ __('Pelayanan') }}
                </x-nav-link>
                <x-nav-link :href="route('pengajuan.status')" :active="request()->routeIs('pengajuan.status')">
                    {{ __('Status') }}
                </x-nav-link>
                <x-nav-link :href="route('surat.suratMasuk')" :active="request()->routeIs('surat.suratMasuk')">
                    {{ __('Surat Masuk') }}
                </x-nav-link>
            </div>

            <!-- Authentication Section (Dropdown Menu) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    <!-- Dropdown untuk pengguna yang sudah login -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                <div class="auth-buttons">
                    <!-- Jika pengguna belum login, tampilkan tombol login dan register -->
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-gray-900">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 hover:text-gray-900">Register</a>
                    @endif
                @endauth
                </div>


            <!-- Mobile Hamburger Menu -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('data.jenis')" :active="request()->routeIs('data.jenis')">
                {{ __('Jenis Surat') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pengajuan.pelayanan')" :active="request()->routeIs('pengajuan.pelayanan')">
                {{ __('Pelayanan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pengajuan.status')" :active="request()->routeIs('pengajuan.status')">
                {{ __('Status') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('surat.suratMasuk')" :active="request()->routeIs('surat.suratMasuk')">
                {{ __('Surat Masuk') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Menu -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                @auth
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
