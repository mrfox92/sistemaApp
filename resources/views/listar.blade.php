@extends("layout.plantilla")

@section("contenido")
<div class="container jumbotron">

    <table class="table">

        <tr>
            <td>N° Consulta</td>
            <td>Nombre paciente</td>
            <td>Propietario</td>
            <td>Observación consulta</td>
            <td>Acción</td>
        </tr>
          
        @foreach ($consulta as $consulta)                            
                <tr>
                    <form action="">
                        <td>{{$consulta->id_consulta}}</td>
                        <td>{{$consulta->paciente->nom_paciente}}</td>
                        <td>{{$consulta->propietario->nom_prop.' '.$consulta->propietario->ape_prop}}</td>
                        <td>{{$consulta->desc_consulta}}</td>
                        <td><input type="submit" name="ver" value="Ver">
                            <input type="submit" name="editar" value="Editar">
                            <input type="submit" name="eliminar" value="Eliminar">
                   </form></td>
                </tr>
        @endforeach
    
    </table>

</div>





@endsection