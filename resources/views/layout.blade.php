<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Desa Gebangkerep</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .flex {
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 22%;
            background-color: #E6F4EA;
            /* Light green */
            height: 100vh;
            padding: 1rem;
            box-sizing: border-box;
        }

        .sidebar img {
            width: 5rem;
            margin-bottom: 1rem;
        }

        /* .sidebar h2 {
        font-size: 1.25rem;
        font-weight: bold;
    } */
        .text-center {
            display: flex;
            align-items: center;
            /* Menyelaraskan elemen secara vertikal */
            margin-bottom: 2rem;
            margin-top: 1rem;
        }

        .text-group {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Memastikan teks berada di tengah secara vertikal */
        }

        .text-group h3 {
            margin: 0;
            line-height: 1.2;
        }

        .text-group h3:first-child {
            margin-bottom: 0.2rem;
        }

        .sidebar nav a {
            display: block;
            padding: 0.5rem 1rem;
            color: #4A4A4A;
            text-decoration: none;
            border-radius: 0.25rem;
            margin-bottom: 0.5rem;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Hover */
        .sidebar nav a:hover {
            background-color: #B2D8B6;
            /* Hijau terang */
            color: white;
        }

        /* Aktif */
        .sidebar nav a.active {
            background-color: #4CAF50;
            /* Hijau gelap */
            color: white;
            font-weight: bold;
        }

        .sidebar button {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem;
    color: #4A4A4A;
    text-decoration: none;
    background: none;
    border: none;
    border-radius: 0.25rem;
    margin-bottom: 0.5rem;
    text-align: left;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    font: inherit; /* Pastikan mengikuti font yang digunakan */
}

.sidebar button:hover {
    background-color: #B2D8B6;
    color: white;
}

.sidebar button.active {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
}

        /* Main content */
        .content {
            width: 100%;
            /* padding: 2rem; */
            box-sizing: border-box;
        }

        /* Search bar
    .search-bar {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 1.5rem;
    }

    .search-bar input {
        padding: 0.5rem;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        width: 33%;
    } */
        .header {
            background-color: #f0f0f0;
            /* Light gray background */
            height: 2rem;;
            padding: 1rem;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        /* Search bar styling */
        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input {
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem 0 0 0.25rem;
            width: 250px;
        }

        .search-button {
            padding: 0.5rem;
            background-color: #4CAF50;
            /* Green button color */
            color: white;
            border: none;
            border-radius: 0 0.25rem 0.25rem 0;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #45A049;
        }

        /* Cards */
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }

        .card {
            margin: 2rem;
            background-color: #5DAE8B;
            color: #fff;
            border-radius: 0.5rem;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card:nth-child(2) {
            background-color: #79C29C;
            /* Slightly lighter green */
        }

        .card:nth-child(3) {
            background-color: #A0D5B3;
            /* Even lighter green */
        }

        .card-icon {
            display: flex;
            font-size: 1.45rem;
            font-weight: bold;
            margin-top: 14px;
        }


        /* .card-icon svg {
        width: 2rem;
        height: 2rem;
        margin-right: 1rem;
    } */

        .card-value {
            font-size: 1.5rem;
            font-weight: bold;
            margin-left: 2rem;
        }
    </style>
</head>

<body>
    <div class="container mx-auto">
        <div class="flex">
            @include('components.sidebar')
            <div class="content w-3/4">
                @include('components.header')
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
