<?php /* Smarty version Smarty-3.1.8, created on 2014-10-21 01:06:03
         compiled from "/opt/lampp/htdocs/ristoranet/views/error/access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2529516115445955baa66f3-77876053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '517a10ec3d2c67a3945b85f656af565760508581' => 
    array (
      0 => '/opt/lampp/htdocs/ristoranet/views/error/access.tpl',
      1 => 1335208334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2529516115445955baa66f3-77876053',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mensaje' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5445955bb2af09_32251238',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5445955bb2af09_32251238')) {function content_5445955bb2af09_32251238($_smarty_tpl) {?><h2><?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)){?> <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
<?php }?></h2>

<p>&nbsp;</p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

<?php if ((!Session::get('autenticado'))){?>

| <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login">Iniciar Sesi&oacute;n</a>

<?php }?><?php }} ?>