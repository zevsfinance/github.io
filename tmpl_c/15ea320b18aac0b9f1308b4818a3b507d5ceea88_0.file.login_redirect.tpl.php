<?php /* Smarty version 3.1.27, created on 2021-11-14 23:28:42
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/login_redirect.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:17090892466191717aa5b3a6_78686085%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15ea320b18aac0b9f1308b4818a3b507d5ceea88' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/login_redirect.tpl',
      1 => 1631282966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17090892466191717aa5b3a6_78686085',
  'variables' => 
  array (
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_6191717aa627c4_64673114',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_6191717aa627c4_64673114')) {
function content_6191717aa627c4_64673114 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '17090892466191717aa5b3a6_78686085';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Welcome!"), 0);
?>

<META HTTP-EQUIV=Refresh CONTENT="0; URL=<?php echo smarty_modifier_myescape(encurl("?a=account"));?>
">

<div class="loginBl">
    <div class="container">
        <div class="wrapIn">
            <div class="formaMessage" style="color: white;">            
                Hello <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['userinfo']->value['username']);?>
. You are redirecting to your  <a href=?a=account>account</a> now.
            </div>
        </div>
    </div>
    <div class="ball right"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>