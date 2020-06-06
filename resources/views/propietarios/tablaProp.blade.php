<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Fono</th>
            <th>Email</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($propietarios as $propietario)
            <tr>
                <td>{{ $propietario->id_prop }}</td>
                <td>{{ $propietario->nom_prop }} {{ $propietario->ape_prop }}</td>
                <td>{{ $propietario->direccion_prop }}</td>
                <td>{{ $propietario->fono_prop }}</td>
                <td>{{ $propietario->email_prop }}</td>
                <td colspan="3">
                    <a href="{{ route('propietarios.show', ['propietario' => $propietario->id_prop]) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('propietarios.edit', ['propietario' => $propietario->id_prop]) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                    @if ( $propietario->deleted_at )
                    <form style="display: inline;" method="POST" action="{{ route('propietarios.restaurar', ['propDeleted' => $propietario->id_prop]) }}">
                        @csrf
                        {{-- @method('PUT') --}}
                        <button id="restart" class="btn btn-dark" type="submit"><i class="fas fa-trash-restore"></i></button>
                    </form>
                    @endif
                    @if ( !$propietario->deleted_at )
                    <form style="display: inline;" method="POST" action="{{ route('propietarios.destroy', ['propietario' => $propietario->id_prop]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                    </form>
                    @endif
                </td>
            </tr>
        @empty
            <div class="alert alert-dark">
                <strong>{{ __("No hay datos que cargar de momento") }}</strong>
            </div>
        @endforelse
    </tbody>
</table>