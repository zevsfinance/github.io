<?php /* Smarty version 3.1.27, created on 2021-11-13 10:07:34
         compiled from "my:_emailbody_acsent_user" */ ?>
<?php
/*%%SmartyHeaderCode:1056593135618f643696e645_23364475%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b3299189bf219b3956317941c8e59c690962e4a' => 
    array (
      0 => 'my:_emailbody_acsent_user',
      1 => 1636787254,
      2 => 'my',
    ),
  ),
  'nocache_hash' => '1056593135618f643696e645_23364475',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618f6436971dd4_84645839',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618f6436971dd4_84645839')) {
function content_618f6436971dd4_84645839 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1056593135618f643696e645_23364475';
?>
Hello #name#.

Someone tried login your account
ip: #ip#
browser: #browser#

Pin code for entering your account is: #NEWPIN#

This code will be expired in 15 minutes.


#site_name#
#site_url#<?php }
}
?>