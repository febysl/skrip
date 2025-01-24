@extends('layout')

@section('title', 'Kelola Surat Masuk')

@section('content')
    <div class="flex flex-col items-center">
        <span class="text-2xl font-semibold text-gray-800 shadow-md shadow-[#beedca] rounded-md px-4 py-2">
            Kelola Surat Masuk
        </span>
        <hr class="w-full mt-2 border-t-2 border-green-200">
    </div>
    <div class="flex flex-col sm:flex-row justify-end mb-10 mt-10 mr-8 gap-4">
        <form method="GET" action="{{ route('surat.kelolaSuratMasuk') }}" class="flex items-center space-x-3">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">🔍</button>
        </form>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md w-full sm:w-auto mt-4 sm:mt-0" onclick="openAddModal()">
            <i class="fas fa-plus"></i> Tambah
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse mx-auto my-4 table-auto">
            <thead class="bg-[#E8F7F5] text-left">
                <tr>
                    <th class="px-4 py-3 text-sm">No</th>
                    <th class="px-4 py-3 text-sm">Nomor Surat</th>
                    <th class="px-4 py-3 text-sm">Tanggal Masuk</th>
                    <th class="px-4 py-3 text-sm">Asal Surat</th>
                    <th class="px-4 py-3 text-sm">Tujuan Surat</th>
                    <th class="px-4 py-3 text-sm">Perihal</th>
                    <th class="px-4 py-3 text-sm">Berkas</th>
                    <th class="px-4 py-3 text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody id="statusTable">
                @forelse ($surat as $index => $data)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-sm">{{ $data->nomor_surat }}</td>
                        <td class="px-4 py-3 text-sm">{{ $data->tanggal }}</td>
                        <td class="px-4 py-3 text-sm">{{ $data->asal }}</td>
                        <td class="px-4 py-3 text-sm">{{ $data->tujuan }}</td>
                        <td class="px-4 py-3 text-sm">{{ $data->perihal }}</td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ asset('storage/uploads/' . $data->berkas) }}" target="_blank"
                                class="text-blue-500 font-semibold">Berkas</a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex gap-2">
                                <!-- Tombol Edit -->
                                <button class="bg-yellow-500 text-white px-4 py-2 rounded-md text-sm"
                                    onclick="openEditModal({{ $data->id }}, '{{ $data->nomor_surat }}', '{{ $data->tanggal }}', '{{ $data->asal }}', '{{ $data->tujuan }}', '{{ $data->perihal }}')">
                                    Edit
                                </button>

                                <!-- Tombol Hapus -->
                                <button class="bg-red-500 text-white px-4 py-2 rounded-md text-sm"
                                    onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus surat ini?')) { document.getElementById('delete-form-{{ $data->id }}').submit(); }">
                                    Hapus
                                </button>

                                <!-- Form untuk Hapus -->
                                <form id="delete-form-{{ $data->id }}"
                                    action="{{ route('surat.destroy', $data->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-lg text-gray-500">
                            Tidak ada data pendaftaran.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Pop-up untuk Tambah Surat -->
    <div id="addModal" class="modal hidden fixed inset-0 z-50 bg-black bg-opacity-50" onclick="closeAddModal(event)">
        <div class="modal-content max-h-[80vh] overflow-auto bg-white p-6 mx-auto my-16 w-full max-w-lg rounded-md shadow-md"
            onclick="event.stopPropagation();">
            <span class="close absolute top-2 right-4 text-xl text-gray-400 cursor-pointer"
                onclick="closeAddModal()">&times;</span>
            <div class="modal-header text-xl font-semibold text-center mb-4 text-gray-800">Tambah Surat</div>
            <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="nomor_surat" class="block">Nomor Surat</label>
                <input type="text" id="nomor_surat" name="nomor_surat"
                    class="form-control w-full p-3 border rounded-md mt-1" placeholder="Masukkan Nomor Surat" required>

                <label for="tanggal" class="block mt-4">Tanggal Masuk</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control w-full p-3 border rounded-md mt-1"
                    required>

                <label for="asal" class="block mt-4">Asal Surat</label>
                <input type="text" id="asal" name="asal" class="form-control w-full p-3 border rounded-md mt-1"
                    required>

                <label for="tujuan" class="block mt-4">Tujuan Surat</label>
                <input type="text" id="tujuan" name="tujuan" class="form-control w-full p-3 border rounded-md mt-1"
                    required>

                <label for="perihal" class="block mt-4">Perihal</label>
                <input type="text" id="perihal" name="perihal" class="form-control w-full p-3 border rounded-md mt-1"
                    required>

                <label for="berkas" class="block mt-4">Unggah Berkas Surat (Max: 2 Mb)</label>
                <input type="file" id="berkas" name="berkas" class="form-control w-full p-3 border rounded-md mt-1"
                    required>

                <div class="modal-footer flex justify-between mt-6">
                    <button type="button" class="btn-reset bg-red-500 text-white p-3 rounded-md"
                        onclick="closeAddModal()">Batal</button>
                    <button type="submit" class="btn-submit bg-blue-500 text-white p-3 rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Pop-up untuk Edit Surat -->
    <div id="editModal" class="modal  fixed hidden inset-0 z-50 bg-black bg-opacity-50" onclick="closeEditModal(event)">
        <div class="modal-content max-h-[80vh] overflow-auto bg-white p-6 mx-auto my-16 w-full max-w-lg rounded-md shadow-md"
            onclick="event.stopPropagation();">
            <span class="close absolute top-2 right-4 text-xl text-gray-400 cursor-pointer"
                onclick="closeEditModal()">&times;</span>
            <div class="modal-header text-xl font-semibold text-center mb-4 text-gray-800">Edit Surat</div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="surat_id" name="id" value="">

                <label for="edit_nomor_surat" class="block">Nomor Surat</label>
                <input type="text" id="edit_nomor_surat" name="nomor_surat"
                    class="form-control w-full p-3 border rounded-md mt-1" required>

                <label for="edit_tanggal" class="block mt-4">Tanggal Masuk</label>
                <input type="date" id="edit_tanggal" name="tanggal"
                    class="form-control w-full p-3 border rounded-md mt-1" required>

                <label for="edit_asal" class="block mt-4">Asal Surat</label>
                <input type="text" id="edit_asal" name="asal"
                    class="form-control w-full p-3 border rounded-md mt-1" required>

                <label for="edit_tujuan" class="block mt-4">Tujuan Surat</label>
                <input type="text" id="edit_tujuan" name="tujuan"
                    class="form-control w-full p-3 border rounded-md mt-1" required>

                <label for="edit_perihal" class="block mt-4">Perihal</label>
                <input type="text" id="edit_perihal" name="perihal"
                    class="form-control w-full p-3 border rounded-md mt-1"
                    required>

                <label for="edit_berkas" class="block mt-4">Unggah Berkas Surat </label>
                <input type="file" id="edit_berkas" name="berkas"
                    class="form-control w-full p-3 border rounded-md mt-1"
                     onchange="updateTemplateFileName(this)">

                <div class="modal-footer flex justify-between mt-6">
                    <button type="button" class="bg-red-500 text-white p-3 rounded-md"
                        onclick="closeEditModal()">Batal</button>
                    <button type="submit" class="bg-blue-500 text-white p-3 rounded-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById("addModal").classList.remove("hidden");
        }

        function closeAddModal(event) {
            if (event) event.stopPropagation();
            document.getElementById("addModal").classList.add("hidden");
        }

        function openEditModal(id, nomor_surat, tanggal, asal, tujuan, perihal) {
            document.getElementById("editModal").classList.remove("hidden");
            document.getElementById("surat_id").value = id;
            document.getElementById("edit_nomor_surat").value = nomor_surat;
            document.getElementById("edit_tanggal").value = tanggal;
            document.getElementById("edit_asal").value = asal;
            document.getElementById("edit_tujuan").value = tujuan;
            document.getElementById("edit_perihal").value = perihal;
            // Update form action
            document.getElementById('editForm').action = "/kelolaSuratMasuk/" + id;

        }
// Fungsi untuk memperbarui nama file template
function updateTemplateFileName(input) {
            templateFileName = input.files[0].name;
        }

        function closeEditModal(event) {
            if (event) event.stopPropagation();
            document.getElementById("editModal").classList.add("hidden");
        }
    </script>
@endsection
