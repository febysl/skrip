<div class="sidebar">
    <div class="text-center flex items-center justify-center mb-8">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Desa Gebangkerep" class="w-16 h-16 mr-4">
        <div class="text-group">
            <h3>Desa Gebangkerep</h3>
            <h3>Kab Pekalongan</h3>
        </div>
    </div>
    <nav>
        <a href="/admin" class="{{ request()->is('admin') ? 'active' : '' }}">Dashboard</a>
        <hr>
        <a href="/kelolaSurat" class="{{ request()->is('kelolaSurat') ? 'active' : '' }}">Kelola Surat</a>
        <hr>
        <a href="/kelolaStatus" class="{{ request()->is('kelolaStatus') ? 'active' : '' }}">Kelola Status</a>
        <hr>
        <a href="/data" class="{{ request()->is('data') ? 'active' : '' }}">Data Surat</a>
        <hr>
        <a href="/kelolaSuratMasuk" class="{{ request()->is('kelolaSuratMasuk') ? 'active' : '' }}">Kelola Surat Masuk</a>
        <hr>
        <form method="POST" action="{{ route('logout') }}" class="inline-block w-full">
            @csrf
            <button type="submit" class="w-full text-left {{ request()->is('keluar') ? 'active' : '' }}">
                Keluar
            </button>
        </form>
        <hr>
    </nav>
</div>
