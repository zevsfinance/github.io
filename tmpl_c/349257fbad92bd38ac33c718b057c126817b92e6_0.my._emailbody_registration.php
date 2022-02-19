<?php /* Smarty version 3.1.27, created on 2021-11-11 17:31:18
         compiled from "my:_emailbody_registration" */ ?>
<?php
/*%%SmartyHeaderCode:532616132618d2936b00169_78830879%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '349257fbad92bd38ac33c718b057c126817b92e6' => 
    array (
      0 => 'my:_emailbody_registration',
      1 => 1636641078,
      2 => 'my',
    ),
  ),
  'nocache_hash' => '532616132618d2936b00169_78830879',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618d2936b08d23_72278457',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618d2936b08d23_72278457')) {
function content_618d2936b08d23_72278457 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '532616132618d2936b00169_78830879';
?>
Hello #name#,

Thank you for registration on our site.

Your login information:

Login: #username#
Password: #password#

You can login here: #site_url#

Contact us immediately if you did not authorize this registration.

Thank you.<?php }
}
?>