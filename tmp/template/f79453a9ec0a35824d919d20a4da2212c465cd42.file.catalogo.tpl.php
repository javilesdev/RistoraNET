<?php /* Smarty version Smarty-3.1.8, created on 2014-10-21 01:09:18
         compiled from "/opt/lampp/htdocs/ristoranet/modules/management/views/menu/catalogo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19799141785445961e03c8a5-19687048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f79453a9ec0a35824d919d20a4da2212c465cd42' => 
    array (
      0 => '/opt/lampp/htdocs/ristoranet/modules/management/views/menu/catalogo.tpl',
      1 => 1410206935,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19799141785445961e03c8a5-19687048',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'menus' => 0,
    'u' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5445961e0d5b61_98272029',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5445961e0d5b61_98272029')) {function content_5445961e0d5b61_98272029($_smarty_tpl) {?><div id="content">
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
	<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> My Dashboard</span></h1>	
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel panel-primary">
		<div class="panel-body">
		<a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
management/menu/agregar_menu"><i class="fa fa-circle-arrow-up fa-lg"></i>Registrar</a>
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
												<th>COD #</th>													
												<th>Imagen</th>
												<th>Menu</th>	
												<th>Precio</th>													
												<th>Categoria</th>
												<th>Stock</th>
												<th>Descripcion</th>
												</tr>
											</thead>
											<tbody>
												<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['u']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value){
$_smarty_tpl->tpl_vars['u']->_loop = true;
?>
                  								<tr>
                       								
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['cod'];?>
</td>
                									<td><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/menu/<?php echo $_smarty_tpl->tpl_vars['u']->value['imagen'];?>
"></td>
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['producto'];?>
</td>
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['precio'];?>
</td>
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['categoria'];?>
</td>
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['stock'];?>
</td>
                									<td><?php echo $_smarty_tpl->tpl_vars['u']->value['descripcion'];?>
</td>
            										      								                       
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



<script type="text/javascript">
        $(document).ready(function() {
pageSetUp();    
$('#dt_basic').dataTable();
});
</script><?php }} ?>