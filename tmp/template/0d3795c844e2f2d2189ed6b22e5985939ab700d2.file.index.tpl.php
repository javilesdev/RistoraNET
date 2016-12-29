<?php /* Smarty version Smarty-3.1.8, created on 2015-04-20 12:22:11
         compiled from "C:\xampp\htdocs\ristoranet\modules\mobile\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13894553519a30a4d97-70245601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d3795c844e2f2d2189ed6b22e5985939ab700d2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\modules\\mobile\\views\\index\\index.tpl',
      1 => 1411421647,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13894553519a30a4d97-70245601',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lista' => 0,
    'a' => 0,
    'mes' => 0,
    'activa' => 0,
    'idusu' => 0,
    'mesas' => 0,
    '_layoutParams' => 0,
    'signal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_553519a3133e84_81846633',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_553519a3133e84_81846633')) {function content_553519a3133e84_81846633($_smarty_tpl) {?><div class="container" style="width: 100%; height: 570px; background: #f1f1f1;">
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
                 <?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['a']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
                          <tr onclick="showthis('<?php echo $_smarty_tpl->tpl_vars['a']->value['codTran'];?>
');" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00102'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1==0){?>class="bg-info"<?php }else{?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00102'];?>
<?php $_tmp2=ob_get_clean();?><?php if ($_tmp2==1){?>class="bg-info"<?php }}?>>
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
                          <tr onclick="showthis('<?php echo $_smarty_tpl->tpl_vars['a']->value['codTran'];?>
');" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00102'];?>
<?php $_tmp3=ob_get_clean();?><?php if ($_tmp3==0){?>class="bg-warning"<?php }else{?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00102'];?>
<?php $_tmp4=ob_get_clean();?><?php if ($_tmp4==1){?>class="bg-info"<?php }}?>>
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
<input type="hidden" id="idusu" value="<?php echo $_smarty_tpl->tpl_vars['idusu']->value;?>
">
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
  				<?php if (isset($_smarty_tpl->tpl_vars['mesas']->value)&&count($_smarty_tpl->tpl_vars['mesas']->value)){?> 
        		<?php  $_smarty_tpl->tpl_vars['mes'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mes']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mesas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mes']->key => $_smarty_tpl->tpl_vars['mes']->value){
$_smarty_tpl->tpl_vars['mes']->_loop = true;
?>
  				<option value="<?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00100'];?>
|<?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00101'];?>
|<?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00102'];?>
"  <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00102'];?>
<?php $_tmp5=ob_get_clean();?><?php if ($_tmp5==1){?>class="bg-danger"<?php }else{ ?>class="bg-success"<?php }?>>Mesa/Seccion: <?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00100'];?>
<?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00101'];?>
 Capacidad: Estado: <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['mes']->value['SNVG_C00102'];?>
<?php $_tmp6=ob_get_clean();?><?php if ($_tmp6==1){?><b>OCUPADO</b><?php }else{ ?><b>DISPONIBLE</b><?php }?></option>  				
  				<?php } ?>
  				<?php }?>
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
var ruta_root = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
'
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
  var signal = <?php echo $_smarty_tpl->tpl_vars['signal']->value;?>

  if(signal==0){
  $("#comanda" ).prop( "disabled", true );
  }
</script><?php }} ?>