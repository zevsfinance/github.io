<?php /* Smarty version 3.1.27, created on 2021-11-14 20:41:26
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/index_last_deposits.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:213581789661914a466ba734_90404034%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb81ef7b39edeca3e83591f38271e9e609c2d867' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/index_last_deposits.tpl',
      1 => 1633483084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213581789661914a466ba734_90404034',
  'variables' => 
  array (
    'settings' => 0,
    'last_deposits' => 0,
    's' => 0,
    'currency_sign' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_61914a466c74e7_50369510',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_61914a466c74e7_50369510')) {
function content_61914a466c74e7_50369510 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '213581789661914a466ba734_90404034';
if ($_smarty_tpl->tpl_vars['settings']->value['index_last_deposits']) {?>
    <?php echo loaddata_smarty(array('name'=>"transactions",'limit'=>$_smarty_tpl->tpl_vars['settings']->value['index_last_deposits'],'type'=>"deposit",'var'=>"last_deposits"),$_smarty_tpl);?>

<?php }?>

<div class="item">
    <span class="name">Last Deposits</span>
    <div class="listLine">
        <?php if ($_smarty_tpl->tpl_vars['last_deposits']->value) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['last_deposits']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['s']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->_loop = true;
$foreach_s_Sav = $_smarty_tpl->tpl_vars['s'];
?>
                <div class="line">
                    <span class="iconBl" style="background-image: url(img/ic-lastoper.png)"></span>
                    <span class="tit"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['s']->value['username']);?>
</span>
                    <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['s']->value['amount']);?>
</span>
                    <span class="iconPl" style="background-image: url(img/ps_s/<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['s']->value['ec']);?>
.png)"></span>
                </div>              
            <?php
$_smarty_tpl->tpl_vars['s'] = $foreach_s_Sav;
}
?>
        <?php }?>                           
    </div>
</div><?php }
}
?>