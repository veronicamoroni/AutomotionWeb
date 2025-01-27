<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Clientes</h1>

        <!-- Tabla para listar clientes -->
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {if $clientes|@count > 0}
                    {foreach from=$clientes item=cliente}
                        <tr>
                            <td>{$cliente.dni}</td>
                            <td>{$cliente.nombre}</td>
                            <td>{$cliente.apellido}</td>
                            <td>{$cliente.telefono}</td>
                            <td>{$cliente.email}</td>
                            <td>
                                <!-- Botón para eliminar cliente -->
                                <form method="POST" action="eliminar_cliente.php" class="d-inline">
                                    <input type="hidden" name="dni" value="{$cliente.dni}">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    {/foreach}
                {else}
                    <tr>
                        <td colspan="6" class="text-center">No hay clientes registrados.</td>
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

