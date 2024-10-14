<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automotion - Lista de Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #343a40;
        }

        .navbar-brand img {
            height: 50px;
        }

        .navbar-title {
            color: white;
            font-size: 24px;
        }

        .container {
            margin-top: 20px;
        }

        .table th, .table td {
            text-align: left;
        }
        
        #mensaje {
            margin: 20px 0;
            font-size: 18px;
            color: green;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo de Automotion">
            <span class="navbar-title">Automotion</span>
        </a>
    </nav>

    <div class="container">
        <h2>Lista de Clientes</h2>

        <div id="mensaje"><?php if (isset($mensaje)) echo $mensaje; ?></div> <!-- Mensaje de éxito/error -->

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
    <?php
    if ($clientes->rowCount() > 0) {
        while ($row = $clientes->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>{$row['dni']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['apellido']}</td>
                <td>{$row['telefono']}</td>
                <td>{$row['email']}</td>
                <td>
                    <form method='POST' action='eliminar_cliente.php'>
                        <input type='hidden' name='dni' value='{$row['dni']}'>
                        <button type='submit' class='btn btn-danger btn-sm'>Eliminar</button>
                    </form>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay clientes registrados.</td></tr>";
    }
    ?>
</tbody>
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

