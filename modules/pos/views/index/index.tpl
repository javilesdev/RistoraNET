<div class="row-fluid">
<div class="col-md-7">
	<LEGEND>TICKETS ABIERTOS Y ACTIVIDAD</LEGEND>
   	<div class="bs-example bs-example-tabs">
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#terminadas" role="tab" data-toggle="tab">FINALIZADAS</a></li>
      <li><a href="#activas" role="tab" data-toggle="tab">ACTIVAS</a></li>      
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="terminadas">
        <!-- widget content -->
									<div class="widget-body no-padding">
										
										<div class="table-responsive">
												
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
												<tbody>
												{if isset($terminada) and count($terminada)} 
        										{foreach from=$terminada item=a}
													<tr onclick="showthis('{$a.codTran}');" class="bg-success">
														<td>{$a.codTran}</td>
                            <td>{$a.ST12codMesa}{$a.ST12secMesa}</td>
                            <td>{$a.ST12fecha} {$a.ST12hora}</td>
                            <td>{$a.ST12codUsu}</td>
                            <td>$ {$a.ST12total|number_format:0:".":"."}</td>
													</tr>													
												{/foreach}
												{/if}
												</tbody>
											</table>
											
										</div>
									</div>
									<!-- end widget content -->

      </div>
      <div class="tab-pane fade" id="activas">
        <!-- widget content -->
									<div class="widget-body no-padding">
										
										
										<div class="table-responsive">
												
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
												<tbody>
													 {foreach from=$espera item=a}
                          <tr onclick="showthis('{$a.codTran}');">
                            <td>{$a.codTran}</td>
                            <td>{$a.ST12codMesa}{$a.ST12secMesa}</td>
                            <td>{$a.ST12fecha} {$a.ST12hora}</td>
                            <td>{$a.ST12codUsu}</td>
                            <td>$ {$a.ST12total|number_format:0:".":"."}</td>
                          </tr>                         
                        {/foreach}
        										{foreach from=$activa item=a}
													<tr onclick="showthis();">
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
									<!-- end widget content -->

      </div>      
    </div>
  </div><!-- /example -->
</div>
</div>
<div class="row-fluid">
<div class="col-md-5">
<LEGEND>ESTADO</LEGEND>
<div class="well" style="margin: 0 auto 10px;background-color: #EEE;">
	<table class="table table-bordered" style="background-color: #FFF;">
  		<tr>
  			<td><h4><b>Estado: </b></h4></td>
  			<td ><h4 id="state" class="text-center"></h4></td>
  		</tr>
  		<tr>
  			<td><h4><b>Iniciado por: </b></h4></td>
  			<td ><h4 id="user" class="text-center"></h4></td>
  		</tr>
  		<tr>
  			<td><h4><b>Hora/Fecha Apertura: </b></h4></td>
  			<td ><h4 id="datetime" class="text-center"></h4></td>
  		</tr>
  		<tr>
  			<td><h4><b>Monto Inicial: </b></h4></td>
  			<td ><h4 id="initmoney" class="text-center"></h4></td>
  		</tr>
		<tr>
  			<td><h4><b>Monto Actual: </b></h4></td>
  			<td ><h4 id="currentmoney" class="text-center"></h4></td>
  		</tr>  		
	</table>
</div>
<LEGEND>OPCIONES</LEGEND>
<div class="well" style="margin: 0 auto 10px;background-color: #EEE;">
	<button id="inicio" class="btn btn-lg btn-info btn-block" data-toggle="modal" data-target="#abrir">
		<b>Iniciar Caja</b>
	</button>
	<button id="termino" class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target="#cerrar">
		<b>Cerrar Caja</b>
	</button>
	<button id="retirar" class="btn btn-lg btn-warning btn-block" data-toggle="modal" data-target="#sacar">
		<b>Manejo de Dinero</b>
	</button>
</div>
</div>
</div>
</div>

<!-Abrir->

<div class="modal fade" id="abrir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Apertura de Caja</h4>
      </div>
      <div class="modal-body">
        
        <div class="form-group">
    		<label>Monto Inicial</label>
    		<input type="text" class="form-control" name="inicial">
  		</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success" onclick="asegurar();">Iniciar</button>
        <input type="hidden" name="iniciar" value="1">
      </div>
      </form>
    </div>
  </div>
</div>

<!-Cerrar->

<div class="modal fade" id="cerrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Termino de Caja</h4>
      </div>
      <div class="modal-body">
        
        	<p class="bg-danger"><b>Esta por realizar el Cierre de caja. Es recomendable que siga estos puntos.
          <ul>
            <li>Compruebe y cuente el Dinero Almacenado.</li>
            <li>Revise las acciones que se han llevado en la caja.</li>
            <li>Si las cifras no cuadra, contacte con el Sub-Gerente o Gerente.</li>
          </ul>
          Si Realizo estos pasos, ingrese la Suma del Dinero Existente.  
          </b></p>
          <LEGEND>DETALLE DE CIERRE</LEGEND>
        	<div class="form-group">
         <label><h4><u>Usuario:</u> {$usuario.nombre}</h4></label><br>  
         <label><h4><u>Monto de Referencia:</u> $ {$activo.SNVG_C00108|number_format:0:".":"."}</h4></label> 
    		<br><label><h4>Monto Final</h4></label>
    		<input type="text" class="form-control" name="final">
        <div class="form-group">
          <label>Observación:</label>
          <textarea class="form-control" rows="3" name="obs"></textarea>
        </div>
  		</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger">Finalizar</button>
        <input type="hidden" name="finalizar" value="1">
      </div>
      </form>
    </div>
  </div>
</div>

<!-Retirar->

<div class="modal fade" id="sacar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <form method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Retiro de Dinero</h4>
      </div>
      <div class="modal-body">        
        	<p class="bg-warning"><b>Este efecto sera Registrado para ser monitoreado.</b></p>
        	<div class="form-group">
    		<label>Monto a Retirar:</label>
    		<input type="text" class="form-control" name="retiro">
  		</div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-warning">Retirar</button>
        <input type="hidden" name="retirar" value="1">
      </div>
      </form>
    </div>
  </div>
</div>


<script>
var ruta_root = '{$_layoutParams.root}'
{if isset($activo) and isset($usuario)}
var nom = '{$usuario.nombre}'
var cod = '{$activo.SNVG_C00101}'
var fecha = '{$activo.SNVG_C00102}'
var inicial = '$ {$activo.SNVG_C00103|number_format:0:".":"."}'
var actual = '$ {$activo.SNVG_C00108|number_format:0:".":"."}'
{/if}
if({$signal}==0){
	$("#state").html('')
	$("#state").append('<img src="{$_layoutParams.root}public/img/red.png"> Cerrado')
	$("#user").append('-----')
	$("#datetime").append('-----')
	$("#initmoney").append('-----')
	$("#currentmoney").append('-----')
	$( "#termino" ).prop( "disabled", true );
	$( "#retirar" ).prop( "disabled", true );
}else{ if({$signal}==1){
	$("#state").html('')
	$("#state").append('<img src="{$_layoutParams.root}public/img/green.png"> Abierto')
	$("#user").append(nom)
	$("#datetime").append(fecha)
	$("#initmoney").append(inicial)
	$("#currentmoney").append(actual)
	$( "#inicio" ).prop( "disabled", true );
}else{
  if({$signal}==2){
  $("#state").html('')
  $("#state").append('<img src="{$_layoutParams.root}public/img/red.png">Finalizado')
  $("#user").append('-----')
  $("#datetime").append('-----')
  $("#initmoney").append('-----')
  $("#currentmoney").append('-----')
  $( "#termino" ).prop( "disabled", true );
  $( "#retirar" ).prop( "disabled", true );
  }
}
}

function asegurar(){
  if({$signal}==2){
  alert("Ya se ha Cerrado la Caja. No es posible Iniciar la Caja.")
  return false
  }
}

function showthis(var1){
  window.location.href = ruta_root + "pos/index/pagarse?transact="+var1
}

</script>