@extends('utils.layout.sidebar')


@section('content')
@include('utils.layout.topnav', ['title' => 'Promotif'])
<div class="container mx-auto py-4 px-2">

    <div class="promotif-container p-4 bg-gray-100 rounded-lg shadow-md h-128 overflow-hidden">
        <div class="promotif-content h-full overflow-y-auto">

            <!-- Title -->
            <div class="page p-6 bg-white border border-gray-300 rounded-lg">
                <div class="text-center">
                    <h2 class="text-3xl font-bold">Edukasi Tentang Anemia Pada Ibu Hamil</h2>
                </div>
            </div>

            <!-- 1 -->
            <div class="page mt-8 p-6 bg-white border border-gray-300 rounded-lg">
                <div class="main-content">
                    <h3 class="text-xl font-semibold">1. Faktor yang Mempengaruhi Anemia</h3>
                    <p class="mt-4 text-base">
                        a. Sebab langsung, yaitu karena ketidakcukupan zat besi dan infeksi
                        penyakit. Kurangnya zat besi dalam tubuh disebabkan karena
                        kurangnya kepatuhan asupan makanan yang mengandung zat besi,
                        makanan cukup, namun bioavailabilitas rendah, serta makanan yang
                        dimakan mengandung zat penghambat absorpsi besi. Infeksi
                        penyakit yang umumnya memperbesar risiko anemia adalah cacing
                        dan malaria.
                    </p>
                    <p class="mt-4 text-base">
                        b. Sebab tidak langsung, yaitu rendahnya perhatian keluarga terhadap
                        wanita dan aktifitas wanita tinggi.
                    </p>
                    <p class="mt-4 text-base">
                        c. Sebab mendasar yaitu masalah ekonomi, antara lain rendahnya
                        pendidikan, pendapatan keluarga, status sosial yang rendah dan
                        lokasi geografis yang sulit.
                    </p>
                </div>
            </div>

            <!-- 2 -->
            <div class="page mt-8 p-6 bg-white border border-gray-300 rounded-lg">
                <div class="main-content">
                    <h3 class="text-xl font-semibold">2. Penyebab anemia pada ibu hamil :</h3>
                    <p class="mt-4 text-base">
                        <strong>a. Sebab Langsung</strong>
                    <ul>
                        <li>Defisiensi zat besi pada kehamilan (kepatuhan konsumsi tablet Fe)</li>
                        <li>Kurang adekuatnya intake nutrisi (Status gizi)</li>
                        <li>Infeksi penyakit</li>
                    </ul>

                    <strong>b. Sebab tidak langsung</strong>
                    <ul>
                        <li>Rendahnya perhatian keluarga</li>
                        <li>Aktivitas wanita tinggi</li>
                    </ul>

                    <strong>c. Sebab mendasar</strong>
                    <ul>
                        <li>Rendahnya pendidikan</li>
                        <li>Pendapatan keluarga</li>
                        <li>Status sosial yang rendah</li>
                        <li>Lokasi geografis yang sulit</li>
                    </ul>
                    </p>
                </div>
            </div>

            <!-- 3 -->
            <div class="page mt-8 p-6 bg-white border border-gray-300 rounded-lg">
                <div class="main-content">
                    <h3 class="text-xl font-semibold">3. Klasifikasi Anemia:</h3>
                    <p class="mt-4 text-base">a. Hb 11 gr% : Tidak anemia</p>
                    <p class="mt-2 text-base">b. Hb 9-10 gr% : Anemia ringan</p>
                    <p class="mt-2 text-base">c. Hb 7-8 gr% : Anemia sedang</p>
                    <p class="mt-2 text-base">d. Hb &lt;7 gr% : Anemia berat</p>
                    <p class="mt-2 text-base">
                        Anemia pada ibu hamil dengan Hemoglobin &lt;11 gr% pada trimester I dan
                        III dan &lt;10 gr% pada trimester II.
                    </p>
                </div>
            </div>

            <!-- 4 -->
            <div class="page mt-8 p-6 bg-white border border-gray-300 rounded-lg">
                <div class="main-content">
                    <h3 class="text-xl font-semibold">4. Tanda dan gejala Anemia</h3>
                    <p class="mt-4 text-base">
                        Anemia pada ibu hamil dapat disertai adanya gejala seperti:
                    </p>
                    <ol type="a" class="mt-4 text-base">
                        <li>Keluhan lemah, pucat dan mudah pingsan, walaupun tekanan darah masih dalam batas
                            normal. Secara klinik dapat dilihat tubuh yang malnutrisi dan pucat
                            (Proverawati, 2014).</li>
                        <li>Kepala pusing.</li>
                        <li>Pandangan berkunang-kunang.</li>
                        <li>Perubahan jaringan epitel kuku.</li>
                        <li>Gangguan sistem nerumuskuler.</li>
                        <li>Lesu dan lemah.</li>
                        <li>Disphagia.</li>
                        <li>Pembesaran kelenjar limpa (Rukiyah, 2013).</li>
                    </ol>
                </div>
            </div>

            <!-- 5 -->
            <div class="page mt-8 p-6 bg-white border border-gray-300 rounded-lg">
                <div class="main-content">
                    <h3 class="text-xl font-semibold">5. Dampak Anemia</h3>
                    <ol type="a" class="mt-4 text-base">
                        <li>Kematian janin didalam kandungan</li>
                        <li>Abortus</li>
                        <li>Gangguan pertumbuhan janin</li>
                        <li>Persalinan prematuritas</li>
                        <li>Berat Badan Lahir Rendah (BBLR)</li>
                        <li>Ketuban pecah dini</li>
                        <li>Perdarahan antepartum</li>
                        <li>Anemia pada bayi yang dilahirkan</li>
                        <li>Gangguan his</li>
                        <li>Partus lama</li>
                        <li>Meningkatkan resiko terjadinya perdarahan post partum</li>
                        <li>Produksi ASI rendah</li>
                    </ol>
                </div>
            </div>

            <!-- 6 -->
            <div class="page mt-8 p-6 bg-white border border-gray-300 rounded-lg">
                <div class="main-content">
                    <h3 class="text-xl font-semibold">6. Pencegahan dan Pengobatan Anemia</h3>
                    <ol type="a" class="mt-4 text-base">
                        <li>Meningkatkan konsumsi makanan bergizi</li>
                        <li>Pemberian tablet zat besi (Fe) pada ibu hamil (Tablet tambah darah)
                            90 tablet selama hamil.</li>
                        <li>Keteraturan konsumsi Fe</li>
                    </ol>

                    <br>

                    <div class="flex justify-center items-center gap-5 mb-4">
                        <!-- First Card -->
                        <div class="card p-4 bg-white shadow-md rounded-lg">
                            <div class="text-center">
                                <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                <p class="mt-2">Wajah tidak pucat</p>
                            </div>
                        </div>

                        <!-- Second Card -->
                        <div class="card p-4 bg-white shadow-md rounded-lg">
                            <div class="text-center">
                                <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                <p class="mt-2">Wajah Pucat</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center items-center gap-5 mb-4">
                        <!-- Third Card -->
                        <div class="card p-4 bg-white shadow-md rounded-lg">
                            <div class="text-center">
                                <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                <p class="mt-2">Konjungtiva Merah Muda</p>
                            </div>
                        </div>

                        <!-- Fourth Card -->
                        <div class="card p-4 bg-white shadow-md rounded-lg">
                            <div class="text-center">
                                <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                <p class="mt-2">Konjungtiva Tampak Pucat</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center items-center gap-5 mb-4">
                        <!-- Fifth Card -->
                        <div class="card p-4 bg-white shadow-md rounded-lg">
                            <div class="text-center">
                                <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                <p class="mt-2">Kulit Tidak Pucat</p>
                            </div>
                        </div>

                        <!-- Sixth Card -->
                        <div class="card p-4 bg-white shadow-md rounded-lg">
                            <div class="text-center">
                                <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                <p class="mt-2">Kulit Pucat</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center items-center gap-5 mb-4">
                        <!-- Seventh Card -->
                        <div class="card p-4 bg-white shadow-md rounded-lg">
                            <div class="text-center">
                                <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                <p class="mt-2">Kuku Kemerahan</p>
                            </div>
                        </div>

                        <!-- Eighth Card -->
                        <div class="card p-4 bg-white shadow-md rounded-lg">
                            <div class="text-center">
                                <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                <p class="mt-2">Kuku Pucat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 7 -->
            <div class="page mt-8 p-6 bg-white border border-gray-300 rounded-lg">
                <div class="main-content">
                    <div class="flex justify-center items-center mt-4">
                        <div class="card w-56 h-72 bg-white shadow-md rounded-lg">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="mt-2">Gambar tablet FE</p>
                                    <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <h4 class="text-center mt-3">Video</h4>

                    <br>

                    <div class="flex justify-center items-center gap-5 mb-4">
                        <!-- First Card -->
                        <div class="card p-4 bg-white shadow-md rounded-lg">
                            <div class="text-center">
                                <a href="" target="_blank">
                                    <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                </a>
                                <p class="mt-2">Cara mengkonsumsi tablet FE</p>
                            </div>
                        </div>

                        <!-- Second Card -->
                        <div class="card p-4 bg-white shadow-md rounded-lg">
                            <div class="text-center">
                                <a href="" target="_blank">
                                    <img src="your-image-source.jpg" class="mx-auto" width="100" height="100" />
                                </a>
                                <p class="mt-2">Cara mengidentifikasi anemia pada ibu hamil</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

{{-- DONT REPLACE THIS PART --}}
@include('utils.layout.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
@endsection