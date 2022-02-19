<?php /* Smarty version 3.1.27, created on 2021-11-14 20:41:26
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/index_top_investors.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:65233163161914a466a9fa4_29968136%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '396a0dfb9586836f22035209addd8416a7dc8214' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/index_top_investors.tpl',
      1 => 1631282966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65233163161914a466a9fa4_29968136',
  'variables' => 
  array (
    'settings' => 0,
    'top_investors' => 0,
    's' => 0,
    'currency_sign' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_61914a466b3ef2_50539800',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_61914a466b3ef2_50539800')) {
function content_61914a466b3ef2_50539800 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '65233163161914a466a9fa4_29968136';
echo loaddata_smarty(array('name'=>"top_investors",'limit'=>$_smarty_tpl->tpl_vars['settings']->value['index_top_investors'],'var'=>"top_investors",'active'=>1),$_smarty_tpl);?>


<div class="item">
    <span class="name">Top investors</span>
    <div class="listLine">
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['index_top_investors']) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['top_investors']->value;
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