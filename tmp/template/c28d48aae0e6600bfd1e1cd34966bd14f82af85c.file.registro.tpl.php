<?php /* Smarty version Smarty-3.1.8, created on 2015-04-21 14:03:15
         compiled from "C:\xampp\htdocs\ristoranet\modules\management\views\admin\registro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:997655363c832cb756-35855521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c28d48aae0e6600bfd1e1cd34966bd14f82af85c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\modules\\management\\views\\admin\\registro.tpl',
      1 => 1407308832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '997655363c832cb756-35855521',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'roles' => 0,
    'rl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55363c83312207_39609034',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55363c83312207_39609034')) {function content_55363c83312207_39609034($_smarty_tpl) {?><div class="row">
<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false">								
								<header>
									<span class="widget-icon"> <i class="fa fa-eye"></i> </span>
									<h1>Formulario de Registro</h1>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body">
				
										<form class="form-horizontal" id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
management/admin/registro" enctype="multipart/form-data">
											
											<fieldset>
												<legend>Datos Basicos</legend>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Nombre Completo</b></label>
													<div class="col-md-3">
													
														<input class="form-control" id="nombre" placeholder="" type="text" name="nombre">
														<b class="tooltip tooltip-bottom-right">Informacion Escencial</b> </label>
													
													</div>

												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Usuario</b></label>
													<div class="col-md-3">
														<input class="form-control" placeholder="" type="text" name="usuario" id="usuario">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Contraseña</b></label>
													<div class="col-md-3">
														<input class="form-control" placeholder="" type="password" id="password" name="password">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Confirme Contraseña</b></label>
													<div class="col-md-3">
														<input class="form-control" placeholder="" type="password" name="repassword" id="repassword">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Email</b></label>
													<div class="col-md-3">
														<input class="form-control" placeholder="" type="email" name="email" id="email">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Rol/Cargo</b></label>
													<div class="col-md-3">
													<select class="form-control" id="rol" name="rol">
														<?php  $_smarty_tpl->tpl_vars['rl'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rl']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['roles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rl']->key => $_smarty_tpl->tpl_vars['rl']->value){
$_smarty_tpl->tpl_vars['rl']->_loop = true;
?>
                										<option value="<?php echo $_smarty_tpl->tpl_vars['rl']->value['id_role'];?>
"><?php echo $_smarty_tpl->tpl_vars['rl']->value['role'];?>
</option>
            											<?php } ?>
													</select>
													</div>
												</div>
									</fieldset>
									<fieldset>
										<input type="hidden" value="1" name="registrar">
										<input type="submit" value="Registrar" class="btn btn-success btn-lg">
									</fieldset>
</form>
</div>
</div>
</div>
</div>

<?php }} ?>