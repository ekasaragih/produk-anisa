@extends('utils.layout.sidebar')

@section('head')
<style>
    .badge {
        display: inline-block;
        padding: 0.25em 0.5em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25rem;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #fff;
    }

    .badge-soft-warning {
        color: #f1b44c;
        background-color: rgba(241, 180, 76, .18);
    }

    .badge-success {
        background-color: #2dce89;
        color: #fff;
    }

    .badge-soft-success {
        color: #34c38f;
        background-color: rgba(52, 195, 143, .18);
    }

    .badge-warn-subtle {
        color: #e9bc18;
        background-color: #fcf5dc;
    }

    .badge-info-subtle {
        color: #179faa;
        background-color: #dcf1f2;
    }

    .badge-secondary-subtle {
        color: #438eff;
        background-color: #e3eeff;
    }

    .badge-primary-subtle {
        color: #5a58eb;
        background-color: #e6e6fc;
    }

    .badge-danger-subtle {
        color: #f9554c;
        background-color: #fee6e4;
    }

    .rounded-pill {
        border-radius: 50rem;
    }

    .d-inline {
        display: inline;
    }
</style>
@endsection

@section('content')
@include('utils.layout.topnav', ['title' => 'Tingkat Pengetahuan Ibu Hamil'])
<div class="container-fluid py-1 px-3">
    <div class="row">
        <div class="card" style="background-color: #CBE2C9;">
            <div class="card-body" style="padding: 5px;">
                {{-- Replace this part --}}
                Ini page 'Tingkat Pengetahuan Ibu Hamil'
            </div>

            {{-- Replace this part --}}
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis malesuada sit amet massa blandit venenatis.
                In tempor
                porta nisl vel tempus. Cras ex ex, placerat sed risus vel, facilisis auctor quam. Maecenas blandit odio
                felis, vel
                cursus felis viverra ac. Phasellus at velit dictum nulla ultrices laoreet. Fusce vehicula erat sed lorem
                facilisis
                ultrices eu eget ante. Fusce laoreet libero vel mi volutpat iaculis. Curabitur id hendrerit quam, ut
                ultrices erat.
                Suspendisse quis mauris sit amet neque tristique elementum quis nec est.
                <br><br>
                Donec urna urna, auctor sit amet ultrices vitae, laoreet ut metus. Duis accumsan dictum felis eget
                bibendum. Nulla
                volutpat, sem in molestie aliquam, mi turpis faucibus risus, eu ornare eros nibh at risus. Vestibulum
                sed pulvinar
                tortor. Cras magna ipsum, rutrum ut ipsum a, semper efficitur ipsum. Suspendisse laoreet ante id
                hendrerit fermentum. Ut
                quis justo metus. Etiam a ipsum erat. Cras ut gravida mauris. Vestibulum id elementum dui. Vestibulum
                accumsan dui sed
                mi molestie, eu mollis tortor scelerisque. Suspendisse potenti.
                <br><br>
                Pellentesque laoreet sodales congue. Maecenas feugiat, ex non cursus aliquet, felis diam dignissim
                felis, a tristique
                massa ipsum id ante. Cras sollicitudin ut enim feugiat pretium. In eget ex varius, dapibus nibh vitae,
                feugiat eros. Nam
                pulvinar nisl ut libero lacinia, a dignissim metus luctus. Donec venenatis elit libero, at fringilla est
                elementum a.
                Duis interdum leo sollicitudin rhoncus scelerisque. Integer ac pellentesque risus. Quisque est quam,
                eleifend fringilla
                tortor ut, suscipit fermentum lectus.
                <br><br>
                Etiam placerat nisl at auctor mollis. Nunc viverra sapien eget nibh cursus, at fringilla purus eleifend.
                Praesent
                finibus, elit feugiat ornare iaculis, nibh mi rhoncus magna, nec facilisis sapien ipsum at diam. Quisque
                fermentum
                maximus cursus. Integer ullamcorper vulputate metus eget varius. Vivamus fermentum volutpat ex, id
                vestibulum nisl
                congue eu. Donec gravida metus eu lobortis laoreet.
                <br><br>
                Quisque id ipsum quis leo varius malesuada non eget lorem. Cras vulputate fermentum massa a lobortis.
                Phasellus
                pulvinar, nulla tincidunt facilisis fermentum, purus tortor accumsan est, rutrum luctus est sapien quis
                erat. In purus
                odio, ullamcorper vitae ex ut, fringilla sollicitudin erat. Mauris pellentesque cursus turpis, et luctus
                dolor dictum
                id. Praesent nec est cursus, gravida orci ac, condimentum dui. Lorem ipsum dolor sit amet, consectetur
                adipiscing elit.
                Nullam cursus fermentum turpis, quis facilisis nibh. Fusce vitae purus feugiat nibh scelerisque
                tristique. Pellentesque
                ligula nulla, faucibus sit amet accumsan eget, interdum in massa. Aenean maximus maximus sem, accumsan
                rutrum neque
                bibendum in. Duis quis massa ut quam ullamcorper rhoncus.
            </p>
        </div>
    </div>


    {{-- DONT REPLACE THIS PART --}}
    @include('utils.layout.footer')
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
{{-- <script src="resources/js/moment.js"></script> --}}


@endsection