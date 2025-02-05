@extends('utils.layout.sidebar')

@section('head')
<style>

</style>
@endsection

@section('content')
@include('utils.layout.topnav', ['title' => 'Tingkat Pengetahuan Ibu Hamil'])
<div class="container mx-auto py-4 px-2">

    <div class="p-4 bg-gray-100 rounded-lg shadow-md h-128 overflow-hidden">
        <div class="h-full overflow-y-auto">
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

@endsection