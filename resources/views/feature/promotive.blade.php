@extends('utils.layout.sidebar')

@section('head')
    <style>
        .promotif-container {
            width: 1100px;
            margin: 20px auto;
            overflow: hidden;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f1f1f1;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            height: 500px;
        }

        .promotif-content {
            width: 100%;
            height: 100%;
            overflow-y: auto;
            padding: 20px;
            box-sizing: border-box;
        }

        .page {
            width: 100%;
            background-color: white;
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .header,
        .footer {
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .main-content {
            font-size: 16px;
            line-height: 1.6;
            overflow-wrap: break-word;
            /* Prevent text overflow */
        }

        .table-of-contents {
            padding: 20px;
            background-color: #e1e1e1;
            margin-bottom: 20px;
            border-radius: 8px;
        }
    </style>
@endsection

@section('content')
    @include('utils.layout.topnav', ['title' => 'Promotif'])
    <div class="container-fluid py-1 px-3">
        <div class="row">
            <div class="card" style="background-color: #F8FAFC;">
                <div class="card-body" style="padding: 5px;">
                    <h1 class="text-3xl mt-2 font-bold">PROMOTIF</h1>

                    <div class="promotif-container mt-4 px-4">
                        <div class="promotif-content">

                            <!-- Title -->
                            <div class="page">
                                <div class="main-content text-center">
                                    <h2 class="text-3xl font-bold">Edukasi Tentang Anemia Pada Ibu Hamil</h2>
                                </div>
                            </div>

                            <!-- 1 -->
                            <div class="page mt-8">
                                <div class="main-content">
                                    <h3 class="text-xl font-semibold">
                                        1. Faktor yang Mempengaruhi Anemia</h3>
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
                            <div class="page mt-8">
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
                            <div class="page mt-8">
                                <div class="main-content">
                                    <h3 class="text-xl font-semibold">
                                        3. Klasifikasi Anemia:</h3>
                                    <p class="mt-4 text-base">
                                        a. Hb 11 gr% ` : Tidak anemia
                                    </p>
                                    <p class="mt-2 text-base">
                                        b. Hb 9-10 gr% : Anemia ringan
                                    </p>
                                    <p class="mt-2 text-base">
                                        c. Hb 7-8 gr% : Anemia sedang
                                    </p>
                                    <p class="mt-2 text-base">
                                        d. Hb &lt;7 gr% : Anemia berat
                                    </p>
                                    <p class="mt-2 text-base">
                                        Anemia pada ibu hamil dengan Hemoglobin &lt;11 gr% pada trimester I dan
                                        III dan &lt;10 gr% pada trimester II.
                                    </p>
                                </div>
                            </div>

                            <!-- 4 -->
                            <div class="page mt-8">
                                <div class="main-content">
                                    <h3 class="text-xl font-semibold">
                                        4. Tanda dan gejala Anemia</h3>
                                    <p class="mt-4 text-base">
                                        Anemia pada ibu hamil dapat disertai adanya gejala seperti :
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
                            <div class="page mt-8">
                                <div class="main-content">
                                    <h3 class="text-xl font-semibold">
                                        5. Dampak Anemia</h3>

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
                            <div class="page mt-8">
                                <div class="main-content">
                                    <h3 class="text-xl font-semibold">
                                        6. Pencegahan dan Pengobatan Anemia</h3>

                                    <ol type="a" class="mt-4 text-base">
                                        <li>Meningkatkan konsumsi makanan bergizi</li>
                                        <li>Pemberian tablet zat besi (Fe) pada ibu hamil (Tablet tambah darah)
                                            90 tablet selama hamil.</li>
                                        <li>Keteraturan konsumsi Fe</li>
                                    </ol>

                                    <br>

                                    <div class="card-container d-flex justify-content-center align-items-center gap-5 mb-4">
                                        <!-- First Card -->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="text-center">
                                                            <img src="your-image-source.jpg" class="mx-auto d-block"
                                                                width="100" height="100" />
                                                            <p class="mt-2">Wajah tidak pucat</p>
                                                        </div>
                                                        <div class="text-center">
                                                            <img src="your-image-source.jpg" class="mx-auto d-block"
                                                                width="100" height="100" />
                                                            <p class="mt-2">Konjungtiva Merah Muda</p>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="text-center">
                                                            <img src="your-image-source.jpg" class="mx-auto d-block"
                                                                width="100" height="100" />
                                                            <p class="mt-2">Kulit tidak Pucat</p>
                                                        </div>
                                                        <div class="text-center">
                                                            <img src="your-image-source.jpg" class="mx-auto d-block"
                                                                width="100" height="100" />
                                                            <p class="mt-2">Kuku kemerahan</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Second Card -->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="text-center">
                                                            <img src="your-image-source.jpg" class="mx-auto d-block"
                                                                width="100" height="100" />
                                                            <p class="mt-2">Wajah Pucat</p>
                                                        </div>
                                                        <div class="text-center">
                                                            <img src="your-image-source.jpg" class="mx-auto d-block"
                                                                width="100" height="100" />
                                                            <p class="mt-2">Konjungtiva tampak Pucat</p>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="text-center">
                                                            <img src="your-image-source.jpg" class="mx-auto d-block"
                                                                width="100" height="100" />
                                                            <p class="mt-2">Kulit Pucat</p>
                                                        </div>

                                                        <div class="text-center">
                                                            <img src="your-image-source.jpg" class="mx-auto d-block"
                                                                width="100" height="100" />
                                                            <p class="mt-2">Kuku Pucat</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- 7 -->
                            <div class="page mt-8">
                                <div class="main-content">

                                    <div class="d-flex justify-content-center align-items-center mt-4">
                                        <div class="card" style="width: 230px; height: 300px;">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <p class="mt-2">Gambar tablet FE</p>
                                                    <img src="your-image-source.jpg" class="mx-auto d-block"
                                                        width="100" height="100" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>

                                    <h4 class="text-center mt-3">Video</h4>

                                    <br>

                                    <div
                                        class="card-container d-flex justify-content-center align-items-center gap-5 mb-4">
                                        <!-- First Card -->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="text-center">
                                                            <a href="" target="_blank">
                                                                <img src="your-image-source.jpg" class="mx-auto d-block"
                                                                    width="100" height="100" />
                                                            </a>
                                                            <p class="mt-2">Cara mengkonsumsi tablet FE</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Second Card -->
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="text-center">
                                                            <a href="" target="_blank">
                                                                <img src="your-image-source.jpg" class="mx-auto d-block"
                                                                    width="100" height="100" />
                                                            </a>
                                                            <p class="mt-2">Cara mengidentifikasi anemia pada ibu hamil
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
@endsection
