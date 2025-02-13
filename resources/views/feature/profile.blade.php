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
            Profile Saya - Data Demografi
        </h2>

        @if ($lastUpdated)
        <p class="text-sm text-gray-500 my-3"><i>Terakhir diperbarui: {{ $lastUpdated }}</i></p>
        @endif

        <!-- Tombol Edit -->
        <button id="editBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
            Edit/Lengkapi Profil
        </button>

        <!-- Form Update Profile -->
        <form id="profileForm" action="{{ route('profile.update', $profile->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-teal-500">
                    <p class="text-lg font-semibold text-gray-800">Nama:</p>
                    <p class="text-gray-600 view-mode">{{ $profile->nama ?? 'Belum diisi' }}</p>
                    <input type="text" name="nama" value="{{ old('nama', $profile->nama) }}" readonly
                        class="hidden edit-mode border rounded-lg p-2 w-full bg-gray-100">
                </div>

                <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-indigo-500">
                    <p class="text-lg font-semibold text-gray-800">Usia:</p>
                    <p class="text-gray-600 view-mode">
                        {{ $usia ? $usia . ' tahun' : 'Belum diisi' }}
                    </p>
                    <input type="text" readonly class="hidden edit-mode border rounded-lg p-2 w-full bg-gray-100"
                        value="{{ $usia ? $usia . ' tahun' : 'Belum diisi' }}">
                </div>

                <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-teal-500">
                    <p class="text-lg font-semibold text-gray-800">Pendidikan:</p>
                    <p class="text-gray-600 view-mode">{{ $profile->pendidikan ?? 'Belum diisi' }}</p>
                    <input type="text" name="pendidikan" value="{{ old('pendidikan', $profile->pendidikan) }}"
                        class="hidden edit-mode border rounded-lg p-2 w-full">
                </div>

                <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-indigo-500">
                    <p class="text-lg font-semibold text-gray-800">Pekerjaan:</p>
                    <p class="text-gray-600 view-mode">{{ $profile->pekerjaan ?? 'Belum diisi' }}</p>
                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $profile->pekerjaan) }}"
                        class="hidden edit-mode border rounded-lg p-2 w-full">
                </div>

                <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-teal-500">
                    <p class="text-lg font-semibold text-gray-800">Hamil Anak Ke:</p>
                    <p class="text-gray-600 view-mode">{{ $profile->hamil_ke ?? 'Belum diisi' }}</p>
                    <input type="number" name="hamil_ke" value="{{ old('hamil_ke', $profile->hamil_ke) }}"
                        class="hidden edit-mode border rounded-lg p-2 w-full">
                </div>

                <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-indigo-500">
                    <p class="text-lg font-semibold text-gray-800">HPHT:</p>
                    <p class="text-gray-600 view-mode">{{ $profile->hpht ?? 'Belum diisi' }}</p>
                    <input type="date" name="hpht" value="{{ old('hpht', $profile->hpht) }}"
                        class="hidden edit-mode border rounded-lg p-2 w-full">
                </div>

                <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-teal-500">
                    <p class="text-lg font-semibold text-gray-800">BB Sebelum Hamil:</p>
                    <p class="text-gray-600 view-mode">{{ $profile->bb_sebelum_hamil ? $profile->bb_sebelum_hamil . '
                        kg' :
                        'Belum diisi' }}</p>
                    <input type="number" step="0.1" name="bb_sebelum_hamil"
                        value="{{ old('bb_sebelum_hamil', $profile->bb_sebelum_hamil) }}"
                        class="hidden edit-mode border rounded-lg p-2 w-full">
                </div>

                <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-indigo-500">
                    <p class="text-lg font-semibold text-gray-800">BB Sekarang:</p>
                    <p class="text-gray-600 view-mode">{{ $profile->bb_sekarang ? $profile->bb_sekarang . ' kg' : 'Belum
                        diisi' }}</p>
                    <input type="number" step="0.1" name="bb_sekarang"
                        value="{{ old('bb_sekarang', $profile->bb_sekarang) }}"
                        class="hidden edit-mode border rounded-lg p-2 w-full">
                </div>

                <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-teal-500">
                    <p class="text-lg font-semibold text-gray-800">Kadar HB:</p>
                    <p class="text-gray-600 view-mode">{{ $profile->kadar_hb ?? 'Belum diisi' }}</p>
                    <input type="number" step="0.1" name="kadar_hb" value="{{ old('kadar_hb', $profile->kadar_hb) }}"
                        class="hidden edit-mode border rounded-lg p-2 w-full">
                </div>

                <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-indigo-500">
                    <p class="text-lg font-semibold text-gray-800">Masalah Kehamilan & Persalinan Yang Lalu:</p>
                    <p class="text-gray-600 view-mode">{{ $profile->masalah_kehamilan ?? 'Belum diisi' }}</p>
                    <textarea name="masalah_kehamilan"
                        class="hidden edit-mode border rounded-lg p-2 w-full">{{ old('masalah_kehamilan', $profile->masalah_kehamilan) }}</textarea>
                </div>
            </div>

            <button type="submit" id="saveBtn"
                class="hidden bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition mt-4">
                Simpan
            </button>
        </form>
    </div>

    @include('utils.layout.footer')
</div>

<script>
    document.getElementById('editBtn').addEventListener('click', function () {
        document.querySelectorAll('.view-mode').forEach(el => el.classList.toggle('hidden'));
        document.querySelectorAll('.edit-mode').forEach(el => el.classList.toggle('hidden'));
        document.getElementById('saveBtn').classList.toggle('hidden');
    });
</script>

@endsection