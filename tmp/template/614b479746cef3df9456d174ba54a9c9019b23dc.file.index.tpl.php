<?php /* Smarty version Smarty-3.1.8, created on 2015-04-20 05:46:16
         compiled from "C:\xampp\htdocs\ristoranet\modules\management\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1940355347688124415-25894980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '614b479746cef3df9456d174ba54a9c9019b23dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\modules\\management\\views\\index\\index.tpl',
      1 => 1405757725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1940355347688124415-25894980',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ultimos' => 0,
    'datos2' => 0,
    'ventas' => 0,
    'datos' => 0,
    'consumidos' => 0,
    'datos1' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5534768815e485_46827116',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5534768815e485_46827116')) {function content_5534768815e485_46827116($_smarty_tpl) {?><!-- row -->
					<div class="row">

						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"

								-->
								<header>
									<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
									<h2>Grafico de Ventas</h2>

								</header>

								<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
										<input type="text">
									</div>
									<!-- end widget edit box -->

									<!-- widget content -->
									<div class="widget-body no-padding">

										<div id="sales-graph" class="chart no-padding"></div>

									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->

							</div>
							<!-- end widget -->

						</article>
						<!-- WIDGET END -->

					</div>

					<!-- end row -->

					<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget" id="wid-id-6" data-widget-editbutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"

								-->
								<header>
									<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
									<h2>Producto Mas Vendido</h2>

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

										<div id="donut-graph" class="chart no-padding"></div>

									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->

							</div>

							<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
				
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-purity" id="wid-id-0" data-widget-editbutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
				
								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"
				
								-->
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
												<th>Email</th>
												<th>Cargo</th>													
												<th>Area</th>
												<th>Fecha de Registro</th>										
																									
												</tr>
											</thead>
											<tbody>
												<?php  $_smarty_tpl->tpl_vars['datos2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ultimos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos2']->key => $_smarty_tpl->tpl_vars['datos2']->value){
$_smarty_tpl->tpl_vars['datos2']->_loop = true;
?>
                  								<tr>
                       								<td><?php echo $_smarty_tpl->tpl_vars['datos2']->value['id'];?>
</td>                       								
                       								<td><?php echo $_smarty_tpl->tpl_vars['datos2']->value['nombre'];?>
 <?php echo $_smarty_tpl->tpl_vars['datos2']->value['apellido'];?>
</td>                       
                       								<td><?php echo $_smarty_tpl->tpl_vars['datos2']->value['email'];?>
</td>
                       								<td><?php echo $_smarty_tpl->tpl_vars['datos2']->value['rol'];?>
</td>
                       								<td><?php echo $_smarty_tpl->tpl_vars['datos2']->value['dist'];?>
</td>
                       								<td><?php echo $_smarty_tpl->tpl_vars['datos2']->value['fr'];?>
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
<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			

			
			if ($('#sales-graph').length) {

					Morris.Area({
						element : 'sales-graph',
						data : [
						<?php  $_smarty_tpl->tpl_vars['datos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ventas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->key => $_smarty_tpl->tpl_vars['datos']->value){
$_smarty_tpl->tpl_vars['datos']->_loop = true;
?>
						{
							periodo : '<?php echo $_smarty_tpl->tpl_vars['datos']->value['fecha'];?>
',
							ventas :  <?php echo $_smarty_tpl->tpl_vars['datos']->value['total'];?>

						},
						<?php } ?>
						],
						xkey : 'periodo',
						ykeys : ['ventas'],
						labels : ['Fecha'],
						pointSize : 2,
						hideHover : 'auto'
					});

				}

				// donut
				if ($('#donut-graph').length) {
					Morris.Donut({
						element : 'donut-graph',
						data : [
						<?php  $_smarty_tpl->tpl_vars['datos1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['datos1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['consumidos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['datos1']->key => $_smarty_tpl->tpl_vars['datos1']->value){
$_smarty_tpl->tpl_vars['datos1']->_loop = true;
?>
						{
							value : <?php echo $_smarty_tpl->tpl_vars['datos1']->value['total'];?>
,
							label : '<?php echo $_smarty_tpl->tpl_vars['datos1']->value['producto'];?>
'
						},
						<?php } ?>
						],
						formatter : function(x) {
							return x + "%"
						}
					});
				}



			/* // DOM Position key index //
			
				l - Length changing (dropdown)
				f - Filtering input (search)
				t - The Table! (datatable)
				i - Information (records)
				p - Pagination (paging)
				r - pRocessing 
				< and > - div elements
				<"#id" and > - div with an id
				<"class" and > - div with a class
				<"#id.class" and > - div with an id and class
				
				Also see: http://legacy.datatables.net/usage/features
			*/	
	
			/* BASIC ;*/
			
			$('#dt_basic').dataTable();
	
			
			/* END BASIC */
			
			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": false,
		    	//"bLengthChange": false
		    	//"bAutoWidth": false,
		    	//"bPaginate": false,
		    	//"bStateSave": true // saves sort state using localStorage
				"sDom": "<'dt-toolbar'<'col-xs-6'f><'col-xs-6'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-xs-6'i><'col-xs-6'p>>"
			
		    });
		    
		    // custom toolbar
		    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
		    	   
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );
		    /* END COLUMN FILTER */   
	    
			/* COLUMN SHOW - HIDE */
			$('#datatable_col_reorder').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-6'f><'col-xs-6'C>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-xs-6'i><'col-xs-6'p>>"
			});
			
			/* END COLUMN SHOW - HIDE */
	
			/* TABLETOOLS */
			$('#datatable_tabletools').dataTable({
				
				// Tabletools options: 
				//   https://datatables.net/extensions/tabletools/button_options
				"sDom": "<'dt-toolbar'<'col-xs-6'f><'col-xs-6'T>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-xs-6'i><'col-xs-6'p>>",
		        "oTableTools": {
		        	 "aButtons": [
		             "copy",
		             "csv",
		             "xls",
		                {
		                    "sExtends": "pdf",
		                    "sTitle": "SmartAdmin_PDF",
		                    "sPdfMessage": "SmartAdmin PDF Export",
		                    "sPdfSize": "letter"
		                },
		             	{
	                    	"sExtends": "print",
	                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
	                	}
		             ],
		            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
		        }
			});
			
			/* END TABLETOOLS */
		
		})
		
		$("#smart-form-register").validate({
	
				// Rules for form validation
				rules : {
					name:{
						required : true
					},
					password : {
						required : true,
						minlength : 3,
						maxlength : 20
					},
					passwordConfirm : {
						required : true,
						minlength : 3,
						maxlength : 20,
						equalTo : '#password'
					},
					
					
				},
	
				// Messages for form validation
				messages : {					
					password : {
						required : 'Ingrese Contraseña'
					},
					passwordConfirm : {
						required : 'Ingrese la Contraseña otra vez.',
						equalTo : 'Ingrese una contraseña identica a la anterior.'
					}
				},
	
				// Do not change code below
				errorPlacement : function(error, element) {
					error.insertAfter(element.parent());
				}
			});
	
		</script>	

	<?php }} ?>