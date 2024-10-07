<?php
/* Smarty version 5.4.0, created on 2024-10-07 02:23:40
  from 'file:modificarCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67032a0cc52229_60535046',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6a8381598d574fa711f89ba36b336698fae40f5' => 
    array (
      0 => 'modificarCliente.tpl',
      1 => 1728260613,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67032a0cc52229_60535046 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo">
        </a>
        <div class="navbar-title">Automotion</div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4">
            <div class="text-center mb-4">
                <span class="material-symbols-outlined">Editar Cliente</span>
            </div>
          
            <form action="index.php?action=modificarCliente" method="post">
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"  required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email"  required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Actualizar Cliente</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php }
}
