@extends('utils.layout.sidebar')

@section('head')
<style>
</style>
@endsection

@section('content')
@include('utils.layout.topnav', ['title' => 'Preventif'])
<div class="container mx-auto py-4 px-2">
    <div class="p-4 bg-gray-100 rounded-lg shadow-md">
        <div class="page p-6 bg-white border border-gray-300 rounded-lg">
            <h2 class="text-2xl font-semibold text-blue-700 mb-4">Pencegahan Anemia pada Kehamilan</h2>
            <p class="text-base leading-relaxed mb-4">
                Anemia dalam kehamilan dapat dicegah melalui pola konsumsi gizi yang baik. Pemenuhan mikronutrien
                seperti
                asam folat, zat besi, dan vitamin D sangat penting untuk mencegah cacat lahir, anemia, serta komplikasi
                lain
                seperti diabetes gestasional dan preeklamsia. Selain itu, asupan protein, asam lemak omega-3, serat, dan
                probiotik juga berperan penting dalam menjaga kesehatan ibu dan perkembangan janin.
            </p>
            <p class="text-base leading-relaxed mb-4">
                Kekurangan gizi, terutama di daerah berpenghasilan rendah, dapat meningkatkan risiko kelahiran prematur
                dan
                berat lahir rendah. Maka, penting untuk menjaga pola makan ibu hamil yang seimbang, termasuk
                memperhatikan
                asupan zat besi, asam folat, dan vitamin D. Pemeriksaan status gizi dapat dilakukan dengan mengukur IMT
                dan
                mengikuti pedoman kenaikan berat badan yang tepat.
            </p>
            <p class="text-base leading-relaxed mb-4">
                Berbagai penelitian menunjukkan bahwa evaluasi status gizi yang akurat melalui pengukuran antropometri
                dan
                tes laboratorium dapat membantu mengurangi risiko komplikasi. Misalnya, LiLA yang kurang dari 23,5 cm
                dapat
                menunjukkan risiko Kurang Energi Kronis (KEK) pada ibu hamil.
            </p>

            <button id="questionnaire-btn" data-modal-target="questionnaire-modal"
                data-modal-toggle="questionnaire-modal"
                class="mt-2 mb-4 bg-[#118B50] hover:bg-[#5DB996] duration-200 ease-in-out text-white font-bold py-2 px-4 rounded">
                Isi kuesioner
            </button>

            <h3 class="text-lg font-semibold text-blue-700 mt-8 mb-4">Pertambahan Berat Badan selama Kehamilan
                yang Direkomendasikan</h3>
            <div class="relative overflow-x-auto">
                <table class="table-auto w-full text-sm text-left border-collapse">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="border px-4 py-2">IMT Sebelum Hamil</th>
                            <th class="border px-4 py-2">Pertambahan BB Total</th>
                            <th class="border px-4 py-2">Pertambahan BB per Minggu pada Trimester 2 dan 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Kurus (<18.5 kg/m²)</td>
                            <td class="border px-4 py-2">12.5 – 18 kg</td>
                            <td class="border px-4 py-2">0.5 kg</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border px-4 py-2">Normal (18.5 – 24.9 kg/m²)</td>
                            <td class="border px-4 py-2">11.5 – 16 kg</td>
                            <td class="border px-4 py-2">0.4 kg</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Gemuk (25.0 – 29.9 kg/m²)</td>
                            <td class="border px-4 py-2">7 – 11.5 kg</td>
                            <td class="border px-4 py-2">0.3 kg</td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="border px-4 py-2">Obesitas (>30.0 kg/m²)</td>
                            <td class="border px-4 py-2">5 – 9 kg</td>
                            <td class="border px-4 py-2">0.2 kg</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3 class="text-lg font-semibold text-blue-700 mt-8 mb-4">Kebutuhan Makro Mineral Pada Ibu Hamil</h3>
            <p class="mb-4 text-base">
                a. Angka Kecukupan Energi, Protein, Lemak, Karbohidrat, Serat, dan Air
                yang Dianjurkan untuk Perempuan, Ibu Hamil, dan Menyusui
                (Kementerian Kesehatan RI, 2019)
            </p>
            <img src="{{ asset('assets/Angka_Kecukupan_Energi.jpeg') }}" alt="">


            <h3 class="text-lg font-semibold text-blue-700 mt-8 mb-4">Kebutuhan Mikro Mineral Pada Ibu Hamil</h3>

            <p class="text-gray-700 mb-4">
                Rekomendasi asupan zat gizi mikro untuk perempuan hamil menurut usia kehamilan berdasarkan
                <strong>Angka Kecukupan Gizi (AKG) Tahun 2019</strong>. Secara umum, ibu hamil membutuhkan tambahan
                vitamin A, berbagai vitamin B, dan vitamin C. Sedangkan kebutuhan mineral yang meningkat selama
                kehamilan adalah <strong>Ca, Besi, Iodium, Seng, Selenium, Mangan, Chromium</strong>, dan
                <strong>Tembaga</strong>. Secara rinci, kebutuhan beberapa jenis zat gizi mikro Ibu Hamil dapat
                dijelaskan sebagai berikut:
            </p>

            <ol class="list-decimal list-inside text-gray-700 mb-4 space-y-2">
                <li><strong>Zat Besi</strong></li>
                <li><strong>Asam Folat</strong></li>
                <li><strong>Vitamin A</strong></li>
                <li>
                    <strong>Kalsium</strong><br>
                    <span class="ml-4">
                        Sumber utama Kalsium dalam makanan adalah susu, sereal, dan sayur.
                    </span>
                </li>
                <li>
                    <strong>Probiotik dan Prebiotik</strong><br>
                    <span class="ml-4">
                        Adapun prebiotik umumnya didapatkan dari gandum utuh, kedelai, pisang, bawang merah, bombay,
                        bawang putih, dan madu (<em>P. Gluckman, Hanson, Seng, & Bardsley, 2015</em>).
                    </span>
                </li>
            </ol>
            <div class=" mx-auto p-4 bg-white shadow-lg rounded-xl border border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- First Image -->
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('assets/Angka_Kecukupan_Vitamin.jpeg') }}" alt="Angka Kecukupan Vitamin"
                            class="w-full object-cover transition-transform duration-300 hover:scale-105">
                    </div>

                    <!-- Second Image -->
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('assets/Angka_Kecukupan_Mineral.jpeg') }}" alt="Angka Kecukupan Mineral"
                            class="w-full object-cover transition-transform duration-300 hover:scale-105">
                    </div>
                </div>
            </div>
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
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">kuesioner Pola Konsumsi Gizi</h3>
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