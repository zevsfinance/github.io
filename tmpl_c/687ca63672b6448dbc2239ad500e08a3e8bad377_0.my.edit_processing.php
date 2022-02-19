<?php /* Smarty version 3.1.27, created on 2021-11-13 11:06:30
         compiled from "my:edit_processing" */ ?>
<?php
/*%%SmartyHeaderCode:1583902666618f7206c4db48_75523920%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '687ca63672b6448dbc2239ad500e08a3e8bad377' => 
    array (
      0 => 'my:edit_processing',
      1 => 1636790790,
      2 => 'my',
    ),
  ),
  'nocache_hash' => '1583902666618f7206c4db48_75523920',
  'variables' => 
  array (
    'p' => 0,
    'dfields' => 0,
    'i' => 0,
    'f' => 0,
    'wfields' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618f7206c5d871_78928766',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618f7206c5d871_78928766')) {
function content_618f7206c5d871_78928766 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1583902666618f7206c4db48_75523920';
?>
 <b><?php if ($_smarty_tpl->tpl_vars['p']->value) {?>Edit<?php } else { ?>Add<?php }?> Processing:</b><br><br> <?php echo '<script'; ?>
 language=javascript>  function c1() { var d = document.processing; for (i = 1; i <= 20; i++) { if (d.elements['dfields['+i+']']) d.elements['dfields['+i+']'].disabled = (d.elements['duse['+i+']'].checked) ? 0 : 1; if (d.elements['wfields['+i+']']) d.elements['wfields['+i+']'].disabled = (d.elements['wuse['+i+']'].checked) ? 0 : 1; } }  <?php echo '</script'; ?>
> <form method=post name="processing"> <input type="hidden" name=a value=edit_processing> <input type="hidden" name=action value=edit_processing> <input type="hidden" name=pid value=<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
> <table cellspacing=0 cellpadding=1 border=0> <tr> <td>Status</td> <td><input type="checkbox" name="status" value=1 <?php if ($_smarty_tpl->tpl_vars['p']->value['status']) {?>checked<?php }?>></td> </tr><tr> <td>Name:</td> <td><input type="text" name="name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class=inpts size=40></td> </tr> <tr> <td width=117>Payment notes:</td> <td><textarea name="description" rows=8 cols=40 class=inpts><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</textarea></td> </tr> </table> <table cellspacing=0 cellpadding=2 border=0> <tr> <td colspan=2> <h4>Depoist Fields</h4>  <table cellspacing=0 cellpadding=2 border=0> <tr><th>Active</th><th>#</th><th>Field name</th><tr> <?php
$_from = $_smarty_tpl->tpl_vars['dfields']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['f']->_loop = false;
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
$foreach_f_Sav = $_smarty_tpl->tpl_vars['f'];
?> <tr> <td align=center><input type=checkbox name="duse[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
]" value=1 <?php if ($_smarty_tpl->tpl_vars['f']->value) {?>checked<?php }?> onclick="c1()"></td> <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
:</td> <td><input type="text" name="dfields[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value, ENT_QUOTES, 'UTF-8', true);?>
" class=inpts size=40></td> </tr> <?php
$_smarty_tpl->tpl_vars['f'] = $foreach_f_Sav;
}
?> </table> <h4>Withdraw Fields</h4> <table cellspacing=0 cellpadding=2 border=0> <tr><th>Active</th><th>#</th><th>Field name</th><tr> <?php
$_from = $_smarty_tpl->tpl_vars['wfields']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['f']->_loop = false;
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['i']->value => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
$foreach_f_Sav = $_smarty_tpl->tpl_vars['f'];
?> <tr> <td align=center><input type=checkbox name="wuse[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
]" value=1 <?php if ($_smarty_tpl->tpl_vars['f']->value) {?>checked<?php }?> onclick="c1()"></td> <td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
:</td> <td><input type="text" name="wfields[<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['f']->value, ENT_QUOTES, 'UTF-8', true);?>
" class=inpts size=40></td> </tr> <?php
$_smarty_tpl->tpl_vars['f'] = $foreach_f_Sav;
}
?> </table> </td></tr></table> <input type="submit" value="Save" class=sbmt> </form> <?php echo '<script'; ?>
> c1(); <?php echo '</script'; ?>
><br> <?php echo $_smarty_tpl->getSubTemplate ("my:start_info_table", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
 Enter all the user instructions, your account number in this payment system and all the needed information here. You'll see all new user transactions in the "Pending deposits" section.<br> You can also choose the fields a user has to fill after he has transferred the funds to your account. You can ask the user to give you the batch ID or his account number in the corresponding payment system. This information will help you to easily find the transfer or define whether it was really sent. <?php echo $_smarty_tpl->getSubTemplate ("my:end_info_table", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
 <?php }
}
?>