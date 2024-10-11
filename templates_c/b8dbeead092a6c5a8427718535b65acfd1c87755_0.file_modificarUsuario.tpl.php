<?php
/* Smarty version 5.4.0, created on 2024-10-11 18:59:31
  from 'file:modificarUsuario.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67095973d2bd72_23229942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8dbeead092a6c5a8427718535b65acfd1c87755' => 
    array (
      0 => 'modificarUsuario.tpl',
      1 => 1728665803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67095973d2bd72_23229942 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Contraseña</title>
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
                <h2>Actualizar Contraseña</h2>
            </div>
          
           <form action="index.php?action=modificarContrasena" method="POST">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getValue('usuario')['id'];?>
">

    <label for="nueva_contrasena">Nueva Contraseña:</label>
    <input type="password" name="nueva_contrasena" required>

    <input type="submit" value="Actualizar Contraseña">
</form>

        </div>
    </div>
</body>
</html>
<?php }
}
