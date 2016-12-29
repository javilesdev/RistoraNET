<?php /* Smarty version Smarty-3.1.8, created on 2015-04-20 04:45:14
         compiled from "C:\xampp\htdocs\ristoranet\views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68955534683a6347e5-10981345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b6f6b8df10710fb0772e85e7d353f17d97927ea' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\views\\login\\index.tpl',
      1 => 1407821938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68955534683a6347e5-10981345',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5534683a635f45_59392957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5534683a635f45_59392957')) {function content_5534683a635f45_59392957($_smarty_tpl) {?><div class="col-md-5 col-md-offset-3">
<form class="form-signin" role="form" method="post">
           <input type="hidden" value="1" name="enviar" />
        <h2 class="form-signin-heading">Inicio de Sesion.</h2>
        <input type="text" class="form-control" placeholder="Usuario" name="usuario" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="pass" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
</form>
</div><?php }} ?>