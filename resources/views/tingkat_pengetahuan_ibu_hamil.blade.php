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

    .question {
        margin-bottom: 1.5rem;
    }

    .result {
        display: none;
        margin-top: 2rem;
        padding: 1rem;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        background-color: #e5e7eb;
    }
</style>
@endsection

@section('content')
@include('utils.layout.topnav', ['title' => 'Tingkat Pengetahuan Ibu Hamil'])
<div class="container mx-auto pb-8 px-4 min-h-screen">
    <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
        @guest
        <div class="p-4 text-center bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-lg mb-3">
            <p>Kamu belum login. <a href="{{ route('user.login') }}" class="text-blue-600 font-bold">Login</a> untuk
                melihat
                lebih banyak.</p>
        </div>
        @endguest

        <h2
            class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-500 mb-6">
            Tingkat Pengetahuan Ibu Hamil</h2>

        <div class="container mx-auto pb-8 px-1 md:px-4 min-h-screen">
            <div class="page p-6 md:p-8 bg-white rounded-2xl shadow-lg border border-blue-300 animate-fade-in">
                <form id="quizForm">
                    <div class="question">
                        <p>1. Anemia pada kehamilan adalah...</p>
                        <label><input type="radio" name="q1" value="a"> a. Kadar Hemoglobin (Hb) lebih dari 12
                            gr%</label><br>
                        <label><input type="radio" name="q1" value="b"> b. Kadar Hemoglobin (Hb) kurang dari 11
                            gr%</label><br>
                        <label><input type="radio" name="q1" value="c"> c. Kadar Hemoglobin (Hb) kurang dari 12
                            gr%</label>
                    </div>

                    <div class="question">
                        <p>2. Anemia defisiensi besi adalah...</p>
                        <label><input type="radio" name="q2" value="a"> a. Anemia karena kekurangan zat
                            besi</label><br>
                        <label><input type="radio" name="q2" value="b"> b. Anemia karena kekurangan vitamin
                            B12</label><br>
                        <label><input type="radio" name="q2" value="c"> c. Anemia karena kekurangan asam folat</label>
                    </div>

                    <div class="question">
                        <p>3. Tanda dan gejala anemia adalah...</p>
                        <label><input type="radio" name="q3" value="a"> a. Muntah – muntah</label><br>
                        <label><input type="radio" name="q3" value="b"> b. Sering buang air kecil</label><br>
                        <label><input type="radio" name="q3" value="c"> c. Lemah dan kurang nafsu makan</label>
                    </div>

                    <div class="question">
                        <p>4. Tanda-tanda anemia bisa dilihat dari...</p>
                        <label><input type="radio" name="q4" value="a"> a. Bagian dalam kelopak mata, bibir, dan muka
                            tampak pucat</label><br>
                        <label><input type="radio" name="q4" value="b"> b. Badan tampak kurus</label><br>
                        <label><input type="radio" name="q4" value="c"> c. Kaki bengkak</label>
                    </div>

                    <div class="question">
                        <p>5. Kepala pusing, mata berkunang-kunang, jantung berdenyut lebih cepat dan peningkatan denyut
                            nadi termasuk tanda dan gejala dari...</p>
                        <label><input type="radio" name="q5" value="a"> a. Kurang gizi</label><br>
                        <label><input type="radio" name="q5" value="b"> b. Anemia</label><br>
                        <label><input type="radio" name="q5" value="c"> c. Kecapekan</label>
                    </div>

                    <div class="question">
                        <p>6. Pada ibu yang hamil muda anemia bisa menyebabkan...</p>
                        <label><input type="radio" name="q6" value="a"> a. Persalinan macet</label><br>
                        <label><input type="radio" name="q6" value="b"> b. Kecelakaan</label><br>
                        <label><input type="radio" name="q6" value="c"> c. Keguguran</label>
                    </div>

                    <div class="question">
                        <p>7. Dampak anemia bagi ibu yang melahirkan yaitu...</p>
                        <label><input type="radio" name="q7" value="a"> a. Bayi prematur</label><br>
                        <label><input type="radio" name="q7" value="b"> b. Persalinan lancar</label><br>
                        <label><input type="radio" name="q7" value="c"> c. Persalinan macet</label>
                    </div>

                    <div class="question">
                        <p>8. Dampak anemia bagi janin adalah...</p>
                        <label><input type="radio" name="q8" value="a"> a. Ancaman penyakit jantung</label><br>
                        <label><input type="radio" name="q8" value="b"> b. Perdarahan</label><br>
                        <label><input type="radio" name="q8" value="c"> c. Janin tumbuh lambat/stunting</label>
                    </div>

                    <div class="question">
                        <p>9. Dampak anemia pada ibu nifas adalah...</p>
                        <label><input type="radio" name="q9" value="a"> a. Infeksi</label><br>
                        <label><input type="radio" name="q9" value="b"> b. Bayi prematur</label><br>
                        <label><input type="radio" name="q9" value="c"> c. Terjadi gangguan his</label>
                    </div>

                    <div class="question">
                        <p>10. Pengobatan anemia pada ibu hamil yaitu dengan diberikan...</p>
                        <label><input type="radio" name="q10" value="a"> a. Tablet tambah darah (Fe)</label><br>
                        <label><input type="radio" name="q10" value="b"> b. Vitamin A</label><br>
                        <label><input type="radio" name="q10" value="c"> c. Vitamin C</label>
                    </div>

                    <div class="question">
                        <p>11. Tablet tambah darah dapat diminum setiap...</p>
                        <label><input type="radio" name="q11" value="a"> a. 1 kali sehari selama kehamilan</label><br>
                        <label><input type="radio" name="q11" value="b"> b. 3 kali sehari selama kehamilan</label><br>
                        <label><input type="radio" name="q11" value="c"> c. 2 hari sekali selama kehamilan</label>
                    </div>

                    <div class="question">
                        <p>12. Tablet tambah darah sebaiknya diminum dengan...</p>
                        <label><input type="radio" name="q12" value="a"> a. Air jeruk</label><br>
                        <label><input type="radio" name="q12" value="b"> b. Air susu</label><br>
                        <label><input type="radio" name="q12" value="c"> c. Air teh manis</label>
                    </div>

                    <div class="question">
                        <p>13. Kapan sebaiknya ibu hamil meminum tablet besi...</p>
                        <label><input type="radio" name="q13" value="a"> a. Sebelum tidur malam</label><br>
                        <label><input type="radio" name="q13" value="b"> b. Setelah bangun tidur</label><br>
                        <label><input type="radio" name="q13" value="c"> c. Pagi hari sebelum sarapan</label>
                    </div>

                    <div class="question">
                        <p>14. Kapan ibu hamil memeriksakan Hemoglobin (Hb)...</p>
                        <label><input type="radio" name="q14" value="a"> a. Trimester I dan Trimester III</label><br>
                        <label><input type="radio" name="q14" value="b"> b. Trimester II</label><br>
                        <label><input type="radio" name="q14" value="c"> c. Trimester I, Trimester II, dan Trimester
                            III</label>
                    </div>

                    <div class="question">
                        <p>15. Berapa kali sebaiknya ibu hamil memeriksakan Hb selama kehamilan...</p>
                        <label><input type="radio" name="q15" value="a"> a. 1 kali</label><br>
                        <label><input type="radio" name="q15" value="b"> b. 2 kali</label><br>
                        <label><input type="radio" name="q15" value="c"> c. 3 kali</label>
                    </div>

                    <div class="question">
                        <p>16. Berapa jumlah tablet besi yang diberikan selama kehamilan...</p>
                        <label><input type="radio" name="q16" value="a"> a. 80 tablet</label><br>
                        <label><input type="radio" name="q16" value="b"> b. 90 tablet</label><br>
                        <label><input type="radio" name="q16" value="c"> c. 100 tablet</label>
                    </div>

                    <div class="question">
                        <p>17. Efek samping yang mungkin dirasakan ibu hamil setelah meminum tablet besi...</p>
                        <label><input type="radio" name="q17" value="a"> a. Mual</label><br>
                        <label><input type="radio" name="q17" value="b"> b. Pusing</label><br>
                        <label><input type="radio" name="q17" value="c"> c. Nyeri</label>
                    </div>

                    <div class="question">
                        <p>18. Sayuran apakah yang paling banyak mengandung zat besi...</p>
                        <label><input type="radio" name="q18" value="a"> a. Bayam</label><br>
                        <label><input type="radio" name="q18" value="b"> b. Labu</label><br>
                        <label><input type="radio" name="q18" value="c"> c. Daun katuk</label>
                    </div>

                    <div class="question">
                        <p>19. Yang dimaksud dari menu seimbang untuk ibu hamil terdiri dari ?</p>
                        <label><input type="radio" name="q19" value="a"> a. Nasi, ikan, tempe, sayuran buah</label><br>
                        <label><input type="radio" name="q19" value="b"> b. Nasi, dan ikan</label><br>
                        <label><input type="radio" name="q19" value="c"> c. Nasi dan sayuran</label>
                    </div>

                    <div class="question">
                        <p>20. Sumber makanan dan minuman untuk mencegah anemia adalah ?</p>
                        <label><input type="radio" name="q20" value="a"> a. Hati, daging, ayam ikan, minuman/jus
                            buah</label><br>
                        <label><input type="radio" name="q20" value="b"> b. Sayur bayam dan susu</label><br>
                        <label><input type="radio" name="q20" value="c"> c. Kacang, teh dan kopi</label>
                    </div>

                    <button type="button" onclick="checkAnswers()"
                        class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Kirim
                        Jawaban</button>
                </form>

                <div id="result" class="result">
                    <h3 class="text-xl font-bold mb-2">Hasil Pengetahuan Anda:</h3>
                    <p id="resultText"></p>
                    <h4 class="mt-4 font-semibold">Pencegahan Anemia:</h4>
                    <ul>
                        <li>1. Mengonsumsi makanan kaya zat besi seperti daging merah, hati, bayam, dan kacang-kacangan.
                        </li>
                        <li>2. Mengonsumsi suplemen zat besi sesuai anjuran dokter.</li>
                        <li>3. Memeriksa kadar hemoglobin secara berkala selama kehamilan.</li>
                        <li>4. Menghindari konsumsi teh atau kopi berlebihan yang menghambat penyerapan zat besi.</li>
                    </ul>
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
    <script>
        function checkAnswers() {
            const answers = {
                q1: 'b',
                q2: 'a',
                q3: 'c',
                q4: 'a',
                q5: 'b',
                q6: 'c',
                q7: 'c',
                q8: 'c',
                q9: 'a',
                q10: 'a',
                q11: 'a',
                q12: 'a',
                q13: 'a',
                q14: 'a',
                q15: 'b',
                q16: 'b',
                q17: 'a',
                q18: 'a',
                q19: 'a',
                q20: 'a'
            };

            let score = 0;
            for (let key in answers) {
                const selected = document.querySelector(`input[name='${key}']:checked`);
                if (selected && selected.value === answers[key]) {
                    score++;
                }
            }

            const resultText = document.getElementById('resultText');
            const resultDiv = document.getElementById('result');

            if (score >= 17) {
                resultText.innerText = `Selamat! Pengetahuan Anda sangat baik dengan skor ${score}/20.`;
            } else if (score >= 13) {
                resultText.innerText = `Pengetahuan Anda cukup baik dengan skor ${score}/20. Perlu menambah wawasan!`;
            } else {
                resultText.innerText = `Pengetahuan Anda masih kurang dengan skor ${score}/20. Silakan pelajari lebih lanjut tentang anemia dan pencegahannya.`;
            }

            resultDiv.style.display = 'block';
        }
    </script>

    @endsection