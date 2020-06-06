@extends('layouts.app')


@section('contenido')
    <div class="ml-2 mr-2">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="jumbotron">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">{{ __("Crear nuevo") }}</button>
                    <a href="{{ route('propietarios.prueba') }}" class="btn btn-success">{{ __("Crear Propietario Prueba") }}</a>
                </div>
            </div>
        </div>
    </div>
    {{-- tabla propietarios --}}
    <div class="container">
        @include('propietarios.tablaProp');
    </div>
    {{-- modal --}}
    @include('propietarios.modalProp');
@endsection

@if(Session::has('errors'))
    @push('custom-scripts')
        <script>
            $(document).ready( function(){
                $('#exampleModal').modal({show: true});
            });
        </script>
    @endpush    
@endif