<?php
/* Smarty version 5.4.0, created on 2025-02-09 22:08:03
  from 'file:crearServicioRealizado.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67a91933eb0463_23488293',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d2590c8ec559c4a49ce01cd73426f65414a3111' => 
    array (
      0 => 'crearServicioRealizado.tpl',
      1 => 1739131112,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67a91933eb0463_23488293 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Servicio Realizado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Registrar Servicio Realizado</h3>
                    </div>
                    <div class="card-body">
                        <form action="/index.php?action=crearServicioRealizado" method="POST" id="formServicioRealizado">
                            
                            <!-- ID del Servicio -->
                            <div class="form-group">
                                <label for="servicios_id">ID del Servicio:</label>
                                <input type="number" class="form-control" id="servicios_id" name="servicios_id" required>
                            </div>

                            <!-- ID del Turno -->
                            <div class="form-group">
                                <label for="turnos_id">ID del Turno:</label>
                                <input type="number" class="form-control" id="turnos_id" name="turnos_id" required>
                            </div>

                            <!-- Notas -->
                            <div class="form-group">
                                <label for="notas">Notas:</label>
                                <textarea class="form-control" id="notas" name="notas" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-success btn-lg btn-block">Registrar Servicio Realizado</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="/menu" class="btn btn-secondary btn-sm">Volver al Menú</a>
        </div>
    </div>

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
