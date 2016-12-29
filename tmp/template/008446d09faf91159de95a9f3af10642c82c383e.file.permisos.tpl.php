<?php /* Smarty version Smarty-3.1.8, created on 2016-12-29 01:34:34
         compiled from "C:\Users\George Shepard\Desktop\projectos\ristoranet\modules\management\views\admin\permisos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:829358645a1a62a516-24949857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '008446d09faf91159de95a9f3af10642c82c383e' => 
    array (
      0 => 'C:\\Users\\George Shepard\\Desktop\\projectos\\ristoranet\\modules\\management\\views\\admin\\permisos.tpl',
      1 => 1409210834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '829358645a1a62a516-24949857',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'permisos' => 0,
    'rl' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58645a1a67c471_36798480',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58645a1a67c471_36798480')) {function content_58645a1a67c471_36798480($_smarty_tpl) {?><h2>Administración de permisos</h2>

<?php if (isset($_smarty_tpl->tpl_vars['permisos']->value)&&count($_smarty_tpl->tpl_vars['permisos']->value)){?>
<table class="table table-bordered table-condensed table-striped" style="width:500px;">
    <tr>
        <th>ID</th>
        <th>Permiso</th>
        <th>Llave</th>
        <th></th>
    </tr>
    
    <?php  $_smarty_tpl->tpl_vars['rl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permisos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rl']->key => $_smarty_tpl->tpl_vars['rl']->value){
$_smarty_tpl->tpl_vars['rl']->_loop = true;
?>
    
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['id_permiso'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['permiso'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['key'];?>
</td>
            <td>Editar</td>
        </tr>
        
    <?php } ?>
    
</table>
<?php }?>

<p><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
management/admin/nuevo_permiso" class="btn btn-primary"><i class="icon-plus-sign icon-white"> </i> Agregar Permiso</a></p><?php }} ?>