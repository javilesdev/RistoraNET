<div class="row">
<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false">								
								<header>
									<span class="widget-icon"> <i class="fa fa-eye"></i> </span>
									<h1>Formulario de Registro</h1>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body">
				
										<form class="form-horizontal" id="form1" method="post" action="{$_layoutParams.root}management/admin/registro" enctype="multipart/form-data">
											
											<fieldset>
												<legend>Datos Basicos</legend>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Nombre Completo</b></label>
													<div class="col-md-3">
													
														<input class="form-control" id="nombre" placeholder="" type="text" name="nombre">
														<b class="tooltip tooltip-bottom-right">Informacion Escencial</b> </label>
													
													</div>

												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Usuario</b></label>
													<div class="col-md-3">
														<input class="form-control" placeholder="" type="text" name="usuario" id="usuario">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Contraseña</b></label>
													<div class="col-md-3">
														<input class="form-control" placeholder="" type="password" id="password" name="password">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Confirme Contraseña</b></label>
													<div class="col-md-3">
														<input class="form-control" placeholder="" type="password" name="repassword" id="repassword">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Email</b></label>
													<div class="col-md-3">
														<input class="form-control" placeholder="" type="email" name="email" id="email">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Rol/Cargo</b></label>
													<div class="col-md-3">
													<select class="form-control" id="rol" name="rol">
														{foreach from=$roles item=rl}
                										<option value="{$rl.id_role}">{$rl.role}</option>
            											{/foreach}
													</select>
													</div>
												</div>
									</fieldset>
									<fieldset>
										<input type="hidden" value="1" name="registrar">
										<input type="submit" value="Registrar" class="btn btn-success btn-lg">
									</fieldset>
</form>
</div>
</div>
</div>
</div>

