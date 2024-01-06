

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="mx-auto">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{url('/nilai')}}">| Data Tunggal |</a></li>
                    </ul>
                    <ul class="navbar-nav mr-auto hover:underlined">
                        <li><a class="nav-link" href="{{url('/frekuensi')}}">| Data Distribusi Frekuensi |</a></li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{url('/deskripsi')}}">|  Deskripsi Data |</a></li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{url('/databergolong')}}">| Data Bergolong |</a></li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{url('/tabelChi')}}">|  Tabel Z Chi-Kuadrat |</a></li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{url('/liliefors')}}">| Tabel Z Lilieferros |</a></li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{url('/Ttest')}}">| Tabel Uji T |</a></li>
                    </ul>
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="{{url('/biserial')}}">| Biserial |</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="d-flex justify-content-center">
                            <div class="mb-1 me-1">
                                <a href="{{url('/import')}}" class="btn btn-success">Import Data</a>
                            </div>
                            <div class="mb-1">
                                <a href="{{url('/export')}}" class="btn btn-success">Export Data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</script>
</html>


