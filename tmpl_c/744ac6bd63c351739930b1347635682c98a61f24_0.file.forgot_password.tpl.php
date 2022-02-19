<?php /* Smarty version 3.1.27, created on 2021-11-11 04:52:32
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/forgot_password.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:312978190618c77609fa6d2_31894560%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '744ac6bd63c351739930b1347635682c98a61f24' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/forgot_password.tpl',
      1 => 1631282966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312978190618c77609fa6d2_31894560',
  'variables' => 
  array (
    'errors' => 0,
    'found_records' => 0,
    'frm' => 0,
    'ti' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618c7760a0add6_45367532',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618c7760a0add6_45367532')) {
function content_618c7760a0add6_45367532 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '312978190618c77609fa6d2_31894560';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Forgot password"), 0);
?>



    <?php echo '<script'; ?>
 language=javascript>
        function checkform() {
            if (document.forgotform.email.value == '') {
                alert("Please type your username or email!");
                document.forgotform.email.focus();
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
                <?php if ($_smarty_tpl->tpl_vars['errors']->value['turing_image']) {?>
                    <ul class="errors">
                        <li>Invalid turing image</li>
                    </ul>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['found_records']->value == 2) {?>
                    <ul class="errors">
                        <li>Your accound was found. Please check your e-mail address and follow confirm URL to reset your password.</li>
                    </ul>
                <?php } else { ?>
                    <?php if ($_smarty_tpl->tpl_vars['found_records']->value == 0) {?>
                        <ul class="errors">
                            <li> No accounts found for provided info.</li>
                        </ul>
                    <?php } elseif ($_smarty_tpl->tpl_vars['found_records']->value == 1) {?>
                        <ul class="errors">
                            <li>Request was confirmed. Login and password was sent to your email address.</li>
                        </ul>
                    <?php }?>

                    <form method=post name=forgotform onsubmit="return checkform();">
                        <input type=hidden name=a value="forgot_password">
                        <input type=hidden name=action value="forgot_password">
                        <div class="in">
                            <div class="lineInputs" style="width: 100% !important;">
                                <label for="">Type your username or e-mail<span class="imp">*</span>:</label>
                                 <input type=text name='email' value="<?php echo smarty_modifier_myescape(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['frm']->value['email'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
">                          
                                <span class="icon-profile-1"></span>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['ti']->value['check']['forgot_password']) {?>
                                <div class="imageCodeBl">
                                    <div class="imageCode"><img src="<?php echo smarty_modifier_myescape(encurl("?a=show_validation_image&".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['name'])."=".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['id'])."&rand=".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['rand'])));?>
"></div>
                                    <input type=text name=validation_number>
                                </div>                            
                            <?php }?>     
                            
                            <button type="submit" class="btn btnYellow">Forgot</button>
                        </div>
                    </form>                    
                <?php }?>
                
            </div>
        </div>
    </div>
    <div class="ball right"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
?>