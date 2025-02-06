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
@include('utils.layout.topnav', ['title' => 'Riwayat Konsumsi'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <h2
            class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-500 mb-6">
            Riwayat Konsumsi
        </h2>

        <!-- Calendar View -->
        <div id="calendar" class="bg-gray-100 p-4 rounded-lg shadow-md mb-6"></div>

        <!-- Table for Consumption History -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">Riwayat Konsumsi</h3>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border">
                        <td class="p-2">1 Februari 2025</td>
                        <td class="p-2 text-green-500">Patuh</td>
                    </tr>
                    <tr class="border">
                        <td class="p-2">2 Februari 2025</td>
                        <td class="p-2 text-red-500">Tidak Patuh</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Badge System -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">Pencapaian</h3>
            <div class="flex gap-4">
                <div class="p-4 bg-yellow-400 rounded-lg text-white">⭐⭐ Konsisten 7 Hari</div>
                <div class="p-4 bg-green-500 rounded-lg text-white">🏆 Konsisten 30 Hari</div>
            </div>
        </div>
    </div>
    @include('utils.layout.footer')
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>

<script>
    $(document).ready(function() {
        $('#consumptionTable').DataTable();
    });

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            buttonText: {
                today: 'Hari Ini', 
                month: 'Bulan',    
                week: 'Minggu',   
                day: 'Hari',     
                list: 'Agenda'  
            },
            events: [
                { title: 'Minum Obat', start: '2025-02-01', color: 'green' },
                { title: 'Minum Obat', start: '2025-02-02', color: 'green' },
                { title: 'Tidak Minum Obat', start: '2025-02-03', color: 'red' },
            ]
        });
        calendar.render();
    });
</script>
@endsection