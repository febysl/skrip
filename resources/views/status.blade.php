<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan Surat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f0f8fc] font-sans mt-36 mb-14">

    <x-app-layout>
        <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-semibold text-center text-[#2c3e50] mb-6">Status Pengajuan Surat</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase bg-teal-300">
                                    No</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase bg-teal-300">
                                    Nama Pengaju</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase bg-teal-300">
                                    Surat Permohonan</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase bg-teal-300">
                                    No. Telepon</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase bg-teal-300">
                                    Tanggal Masuk</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase bg-teal-300">
                                    Status Pengajuan</th>
                                <th
                                    class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase bg-teal-300">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pengajuan as $index => $data)
                                <tr class="border-b hover:bg-teal-50">
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $data->user->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $data->jenisSurat->nama }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $data->telepon }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $data->tanggal_pengajuan }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
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
                                    <td class="px-6 py-4 text-sm text-gray-600">

                                        <button @if ($data->status->value != 'selesai') disabled @endif
                                            class="disabled:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed px-4 py-2 bg-blue-500 text-white text-xs font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            <a href="{{ asset('storage/uploads/' . $data->berkas_selesai) }}"
                                                target="_blank"
                                                >Berkas</a>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-4 text-center text-lg text-gray-500 bg-gray-50">
                                        Tidak ada data pendaftaran.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </x-app-layout>

</body>

</html>
