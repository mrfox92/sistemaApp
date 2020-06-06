
<table class="table table-striped table-hover">
    <tbody>
        <thead class="thead-light">
            <tr>
                <th scope="col" >N° Propietario</th>
                <th scope="col" >Nombre Propietario</th>
                <th scope="col" >Acción</th>
            </tr> 
        </thead>

        @forelse ($propietarios as $propietario)
            
            <tr>
                <td>{{ $propietario->id_prop }}</td>
                <td>{{ $propietario->nom_prop }} {{ $propietario->ape_prop }}</td>
                <td>
                    <a class="btn btn-outline-primary"
                        href="#"
                    >
                        Ver
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
    {{ $propietarios->appends(['buscar' => $buscar, 'busqueda' => $radioProp['value'] ])->links() }}
</div>