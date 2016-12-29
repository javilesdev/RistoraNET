<div class="row">
<div class="container">    
<div class="jumbotron" style="min-height: 100px; background:white;">

<legend><b>Información Comanda</b></legend>
<div class="row">
<div class="container">
	<div class="panel panel-primary">            
            <div class="panel-body">

                    <div class="row">
<div class="container">
            <form class="form-inline" role="form">  
  <div class="form-group">

    <div class="input-group">
   	  <div>COD</div> 
      <input class="form-control input-lg" size="10"  type="text" value="{$comanda.codTran}" disabled>
    </div>
  </div>
  <div class="form-group">

    <div class="input-group">
   	  <div>Mesa</div> 
      <input class="form-control input-lg" type="text" size="2"  value="{$comanda.ST12codMesa}{$comanda.ST12secMesa}" disabled>
    </div>
  </div>
  <div class="form-group">

    <div class="input-group">
   	  <div>N° Clientes</div> 
      <input class="form-control input-lg" size="3" value="{$comanda.STTcap}" type="text" disabled>
    </div>
  </div>
   <div class="form-group">

    <div class="input-group">
   	  <div>Fecha/Hora</div> 
      <input class="form-control input-lg" type="datetime" value="{$comanda.ST12fecha} {$comanda.ST12hora}" disabled>
    </div>
  </div>  
</form>
    </div>
</div>
<div class="row">
<div class="container">
            <form class="form-inline" role="form">  
  <div class="form-group">

    <div class="input-group">
   	  <div>Subtotal</div> 
      <input class="form-control input-lg" type="text" value="$ {$comanda.ST12subtotal|number_format:0:".":"."|default:"0"}" disabled>
    </div>
  </div>
   <div class="form-group">

    <div class="input-group">
   	  <div>Propina 10% (Recomendado)</div> 
      <input class="form-control input-lg" type="text" value="$ {$propina|number_format:0:".":"."|default:"0"}" disabled>
    </div>
  </div>
   <div class="form-group">

    <div class="input-group">
   	  <div>TOTAL</div> 
      <input class="form-control input-lg" type="text" value="$ {$comanda.ST12subtotal|number_format:0:".":"."|default:"0"}" disabled>
    </div>
  </div>
     <div class="form-group">

    <div class="input-group">
      <div>Pago</div> 
      <input class="form-control input-lg" type="text" value="$ {$comanda.ST12monto|number_format:0:".":"."|default:"0"}" disabled>
    </div>
  </div>
       <div class="form-group">

    <div class="input-group">
      <div>Vuelto</div> 
      <input class="form-control input-lg" type="text" value="$ {$vuelto|number_format:0:".":"."|default:"0"}" disabled>
    </div>
  </div>
     <div class="form-group">

    <div class="input-group">
      <div>Metodo</div> 
      <input class="form-control input-lg" type="text" {if {$comanda.ST12modo} == 1}value="Efectivo"{/if} disabled>
    </div>
  </div>
</form>
    </div>
</div>
<br>
<div class="row">
<div class="container">
<div class="panel panel-primary">
<div class="panel-heading">
             <h3 class="panel-title">Detalle</h3>
</div>
<div class="panel-body">
	<table class="table table-condensed" style="overflow-y: auto; overflow-x: hidden; max-height: 400px;">
                    <tr>
                        <th>Item</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>                        
                    </tr>
                        {if isset($cositas) and count($cositas)} 
                        {foreach from=$cositas item=mes}
                        <tr>
                        <td><b>{$mes.producto}</b></td>    
                        <td>{$mes.cant}</td>
                        <td>{$mes.precio|number_format:0:".":"."|default:"0"}</td>
                        <td>{$mes.total|number_format:0:".":"."|default:"0"}</td>                        
                        </tr>
                        {/foreach}         
                        {else}
                        <p>No hay registros</p>
                        {/if} 
                </table>        
</div>
</div>
</div>
</div>
<div class="row">
<div class="container">
<div class="panel panel-primary">
<div class="panel-heading">
             <h3 class="panel-title">Acciones</h3>
</div>
<div class="panel-body text-center">
<form method="post" role="form"> 
                    <input type="hidden" name="pago" value="1">                   
                    
                    
                    
<button type="button" class="btn btn-success btn-lg col-lg-5 col-sm-offset-3" onclick="finalizar('{$comanda.codTran}')">Finalizar</button>                
                </form>  
</div>
</div>
    </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- Modals -->
  <!-- Modals Anular -->
<div class="modal fade" id="anular" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Anulación de Transacción</h4>
      </div>
      <div class="modal-body">
       <b class="text-danger"> Esta a punto de anular una transacción. Debe justificar el motivo de anulación.</b>
        <div class="has-warning"><textarea name="motivo" id="motivo" class="form-control has-warning" rows="4" cols="50"></textarea></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="anular('{$comanda.codTran}');" class="btn btn-danger">ANULAR</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pagar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Pago de Transacción</h4>
      </div>
      <div class="modal-body">
        Se realizara el Pago Correspondiente de:
        <div class="row-fluid">
        <div class="container">
      <div class="col-md-3">
        <div class="form-group">

    <div class="input-group">
      <div>Subtotal</div> 
      <input class="form-control input-lg" type="text" value="$ {$comanda.ST12subtotal|number_format:0:".":"."|default:"0"}" disabled>
    </div>
  </div>
   <div class="form-group">

    <div class="input-group">
      <div>Propina 10% (Recomendado)</div> 
      <input class="form-control input-lg" type="text" value="$ {$propina|number_format:0:".":"."|default:"0"}" disabled>
    </div>
  </div>
   <div class="form-group">

    <div class="input-group">
      <div>TOTAL</div> 
      <input class="form-control input-lg" type="text" value="$ {$comanda.ST12total|number_format:0:".":"."|default:"0"}" disabled>
    </div>
  </div>
  </div> 
    <div class="col-md-2">
       <div class="form-group">

    <div class="input-group">
      <div>Seleccione Forma de Pago:</div> 
      <select class="form-control" onchange="formapago();" id="formp">
        <option>Seleccione</option>
        <option value="1">Efectivo</option>
        <option value="2">Cheque</option>
        <option value="3">Tarjeta Credito</option>
        <option value="4">Tarjeta Debito</option>        
      </select>
    </div>
  </div>
  <div id="zonaa">
  <div id="efectivo" style="display: none">
    <div class="input-group">
      <div>Pago</div> 
      <input class="form-control input-lg" id="efectivop" type="text" value="{0|number_format:0:".":"."|default:"0"}">
    </div>    
  </div>
  <div id="cheque" style="display: none">
    <div class="input-group">
      <div>Pago</div> 
      <input class="form-control input-lg" id="chequep" type="text" value="{0|number_format:0:".":"."|default:"0"}">
    </div>
  </div>
  <div id="credito" style="display: none">
    <div class="input-group">
      <div>Pago</div> 
      <input class="form-control input-lg" id="creditop" type="text" value="{0|number_format:0:".":"."|default:"0"}">
    </div>
  </div>
  <div id="debito" style="display: none">
    <div class="input-group">
      <div>Pago</div> 
      <input class="form-control input-lg" id="debitop" type="text" value="{0|number_format:0:".":"."|default:"0"}">
    </div>
  </div>
  </div>
    </div>
  </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="pagar('{$comanda.codTran}');" class="btn btn-info">Confirmar</button>
      </div>
    </div>
  </div>
</div>

                        </div>
                        </div>

<script>
var ruta_root = '{$_layoutParams.root}'

$("#motivo").val();

function alert1(mesa, seccion){
    
    window.location.href = ruta_root + "mobile/comanda/update_catalgo/"+mesa+"/"+seccion;
}

function formapago(){

    var id = $("#formp :selected").val();

    if (id ==1) {
      $( "#debito" ).hide();
      $( "#credito" ).hide();
      $( "#cheque" ).hide();      
      $( "#efectivo" ).show( "fast" );
    }else if (id ==2) {
      $( "#debito" ).hide();
      $( "#credito" ).hide();
      $( "#efectivo" ).hide();
      $( "#cheque" ).show( "fast" );
    }else if (id ==3) {
      $( "#debito" ).hide();
      $( "#efectivo" ).hide();
      $( "#cheque" ).hide();
      $( "#credito" ).show( "fast" );
    }else if (id ==4) {
      $( "#credito" ).hide();
      $( "#cheque" ).hide();
      $( "#efectivo" ).hide();
      $( "#debito" ).show( "fast" );
    }
   
}

function anular(transact){   
    var motivo = $("#motivo").val()
    
    if (motivo=="") {
      alert("Introdusca un Motivo.")
      return false
    }    
    window.location.href = ruta_root + "mobile/comanda/anular?transact="+transact+"&motivo="+motivo
  }

function pagar(){
    var trans = {$comanda.codTran}
    var id = $("#formp :selected").val()
    if (id ==1) {
      var pago = $("#efectivop").val()
      var total = '{$comanda.ST12total}'
      var trans = '{$comanda.codTran}'      
      if(pago < total){
        alert("El pago ingresado es Inferior. Debe reingresar el Monto correctamente.")
        return false
      }
      $.post(ruta_root + 'mobile/comanda/pagar?trans='+trans+'&monto='+pago+'&modo=1')
      window.location.href = ruta_root + "mobile"
    }else if (id ==2) {
      var pago = $("#chequep").val();
      var total = {$comanda.ST12total}
      if(pago < total){
        alert("El pago ingresado es Inferior. Debe reingresar el Monto correctamente.")
        return false;
      }
      $.post(ruta_root + 'mobile/comanda/pagar?monto='+pago+'&modo=2')
    }else if (id ==3) {
      var pago = $("#creditop").val();
      var total = {$comanda.ST12total}
      if(pago < total){
        alert("El pago ingresado es Inferior. Debe reingresar el Monto correctamente.")
        return false;
      }
      $.post(ruta_root + 'mobile/comanda/pagar?monto='+pago+'&modo=3')
    }else if (id ==4) {
      var pago = $("#debitop").val();
      var total = {$comanda.ST12total}
      if(pago < total){
        alert("El pago ingresado es Inferior. Debe reingresar el Monto correctamente.")
        return false;
      }
      $.post(ruta_root + 'mobile/comanda/pagar?monto='+pago+'&modo=4')
    }    
}
 
function finalizar(transact){
window.location.href = ruta_root + 'pos/index/comprobante?transact='+ transact
}

function remover(transact,idProducto){
$.post(ruta_root + 'mobile/comanda/cesta/'+transact+'/' + idProducto + '/delete')
location.reload();
}

</script>