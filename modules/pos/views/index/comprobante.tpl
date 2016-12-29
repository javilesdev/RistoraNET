<div class="row-fluid">
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
<a href="javascript: w=window.open('{$_layoutParams.root}pos/index/generarBoleta/{$transact}');" class="btn btn-md btn-info"><b>Boleta</b></a><div class="col-md-1"></div>
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
var ruta_root = '{$_layoutParams.root}'

$(document).ready( function(){
	var transact = '{$transact}'	
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
</script>