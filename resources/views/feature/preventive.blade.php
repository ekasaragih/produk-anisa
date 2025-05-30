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
            class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-500 mb-6">
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



        <hr class="border-gray-300 my-3">

        <h3 class="text-2xl font-bold text-blue-600 mt-6 mb-4 flex items-center">
            <i class="fa fa-weight mr-2"></i>Pertambahan Berat Badan selama Kehamilan yang Direkomendasikan
        </h3>
        <div class="relative overflow-x-auto rounded-lg shadow-md">
            <table class="table-auto w-full text-sm text-left border-collapse bg-white shadow-inner rounded-lg">
                <thead class="bg-gradient-to-l from-blue-500 to-teal-400 text-white text-md">
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

        <button id="questionnaire-btn" data-modal-target="questionnaire-modal" data-modal-toggle="questionnaire-modal"
            class="mt-5 bg-gradient-to-l from-blue-500 to-teal-400 hover:from-teal-400 hover:to-blue-500 text-white font-bold py-3 px-6 rounded-full shadow-lg transform hover:scale-105 transition-all duration-300">
            <i class="fa fa-edit mr-2"></i>Isi Kuesioner
        </button>

        {{-- Display Latest Kuesioner Result --}}
        @if (session('kuesioner_score'))
        <div class="result bg-green-100 border border-green-400 text-green-700 rounded-lg p-4 mt-6 animate-fade-in">
            <h3 class="text-xl font-bold mb-2">Hasil Kuesioner Terbaru Anda:</h3>
            <p class="text-lg">
                Anda mendapatkan total skor: <strong>{{ session('kuesioner_score') }}</strong>
            </p>
            <p class="mt-2">Nilai ini mencerminkan pola konsumsi gizi Anda. Terus tingkatkan kebiasaan baik!</p>
            {{-- Optionally display individual answers or interpretation here --}}
            <h4 class="mt-4 font-semibold">Detail Jawaban Anda:</h4>
            <div class="overflow-x-auto">
                <table class="questionnaire-table w-full text-sm text-left">
                    <thead>
                        <tr>
                            <th class="py-2 px-3">No</th>
                            <th class="py-2 px-3">Pernyataan</th>
                            <th class="py-2 px-3">Jawaban Anda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('user_kuesioner_answers') as $qKey => $uAnswer)
                        @php
                        $questionNumber = str_replace('q', '', $qKey);
                        // You might want to get the full question text here
                        $questionText = "Pernyataan " . $questionNumber; // Placeholder
                        switch ($questionNumber) {
                        case 1: $questionText = "Saya mengonsumsi nasi/sumber karbohidrat lainnya setiap hari."; break;
                        case 2: $questionText = "Saya mengonsumsi lauk pauk (daging, ikan, telur, tempe, tahu) setiap
                        hari.";
                        break;
                        case 3: $questionText = "Saya mengonsumsi sayuran setiap hari."; break;
                        case 4: $questionText = "Saya mengonsumsi buah-buahan setiap hari."; break;
                        case 5: $questionText = "Saya minum tablet tambah darah (Fe) sesuai anjuran."; break;
                        case 6: $questionText = "Saya menghindari minum teh/kopi setelah makan."; break;
                        case 7: $questionText = "Saya mengonsumsi makanan yang bervariasi setiap hari."; break;
                        case 8: $questionText = "Saya mengonsumsi makanan tinggi zat besi (hati, daging merah, bayam).";
                        break;
                        case 9: $questionText = "Saya mengonsumsi makanan tinggi vitamin C (jeruk, mangga, tomat).";
                        break;
                        case 10: $questionText = "Saya menjaga kebersihan makanan dan minuman yang saya konsumsi.";
                        break;
                        }
                        @endphp
                        <tr>
                            <td class="py-2 px-3">{{ $questionNumber }}</td>
                            <td class="py-2 px-3">{{ $questionText }}</td>
                            <td class="py-2 px-3">{{ $uAnswer ?: 'Tidak Dijawab' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @elseif (isset($latestKuesionerResult))
        <div class="result bg-blue-100 border border-blue-400 text-blue-700 rounded-lg p-4 mt-6 animate-fade-in">
            <h3 class="text-xl font-bold mb-2">Hasil Kuesioner Terakhir Anda:</h3>
            <p class="text-lg">
                Pada {{ \Carbon\Carbon::parse($latestKuesionerResult->created_at)->translatedFormat('d F Y H:i') }},
                Anda
                mendapatkan total skor: <strong>{{ $latestKuesionerResult->score }}</strong>
            </p>
            <p class="mt-2">Nilai ini mencerminkan pola konsumsi gizi Anda. Terus tingkatkan kebiasaan baik!</p>
            <h4 class="mt-4 font-semibold">Detail Jawaban Terakhir Anda:</h4>
            <div class="overflow-x-auto">
                <table class="questionnaire-table w-full text-sm text-left">
                    <thead>
                        <tr>
                            <th class="py-2 px-3">No</th>
                            <th class="py-2 px-3">Pernyataan</th>
                            <th class="py-2 px-3">Jawaban Anda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestKuesionerResult->answers as $qKey => $uAnswer)
                        @php
                        $questionNumber = str_replace('q', '', $qKey);
                        $questionText = "Pernyataan " . $questionNumber; // Placeholder
                        switch ($questionNumber) {
                        case 1: $questionText = "Saya mengonsumsi nasi/sumber karbohidrat lainnya setiap hari."; break;
                        case 2: $questionText = "Saya mengonsumsi lauk pauk (daging, ikan, telur, tempe, tahu) setiap
                        hari.";
                        break;
                        case 3: $questionText = "Saya mengonsumsi sayuran setiap hari."; break;
                        case 4: $questionText = "Saya mengonsumsi buah-buahan setiap hari."; break;
                        case 5: $questionText = "Saya minum tablet tambah darah (Fe) sesuai anjuran."; break;
                        case 6: $questionText = "Saya menghindari minum teh/kopi setelah makan."; break;
                        case 7: $questionText = "Saya mengonsumsi makanan yang bervariasi setiap hari."; break;
                        case 8: $questionText = "Saya mengonsumsi makanan tinggi zat besi (hati, daging merah, bayam).";
                        break;
                        case 9: $questionText = "Saya mengonsumsi makanan tinggi vitamin C (jeruk, mangga, tomat).";
                        break;
                        case 10: $questionText = "Saya menjaga kebersihan makanan dan minuman yang saya konsumsi.";
                        break;
                        }
                        @endphp
                        <tr>
                            <td class="py-2 px-3">{{ $questionNumber }}</td>
                            <td class="py-2 px-3">{{ $questionText }}</td>
                            <td class="py-2 px-3">{{ $uAnswer ?: 'Tidak Dijawab' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>

    {{-- DONT REPLACE THIS PART --}}
    @include('utils.layout.footer')
</div>

{{-- Questionnaire Modal --}}
<div id="questionnaire-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-50 z-40"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full z-50">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Kuesioner Pola Konsumsi Gizi</h3>
                <button type="button" id="close-questionnaire-modal" data-modal-hide="questionnaire-modal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>

            <div class="p-4 md:p-5 overflow-y-auto max-h-[70vh]">
                <form id="kuesionerForm" action="{{ route('preventif.submitKuesioner') }}" method="POST">
                    @csrf

                    <div class="overflow-x-auto">
                        <table class="questionnaire-table w-full border-collapse">
                            <thead>
                                <tr class="bg-gradient-to-l from-blue-500 to-teal-400 text-white text-md">
                                    <th class="py-2 px-3">NO</th>
                                    <th class="py-2 px-3">PERNYATAAN</th>
                                    <th class="py-2 px-3 text-center">SS</th>
                                    <th class="py-2 px-3 text-center">S</th>
                                    <th class="py-2 px-3 text-center">KS</th>
                                    <th class="py-2 px-3 text-center">TS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $questions = [
                                "Saya mengonsumsi nasi/sumber karbohidrat lainnya setiap hari.",
                                "Saya mengonsumsi lauk pauk (daging, ikan, telur, tempe, tahu) setiap hari.",
                                "Saya mengonsumsi sayuran setiap hari.",
                                "Saya mengonsumsi buah-buahan setiap hari.",
                                "Saya minum tablet tambah darah (Fe) sesuai anjuran.",
                                "Saya menghindari minum teh/kopi setelah makan.",
                                "Saya mengonsumsi makanan yang bervariasi setiap hari.",
                                "Saya mengonsumsi makanan tinggi zat besi (hati, daging merah, bayam).",
                                "Saya mengonsumsi makanan tinggi vitamin C (jeruk, mangga, tomat).",
                                "Saya menjaga kebersihan makanan dan minuman yang saya konsumsi.",
                                ];
                                @endphp

                                @for ($i = 0; $i < count($questions); $i++) @php $qNum=$i + 1; @endphp <tr>
                                    <td class="py-2 px-3">{{ $qNum }}</td>
                                    <td class="py-2 px-3">{{ $questions[$i] }}</td>
                                    <td class="py-2 px-3 text-center">
                                        <input type="radio" name="q{{ $qNum }}" value="SS" required>
                                    </td>
                                    <td class="py-2 px-3 text-center">
                                        <input type="radio" name="q{{ $qNum }}" value="S" required>
                                    </td>
                                    <td class="py-2 px-3 text-center">
                                        <input type="radio" name="q{{ $qNum }}" value="KS" required>
                                    </td>
                                    <td class="py-2 px-3 text-center">
                                        <input type="radio" name="q{{ $qNum }}" value="TS" required>
                                    </td>
                                    </tr>
                                    @endfor
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Simpan Kuesioner
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="thankyou-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="modal-overlay fixed inset-0 bg-gray-500 opacity-50 z-40"></div>
    <div class="relative p-4 w-full max-w-2xl max-h-full z-50">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">Kuesioner Pola Konsumsi Gizi</h3>
                <button type="button" id="close-thankyou-modal" data-modal-hide="thankyou-modal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                    </svg>
                    <span class="sr-only">Tutup</span>
                </button>
            </div>
            <div class="p-4 md:p-5 overflow-y-auto max-h-[70vh]">
                <h2 class="text-xl font-bold mb-2">Terima Kasih!</h2>
                <p class="mb-4">Terima kasih telah mengisi kuesioner. Berikut beberapa saran pola konsumsi gizi yang
                    baik untuk ibu
                    hamil agar terhindar dari anemia:</p>
                <ul class="list-disc ml-6 mb-4">
                    <li>Konsumsi makanan kaya zat besi seperti daging merah, hati, dan bayam.</li>
                    <li>Perbanyak asupan vitamin C dari jeruk, mangga, dan tomat untuk membantu penyerapan zat besi.
                    </li>
                    <li>Hindari minum teh atau kopi setelah makan karena dapat menghambat penyerapan zat besi.</li>
                    <li>Konsumsi suplemen zat besi sesuai anjuran dokter.</li>
                    <li>Perbanyak makanan kaya asam folat seperti alpukat, brokoli, dan kacang-kacangan.</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- Modal Control (Flowbite-like) ---
        const questionnaireModal = document.getElementById('questionnaire-modal');
        const thankyouModal = document.getElementById('thankyou-modal');
        const questionnaireBtn = document.getElementById('questionnaire-btn');
        const closeQuestionnaireModalBtn = document.getElementById('close-questionnaire-modal');
        const closeThankyouModalBtn = document.getElementById('close-thankyou-modal');

        function showModal(modalElement) {
            modalElement.classList.remove('hidden');
            modalElement.setAttribute('aria-hidden', 'false');
            document.body.classList.add('overflow-hidden'); // Prevent scrolling body
        }

        function hideModal(modalElement) {
            modalElement.classList.add('hidden');
            modalElement.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('overflow-hidden');
        }

        if (questionnaireBtn) {
            questionnaireBtn.addEventListener('click', () => showModal(questionnaireModal));
        }
        if (closeQuestionnaireModalBtn) {
            closeQuestionnaireModalBtn.addEventListener('click', () => hideModal(questionnaireModal));
        }
        if (closeThankyouModalBtn) {
            closeThankyouModalBtn.addEventListener('click', () => hideModal(thankyouModal));
        }

        // Handle modal closing when clicking outside
        questionnaireModal.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay')) {
                hideModal(questionnaireModal);
            }
        });
        thankyouModal.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay')) {
                hideModal(thankyouModal);
            }
        });

        // --- SweetAlert2 for success/error ---
        @if(session('kuesioner_score'))
            Swal.fire({
                icon: 'success',
                title: 'Kuesioner Berhasil Disimpan!',
                text: 'Terima kasih telah mengisi kuesioner Anda.',
                showConfirmButton: false,
                timer: 3000
            }).then(() => {
                // Optionally show the thank you modal after SweetAlert
                // showModal(thankyouModal); // This would require managing its display in PHP first
            });
        @endif
    });
</script>
@endsection