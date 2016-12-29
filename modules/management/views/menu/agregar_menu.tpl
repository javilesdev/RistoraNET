<div class="row">
<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false">								
								<header>
									<span class="widget-icon"> <i class="fa fa-eye"></i> </span>
									<h1>Formulario de Ingreso de Menu o Producto</h1>
				
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
				
										<form class="form-horizontal" id="form1" method="post" action="{$_layoutParams.root}management/menu/agregar_menu" enctype="multipart/form-data">
											
											<fieldset>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Nombre</b></label>
													<div class="col-md-3">													
														<input class="form-control" id="nombre" placeholder="" type="text" name="producto">
														<b class="tooltip tooltip-bottom-right">Informacion Escencial</b> </label>
													</div>

												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Categoria</b></label>
													<div class="col-md-3">
													<select class="form-control" id="categoria" name="categoria">														
                										{foreach from=$categorias item=ct}
                										<option value="{$ct.cod}">{$ct.categoria}</option>
            											{/foreach}           											
													</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Stock</b></label>
													<div class="col-md-3">
														<input class="form-control" placeholder="" type="text" name="stock" id="stock">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-2" for="appendprepend"><b>Coste Unitario</b></label>
													<div class="col-md-10">
														<div class="row">
															<div class="col-sm-3">
																<div class="input-group">
																	<span class="input-group-addon">$</span>
																	<input class="form-control" id="appendprepend" type="text" name="precio">
																	<span class="input-group-addon">._</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Imagen</b></label>
													<div class="col-md-10">
														<input type="file" class="btn btn-default" id="exampleInputFile1" name="imagen">
														<p class="help-block">
															Ingrese una Imagen Relacionada con el Menu.
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"><b>Descripcion</b></label>
													<div class="col-md-4">
														<textarea class="form-control" name="descripcion" rows="4"></textarea>	
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-2 control-label"></label>
													<div class="col-md-10">
														<label class="checkbox-inline">
															<input type="checkbox" name="visible" value="NULL">
															No Visible?</label>														
													</div>
												</div>									
												
									</fieldset>
									<fieldset>
										<input type="hidden" value="1" name="agregar">
										<input type="submit" value="Registrar" class="btn btn-success btn-lg">
									</fieldset>
</form>
</div>
</div>
</div>
</div>

