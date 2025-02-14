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

        <!-- Pencapaian !-->
        <div class="max-w-6xl mx-auto space-y-6">
        <h1 class="text-3xl font-bold text-center mb-8">Ringkasan Pencapaian</h1>

        <!-- Ringkasan Pencapaian -->
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">🏆 1. Ringkasan Pencapaian</h2>
            <p>Total Badge yang Diperoleh: 7 dari 10 badge</p>
            <p>Sertifikat yang Dimiliki: Sertifikat “Tantangan 90 Hari Konsumsi Fe”</p>
            <p>Level Kesehatan: Level 3 – Pejuang Sehat</p>
        </div>

        <!-- Koleksi Badge -->
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">🏅 2. Koleksi Badge atau Medali Virtual</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg">
                    <span class="text-4xl">🏆</span>
                    <span>Juara 90 Hari – Konsumsi Fe 90 Hari</span>
                </div>
                <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg">
                    <span class="text-4xl">💪</span>
                    <span>Pejuang Fe (30 Hari)</span>
                </div>
                <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg">
                    <span class="text-4xl">🌿</span>
                    <span>Master Nutrisi (Ikuti 5 Tips)</span>
                </div>
                <div class="flex items-center space-x-4 bg-gray-50 p-4 rounded-lg">
                    <span class="text-4xl">🩸</span>
                    <span>Detektor Dini (3x Cek Hb)</span>
                </div>
            </div>
        </div>

        <!-- Sertifikat yang Dimiliki -->
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">📜 3. Sertifikat yang Dimiliki</h2>
            <ul class="space-y-2">
                <li>Sertifikat Tantangan 90 Hari Konsumsi Fe (Diterbitkan: 13 Februari 2025) <a href="#" class="text-blue-500 underline hover:text-blue-700">🔽 Unduh Sertifikat</a></li>
                <li>Sertifikat Bebas Anemia 2 Bulan (Diterbitkan: 20 Januari 2025) <a href="#" class="text-blue-500 underline hover:text-blue-700">🔽 Unduh Sertifikat</a></li>
            </ul>
        </div>

        <!-- Riwayat Pencapaian Hb -->
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">📊 4. Riwayat Pencapaian Hb</h2>
            <p>Hb Tertinggi: 13.2 g/dL (10 Januari 2025)</p>
            <p>Hb Terendah: 9.5 g/dL (15 November 2024)</p>
            <p>Total Pemeriksaan Hb: 12 kali</p>
        </div>

        <!-- Tantangan yang Sedang Berlangsung -->
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">🎯 5. Tantangan yang Sedang Berlangsung</h2>
            <div class="mb-4">
                <p class="mb-2">🚀 Tantangan Konsumsi Fe 90 Hari – 75/90 Hari Terpenuhi</p>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-green-500 h-4 rounded-full animate-pulse" style="width: 83.33%"></div>
                </div>
            </div>
            <div>
                <p class="mb-2">🥦 Tantangan Nutrisi Seimbang (5 Tips) – 3/5 Tips Dibaca</p>
                <div class="w-full bg-gray-200 rounded-full h-4">
                    <div class="bg-blue-500 h-4 rounded-full animate-pulse" style="width: 60%"></div>
                </div>
            </div>
        </div>

        <!-- Tips & Motivasi Khusus -->
        <div class="bg-white shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4">📝 6. Tips & Motivasi Khusus</h2>
            <p class="mb-2">“Selamat! Anda sudah 1 bulan bebas anemia. Pertahankan pola makan sehat!”</p>
            <p>“Ayo, tinggal 15 hari lagi untuk menyelesaikan tantangan konsumsi Fe 90 hari!”</p>
        </div>
    </div>

        <!-- Medali !-->
        <div class="mt-5 max-w-6xl w-full p-6">
        <h1 class="text-3xl font-bold text-center mb-8">Medali</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Badge Cards -->
            <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center">
                <div class="text-blue-500 text-5xl mb-4">
                    <i class="fas fa-medal"></i>
                </div>
                <h2 class="text-xl font-semibold">Pejuang Fe (30 Hari)</h2>
                <p>Rutin mengonsumsi tablet Fe selama 30 hari.</p>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center">
                <div class="text-green-500 text-5xl mb-4">
                    <i class="fas fa-star"></i>
                </div>
                <h2 class="text-xl font-semibold">Streak Sehat (7 Hari)</h2>
                <p>Menjaga kadar Hb normal selama 7 hari berturut-turut.</p>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center">
                <div class="text-yellow-500 text-5xl mb-4">
                    <i class="fas fa-trophy"></i>
                </div>
                <h2 class="text-xl font-semibold">Bintang Pagi (Log Tepat Waktu)</h2>
                <p>Mencatat konsumsi tablet tepat waktu selama 14 hari.</p>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center">
                <div class="text-purple-500 text-5xl mb-4">
                    <i class="fas fa-heart"></i>
                </div>
                <h2 class="text-xl font-semibold">Pahlawan Hb (Bebas Anemia)</h2>
                <p>Menjaga kadar Hb normal selama 1 bulan penuh.</p>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center">
                <div class="text-pink-500 text-5xl mb-4">
                    <i class="fas fa-brain"></i>
                </div>
                <h2 class="text-xl font-semibold">Detektor Dini (Rutin Cek Hb)</h2>
                <p>Melakukan pencatatan kadar Hb minimal 3 kali dalam sebulan.</p>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center">
                <div class="text-red-500 text-5xl mb-4">
                    <i class="fas fa-rocket"></i>
                </div>
                <h2 class="text-xl font-semibold">Juara 90 Hari (Tantangan Selesai)</h2>
                <p>Menyelesaikan tantangan konsumsi tablet Fe selama 90 hari.</p>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center">
                <div class="text-indigo-500 text-5xl mb-4">
                    <i class="fas fa-globe"></i>
                </div>
                <h2 class="text-xl font-semibold">Ibu Teladan (Tanpa Absen</h2>
                <p>Tidak pernah melewatkan konsumsi tablet selama 1 bulan penuh.</p>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center">
                <div class="text-teal-500 text-5xl mb-4">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h2 class="text-xl font-semibold">Pelacak Kesehatan (Pengguna Aktif)</h2>
                <p>Rutin mencatat log kesehatan selama 30 hari.</p>
            </div>

            <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center">
                <div class="text-orange-500 text-5xl mb-4">
                    <i class="fas fa-users"></i>
                </div>
                <h2 class="text-xl font-semibold">Penjaga Kesehatan (Bebas Anemia 2 Bulan)</h2>
                <p>Menjaga kadar Hb normal selama 60 hari berturut-turut.</p>
            </div>
        </div>

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
                    <p class="text-gray-600 view-mode">{{ $kadarHbInfo }}</p>
                    <input type="text" name="kadar_hb" value="{{ $kadarHbInfo }}" readonly
                        class="hidden edit-mode border rounded-lg p-2 w-full bg-gray-100 text-gray-500">
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