<?php /* Smarty version 3.1.27, created on 2021-11-15 15:57:37
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/block.soc.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:733817271619259412fbd06_17598961%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fb52c6a942b5c35e73ee90c106089222f855f19' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/block.soc.tpl',
      1 => 1633533334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '733817271619259412fbd06_17598961',
  'variables' => 
  array (
    'class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_619259412fdf45_48698275',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619259412fdf45_48698275')) {
function content_619259412fdf45_48698275 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '733817271619259412fbd06_17598961';
?>
<ul<?php if ($_smarty_tpl->tpl_vars['class']->value) {?> class="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['class']->value);?>
"<?php }?>>                                
    <li><a href="https://www.facebook.com/profile.php?id=100072277814645" target="_blank"><img src="https://img.icons8.com/color/24/000000/facebook-new.png"/></a></li>
    <li><a href="https://twitter.com/PayDeL_finance?t=6GVxNmpzZcNWwMC8MVGqDQ&s=09" target="_blank"><img src="https://img.icons8.com/color/24/000000/twitter-circled--v3.png"/></span></a></li>
    <li><a href="https://t.me/PayDeL_news" target="_blank"><img src="https://img.icons8.com/color/24/000000/telegram-app--v5.png"/></a></li>
</ul><?php }
}
?>