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
            Profil Saya
        </h2>

        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab"
                data-tabs-toggle="#default-styled-tab-content"
                data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
                data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                        data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false"> Profil </button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="pencapaian-tab" data-tabs-target="#pencapaian" type="button" role="tab"
                        aria-controls="pencapaian" aria-selected="false">Pencapaian Saya</button>
                </li>
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="medali-tab" data-tabs-target="#medali" type="button" role="tab" aria-controls="medali"
                        aria-selected="false">Medali Saya</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            {{-- Profil Tab --}}
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <h1 class="text-3xl font-bold text-center mb-8">Data Demografi</h1>
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
                            <input type="text" readonly
                                class="hidden edit-mode border rounded-lg p-2 w-full bg-gray-100"
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
                            <p class="text-gray-600 view-mode">{{ $profile->bb_sebelum_hamil ?
                                $profile->bb_sebelum_hamil . '
                                kg' :
                                'Belum diisi' }}</p>
                            <input type="number" step="0.1" name="bb_sebelum_hamil"
                                value="{{ old('bb_sebelum_hamil', $profile->bb_sebelum_hamil) }}"
                                class="hidden edit-mode border rounded-lg p-2 w-full">
                        </div>

                        <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-indigo-500">
                            <p class="text-lg font-semibold text-gray-800">BB Sekarang:</p>
                            <p class="text-gray-600 view-mode">{{ $profile->bb_sekarang ? $profile->bb_sekarang . ' kg'
                                : 'Belum
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

            {{-- Pencapaian Tab --}}
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="pencapaian" role="tabpanel"
                aria-labelledby="pencapaian-tab">
                <div class="max-w-6xl mx-auto space-y-6">
                    <h1 class="text-3xl font-bold text-center mb-8">Ringkasan Pencapaian</h1>

                    <!-- Ringkasan Pencapaian -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-white shadow-lg rounded-xl p-6 border border-blue-200">
                        <div class="flex items-center mb-4">
                            <span class="text-3xl">🏆</span>
                            <h2 class="text-xl font-semibold text-blue-700 ml-2">Ringkasan Pencapaian</h2>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white shadow-md p-4 rounded-lg flex items-center">
                                <span class="text-2xl text-blue-500 mr-3">🩸</span>
                                <p class="text-gray-700 font-medium">Hb Terbaru: <br><span
                                        class="text-lg font-semibold">{{ $kadarHbInfo
                                        }}</span></p>
                            </div>

                            <div class="bg-white shadow-md p-4 rounded-lg flex items-center">
                                <span class="text-2xl text-green-500 mr-3">📈</span>
                                <p class="text-gray-700 font-medium">Hb Tertinggi: <br><span
                                        class="text-lg font-semibold">{{ $hbTertinggi
                                        }} g/dL</span></p>
                            </div>

                            <div class="bg-white shadow-md p-4 rounded-lg flex items-center">
                                <span class="text-2xl text-red-500 mr-3">📉</span>
                                <p class="text-gray-700 font-medium">Hb Terendah: <br><span
                                        class="text-lg font-semibold">{{ $hbTerendah }}
                                        g/dL</span></p>
                            </div>

                            <div class="bg-white shadow-md p-4 rounded-lg flex items-center">
                                <span class="text-2xl text-yellow-500 mr-3">📊</span>
                                <p class="text-gray-700 font-medium">Total Pemeriksaan: <br><span
                                        class="text-lg font-semibold">{{
                                        $totalPemeriksaanHb }} kali</span></p>
                            </div>
                        </div>
                    </div>

                    <!-- Tantangan Konsumsi Fe 90 Hari -->
                    <div
                        class="bg-gradient-to-br from-green-50 to-white shadow-lg rounded-xl p-6 border border-green-200">
                        <div class="flex items-center mb-4">
                            <span class="text-3xl">🏅</span>
                            <h2 class="text-xl font-semibold text-green-700 ml-2">Tantangan Konsumsi Fe 90 Hari</h2>
                        </div>

                        <p class="text-gray-700 font-medium text-center mb-2">
                            <span class="text-lg font-bold">{{ $daysCompleted }}</span> / 90 Hari Terpenuhi
                        </p>

                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 rounded-full h-6 overflow-hidden shadow-inner">
                            <div class="h-6 bg-green-500 rounded-full flex items-center justify-center text-white text-sm font-bold transition-all duration-500"
                                style="width: {{ $progressFe90 }}%">
                                {{ round($progressFe90, 1) }}%
                            </div>
                        </div>
                    </div>

                    <!-- Koleksi Badge -->
                    <div
                        class="bg-gradient-to-br from-yellow-50 to-white shadow-lg rounded-xl p-6 border border-yellow-200">
                        <div class="flex items-center mb-4">
                            <span class="text-3xl">🏅</span>
                            <h2 class="text-xl font-semibold text-yellow-700 ml-2">Koleksi Badge</h2>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                            @foreach ($badges as $badge)
                            <div class="flex flex-col items-center p-4 rounded-lg shadow-md transition-all duration-300 
                                {{ $badge['unlocked'] ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-200 opacity-50' }}">
                                <span class="text-4xl">{{ $badge['icon'] }}</span>
                                <span class="text-sm font-semibold text-center mt-2">{{ $badge['name'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Sertifikat yang Dimiliki -->
                    <div
                        class="bg-gradient-to-br from-purple-50 to-white shadow-lg rounded-xl p-6 border border-purple-200">
                        <div class="flex items-center mb-4">
                            <span class="text-3xl">📜</span>
                            <h2 class="text-xl font-semibold text-purple-700 ml-2">Sertifikat yang Dimiliki</h2>
                        </div>

                        <ul class="space-y-3">
                            @foreach ($certificates as $certificate)
                            <li class="bg-white shadow-md p-4 rounded-lg flex justify-between items-center">
                                <div>
                                    <p class="text-gray-800 font-medium">{{ $certificate['title'] }}</p>

                                </div>

                                @if ($daysCompleted >= 90)
                                <!-- Sertifikat Bisa Diunduh -->
                                <a href="{{ $certificate['download_link'] }}"
                                    class="bg-blue-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-600 transition-all">
                                    🔽 Unduh
                                </a>
                                @else
                                <!-- Sertifikat Masih Terkunci -->
                                <button disabled
                                    class="bg-gray-300 text-gray-500 px-3 py-1 rounded-lg text-sm cursor-not-allowed opacity-50">
                                    🔒 Terkunci
                                </button>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Motivasi -->
                    <div
                        class="bg-gradient-to-br from-pink-50 to-white shadow-lg rounded-xl p-6 border border-pink-200">
                        <div class="flex items-center mb-4">
                            <span class="text-3xl">📝</span>
                            <h2 class="text-xl font-semibold text-pink-700 ml-2">Motivasi</h2>
                        </div>

                        @foreach ($motivations as $motivation)
                        <div class="bg-white p-4 rounded-lg shadow-md mb-2">
                            <p class="text-gray-700 italic">"{{ $motivation }}"</p>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

            {{-- Medali Tab --}}
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="medali" role="tabpanel"
                aria-labelledby="medali-tab">
                <div class="max-w-6xl mx-auto space-y-6">
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
                </div>
            </div>
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