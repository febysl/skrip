<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f0f8fc] font-sans mt-36 mb-14">

    <x-app-layout>
        <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-semibold text-center text-[#2c3e50] mb-6">Surat Masuk</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse text-sm">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-gray-700 uppercase bg-teal-300" style="width: 3%;">No</th>
                                <th class="px-6 py-3 text-left text-gray-700 uppercase bg-teal-300">Nomor Surat</th>
                                <th class="px-6 py-3 text-left text-gray-700 uppercase bg-teal-300">Tanggal Masuk</th>
                                <th class="px-6 py-3 text-left text-gray-700 uppercase bg-teal-300">Asal Surat</th>
                                <th class="px-6 py-3 text-left text-gray-700 uppercase bg-teal-300">Tujuan Surat</th>
                                <th class="px-6 py-3 text-left text-gray-700 uppercase bg-teal-300">Perihal</th>
                                <th class="px-6 py-3 text-left text-gray-700 uppercase bg-teal-300">Berkas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($surat as $index => $data)
                                <tr class="border-b hover:bg-teal-50">
                                    <td class="px-6 py-4 text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $data->nomor_surat }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $data->tanggal }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $data->asal }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $data->tujuan }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $data->perihal }}</td>
                                    <td class="px-6 py-4 text-gray-600">
                                        <a href="{{ asset('storage/uploads/' . $data->berkas) }}" target="_blank"
                                           class="text-[#0D28A6] font-bold hover:underline">
                                           Berkas
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-lg text-gray-500 py-4 bg-gray-50">
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
