<div class="container" style="width: 100%; height: 570px; background: #f1f1f1;">
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
                   {foreach from=$activa item=a}
                          <tr onclick="showthis('{$a.codTran}');"  class="bg-warning">
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
</div>
<input type="hidden" id="idusu" value="{$idusu}">
<div id="mishale"></div>



<script>
var idleTime = 0;
var ruta_root = '{$_layoutParams.root}'
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
</script>