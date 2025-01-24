@extends('layout')

@section('title', 'Kelola Surat')

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

    <!-- Judul Halaman dengan Shadow Hijau -->
    <div class="flex flex-col items-center">
        <span class="text-2xl font-semibold text-gray-800 shadow-md shadow-[#beedca] rounded-md px-4 py-2">
            Kelola Pengajuan Surat
        </span>
        <hr class="w-full mt-2 border-t-2 border-green-200">
    </div>

    <!-- Table Styling with Tailwind -->
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
                    <th class="w-50 px-2 py-4 text-left bg-[#E6F4EA] text-gray-700 uppercase">Aksi</th>
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
                        <td class="w-50 px-2 py-3">
                            <div class="flex flex-wrap gap-2">
                                <!-- Button Aksi -->
                                <button
                                    onclick="openEditModal({{ json_encode($data) }}, {{ json_encode($data->jenisSurat->fields) }}, {{ json_encode($data->jenisSurat->nama) }})"
                                    class="py-1 px-2 rounded-md text-white focus:outline-none cursor-pointer bg-blue-600 hover:bg-blue-700">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button
                                    class="py-1 px-2 rounded-md text-white focus:outline-none cursor-pointer bg-green-600 hover:bg-green-700">
                                    <a href="{{ asset('storage/uploads/' . $data->berkas_diajukan) }}" target="_blank">
                                        <i class="fas fa-print"></i> Print
                                    </a>
                                </button>
                                <button onclick="triggerFileInput({{ $data->id }})"
                                    class="py-1 px-2 rounded-md text-white focus:outline-none cursor-pointer bg-yellow-600 hover:bg-yellow-700">
                                    <i class="fas fa-upload"></i> Upload
                                </button>

                                <form id="uploadForm-{{ $data->id }}"
                                    action="{{ route('pengajuan.upload_completed_file', $data->id) }}" method="POST"
                                    enctype="multipart/form-data" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <!-- Laravel's method spoofing for PUT -->
                                    <input type="file" id="fileInput-{{ $data->id }}" name="berkas_selesai"
                                        onchange="submitForm({{ $data->id }})" required>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center text-lg text-gray-600 bg-[#f8f9f9] py-4 rounded-lg">
                            Tidak ada data pendaftaran.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- modal edit isi surat --}}
    <div id="editModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50"
        onclick="closeEditModal(event)">
        <div class="modal-content max-h-[80vh] overflow-auto bg-white p-6 rounded-lg shadow-md w-full max-w-[70vh]" onclick="event.stopPropagation();">
            <span class="close text-gray-500 text-xl absolute top-2 right-4 cursor-pointer"
                onclick="closeEditModal()">&times;</span>
            <div class="modal-header text-xl font-semibold text-center mb-4">Edit Surat</div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-2">

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            {{-- nama disabled --}}
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Pengaju</label>
                                <input type="text" disabled
                                    class="disabled:text-gray-500 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                    id="nama" name="nama" required value="{{ old('nama') }}">
                            </div>
                            {{-- jenis surat disabled --}}
                            <div>
                                <label for="jenis_surat"
                                    class="block text
                                    -sm font-medium text-gray-700">Jenis
                                    Surat</label>
                                <input type="text" disabled
                                    class="disabled:text-gray-500 mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                    id="jenis_surat" name="jenis_surat" required value="{{ old('jenis_surat') }}">
                            </div>
                            <div>
                                <label for="telepon" class="block text-sm font-medium text-gray-700">Masukkan No.
                                    Telepon</label>
                                <input type="text"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                    id="telepon" name="telepon" required
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="15"
                                    value="{{ old('telepon') }}">
                            </div>
                            <div>
                                <label for="tanggal" class="block text-sm font-medium text-gray-700">Masukkan Tanggal
                                    Pengajuan</label>
                                <input type="date"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                    id="tanggal" name="tanggal_pengajuan" required
                                    value="{{ old('tanggal_pengajuan') }}">
                            </div>
                            <div>
                                <label for="ktp" class="block text-sm font-medium text-gray-700">Unggah KTP</label>
                                <input type="file" value="{{ old('ktp') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                    id="ktp" name="ktp">
                            </div>
                            <div>
                                <label for="kk" class="block text-sm font-medium text-gray-700">Unggah KK</label>
                                <input type="file" value="{{ old('kk') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                    id="kk" name="kk">
                            </div>
                            {{-- status --}}
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select value="{{ old('status') }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                    id="status" name="status" required>
                                    <option value="tertunda">Tertunda</option>
                                    <option value="diproses">Diproses</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>
                        </div>

                        <div id="dynamicFields"></div>
                    </div>



                    <div class="flex justify-between mt-6">
                        <button type="button"
                            class="btn-reset bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
                            onclick="closeEditModal()">Batal</button>
                        <button type="submit"
                            class="btn-submit bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan
                            Perubahan</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        function openEditModal(data, fields, namaJenisSurat) {
            const {
                isi_surat,
            } = data;
            document.getElementById('editModal').classList.remove("hidden");
            const dynamicFields = document.getElementById('dynamicFields');

            // data surat
            const nama = document.getElementById('nama');
            const jenisSurat = document.getElementById('jenis_surat');
            const telepon = document.getElementById('telepon');
            const tanggal = document.getElementById('tanggal');
            const ktp = document.getElementById('ktp');
            const kk = document.getElementById('kk');
            const status = document.getElementById('status');

            nama.value = data.user.name;
            jenisSurat.value = namaJenisSurat;
            telepon.value = data.telepon;
            tanggal.value = data.tanggal_pengajuan;
            status.selectedIndex = data.status == 'tertunda' ? 0 : data.status == 'diproses' ? 1 : 2;




            // Isi form dengan data yang ada
            document.getElementById('editForm').action = "/kelolaSurat/" + data.id;
            dynamicFields.innerHTML = '';
            const isiSurat = JSON.parse(isi_surat);
            const isiContainerInput = document.createElement('div');

            fields.forEach(field => {
                const fieldContainer = document.createElement('div');

                const label = document.createElement('label');
                label.className = 'block text-sm font-medium text-gray-700 capitalize';
                label.textContent = field.alias || field.nama;
                label.setAttribute('for', `field-${field.nama}`);

                let input;
                switch (field.tipe) {
                    case 'text': // Text input
                        input = document.createElement('input');
                        input.type = 'text';
                        input.className =
                            'mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500';
                        break;

                    case 'tanggal': // Date input
                        input = document.createElement('input');
                        input.type = 'date';
                        input.className =
                            'mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500';
                        break;

                    case 'area': // Textarea input
                        input = document.createElement('textarea');
                        input.className =
                            'mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500';
                        input.rows = 4;
                        break;
                    case 'angka':
                        input = document.createElement('input');
                        input.type = 'number';
                        input.className =
                            'mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500';
                        break;

                    default:
                        console.error('Unknown field type:', field.tipe);
                }

                if (input) {
                    input.id = `field-${field.nama}`;
                    input.name = 'isi_surat[' + field.nama + ']';
                    input.required = true;
                    input.value = isiSurat[field.nama] || '';
                }

                fieldContainer.appendChild(label);
                if (input) fieldContainer.appendChild(input);

                isiContainerInput.appendChild(fieldContainer);

            })

            dynamicFields.appendChild(isiContainerInput);

        }

        function closeEditModal(event) {
            if (event) event.stopPropagation();
            document.getElementById('editModal').classList.add("hidden");
        }

        function triggerFileInput(id) {
            // Trigger the file input click
            document.getElementById(`fileInput-${id}`).click();
        }

        function submitForm(id) {
            // Submit the form after a file is selected
            const form = document.getElementById(`uploadForm-${id}`);
            if (form) {
                form.submit();
            }
        }
    </script>
@endsection
