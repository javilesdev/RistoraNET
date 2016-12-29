<?php /* Smarty version Smarty-3.1.8, created on 2015-04-21 14:08:57
         compiled from "C:\xampp\htdocs\ristoranet\modules\mobile\views\comanda\confirmar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1856155363dd940ce97-07926845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b393ec1a900a10da4c365e0e2df23224ee527e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\modules\\mobile\\views\\comanda\\confirmar.tpl',
      1 => 1410280675,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1856155363dd940ce97-07926845',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'transact' => 0,
    'mesa' => 0,
    'seccion' => 0,
    'capacidad' => 0,
    'totales' => 0,
    'pr' => 0,
    'subtotal' => 0,
    'iva' => 0,
    'total' => 0,
    'propina' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55363dd948f101_58190611',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55363dd948f101_58190611')) {function content_55363dd948f101_58190611($_smarty_tpl) {?><div class="confirmar" style="height: 600px;">
    <h3 class="col-md-offset-2">Confirmacion de Comanda</h3>
    <div class="form-group col-xs-2 col-md-offset-2">
    <label for="text-basic">Cod Transaccion</label>
    <input type="text" class="form-control input-lg" name="transact" id="transact"  value="<?php echo $_smarty_tpl->tpl_vars['transact']->value;?>
" disabled="disabled">
    </div>
    <div class="form-group col-xs-1">
    <label for="text-basic">Mesa</label>
    <input type="text" class="form-control input-lg" name="transact" id="transact"  value="<?php echo $_smarty_tpl->tpl_vars['mesa']->value;?>
<?php echo $_smarty_tpl->tpl_vars['seccion']->value;?>
" disabled="disabled">
    </div>
    <div class="form-group col-xs-2">
    <label for="text-basic">Numero de Clientes</label>
    <input type="text" class="form-control input-lg" name="transact" id="transact"  value="<?php echo $_smarty_tpl->tpl_vars['capacidad']->value;?>
" disabled="disabled">
    </div>
    <div class="col-md-6 col-md-offset-2">
        <div class="table table-responsive">
              <table class="table" data-role="table" >
                <thead class="fixedHeader">
                    <tr>
                        <th>Producto</th>                        
                        <th style="text-align: center;">Cantidad</th>                        
                        <th style="text-align: center;">Totales</th>
                    </tr>
                 </thead>
                 <tbody class="scrollContent" id="tabla12">
                <?php  $_smarty_tpl->tpl_vars['pr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['totales']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->key => $_smarty_tpl->tpl_vars['pr']->value){
$_smarty_tpl->tpl_vars['pr']->_loop = true;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['pr']->value['nombre'];?>
</td>               
                    <td><?php echo $_smarty_tpl->tpl_vars['pr']->value['cantidad'];?>
</td>                   
                    <td><b>$ <?php echo number_format($_smarty_tpl->tpl_vars['pr']->value['total'],0,".",".");?>
</b></td>
                    <td>
                            <button class="btn btn-warning btn-sm" onclick="quitar('<?php echo $_smarty_tpl->tpl_vars['transact']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['pr']->value['id_producto'];?>
');">Quitar</button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="remover('<?php echo $_smarty_tpl->tpl_vars['transact']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['pr']->value['id_producto'];?>
');">Borrar</button>
                        </td>
                </tr>
            <?php } ?>
           
                 </tbody>
                 <tfoot >
                     <tr>
                         <td style="text-align: right;"><h4>Subtotal $ <?php echo number_format($_smarty_tpl->tpl_vars['subtotal']->value,0,".",".");?>
</h4>
                         <h4>IVA $ <?php echo number_format($_smarty_tpl->tpl_vars['iva']->value,0,".",".");?>
</h4>
                         <h4><b>TOTAL $ <?php echo number_format($_smarty_tpl->tpl_vars['total']->value,0,".",".");?>
</b></h4>
                         <h5 style="color:red;"><b>Propina Recomendada $ <?php echo number_format($_smarty_tpl->tpl_vars['propina']->value,0,".",".");?>
</b></h5>
                         </td>                                                  
                     </tr>                     
                 </tfoot>
                </table>    
                </div>
                         
    </div>
                         <div class="col-md-4">
                             <form class="formarea" method="post">
                             <div class="form-group">
                            <label for="text-basic">Nota</label>
                            <textarea class="form-control input-lg" name="detalle" rows="7"></textarea>
                            </div>
                            <div class="form-group col-md-offset-4">
                                <input type="hidden" name="terminar" value="1">   
                             <input type="submit" class="btn btn-success btn-lg" value="Terminar">
                            </div>
                            <div class="form-group col-md-offset-4">                                
                                <a href="javascript:history.back(1)" class="btn btn-danger btn-lg">Volver a la p&aacute;gina anterior</a>

                            </div>
                         </form>         
                         </div>
</div>

<script>
var ruta_root = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
'
function quitar(transact,idProducto){
$.post(ruta_root + 'mobile/comanda/cesta_a/'+transact+'/' + idProducto + '/remove')
location.reload();
}

function remover(transact,idProducto){
$.post(ruta_root + 'mobile/comanda/cesta_a/'+transact+'/' + idProducto + '/delete')
location.reload();
}

function atras(){
    parent.history.back();
    return false;
}
</script><?php }} ?>