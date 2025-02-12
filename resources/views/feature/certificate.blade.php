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

        .certificate {
            background: linear-gradient(to right, rgba(32, 101, 239, 0.3), rgba(32, 198, 88, 0.2));
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .social-icon {
            width: 24px;
            height: 24px;
        }
    </style>
@endsection

@section('content')
    @include('utils.layout.topnav', ['title' => 'Sertifikat'])
    <div class="container mx-auto pb-8 px-4 min-h-screen">
        <div class="page p-8 bg-white rounded-2xl shadow-lg border border-gray-200 animate-fade-in">
            <h2
                class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-l from-blue-600 to-teal-500 mb-6">
                Sertifikat Saya
            </h2>
            <div class="grid place-items-center">
                <div class="bg-white shadow-lg rounded-lg border-4 border-[#4b7795] w-full max-w-5xl p-4
                            text-center items-center justify-center h-[280px] md:h-auto overflow-hidden"
                    style="background: linear-gradient(to right, rgba(32, 101, 239, 0.3), rgba(32, 198, 88, 0.2));">

                    <h1 class="text-xs md:text-4xl font-bold text-black mb-3 md:mb-6">SERTIFIKAT PENCAPAIAN</h1>

                    <div class="inline-flex items-center space-x-2">
                        <h2 class="text-sm md:text-[10px] font-bold mb-1 md:mb-2">Nomor
                            <input id="noInput" type="text" value="1234567"
                                class="bg-transparent border-none text-sm md:text-[10px] font-bold mb-1 md:mb-2 border-b border-white inline-block text-center" />
                        </h2>
                        <!-- Pencil icon -->
                        <i class="fas fa-pencil-alt text-gray-600 cursor-pointer"></i>
                    </div>

                    <h2 class="mt-6 text-[10px] md:text-lg font-semibold mb-2 md:mb-4">Dengan bangga diberikan kepada:</h2>

                    <!-- Editable name input field with pencil icon -->
                    <div class="mt-4 inline-flex items-center space-x-2">
                        <p class="text-sm md:text-3xl font-bold mb-1 md:mb-2">
                            <input id="nameInput" type="text" value="KUPA COCHANK"
                                class="bg-transparent border-none text-sm md:text-3xl font-bold mb-1 md:mb-2 border-b border-white inline-block text-center" />
                        </p>
                        <!-- Pencil icon -->
                        <i class="fas fa-pencil-alt text-gray-600 cursor-pointer"></i>
                    </div>

                    <div class="mt-1 md:mt-4 text-gray-700 text-[8px] md:text-base">
                        <p>Sebagai penghargaan atas komitmen dan kedisiplinan menjalani pengobatan anemia selama <strong>90
                                hari</strong>.</p>
                        <p>Terima kasih telah menjadi inspirasi dalam menjaga kesehatan.</p>
                        <p class="mt-1 md:mt-2">Teruslah melangkah menuju hidup yang lebih sehat!</p>
                    </div>

                    <p class="text-[10px] md:text-lg mt-3 md:mt-6">31 Desember 2025</p>

                    <div class="mt-3 md:mt-6 flex flex-col items-center">
                        <p class="text-[10px] md:text-lg">(Pemberi Sertifikat)</p>
                    </div>

                    <div class="flex justify-center mt-2 md:mt-6 space-x-2 md:space-x-4">
                        <img src="" class="w-8 h-8 md:w-12 md:h-12" alt="Logo 1" />
                        <img src="" class="w-8 h-8 md:w-12 md:h-12" alt="Logo 2" />
                    </div>

                </div>


                <!-- Buttons -->
                <div class="mt-3 md:mt-6 flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4">
                    <button onclick="downloadPDF()"
                        class="text-xs md:text-base bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 md:px-5 md:py-2 rounded-md">
                        Download PDF
                    </button>

                    <!-- Main Share Button -->
                    <button onclick="openModal()"
                        class="text-xs md:text-base bg-teal-500 hover:bg-teal-600 text-white px-3 py-1 md:px-5 md:py-2 rounded-md">
                        Share ke Media Sosial
                    </button>

                    <!-- Modal for Social Media Sharing -->
                    <div id="shareModal"
                        class="modal hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
                        <div class="modal-content bg-white p-6 rounded-md w-80">
                            <h3 class="text-center text-lg font-semibold mb-4">Share To</h3>

                            <!-- Social Media Buttons -->
                            <div class="mt-4 flex justify-between gap-4">
                                <!-- Facebook Button -->
                                <button onclick="shareTo('facebook')" class="social-btn bg-blue-600 hover:bg-blue-700">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"
                                        alt="Facebook" class="social-icon">
                                </button>

                                <!-- Twitter Button -->
                                <button onclick="shareTo('twitter')" class="social-btn bg-blue-400 hover:bg-blue-500">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/60/Twitter_Logo_as_of_2021.svg"
                                        alt="Twitter" class="social-icon">
                                </button>

                                <!-- WhatsApp Button -->
                                <button onclick="shareTo('whatsapp')" class="social-btn bg-green-500 hover:bg-green-600">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg"
                                        alt="WhatsApp" class="social-icon">
                                </button>

                                <!-- Instagram Button -->
                                <button onclick="shareTo('instagram')" class="social-btn bg-red-500 hover:bg-red-800">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1200px-Instagram_logo_2022.svg.png"
                                        alt="Instagram" class="social-icon">
                                </button>
                            </div>

                            <!-- Close Modal Button -->
                            <button onclick="closeModal()"
                                class="mt-6 text-xs w-full md:text-base bg-gray-500 hover:bg-gray-600 text-white px-3 py-1 md:px-5 md:py-2 rounded-md">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('utils.layout.footer')
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        function downloadPDF() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF('landscape'); // Specify landscape orientation
            const width = doc.internal.pageSize.width;
            const height = doc.internal.pageSize.height;

            // Create a canvas to generate a smooth gradient
            const canvas = document.createElement("canvas");
            canvas.width = width * 4; // Increase resolution
            canvas.height = height * 4;
            const ctx = canvas.getContext("2d");

            // Create gradient for background matching HTML style
            const gradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
            gradient.addColorStop(0, "rgba(32, 101, 239, 0.3)"); // Start color
            gradient.addColorStop(1, "rgba(32, 198, 88, 0.2)"); // End color

            // Fill gradient for background
            ctx.fillStyle = gradient;
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Convert to Base64 image and add gradient as background
            const imgData = canvas.toDataURL("image/png");
            doc.addImage(imgData, "PNG", 0, 0, width, height);

            // Set text color and font to match the HTML style
            doc.setTextColor(0, 0, 0); // Black text (similar to HTML)
            doc.setFont("helvetica", "bold"); // Matching font style

            // Title (Matching HTML title font size)
            doc.setFontSize(34);
            doc.text("SERTIFIKAT PENCAPAIAN", width / 2, 30, {
                align: "center"
            });

            // "Nomor" (Dynamically get the nomor from the input field)
            const nomor = document.getElementById('noInput').value;
            doc.setFontSize(16);
            doc.setFont("helvetica", "normal");
            doc.text("Nomor: " + nomor, width / 2, 50, {
                align: "center"
            });

            // Subtitle (Matching HTML subtitle font size)
            doc.setFontSize(16);
            doc.setFont("helvetica", "normal");
            doc.text("Dengan bangga diberikan kepada:", width / 2, 70, {
                align: "center"
            });

            // Name (Dynamically get the name from the input field)
            const name = document.getElementById('nameInput').value;
            doc.setFontSize(25);
            doc.setFont("helvetica", "bold");
            doc.text(name, width / 2, 90, {
                align: "center"
            });

            // Achievement details - stacked vertically, with reduced gap between lines
            const descriptionText = [
                "Sebagai penghargaan atas komitmen dan kedisiplinan menjalani pengobatan anemia selama"
            ];

            // Set up for bold "90 hari"
            const boldText = "90 hari.";
            doc.setFontSize(16);
            doc.setFont("helvetica", "normal");

            // First part of description
            doc.text(descriptionText[0], width / 2, 110, {
                align: "center"
            });

            // Bold "90 hari"
            doc.setFont("helvetica", "bold");
            doc.text(boldText, width / 2, 120, {
                align: "center"
            });

            // Continue with other parts of the description
            doc.setFont("helvetica", "normal");
            doc.text("Terima kasih telah menjadi inspirasi dalam menjaga kesehatan.", width / 2, 130, {
                align: "center"
            });
            doc.text("Teruslah melangkah menuju hidup yang lebih sehat!", width / 2, 140, {
                align: "center"
            });

            // Date (Matching HTML date font size)
            doc.setFontSize(16);
            doc.setFont("helvetica", "normal");
            doc.text("31 Desember 2025", width / 2, 160, {
                align: "center"
            });

            // Signer title (Matching HTML signer title)
            doc.setFont("helvetica", "normal");
            doc.text("(Pemberi Sertifikat)", width / 2, 175, {
                align: "center"
            });

            // Save PDF
            doc.save("sertifikat.pdf");
        }
    </script>

    <script>
        // Open the modal
        function openModal() {
            document.getElementById('shareModal').classList.remove('hidden');
        }

        // Close the modal
        function closeModal() {
            document.getElementById('shareModal').classList.add('hidden');
        }

        // Share to the selected social media platform
        function shareTo(platform) {
            const url = encodeURIComponent(window.location.href); // URL of the current page
            const text = encodeURIComponent("Check out this certificate!"); // Optional text to share
            const hashtag = "certificate";

            // Define URLs for sharing
            const platforms = {
                'facebook': `https://www.facebook.com/sharer/sharer.php?u=${url}`,
                'twitter': `https://twitter.com/intent/tweet?url=${url}&text=${text}&hashtags=${hashtag}`,
                'whatsapp': `https://wa.me/?text=${text}%20${url}`,
                'instagram': `https://www.instagram.com/?url=${url}`
            };

            // Open the platform's sharing URL in a new tab
            if (platforms[platform]) {
                window.open(platforms[platform], '_blank');
            } else {
                alert('Invalid platform');
            }

            // Close the modal after sharing
            closeModal();
        }
    </script>
@endsection
