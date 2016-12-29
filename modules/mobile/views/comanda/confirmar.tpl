<div class="confirmar" style="height: 600px;">
    <h3 class="col-md-offset-2">Confirmacion de Comanda</h3>
    <div class="form-group col-xs-2 col-md-offset-2">
    <label for="text-basic">Cod Transaccion</label>
    <input type="text" class="form-control input-lg" name="transact" id="transact"  value="{$transact}" disabled="disabled">
    </div>
    <div class="form-group col-xs-1">
    <label for="text-basic">Mesa</label>
    <input type="text" class="form-control input-lg" name="transact" id="transact"  value="{$mesa}{$seccion}" disabled="disabled">
    </div>
    <div class="form-group col-xs-2">
    <label for="text-basic">Numero de Clientes</label>
    <input type="text" class="form-control input-lg" name="transact" id="transact"  value="{$capacidad}" disabled="disabled">
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
                {foreach from=$totales item=pr}
                <tr>
                    <td>{$pr.nombre}</td>               
                    <td>{$pr.cantidad}</td>                   
                    <td><b>$ {$pr.total|number_format:0:".":"."}</b></td>
                    <td>
                            <button class="btn btn-warning btn-sm" onclick="quitar('{$transact}','{$pr.id_producto}');">Quitar</button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="remover('{$transact}','{$pr.id_producto}');">Borrar</button>
                        </td>
                </tr>
            {/foreach}
           
                 </tbody>
                 <tfoot >
                     <tr>
                         <td style="text-align: right;"><h4>Subtotal $ {$subtotal|number_format:0:".":"."}</h4>
                         <h4>IVA $ {$iva|number_format:0:".":"."}</h4>
                         <h4><b>TOTAL $ {$total|number_format:0:".":"."}</b></h4>
                         <h5 style="color:red;"><b>Propina Recomendada $ {$propina|number_format:0:".":"."}</b></h5>
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
var ruta_root = '{$_layoutParams.root}'
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
</script>