@php
    use App\Enums\TypeFieldSurat;
@endphp

@extends('layout')
@section('content')
    {{-- center the form --}}
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-6 mt-10">
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Input Field Surat</h2>

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

        <form action="{{ route('fields.update', $id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                @foreach ($fields as $field)
                    {{-- @if ($field->nama == 'nomor surat')
                        <input type="hidden" name="fields[{{ $loop->index }}][nama]" value="{{ $field->nama }}">
                        <input type="hidden" name="fields[{{ $loop->index }}][alias]" value="{{ $field->alias }}">
                        <input type="hidden" name="fields[{{ $loop->index }}][tipe]" value="{{ $field->tipe }}">
                    @else --}}
                        <input type="hidden" name="fields[{{ $loop->index }}][id]" value="{{ $field->id }}">
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="{{ $field->nama }}-nama"
                                    class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="hidden" name="fields[{{ $loop->index }}][nama]" value="{{ $field->nama }}">
                                <input type="text"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                    value="{{ $field->nama }}" disabled id="{{ $field->nama }}-nama"
                                    name="fields[{{ $loop->index }}][nama]" required>
                            </div>
                            <div>
                                <label for="{{ $field->nama }}-nama-alias"
                                    class="block text-sm font-medium text-gray-700">Nama
                                    Alias</label>
                                <input type="text" placeholder="{{ $field->nama }}"
                                value="{{ $field->alias }}"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                    id="{{ $field->nama }}-nama-alias" name="fields[{{ $loop->index }}][alias]">
                            </div>
                            <div>
                                <label for="{{ $field->nama }}-tipe"
                                    class="block text-sm font-medium text-gray-700">Tipe</label>
                                <select
                                    
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                                    id="{{ $field->nama }}-tipe" name="fields[{{ $loop->index }}][tipe]" required>
                                    @foreach (TypeFieldSurat::getValues() as $type)
                                        <option {{ $type == $field->tipe ? 'selected' : '' }} value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    {{-- @endif --}}
                @endforeach
                <div class="flex items-center justify-between">
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                        <a href="{{ route('data.data') }}">Batal</a>
                    </button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                        Simpan
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
