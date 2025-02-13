<?php
/* Smarty version 5.4.0, created on 2025-02-14 00:15:09
  from 'file:templates/eliminarCliente.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67ae7cfd41e8a9_45352581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89a0e4cc4736ad6884e8a9727546cbfc2f672bc2' => 
    array (
      0 => 'templates/eliminarCliente.tpl',
      1 => 1739488502,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
))) {
function content_67ae7cfd41e8a9_45352581 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/styles/Formulario.css">
</head>
<body class="bg-light">
    <?php $_smarty_tpl->assign('titulo', "Gestión de Clientes", false, NULL);?>
    <?php $_smarty_tpl->renderSubTemplate("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-lg" style="max-width: 500px; width: 100%;"> <!-- Aplicado el estilo shadow-lg y max-width -->
            <div class="text-center mb-4">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #dc3545;">delete_forever</span> <!-- Icono delete -->
                <h3 class="mt-2">Eliminar Cliente</h3>
            </div>
            <form action="/index.php?action=eliminarCliente" method="post">
                <div class="form-group">
                    <label for="dni">DNI del cliente a Eliminar:</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <button type="submit" class="btn btn-danger w-100 mt-3">Eliminar Usuario</button> <!-- Se añadió la clase w-100 y mt-3 -->
            </form>
            <div class="text-center mt-3">
                <a href="/menu" class="btn btn-secondary w-100">Volver al Menú</a> <!-- Se añadió la clase w-100 -->
            </div>
        </div>
    </div>
    <?php echo '<script'; ?>
>
        document.querySelector('form').onsubmit = function(event) {
            event.preventDefault(); // Evita el envío automático del formulario
    
            const form = event.target;
            const formData = new FormData(form);
            const mensajeDiv = document.createElement('div'); // Crear un div para el mensaje
            mensajeDiv.className = "message mt-3 alert text-center";
            form.appendChild(mensajeDiv); // Agregar el mensaje debajo del formulario
    
            fetch('/index.php?action=eliminarCliente', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                mensajeDiv.innerHTML = data;
                mensajeDiv.classList.add('alert-success'); // Mensaje de éxito
                form.reset(); // Reiniciar formulario
            })
            .catch(error => {
                mensajeDiv.innerHTML = 'Error al eliminar el cliente.';
                mensajeDiv.classList.add('alert-danger');
            });
    
            mensajeDiv.style.display = 'block';
        };
    <?php echo '</script'; ?>
>
    
    <?php $_smarty_tpl->renderSubTemplate("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
