<!-- resources/views/dashboard.blade.php -->
@extends('layout')

@section('content')
    <style>
        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
            overflow-x: auto;
            font-size: 0.95em;
            color: #333;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #D8E3E7;
        }

        th {
            background-color: #E8F7F5;
            color: #333;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef6f7;
        }

        td a {
            color: #0D28A6;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover {
            text-decoration: underline;
        }

        .empty-message {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            overflow-x: auto;
            text-align: center;
            /* padding: 20px; */
            font-size: 1.1em;
            color: #7f8c8d;
            background-color: #f8f9f9;
            border-radius: 10px;
        }
    </style>

    <!-- Cards -->
    <div class="grid">
        <div class="card">
            <i class="fas fa-users fa-3x"></i>
            <div class="card-icon">
                <span class="card-value">200</span>
                <p>Pengguna Aktif</p>
            </div>
        </div>
        <div class="card">
            <i class="fas fa-envelope fa-4x"></i>
            <div class="card-icon">
                {{-- <span class="card-value">{{ $totalJenisSurat }}</span> --}}
                <p>Jenis Surat</p>
            </div>
        </div>
        <div class="card">
            <i class="fas fa-user-check fa-3x"></i>
            <div class="card-icon">
                {{-- <span class="card-value">{{ $pengajuan->count() }}</span> --}}
                <p>Ajuan Surat</p>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <!-- Form Pencarian -->
    <div style="display:flex; justify-content:flex-end; margin-bottom: 10px; margin-top: 1rem; margin-right: 2rem;">
        <form method="GET">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
            <button class="search-button" type="submit">🔍</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Surat Permohonan</th>
                <th>Nik</th>
                <th>No. Telepon</th>
                <th>Tanggal Masuk</th>
                <th>KTP</th>
                <th>KK</th>
                <th>Status Pengajuan</th>
            </tr>
        </thead>
        <tbody id="statusTable">
            {{-- @forelse ($pengajuan as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jenisSurat->nama }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->telepon }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td style="padding: 12px 15px; text-align: center; color: #333;"><a
                            href="{{ asset('storage/uploads/' . $data->ktp) }}" target="_blank"
                            style="color: #0D28A6; text-decoration: none; font-weight: bold;">Berkas</a></td>
                    <td style="padding: 12px 15px; text-align: center; color: #333;"><a
                            href="{{ asset('storage/uploads/' . $data->kk) }}" target="_blank"
                            style="color: #0D28A6; text-decoration: none; font-weight: bold;">Berkas</a></td>
                    <td>
                        <p>
                            Belum Verifikasi
                        </p>
                    </td>


                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="empty-message">
                        Tidak ada data pendaftaran.
                    </td>
                </tr>
            @endforelse --}}
        </tbody>
    </table>
    {{-- </div> --}}
    {{-- </div> --}}
@endsection
