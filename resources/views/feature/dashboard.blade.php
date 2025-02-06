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
                class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-pink-500 mb-6">
                Dashboard Anda</h2>
            <p class="text-gray-600">Selamat datang, User.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-pink-500">
                <h3 class="text-lg font-semibold text-pink-600">Pengingat Alarm</h3>
                <p class="text-gray-600">Atur jadwal minum obat dengan alarm dan notifikasi.</p>

                <div class="text-gray-700 font-semibold text-xl mt-2" id="liveClock"></div>

                <div id="alarmNotification"
                    class="hidden bg-blue-100 border border-blue-400 text-blue-700 px-4 py-2 rounded-md mt-3">
                    <p id="alarmMessage">Alarm akan berbunyi dalam beberapa menit lagi.</p>
                    <button class="bg-gray-500 text-white px-3 py-1 rounded-md mt-2"
                        onclick="snoozeAlarm()">Snooze</button>
                    <button class="bg-green-500 text-white px-3 py-1 rounded-md mt-2" onclick="markAsTaken()">Mark as
                        Taken</button>
                </div>

                <button class="mt-3 bg-pink-500 text-white px-4 py-2 rounded-md"
                    onclick="window.location.href='/alarm'">
                    Atur Pengingat
                </button>
            </div>

            <!-- Ringkasan Hari Ini -->
            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-blue-500">
                <h3 class="text-lg font-semibold text-blue-600">Ringkasan Hari Ini</h3>
                <p class="text-gray-600">Jumlah tablet yang perlu diminum dan progres harian.</p>
                <div class="flex justify-between mt-3">
                    <span class="text-xl font-bold text-gray-800">2/3 Tablet</span>
                    <progress class="w-1/2" value="2" max="3"></progress>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-green-500">
                <h3 class="text-lg font-semibold text-green-600">Progress Mingguan</h3>
                <p class="text-gray-600">Seberapa konsisten Anda dalam minum tablet.</p>
                <div class="mt-3">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-yellow-500">
                <h3 class="text-lg font-semibold text-yellow-600">Tandai sebagai Sudah Diminum</h3>
                <p class="text-gray-600">Tekan tombol untuk mencatat konsumsi tablet.</p>
                <button class="mt-3 bg-yellow-500 text-white px-4 py-2 rounded-md">Sudah Diminum ✅</button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4 border-l-4 border-purple-500">
                <h3 class="text-lg font-semibold text-purple-600">Pengaturan Dosis</h3>
                <p class="text-gray-600">Atur dosis harian sesuai kebutuhan Anda.</p>
                <select class="mt-3 p-2 border rounded-md">
                    <option>1 Tablet per Hari</option>
                    <option>2 Tablet per Hari</option>
                </select>
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script>
    // TO-DO: Change alarm audio
    // TO-DO: Fix function snooze/turn off alarm - audio is not off after click either of the buttons
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        document.getElementById('liveClock').textContent = `Waktu Saat Ini: ${timeString}`;
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
@endsection