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
@endsection

@section('content')
@include('utils.layout.topnav', ['title' => 'Profil'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">


        <h2
            class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-500 mb-6">
            Profile Saya</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-blue-500">
                <p class="text-lg font-semibold text-gray-800">Nama:</p>
                <p class="text-gray-600">{{ $profile->nama }}</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-green-500">
                <p class="text-lg font-semibold text-gray-800">Usia:</p>
                <p class="text-gray-600">{{ $profile->usia }} tahun</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-purple-500">
                <p class="text-lg font-semibold text-gray-800">Pendidikan:</p>
                <p class="text-gray-600">{{ $profile->pendidikan }}</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-red-500">
                <p class="text-lg font-semibold text-gray-800">Pekerjaan:</p>
                <p class="text-gray-600">{{ $profile->pekerjaan }}</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-yellow-500">
                <p class="text-lg font-semibold text-gray-800">Hamil Anak Ke:</p>
                <p class="text-gray-600">{{ $profile->hamil_ke }}</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-indigo-500">
                <p class="text-lg font-semibold text-gray-800">HPHT:</p>
                <p class="text-gray-600">{{ $profile->hpht }}</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-teal-500">
                <p class="text-lg font-semibold text-gray-800">BB Sebelum Hamil:</p>
                <p class="text-gray-600">{{ $profile->bb_sebelum_hamil }} kg</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-pink-500">
                <p class="text-lg font-semibold text-gray-800">BB Sekarang:</p>
                <p class="text-gray-600">{{ $profile->bb_sekarang }} kg</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-gray-500">
                <p class="text-lg font-semibold text-gray-800">Kadar HB:</p>
                <p class="text-gray-600">{{ $profile->kadar_hb }}</p>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-orange-500">
                <p class="text-lg font-semibold text-gray-800">Masalah Kehamilan & Persalinan Yang Lalu:</p>
                <p class="text-gray-600">{{ $profile->masalah_kehamilan }}</p>
            </div>
        </div>
    </div>



    {{-- DONT REPLACE THIS PART --}}
    @include('utils.layout.footer')
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

@endsection