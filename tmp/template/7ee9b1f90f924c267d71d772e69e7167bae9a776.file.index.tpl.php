<?php /* Smarty version Smarty-3.1.8, created on 2015-04-20 05:46:11
         compiled from "C:\xampp\htdocs\ristoranet\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3199055347683f2c4d4-50935242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ee9b1f90f924c267d71d772e69e7167bae9a776' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ristoranet\\views\\index\\index.tpl',
      1 => 1411009171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3199055347683f2c4d4-50935242',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    '_acl' => 0,
    '_layoutParams' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_55347684053c73_68891815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55347684053c73_68891815')) {function content_55347684053c73_68891815($_smarty_tpl) {?><STYLE type="text/css">
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
            
            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('access_estadistics')){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
management" >
            <div class="col-sm-6 col-md-4">                
                <div class="thumbnail">
                    
                    <div class="caption">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/icon/glyphicons_324_tie.png">
                    <h4>Modulo Administrativo</h4>
                                       
                    </div>
                </div>                
            </div>
                    </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('access_mobile')){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
mobile">
            <div class="col-sm-6 col-md-4">                
                <div class="thumbnail">
                    
                    <div class="caption">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/icon/glyphicons_163_iphone.png">
                    <h4>Modulo Comanda Electronica</h4>
                                        
                    </div>
                </div>                
            </div>
                </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('access_pos')){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
pos">
            <div class="col-sm-6 col-md-4">                
                <div class="thumbnail">
                
                    <div class="caption">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/icon/glyphicons_160_imac.png">
                    <h4>Modulo Punto de Venta</h4>
                                        
                    </div>
                </div>                
            </div>
                </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('access_visual')){?>
                <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
visual">
            <div class="col-sm-6 col-md-4 ">                
                <div class="thumbnail">
                    
                    <div class="caption ">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/icon/glyphicons_150_edit.png">
                        <h4>Modulo Visualizador</h4>
                                       
                    </div>
                </div>                
            </div>
                </a>
            <?php }?>
            
        </div>
    </div>
</div>
            
            <script>
 
            </script><?php }} ?>