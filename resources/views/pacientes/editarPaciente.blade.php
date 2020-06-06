@extends('layouts.app')

@section('contenido')
    <div class="container">
        <form method="POST" action="{{ route('pacientes.actualizar', ['paciente' => $paciente->id_paciente]) }}">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="container jumbotron border col">
                    <div class="text-center text-muted text-uppercase"><caption><h5>Información Paciente</h5></caption></div>
                    <div class="mt-2">
                        <label for="">Nombre paciente </label>
                        <input class="form-control{{ $errors->has('nom_paciente') ? ' is-invalid' : '' }}"
                            type="text"
                            name="nom_paciente"
                            id="nom_paciente"
                            value="{{ old('nom_paciente') ?: $paciente->nom_paciente }}"
                            placeholder="Ingrese nombre paciente"
                        >
                        @if ( $errors->has('nom_paciente') )
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nom_paciente') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mt-2">
                        <label for="">Especie</label>
                        <input class="form-control{{ $errors->has('especie_paciente') ? ' is-invalid' : '' }}"
                            type="text"
                            name="especie_paciente"
                            id="especie_paciente"
                            value="{{ old('especie_paciente') ?: $paciente->especie_paciente }}"
                            placeholder="Ingrese especie del paciente"
                        >
                        @if ( $errors->has('especie_paciente') )
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('especie_paciente') }}</strong>
                            </span>
                        @endif
                    </div>        
                    <div class="mt-2">
                        <label for="">Sexo</label>
                        <select class="form-control{{ $errors->has('sexo_paciente') ? ' is-invalid' : '' }}" name="sexo_paciente">
                            <option value="">Seleccione una opción</option>
                            <option value="hembra" {{ $paciente->sexo_paciente === 'hembra' ? 'selected' : '' }}>Hembra</option>
                            <option value="macho" {{ $paciente->sexo_paciente === 'macho' ? 'selected' : '' }}>Macho</option>
                        </select>
                        @if ( $errors->has('sexo_paciente') )
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('sexo_paciente') }}</strong>
                            </span>
                        @endif
                    </div>       
                    <div class="mt-2">
                        <label for="">Número Chip</label>
                        <input class="form-control{{ $errors->has('nro_chip_paciente') ? ' is-invalid' : '' }}"
                            type="text"
                            name="nro_chip_paciente"
                            value="{{ old('nro_chip_paciente') ?: $paciente->nro_chip_paciente }}"
                            placeholder="Ingrese número de chip del paciente"
                        >
                        @if ( $errors->has('nro_chip_paciente') )
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nro_chip_paciente') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <input class="btn btn-success mt-4" type="submit" name="actualizar" value="Actualizar">
                    </div> 
                </div>
            </div>
        </form>
    </div>    
@endsection