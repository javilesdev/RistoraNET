<div class="row">
    <div class="container">
        <div class="col-lg-11">
            <div class="well-lg" style="background-color: white;">
                <legend>Registro de Proveedores</legend>
                <div class="panel panel-primary">
                    <div class="panel-heading">Acciones</div>
                    <div class="panel-body">
                        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                            Agregar Proveedor
                        </button>
                    </div>
                </div>
                <div class="table">
                    
                    <div class="row">
				
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
				
								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"
				
								-->
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>Lista de Proveedores</h2>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				
										<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
											<thead>
												<tr>
													<th>ID</th>
                                                                                                        <th>Nombre Proveedor</th>
                                                                                                        <th>Encargado Contacto</th>
                                                                                                        <th>Email</th>
                                                                                                        <th>Movil</th>
                                                                                                        <th>Fono/Fax</th>
                                                                                                        <th>Nivel Proveedor</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Jennifer</td>
													<td>1-342-463-8341</td>
													<td>Et Rutrum Non Associates</td>
													<td>35728</td>
													<td>Fogo</td>
													<td>03/04/14</td>
												</tr>												
											</tbody>
										</table>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->

                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form role="form" method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
          
          <div class="form-group">
              <label for="exampleInputEmail1">Nombre Empresa Proveedor</label>
              <input type="text" name="proveedor" class="form-control" id="exampleInputEmail1" required="">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Nombre Contacto</label>
              <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" required="">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Dirección</label>
              <input type="text" name="direccion" class="form-control" id="exampleInputEmail1" required="">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Email Proveedor</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" required="">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Movil</label>
              <input type="text" name="movil" class="form-control" id="exampleInputEmail1" required="">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Fono/Fax</label>
              <input type="text" name="fono" class="form-control" id="exampleInputEmail1" placeholder="Fono" required="">
              <input type="text" name="fax" class="form-control" id="exampleInputEmail1" placeholder="Fax" required="">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="hidden" value="1" name="enviar">
        <input type="submit" class="btn btn-success" value="Ingresar">
      </div>
        </form>
    </div>
  </div>
</div>    
    
    
<script type="text/javascript">
        $(document).ready(function() {
pageSetUp();    
$('#dt_basic').dataTable();
});
</script>