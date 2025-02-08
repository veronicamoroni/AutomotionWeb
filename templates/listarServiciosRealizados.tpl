<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Servicios Realizados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Servicios Realizados</h1>

        <!-- Tabla para listar servicios realizados -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Turno_id</th>
                    <th>Fecha</th>
                    <th>hora</th>
                    <th>Servicio_id</th>
                    <th>Nombre</th>
                    <th>Costo</th>
                    <th>Servicio_id</th>
                    <th>Notas</th>
                   
                   
                </tr>
            </thead>
            <tbody>
               {if $servicios_realizados|@count > 0}
        {foreach from=$servicios_realizados item=servicio_realizado}
            <tr>
                <td>{$servicio_realizado.servicio_id}</td> <!-- ID de la tabla servicios -->
                <td>{$servicio_realizado.turno_id}</td> <!-- ID del turno -->
                <td>{$servicio_realizado.fecha_turno}</td> <!-- Fecha del turno -->
                <td>{$servicio_realizado.hora_turno}</td> <!-- Hora del turno -->
                <td>{$servicio_realizado.servicio_id}</td> <!-- ID de la tabla servicios -->
                <td>{$servicio_realizado.servicio_nombre}</td> <!-- Descripción del servicio -->
                <td>{$servicio_realizado.costo}</td> <!-- Costo del servicio -->
                <td>{$servicio_realizado.notas}</td>
               
            </tr>
        {/foreach}
    {else}
        <tr>
            <td colspan="7" class="text-center">No hay servicios realizados registrados.</td>
        </tr>
    {/if}
            </tbody>
        </table>

        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-block">Volver al Menú</a>
        </div>
    </div>

    <script>
        function confirmarEliminacion() {
            return confirm("¿Estás seguro de que deseas eliminar este servicio realizado?");
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
