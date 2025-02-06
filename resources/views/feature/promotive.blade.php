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
@include('utils.layout.topnav', ['title' => 'Promotif'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <div class="h-full overflow-y-auto space-y-8">

            <h2
                class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-pink-500 mb-6">
                Edukasi Tentang Anemia Pada Ibu Hamil
            </h2>

            <!-- 1 -->
            <div class="p-6 bg-white border border-blue-300 rounded-2xl shadow-sm">
                <h3 class="text-2xl font-semibold text-blue-600">1. Faktor yang Mempengaruhi Anemia</h3>
                <ul class="list-disc list-inside mt-4 text-base text-gray-700 space-y-2">
                    <li><strong>Sebab langsung:</strong> Ketidakcukupan zat besi dan infeksi penyakit seperti cacing dan
                        malaria.</li>
                    <li><strong>Sebab tidak langsung:</strong> Rendahnya perhatian keluarga terhadap wanita dan
                        aktivitas wanita yang tinggi.</li>
                    <li><strong>Sebab mendasar:</strong> Masalah ekonomi seperti rendahnya pendidikan, pendapatan
                        keluarga, status sosial rendah, dan lokasi geografis yang sulit.</li>
                </ul>
            </div>

            <!-- 2 -->
            <div class="p-6 bg-white border border-blue-300 rounded-2xl shadow-sm">
                <h3 class="text-2xl font-semibold text-blue-600">2. Penyebab Anemia pada Ibu Hamil</h3>
                <ul class="list-disc list-inside mt-4 text-base text-gray-700 space-y-2">
                    <li><strong>Sebab langsung:</strong> Defisiensi zat besi, kurangnya intake nutrisi, infeksi
                        penyakit.</li>
                    <li><strong>Sebab tidak langsung:</strong> Rendahnya perhatian keluarga, aktivitas wanita yang
                        tinggi.</li>
                    <li><strong>Sebab mendasar:</strong> Rendahnya pendidikan, pendapatan keluarga, status sosial
                        rendah, lokasi geografis sulit.</li>
                </ul>
            </div>

            <!-- 3 -->
            <div class="p-6 bg-white border border-blue-300 rounded-2xl shadow-sm">
                <h3 class="text-2xl font-semibold text-blue-600">3. Klasifikasi Anemia</h3>
                <ul class="list-disc list-inside mt-4 text-base text-gray-700 space-y-2">
                    <li><strong>Tidak anemia:</strong> Hb ≥11 gr%</li>
                    <li><strong>Anemia ringan:</strong> Hb 9-10 gr%</li>
                    <li><strong>Anemia sedang:</strong> Hb 7-8 gr%</li>
                    <li><strong>Anemia berat:</strong> Hb &lt;7 gr%</li>
                </ul>
                <p class="mt-2 text-base text-gray-700">Anemia pada ibu hamil terjadi jika Hb &lt;11 gr% pada trimester
                    I dan III, serta &lt;10 gr% pada trimester II.</p>
            </div>

            <!-- 4 -->
            <div class="p-6 bg-white border border-blue-300 rounded-2xl shadow-sm">
                <h3 class="text-2xl font-semibold text-blue-600">4. Tanda dan Gejala Anemia</h3>
                <ul class="list-disc list-inside mt-4 text-base text-gray-700 space-y-2">
                    <li>Lemah, pucat, mudah pingsan</li>
                    <li>Kepala pusing, pandangan berkunang-kunang</li>
                    <li>Perubahan jaringan epitel kuku, gangguan sistem neuromuskuler</li>
                    <li>Lesu, lemah, disfagia, pembesaran kelenjar limpa</li>
                </ul>
            </div>

            <!-- 5 -->
            <div class="p-6 bg-white border border-blue-300 rounded-2xl shadow-sm">
                <h3 class="text-2xl font-semibold text-blue-600">5. Dampak Anemia</h3>
                <ul class="list-disc list-inside mt-4 text-base text-gray-700 space-y-2">
                    <li>Kematian janin, abortus, gangguan pertumbuhan janin</li>
                    <li>Persalinan prematur, BBLR, ketuban pecah dini</li>
                    <li>Anemia pada bayi, gangguan his, partus lama</li>
                    <li>Perdarahan post partum, produksi ASI rendah</li>
                </ul>
            </div>

            <!-- 6 -->
            <div class="p-6 bg-white border border-blue-300 rounded-2xl shadow-sm">
                <h3 class="text-2xl font-semibold text-blue-600">6. Pencegahan dan Pengobatan Anemia</h3>
                <ul class="list-disc list-inside mt-4 text-base text-gray-700 space-y-2">
                    <li>Meningkatkan konsumsi makanan bergizi</li>
                    <li>Pemberian 90 tablet zat besi (Fe) selama kehamilan</li>
                    <li>Keteraturan konsumsi Fe</li>
                </ul>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-6">
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        <p class="mt-2 text-blue-700">Wajah tidak pucat</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        <p class="mt-2 text-red-500">Wajah pucat</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-6">
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        <p class="mt-2 text-blue-700">Konjungtiva Merah Muda</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        <p class="mt-2 text-red-500">Konjungtiva Tampak Pucat</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-6">
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        <p class="mt-2 text-blue-700">Kulit Tidak Pucat</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        <p class="mt-2 text-red-500">Kulit Pucat</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-6">
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        <p class="mt-2 text-blue-700">Kuku Kemerahan</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        <p class="mt-2 text-red-500">Kuku Pucat</p>
                    </div>
                </div>
            </div>


            <!-- 7 -->
            <div class="p-6 bg-white border border-blue-300 rounded-2xl shadow-sm">
                <h3 class="text-2xl font-semibold text-blue-600 text-center">Gambar dan Video Edukasi</h3>
                <div class="flex justify-center items-center mt-6">
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        <p class="mt-2 text-gray-700">Gambar tablet FE</p>
                    </div>
                </div>

                <h4 class="text-xl font-semibold text-blue-600 text-center mt-6">Video</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <a href="" target="_blank">
                            <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        </a>
                        <p class="mt-2 text-gray-700">Cara mengkonsumsi tablet FE</p>
                    </div>
                    <div class="p-4 bg-white shadow-md rounded-xl text-center">
                        <a href="" target="_blank">
                            <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                        </a>
                        <p class="mt-2 text-gray-700">Cara mengidentifikasi anemia pada ibu hamil</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

@include('utils.layout.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

@endsection