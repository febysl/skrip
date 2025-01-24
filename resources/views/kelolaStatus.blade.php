@extends('layout')

@section('content')
<style>
    /* Basic styling for layout */
    table {
        width: 95%;
        border-collapse: collapse;
        margin-top: 4rem;
        margin-left: auto;
        margin-right: auto;
    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #D8E3E7;
    }
    th {
        background-color: #E8F7F5;
        color: #333;
    }
    /* Button Styling */
    .button {
        padding: 5px 10px;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 5px;
        background-color: #4360C6;
    }


</style>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Surat Permohonan</th>
            <th>No. HP</th>
            <th>Tanggal Masuk</th>
            <th>Aksi</th> <!-- Ubah kolom menjadi Aksi -->
        </tr>
    </thead>
    <tbody id="statusTable">
        <tr>
            <td>1</td>
            <td>Feby Setyany Lestari</td>
            <td>Surat Keberhasilan</td>
            <td>085868488264</td>
            <td>8 Juli 2024</td>
            <td>
                <!-- Button Aksi -->
                <button class="button">
                    Proses
                </button>
                <button class="button">
                    Tolak
                </button>
            </td>
        </tr>
    </tbody>
</table>
@endsection
