<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del empleo">
    </div>
    
    @if ($empleos->count())

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($empleos as $empleo)
                        <tr>
                            <td>{{ $empleo->id }}</td>
                            <td>{{ $empleo->name }}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.empleos.edit', $empleo) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.empleos.destroy', $empleo) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $empleos->links() }}
        </div>
    @else
    <div class="card-body">
        <strong>No hay ningún registro...</strong>
    </div>
    @endif

</div>
