<style>
    .tombolback {
        margin: 0px;
        background-color: #344CB7 !important;
        color: white !important;
        border: solid 2px white !important;
    }

    .tombolforward {
        margin: 0px;
        background-color: #000957 !important;
        color: white !important;
        border: solid 2px white !important;
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 pt-0 shadow-none border-radius-xl
        {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 bg-primary' : '' }}" id="navbarBlur"
    data-scroll="false">
    <div class="container pb-1">
        <nav aria-label="breadcrumb">
            <div class="mb-2">
                <button class="btn btn-round tombolback" id="backButton" onclick="goBack()"><i
                        class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <button class="btn btn-round tombolforward" id="forwardButton" onclick="goForward()"><i
                        class="fa fa-chevron-right" aria-hidden="true"></i></button>
            </div>
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5" style="font-size: 14px;">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-black" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm active" style="color: #009990;" aria-current="page">{{ $title }}</li>
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