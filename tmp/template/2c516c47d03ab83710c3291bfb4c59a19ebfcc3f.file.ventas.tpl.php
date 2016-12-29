<?php /* Smarty version Smarty-3.1.8, created on 2015-04-20 04:12:26
         compiled from "C:\xampp\htdocs\ristoranet\modules\management\views\contabilidad\ventas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3176555347caabd8d46-64364753%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c516c47d03ab83710c3291bfb4c59a19ebfcc3f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\modules\\management\\views\\contabilidad\\ventas.tpl',
      1 => 1411397333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3176555347caabd8d46-64364753',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'boletas' => 0,
    'b' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55347caac16d40_41397837',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55347caac16d40_41397837')) {function content_55347caac16d40_41397837($_smarty_tpl) {?><div class="content">
	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				Gestion de Contabilidad
			</h1>
		</div>
	</div>		
	
	<section id="widget-grid" class="">
			<!-- row -->
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
									<h2>Sales Graph</h2>

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


	</section>
	<div class="panel panel-primary">
  <div class="panel-heading">
    Utilidades - Reporte de Boletas
  </div>
  <div class="panel-body">
  
  <legend>Reporte de Boletas por Rango</legend>
  
  <form class="form-inline" role="form">
  	<div class="form-group">
  		<label>Desde</label>
  		<input type="date" class="form-control" id="date1">
  	</div>
  	<div class="form-group">
  		<label>Hasta</label>
  		<input type="date" class="form-control" id="date2">
  	</div>  
  	<div class="form-group">
  		<button type="button" class="btn btn-primary" onclick="getDif();">
  			Crear Reporte
  		</button>
  	
  		</form>
  	</div>
    	
  </div>
</div>
	<section id="widget-grid" class="">
			<!-- row -->
			<div class="row">
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
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
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>Standard Data Tables </h2>
									
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
													<th>Folio</th>
													<th><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"<></i> Fecha</th>
													<th><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Usuario</th>
													<th>Neto</th>
													<th><i class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i> IVA</th>
													<th>Extras</th>
													<th><i class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i> TOTAL</th>
												</tr>
											</thead>
											<tbody id="boletas">												
											</tbody>
											</table>
											</div>
											</div>
											</div>
											</article>	

			</div>
	</section>					
</div>



<script>

var ruta_root = "<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
"
	  $.post('/ristoranet/management/contabilidad/getBoletas', function(datos){ 
  $('#boletas').html('');       
        for(var i = 0; i < datos.length; i++){  
            $('#boletas').append('<tr><td>'+datos[i].folio+'</td><td>'+datos[i].fecha+'</td><td>'+datos[i].nombre+'</td><td>'+datos[i].neto+'</td><td>'+datos[i].iva+'</td><td>'+datos[i].pro+'</td><td>'+datos[i].total+'</td></tr>')
        }       
    }

,'json');

function getDif(){
if($("#date1").val() > $("#date2").val()){
	alert("Las fechas ingresadas son Invalidad. Vuelta a Ingresar un rango de fechas correspondientes.")
	return false
}
var date1 = $('#date1').val() 
var date2 = $('#date2').val() 

window.location.href = ruta_root + "management/contabilidad/getReporte?date1="+date1+"&date2="+date2;
}

		pageSetUp();
		$('#dt_basic').dataTable();

		// non date data		
				if ($('#sales-graph').length) {

					Morris.Area({
						element : 'sales-graph',
						data : [
						
						<?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['boletas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value){
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>	
						{
							periodo : '<?php echo $_smarty_tpl->tpl_vars['b']->value['fecha'];?>
',
							boleta : <?php echo $_smarty_tpl->tpl_vars['b']->value['total'];?>
,
						},
						
						<?php } ?>
						
						],						
						xkey : 'periodo',
						ykeys : ['boleta'],
						labels : ['Transaccion'],
						pointSize : 2,
						hideHover : 'auto'
					});

				}
			

function exit( status ) { 

    var i;

    if (typeof status === 'string') {
        alert(status);
    }

    window.addEventListener('error', function (e) {e.preventDefault();e.stopPropagation();}, false);

    var handlers = [
        'copy', 'cut', 'paste',
        'beforeunload', 'blur', 'change', 'click', 'contextmenu', 'dblclick', 'focus', 'keydown', 'keypress', 'keyup', 'mousedown', 'mousemove', 'mouseout', 'mouseover', 'mouseup', 'resize', 'scroll',
        'DOMNodeInserted', 'DOMNodeRemoved', 'DOMNodeRemovedFromDocument', 'DOMNodeInsertedIntoDocument', 'DOMAttrModified', 'DOMCharacterDataModified', 'DOMElementNameChanged', 'DOMAttributeNameChanged', 'DOMActivate', 'DOMFocusIn', 'DOMFocusOut', 'online', 'offline', 'textInput',
        'abort', 'close', 'dragdrop', 'load', 'paint', 'reset', 'select', 'submit', 'unload'
    ];

    function stopPropagation (e) {
        e.stopPropagation();
        // e.preventDefault(); // Stop for the form controls, etc., too?
    }
    for (i=0; i < handlers.length; i++) {
        window.addEventListener(handlers[i], function (e) {stopPropagation(e);}, true);
    }

    if (window.stop) {
        window.stop();
    }

    throw '';
}


</script>
<?php }} ?>