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

        <div class="mb-4 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-xs sm:text-xs md:text-sm lg:text-base xl:text-base font-medium text-center"
                id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content"
                data-tabs-active-classes="text-purple-600 hover:text-purple-600 border-purple-600"
                data-tabs-inactive-classes="text-gray-500 hover:text-gray-600 border-gray-100 hover:border-gray-300"
                role="tablist">
                <li class="me-1 sm:me-2 md:me-4" role="presentation">
                    <button
                        class="inline-block px-3 py-2 sm:px-2 sm:py-3 md:px-2 md:py-3 lg:px-6 lg:py-4 xl:px-6 xl:py-4 border-b-2 rounded-t-lg"
                        id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Profil</button>
                </li>
                <li class="me-1 sm:me-2 md:me-4" role="presentation">
                    <button
                        class="inline-block px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-4 lg:px-6 lg:py-4 xl:px-6 xl:py-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                        id="pencapaian-tab" data-tabs-target="#pencapaian" type="button" role="tab"
                        aria-controls="pencapaian" aria-selected="false">Pencapaian Saya</button>
                </li>
                <li class="me-1 sm:me-2 md:me-4" role="presentation">
                    <button
                        class="inline-block px-3 py-2 sm:px-4 sm:py-3 md:px-6 md:py-4 lg:px-6 lg:py-4 xl:px-6 xl:py-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300"
                        id="medali-tab" data-tabs-target="#medali" type="button" role="tab" aria-controls="medali"
                        aria-selected="false">Medali Saya</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-center mb-6 sm:mb-8">Data Demografi</h1>

                @if ($lastUpdated)
                <p class="text-xs sm:text-sm md:text-base text-gray-500 my-2 sm:my-3"><i>Terakhir diperbarui: {{
                        $lastUpdated }}</i>
                </p>
                @endif

                <button id="editBtn"
                    class="bg-blue-500 text-white px-3 py-2 sm:px-4 sm:py-3 rounded-lg hover:bg-blue-600 transition">
                    Edit/Lengkapi Profil
                </button>

                <form id="profileForm" action="{{ route('profile.update', $profile->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4 sm:gap-6 md:gap-8 mt-4">
                        <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 md:p-8 border-l-4 border-teal-500">
                            <p class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">Nama:</p>
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 view-mode">{{ $profile->nama ??
                                'Belum diisi' }}
                            </p>
                            <input type="text" name="nama" value="{{ old('nama', $profile->nama) }}" readonly
                                class="hidden edit-mode border rounded-lg p-2 w-full bg-gray-100">
                        </div>

                        <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 md:p-8 border-l-4 border-indigo-500">
                            <p class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">Usia:</p>
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 view-mode">
                                {{ $usia ? $usia . ' tahun' : 'Belum diisi' }}
                            </p>
                            <input type="text" readonly
                                class="hidden edit-mode border rounded-lg p-2 w-full bg-gray-100"
                                value="{{ $usia ? $usia . ' tahun' : 'Belum diisi' }}">
                        </div>

                        <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 md:p-8 border-l-4 border-teal-500">
                            <p class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">Pendidikan:</p>
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 view-mode">{{ $profile->pendidikan
                                ?? 'Belum
                                diisi' }}</p>
                            <input type="text" name="pendidikan" value="{{ old('pendidikan', $profile->pendidikan) }}"
                                class="hidden edit-mode border rounded-lg p-2 w-full">
                        </div>

                        <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 md:p-8 border-l-4 border-indigo-500">
                            <p class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">Pekerjaan:</p>
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 view-mode">{{ $profile->pekerjaan ??
                                'Belum
                                diisi' }}</p>
                            <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $profile->pekerjaan) }}"
                                class="hidden edit-mode border rounded-lg p-2 w-full">
                        </div>

                        <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 md:p-8 border-l-4 border-teal-500">
                            <p class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">Hamil Anak Ke:</p>
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 view-mode">{{ $profile->hamil_ke ??
                                'Belum
                                diisi' }}</p>
                            <input type="number" name="hamil_ke" value="{{ old('hamil_ke', $profile->hamil_ke) }}"
                                class="hidden edit-mode border rounded-lg p-2 w-full">
                        </div>

                        <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 md:p-8 border-l-4 border-indigo-500">
                            <p class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">HPHT:</p>
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 view-mode">{{ $profile->hpht ??
                                'Belum diisi' }}
                            </p>
                            <input type="date" name="hpht" value="{{ old('hpht', $profile->hpht) }}"
                                class="hidden edit-mode border rounded-lg p-2 w-full">
                        </div>

                        <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 md:p-8 border-l-4 border-teal-500">
                            <p class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">BB Sebelum Hamil:</p>
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 view-mode">{{
                                $profile->bb_sebelum_hamil ?
                                $profile->bb_sebelum_hamil . ' kg' : 'Belum diisi' }}</p>
                            <input type="number" step="0.1" name="bb_sebelum_hamil"
                                value="{{ old('bb_sebelum_hamil', $profile->bb_sebelum_hamil) }}"
                                class="hidden edit-mode border rounded-lg p-2 w-full">
                        </div>

                        <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 md:p-8 border-l-4 border-indigo-500">
                            <p class="text-sm sm:text-base md:text-lg font-semibold text-gray-800">BB Sekarang:</p>
                            <p class="text-xs sm:text-sm md:text-base text-gray-600 view-mode">{{ $profile->bb_sekarang
                                ?
                                $profile->bb_sekarang . ' kg' : 'Belum diisi' }}</p>
                            <input type="number" step="0.1" name="bb_sekarang"
                                value="{{ old('bb_sekarang', $profile->bb_sekarang) }}"
                                class="hidden edit-mode border rounded-lg p-2 w-full">
                        </div>
                    </div>

                    <button type="submit" id="saveBtn"
                        class="hidden bg-green-500 text-white px-3 py-2 sm:px-4 sm:py-3 rounded-lg hover:bg-green-600 transition mt-4">
                        Simpan
                    </button>
                </form>
            </div>

            {{-- Pencapaian Tab --}}
            <div class="hidden p-4 sm:p-6 md:p-8 rounded-lg bg-gray-50" id="pencapaian" role="tabpanel"
                aria-labelledby="pencapaian-tab">
                <div class="max-w-6xl mx-auto space-y-8">
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-center mb-6 sm:mb-8">Ringkasan Pencapaian
                    </h1>

                    <!-- Ringkasan Hb -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-white shadow-lg rounded-xl p-4 sm:p-6 md:p-8 border border-blue-200">
                        <div class="flex items-center mb-4">
                            <span class="text-2xl sm:text-3xl">🏆</span>
                            <h2 class="text-lg sm:text-xl font-semibold text-blue-700 ml-2">Ringkasan Pencapaian</h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-4 gap-4">
                            <div class="bg-white shadow-md p-4 sm:p-6 rounded-lg flex items-center">
                                <span class="text-xl sm:text-2xl text-blue-500 mr-3">🩸</span>
                                <p class="text-gray-700 font-medium">Hb Terbaru: <br><span
                                        class="text-lg sm:text-xl font-semibold">{{ $kadarHbInfo }}</span></p>
                            </div>

                            <div class="bg-white shadow-md p-4 sm:p-6 rounded-lg flex items-center">
                                <span class="text-xl sm:text-2xl text-green-500 mr-3">📈</span>
                                <p class="text-gray-700 font-medium">Hb Tertinggi: <br><span
                                        class="text-lg sm:text-xl font-semibold">{{ $hbTertinggi }} g/dL</span></p>
                            </div>

                            <div class="bg-white shadow-md p-4 sm:p-6 rounded-lg flex items-center">
                                <span class="text-xl sm:text-2xl text-red-500 mr-3">📉</span>
                                <p class="text-gray-700 font-medium">Hb Terendah: <br><span
                                        class="text-lg sm:text-xl font-semibold">{{ $hbTerendah }} g/dL</span></p>
                            </div>

                            <div class="bg-white shadow-md p-4 sm:p-6 rounded-lg flex items-center">
                                <span class="text-xl sm:text-2xl text-yellow-500 mr-3">📊</span>
                                <p class="text-gray-700 font-medium">Total Pemeriksaan: <br><span
                                        class="text-lg sm:text-xl font-semibold">{{ $totalPemeriksaanHb }} kali</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Tantangan Fe 90 Hari -->
                    <div
                        class="bg-gradient-to-br from-green-50 to-white shadow-lg rounded-xl p-4 sm:p-6 md:p-8 border border-green-200">
                        <div class="flex items-center mb-4">
                            <span class="text-2xl sm:text-3xl">🏅</span>
                            <h2 class="text-lg sm:text-xl font-semibold text-green-700 ml-2">Tantangan Konsumsi Fe 90
                                Hari</h2>
                        </div>

                        <p class="text-gray-700 font-medium text-center mb-2">
                            <span class="text-lg sm:text-xl font-bold">{{ $daysCompleted }}</span> / 90 Hari Terpenuhi
                        </p>

                        <div class="w-full bg-gray-200 rounded-full h-4 sm:h-6 overflow-hidden shadow-inner">
                            <div class="h-4 sm:h-6 bg-green-500 rounded-full flex items-center justify-center text-white text-xs sm:text-sm font-bold transition-all duration-500"
                                style="width: {{ $progressFe90 }}%">
                                {{ round($progressFe90, 1) }}%
                            </div>
                        </div>
                    </div>

                    <!-- Koleksi Badge -->
                    <div
                        class="bg-gradient-to-br from-yellow-50 to-white shadow-lg rounded-xl p-4 sm:p-6 md:p-8 border border-yellow-200">
                        <div class="flex items-center mb-4">
                            <span class="text-2xl sm:text-3xl">🏅</span>
                            <h2 class="text-lg sm:text-xl font-semibold text-yellow-700 ml-2">Koleksi Badge</h2>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                            @foreach ($badges as $badge)
                            <div class="flex flex-col items-center p-4 rounded-lg shadow-md transition-all duration-300 
                            {{ $badge['unlocked'] ? 'bg-yellow-100 text-yellow-700' : 'bg-gray-200 opacity-50' }}">
                                <span class="text-3xl sm:text-4xl">{{ $badge['icon'] }}</span>
                                <span class="text-xs sm:text-sm font-semibold text-center mt-2">{{ $badge['name']
                                    }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Sertifikat -->
                    <div
                        class="bg-gradient-to-br from-purple-50 to-white shadow-lg rounded-xl p-4 sm:p-6 md:p-8 border border-purple-200">
                        <div class="flex items-center mb-4">
                            <span class="text-2xl sm:text-3xl">📜</span>
                            <h2 class="text-lg sm:text-xl font-semibold text-purple-700 ml-2">Sertifikat yang Dimiliki
                            </h2>
                        </div>

                        <ul class="space-y-3">
                            @foreach ($certificates as $certificate)
                            <li class="bg-white shadow-md p-4 rounded-lg flex justify-between items-center">
                                <p class="text-gray-800 font-medium">{{ $certificate['title'] }}</p>

                                @if ($daysCompleted >= 90)
                                <a href="{{ $certificate['download_link'] }}"
                                    class="bg-blue-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded-lg text-xs sm:text-sm hover:bg-blue-600 transition-all">
                                    🔽 Unduh
                                </a>
                                @else
                                <button disabled
                                    class="bg-gray-300 text-gray-500 px-3 py-1 sm:px-4 sm:py-2 rounded-lg text-xs sm:text-sm cursor-not-allowed opacity-50">
                                    🔒 Terkunci
                                </button>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Medali Tab --}}
            <div class="hidden p-4 rounded-lg bg-gray-50" id="medali" role="tabpanel" aria-labelledby="medali-tab">
                <div class="max-w-6xl mx-auto space-y-8">
                    <!-- Header Section -->
                    <div class="text-center">
                        <h1 class="text-3xl font-bold mb-2">Badge & Medali Saya</h1>
                        <p class="">Kumpulkan berbagai badge sebagai tanda pencapaian Anda selama perjalanan
                            kehamilan yang sehat. Raih semuanya!</p>
                    </div>

                    <!-- Badge Statistics -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                            <div class="text-center">
                                <p class="text-gray text-center">
                                <p class="text-gray-600">Total Badge Diperoleh</p>
                                <p class="text-2xl font-bold">{{ $earnedBadges }} dari {{ $totalBadges }}</p>
                            </div>
                            @if($latestBadge)
                            <div class="text-center">
                                <p class="text-gray-600">Badge Terkini</p>
                                <p class="text-2xl font-bold">{{ $latestBadge['name'] }}</p>
                                <p class="text-sm text-gray-500">{{ $latestBadge['date_earned'] }}</p>
                            </div>
                            @endif
                            @if($nextBadge)
                            <div class="text-center">
                                <p class="text-gray-600">Badge Sedang Dikejar</p>
                                <p class="text-2xl font-bold">{{ $nextBadge['name'] }}</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Active Challenges Progress -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Progress Bar Tantangan Aktif</h2>
                        @foreach($activeChallenge as $challenge)
                        <div class="mb-4">
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-700">{{ $challenge['name'] }}</span>
                                <span class="text-gray-600">{{ $challenge['progress'] }}/{{ $challenge['total']
                                    }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div class="bg-blue-600 h-4 rounded-full transition-all duration-500"
                                    style="width: {{ $challenge['percentage'] }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Badge Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 gap-6">
                        @foreach($badges as $badge)
                        <div
                            class="bg-white rounded-xl shadow-md p-6 {{ $badge['unlocked'] ? 'border-2 border-green-500' : 'opacity-50' }}">
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-4xl">{{ $badge['icon'] }}</span>
                                @if($badge['unlocked'])
                                <span class="text-green-500 text-sm">✅ Diperoleh - {{ $badge['date_earned'] }}</span>
                                @else
                                <span class="text-gray-500 text-sm">🔒 Belum Diperoleh</span>
                                @endif
                            </div>
                            <h3 class="text-lg font-semibold mb-2">{{ $badge['name'] }}</h3>
                            <p class="text-gray-600 text-sm">{{ $badge['description'] }}</p>
                            @if(!$badge['unlocked'])
                            <div class="mt-4 p-2 bg-gray-50 rounded-lg">
                                <p class="text-sm text-gray-500"><i class="fas fa-info-circle"></i> {{
                                    $badge['requirement'] }}</p>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </div>
    @include('utils.layout.footer')
    <script>
        document.getElementById('editBtn').addEventListener('click', function () {
            document.querySelectorAll('.view-mode').forEach(el => el.classList.toggle('hidden'));
            document.querySelectorAll('.edit-mode').forEach(el => el.classList.toggle('hidden'));
            document.getElementById('saveBtn').classList.toggle('hidden');
        });
    </script>

    @endsection