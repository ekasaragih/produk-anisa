@extends('utils.layout.sidebar')

@section('head')
<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection

@section('content')
@include('utils.layout.topnav', ['title' => 'Selamat Datang'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        @guest
        <div class="p-4 text-center bg-yellow-50 border border-yellow-400 text-yellow-700 rounded-lg mb-4 shadow">
            <p class="font-medium">
                Kamu belum login. <a href="{{ route('user.login') }}"
                    class="text-blue-600 font-bold underline">Login</a>
                untuk mengakses fitur lebih lengkap.
            </p>
        </div>
        @endguest

        <div class="text-center p-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl shadow-lg text-white">
            <h1 class="text-4xl font-extrabold tracking-wide">SELAMAT DATANG!</h1>
            <p class="mt-4 text-lg">
                Aplikasi ini membantu ibu hamil memahami anemia, cara pencegahan, serta memberikan edukasi
                kesehatan kehamilan.
            </p>
            @guest
            <a href="{{ route('login') }}"
                class="mt-6 inline-block bg-white text-blue-600 font-bold px-6 py-3 rounded-lg hover:bg-gray-200 transition duration-300 shadow-md">
                Masuk ke Aplikasi
            </a>
            @endguest

            @if(auth()->check())
            <a href="{{ route('dashboard') }}"
                class="mt-6 inline-block bg-white text-blue-600 font-bold px-6 py-3 rounded-lg hover:bg-gray-200 transition duration-300 shadow-md">
                Lihat dashboardku
            </a>
            @endif
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-bold text-gray-800 text-center">✨ Fitur-Fitur Utama</h2>
            <p class="text-center text-gray-600 mt-2">Jelajahi fitur-fitur yang tersedia dalam aplikasi ini.</p>

            <div class="grid md:grid-cols-2 gap-6 mt-6">
                <div class="p-6 bg-blue-50 border border-blue-200 rounded-lg shadow text-center">
                    <i class="fas fa-chart-pie text-4xl text-blue-600 mb-3"></i>
                    <h3 class="text-xl font-semibold text-blue-600">Data Demografi Ibu Hamil</h3>
                    <p class="text-gray-700 mt-2 text-sm">
                        Catat identitas ibu hamil, usia, pendidikan, pekerjaan, serta riwayat kehamilan dengan mudah.
                    </p>
                </div>

                <div class="p-6 bg-green-50 border border-green-200 rounded-lg shadow text-center">
                    <i class="fas fa-baby text-4xl text-green-600 mb-3"></i>
                    <h3 class="text-xl font-semibold text-green-600">Pandangan Ibu Hamil Tentang Anemia</h3>
                    <p class="text-gray-700 mt-2 text-sm">
                        Mengetahui tingkat pemahaman ibu tentang anemia dan bagaimana cara pencegahannya.
                    </p>
                </div>

                <div class="p-6 bg-yellow-50 border border-yellow-200 rounded-lg shadow text-center">
                    <i class="fas fa-book-open text-4xl text-yellow-600 mb-3"></i>
                    <h3 class="text-xl font-semibold text-yellow-600">Edukasi Anemia Pada Ibu Hamil</h3>
                    <p class="text-gray-700 mt-2 text-sm">
                        Informasi lengkap tentang penyebab, gejala, dan dampak anemia selama kehamilan.
                    </p>
                </div>

                <div class="p-6 bg-red-50 border border-red-200 rounded-lg shadow text-center">
                    <i class="fas fa-bell text-4xl text-red-600 mb-3"></i>
                    <h3 class="text-xl font-semibold text-red-600">Alarm Konsumsi Tablet Fe</h3>
                    <p class="text-gray-700 mt-2 text-sm">
                        Pengingat otomatis untuk konsumsi tablet zat besi (Fe) agar ibu tetap sehat.
                    </p>
                </div>

                <div class="p-6 bg-indigo-50 border border-indigo-200 rounded-lg shadow text-center">
                    <i class="fas fa-award text-4xl text-indigo-600 mb-3"></i>
                    <h3 class="text-xl font-semibold text-indigo-600">Sertifikat Kepatuhan</h3>
                    <p class="text-gray-700 mt-2 text-sm">
                        Dapatkan sertifikat digital sebagai bentuk pencapaian dalam menjaga kesehatan kehamilan.
                    </p>
                </div>

                <div class="p-6 bg-purple-50 border border-purple-200 rounded-lg shadow text-center">
                    <i class="fas fa-hospital text-4xl text-purple-600 mb-3"></i>
                    <h3 class="text-xl font-semibold text-purple-600">Integrasi Layanan Kesehatan</h3>
                    <p class="text-gray-700 mt-2 text-sm">
                        Terhubung langsung dengan fasilitas kesehatan untuk konsultasi dan monitoring kesehatan.
                    </p>
                </div>
            </div>
        </div>

        @include('utils.layout.footer')
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
@endsection