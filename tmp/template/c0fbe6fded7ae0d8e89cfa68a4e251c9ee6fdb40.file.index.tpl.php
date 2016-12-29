<?php /* Smarty version Smarty-3.1.8, created on 2014-10-20 19:47:44
         compiled from "/opt/lampp/htdocs/ristoranet/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203409157554454ac0c128b5-49233064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0fbe6fded7ae0d8e89cfa68a4e251c9ee6fdb40' => 
    array (
      0 => '/opt/lampp/htdocs/ristoranet/views/index/index.tpl',
      1 => 1411009171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203409157554454ac0c128b5-49233064',
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
  'unifunc' => 'content_54454ac0cc46c8_08189141',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54454ac0cc46c8_08189141')) {function content_54454ac0cc46c8_08189141($_smarty_tpl) {?><STYLE type="text/css">
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