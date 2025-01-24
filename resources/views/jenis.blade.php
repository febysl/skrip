<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Surat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-teal-50 font-sans min-h-screen mt-20">
    {{-- @include('components.navbarNolog') <!-- Menyertakan navbar --> --}}
    <x-app-layout>
    <header class="bg-teal-600 text-white py-6 shadow-md">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center">Jenis-Jenis Surat</h1>
        </div>
    </header>

    <div class="container mx-auto px-4 py-10">
        <div class="space-y-4">
            @forelse ($data as $item)
                <!-- Accordion -->
                <div class="border border-gray-200 rounded-md shadow-sm overflow-hidden transition-transform transform hover:scale-105">
                    <div class="accordion-header bg-gray-50 p-5 cursor-pointer flex justify-between items-center font-semibold text-teal-700 hover:bg-teal-100"
                         onclick="toggleAccordion(this)">
                        <span class="flex items-center gap-2">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 3.5A2.5 2.5 0 015.5 1h9a2.5 2.5 0 012.5 2.5v13a.5.5 0 01-.75.433L10 13.01l-6.25 3.923A.5.5 0 013 16.5v-13z" />
                            </svg> --}}
                            {{ $item->nama }} <!-- Menampilkan nama dari data -->
                        </span>
                        <span class="text-teal-600 transition-transform transform">&#9660;</span> <!-- Panah bawah -->
                    </div>
                    <div class="accordion-content hidden p-5 bg-white text-gray-700">
                        <p class="text-justify leading-relaxed">{{ $item->deskripsi }}</p> <!-- Menampilkan deskripsi dari data -->
                    </div>
                </div>
            @empty
                <div>
                    <p class="empty-message text-center text-gray-500 bg-gray-50 py-6 rounded-md shadow-md">
                        Tidak ada data surat.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
    </x-app-layout>



    <script>
        function toggleAccordion(element) {
            const isActive = element.classList.contains('active');
            const allHeaders = document.querySelectorAll('.accordion-header');
            const allContents = document.querySelectorAll('.accordion-content');

            // Reset all accordion headers and contents
            allHeaders.forEach(header => {
                header.classList.remove('active');
                header.querySelector('span:last-child').textContent = '▼'; // Reset arrow to down
            });
            allContents.forEach(content => {
                content.classList.add('hidden'); // Hide all content
            });

            // If the clicked header wasn't active, activate it
            if (!isActive) {
                element.classList.add('active');
                element.querySelector('span:last-child').textContent = '▲'; // Change arrow to up
                element.nextElementSibling.classList.remove('hidden'); // Show the corresponding content
            }
        }
    </script>
</body>

</html>
