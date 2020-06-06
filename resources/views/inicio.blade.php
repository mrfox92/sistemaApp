@extends('layouts.app')

@section('contenido')
<div class="container jumbotron">

<form class="form-group" action="{{ route('inicio.buscar') }}" method="POST" novalidate>
@csrf
    <div><label for="">Ingrese información que desea buscar</label></div>
    <div class="input-group mb-3">
        <input value="{{ old('buscar') ?: $buscar }}" type="text" class="form-control{{ $errors->has('buscar') ? ' is-invalid' : '' }}" name="buscar" placeholder="Buscar">
        <div class="">
            <input class="btn btn-success" type="submit" name="enviar" value="Buscar"></div>
        </div>
        @if ( $errors->has('buscar') )
            <span class="invalid-feedback">
                <strong>{{ $errors->first('buscar') }}</strong>
            </span>
        @endif
    <div class="">
            <input id="pacienteId"
                type="radio" 
                name="busqueda"
                value="{{ $radioPaciente['value'] }}" 
                {{ $radioPaciente['status'] ? 'checked': '' }}
            >
            <label for="pacienteId">Buscar paciente</label>
            <input id="propietarioId"
                type="radio"
                name="busqueda"
                value="{{ $radioProp['value'] }}" 
                {{ $radioProp['status'] ? 'checked': '' }}
            >
            <label for="propietarioId">Buscar propietario</label>
        </label>
    </div>

</form>

        
    @if( $pacientes )
        @include('partials.pacientes.tablapacientes')
    @elseif( $propietarios )
        @include('partials.propietarios.tablapropietarios')
    @endif

</div>


@endsection