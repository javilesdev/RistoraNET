<?php /* Smarty version Smarty-3.1.8, created on 2014-10-20 14:48:19
         compiled from "/opt/lampp/htdocs/ristoranet/modules/pos/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157564204854454ae39c59c6-02843340%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac6641c725121bab2987aec18639e620c933dc77' => 
    array (
      0 => '/opt/lampp/htdocs/ristoranet/modules/pos/views/index/index.tpl',
      1 => 1411433058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157564204854454ae39c59c6-02843340',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'terminada' => 0,
    'a' => 0,
    'espera' => 0,
    'activa' => 0,
    'usuario' => 0,
    'activo' => 0,
    '_layoutParams' => 0,
    'signal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_54454ae3aabc78_72983526',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54454ae3aabc78_72983526')) {function content_54454ae3aabc78_72983526($_smarty_tpl) {?><div class="row-fluid">
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
												<?php if (isset($_smarty_tpl->tpl_vars['terminada']->value)&&count($_smarty_tpl->tpl_vars['terminada']->value)){?> 
        										<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['terminada']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
													<tr onclick="showthis('<?php echo $_smarty_tpl->tpl_vars['a']->value['codTran'];?>
');" class="bg-success">
														<td><?php echo $_smarty_tpl->tpl_vars['a']->value['codTran'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['ST12codMesa'];?>
<?php echo $_smarty_tpl->tpl_vars['a']->value['ST12secMesa'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['ST12fecha'];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value['ST12hora'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['ST12codUsu'];?>
</td>
                            <td>$ <?php echo number_format($_smarty_tpl->tpl_vars['a']->value['ST12total'],0,".",".");?>
</td>
													</tr>													
												<?php } ?>
												<?php }?>
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
													 <?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['espera']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
                          <tr onclick="showthis('<?php echo $_smarty_tpl->tpl_vars['a']->value['codTran'];?>
');">
                            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['codTran'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['ST12codMesa'];?>
<?php echo $_smarty_tpl->tpl_vars['a']->value['ST12secMesa'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['ST12fecha'];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value['ST12hora'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['a']->value['ST12codUsu'];?>
</td>
                            <td>$ <?php echo number_format($_smarty_tpl->tpl_vars['a']->value['ST12total'],0,".",".");?>
</td>
                          </tr>                         
                        <?php } ?>
        										<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
													<tr onclick="showthis();">
														<td><?php echo $_smarty_tpl->tpl_vars['a']->value['codTran'];?>
</td>
														<td><?php echo $_smarty_tpl->tpl_vars['a']->value['ST12codMesa'];?>
<?php echo $_smarty_tpl->tpl_vars['a']->value['ST12secMesa'];?>
</td>
														<td><?php echo $_smarty_tpl->tpl_vars['a']->value['ST12fecha'];?>
 <?php echo $_smarty_tpl->tpl_vars['a']->value['ST12hora'];?>
</td>
														<td><?php echo $_smarty_tpl->tpl_vars['a']->value['ST12codUsu'];?>
</td>
														<td>$ <?php echo number_format($_smarty_tpl->tpl_vars['a']->value['ST12total'],0,".",".");?>
</td>
													</tr>													
												<?php } ?>
																							
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
         <label><h4><u>Usuario:</u> <?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombre'];?>
</h4></label><br>  
         <label><h4><u>Monto de Referencia:</u> $ <?php echo number_format($_smarty_tpl->tpl_vars['activo']->value['SNVG_C00108'],0,".",".");?>
</h4></label> 
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
var ruta_root = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
'
<?php if (isset($_smarty_tpl->tpl_vars['activo']->value)&&isset($_smarty_tpl->tpl_vars['usuario']->value)){?>
var nom = '<?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombre'];?>
'
var cod = '<?php echo $_smarty_tpl->tpl_vars['activo']->value['SNVG_C00101'];?>
'
var fecha = '<?php echo $_smarty_tpl->tpl_vars['activo']->value['SNVG_C00102'];?>
'
var inicial = '$ <?php echo number_format($_smarty_tpl->tpl_vars['activo']->value['SNVG_C00103'],0,".",".");?>
'
var actual = '$ <?php echo number_format($_smarty_tpl->tpl_vars['activo']->value['SNVG_C00108'],0,".",".");?>
'
<?php }?>
if(<?php echo $_smarty_tpl->tpl_vars['signal']->value;?>
==0){
	$("#state").html('')
	$("#state").append('<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/red.png"> Cerrado')
	$("#user").append('-----')
	$("#datetime").append('-----')
	$("#initmoney").append('-----')
	$("#currentmoney").append('-----')
	$( "#termino" ).prop( "disabled", true );
	$( "#retirar" ).prop( "disabled", true );
}else{ if(<?php echo $_smarty_tpl->tpl_vars['signal']->value;?>
==1){
	$("#state").html('')
	$("#state").append('<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/green.png"> Abierto')
	$("#user").append(nom)
	$("#datetime").append(fecha)
	$("#initmoney").append(inicial)
	$("#currentmoney").append(actual)
	$( "#inicio" ).prop( "disabled", true );
}else{
  if(<?php echo $_smarty_tpl->tpl_vars['signal']->value;?>
==2){
  $("#state").html('')
  $("#state").append('<img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/red.png">Finalizado')
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
  if(<?php echo $_smarty_tpl->tpl_vars['signal']->value;?>
==2){
  alert("Ya se ha Cerrado la Caja. No es posible Iniciar la Caja.")
  return false
  }
}

function showthis(var1){
  window.location.href = ruta_root + "pos/index/pagarse?transact="+var1
}

</script><?php }} ?>