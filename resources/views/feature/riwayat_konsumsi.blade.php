@extends('utils.layout.sidebar')

@section('head')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
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
        <!-- Pesan Informasi -->
        <div class="mb-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded-lg">
            <p>Jika kamu sudah minum obat, tapi status masih <strong class="text-red-500">Tidak Minum Obat</strong>,
                harap isi data konsumsi obat di menu <a href="{{ route('dashboard') }}"
                    class="underline font-semibold">Dashboard</a>.</p>
        </div>

        <!-- Calendar View -->
        <div id="calendar" class="bg-gray-100 p-4 rounded-lg shadow-md mb-6"></div>

        <!-- Table for Consumption History -->
        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">Riwayat Konsumsi</h3>
            <table id="historyTable" class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $record)
                    <tr class="border">
                        <td class="p-2">{{ \Carbon\Carbon::parse($record['tanggal'])->translatedFormat('j F Y') }}</td>
                        <td class="p-2 {{ $record['status'] == 'Minum Obat' ? 'text-green-500' : 'text-red-500' }}">
                            {{ $record['status'] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
    @include('utils.layout.footer')
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
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
                @foreach($history as $record)
                {
                    title: "{{ $record['status'] }}",
                    start: "{{ $record['tanggal'] }}",
                    color: "{{ $record['status'] == 'Minum Obat' ? 'green' : 'red' }}"
                },
                @endforeach
            ]

        });
        calendar.render();
    });
</script>

<script>
    $(document).ready(function() {
        $('#historyTable').DataTable({
            responsive: true,
            lengthChange: true,
            pageLength: 10,
            ordering: true,
            order: [[0, 'desc']],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });
</script>
@endsection