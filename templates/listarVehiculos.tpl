<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vehículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Vehículos</h1>

        <!-- Tabla para listar vehículos -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Patente</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>DNI del Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {if $vehiculos|@count > 0}
                    {foreach from=$vehiculos item=vehiculo}
                        <tr>
                            <td>{$vehiculo.patente}</td>
                            <td>{$vehiculo.marca}</td>
                            <td>{$vehiculo.modelo}</td>
                            <td>{$vehiculo.dni_cliente}</td>
                            <td>
                                <!-- Botón para eliminar vehículo -->
                                <form method="POST" action="eliminar_vehiculo.php" class="d-inline">
                                    <input type="hidden" name="patente" value="{$vehiculo.patente}">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="5" class="text-center">No hay vehículos registrados.</td>
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
