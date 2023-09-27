<table>
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Tipo de Activo</th>
            <th>Estado</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
        <tr>
            <td>{{ $equipo->descripcion }}</td>
            <td>{{ $equipo->marca }}</td>
            <td>{{ $equipo->modelo }}</td>
            <td>{{ $equipo->tipoActivo }}</td>
            <td>{{ $equipo->estado }}</td>
            <td>{{ $equipo->nombre }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
