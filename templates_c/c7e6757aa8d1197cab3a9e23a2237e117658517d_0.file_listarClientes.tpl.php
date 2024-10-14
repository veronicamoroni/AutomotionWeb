<?php
/* Smarty version 5.4.0, created on 2024-10-13 02:17:33
  from 'file:templates/listarClientes.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_670b119df37652_37900561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7e6757aa8d1197cab3a9e23a2237e117658517d' => 
    array (
      0 => 'templates/listarClientes.tpl',
      1 => 1728778548,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_670b119df37652_37900561 (\Smarty\Template $_smarty_tpl) {
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

        <div id="mensaje"><?php echo '<?php'; ?>
 if (isset($mensaje)) echo $mensaje; <?php echo '?>'; ?>
</div> <!-- Mensaje de éxito/error -->

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
                <?php echo '<?php'; ?>

                $clientes = $this->cliente->obtenerClientes();
                if ($clientes->rowCount() > 0) {
                    while ($row = $clientes->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                            <td><?php echo $_smarty_tpl->getValue('row')['dni'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('row')['nombre'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('row')['apellido'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('row')['telefono'];?>
</td>
                            <td><?php echo $_smarty_tpl->getValue('row')['email'];?>
</td>
                            <td>
                                <form method='POST' action='eliminar_cliente.php'>
                                    <input type='hidden' name='dni' value='<?php echo $_smarty_tpl->getValue('row')['dni'];?>
'>
                                    <button type='submit' class='btn btn-danger btn-sm'>Eliminar</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay clientes registrados.</td></tr>";
                }
                <?php echo '?>'; ?>

            </tbody>
        </table>
    </div>
</body>
</html>

<?php }
}
