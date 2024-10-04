<?php
/* Smarty version 5.4.0, created on 2024-09-29 22:22:27
  from 'file:listarClientes.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_66f9b703515420_12693602',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78003b82d23de4884fb81241a55df243f922c7bd' => 
    array (
      0 => 'listarClientes.tpl',
      1 => 1727641343,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66f9b703515420_12693602 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
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
            margin-left: 20px;
        }

        .card {
            border: 1px solid #ced4da;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            color: #343a40;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-center {
            margin-bottom: 20px;
        }

        .material-symbols-outlined {
            font-size: 50px;
            color: #007bff;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="Logo"> <!-- Asegúrate de tener tu logo -->
            </a>
            <span class="navbar-title">Automotion</span>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Lista de Clientes</h2>
                <form action="index.php?action=listarClientes" method="post">
                    <table class="table table-bordered">
                        
                        <thead>
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
                            
                          
                                    <button type="submit" name="modificar" class="btn btn-primary">Modificar</button>
                                    <button type="submit" name="eliminar" value="" class="btn btn-danger">Eliminar</button>
                                </td>
                            </tr>
                            <!-- Puedes agregar más filas dinámicamente aquí -->
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.slim.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
