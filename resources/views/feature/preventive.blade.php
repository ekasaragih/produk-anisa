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
            <p class="text-lg leading-relaxed mb-4">
                Anemia dalam kehamilan dapat dicegah melalui pola konsumsi gizi yang baik. Pemenuhan mikronutrien
                seperti
                asam folat, zat besi, dan vitamin D sangat penting untuk mencegah cacat lahir, anemia, serta komplikasi
                lain
                seperti diabetes gestasional dan preeklamsia. Selain itu, asupan protein, asam lemak omega-3, serat, dan
                probiotik juga berperan penting dalam menjaga kesehatan ibu dan perkembangan janin.
            </p>
            <p class="text-lg leading-relaxed mb-4">
                Kekurangan gizi, terutama di daerah berpenghasilan rendah, dapat meningkatkan risiko kelahiran prematur
                dan
                berat lahir rendah. Maka, penting untuk menjaga pola makan ibu hamil yang seimbang, termasuk
                memperhatikan
                asupan zat besi, asam folat, dan vitamin D. Pemeriksaan status gizi dapat dilakukan dengan mengukur IMT
                dan
                mengikuti pedoman kenaikan berat badan yang tepat.
            </p>
            <p class="text-lg leading-relaxed mb-4">
                Berbagai penelitian menunjukkan bahwa evaluasi status gizi yang akurat melalui pengukuran antropometri
                dan
                tes laboratorium dapat membantu mengurangi risiko komplikasi. Misalnya, LiLA yang kurang dari 23,5 cm
                dapat
                menunjukkan risiko Kurang Energi Kronis (KEK) pada ibu hamil.
            </p>

            <h3 class="text-xl font-semibold text-blue-700 mt-8 mb-4">Tabel 1. Pertambahan Berat Badan selama Kehamilan
                yang
                Direkomendasikan</h3>
            <table class="table-auto w-full text-sm text-left border-collapse">
                <thead>
                    <tr class="bg-blue-600 text-white">
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