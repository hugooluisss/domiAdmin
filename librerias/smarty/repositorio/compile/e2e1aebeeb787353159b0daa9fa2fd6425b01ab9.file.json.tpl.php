<?php /* Smarty version Smarty-3.1.11, created on 2016-12-20 10:46:00
         compiled from "templates/plantillas/layout/json.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2064198435859604853c533-22735703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2e1aebeeb787353159b0daa9fa2fd6425b01ab9' => 
    array (
      0 => 'templates/plantillas/layout/json.tpl',
      1 => 1482244706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2064198435859604853c533-22735703',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'json' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_58596048589257_93224148',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58596048589257_93224148')) {function content_58596048589257_93224148($_smarty_tpl) {?><?php echo json_encode($_smarty_tpl->tpl_vars['json']->value);?>
<?php }} ?>