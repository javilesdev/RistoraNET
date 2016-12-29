<?php /* Smarty version Smarty-3.1.8, created on 2015-04-21 12:11:33
         compiled from "C:\xampp\htdocs\ristoranet\modules\pos\views\index\comprobante.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195455363e75d9be06-94599127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2a0e3da7de37ff0d1acdd3a7cb1d41b2299052f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\modules\\pos\\views\\index\\comprobante.tpl',
      1 => 1413833349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195455363e75d9be06-94599127',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_layoutParams' => 0,
    'transact' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55363e75dea5d5_19536011',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55363e75dea5d5_19536011')) {function content_55363e75dea5d5_19536011($_smarty_tpl) {?><div class="row-fluid">
<div class="container">    
<div class="jumbotron" style="min-height: 500px;">
<legend><h3>Transacción Finalizada!</h3></legend>
<div class="col-md-6">
<div class="panel panel-info">
	<div class="panel-heading"><B>Información de Transacción</B></div>
  <div class="panel-body">

  <table class="table">
  	<tr>
  		<td><span class="text-info"><b>TRANSACCIÓN</b></span></td>
  		<td id="trans"></td>
  	</tr>
  	<tr>
  		<td><span class="text-info"><b>HORA/FECHA</b></span></td>
  		<td id="datetime"></td>
  	</tr>
  	<tr>
  		<td><span class="text-info"><b>MESA/SECCIÓN</b></span></td>  		
  		<td id="mesa"></td>
  	</tr>
  	<tr>
  		<td><span class="text-info"><b>CAMARERO</b></span></td>  		
  		<td id="camarero"></td>
  	</tr>  	  	  	
  </table>
  </div>
</div>
</div>
<div class="col-md-6">
	<div class="panel panel-warning">
	<div class="panel-heading"><B>VALORES $</B></div>
  <div class="panel-body">

  <table class="table">
  	<tr>
  		<td><span class="text-warning"><b>SUBTOTAL</b></span></td>
  		<td id="sub"></td>
  	</tr>
  	<tr>
  		<td><span class="text-warning"><b>PROPINA 10%</b></span></td>  		
  		<td id="prop"></td>
  	</tr>
  	<tr>
  		<td><span class="text-warning"><b>IVA 19%</b></span></td>  		
  		<td id="iva"></td>
  	</tr>
  	<tr>
  		<td><span class="text-warning"><h4><b>TOTAL</b></h4></span></td>  		
  		<td id="total"></td>
  	</tr>  	  	  	
  </table>
  </div>

</div>

</div>
<div class="col-md-12 text-center">
<form method="post">
<a href="javascript: w=window.open('<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pos/index/generarBoleta/<?php echo $_smarty_tpl->tpl_vars['transact']->value;?>
');" class="btn btn-md btn-info"><b>Boleta</b></a><div class="col-md-1"></div>
<button class="btn btn-md btn-info" data-toggle="modal" data-target=".bs-example-modal-sm"><b>Detalle</b></button>


  <input type="hidden" name="pago" value="1">
  <input type="submit" class="btn btn-lg btn-success" value="Finalizar">
</form>
</div>
</div>

</div>
</div>

<!-- Small modal -->
<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>

<script>
var ruta_root = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
'

$(document).ready( function(){
	var transact = '<?php echo $_smarty_tpl->tpl_vars['transact']->value;?>
'	
	$.post('/ristoranet/pos/index/getTransact?transact='+transact,
    function(datos){  	
  		$('#mesa').html(datos.STTcodMesa+''+datos.STTsecMesa);
  		$('#trans').html(datos.codTran);
  		$('#camarero').html(datos.USUnom);
  		$('#datetime').html(datos.ST12fecha+' '+datos.ST12hora);
  		var subtotal = datos.ST12subtotal;
  		var propina = subtotal * 0.10;
  		
  		$('#sub').html(accounting.formatMoney(datos.ST12subtotal))
  		$('#prop').html(accounting.formatMoney(propina))
  		$('#iva').html(accounting.formatMoney(datos.ST12iva))	
  		$('#total').html('<h4><b>'+accounting.formatMoney(datos.ST12total)+'</b></h4>');
  	  }
    ,'json');

    })
</script><?php }} ?>