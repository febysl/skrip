@extends('layout')

@section('title', 'Data Surat')

@section('content')
    @if (session('success'))
        <div class="text-green-600 bg-green-100 border border-green-400 p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="text-red-600 bg-red-100 border border-red-400 p-4 rounded-md mb-4">
            {{ session('error') }}
        </div>
    @endif
    <div class="flex flex-col items-center">
        <span class="text-2xl font-semibold text-gray-800 shadow-md shadow-[#beedca] rounded-md px-4 py-2">
            Data Surat
        </span>
        <hr class="w-full mt-2 border-t-2 border-green-200">
    </div>
    <div class="flex flex-col sm:flex-row justify-end mb-10 mt-10 mr-8 gap-4">
        <form method="GET" action="{{route('data.data')}}" class="flex items-center space-x-3">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                class="px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">🔍</button>
        </form>
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md w-full sm:w-auto mt-4 sm:mt-0" onclick="openModal()">
            <i class="fas fa-plus"></i> Tambah
        </button>
    </div>


    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse text-sm " style="table-layout: fixed; max-height: 500px;">
            <thead class="bg-[#E8F7F5] text-left">
                <tr>
                    <th class="px-4 py-3 w-1/4">Nama Surat</th>
                    <th class="px-4 py-3 w-1/3">Deskripsi</th>
                    <th class="px-4 py-3 w-1/4">Template Surat</th>
                    <th class="px-4 py-3 w-1/6">Aksi</th>
                </tr>
            </thead>
            <tbody id="statusTable">
                @forelse ($data as $item)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-3">{{ $item->nama }}</td>
                        <td class="px-4 py-3 break-words">{{ $item->deskripsi }}</td>
                        <td class="px-4 py-3">
                            @if ($item->template)
                                <a href="{{ asset('storage/uploads/' . $item->template) }}" target="_blank"
                                    class="text-blue-500 underline">
                                    {{ $item->nama }}
                                </a>
                            @else
                                Tidak ada template
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2 w-full">
                            <button class="bg-teal-500 text-white px-1 py-2 rounded-md hover:bg-teal-600">
                                <a href="{{ route('fields.edit', $item->id) }}" class="text-white">Edit Fields</a>
                            </button>
                                <button class="bg-blue-500 text-white px-1 py-2 rounded-md hover:bg-blue-600"
                                    onclick="openEditModal({{ $item->id }}, '{{ $item->nama }}', '{{ $item->deskripsi }}', '{{ $item->template }}')">Edit</button>
                                <form action="{{ route('data.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-1 py-2 rounded-md hover:bg-red-600">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-3 text-center text-gray-500">Tidak ada data pendaftaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <!-- Modal Pop-up Tambah Surat -->
    <div id="myModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden  z-50"
        onclick="closeModal(event)">
        <div class="modal-content bg-white p-6 rounded-lg shadow-md w-full max-w-lg" onclick="event.stopPropagation();">
            <span class="close text-gray-500 text-xl absolute top-2 right-4 cursor-pointer"
                onclick="closeModal()">&times;</span>
            <div class="modal-header text-xl font-semibold text-center mb-4">Tambah Surat</div>
            <form id="formTambahSurat" action="{{ route('data.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="nama" class="block text-sm text-gray-700">Nama Surat</label>
                <input type="text" id="nama" name="nama"
                    class="form-control mt-2 px-4 py-2 border border-gray-300 rounded-md w-full"
                    placeholder="Masukkan Nama Surat" required>

                <label for="template" class="block text-sm text-gray-700 mt-4">Unggah Template Surat</label>
                <input type="file" id="template" name="template"
                    class="form-control mt-2 px-4 py-2 border border-gray-300 rounded-md w-full" required
                    onchange="updateTemplateFileName(this)">

                <label for="deskripsi" class="block text-sm text-gray-700 mt-4">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control mt-2 px-4 py-2 border border-gray-300 rounded-md w-full"
                    rows="4" placeholder="Masukkan Deskripsi" required></textarea>

                <div class="flex justify-between mt-6">
                    <button type="button" class="btn-reset bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
                        onclick="closeModal()">Batal</button>
                    <button type="submit"
                        class="btn-submit bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Pop-up Edit Surat -->
    <div id="editModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex  items-center justify-center hidden  z-50"
        onclick="closeEditModal(event)">
        <div class="modal-content bg-white p-6 rounded-lg shadow-md w-full max-w-lg" onclick="event.stopPropagation();">
            <span class="close text-gray-500 text-xl absolute top-2 right-4 cursor-pointer"
                onclick="closeEditModal()">&times;</span>
            <div class="modal-header text-xl font-semibold text-center mb-4">Edit Surat</div>
            <form id="editForm" method="POST"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="surat_id" name="id">

                <label for="edit_nama" class="block text-sm text-gray-700">Nama Surat</label>
                <input type="text" id="edit_nama" name="nama"
                    class="form-control mt-2 px-4 py-2 border border-gray-300 rounded-md w-full" required>

                <label for="edit_template" class="block text-sm text-gray-700 mt-4">Unggah Template Surat</label>
                <input type="file" id="edit_template" name="template"
                    class="form-control mt-2 px-4 py-2 border border-gray-300 rounded-md w-full"
                    onchange="updateTemplateFileName(this)">

                <label for="edit_deskripsi" class="block text-sm text-gray-700 mt-4">Deskripsi</label>
                <textarea id="edit_deskripsi" name="deskripsi"
                    class="form-control mt-2 px-4 py-2 border border-gray-300 rounded-md w-full" rows="4" required></textarea>

                <div class="flex justify-between mt-6">
                    <button type="button" class="btn-reset bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
                        onclick="closeEditModal()">Batal</button>
                    <button type="submit"
                        class="btn-submit bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Fungsi untuk menutup modal
        function closeModal(event) {
            if (event) event.stopPropagation();
            document.getElementById("myModal").classList.add("hidden");
        }

        function closeEditModal(event) {
            if (event) event.stopPropagation();
            document.getElementById('editModal').classList.add("hidden");
        }

        // Fungsi untuk membuka modal tambah surat
        function openModal() {
            document.getElementById("myModal").classList.remove("hidden");
        }

        // Fungsi untuk membuka modal edit surat
        function openEditModal(id, nama, deskripsi, template) {
            document.getElementById('editModal').classList.remove("hidden");
            // Isi form dengan data yang ada
            document.getElementById('surat_id').value = id;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_deskripsi').value = deskripsi;
            document.getElementById('editForm').action = "/data/" + id;
        }

        // Fungsi untuk memperbarui nama file template
        function updateTemplateFileName(input) {
            templateFileName = input.files[0].name;
        }

        // Fungsi untuk reset form modal tambah surat
        function resetForm() {
            document.getElementById("formTambahSurat").reset();
            templateFileName = '';
        }
    </script>
@endsection
