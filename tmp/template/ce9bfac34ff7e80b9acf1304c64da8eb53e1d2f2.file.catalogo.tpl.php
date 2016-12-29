<?php /* Smarty version Smarty-3.1.8, created on 2015-04-21 14:08:39
         compiled from "C:\xampp\htdocs\ristoranet\modules\mobile\views\comanda\catalogo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3119255363dc7a9a944-66120289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce9bfac34ff7e80b9acf1304c64da8eb53e1d2f2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\modules\\mobile\\views\\comanda\\catalogo.tpl',
      1 => 1410823447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3119255363dc7a9a944-66120289',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'trans' => 0,
    'mesa' => 0,
    'seccion' => 0,
    'capacidad' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55363dc7b17923_47455325',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55363dc7b17923_47455325')) {function content_55363dc7b17923_47455325($_smarty_tpl) {?><style type="text/css">
/*
 * Base structure
 */

/* Move down content because we have a fixed navbar that is 50px tall */
body {
  padding-top: 50px;
}


/*
 * Global add-ons
 */

.sub-header {
  padding-bottom: 10px;
  border-bottom: 1px solid #eee;
}

/*
 * Top navigation
 * Hide default border to remove 1px line.
 */
.navbar-fixed-top {
  border: 0;
}

/*
 * Sidebar
 */

/* Hide for mobile, show later */
.sidebar {
  display: none;
}
@media (min-width: 768px) {
  .sidebar {
    position: fixed;
    top: 51px;
    bottom: 0;
    left: 0;
    z-index: 1000;
    display: block;
    padding: 20px;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    background-color: #f5f5f5;
    border-right: 1px solid #eee;
  }
}

.rsidebar{
	position: fixed;
	top: 55px;
	bottom: 0;
	right: 0;
	z-index: 1000;
	padding-right: 10px;
	overflow-x:hidden;
	overflow-y: auto;
	background-color: #f5f5f5;
	display: block;
}

/* Sidebar navigation */
.nav-sidebar {
  margin-right: -21px; /* 20px padding + 1px border */
  margin-bottom: 20px;
  margin-left: -20px;
}
.nav-sidebar > li > a {
  padding-right: 20px;
  padding-left: 20px;
}
.nav-sidebar > .active > a,
.nav-sidebar > .active > a:hover,
.nav-sidebar > .active > a:focus {
  color: #fff;
  background-color: #428bca;
}


/*
 * Main content
 */

.main {
  padding: 20px;
}
@media (min-width: 768px) {
  .main {
    padding-right: 40px;
    padding-left: 40px;
  }
}
.main .page-header {
  margin-top: 0;
}


/*
 * Placeholder dashboard ideas
 */

.placeholders {
  margin-bottom: 30px;
  text-align: center;
}
.placeholders h4 {
  margin-bottom: 0;
}
.placeholder {
  margin-bottom: 20px;
}
.placeholder img {
  display: inline-block;
  border-radius: 50%;}

 #menumob{

 }


 thead.fixedHeader tr {
	position: relative
}

/* set THEAD element to have block level attributes. All other non-IE browsers            */
/* this enables overflow to work on TBODY element. All other non-IE, non-Mozilla browsers */
html>body thead.fixedHeader tr {
	display: block
}

/* make the TH elements pretty */
thead.fixedHeader th {
	
}

/* make the A elements pretty. makes for nice clickable headers                */
thead.fixedHeader a, thead.fixedHeader a:link, thead.fixedHeader a:visited {
	color: #FFF;
	display: block;
	text-decoration: none;
	width: 100%
}

/* make the A elements pretty. makes for nice clickable headers                */
/* WARNING: swapping the background on hover may cause problems in WinIE 6.x   */
thead.fixedHeader a:hover {
	color: #FFF;
	display: block;
	text-decoration: underline;
	width: 100%
}

/* define the table content to be scrollable                                              */
/* set TBODY element to have block level attributes. All other non-IE browsers            */
/* this enables overflow to work on TBODY element. All other non-IE, non-Mozilla browsers */
/* induced side effect is that child TDs no longer accept width: auto                     */
html>body tbody.scrollContent {
	display: block;
	height: 200px;
	overflow: auto;
	width: 100%
}

/* make TD elements pretty. Provide alternating classes for striping the table */
/* http://www.alistapart.com/articles/zebratables/                             */
tbody.scrollContent td, tbody.scrollContent tr.normalRow td {
	background: #FFF;
	border-bottom: none;
	border-left: none;
	border-right: 1px solid #CCC;
	border-top: 1px solid #DDD;
	padding: 2px 3px 3px 4px
}

tbody.scrollContent tr.alternateRow td {
	background: #EEE;
	border-bottom: none;
	border-left: none;
	border-right: 1px solid #CCC;
	border-top: 1px solid #DDD;
	padding: 2px 3px 3px 4px
}

/* define width of TH elements: 1st, 2nd, and 3rd respectively.          */
/* Add 16px to last TH for scrollbar padding. All other non-IE browsers. */
/* http://www.w3.org/TR/REC-CSS2/selector.html#adjacent-selectors        */
html>body thead.fixedHeader th {
	width: 250px
}

html>body thead.fixedHeader th + th {
	width: 100px
}

html>body thead.fixedHeader th + th + th {
	width: 150px
}

/* define width of TD elements: 1st, 2nd, and 3rd respectively.          */
/* All other non-IE browsers.                                            */
/* http://www.w3.org/TR/REC-CSS2/selector.html#adjacent-selectors        */
html>body tbody.scrollContent td {
	width: 250px
}

html>body tbody.scrollContent td + td {
	width: 150px
}

html>body tbody.scrollContent td + td + td {
	width: 150px
}
</style>
<div class="container">
	<div class="row">
	<div class="visible-xs-block col-xs-7 col-sm-7" id="menumob">
		<ul class="nav nav-tabs nav-stacked" id="categoria2">
			
		</ul>
	</div>
	</div>
</div>
<div class="container" >

	<div class="row">
		<div class="col-sm-2 col-md-2 sidebar">		
          <ul class="nav nav-sidebar  hidden-xs">
            <li class="active"><a href="#"><b>Categorias</b></a></li>            
          </ul>
          <ul class="nav nav-sidebar" id="categoria1">
          </ul>         
        </div>
	</div>


		
	<div class="col-xs-12 col-sm-8 col-md-8 col-md-offset-1 col-sm-offset-2 main" >
	<div class="list-group" id="productos">
 	 
 		</div>
	</div> <!-termino de los menus ->

	<div class="container hidden-xs">
	<div class="row">
	<div class="col-sm-3 rsidebar">		
		<div class="sidebar-module" id="test">
			<div class="table table-responsive">
				<table class="table">
				<tr>
					<td style="font-size: 17px;"><b>COD. TRANS.</b></td>
					<td style="font-size: 17px;"><b><?php echo $_smarty_tpl->tpl_vars['trans']->value['SNVG_C00104'];?>
</b></td>
				</tr>
				<tr>
					<td style="font-size: 17px;"><b>MESA</b></td>
					<td style="font-size: 17px;"><b><?php echo $_smarty_tpl->tpl_vars['mesa']->value;?>
<?php echo $_smarty_tpl->tpl_vars['seccion']->value;?>
</b></td>
				</tr>
				<tr>
					<td style="font-size: 17px;"><b>CANT</b></td>
					<td style="font-size: 17px;"><?php echo $_smarty_tpl->tpl_vars['capacidad']->value;?>
</td>
				</tr>				
				</table>
  			</div>
			<div class="table table-responsive" >
              <table class="table" data-role="table" >			
			<thead class="fixedHeader">
				<th>Nombre</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Total</th>
			</thead>
			<tbody class="scrollContent" id="mod">
				
			</tbody>
						                
			</table>
			</div>
			<div class="table table-responsive">
				<table class="table">
				<tr>
					<td style="font-size: 17px;"><b>TOTAL</b></td>
					<td id="total" style="font-size: 17px;"></td>
				</tr>				
				</table>
  			</div>
			</div>
			<div>
				<a onclick="onConfirmar('<?php echo $_smarty_tpl->tpl_vars['trans']->value['SNVG_C00104'];?>
','<?php echo $_smarty_tpl->tpl_vars['mesa']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['seccion']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['capacidad']->value;?>
');" class="btn btn-primary btn-large btn-lg col-xs-offset-4">Comprobar</a>
			</div>
		</div>
	</div>
	</div>
	</div>
</div>


<script>
	$(document).ready( function(){
		$.post('/ristoranet/mobile/comanda/getCategoria',
    function(datos){
  	$("#categoria1").html('');  	
  		for(var i = 0; i < datos.length; i++){               
                $("#categoria1").append('<li><a href="#" onclick="setProductos('+datos[i].cod+');">'+datos[i].categoria+'</a></li>');
                $("#categoria2").append('<li><a href="#" onclick="setProductos('+datos[i].cod+');">'+datos[i].categoria+'</a></li>');                
            } 
  	}  
    ,'json');
	$('#descripcion').popover();

	
	var trans = <?php echo $_smarty_tpl->tpl_vars['trans']->value['SNVG_C00104'];?>

	
	$.post('/ristoranet/mobile/comanda/getTabla', 'transact='+trans,function(datos){
    	  var cont = datos[2];
    	  var totales = datos[0];
    	  var total = datos[1];
    	  $("#mod").html('');
    	  for(var i = 0; i < cont.length; i++){

    	  		$("#mod").append('<tr><td>'+totales[cont[i]].nombre+'</td><td>'+totales[cont[i]].cantidad+'</td><td>'+totales[cont[i]].precio+'</td><td>'+totales[cont[i]].total+'</td></tr>');
    	  		$("#total").html(total);
    	  }    	  
  	}  
    ,'json');

	
})

	function setProductos($categoria){		
    $.post('/ristoranet/mobile/comanda/getProductos/', 'categoria='+$categoria,
    function(datos){
            $("#productos").html('');            
            for(var i = 0; i < datos.length; i++){                
                $("#productos").append('<div class="list-group-item"><div class="row"><div class="col-md-4"><img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/menu/'+datos[i].imagen+'"></div><div class="col-md-5"><legend>'+datos[i].producto+'</legend></div><div class="col-md-5"><button type="button" class="btn btn-primary" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." id="descripcion">Descripción</button></div><div class="col-md-1 "><h3 class="text-center">'+datos[i].precio+'</h3><p class="text-center"><button type="button" class="btn btn-primary" onclick="agregar('+datos[i].cod+');">Agregar</button></p></div></div></div>');
            }
            
    }  
    ,'json');    
}

function agregar(idproducto){
		var t = <?php echo $_smarty_tpl->tpl_vars['trans']->value['SNVG_C00104'];?>

		var x = idproducto;	
        var _root_ = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
';        	   
    	var url1 = _root_ + 'mobile/comanda/cesta/' + t + '/' + x + '/add';
    	$.post(url1);		
    	actualizar();
}

function actualizar(){
	var trans = <?php echo $_smarty_tpl->tpl_vars['trans']->value['SNVG_C00104'];?>

	$.post('/ristoranet/mobile/comanda/getTabla', 'transact='+trans,function(datos){
    	  var cont = datos[2];
    	  var totales = datos[0];
    	  var total = datos[1];
    	  $("#mod").html('');
    	  for(var i = 0; i < cont.length; i++){

    	  		$("#mod").append('<tr><td>'+totales[cont[i]].nombre+'</td><td>'+totales[cont[i]].cantidad+'</td><td>'+totales[cont[i]].precio+'</td><td>'+totales[cont[i]].total+'</td></tr>');
    	  		$("#total").html('');	                	    	  		
    	  		$("#total").html(total);	                	    	  		
    	  }    	  
  	}  
    ,'json');

}

function onConfirmar(var1,var2,var3,var4){
var trans = var1
var mesa = var2
var seccion = var3
var capacidad = var4

window.location.href = "confirmar?transact="+trans+"&mesa="+mesa+"&seccion="+seccion+"&capacidad="+capacidad;
}
</script><?php }} ?>