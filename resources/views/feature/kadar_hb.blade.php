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
@include('utils.layout.topnav', ['title' => 'Pantau Kadar Hb'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <h2
            class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-500 mb-6">
            Riwayat Pemeriksaan Hb
        </h2>

        <!-- Button to Add Data -->
        <button data-modal-target="add-hb-record-modal" data-modal-toggle="add-hb-record-modal"
            class="mt-3 bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md">
            Masukkan Data Hb
        </button>

        <!-- Button for Diagnosa -->
        <button data-modal-target="diagnose-modal" data-modal-toggle="diagnose-modal"
            class="mt-3 bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-md">
            Cek Diagnosa Kadar HB
        </button>

        <!-- Container for Chart and Table -->
        <div class="flex flex-col md:flex-row gap-6 justify-between items-start mt-6">
            <!-- Chart Section -->
            <div class="w-full md:w-1/2 bg-white p-5 rounded-lg shadow-lg">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Rekomendasi Berdasarkan Kadar Hb</h3>

                @if($latestHb)
                @if($latestHb->indicated_anemia === 'Anemia')
                <div class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                    <strong class="font-bold text-2xl">Perhatian! 🚨</strong>
                    <p class="text-sm mt-2">
                        Anda terindikasi anemia ({{ $latestHb->kadar_hb }} g/dL pada {{
                        \Carbon\Carbon::parse($latestHb->tanggal_cek)->format('d M Y') }}).
                        <br><br>
                        <span class="text-base font-semibold">Rekomendasi:</span>
                    <ul class="list-disc list-inside mt-2">
                        <li>💊 Konsumsi tablet Fe secara teratur.</li>
                        <li>📅 Periksa ulang kadar Hb dalam 2 minggu.</li>
                        <li>🥦 Konsumsi makanan tinggi zat besi (bayam, hati, daging merah).</li>
                    </ul>
                    </p>
                    @if($hbRecordCount > 3 && $stillAnemia)
                    <p class="mt-3 text-red-700 font-semibold">
                        ⚠️ Anda mengalami anemia terus-menerus dalam beberapa pemeriksaan terakhir.
                        Segera konsultasikan ke dokter atau bidan untuk penanganan lebih lanjut.
                    </p>
                    @endif
                </div>
                @else
                <div class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                    <strong class="font-bold">Selamat! ❤️</strong>
                    <p class="text-sm mt-2">
                        Kadar Hb Anda normal ({{ $latestHb->kadar_hb }} g/dL pada {{
                        \Carbon\Carbon::parse($latestHb->tanggal_cek)->format('d M Y') }}).
                        Teruskan pola hidup sehat, konsumsi makanan bergizi, dan lakukan pemeriksaan Hb rutin!
                    </p>
                </div>
                @endif
                @else
                <div class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50" role="alert">
                    <strong class="font-bold">Belum Ada Data 📊</strong>
                    <p class="text-sm mt-2">Silakan tambahkan data pemeriksaan kadar Hb pertama Anda.</p>
                </div>
                @endif

                <h3 class="text-lg font-bold text-gray-700 my-6">Grafik Kadar Hb</h3>
                <canvas id="hbChart" class="h-72"></canvas>

                <h2 class="text-lg font-semibold my-6">Riwayat Diagnosa</h2>
                <table class="w-full table-auto border" id="diagnoseTable">
                    <thead class="bg-gradient-to-r from-teal-500 to-blue-500 text-white sticky top-0 z-10">
                        <tr>
                            <th class="px-4 py-2">Tanggal</th>
                            <th class="px-4 py-2">Hasil Diagnosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnoses as $diagnosis)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $diagnosis->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-2">{{ $diagnosis->diagnose_result }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Table Section -->
            <div class="w-full md:w-1/2 bg-white p-5 rounded-lg shadow-lg">
                <h3 class="text-lg font-bold text-gray-700 mb-4">Riwayat Pemeriksaan Hb</h3>
                <div class="overflow-y-auto rounded-lg">
                    <table id="hbRecordsTable" class="table-auto w-full text-sm text-left">
                        <thead class="bg-gradient-to-r from-teal-500 to-blue-500 text-white sticky top-0 z-10">
                            <tr>
                                <th class="p-3 border">Tanggal</th>
                                <th class="p-3 border">Kadar Hb (g/dL)</th>
                                <th class="p-3 border">Tempat/Lokasi</th>
                                <th class="p-3 border">Indikasi Anemia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hbRecords as $record)
                            <tr class="hover:bg-blue-50">
                                <td class="p-3 border">{{ \Carbon\Carbon::parse($record->tanggal_cek)->format('d M Y')
                                    }}</td>
                                <td class="p-3 border">{{ $record->kadar_hb }}</td>
                                <td class="p-3 border">{{ $record->tempat_lokasi }}</td>
                                <td class="p-3 border">{{ $record->indicated_anemia }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    @include('utils.layout.footer')
</div>

<!-- Modal Form -->
<div id="add-hb-record-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-50 z-40"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full z-50">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Masukkan Data Hb
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
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

<!-- Modal Diagnosa -->
<div id="diagnose-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-50 z-40"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full z-50">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Cek Diagnosa Anemia</h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="diagnose-modal">
                    <span class="sr-only">Close modal</span>
                    ✕
                </button>
            </div>
            <form method="POST" action="{{ route('diagnosa.store') }}" class="p-4 md:p-5 space-y-4">
                @csrf
                @php
                $gejala = [
                'wajah' => 'Wajah pucat',
                'konjungtiva' => 'Konjungtiva pucat',
                'kulit' => 'Kulit pucat',
                'kuku' => 'Kuku pucat',
                'lemah' => 'Tubuh lemah',
                'berkunang' => 'Pandangan berkunang-kunang',
                'pusing' => 'Kepala pusing'
                ];
                @endphp
                @foreach($gejala as $key => $label)
                <div>
                    <input type="checkbox" name="symptoms[{{ $key }}]" value="1" class="mr-2" id="{{ $key }}">
                    <label for="{{ $key }}">{{ $label }}</label>
                </div>
                @endforeach

                <div id="diagnosis-result" class="mt-4 p-3 bg-gray-100 rounded text-gray-800">
                    Pilih gejala untuk melihat hasil diagnosa...
                </div>

                <button type="submit" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md">
                    Simpan Diagnosa
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

{{-- Display hb records data --}}
<script>
    $(document).ready(function() {
        $('#hbRecordsTable').DataTable({
            responsive: true,
            lengthChange: true,
            pageLength: 15,
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

        $('#diagnoseTable').DataTable({
            responsive: true,
            lengthChange: true,
            pageLength: 5,
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

{{-- Display chart data --}}
<script>
    const chartLabels = @json($hbRecords->pluck('tanggal_cek')->map(function($date) {
        return \Carbon\Carbon::parse($date)->format('d M Y');
    }));

    const chartData = @json($hbRecords->pluck('kadar_hb'));

    const ctx = document.getElementById("hbChart").getContext("2d");
    new Chart(ctx, {
        type: "line",
        data: {
            labels: chartLabels,
            datasets: [{
                label: "Kadar Hb",
                data: chartData,
                borderColor: "#3BAFDA",
                backgroundColor: "rgba(59, 175, 218, 0.2)",
                pointBackgroundColor: "#2CA58D",
                pointBorderColor: "#2CA58D", 
                pointHoverBackgroundColor: "#FFED8B",
                pointHoverBorderColor: "#FFB347",
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: "#4B5563"
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: "#4B5563"
                    }
                },
                y: {
                    beginAtZero: false,
                    ticks: {
                        color: "#4B5563"
                    },
                    grid: {
                        color: "rgba(0, 0, 0, 0.1)"
                    }
                }
            }
        }
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name^="symptoms"]');
    const resultDiv = document.getElementById('diagnosis-result');

    function updateDiagnosis() {
        const selected = [...checkboxes].filter(cb => cb.checked).length;
        let result = 'Silakan pilih gejala terlebih dahulu.';

        if (selected >= 6) {
            result = 'Diagnosa: Anemia berat';
        } else if (selected >= 4) {
            result = 'Diagnosa: Anemia sedang';
        } else if (selected >= 2) {
            result = 'Diagnosa: Anemia ringan';
        } else {
            result = 'Tidak ada indikasi anemia.';
        }

        resultDiv.textContent = result;
    }

    checkboxes.forEach(cb => cb.addEventListener('change', updateDiagnosis));
});
</script>
@endsection