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
                    <th>ID</th>
                    <th>Servicio</th>
                    <th>Turno</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {if $servicios_realizados|@count > 0}
                    {foreach from=$servicios_realizados item=servicio_realizado}
                        <tr>
                            <td>{$servicio_realizado.id}</td>
                            <td>{$servicio_realizado.servicios_id}</td>
                            <td>{$servicio_realizado.turnos_id}</td>
                            <td>{$servicio_realizado.notas}</td>
                            <td>
                                <!-- Botón para eliminar servicio realizado con confirmación -->
                                <form method="POST" action="eliminar_servicio_realizado.php" class="d-inline" onsubmit="return confirmarEliminacion();">
                                    <input type="hidden" name="id" value="{$servicio_realizado.id}">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="5" class="text-center">No hay servicios realizados registrados.</td>
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
