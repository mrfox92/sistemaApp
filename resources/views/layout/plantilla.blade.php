<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" > --}}
    {{-- <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" > --}}

    <title>Veterinaria</title>
</head>
<body>
    <div class="container">
        <header><h1>VETERINARIA</h1></header>
    </div>
    <div class="Menu">
        @include('menu')
    </div>

    <div class="content">
        
        @yield("contenido") 


    </div> 

    <div class="pie">


    </div>
    {{-- <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script> --}}

</body>
</html>