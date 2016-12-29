<STYLE type="text/css">
    .thumbnail:hover{
         background-color: #859bdd;
         
    }

    .thumbnail text:hover{
        color: white;
    }
</STYLE>

<div class="row">
    <div class="container">
        <p><h2>Elija un Modulo:</h2></p>
        <div class="jumbotron text-center">
            
            {if $_acl->permiso('access_estadistics')}
                <a href="{$_layoutParams.root}management" >
            <div class="col-sm-6 col-md-4">                
                <div class="thumbnail">
                    
                    <div class="caption">
                        <img src="{$_layoutParams.root}public/img/icon/glyphicons_324_tie.png">
                    <h4>Modulo Administrativo</h4>
                                       
                    </div>
                </div>                
            </div>
                    </a>
            {/if}
            {if $_acl->permiso('access_mobile')}
                <a href="{$_layoutParams.root}mobile">
            <div class="col-sm-6 col-md-4">                
                <div class="thumbnail">
                    
                    <div class="caption">
                    <img src="{$_layoutParams.root}public/img/icon/glyphicons_163_iphone.png">
                    <h4>Modulo Comanda Electronica</h4>
                                        
                    </div>
                </div>                
            </div>
                </a>
            {/if}
            {if $_acl->permiso('access_pos')}
                <a href="{$_layoutParams.root}pos">
            <div class="col-sm-6 col-md-4">                
                <div class="thumbnail">
                
                    <div class="caption">
                        <img src="{$_layoutParams.root}public/img/icon/glyphicons_160_imac.png">
                    <h4>Modulo Punto de Venta</h4>
                                        
                    </div>
                </div>                
            </div>
                </a>
            {/if}
            {if $_acl->permiso('access_visual')}
                <a href="{$_layoutParams.root}visual">
            <div class="col-sm-6 col-md-4 ">                
                <div class="thumbnail">
                    
                    <div class="caption ">
                        <img src="{$_layoutParams.root}public/img/icon/glyphicons_150_edit.png">
                        <h4>Modulo Visualizador</h4>
                                       
                    </div>
                </div>                
            </div>
                </a>
            {/if}
            
        </div>
    </div>
</div>
            
            <script>
 
            </script>