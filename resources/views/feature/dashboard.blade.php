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
        <div class="text-left mb-6">
            <h2
                class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-400 mb-6">
                Dashboard Anda</h2>
            <p class="text-gray-600">Selamat datang, User.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Waktu Saat Ini -->
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-blue-500">
                <h3 class="text-lg font-semibold text-blue-600 flex items-center">
                    ⏰ <span class="ml-2">Waktu saat ini</span>
                </h3>
                <div class="md:text-[2rem] text-xl mt-4 font-bold font-mono text-green-800 bg-clip-text drop-shadow-lg animate-pulse"
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
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-blue-500">
                <h3 class="text-lg font-semibold text-blue-600 flex items-center">
                    📅 <span class="ml-2">Ringkasan Hari Ini</span>
                </h3>
                <div>
                    <p class="text-base font-bold text-gray-800 underline">2/3 Tablet <span>sudah diminum</span></p>
                </div>
                <p class="text-gray-600 text-xs mt-1">Sudahkah minum obat hari ini? Catat konsumsi tabletmu.</p>
                <button class="mt-3 bg-blue-500 text-white px-4 py-2 rounded-md text-sm"
                    data-modal-target="add-medicine-consumption-modal"
                    data-modal-toggle="add-medicine-consumption-modal">Sudah
                    Diminum ✅</button>
            </div>

            <!-- Dosis Setiap Hari -->
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-blue-500">
                <h3 class="text-lg font-semibold text-blue-600 flex items-center">
                    💊 <span class="ml-2">Dosis Setiap Hari</span>
                </h3>
                <p class="text-gray-600 text-sm">Dosis yang harus Anda minum setiap hari adalah <b>4 Tablet Fe.</b></p>
                <button class="mt-3 bg-blue-500 text-white px-4 py-2 text-sm rounded-md">Atur dosis 📝</button>
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


            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-purple-500">
                <h3 class="text-lg font-semibold text-purple-600">Atur Pengingat Alarm</h3>
                <p class="text-gray-600">Atur jadwal minum obat dengan alarm dan notifikasi.</p>
                <button class="mt-3 bg-purple-500 text-white px-4 py-2 rounded-md"
                    onclick="window.location.href='/alarm'">
                    Atur Pengingat 📢
                </button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-red-500">
                <h3 class="text-lg font-semibold text-red-600">Emergency Contact</h3>
                <p class="text-gray-600 mb-4">Hubungi tenaga medis jika ada masalah.</p>
                <a href="/contact_us" class="mt-3 bg-red-500 text-white px-4 py-2 rounded-md">Hubungi Medis 📞</a>
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

<div id="successFeedback" class="fixed inset-0 flex justify-center items-center hidden">
    <div class="bg-green-500 text-white p-4 rounded-lg shadow-lg flex items-center space-x-2">
        <span class="text-xl">✅</span>
        <p class="text-sm">Obat telah dicatat!</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        
        let alarmSound = new Audio('https://www.fesliyanstudios.com/play-mp3/4383');
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
@endsection