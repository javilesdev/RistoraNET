<div class="container" style="width: 100%; height: 570px; background: #f1f1f1;">
    <legend>Transacciones Activas</legend>
    <div class="col-md-8" >
        <div class="table table-responsive" style="max-height: 500px; overflow-y: auto;">
            <table class="table table-hover">
                <thead>
                <tr>
                  <th>COD</th>
                  <th>MESA</th>
                  <th>FECHA/HORA</th>
                  <th>A CARGO</th>
                  <th>TOTAL</th>                
                </tr>
              </thead>
              <tbody id="activas">
                 {foreach from=$lista item=a}
                          <tr onclick="showthis('{$a.codTran}');" {if {$mes.SNVG_C00102}==0}class="bg-info"{else if {$mes.SNVG_C00102}==1}class="bg-info"{/if}>
                            <td>{$a.codTran}</td>
                            <td>{$a.ST12codMesa}{$a.ST12secMesa}</td>
                            <td>{$a.ST12fecha} {$a.ST12hora}</td>
                            <td>{$a.ST12codUsu}</td>
                            <td>$ {$a.ST12total|number_format:0:".":"."}</td>
                          </tr>                         
                    {/foreach}
                   {foreach from=$activa item=a}
                          <tr onclick="showthis('{$a.codTran}');" {if {$mes.SNVG_C00102}==0}class="bg-warning"{else if {$mes.SNVG_C00102}==1}class="bg-info"{/if}>
                            <td>{$a.codTran}</td>
                            <td>{$a.ST12codMesa}{$a.ST12secMesa}</td>
                            <td>{$a.ST12fecha} {$a.ST12hora}</td>
                            <td>{$a.ST12codUsu}</td>
                            <td>$ {$a.ST12total|number_format:0:".":"."}</td>
                          </tr>                         
                    {/foreach}               
              </tbody>
            </table>
          </div>
    </div>
    
    <div class="col-md-4 row-fluid">
        <br>
        <div class="col-md-10 col-md-offset-1">
        	<button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal" id="comanda">
  				Crear Comanda
			</button>        
        <div class="col-md-10" id="detalle">
                        
        </div>
    </div>
</div>
<input type="hidden" id="idusu" value="{$idusu}">
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Selección de Mesa</h4>
      </div>
      <div class="modal-body">
      
        <label>Mesa/Seccion</label>

        <select onchange="setVal1(this.value);" class="form-control">
        <option value="0">Seleccione...</option>
  				{if isset($mesas) and count($mesas)} 
        		{foreach from=$mesas item=mes}
  				<option value="{$mes.SNVG_C00100}|{$mes.SNVG_C00101}|{$mes.SNVG_C00102}"  {if {$mes.SNVG_C00102}==1}class="bg-danger"{else}class="bg-success"{/if}>Mesa/Seccion: {$mes.SNVG_C00100}{$mes.SNVG_C00101} Capacidad: Estado: {if {$mes.SNVG_C00102}==1}<b>OCUPADO</b>{else}<b>DISPONIBLE</b>{/if}</option>  				
  				{/foreach}
  				{/if}
		</select>

		<br>
		<label>Numero de Clientes</label>
		<input type="number" id="num" value="">
		<input type="hidden" id="cod" value="">
		<input type="hidden" id="sec" value="">
		<input type="hidden" id="est" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" onclick="getvalue();" class="btn btn-primary">Continuar</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
var ruta_root = '{$_layoutParams.root}'
	function getvalue(){
		var capacidad = $('#num').val()
		var codigo = $('#cod').val()
		var seccion = $('#sec').val()
		var estado = $('#est').val()
		
		if(capacidad == ''){
			alert("Ingrese el numero de Clientes.")
			return false
		}
		if(estado == 1){
			alert("La Mesa Seleccionada ya esta Opcupada.")
			return false
		}
		window.location.href = ruta_root + "mobile/comanda/catalogo?mesa="+codigo+"&seccion="+seccion+"&capacidad="+capacidad;
	}

  function showthis(transact){
    window.location.href = ruta_root + "mobile/comanda/show?transact="+transact;
  }

	function setVal1(var1){
		var elem = var1.split('|');		
		$('#cod').val(elem[0])
		$('#sec').val(elem[1]) 
		$('#est').val(elem[2])
	}
  var signal = {$signal}
  if(signal==0){
  $("#comanda" ).prop( "disabled", true );
  }
</script>