<?php
/* Smarty version 5.4.0, created on 2025-02-21 17:02:49
  from 'file:navbar.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67b8a3a985a345_91565782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82a3f7eba4110345d6ef7bd48aa68a81a063f9e2' => 
    array (
      0 => 'navbar.tpl',
      1 => 1740153763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67b8a3a985a345_91565782 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\AutomotionWeb\\templates';
?><nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004085;">
    <a class="navbar-brand" href="#">
        <img src="/templates/logo.png" alt="Logo" style="height: 70px;">
    </a>
    <div class="navbar-title mx-auto text-center text-white" style="font-size: 2rem;">
        <?php echo $_smarty_tpl->getValue('titulo');?>

    </div>
</nav>
<?php }
}
