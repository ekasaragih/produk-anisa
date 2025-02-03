@extends('utils.layout.sidebar')

@section('head')
    <style>
        .certificate-container {
            border: 5px solid #4b7795;
            padding: 30px;
            background: linear-gradient(to right, rgba(32, 101, 239, 0.3), rgba(32, 198, 88, 0.2));
            width: 90%;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .certificate-title {
            font-size: 2.8em;
            font-weight: bold;
            color: #000000;
            margin-bottom: 30px;
            font-family: 'Times New Roman', Times, serif;
        }

        .certificate-subtitle {
            font-size: 1.2em;
            margin-bottom: 25px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .date-content {
            font-size: 1.2em;
            margin-top: 30px;
            margin-bottom: 40px;
            font-family: 'Times New Roman', Times, serif;
        }

        .certificate-content {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
            text-align: center;
        }

        .certificate-content p {
            font-size: 1.1em;
            margin: 0;
            line-height: 1.8;
            font-family: Arial, Helvetica, sans-serif;
        }


        .recipient-name {
            font-size: 2em;
            margin-bottom: 10px;
            position: relative;
            font-family: 'Times New Roman', Times, serif;
        }

        .recipient-name::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 80%;
            border-bottom: 2px solid #ffffff;
            transform: translateX(-50%);
        }

        .signature {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .signature p {
            font-size: 1.2em;
            margin: 5px 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .footer {
            margin-top: 30px;
            font-size: 0.8em;
            color: #777;
        }
    </style>
@endsection

@section('content')
    @include('utils.layout.topnav', ['title' => 'Sertifikat'])
    <div class="container-fluid py-1 px-3">
        <div class="row">
            <div class="card" style="background-color: #F8FAFC;">
                <div class="certificate-container">
                    <div class="certificate-title">
                        SERTIFIKAT PENCAPAIAN
                    </div>

                    <div class="certificate-subtitle mt-4">
                        Dengan bangga diberikan kepada:
                    </div>

                    <div class="recipient-name">
                        KUPA COCHANK
                    </div>

                    <div class="certificate-content mt-4">
                        <p>Sebagai penghargaan atas komitmen dan kedisiplinan menjalani pengobatan anemia selama
                            <strong> 90 hari</strong>.
                        </p>
                        <p>Terima kasih telah menjadi inspirasi dalam menjaga kesehatan.</p>
                        <br>
                        <p>Teruslah melangkah menuju hidup yang lebih sehat!</p>
                    </div>

                    <p class="date-content">31 Desember 2025</p>

                    <div class="signature">
                        <div>
                            <p>(Pemberi Sertifikat)</p>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center align-items-center mt-4">
                        <div class="col-auto">
                            <img src="" class="mx-auto d-block" width="50" height="50" />
                        </div>
                        <div class="col-auto">
                            <img src="" class="mx-auto d-block" width="50" height="50" />
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
