<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | Topesite Facilities</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('img/logo/fevicon.png') }}" type="image/x-icon" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css" />
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">


    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}" />

<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<!-- JavaScript Library -->
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>

<!-- Popper JS and Bootstrap JS -->
{{-- <script src="{{ URL::asset('js/bootstrap.bundle.js') }}"></script> --}}
<script src="{{ URL::asset('js/popper.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


{{-- <script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script> --}}
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="{{ URL::asset('js/custom.js') }}"></script>
@yield('page_scripts')

</html>
