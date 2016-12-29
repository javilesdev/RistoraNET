<?php /* Smarty version Smarty-3.1.8, created on 2015-04-20 06:13:24
         compiled from "C:\xampp\htdocs\ristoranet\modules\management\views\config\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2109455347ce48489c8-88710592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a742862c4908dcb9d8747c225f7db24375366c01' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\modules\\management\\views\\config\\index.tpl',
      1 => 1413845618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2109455347ce48489c8-88710592',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55347ce4874b18_55482664',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55347ce4874b18_55482664')) {function content_55347ce4874b18_55482664($_smarty_tpl) {?><div class="jumbotron">
<legend>Respaldo y Restauración</legend>



<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://icons.iconarchive.com/icons/esxxi.me/hdrv/128/Blue-Backup-W-icon.png" data-src="holder.js/300x300" alt="...">
      <div class="caption">
        <h3>RESPALDO BASE DE DATOS</h3>
        <p>Este mecanismo permite el respaldo de la Base de Datos, siendo guardado y luego su posible utilización.</p>
        <p><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
management/config/doBackupLin" class="btn btn-primary" role="button">Respaldar</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="http://icons.iconarchive.com/icons/thiago-silva/palm/128/Settings-Backup-Sync-icon.png" data-src="holder.js/300x300" alt="...">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  </div>
</div>
</div>
<?php }} ?>