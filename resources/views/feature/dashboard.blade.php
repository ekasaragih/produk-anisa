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
@include('utils.layout.topnav', ['title' => 'Dashboard'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <div
            class="bg-white shadow-md rounded-lg p-6 border-l-4 border-pink-500 flex flex-col items-center sm:flex-row sm:items-start mb-3">
            <div class="flex-shrink-0">
                <img src="https://i.pinimg.com/736x/cd/8e/0f/cd8e0fcdd99d49b5408d8c4c58422621.jpg" alt="User Avatar"
                    class="w-24 h-24 rounded-full border">
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-4 text-left w-full">
                <h2 class="text-base font-semibold text-gray-800">Selamat datang,
                    <span class="text-pink-600">{{ $user->full_name }}</span> 🎉
                </h2>

                <p class="text-gray-600 text-sm pt-3">Status Kesehatan Terbaru:</p>
                <div class="font-bold text-lg
                            @if($latestHb && $latestHb->indicated_anemia == 'Anemia') text-red-500 
                            @else text-green-500 @endif">
                    @if($latestHb)
                    {{ $latestHb->indicated_anemia }}
                    ({{ $latestHb->kadar_hb }} g/dL pada {{ \Carbon\Carbon::parse($latestHb->tanggal_cek)->format('d M
                    Y') }})
                    @else
                    Belum ada data Hb terbaru.
                    @endif
                </div>

                <p class="text-gray-600 text-sm pt-3">Kelola akun dan perbarui informasi profilmu.</p>
                <a href="{{ route('profile') }}"
                    class="mt-2 inline-flex items-center bg-pink-500 text-white px-4 py-2 rounded-md text-sm hover:bg-pink-600 transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A5.002 5.002 0 0112 14h0a5.002 5.002 0 016.879 3.804M15 10a3 3 0 11-6 0 3 3 0 016 0z">
                        </path>
                    </svg>
                    Kelola Profil
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Waktu Saat Ini -->
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-blue-500">
                <h3 class="text-lg font-semibold text-blue-600 flex items-center">
                    ⏰ <span class="ml-2">Waktu saat ini</span>
                </h3>
                <div class="md:text-[2rem] text-xl mt-8 font-bold font-mono text-blue-800 bg-clip-text drop-shadow-lg animate-pulse"
                    id="liveClock"></div>
            </div>

            <!-- Alarm -->
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-blue-500 text-sm">
                <h3 class="text-lg font-semibold text-blue-600 flex items-center">
                    🔔 <span class="ml-2">Alarm</span>
                </h3>
                <p id="alarmMessage">Alarm akan berbunyi dalam beberapa menit lagi.</p>
                <div id="alarmNotification"
                    class="hidden text-xs bg-blue-100 border border-blue-400 text-blue-700 px-4 py-2 rounded-md mt-3">
                    <div class="flex flex-wrap gap-2 items-center justify-center">
                        <button
                            class="bg-gray-500 hover:bg-gray-600 text-white px-2 py-1 sm:px-3 sm:py-1.5 text-xs sm:text-sm rounded-md transition"
                            onclick="snoozeAlarm()">Snooze</button>
                        <button
                            class="bg-teal-500 hover:bg-teal-600 text-white px-2 py-1 sm:px-3 sm:py-1.5 text-xs sm:text-sm rounded-md transition"
                            onclick="markAsTaken()">Diminum</button>
                    </div>
                </div>
            </div>

            <!-- Ringkasan Hari Ini -->
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-blue-500 flex flex-col h-full">
                <div class="flex-grow mb-2">
                    <h3 class="text-lg font-semibold text-blue-600 flex items-center">
                        📅 <span class="ml-2">Ringkasan Hari Ini</span>
                    </h3>
                    <div>
                        <p class="text-base font-bold text-gray-800 underline mb-4">2/3 Tablet <span>sudah
                                diminum</span></p>
                    </div>
                    <p class="text-gray-600 text-xs mt-1">Sudahkah minum obat hari ini? Catat konsumsi tabletmu.</p>
                </div>
                <button class="mt-auto bg-blue-500 text-white px-4 py-2 rounded-md text-sm self-start"
                    data-modal-target="add-medicine-consumption-modal"
                    data-modal-toggle="add-medicine-consumption-modal">Sudah
                    Diminum ✅
                </button>
            </div>

            <!-- Dosis Setiap Hari -->
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-blue-500 flex flex-col h-full">
                <div class="flex-grow">
                    <h3 class="text-lg font-semibold text-blue-600 flex items-center">
                        💊 <span class="ml-2">Dosis Setiap Hari</span>
                    </h3>
                    <p class="text-gray-600 text-sm mb-3">Dosis yang harus Anda minum setiap hari adalah <b>4 Tablet
                            Fe.</b>
                    </p>
                </div>
                <button class="mt-auto bg-blue-500 text-white px-4 py-2 text-sm rounded-md self-start">Atur dosis
                    📝</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-4">
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-teal-500">
                <h3 class="text-lg font-semibold text-teal-600">➤ Progress Mingguan</h3>
                <p class="text-gray-600">Seberapa konsisten Anda dalam minum tablet.</p>
                <canvas id="weeklyProgressChart"></canvas>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-teal-500">
                <h3 class="text-lg font-semibold text-teal-600">➤ Progress Bulanan</h3>
                <p class="text-gray-600">Seberapa konsisten Anda dalam minum tablet.</p>
                <canvas id="monthlyProgressChart"></canvas>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-6 mt-4">
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-green-500 flex flex-col h-full">
                <div class="flex-grow">
                    <h3 class="text-lg font-semibold text-green-600">Masukkan Kadar HB</h3>
                    <p class="text-gray-600 mb-4">Periksa kadar hemoglobin Anda untuk memastikan kesehatan darah tetap
                        optimal.
                    </p>
                </div>
                <button data-modal-target="add-hb-record-modal" data-modal-toggle="add-hb-record-modal"
                    class="mt-auto bg-green-500 text-white px-4 py-2 rounded-md self-start">
                    Masukkan Data HB 🩺
                </button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-purple-500 flex flex-col h-full">
                <div class="flex-grow">
                    <h3 class="text-lg font-semibold text-purple-600">Atur Pengingat Alarm</h3>
                    <p class="text-gray-600 mb-4">Atur jadwal minum obat dengan alarm dan notifikasi.</p>
                </div>
                <button class="mt-auto bg-purple-500 text-white px-4 py-2 rounded-md self-start"
                    onclick="window.location.href='/alarm'">
                    Atur Pengingat 📢
                </button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-red-500 flex flex-col h-full">
                <div class="flex-grow">
                    <h3 class="text-lg font-semibold text-red-600">Emergency Contact</h3>
                    <p class="text-gray-600 mb-4">Hubungi tenaga medis jika ada masalah.</p>
                </div>
                <a href="/contact_us" class="mt-auto bg-red-500 text-white px-4 py-2 rounded-md self-start">Hubungi
                    Medis 📞</a>
            </div>
        </div>
    </div>
    @include('utils.layout.footer')
</div>

{{-- Modal Catat Konsumsi Obat --}}
<div id="add-medicine-consumption-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-50 z-40"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full z-50">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Catat Konsumsi Obat
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="add-medicine-consumption-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <form id="medicationForm">
                    <label class="block text-sm text-gray-600">Obat yang diminum:</label>
                    <input type="text" id="medicine-name" class="w-full border rounded p-2 mb-2" required>

                    <label class="block text-sm text-gray-600">Jumlah Tablet:</label>
                    <input type="number" id="tablet-amount" class="w-full border rounded p-2 mb-2" required>

                    <label class="block text-sm text-gray-600">Jam:</label>
                    <input type="time" id="medicine-time" class="w-full border rounded p-2 mb-2" required>

                    <label class="block text-sm text-gray-600">Tanggal:</label>
                    <input type="date" id="medicine-date" class="w-full border rounded p-2 mb-2" required>

                    <label class="block text-sm text-gray-600">Sisa Obat:</label>
                    <input type="number" id="remaining-tablets" class="w-full border rounded p-2 mb-4" required>

                    <div class="flex justify-end">
                        <button type="button" id="closeModal" data-modal-hide="add-medicine-consumption-modal"
                            class="mr-2 bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal HB -->
<div id="add-hb-record-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-50 z-40"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full z-50">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Record Kadar Hb
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="add-hb-record-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <form id="hbForm" method="POST" action="{{ route('hb.store') }}">
                    @csrf
                    <label class="block mb-2 text-sm">Kadar HB (g/dL):</label>
                    <input type="number" id="kadarHb" name="kadar_hb" class="w-full p-2 border rounded-md mb-3"
                        step="0.1" required>

                    <label class="block mb-2 text-sm">Tanggal Cek:</label>
                    <input type="date" id="tanggalCek" name="tanggal_cek" class="w-full p-2 border rounded-md mb-3"
                        required>

                    <label class="block mb-2 text-sm">Tempat/Lokasi:</label>
                    <input type="text" id="lokasiCek" name="tempat_lokasi" class="w-full p-2 border rounded-md mb-4"
                        required>

                    <!-- Indikasi Anemia (Readonly) -->
                    <label class="block mb-2 text-sm">Indikasi Anemia:</label>
                    <input type="text" id="indicatedAnemia" name="indicated_anemia"
                        class="w-full p-2 border rounded-md mb-4 bg-gray-100" readonly>

                    <div class="flex justify-between">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<div id="successFeedback" class="fixed inset-0 flex justify-center items-center hidden">
    <div class="bg-green-500 text-white p-4 rounded-lg shadow-lg flex items-center space-x-2">
        <span class="text-xl">✅</span>
        <p class="text-sm">Obat telah dicatat!</p>
    </div>
</div>

<script>
    // TO-DO: Change alarm audio
    // TO-DO: Fix function snooze/turn off alarm - audio is not off after click either of the buttons
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        document.getElementById('liveClock').textContent = `${timeString}`;
    }
    setInterval(updateClock, 1000);
    updateClock();

    let alarmTimeout;
    function showAlarmNotification(time) {
        document.getElementById('alarmMessage').textContent = `Anda harus minum obat pada ${time}`;
        document.getElementById('alarmNotification').classList.remove('hidden');
        
        // let alarmSound = new Audio('https://www.fesliyanstudios.com/play-mp3/4383');
        alarmSound.play();
        alarmTimeout = setInterval(() => alarmSound.play(), 600000);
    }

    function snoozeAlarm() {
        clearInterval(alarmTimeout);
        document.getElementById('alarmNotification').classList.add('hidden');
        setTimeout(() => showAlarmNotification('10 menit lagi'), 600000);
    }

    function markAsTaken() {
        clearInterval(alarmTimeout);
        document.getElementById('alarmNotification').classList.add('hidden');
        alert('Obat telah diminum, alarm dimatikan.');
    }

    setTimeout(() => showAlarmNotification('11:00 AM'), 5000);
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const weeklyCtx = document.getElementById("weeklyProgressChart").getContext("2d");
        const monthlyCtx = document.getElementById("monthlyProgressChart").getContext("2d");

        // Data dummy untuk progress mingguan
        const weeklyData = {
            labels: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab", "Min"],
            datasets: [{
                label: "Tablet Diminum",
                data: [1, 1, 0, 1, 1, 0, 1], // Data jumlah tablet diminum per hari
                backgroundColor: "rgba(56, 178, 172, 0.5)", 
                borderColor: "rgba(56, 178, 172, 1)",
                borderWidth: 1
            }]
        };

        // Data dummy untuk progress bulanan
        const monthlyData = {
            labels: ["Minggu 1", "Minggu 2", "Minggu 3", "Minggu 4"],
            datasets: [{
                label: "Tablet Diminum",
                data: [6, 7, 5, 7], // Data jumlah tablet diminum per minggu
                backgroundColor: "rgba(56, 178, 172, 0.5)",
                borderColor: "rgba(56, 178, 172, 1)",
                borderWidth: 1
            }]
        };

        // Render chart mingguan
        new Chart(weeklyCtx, {
            type: "bar",
            data: weeklyData,
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true, max: 2 } }
            }
        });

        // Render chart bulanan
        new Chart(monthlyCtx, {
            type: "bar",
            data: monthlyData,
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true, max: 7 } }
            }
        });
    });
</script>

<script>
    document.getElementById("medicationForm").addEventListener("submit", function(event) {
        event.preventDefault();

        // Ambil nilai input
        let tabletAmount = parseInt(document.getElementById("tablet-amount").value);
        let consumedTablets = document.getElementById("consumed-tablets");

        // Update jumlah tablet yang diminum hari ini
        let currentCount = parseInt(consumedTablets.innerText);
        consumedTablets.innerText = currentCount + tabletAmount;

        // Tutup modal
        closeModal();

        // Tampilkan feedback animasi
        let successFeedback = document.getElementById("successFeedback");
        successFeedback.classList.remove("hidden");

        // Hilangkan feedback setelah 2 detik
        setTimeout(() => {
            successFeedback.classList.add("hidden");
        }, 2000);
    });
</script>

<script>
    document.getElementById('kadarHb').addEventListener('input', function () {
        const hbValue = parseFloat(this.value);
        const anemiaInput = document.getElementById('indicatedAnemia');

        if (!isNaN(hbValue)) {
            if (hbValue < 11) {
                anemiaInput.value = "Anemia";
                anemiaInput.style.color = "red";
            } else {
                anemiaInput.value = "Tidak Anemia";
                anemiaInput.style.color = "green";
            }
        } else {
            anemiaInput.value = "";
        }
    });
</script>

<script>
    document.getElementById('kadarHb').addEventListener('input', function() {
        const kadarHb = parseFloat(this.value);
        const result = kadarHb < 11 ? 'Anemia' : 'Tidak Anemia';
        document.getElementById('indicatedAnemia').value = result;
    });
</script>
@endsection