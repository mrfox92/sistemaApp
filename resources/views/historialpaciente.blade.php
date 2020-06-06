@extends("layouts.app")

@section("contenido")
    @foreach ($historial as $datos)
    

        <div class="container">
            
            <div class="row container">
                <div class="col"><label for="">Fecha consulta:</label><label for="">{{$datos->fecha_hora_consulta}}</label></div>
                <div class="col" >
                    <form action="nueva-consulta-paciente-actual" method="POST">
                        @csrf
                        <input type="hidden" name="id_paciente" value="{{$datos->paciente->id_paciente}}">
                        <input type="hidden" name="id_prop" value="{{$datos->Propietario->id_prop}}">
                        <input type="submit" name="enviar" value="Nueva consulta con este paciente">
                    </form>
                </div>
                <div class="col" >
                    <form action="agenda-hora" method="POST">
                        @csrf
                        <input type="hidden" name="id_paciente" value="{{$datos->paciente->id_paciente}}">
                        <input type="hidden" name="id_prop" value="{{$datos->Propietario->id_prop}}">
                        <input type="submit" name="enviar" value="Agendar hora">
                    </form>
                </div>
            </div>

            <div class="container row">
                <div class="container jumbotron border col">
                    <div><caption><h5>Información Paciente</h5></caption></div>
                <div><label for="">Nombre paciente: </label><label for="">{{$datos->paciente->nom_paciente}}</label></div>    
                    <div><label for="">Especie: </label><label for="">{{$datos->paciente->especie_paciente}}</label></div>        
                    <div><label for="">Sexo: </label><label for="">{{$datos->paciente->sexo_paciente}}</label></div>                   
                    <div><label for="">Edad: </label><label for="">{{$datos->paciente->edad_paciente}}</label></div>       
                    <div><label for="">Número Chip: </label><label for="">{{$datos->paciente->nro_chip_paciente}}</label></div> 
                </div>
                <div class="container jumbotron border col">
                    <div><caption><h5>Información Propietario</h5></caption></div>
                    <div><label for="">Nombres Propietario: </label>{{$datos->Propietario->nom_prop}}<label for=""></label></div>
                    <div><label for="">Apellidos Propietario: </label><label for="">{{$datos->Propietario->ape_prop}}</label></div>
                    <div><label for="">Dirección: </label><label for="">{{$datos->Propietario->direccion_prop}}</label></div>
                    <div><label for="">Teléfono: </label><label for="">{{$datos->Propietario->fono_prop}}</label></div>
                    <div><label for="">Email: </label><label for="">{{$datos->Propietario->email_prop}}</label></div>
                </div>
            </div>

            <div class="row jumbotron border">
                <div class="col">
                    <div><h5>Detalle Consulta</h5></div>
                    <div class="row">
                        <div class="col"><label for="">Peso: </label>{{$datos->peso_paciente}}<label for=""></label></div>
                        <div class="col"><label for="">Temperatura: </label><label for="">{{$datos->temperatura_paciente}}</label></div>
                    </div>
                
                    <div><label for=""><h5>Observación</h5>{{$datos->desc_consulta}}</label></div>
                    <div><label for=""></label></div>
                </div>
            </div>
        </div>

    @endforeach

    <div class="container">   
        {{$historial->links()}}
    </div>
@endsection