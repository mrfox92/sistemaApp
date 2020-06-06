@extends("layout.plantilla")

@section("contenido")
 @isset($datos)
@foreach ($datos as $datos)
   



<div class="container">
        
    <form method="POST" action="agenda-hora">
        @csrf
        <input type="hidden" name="id_paciente" value="{{$datos->id_paciente}}">
        <input type="hidden" name="id_prop" value="{{$datos->propietario->id_prop}}">
        <div class="center"><h1>AGENDAR HORA</h1></div>
        <div class="form-group row">
          <div class="col">


            <div class="container jumbotron border">
                <div><caption><h5>Información General</h5></caption></div>
                <div class="container">
                    <div><label for="">Nombre paciente:</label><label for="">{{$datos->paciente->nom_paciente}}</label></div>    
                    <div><label for="">Nombres Propietario:</label><label for="">{{$datos->propietario->nom_prop}}</label></div>
                    <div><label for="">Apellidos Propietario:</label><label for="">{{$datos->propietario->ape_prop}}</label></div>
                    <div><label for="">Dirección</label><input  class="form-control" type="text" name="direccion_prop" value="{{$datos->propietario->direccion_prop}}"placeholder="Ingrese dirección del propietario"></div>
                    <div><label for="">Teléfono</label><input  class="form-control" type="text" name="fono_prop" value="{{$datos->propietario->fono_prop}}" placeholder="Ingrese teléfono del propietario "></div>
                    <div><label for="">Email</label><input  class="form-control" type="text" name="email_prop" value="{{$datos->propietario->email_prop}}" placeholder="Ingrese correo del propietario"></div>

                </div>
               
            </div>
          </div>
        </div>

        <div class="container">
            <div class="row jumbotron border">
                <div class="container form-group">
                    <div class="col">
                        <label for="inputDate">Fecha agenda </label> 
                        <input id="inputDate" class="form-control" type="date">     
                    </div>
                    <div class="col">
                        <label for="inputDate">Fecha agenda </label> 
                        <input id="inputDate" class="form-control" type="time">    
                    </div>
                </div>
                <div class="col">
                    <div><label for=""><h5>Observación</h5></label></div>
                    <div><textarea  class="form-control" name="observacion_agenda" cols="30" rows="10"></textarea></div>
    
                    <div><input class="btn btn-success" type="submit" name="enviar" value="Agendar"></div>
                </div>
            </div>

        </div>
    </form>
</div>
@endforeach

@endisset

@endsection