<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Servicios</h1>

        <!-- Tabla para listar servicios -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Costo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {if $servicios|@count > 0}
                    {foreach from=$servicios item=servicio}
                        <tr>
                            <td>{$servicio.id}</td>
                            <td>{$servicio.descripcion}</td>
                            <td>{$servicio.costo}</td>
                            <td>
                                <!-- Botón para eliminar servicio -->
                                <form method="POST" action="eliminar_servicio.php" class="d-inline">
                                    <input type="hidden" name="id" value="{$servicio.id}">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="4" class="text-center">No hay servicios registrados.</td>
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
