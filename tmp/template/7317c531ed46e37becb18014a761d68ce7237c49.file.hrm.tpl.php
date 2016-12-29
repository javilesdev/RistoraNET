<?php /* Smarty version Smarty-3.1.8, created on 2015-04-21 14:03:11
         compiled from "C:\xampp\htdocs\ristoranet\modules\management\views\admin\hrm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1186755363c7f243102-68685256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7317c531ed46e37becb18014a761d68ce7237c49' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\modules\\management\\views\\admin\\hrm.tpl',
      1 => 1409214216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1186755363c7f243102-68685256',
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
  'unifunc' => 'content_55363c7f3a0267_46091050',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55363c7f3a0267_46091050')) {function content_55363c7f3a0267_46091050($_smarty_tpl) {?><div id="content">
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