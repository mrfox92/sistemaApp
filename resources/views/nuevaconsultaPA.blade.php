@extends("layout.plantilla")

@section("contenido")
 @isset($datos)
@foreach ($datos as $datos)
    
<div class="container">
        
    <form method="POST" action="nueva-consulta-paciente-actual">
        @csrf
        <input type="hidden" name="id_paciente" value="{{$datos->id_paciente}}">
        <input type="hidden" name="id_prop" value="{{$datos->propietario->id_prop}}">
        <div class="center"><h1>FICHA CLÍNICA</h1></div>
        <div class="form-group row">
            <div class="container jumbotron border col">
                <div><caption><h5>Información Paciente</h5></caption></div>
                <div><label for="">Nombre paciente:</label><label for="">{{$datos->paciente->nom_paciente}}</label></div>    
                <div><label for="">Especie:</label><label for="">{{$datos->paciente->especie_paciente}}</label></div>        
                <div><label for="">Sexo:</label><label for="">{{$datos->paciente->sexo_paciente}}</label></div>
                <div><label for="">Edad:</label><label for="">{{$datos->paciente->edad_paciente}}</label></div>       
                <div><label for="">Número Chip:</label><label for="">{{$datos->paciente->nro_chip_paciente}}</label></div>
            </div>
            <div class="container jumbotron border col">
                <div><caption><h5>Información Propietario</h5></caption></div>
                <div><label for="">Nombres Propietario:</label><label for="">{{$datos->propietario->nom_prop}}</label></div>
                <div><label for="">Apellidos Propietario:</label><label for="">{{$datos->propietario->ape_prop}}</label></div>
                <div><label for="">Dirección</label><input  class="form-control" type="text" name="direccion_prop" value="{{$datos->propietario->direccion_prop}}"placeholder="Ingrese dirección del propietario"></div>
                <div><label for="">Teléfono</label><input  class="form-control" type="text" name="fono_prop" value="{{$datos->propietario->fono_prop}}" placeholder="Ingrese teléfono del propietario "></div>
                <div><label for="">Email</label><input  class="form-control" type="text" name="email_prop" value="{{$datos->propietario->email_prop}}" placeholder="Ingrese correo del propietario"></div>
            </div>
        </div>
       
       <div class="row jumbotron border">
            <div class="col">
                <div><h5>Detalle Consulta</h5></div>
                <div class="row">
                    <div class="col"><label for="">Peso</label><input class="form-control" type="text" name="peso_paciente" placeholder="ingrese el peso del paciente"></div>
                    <div class="col"><label for="">Temperatura</label><input  class="form-control" type="text" name="temperatura_paciente" placeholder="Ingrese la temperatura del paciente"></div>
                </div>
               
                <div><label for=""><h5>Observación</h5></label></div>
                <div><textarea  class="form-control" name="desc_consulta" id="" cols="30" rows="10"></textarea></div>

                <div><input class="btn btn-success" type="submit" name="guardar" value="Guardar"></div>
            </div>
        </div>
    </form>
</div>
@endforeach

@endisset

@endsection