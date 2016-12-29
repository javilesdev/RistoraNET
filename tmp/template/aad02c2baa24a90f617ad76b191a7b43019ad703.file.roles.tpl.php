<?php /* Smarty version Smarty-3.1.8, created on 2015-04-21 14:03:16
         compiled from "C:\xampp\htdocs\ristoranet\modules\management\views\admin\roles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2248155363c84d7be57-68539007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aad02c2baa24a90f617ad76b191a7b43019ad703' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\modules\\management\\views\\admin\\roles.tpl',
      1 => 1409210815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2248155363c84d7be57-68539007',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'roles' => 0,
    'rl' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55363c84e1a9a3_23866687',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55363c84e1a9a3_23866687')) {function content_55363c84e1a9a3_23866687($_smarty_tpl) {?><h2>Administraci&oacute;n de roles</h2>

<?php if (isset($_smarty_tpl->tpl_vars['roles']->value)&&count($_smarty_tpl->tpl_vars['roles']->value)){?>
    <table class="table table-bordered table-condensed table-striped">
        <tr>
            <th>ID</th>
            <th>Role</th>
            <th></th>
            <th></th>
        </tr>
        
        <?php  $_smarty_tpl->tpl_vars['rl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rl']->key => $_smarty_tpl->tpl_vars['rl']->value){
$_smarty_tpl->tpl_vars['rl']->_loop = true;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['id_role'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['rl']->value['role'];?>
</td>
                <td>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
management/admin/permisos_role/<?php echo $_smarty_tpl->tpl_vars['rl']->value['id_role'];?>
">Permisos</a>
                </td>
                <td>Editar</td>
            </tr>
        <?php } ?>
    </table>
<?php }?>

<p><a class="btn btn-primary" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
management/admin/nuevo_role"><i class="icon-plus-sign icon-white"> </i> Agregar Role</a></p><?php }} ?>