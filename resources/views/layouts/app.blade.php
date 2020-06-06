<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head> 
<body>

    {{-- inicio codigo --}}
    
    {{-- <div class="Menu">
        @include('menu')
    </div> --}}

    {{-- <div class="content">
        
        @yield("contenido") 


    </div>  --}}

    {{-- fin codigo --}}
    <div id="app">
        {{-- <div class="container">
            <header><h1>VETERINARIA</h1></header>
        </div> --}}
        <div class="Menu">
            @include('menu')
        </div>
        <main class="py-4">
            {{-- Inicio Mensajes personalizados --}}
            @if( session('message') )
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="alert alert-{{ session('message')['class'] }}" role="alert">
                            <h4 class="alert-heading">{{ session('message')['title'] }}</h4>
                            <p>{{ session('message')['message'] }}</p>
                        </div>
                    </div>
                </div>
            @endif
            {{-- Fin Mensajes personalizados --}}

            @yield('contenido')
        </main>

        <div class="pie">
            
        </div>
    </div>
    {{-- aquí se moverían los scripts a fuerza con su propio bloque --}}
    @stack('custom-scripts')
</body>
</html>
