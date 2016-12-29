<?php /* Smarty version Smarty-3.1.8, created on 2016-12-29 01:34:14
         compiled from "C:\Users\George Shepard\Desktop\projectos\ristoranet\views\index\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1799758645a068e22f6-95645195%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe5fae03e8593f62e665b3e57af817e5f66b913f' => 
    array (
      0 => 'C:\\Users\\George Shepard\\Desktop\\projectos\\ristoranet\\views\\index\\index.tpl',
      1 => 1411009171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1799758645a068e22f6-95645195',
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
  'unifunc' => 'content_58645a06be3382_03312305',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58645a06be3382_03312305')) {function content_58645a06be3382_03312305($_smarty_tpl) {?><STYLE type="text/css">
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