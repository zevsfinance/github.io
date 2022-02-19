<?php /* Smarty version 3.1.27, created on 2021-11-15 13:24:56
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1148311556192357870e266_48129810%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a183850ef25ff0e4693fa6d7df8ab7f5bf82933f' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/login.tpl',
      1 => 1632420557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1148311556192357870e266_48129810',
  'variables' => 
  array (
    'frm' => 0,
    'ti' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_6192357871f900_15345505',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_6192357871f900_15345505')) {
function content_6192357871f900_15345505 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '1148311556192357870e266_48129810';
echo $_smarty_tpl->getSubTemplate ("header-home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Sign In"), 0);
?>



    <?php echo '<script'; ?>
 language=javascript>
        function checkform() {
            if (document.mainform.username.value=='') {
                alert("Please type your username!");
                document.mainform.username.focus();
                return false;
            }
            if (document.mainform.password.value=='') {
                alert("Please type your password!");
                document.mainform.password.focus();
                return false;
            }
            return true;
        }
    <?php echo '</script'; ?>
>

<div class="loginBl">
    <div class="container">
        <div class="wrapIn">
            <div class="formaMessage">
                <?php if ($_smarty_tpl->tpl_vars['frm']->value['say'] == 'invalid_login') {?>
                    <ul class="errors">
                        <li>Your login or password or turing image code is wrong. Please check this information.</li>
                    </ul>
                <?php }?>
                <form method=post name=mainform onsubmit="return checkform()">
                    <input type=hidden name=a value='do_login'>
                    <input type=hidden name=follow value='<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['frm']->value['follow']);?>
'>
                    <input type=hidden name=follow_id value='<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['frm']->value['follow_id']);?>
'>
                    <div class="in">
                        <div class="lineInputs">
                            <label for="">Login<span class="imp">*</span>:</label>
                            <input type=text name=username value='<?php echo smarty_modifier_myescape(htmlspecialchars($_smarty_tpl->tpl_vars['frm']->value['username'], ENT_QUOTES, 'UTF-8', true));?>
' autofocus="autofocus">
                            <div class="chekBl">
                                <input type="checkbox" id="chk1" name="agree" value="1" class="checkBtn"  checked>
                                <label for="chk1">Remember</label>
                            </div>
                            <span class="icon-profile-1"></span>
                        </div>
                        <div class="lineInputs">
                            <label for="">password<span class="imp">*</span>:</label>
                            <input type=password name=password value=''>
                            <a href="<?php echo smarty_modifier_myescape(encurl("?a=forgot_password"));?>
" class="link">Forgot password?</a>
                            <span class="icon-padlock-27"></span>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['ti']->value['check']['login']) {?>
                            <div class="imageCodeBl">
                                <div class="imageCode"><img src="<?php echo smarty_modifier_myescape(encurl("?a=show_validation_image&".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['name'])."=".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['id'])."&rand=".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['rand'])));?>
"></div>
                                <input type=text name=validation_number>
                            </div>                            
                        <?php }?>     
                        
                        <button type="submit" class="btn btnYellow">login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ball right"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer-reg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
?>