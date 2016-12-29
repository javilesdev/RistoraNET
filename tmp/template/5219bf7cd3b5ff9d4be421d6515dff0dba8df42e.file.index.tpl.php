<?php /* Smarty version Smarty-3.1.8, created on 2014-10-20 22:41:05
         compiled from "/opt/lampp/htdocs/ristoranet/modules/management/views/inventario/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156422888454458f818bc2d3-80364422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5219bf7cd3b5ff9d4be421d6515dff0dba8df42e' => 
    array (
      0 => '/opt/lampp/htdocs/ristoranet/modules/management/views/inventario/index.tpl',
      1 => 1410403560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156422888454458f818bc2d3-80364422',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'productos' => 0,
    'prod' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_54458f81978312_49185235',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54458f81978312_49185235')) {function content_54458f81978312_49185235($_smarty_tpl) {?><h2 class="sub-header">Informacion de Productos</h2>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel panel-primary">
		<div class="panel-body">
		          <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Agregar Producto
          </button>
          <a href="javascript: w=window.open('<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
management/inventario/generarReporte');" class="col-xs-3 btn btn-info btn-lg">Generar Planilla</a><div class="col-md-1"></div>
          <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myUpdate">
  Actualizar
</button>
		</div>
</div>

<div class="container-fluid">   
          <form method="post" class="form-actions">
         
              
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
									<h2>Lista de Inventario</h2>
				
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
                  <th>COD</th>
                  <th>Descripcion</th>
                  <th>Marca</th>
                  <th>Formato</th>
                  <th>Existencia</th>
                  <th>Cost. Uni.</th>
                  <th>Total Coste</th>
                  <th>Ultima Actualizacion</th>
                  <th>Cantidad Contada</th>
                  <th>Observacion (Caso)</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($_smarty_tpl->tpl_vars['productos']->value)&&count($_smarty_tpl->tpl_vars['productos']->value)){?>  
        
                <?php  $_smarty_tpl->tpl_vars['prod'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['prod']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['prod']->key => $_smarty_tpl->tpl_vars['prod']->value){
$_smarty_tpl->tpl_vars['prod']->_loop = true;
?> 
                    <tr>
                        <td><input type="hidden" name="codigo_<?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
"><?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['prod']->value['Producto'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['prod']->value['Marca'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['prod']->value['Formato'];?>
</td>
                        <td class="col-sm-1" id="cant<?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
"><?php echo $_smarty_tpl->tpl_vars['prod']->value['Cantidad'];?>
</td>
                        <td class="col-sm-1" id="pre<?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
">$ <?php echo $_smarty_tpl->tpl_vars['prod']->value['Coste'];?>
</td>
                        <td class="col-sm-1"> $ <?php echo $_smarty_tpl->tpl_vars['prod']->value['Total'];?>
</td>
                        <td class="col-sm-1"><?php echo $_smarty_tpl->tpl_vars['prod']->value['Ulog'];?>
</td>
                        <td class="col-sm-1"><input type="numeric" id="ac<?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
" onkeypress="active(event,<?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
);" name="act<?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
" class="form-control"></td>                        
                        <td>              
                            <select name="obs<?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
" class="form-control" id="ob<?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
" onchange="cambio(<?php echo $_smarty_tpl->tpl_vars['prod']->value['COD'];?>
);">                    
                       <option value="0">Seleccione Motivo...</option>
                       <option value="1">Merma</option>
                       <option value="2">Vencido</option>
                       <option value="3">Otro</option>
                   </select>                                          
                </td>
                </tr>
                <?php } ?>      
        
                <?php }else{ ?>
                    <div><strong>No hay Productos Ingresados.</strong></div>
                <?php }?>                
              </tbody>
										</table>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->
          
          
<div class="modal fade" id="myUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Actualizacion de Inventario</h4>
      </div>
      <div class="modal-body">
          Al actualizar el inventario, se generara un Reporte el cual debe ser Imprimido y<br>
          entregado al gerente o subgerente para que sea validado.
      </div>
      <div class="modal-footer">
        <input type="hidden" value="1" name="actualizar">        
        <input type="submit" value="Actualizar" class="btn btn-primary btn-lg">
      </div>
    </div>
  </div>
</div>
              
              

              
              
          </form>
                
      </div>
              
              
    </div>
              
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Ingreso de Producto</h4>
      </div>
        <form method="post" class="form-actions">
      <div class="modal-body">
          
              <div class="form-group">
                    <label for="exampleInputEmail1">Descripcion de Producto</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="producto">
               </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Marca de Producto</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="marca">
               </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Formato de Producto</label>
                    <select class="form-control" name="formato">
                      <option value="0">Seleccione...</option>
                      <option value="KG">KG</option>
                      <option value="LT">LT</option>
                      <option value="BOTELLA">BOTELLA</option>
                      <option value="FRASCO">FRASCO</option>
                      <option value="SOBRE">SOBRE</option>
                      <option value="LATA">LATA</option>
                      <option value="BOLSITA">BOLSITA</option>
                      <option value="BOLSA">BOLSA</option>
                      <option value="DISPLAY">DISPLAY</option>
                      <option value="BOTE">BOTE</option>
                    </select>
               </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Cantidad/Existencia</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name="cant">
               </div>
              <div class="form-group">
                    <label for="exampleInputEmail1">Coste de Producto</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="coste">
               </div>
          
      </div>
      <div class="modal-footer">
          <input type="hidden" name="ingresar" value="1">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Ingresar">
      </div>
        </form>
    </div>
  </div>
</div>


<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			
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