<!doctype html>
<html lang="en">

<head>
    <title>Produk Anisa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Rubik', sans-serif;
            background: #ffffff;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #685752;
            color: white;
            position: fixed;
            top: 6px;
            left: 6px;
            transition: all 0.3s;
            padding-top: 20px;
            border-right: 5px solid #8EB486;
            border-radius: 15px;
        }

        .sidebar a {
            font-size: 12px;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            transition: 0.3s;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar .active {
            background: #92817A !important;
            color: white !important;
            font-weight: bold !important;
        }

        .sidebar #title {
            font-size: 15px !important;
        }

        .sidebar #title:hover {
            background: none !important;
            font-size: 16px !important;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover {
            background: #92817A;
            color: white;
            font-size: 13px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        /* Mobile Menu (Hidden by Default) */
        .mobile-menu {
            display: none;
            background: #685752;
            color: white;
            position: absolute;
            top: 56px;
            width: 100%;
            padding: 10px 0;
            text-align: left;
            transition: transform 0.3s ease-in-out;
            transform: translateY(-100%);
            border-top: 5px solid #8EB486;
        }

        #mobileNav {
            background: #685752;
        }

        .mobile-menu.show {
            transform: translateY(0);
        }

        .mobile-menu a {
            color: white;
            text-decoration: none;
            padding: 12px;
            display: block;
            /* background: #72BAA9; */
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .mobile-menu a:hover {
            background: #92817A;
            color: white;
            font-size: 15px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
            }

            .mobile-nav {
                display: flex !important;
            }
        }
    </style>
    @yield('head')
</head>

<body>

    <!-- Desktop Sidebar -->
    <nav class="sidebar d-flex flex-column d-none d-md-block">
        <div class="text-center">
            <h4><a id="title" href="/">Produk Anisa</a></h4>
        </div>

        <a href="{{ route('tingkat_pengetahuan_ibu_hamil') }}"
            class="{{ Route::currentRouteName() == 'tingkat_pengetahuan_ibu_hamil' ? 'active' : '' }}"><i
                class="fa fa-venus"></i> Tingkat Pengetahuan Ibu Hamil</a>
        <a href="{{ route('promotive') }}" class="{{ Route::currentRouteName() == 'promotive' ? 'active' : '' }}"><i
                class="fa fa-clipboard"></i> Promotif</a>
        <a href="{{ route('preventive') }}" class="{{ Route::currentRouteName() == 'preventive' ? 'active' : '' }}"><i
                class="fa fa-clipboard-check"></i> Preventif</a>

        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mt-3">Monitoring</h6>

        <a href="{{ route('monitoring') }}"
            class="ps-4 ms-2 {{ Route::currentRouteName() == 'monitoring' ? 'active' : '' }}"><i
                class="fa fa-tachometer-alt"></i> Dashboard</a>
        <a href="/" class="ps-4 ms-2 "><i class="fa fa-cogs"></i> Page Lain..</a>
        <a href="{{ route('input_kadar_hb') }}"
            class="{{ Route::currentRouteName() == 'input_kadar_hb' ? 'active' : '' }}"><i class="fa fa-heartbeat"></i>
            Input Kadar Hb</a>
        <a href="{{ route('certificate') }}" class="{{ Route::currentRouteName() == 'certificate' ? 'active' : '' }}"><i
                class="fa fa-certificate"></i> Sertifikat</a>
        <a href="{{ route('contact_us') }}" class="{{ Route::currentRouteName() == 'contact_us' ? 'active' : '' }}"><i
                class="fa fa-phone-alt"></i> Hubungi Kami</a>


        <form role="form" method="post" action="" id="logout-form" class="mt-4">
            @csrf
            <a href="" onclick="">
                <i class="fa fa-user me-sm-1"></i>Keluar dari Akun
            </a>
        </form>
        </div>
    </nav>

    <!-- Mobile Navbar -->
    <nav class="navbar navbar-dark d-md-none" id="mobileNav">
        <div class="container-fluid">
            <button class="btn btn-outline-light" id="toggleMenu">
                <i class="fas fa-bars"></i> Menu
            </button>
        </div>
    </nav>

    <!-- Mobile Menu (Hidden Initially) -->
    <div class="mobile-menu" id="mobileMenu">
        <!-- Close Button -->
        <button class="btn-close text-white" id="closeMenu" aria-label="Close"
            style="position: absolute; top: 20px; right: 20px;"></button>

        <a href="#"><i class="fa fa-venus"></i> Tingkat Pengetahuan Ibu Hamil</a>
        <a href="#"><i class="fa fa-clipboard"></i> Promotif</a>
        <a href="#"><i class="fa fa-clipboard-check"></i> Preventif</a>

        <h6 class="ps-4 ms-2 text-uppercase text-xs text-left font-weight-bolder opacity-6 mt-3">Monitoring</h6>

        <a href="#" class="ps-4 ms-2"><i class="fa fa-tachometer-alt"></i> Dashboard</a>
        <a href="#" class="ps-4 ms-2"><i class="fa fa-cogs"></i> Page Lain..</a>
        <a href="#"><i class="fa fa-heartbeat"></i> Input Kadar Hb</a>
        <a href="#"><i class="fa fa-certificate"></i> Sertifikat</a>
        <a href="#"><i class="fa fa-phone-alt"></i> Hubungi Kami</a>
    </div>



    <!-- Content -->
    <div class="content" id="featureContent">
        @yield("content")
    </div>



    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const toggleMenu = document.getElementById("toggleMenu");
        const mobileMenu = document.getElementById("mobileMenu");
        const closeMenu = document.getElementById("closeMenu");
        const featureContent = document.getElementById("featureContent");

        toggleMenu.addEventListener("click", () => {
            if (mobileMenu.style.display === "none" || mobileMenu.style.display === "") {
                mobileMenu.style.display = "block";
                featureContent.style.marginTop = "25rem"; 
                mobileMenu.style.transform = "none"; 
                mobileMenu.style.top = "0px";
            } else {
                mobileMenu.style.display = "none";
                featureContent.style.marginTop = "0rem";
            }
        });

        // Close the mobile menu when the "X" button is clicked
        closeMenu.addEventListener("click", () => {
            mobileMenu.style.display = "none";
            featureContent.style.marginTop = "0rem";
        });

    </script>

</body>

</html>