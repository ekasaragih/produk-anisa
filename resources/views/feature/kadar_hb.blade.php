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
@include('utils.layout.topnav', ['title' => 'Pantau Kadar Hb'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <h2
            class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-500 mb-6">
            Riwayat Pemeriksaan Hb
        </h2>

        <!-- Chart Container -->
        <div class="w-full max-w-3xl mx-auto">
            <canvas id="hbChart"></canvas>
        </div>

        <!-- Table -->
        <div class="relative overflow-x-auto rounded-lg shadow-md mt-3">
            <table class="table-auto w-full text-sm text-left border-collapse bg-white shadow-inner rounded-lg">
                <thead class="bg-gradient-to-l from-blue-500 to-teal-400 text-white text-md">
                    <tr>
                        <th class="border p-2">Tanggal</th>
                        <th class="border p-2">Kadar Hb</th>
                        <th class="border p-2">Keluhan</th>
                        <th class="border p-2">Saran Dokter</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border p-2">2025-02-01</td>
                        <td class="border p-2">12.5</td>
                        <td class="border p-2">Pusing ringan</td>
                        <td class="border p-2">Lanjutkan konsumsi tablet Fe</td>
                    </tr>
                    <tr>
                        <td class="border p-2">2025-01-15</td>
                        <td class="border p-2">11.8</td>
                        <td class="border p-2">Mudah lelah</td>
                        <td class="border p-2">Perbanyak makan sayur dan daging merah</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Button to Add Data -->
        <button data-modal-target="add-hb-record-modal" data-modal-toggle="add-hb-record-modal"
            class="mt-6 bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md">
            Masukkan Data Hb
        </button>
    </div>
    @include('utils.layout.footer')
</div>

<!-- Modal Form -->
<div id="add-hb-record-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">

    <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-50 z-40"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full z-50">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Masukkan Data Hb
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script>
    // Dummy data for Chart
    const chartData = {
        labels: ["2025-01-01", "2025-01-15", "2025-02-01"],
        datasets: [{
            label: "Kadar Hb",
            data: [11.5, 11.8, 12.5],
            borderColor: "#4b7795",
            backgroundColor: "rgba(75, 119, 149, 0.2)",
            fill: true,
            tension: 0.3
        }]
    };

    // Render Chart
    const ctx = document.getElementById("hbChart").getContext("2d");
    new Chart(ctx, {
        type: "line",
        data: chartData,
        options: {
            responsive: true,
            plugins: { legend: { display: true } },
            scales: { y: { beginAtZero: false } }
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