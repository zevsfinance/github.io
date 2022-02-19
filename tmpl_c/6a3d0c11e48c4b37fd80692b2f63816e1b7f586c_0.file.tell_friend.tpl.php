<?php /* Smarty version 3.1.27, created on 2021-11-13 10:13:31
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/tell_friend.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1245768125618f659bbcb635_61847840%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a3d0c11e48c4b37fd80692b2f63816e1b7f586c' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/tell_friend.tpl',
      1 => 1631282966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1245768125618f659bbcb635_61847840',
  'variables' => 
  array (
    'say' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618f659bbd3732_17787478',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618f659bbd3732_17787478')) {
function content_618f659bbd3732_17787478 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1245768125618f659bbcb635_61847840';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<h2 class="capTitle">Tell friend</h2>
<div class="settingsBl blBlueCircle" style="padding: 0;">
    <div class="tabs">        
        <div class="formaMessage">
            <?php if ($_smarty_tpl->tpl_vars['say']->value == 'invite_sent') {?>
                Your invite/invites has been successfully sent.<br><br>
            <?php }?>
            <form action="index.php" method=post >
                <input type=hidden name=a value=tell_friend>
                <input type=hidden name=action value=tell_friend>
                <div class="in">
                    <div class="lineInputs">
                        <label for="">Name 1:</label>
                        <input type=text name=name1>
                    </div>
                    <div class="lineInputs">
                        <label for="">Email 1:</label>
                        <input type=text name=email1>
                    </div>
                    <div class="lineInputs">
                        <label for="">Name 2:</label>
                        <input type=text name=name2>
                    </div>
                    <div class="lineInputs">
                        <label for="">Email 2:</label>
                        <input type=text name=email2>
                    </div>
                    <div class="lineInputs">
                        <label for="">Name 3:</label>
                        <input type=text name=name3>
                    </div>
                    <div class="lineInputs">
                        <label for="">Email 4:</label>
                        <input type=text name=email4>
                    </div>               
                    <div class="lineBtn">
                        <button type="submit" class="btn btnYellow">Send</button>
                    </div>
                </div>
            </form>
        </div>        
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>