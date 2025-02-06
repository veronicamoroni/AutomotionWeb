<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Turnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Turnos</h1>

        <!-- Tabla para listar turnos -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Descripción</th>
                    <th>Patente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {if $turnos|@count > 0}
                    {foreach from=$turnos item=turno}
                        <tr>
                            <td>{$turno.id}</td>
                            <td>{$turno.fecha}</td>
                            <td>{$turno.hora}</td>
                            <td>{$turno.descripcion}</td>
                            <td>{$turno.patente}</td>
                            <td>
                                <!-- Botón para eliminar turno -->
                                <form method="POST" action="eliminar_turno.php" class="d-inline">
                                    <input type="hidden" name="id" value="{$turno.id}">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="6" class="text-center">No hay turnos registrados.</td>
                    </tr>
                {/if}
            </tbody>
        </table>

        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
