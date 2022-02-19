<?php /* Smarty version 3.1.27, created on 2021-11-11 17:31:18
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/after_registration.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1623248636618d2936d443b8_18822314%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01d4fb84c5cec4aff137ba3336fabcdf767d1dd9' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/after_registration.tpl',
      1 => 1631282966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1623248636618d2936d443b8_18822314',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618d2936d4d339_43647640',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618d2936d4d339_43647640')) {
function content_618d2936d4d339_43647640 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1623248636618d2936d443b8_18822314';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Registration completed"), 0);
?>


<div class="loginBl">
    <div class="container">
        <div class="wrapIn">
            <div class="formaMessage" style="color: white;">            
                Thank you for joining our program.<br>
                You are now an official member of this program. You can login to your account to start investing with us and use all the services that are available for our members.
                <br>
                <br>

                <b>Important:</b> Do not provide your login and password to anyone!
            </div>
        </div>
    </div>
    <div class="ball right"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>