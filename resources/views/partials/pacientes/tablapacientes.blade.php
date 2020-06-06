
<table class="table table-striped table-hover">
    <tbody>
        <thead class="thead-light">
            <tr>
                <th scope="col">N° Paciente</th>
                <th scope="col">Nombre paciente</th>
                <th scope="col">Propietario</th>
                <th scope="col">Ver</th>
                <th scope="col">Editar</th>
            </tr> 
        </thead>

        @forelse ($pacientes as $paciente)     
               
            <tr>
                <td>{{ $paciente->id_paciente }}</td>
                <td>{{ $paciente->nom_paciente }}</td>
                <td>{{ $paciente->propietario->nom_prop }} {{ $paciente->propietario->ape_prop }}</td>
                <td>
                    <a class="btn btn-success"
                        href="{{ route('pacientes.historial', ['paciente' => $paciente->id_paciente]) }}"
                    >
                        Historial Paciente
                    </a>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('pacientes.editar', ['paciente' => $paciente->id_paciente]) }}">
                        Editar
                    </a>
                </td>
            </tr>
        @empty    
            <div class="alert alert-dark" role="alert">
                No hay resultados para: <strong>{{ $buscar }}</strong>
            </div>
        @endforelse
      
    </tbody>
</table>

<div class="row justify-content-center">
    {{ $pacientes->appends(['buscar' => $buscar, 'busqueda' => $radioPaciente['value'] ])->links() }}
</div>