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
                        <p>1. Apa yang dimaksud dengan anemia?</p>
                        <label><input type="radio" name="q1" value="benar"> Kekurangan sel darah merah</label><br>
                        <label><input type="radio" name="q1" value="salah"> Kelebihan sel darah merah</label>
                    </div>

                    <div class="question">
                        <p>2. Makanan apa yang kaya zat besi untuk mencegah anemia?</p>
                        <label><input type="radio" name="q2" value="benar"> Bayam dan daging merah</label><br>
                        <label><input type="radio" name="q2" value="salah"> Permen dan keripik</label>
                    </div>

                    <div class="question">
                        <p>3. Apakah suplemen zat besi disarankan untuk ibu hamil?</p>
                        <label><input type="radio" name="q3" value="benar"> Ya, sesuai anjuran dokter</label><br>
                        <label><input type="radio" name="q3" value="salah"> Tidak, suplemen tidak penting</label>
                    </div>

                    <div class="question">
                        <p>4. Apa gejala umum anemia?</p>
                        <label><input type="radio" name="q4" value="benar"> Lelah dan pusing</label><br>
                        <label><input type="radio" name="q4" value="salah"> Kaki bengkak</label>
                    </div>

                    <div class="question">
                        <p>5. Apa peran zat besi dalam tubuh?</p>
                        <label><input type="radio" name="q5" value="benar"> Membantu produksi hemoglobin</label><br>
                        <label><input type="radio" name="q5" value="salah"> Menambah berat badan</label>
                    </div>

                    <div class="question">
                        <p>6. Minuman apa yang menghambat penyerapan zat besi?</p>
                        <label><input type="radio" name="q6" value="benar"> Teh dan kopi</label><br>
                        <label><input type="radio" name="q6" value="salah"> Air putih</label>
                    </div>

                    <div class="question">
                        <p>7. Vitamin apa yang membantu penyerapan zat besi?</p>
                        <label><input type="radio" name="q7" value="benar"> Vitamin C</label><br>
                        <label><input type="radio" name="q7" value="salah"> Vitamin D</label>
                    </div>

                    <div class="question">
                        <p>8. Kapan waktu terbaik mengonsumsi suplemen zat besi?</p>
                        <label><input type="radio" name="q8" value="benar"> Pagi hari saat perut kosong</label><br>
                        <label><input type="radio" name="q8" value="salah"> Malam hari sebelum tidur</label>
                    </div>

                    <div class="question">
                        <p>9. Apa yang harus dilakukan jika mengalami gejala anemia?</p>
                        <label><input type="radio" name="q9" value="benar"> Konsultasi ke dokter</label><br>
                        <label><input type="radio" name="q9" value="salah"> Minum air putih lebih banyak</label>
                    </div>

                    <div class="question">
                        <p>10. Mengapa ibu hamil lebih rentan terkena anemia?</p>
                        <label><input type="radio" name="q10" value="benar"> Karena peningkatan volume darah</label><br>
                        <label><input type="radio" name="q10" value="salah"> Karena kekurangan kalsium</label>
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
                q1: 'benar',
                q2: 'benar',
                q3: 'benar',
                q4: 'benar',
                q5: 'benar',
                q6: 'benar',
                q7: 'benar',
                q8: 'benar',
                q9: 'benar',
                q10: 'benar'
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

            if (score === 10) {
                resultText.innerText = `Selamat! Pengetahuan Anda sangat baik dengan skor ${score}/10.`;
            } else if (score >= 7) {
                resultText.innerText = `Pengetahuan Anda cukup baik dengan skor ${score}/10. Perlu menambah wawasan!`;
            } else {
                resultText.innerText = `Pengetahuan Anda masih kurang dengan skor ${score}/10. Silakan pelajari lebih lanjut tentang anemia dan pencegahannya.`;
            }

            resultDiv.style.display = 'block';
        }
    </script>

    @endsection