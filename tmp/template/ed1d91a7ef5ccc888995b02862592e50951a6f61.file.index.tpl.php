<?php /* Smarty version Smarty-3.1.8, created on 2014-10-20 14:48:32
         compiled from "/opt/lampp/htdocs/ristoranet/modules/visual/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166845877054454af0e52579-94634243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed1d91a7ef5ccc888995b02862592e50951a6f61' => 
    array (
      0 => '/opt/lampp/htdocs/ristoranet/modules/visual/views/index/index.tpl',
      1 => 1412375247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166845877054454af0e52579-94634243',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'activa' => 0,
    'a' => 0,
    'idusu' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_54454af0ee05b5_57391654',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54454af0ee05b5_57391654')) {function content_54454af0ee05b5_57391654($_smarty_tpl) {?><div class="container" style="width: 100%; height: 570px; background: #f1f1f1;">
    <legend>Nuevas Transacciones</legend>
    <div >
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
 $_from = $_smarty_tpl->tpl_vars['activa']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
$_smarty_tpl->tpl_vars['a']->_loop = true;
?>
                          <tr onclick="showthis('<?php echo $_smarty_tpl->tpl_vars['a']->value['codTran'];?>
');"  class="bg-warning">
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
</div>
<input type="hidden" id="idusu" value="<?php echo $_smarty_tpl->tpl_vars['idusu']->value;?>
">
<div id="mishale"></div>



<script>
var idleTime = 0;
var ruta_root = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
'
$(document).ready( function(){

  $.post('/ristoranet/visual/dbs/mish', function(datos){ 
  $('#activas').html('');       
        for(var i = 0; i < datos.length; i++){
           

            $('#activas').append('<tr id="unidad" onclick="showthis('+datos[i].codTran+');" class="bg-warning"><td><h4><b>'+datos[i].codTran+'</b></h4></td><td><h4>'+datos[i].ST12codMesa+''+datos[i].ST12secMesa+'</h4></td><td><h4>'+datos[i].ST12hora+' '+datos[i].ST12fecha+'</h4></td><td><h4>'+datos[i].USUnom+'</h4></td><td><h4>'+accounting.formatMoney(datos[i].ST12total)+'</h4></td></tr>')
        }       
    }

,'json');



    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 2) { // 20 minutes
        window.location.reload();
    }



}

  var socket = io('http://localhost');
  socket.on('connect', function(){
    socket.on('event', function(data){});
    socket.on('disconnect', function(){});
  });


function showthis(transact){
    window.location.href = ruta_root + "visual/index/show?transact="+transact
  }
</script><?php }} ?>