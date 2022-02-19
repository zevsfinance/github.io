<?php /* Smarty version 3.1.27, created on 2021-11-13 10:08:37
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/pin_page.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1848544320618f64753d5cb6_92679818%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71d74c9be4c32c6b77d99c243db88d1eb73770a6' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/pin_page.tpl',
      1 => 1631282966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1848544320618f64753d5cb6_92679818',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618f64753da617_95776661',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618f64753da617_95776661')) {
function content_618f64753da617_95776661 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1848544320618f64753d5cb6_92679818';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<h3>Enter pin:</h3><br>

Your ip or browser is different from ip or browser you use when login last time. Please check your e-mail account and find pin code. Then enter pin code in form bellow:<br>



<form method=post>
<input type=hidden name=a value="enter_pin">
<input type=text name=pin value="" class=inpts>
<input type=submit class=sbmt>
</form>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
?>