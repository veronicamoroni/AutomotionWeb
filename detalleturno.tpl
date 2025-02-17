<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Turno</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        {if isset($detalleTurno)}
            <h2>Detalles del Turno</h2>
            <p><strong>ID del Turno:</strong> {$detalleTurno.turnos_id}</p>
            <p><strong>Fecha:</strong> {$detalleTurno.fecha}</p>
            <p><strong>Hora:</strong> {$detalleTurno.hora}</p>
            <p><strong>Descripción:</strong> {$detalleTurno.descripcion_turno}</p>
            <p><strong>Patente del Vehículo:</strong> {$detalleTurno.patente}</p>
            <p><strong>Cliente:</strong> {$detalleTurno.cliente}</p>
            <p><strong>Costo Total:</strong> \${$detalleTurno.total_gastado}</p>
        {elseif isset($mensaje)}
            <div class="alert alert-warning">
                {$mensaje}
            </div>
        {/if}
        <a href=""menu"" class="btn btn-secondary">Volver al Formulario</a>
    </div>
</body>
</html>