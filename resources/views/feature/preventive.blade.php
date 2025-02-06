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
@include('utils.layout.topnav', ['title' => 'Preventif'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        <h2
            class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-pink-500 mb-6">
            Pencegahan Anemia pada Kehamilan</h2>
        <p class="text-base leading-relaxed text-gray-700 mb-6">Anemia dalam kehamilan dapat dicegah melalui pola
            konsumsi gizi yang baik. Pemenuhan mikronutrien seperti asam folat, zat besi, dan vitamin D sangat
            penting untuk mencegah cacat lahir, anemia, serta komplikasi lain seperti diabetes gestasional dan
            preeklamsia. Selain itu, asupan protein, asam lemak omega-3, serat, dan probiotik juga berperan penting
            dalam menjaga kesehatan ibu dan perkembangan janin.</p>
        <p class="text-base leading-relaxed text-gray-700 mb-6">Kekurangan gizi, terutama di daerah berpenghasilan
            rendah, dapat meningkatkan risiko kelahiran prematur dan berat lahir rendah. Maka, penting untuk menjaga
            pola makan ibu hamil yang seimbang, termasuk memperhatikan asupan zat besi, asam folat, dan vitamin D.
            Pemeriksaan status gizi dapat dilakukan dengan mengukur IMT dan mengikuti pedoman kenaikan berat badan
            yang tepat.</p>
        <p class="text-base leading-relaxed text-gray-700 mb-3">Berbagai penelitian menunjukkan bahwa evaluasi status
            gizi yang akurat melalui pengukuran antropometri dan tes laboratorium dapat membantu mengurangi risiko
            komplikasi. Misalnya, LiLA yang kurang dari 23,5 cm dapat menunjukkan risiko Kurang Energi Kronis (KEK)
            pada ibu hamil.</p>

        <button id="questionnaire-btn" data-modal-target="questionnaire-modal" data-modal-toggle="questionnaire-modal"
            class="my-2 bg-gradient-to-r from-blue-500 to-pink-400 hover:pink-teal-400 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-full shadow-lg transform hover:scale-105 transition-all duration-300">
            <i class="fa fa-edit mr-2"></i>Isi Kuesioner
        </button>

        <hr class="border-gray-300 my-3">

        <h3 class="text-2xl font-bold text-blue-600 mt-6 mb-4 flex items-center">
            <i class="fa fa-weight mr-2"></i>Pertambahan Berat Badan selama Kehamilan yang Direkomendasikan
        </h3>
        <div class="relative overflow-x-auto rounded-lg shadow-md">
            <table class="table-auto w-full text-sm text-left border-collapse bg-white shadow-inner rounded-lg">
                <thead class="bg-gradient-to-r from-blue-500 to-pink-400 text-white text-md">
                    <tr>
                        <th class="border px-4 py-3">IMT Sebelum Hamil</th>
                        <th class="border px-4 py-3">Pertambahan BB Total</th>
                        <th class="border px-4 py-3">Pertambahan BB per Minggu pada Trimester 2 dan 3</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-100 transition-colors">
                        <td class="border px-4 py-3">Kurus (&lt;18.5 kg/m²)</td>
                        <td class="border px-4 py-3">12.5 – 18 kg</td>
                        <td class="border px-4 py-3">0.5 kg</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100 transition-colors">
                        <td class="border px-4 py-3">Normal (18.5 – 24.9 kg/m²)</td>
                        <td class="border px-4 py-3">11.5 – 16 kg</td>
                        <td class="border px-4 py-3">0.4 kg</td>
                    </tr>
                    <tr class="hover:bg-gray-100 transition-colors">
                        <td class="border px-4 py-3">Gemuk (25.0 – 29.9 kg/m²)</td>
                        <td class="border px-4 py-3">7 – 11.5 kg</td>
                        <td class="border px-4 py-3">0.3 kg</td>
                    </tr>
                    <tr class="bg-gray-50 hover:bg-gray-100 transition-colors">
                        <td class="border px-4 py-3">Obesitas (&gt;30.0 kg/m²)</td>
                        <td class="border px-4 py-3">5 – 9 kg</td>
                        <td class="border px-4 py-3">0.2 kg</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <h3 class="text-2xl font-bold text-blue-600 mt-8 mb-4 flex items-center">
            <i class="fa fa-apple-alt mr-2"></i>Kebutuhan Makro Mineral Pada Ibu Hamil
        </h3>
        <p class="mb-4 text-lg text-gray-700">Angka Kecukupan Energi, Protein, Lemak, Karbohidrat, Serat, dan Air
            yang Dianjurkan untuk Perempuan, Ibu Hamil, dan Menyusui (Kementerian Kesehatan RI, 2019)</p>
        <div class="overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
            <img src="{{ asset('assets/Angka_Kecukupan_Energi.jpeg') }}" alt="Angka Kecukupan Energi"
                class="w-full object-cover rounded-xl hover:scale-105 transition-transform duration-300">
        </div>

        <h3 class="text-2xl font-bold text-blue-600 mt-8 mb-4 flex items-center">
            <i class="fa fa-vial mr-2"></i>Kebutuhan Mikro Mineral Pada Ibu Hamil
        </h3>
        <p class="text-lg text-gray-700 mb-6">Rekomendasi asupan zat gizi mikro untuk perempuan hamil menurut usia
            kehamilan berdasarkan <strong>Angka Kecukupan Gizi (AKG) Tahun 2019</strong>. Secara umum, ibu hamil
            membutuhkan tambahan vitamin A, berbagai vitamin B, dan vitamin C. Sedangkan kebutuhan mineral yang
            meningkat selama kehamilan adalah <strong>Ca, Besi, Iodium, Seng, Selenium, Mangan, Chromium</strong>,
            dan <strong>Tembaga</strong>.</p>

        <ol class="list-decimal list-inside text-gray-700 mb-4 space-y-2">
            <li><strong>Zat Besi</strong></li>
            <li><strong>Asam Folat</strong></li>
            <li><strong>Vitamin A</strong></li>
            <li><strong>Kalsium</strong><br><span class="ml-4 text-gray-600">Sumber utama Kalsium dalam makanan
                    adalah susu, sereal, dan sayur.</span></li>
            <li><strong>Probiotik dan Prebiotik</strong><br><span class="ml-4 text-gray-600">Prebiotik didapatkan
                    dari gandum utuh, kedelai, pisang, bawang merah, bombay, bawang putih, dan madu (<em>P.
                        Gluckman, Hanson, Seng, & Bardsley, 2015</em>).</span></li>
        </ol>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
            <div class="overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('assets/Angka_Kecukupan_Vitamin.jpeg') }}" alt="Angka Kecukupan Vitamin"
                    class="w-full object-cover hover:scale-105 transition-transform duration-300">
            </div>
            <div class="overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                <img src="{{ asset('assets/Angka_Kecukupan_Mineral.jpeg') }}" alt="Angka Kecukupan Mineral"
                    class="w-full object-cover hover:scale-105 transition-transform duration-300">
            </div>
        </div>

        <h3 class="text-2xl font-bold text-blue-600 mt-8 mb-4 flex items-center">
            <i class="fa fa-seedling mr-2"></i>Pemenuhan Gizi Pada Ibu Hamil
        </h3>
        <p class="mb-4 text-lg text-gray-700">Menurut Kementerian Kesehatan RI (2014), Pedoman Gizi Seimbang terdiri
            dari 4 Pilar untuk menjaga keseimbangan asupan dan menjaga imunitas tubuh: 1) Mengonsumsi anekaragam
            pangan; 2) Membiasakan Perilaku Hidup Bersih; 3) Melakukan Aktivitas Fisik; 4) Memantau Berat Badan
            secara Teratur.</p>
        <div
            class="flex flex-col md:flex-row items-center gap-6 p-4 bg-white shadow-lg rounded-xl border border-gray-200">
            <!-- Image on the Left -->
            <div
                class="w-full md:w-1/2 overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300">
                <img src="https://cms.gooddoctor.co.id/wp-content/uploads/2021/02/tumpeng-gizi-seimbang.png"
                    alt="Tumpeng Gizi Seimbang"
                    class="w-full h-auto object-cover hover:scale-105 transition-transform duration-300">
            </div>

            <!-- Text on the Right -->
            <div class="w-full md:w-1/2">
                <p class="text-lg text-gray-700 leading-relaxed">
                    <strong>Tumpeng Gizi Seimbang</strong> menekankan keragaman dan proporsi pangan,
                    sedangkan <strong>ISI PIRINGKU</strong> memberikan panduan langsung untuk proporsi makanan setiap
                    kali
                    makan.
                </p>
            </div>
        </div>
    </div>




    {{-- DONT REPLACE THIS PART --}}
    @include('utils.layout.footer')
</div>

<div id="questionnaire-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-50 z-40"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full z-50">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Kuesioner Pola Konsumsi Gizi</h3>
                <button type="button" id="close-questionnaire-modal" data-modal-hide="questionnaire-modal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>

            <div class="p-4 md:p-5 overflow-y-auto max-h-[70vh]">
                <form action="" method="POST">
                    @csrf

                    <!-- Frekuensi Makan Karbohidrat -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Seberapa sering Anda mengonsumsi nasi,
                            roti, atau sumber karbohidrat lainnya dalam sehari?</label>
                        <select name="karbohidrat_frequency"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="1">1 kali</option>
                            <option value="2">2 kali</option>
                            <option value="3">3 kali atau lebih</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Seberapa sering Anda mengonsumsi gandum
                            utuh atau makanan berserat tinggi?</label>
                        <select name="karbohidrat_frequency"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="1">1 kali</option>
                            <option value="2">2 kali</option>
                            <option value="3">3 kali atau lebih</option>
                        </select>
                    </div>

                    <!-- Asupan Protein -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Berapa kali dalam seminggu Anda
                            mengonsumsi daging merah (sapi, kambing)?</label>
                        <input type="number" name="daging_merah_frequency" min="0"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Berapa kali dalam seminggu Anda
                            mengonsumsi ayam atau ikan?</label>
                        <input type="number" name="daging_merah_frequency" min="0"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Apakah Anda mengonsumsi kacang-kacangan
                            atau tahu/tempe secara rutin?</label>
                        <select name="karbohidrat_frequency"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>
                    </div>

                    <!-- Konsumsi Sayur -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Seberapa sering Anda mengonsumsi sayur
                            hijau seperti bayam, kangkung, atau brokoli?</label>
                        <select name="sayur_frequency"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="daily">Setiap hari</option>
                            <option value="few_times_week">2-3 kali seminggu</option>
                            <option value="rarely">Jarang</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Berapa porsi buah yang Anda konsumsi
                            setiap hari?</label>
                        <input type="number" name="air_putih" min="0"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            required>
                    </div>

                    <!-- Konsumsi Air -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Berapa gelas air putih yang Anda minum
                            setiap hari?</label>
                        <input type="number" name="air_putih" min="0"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Berapa kali Anda makan dalam sehari
                            (termasuk camilan)?</label>
                        <input type="number" name="air_putih" min="0"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Apakah Anda sering melewatkan waktu
                            makan? Jika ya, waktu makan apa yang sering dilewatkan?</label>
                        <input type="text" name="air_putih" min="0"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            required>
                    </div>

                    <!-- Asupan Vitamin -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Apakah Anda rutin mengonsumsi suplemen
                            vitamin atau mineral?</label>
                        <textarea name="vitamin_suplemen" rows="2"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Contoh: Vitamin C, Asam Folat, Zat Besi"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Seberapa sering Anda mengonsumsi makanan
                            yang kaya akan vitamin C (jeruk, stroberi)?</label>
                        <select name="sayur_frequency"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            <option value="daily">Setiap hari</option>
                            <option value="few_times_week">2-3 kali seminggu</option>
                            <option value="rarely">Jarang</option>
                        </select>
                    </div>

                    <!-- Alergi Makanan -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Apakah Anda memiliki alergi terhadap
                            makanan tertentu?</label>
                        <textarea name="alergi_makanan" rows="2"
                            class="block w-full rounded-md border-0 py-2 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Contoh: Kacang, Seafood, Susu"></textarea>
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan kuesioner
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

@endsection