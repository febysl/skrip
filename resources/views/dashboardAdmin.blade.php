@extends('layout')

@section('title', 'Website Pengajuan Surat')

@section('content')
    <div class="flex flex-col items-center">
        <span class="text-2xl font-semibold text-gray-800 shadow-md shadow-[#beedca] rounded-md px-4 py-2">
            Dashboard Admin
        </span>
        <hr class="w-full mt-2 border-t-2 border-green-200">
    </div>
    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 my-6">
        <div
            class="bg-[#5DAE8B] text-white p-6 rounded-lg shadow-lg flex justify-between items-center transition transform hover:scale-95 hover:shadow-xl hover:bg-[#4F8F74]">
            <i class="fas fa-users fa-3x"></i>
            <div class="flex flex-col items-center ml-4">
                <span class="text-3xl font-semibold">{{ $penggunaAktif }}</span>
                <p class="text-lg">Pengguna Aktif</p>
            </div>
        </div>
        <div
            class="bg-[#79C29C] text-white p-6 rounded-lg shadow-lg flex justify-between items-center transition transform hover:scale-95 hover:shadow-xl hover:bg-[#5A9C82]">
            <i class="fas fa-envelope fa-4x"></i>
            <div class="flex flex-col items-center ml-4">
                <span class="text-3xl font-semibold">{{ $totalJenisSurat }}</span>
                <p class="text-lg">Jenis Surat</p>
            </div>
        </div>
        <div
            class="bg-[#A0D5B3] text-white p-6 rounded-lg shadow-lg flex justify-between items-center transition transform hover:scale-95 hover:shadow-xl hover:bg-[#8CC09D]">
            <i class="fas fa-user-check fa-3x"></i>
            <div class="flex flex-col items-center ml-4">
                <span class="text-3xl font-semibold">{{ $pengajuan->count() }}</span>
                <p class="text-lg">Ajuan Surat</p>
            </div>
        </div>
    </div>

    <!-- Search Form -->
    <div class="flex justify-end mb-4">
        <form method="GET" action="{{route('pengajuan.admin')}}" class="flex items-center space-x-3">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">🔍</button>
        </form>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto mt-10">
        <table class="w-full table-auto text-sm text-gray-800 border-collapse">
            <thead>
                <tr>
                    <th class="w-10 px-2 py-4 text-left bg-[#E6F4EA] text-gray-700 uppercase">No</th>
                    <th class="px-2 py-4 text-left bg-[#E6F4EA] text-gray-700 uppercase">Nama Pengaju</th>
                    <th class="px-2 py-4 text-left bg-[#E6F4EA] text-gray-700 uppercase">Surat Permohonan</th>
                    <th class="px-2 py-4 text-left bg-[#E6F4EA] text-gray-700 uppercase">Telepon</th>
                    <th class="px-2 py-4 text-left bg-[#E6F4EA] text-gray-700 uppercase">Tanggal Masuk</th>
                    <th class="w-20 px-2 py-4 text-center bg-[#E6F4EA] text-gray-700 uppercase">KTP</th>
                    <th class="w-20 px-2 py-4 text-center bg-[#E6F4EA] text-gray-700 uppercase">KK</th>
                    <th class="w-50 px-2 py-4 text-left bg-[#E6F4EA] text-gray-700 uppercase">Status</th>
                    <th class="w-50 px-2 py-4 text-left bg-[#E6F4EA] text-gray-700 uppercase">Berkas disetujui</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengajuan as $index => $data)
                    <tr class="hover:bg-[#EEF6F7] transition duration-300 ease-in-out">
                        <td class="w-10 px-2 py-3">{{ $index + 1 }}</td>
                        <td class="px-2 py-3">{{ $data->user->name }}</td>
                        <td class="px-2 py-3">{{ $data->jenisSurat->nama }}</td>
                        <td class="px-2 py-3">{{ $data->telepon }}</td>
                        <td class="px-2 py-3">{{ $data->tanggal_pengajuan }}</td>
                        <td class="w-20 px-2 py-3 text-center">
                            <a href="{{ asset('storage/uploads/' . $data->ktp) }}" target="_blank"
                                class="text-blue-600 hover:underline font-semibold">Berkas</a>
                        </td>
                        <td class="w-20 px-2 py-3 text-center">
                            <a href="{{ asset('storage/uploads/' . $data->kk) }}" target="_blank"
                                class="text-blue-600 hover:underline font-semibold">Berkas</a>
                        </td>
                        <td class="w-50 px-2 py-3">
                            @if ($data->status->value == 'tertunda')
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold text-white bg-gray-500 rounded-full">
                                    Tertunda
                                </span>
                            @elseif ($data->status->value == 'diproses')
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold text-white bg-teal-500 rounded-full">
                                    Diproses
                                </span>
                            @else
                                <span
                                    class="inline-block px-3 py-1 text-xs font-semibold text-white bg-green-500 rounded-full">
                                    Selesai
                                </span>
                            @endif
                        </td>
                        <td class="w-50 px-2 py-3">
                            @if ($data->berkas_selesai)
                                <a href="{{ asset('storage/uploads/' . $data->berkas_selesai) }}" target="_blank"
                                    class="text-blue-600 hover:underline font-semibold">Berkas</a>
                            @else
                                <span class="text-gray-500">Belum ada berkas</span>
                            @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-lg text-gray-600 bg-[#f8f9f9] py-4 rounded-lg">
                            Tidak ada data pendaftaran.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
