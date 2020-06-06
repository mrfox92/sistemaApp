@extends("layouts.app")

@section("contenido")

<div class="container">
    <form method="POST" action="{{ route('consulta.store') }}" novalidate>
        @csrf
        <div class="center"><h1>FICHA CLÍNICA</h1></div>
        <div class="form-group row">
            <div class="container jumbotron border col">
                <div><caption><h5>Información Paciente</h5></caption></div>
                <div><label for="">Nombre paciente </label>
                    <input class="form-control{{ $errors->has('nom_paciente') ? ' is-invalid' : '' }}"
                        type="text"
                        name="nom_paciente"
                        id="nom_paciente"
                        value="{{ old('nom_paciente') }}"
                        placeholder="Ingrese nombre paciente"
                        autofocus
                    >
                    @if ( $errors->has('nom_paciente') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nom_paciente') }}</strong>
                        </span>
                    @endif
                </div>
                <div><label for="">Especie</label>
                    <input class="form-control{{ $errors->has('especie_paciente') ? ' is-invalid' : '' }}"
                        type="text"
                        name="especie_paciente"
                        id="especie_paciente"
                        value="{{ old('especie_paciente') }}"
                        placeholder="Ingrese especie del paciente"
                    >
                    @if ( $errors->has('especie_paciente') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('especie_paciente') }}</strong>
                        </span>
                    @endif
                </div>        
                <div><label for="">Sexo</label>
                    <select class="form-control{{ $errors->has('sexo_paciente') ? ' is-invalid' : '' }}" name="sexo_paciente">
                        <option value="">Seleccione una opción</option>
                        <option value="Hembra" {{ old('sexo_paciente') === 'Hembra' ? 'selected' : '' }}>Hembra</option>
                        <option value="Macho" {{ old('sexo_paciente') === 'Macho' ? 'selected' : '' }}>Macho</option>
                    </select>
                    @if ( $errors->has('sexo_paciente') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('sexo_paciente') }}</strong>
                        </span>
                    @endif
                </div>
                <div><label for="">Edad</label>
                    <input class="form-control{{ $errors->has('edad_paciente') ? ' is-invalid' : '' }}"
                        type="date"
                        name="edad_paciente"
                        id="inputDate"
                        value="{{ old('edad_paciente') }}"
                        placeholder="Ingrese edad paciente"
                    >
                    @if ( $errors->has('edad_paciente') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('edad_paciente') }}</strong>
                        </span>
                    @endif
                </div>       
                <div>
                    <label for="">Número Chip</label>
                    <input class="form-control{{ $errors->has('nro_chip_paciente') ? ' is-invalid' : '' }}"
                        type="text"
                        name="nro_chip_paciente"
                        value="{{ old('nro_chip_paciente') }}"
                        placeholder="Ingrese número de chip del paciente"
                    >
                    @if ( $errors->has('nro_chip_paciente') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nro_chip_paciente') }}</strong>
                        </span>
                    @endif
                </div> 
            </div>
            <div class="container jumbotron border col">
                <div><caption><h5>Información Propietario</h5></caption></div>
                <div>
                    <label for="">Nombres Propietario</label>
                    <input class="form-control{{ $errors->has('nom_prop') ? ' is-invalid' : '' }}"
                        name="nom_prop"
                        type="text"
                        value="{{ old('nom_prop') }}"
                        placeholder="Ingrese nombres del propietario"
                    >
                    @if ( $errors->has('nom_prop') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('nom_prop') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <label for="">Apellidos Propietario</label>
                    <input class="form-control{{ $errors->has('ape_prop') ? ' is-invalid' : '' }}"
                        name="ape_prop"
                        type="text"
                        value="{{ old('ape_prop') }}"
                        placeholder="Ingrese apellidos del propietario"
                    >
                    @if ( $errors->has('ape_prop') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('ape_prop') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <label for="">Dirección</label>
                    <input class="form-control{{ $errors->has('direccion_prop') ? ' is-invalid' : '' }}"
                        type="text"
                        name="direccion_prop"
                        value="{{ old('direccion_prop') }}"
                        placeholder="Ingrese dirección del propietario"
                    >
                    @if ( $errors->has('direccion_prop') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('direccion_prop') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <label for="">Teléfono</label>
                    <input class="form-control{{ $errors->has('fono_prop') ? ' is-invalid' : '' }}"
                        type="text"
                        name="fono_prop"
                        value="{{ old('fono_prop') }}"
                        placeholder="Ingrese teléfono del propietario"
                    >
                    @if ( $errors->has('fono_prop') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('fono_prop') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <label for="">Email</label>
                    <input class="form-control{{ $errors->has('email_prop') ? ' is-invalid' : '' }}"
                        type="text"
                        name="email_prop"
                        value="{{ old('email_prop') }}"
                        placeholder="Ingrese correo del propietario"
                    >
                    @if ( $errors->has('email_prop') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email_prop') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
       
       <div class="row jumbotron border">
            <div class="col">
                <div><h5>Detalle Consulta</h5></div>
                <div class="row">
                    <div class="col">
                        <label for="">Peso</label>
                        <input class="form-control{{ $errors->has('peso_paciente') ? ' is-invalid' : '' }}"
                            type="number"
                            name="peso_paciente"
                            value="{{ old('peso_paciente') }}"
                            placeholder="ingrese el peso del paciente"
                        >
                        @if ( $errors->has('peso_paciente') )
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('peso_paciente') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col">
                        <label for="">Temperatura</label>
                        <input class="form-control{{ $errors->has('temperatura_paciente') ? ' is-invalid' : '' }}"
                            type="number"
                            name="temperatura_paciente"
                            value="{{ old('temperatura_paciente') }}"
                            placeholder="Ingrese la temperatura del paciente"
                        >
                        @if ( $errors->has('temperatura_paciente') )
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('temperatura_paciente') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
               
                <div><label for=""><h5>Observación</h5></label></div>
                <div>
                    <textarea class="form-control{{ $errors->has('desc_consulta') ? ' is-invalid' : '' }}"
                        name="desc_consulta"
                        cols="30"
                        rows="10"
                    >{{ old('desc_consulta') }}</textarea>
                    @if ( $errors->has('desc_consulta') )
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('desc_consulta') }}</strong>
                        </span>
                    @endif
                </div>


                <div><input class="btn btn-success my-2" type="submit" name="guardar" value="Guardar"></div>
            </div>
        </div>
    </form>
</div>

@endsection