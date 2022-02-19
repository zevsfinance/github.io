<?php /* Smarty version 3.1.27, created on 2021-11-13 11:06:18
         compiled from "my:other_processings" */ ?>
<?php
/*%%SmartyHeaderCode:1129420041618f71fae47111_65034334%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c287f605bbd1e6191bd00266f5a7ae37472d081' => 
    array (
      0 => 'my:other_processings',
      1 => 1636790778,
      2 => 'my',
    ),
  ),
  'nocache_hash' => '1129420041618f71fae47111_65034334',
  'variables' => 
  array (
    'processings' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618f71fae52976_53176387',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618f71fae52976_53176387')) {
function content_618f71fae52976_53176387 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1129420041618f71fae47111_65034334';
?>
 <b>Manual Processings:</b><br><br> <form method=post> <input type=hidden name=a value=update_processings> <table cellpadding=1 cellspacing=1 border=0 width=100<?php echo '%>';?> <tr> <th bgcolor=FFEA00 width=1% nowrap>Status</th> <th bgcolor=FFEA00 width=99<?php echo '%>';?>Name</th> <th bgcolor=FFEA00>Icon</th> <th bgcolor=FFEA00>Actions</th> </tr> <?php
$_from = $_smarty_tpl->tpl_vars['processings']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['p']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
$foreach_p_Sav = $_smarty_tpl->tpl_vars['p'];
?> <tr> <td align=center><input type=checkbox name="status[<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
]" value=1 <?php if ($_smarty_tpl->tpl_vars['p']->value['status']) {?>checked<?php }?>></td> <td><?php echo $_smarty_tpl->tpl_vars['p']->value['name'];
if ($_smarty_tpl->tpl_vars['p']->value['lang']) {?> (<?php echo $_smarty_tpl->tpl_vars['p']->value['lang'];?>
)<?php }?></td> <td align=center><img src="images/<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
.gif" alt="Upload image &quot;<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
.gif&quot; to &quot;images&quot; folder" height=17></td> <td nowrap><a href="?a=edit_processing&pid=<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
">[edit]</a> <a href="?a=delete_processing&pid=<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
" onclick="return confirm('Do youreally want to delete &quot;<?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
&quot; processing?')">[delete]</a></td> </tr> <?php
$_smarty_tpl->tpl_vars['p'] = $foreach_p_Sav;
}
if (!$_smarty_tpl->tpl_vars['p']->_loop) {
?> <tr> <td align=center colspan=4>No records found</td> </tr> <?php
}
?> </table> <?php if ($_smarty_tpl->tpl_vars['processings']->value) {?> <input type="submit" value="Update" class=sbmt> &nbsp; <?php }?> <input type="button" value="Add Processing" class=sbmt onclick="document.location='?a=edit_processing'"> </form> <br> <?php echo $_smarty_tpl->getSubTemplate ("my:start_info_table", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
 You can add or edit any payment processing in this section by clicking the "edit" or "add new" link. You should provide the full instructions for a user to know how to make a deposit using the specified payment system.<br><br> Any processing you add can't allow users to deposit just by themselves. The administrator has to approve or delete any transaction and process all the users' withdrawal requests manually. <?php echo $_smarty_tpl->getSubTemplate ("my:end_info_table", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
 <?php }
}
?>