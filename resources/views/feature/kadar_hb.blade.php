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
        <button onclick="openModal()" class="mt-6 bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-md">
            Tambah Kadar Hb
        </button>
    </div>
    @include('utils.layout.footer')
</div>

<!-- Modal Form -->
<div id="hbModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold mb-4">Tambah Kadar Hb</h2>
        <form>
            <label class="block mb-2">Tanggal Cek:</label>
            <input type="date" class="w-full p-2 border rounded mb-4" id="hbDate">

            <label class="block mb-2">Kadar Hb:</label>
            <input type="number" step="0.1" class="w-full p-2 border rounded mb-4" id="hbLevel">

            <label class="block mb-2">Keluhan:</label>
            <input type="text" class="w-full p-2 border rounded mb-4" id="hbComplaint">

            <label class="block mb-2">Saran Dokter:</label>
            <input type="text" class="w-full p-2 border rounded mb-4" id="hbAdvice">

            <button type="button" onclick="closeModal()"
                class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-md mr-2">
                Batal
            </button>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                Simpan
            </button>
        </form>
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

    // Open & Close Modal
    function openModal() {
        document.getElementById("hbModal").classList.remove("hidden");
    }
    function closeModal() {
        document.getElementById("hbModal").classList.add("hidden");
    }
</script>
@endsection