@extends('layout')

@section('content')
<style>
    /* Basic styling for layout */
    table {
        width: 95%;
        margin: 20px auto;
        border-collapse: collapse;
        overflow-x: auto;
        font-size: 0.95em;
        color: #333;
        margin-top: 4rem;
        table-layout: fixed;

    }
    th, td {
        padding: 15px 5px;
        text-align: left;
        border-bottom: 1px solid #D8E3E7;
        width: 100%;
        word-break: break-word;
        vertical-align: top;
    }

    th {
        background-color: #E8F7F5;
        color: #333;
    }
    /* Button Styling */
    .btn {
        padding: 5px 10px;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 5px;
        margin-bottom: 3px;
        background-color: #4360C6;
    }

    .btn i {
        margin-right: 5px;
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
    .button{
        display: flex;
    }

</style>



<table>
    <thead>
        <tr>
            <th style="width: 3%;">No</th>
            <th style="width: 15%;">Nama</th>
            <th style="width: 20%;">Surat Permohonan</th>
            <th style="width: 13%;">Nik</th>
            <th style="width: 10%;">Tanggal Masuk</th>
            <th style="width: 8%;">KTP</th>
            <th style="width: 8%;">KK</th>
            <th style="width: 25%;">Aksi</th> <!-- Ubah kolom menjadi Aksi -->
        </tr>
    </thead>
    <tbody id="statusTable">
        <tr>
            @forelse ($pengajuan as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jenisSurat->nama }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td style="padding: 15px 5px; text-align: start; color: #333;"><a
                        href="{{ asset('storage/uploads/' . $data->ktp) }}" target="_blank"
                        style="color: #0D28A6; text-decoration: none; font-weight: bold;">Berkas</a></td>
                    <td style="padding: 15px 5px; text-align: start; color: #333;"><a
                            href="{{ asset('storage/uploads/' . $data->kk) }}" target="_blank"
                            style="color: #0D28A6; text-decoration: none; font-weight: bold;">Berkas</a></td>
                    <td>
                        <div class="button">
                            <!-- Button Aksi -->
                            <button class="btn btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                            <button class="btn btn-print">
                                <i class="fas fa-print"></i> Print
                            </button>
                            <button class="btn btn-upload">
                                <i class="fas fa-upload"></i> Upload
                            </button>
                        </div>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="9" class="empty-message">
                        Tidak ada data pendaftaran.
                    </td>
                </tr>
            @endforelse
            </td>
        </tr>
    </tbody>
</table>
@endsection
