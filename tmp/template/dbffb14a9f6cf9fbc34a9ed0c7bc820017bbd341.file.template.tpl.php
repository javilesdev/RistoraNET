<?php /* Smarty version Smarty-3.1.8, created on 2014-10-20 19:46:29
         compiled from "/opt/lampp/htdocs/ristoranet/views/layout/mobile/template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32674524154454ac54eadd0-84779211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbffb14a9f6cf9fbc34a9ed0c7bc820017bbd341' => 
    array (
      0 => '/opt/lampp/htdocs/ristoranet/views/layout/mobile/template.tpl',
      1 => 1413845159,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32674524154454ac54eadd0-84779211',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_54454ac55adea4_85612604',
  'variables' => 
  array (
    'titulo' => 0,
    '_layoutParams' => 0,
    'plg' => 0,
    'js' => 0,
    'widgets' => 0,
    'tp' => 0,
    '_error' => 0,
    '_mensaje' => 0,
    '_contenido' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54454ac55adea4_85612604')) {function content_54454ac55adea4_85612604($_smarty_tpl) {?><!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mobile///<?php echo (($tmp = @$_smarty_tpl->tpl_vars['titulo']->value)===null||$tmp==='' ? "Sin t&iacute;tulo" : $tmp);?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
bootstrap-theme.css" rel="stylesheet" type="text/css"> 
    
 
    
    


    <style>
    body {
    padding-top: 60px;
    padding-bottom: 40px;
    background-color: #eee;
    }
    
    </style>

    <script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
jquery.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
jquery-ui.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
bootstrap.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
socket.io.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/accounting.js"></script>
    <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])){?>
            <?php  $_smarty_tpl->tpl_vars['plg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['plg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['plg']->key => $_smarty_tpl->tpl_vars['plg']->value){
$_smarty_tpl->tpl_vars['plg']->_loop = true;
?>
                <script src="<?php echo $_smarty_tpl->tpl_vars['plg']->value;?>
" type="text/javascript"></script>
            <?php } ?>
        <?php }?>
        
        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])&&count($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])){?>
            <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['_layoutParams']->value['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value){
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
                <script src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
" type="text/javascript"></script>
        <?php } ?>
    <?php }?>
    
    <script type="text/javascript">
        var _root_ = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
';
    </script>
  </head>

  <body>
    <?php if (isset($_smarty_tpl->tpl_vars['widgets']->value['top'])){?>
       <?php  $_smarty_tpl->tpl_vars['tp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tp']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['widgets']->value['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tp']->key => $_smarty_tpl->tpl_vars['tp']->value){
$_smarty_tpl->tpl_vars['tp']->_loop = true;
?>
               <?php echo $_smarty_tpl->tpl_vars['tp']->value;?>

       <?php } ?>
    <?php }?>
    

    <!--/ Comienzo del Contenedor -->

    <div class="container">

      <div class="span8">
                <noscript><p>Para el correcto funcionamiento debe tener el soporte para javascript habilitado</p></noscript>
                    
                <?php if (isset($_smarty_tpl->tpl_vars['_error']->value)){?>
                    <div id="_errl" class="alert alert-error">
                        <a class="close" data-dismiss="alert">x</a>
                        <?php echo $_smarty_tpl->tpl_vars['_error']->value;?>

                    </div>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['_mensaje']->value)){?>
                    <div id="_msgl" class="alert alert-success">
                        <a class="close" data-dismiss="alert">x</a>
                        <?php echo $_smarty_tpl->tpl_vars['_mensaje']->value;?>

                    </div>
                <?php }?>

                <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            </div>            
           
    </div>

    <!--/ fin del Contenedor -->


    <!-- Javascript -->
  
    
    
  </body>
</html><?php }} ?>