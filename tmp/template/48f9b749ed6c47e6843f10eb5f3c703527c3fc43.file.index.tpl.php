<?php /* Smarty version Smarty-3.1.8, created on 2016-12-29 01:23:10
         compiled from "C:\Users\George Shepard\Desktop\projectos\ristoranet\views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:224795864576e8d01b5-49634870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48f9b749ed6c47e6843f10eb5f3c703527c3fc43' => 
    array (
      0 => 'C:\\Users\\George Shepard\\Desktop\\projectos\\ristoranet\\views\\login\\index.tpl',
      1 => 1407821938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224795864576e8d01b5-49634870',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5864576e8deb97_75846283',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5864576e8deb97_75846283')) {function content_5864576e8deb97_75846283($_smarty_tpl) {?><div class="col-md-5 col-md-offset-3">
<form class="form-signin" role="form" method="post">
           <input type="hidden" value="1" name="enviar" />
        <h2 class="form-signin-heading">Inicio de Sesion.</h2>
        <input type="text" class="form-control" placeholder="Usuario" name="usuario" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="pass" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
</form>
</div><?php }} ?>