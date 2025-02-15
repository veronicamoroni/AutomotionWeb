<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="bg-light">
    {assign var="titulo" value="Gestión de Clientes"}
    {include file="navbar.tpl"}
    

    <div class="container mt-5">
        <h1 class="text-center mb-4 text-white p-3 rounded" style="background: linear-gradient(to right, #007bff, #00c6ff);">
            Lista de Clientes
        </h1>
        
        <!-- Tabla para listar clientes -->
        <div class="table-responsive shadow-lg p-3 bg-white rounded">
            <table class="table table-striped table-hover table-bordered">
                <thead class="bg-secondary text-white">
                    <tr class="text-center">
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                      
                    </tr>
                </thead>
                <tbody>
                    {if $clientes|@count > 0}
                        {foreach from=$clientes item=cliente}
                            <tr class="text-center">
                                <td>{$cliente.dni}</td>
                                <td>{$cliente.nombre}</td>
                                <td>{$cliente.apellido}</td>
                                <td>{$cliente.telefono}</td>
                                <td>{$cliente.email}</td>
                               
                            </tr>
                        {/foreach}
                    {else}
                        <tr>
                            <td colspan="6" class="text-center text-danger fw-bold">No hay clientes registrados.</td>
                        </tr>
                    {/if}
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="/menu" class="btn btn-secondary btn-lg">Volver al Menú</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-white text-center py-3 mt-auto" style="background-color: #004085;">
        <p>© 2025 Automotion - Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
