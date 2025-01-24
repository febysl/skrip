<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans bg-gradient-to-r from-teal-100 via-teal-200 to-teal-300 mt-36 mb-14">

    <x-app-layout>
        <div class="max-w-[70vh] mx-auto bg-white rounded-lg shadow-lg p-6 mt-10">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Formulir Pengajuan Surat</h2>

            {{-- Menampilkan Pesan Sukses --}}
            @if (session('success'))
                <div class="text-green-600 bg-green-100 border border-green-400 p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Menampilkan Pesan Kesalahan --}}
            @if ($errors->any())
                <div class="text-red-600 bg-red-100 border border-red-400 p-4 rounded-md mb-4">
                    <strong>Perhatikan kesalahan input berikut:</strong>
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class='grid grid-cols-2 gap-4'>
                    <div class='space-y-2'>
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
                            <input type="file"
                                value="{{ old('ktp') }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                id="ktp" name="ktp">
                        </div>

                        <div>
                            <label for="kk" class="block text-sm font-medium text-gray-700">Unggah KK</label>
                            <input type="file"
                                value="{{ old('kk') }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                id="kk" name="kk">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <label for="jenis_surat" class="block text-sm font-medium text-gray-700">Pilih Jenis
                                Surat</label>
                            <select
                                value="{{ old('jenis_surat_id') }}"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                id="jenis_surat" name="jenis_surat_id" required onchange="updateFields()">
                                <option value="" disabled selected>Pilih Jenis Surat</option>
                                @foreach ($jenisSurat as $value)
                                    <option value="{{ $value->id }}" data-fields="{{ json_encode($value->fields) }}">
                                        {{ $value->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div id="dynamicFields" class="space-y-4"></div>


                        <button type="submit"
                            class="w-full py-2 bg-teal-500 text-white font-semibold rounded-md hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                            Ajukan
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </x-app-layout>

    <script>
        function updateFields() {
            const jenisSuratSelect = document.getElementById('jenis_surat');
            const selectedOption = jenisSuratSelect.options[jenisSuratSelect.selectedIndex];
            const fields = JSON.parse(selectedOption.getAttribute('data-fields') || '[]');

            const dynamicFieldsContainer = document.getElementById('dynamicFields');
            dynamicFieldsContainer.innerHTML = '';

            fields.forEach(field => {
                if (field.nama.toLowerCase() == 'nomor surat' || field.nama.toLowerCase() == 'nomor_surat') return
                const fieldContainer = document.createElement('div');
                fieldContainer.classList.add('grid', 'grid-cols-1', 'gap-2');

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
                    input.value = '{{ old('isi_surat[` + ${field.name} + `]') }}';
                }

                fieldContainer.appendChild(label);
                if (input) fieldContainer.appendChild(input);

                dynamicFieldsContainer.appendChild(fieldContainer);
            });
        }
    </script>

</body>

</html>
