<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vehículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/templates/styles/Formulario.css"> 
</head>
<body class="bg-light">
    {assign var="titulo" value="Gestión de Vehículos"}
{include file="navbar.tpl"}

    
<div class="container mt-5">
    <h1 class="text-center mb-4 text-white p-3 rounded" style="background: linear-gradient(to right, #007bff, #00c6ff);">
        Lista de Vehiculos
    </h1>

        <!-- Tabla para listar vehículos con estilos mejorados -->
        <div class="table-responsive shadow-lg p-3 bg-white rounded">
            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-secondary text-white text-center">
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
                            <tr class="text-center">
                                <td>{$vehiculo.patente}</td>
                                <td>{$vehiculo.marca}</td>
                                <td>{$vehiculo.modelo}</td>
                                <td>{$vehiculo.dni_cliente}</td>
                                
                            </tr>
                        {/foreach}
                    {else}
                        <tr>
                            <td colspan="5" class="text-center text-danger fw-bold">No hay vehículos registrados.</td>
                        </tr>
                    {/if}
                </tbody>
            </table>
        </div>

        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-lg">Volver al Menú</a>
        </div>
    </div>

    {include file="footer.tpl"}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
