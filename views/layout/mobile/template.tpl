<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mobile///{$titulo|default:"Sin t&iacute;tulo"}</title>

    <!-- Bootstrap core CSS -->
    <link href="{$_layoutParams.ruta_css}bootstrap.css" rel="stylesheet" type="text/css">
		
    
 
    
    


    <style>
    body {
    padding-top: 60px;
    padding-bottom: 40px;
    background-color: #eee;
    }
    
    </style>

    <script src="{$_layoutParams.ruta_js}jquery.js"></script>
    <script src="{$_layoutParams.ruta_js}jquery-ui.js"></script>
    <script src="{$_layoutParams.ruta_js}bootstrap.js"></script>
    <script src="{$_layoutParams.ruta_js}socket.io.js"></script>
    <script src="{$_layoutParams.root}public/js/accounting.js"></script>
    {if isset($_layoutParams.js_plugin) && count($_layoutParams.js_plugin)}
            {foreach item=plg from=$_layoutParams.js_plugin}
                <script src="{$plg}" type="text/javascript"></script>
            {/foreach}
        {/if}
        
        {if isset($_layoutParams.js) && count($_layoutParams.js)}
            {foreach item=js from=$_layoutParams.js}
                <script src="{$js}" type="text/javascript"></script>
        {/foreach}
    {/if}
    
    <script type="text/javascript">
        var _root_ = '{$_layoutParams.root}';
    </script>
  </head>

  <body>
    {if isset($widgets.top)}
       {foreach from=$widgets.top item=tp}
               {$tp}
       {/foreach}
    {/if}
    

    <!--/ Comienzo del Contenedor -->

    <div class="container">

      <div class="span8">
                <noscript><p>Para el correcto funcionamiento debe tener el soporte para javascript habilitado</p></noscript>
                    
                {if isset($_error)}
                    <div id="_errl" class="alert alert-error">
                        <a class="close" data-dismiss="alert">x</a>
                        {$_error}
                    </div>
                {/if}

                {if isset($_mensaje)}
                    <div id="_msgl" class="alert alert-success">
                        <a class="close" data-dismiss="alert">x</a>
                        {$_mensaje}
                    </div>
                {/if}

                {include file=$_contenido}
            </div>            
           
    </div>

    <!--/ fin del Contenedor -->


    <!-- Javascript -->
  
    
    
  </body>
</html>