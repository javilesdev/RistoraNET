<?php /* Smarty version Smarty-3.1.8, created on 2016-12-29 01:34:33
         compiled from "C:\Users\George Shepard\Desktop\projectos\ristoranet\modules\management\views\admin\roles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:956458645a195d9c80-01340295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0df90f295204bfd0e6bcbed9a994f3edf20d1a09' => 
    array (
      0 => 'C:\\Users\\George Shepard\\Desktop\\projectos\\ristoranet\\modules\\management\\views\\admin\\roles.tpl',
      1 => 1409210815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '956458645a195d9c80-01340295',
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
  'unifunc' => 'content_58645a196858e0_24168555',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58645a196858e0_24168555')) {function content_58645a196858e0_24168555($_smarty_tpl) {?><h2>Administraci&oacute;n de roles</h2>

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