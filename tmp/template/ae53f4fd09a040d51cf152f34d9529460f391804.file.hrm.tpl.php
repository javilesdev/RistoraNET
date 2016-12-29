<?php /* Smarty version Smarty-3.1.8, created on 2016-12-29 01:34:30
         compiled from "C:\Users\George Shepard\Desktop\projectos\ristoranet\modules\management\views\admin\hrm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2949458645a16b57a78-34263251%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae53f4fd09a040d51cf152f34d9529460f391804' => 
    array (
      0 => 'C:\\Users\\George Shepard\\Desktop\\projectos\\ristoranet\\modules\\management\\views\\admin\\hrm.tpl',
      1 => 1409214216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2949458645a16b57a78-34263251',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'usuarios' => 0,
    'u' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_58645a16bc07d1_90449116',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58645a16bc07d1_90449116')) {function content_58645a16bc07d1_90449116($_smarty_tpl) {?><div id="content">
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
	<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> My Dashboard</span></h1>	
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel panel-primary">
		<div class="panel-body">
		<a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
management/admin/registro"><i class="fa fa-circle-arrow-up fa-lg"></i>Registrar</a>
		</div>
</div>


<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
				
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-purity" id="wid-id-0" data-widget-editbutton="false">
						
								
								<header>
									<span class="widget-icon"> <i class="fa fa-user"></i> </span>
									<h2>Lista de Empleados/Usuarios</h2>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				
										<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
											
											<thead>
												<tr>
												<th>ID</th>													
												<th>Nombre</th>	
												<th>Usuario</th>													
												<th>Email</th>
												<th>Cargo</th>									
												</tr>
											</thead>
											<tbody>
												<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['u']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['usuarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value){
$_smarty_tpl->tpl_vars['u']->_loop = true;
?>
                  								<tr>
                       								
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
</td>
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['nombre'];?>
</td>
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['usuario'];?>
</td>
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['email'];?>
</td>
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['rol'];?>
</td>
                									<td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
management/admin/permisos_usuario/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
">Permisos</a></td>
            										      								                       
                   								</tr>
                   							<?php } ?>                 
											</tbody>
										</table>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->			
							</div>

<?php }} ?>