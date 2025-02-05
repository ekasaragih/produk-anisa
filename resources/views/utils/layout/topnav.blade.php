<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-3 pt-0 shadow-none rounded-xl {{ str_contains(Request::url(), 'virtual-reality') ? 'mt-3 bg-primary' : '' }}"
    id="navbarBlur" data-scroll="false">
    <div class="container pb-1">
        <nav aria-label="breadcrumb">
            <div class="mb-2 flex space-x-2">
                <button class="rounded-xl bg-blue-700 text-white border-2 border-white px-3 py-2" id="backButton"
                    onclick="goBack()">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </button>
                <button class="rounded-xl bg-pink-400 text-white border-2 border-white px-3 py-2" id="forwardButton"
                    onclick="goForward()">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </button>
            </div>
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 text-lg">
                <li class="breadcrumb-item text-black">
                    <a href="javascript:;" class="cursor-auto">Halaman / <span
                            class="breadcrumb-item text-pink-500 font-semibold" aria-current="page">{{ $title
                            }}</span>
                    </a>
                </li>
            </ol>
        </nav>
    </div>
</nav>
<!-- End Navbar -->

<script>
    function goBack() {
        history.go(-1);
    }

    function goForward() {
        history.go(1);
    }
</script>