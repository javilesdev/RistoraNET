<?php /* Smarty version Smarty-3.1.8, created on 2014-10-20 19:47:29
         compiled from "/opt/lampp/htdocs/ristoranet/views/login/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123227992154454ab17bb1b7-99716488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b07c585b4057ab388ebc3bf14007309d3cf9734f' => 
    array (
      0 => '/opt/lampp/htdocs/ristoranet/views/login/index.tpl',
      1 => 1407821938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123227992154454ab17bb1b7-99716488',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_54454ab1813ed9_18627891',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54454ab1813ed9_18627891')) {function content_54454ab1813ed9_18627891($_smarty_tpl) {?><div class="col-md-5 col-md-offset-3">
<form class="form-signin" role="form" method="post">
           <input type="hidden" value="1" name="enviar" />
        <h2 class="form-signin-heading">Inicio de Sesion.</h2>
        <input type="text" class="form-control" placeholder="Usuario" name="usuario" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="pass" required>
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
</form>
</div><?php }} ?>