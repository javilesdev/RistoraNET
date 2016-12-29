<div id="content">
<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
	<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> My Dashboard</span></h1>	
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 panel panel-primary">
		<div class="panel-body">
		<a class="btn btn-success" href="{$_layoutParams.root}management/admin/registro"><i class="fa fa-circle-arrow-up fa-lg"></i>Registrar</a>
		</div>
</div>


<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
				
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-purity" id="wid-id-0" data-widget-editbutton="false">
						
								
								<header>
									<span class="widget-icon"> <i class="fa fa-user"></i> </span>
									<h2>Lista de Empleados/Usuarios</h2>
				
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
												<th>Nombre</th>	
												<th>Usuario</th>													
												<th>Email</th>
												<th>Cargo</th>									
												</tr>
											</thead>
											<tbody>
												{foreach from=$usuarios item=u}
                  								<tr>
                       								
                									<td>{$u.id}</td>
                									<td>{$u.nombre}</td>
                									<td>{$u.usuario}</td>
                									<td>{$u.email}</td>
                									<td>{$u.rol}</td>
                									<td><a href="{$_layoutParams.root}management/admin/permisos_usuario/{$u.id}">Permisos</a></td>
            										      								                       
                   								</tr>
                   							{/foreach}                 
											</tbody>
										</table>
				
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							<!-- end widget -->			
							</div>

