<?php /* Smarty version 3.1.27, created on 2021-11-14 23:36:54
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/signup.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:73312683361917366c3bd19_33157610%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eb601f8a529e5c361ee8f03bfcffe4fd5c4ea94' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/signup.tpl',
      1 => 1632412015,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73312683361917366c3bd19_33157610',
  'variables' => 
  array (
    'deny_registration' => 0,
    'settings' => 0,
    'referer' => 0,
    'errors' => 0,
    'account_errors' => 0,
    'err' => 0,
    'frm' => 0,
    'pay_accounts' => 0,
    'ps' => 0,
    'ti' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_61917366cabc02_32782211',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_61917366cabc02_32782211')) {
function content_61917366cabc02_32782211 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '73312683361917366c3bd19_33157610';
echo $_smarty_tpl->getSubTemplate ("header-home.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="loginBl">
    <div class="container">
        <div class="wrapIn">
            <div class="formaMessage">
                <?php if ($_smarty_tpl->tpl_vars['deny_registration']->value) {?>
                    We are closed for new registrations now.
                <?php } elseif ($_smarty_tpl->tpl_vars['settings']->value['use_referal_program'] && $_smarty_tpl->tpl_vars['settings']->value['force_upline'] && !$_smarty_tpl->tpl_vars['referer']->value && !$_smarty_tpl->tpl_vars['settings']->value['get_rand_ref']) {?> 
                    You  do not have a upline. Our system require a upline for each user.
                <?php } else { ?>
                    
                        <?php echo '<script'; ?>
 language=javascript>
                            function checkform() {
                                if (document.regform.fullname.value == '') {
                                    alert("Please enter your full name!");
                                    document.regform.fullname.focus();
                                    return false;
                                }
                    
                                <?php if ($_smarty_tpl->tpl_vars['settings']->value['use_user_location'] == 1) {?>
                    
                                        if (document.regform.address.value == '') {
                                            alert("Please enter your address!");
                                            document.regform.address.focus();
                                            return false;
                                        }
                                        if (document.regform.city.value == '') {
                                            alert("Please enter your city!");
                                            document.regform.city.focus();
                                            return false;
                                        }
                                        if (document.regform.state.value == '') {
                                            alert("Please enter your state!");
                                            document.regform.state.focus();
                                            return false;
                                        }
                                        if (document.regform.zip.value == '') {
                                            alert("Please enter your ZIP!");
                                            document.regform.zip.focus();
                                            return false;
                                        }
                                        if (document.regform.country.options[document.regform.country.selectedIndex].text == '--SELECT--') {
                                            alert("Please choose your country!");
                                            document.regform.country.focus();
                                            return false;
                                        }
                    
                                <?php }?>
                    
                                    if (document.regform.username.value == '') {
                                        alert("Please enter your username!");
                                        document.regform.username.focus();
                                        return false;
                                    }
                                    if (!document.regform.username.value.match(/^[A-Za-z0-9_\-]+$/)) {
                                        alert("For username you should use English letters and digits only!");
                                        document.regform.username.focus();
                                        return false;
                                    }
                                    if (document.regform.password.value == '') {
                                        alert("Please enter your password!");
                                        document.regform.password.focus();
                                        return false;
                                    }
                                    if (document.regform.password.value != document.regform.password2.value) {
                                        alert("Please check your password!");
                                        document.regform.password2.focus();
                                        return false;
                                    }
                    
                                <?php if ($_smarty_tpl->tpl_vars['settings']->value['use_transaction_code']) {?>
                    
                                        if (document.regform.transaction_code.value == '') {
                                            alert("Please enter your transaction code!");
                                            document.regform.transaction_code.focus();
                                            return false;
                                        }
                                        if (document.regform.transaction_code.value != document.regform.transaction_code2.value) {
                                            alert("Please check your transaction code!");
                                            document.regform.transaction_code2.focus();
                                            return false;
                                        }
                    
                                <?php }?>
                    
                                if (document.regform.email.value == '') {
                                    alert("Please enter your e-mail address!");
                                    document.regform.email.focus();
                                    return false;
                                }
                                if (document.regform.email.value != document.regform.email1.value) {
                                    alert("Please retupe your e-mail!");
                                    document.regform.email.focus();
                                    return false;
                                }

                                for (i in document.regform.elements) {
                                    f = document.regform.elements[i];
                                    if (f.name && f.name.match(/^pay_account/)) {
                                    if (f.value == '') continue;
                                    var notice = f.getAttribute('data-validate-notice');
                                    var invalid = 0;
                                    if (f.getAttribute('data-validate') == 'regexp') {
                                        var re = new RegExp(f.getAttribute('data-validate-regexp'));
                                        if (!f.value.match(re)) {
                                        invalid = 1;
                                        }
                                    } else if (f.getAttribute('data-validate') == 'email') {
                                        var re = /^[^\@]+\@[^\@]+\.\w{2,4}$/;
                                        if (!f.value.match(re)) {
                                        invalid = 1;
                                        }
                                    }
                                    if (invalid) {
                                        alert('Invalid account format. Expected '+notice);
                                        f.focus();
                                        return false;
                                    }
                                    }
                                }

                                if (document.regform.agree.checked == false) {
                                    alert("You have to agree with the Terms and Conditions!");
                                    return false;
                                }

                                return true;
                            }

                            function IsNumeric(sText) {
                                var ValidChars = "0123456789";
                                var IsNumber=true;
                                var Char;
                                if (sText == '') return false;
                                for (i = 0; i < sText.length && IsNumber == true; i++) { 
                                    Char = sText.charAt(i); 
                                    if (ValidChars.indexOf(Char) == -1) {
                                    IsNumber = false;
                                    }
                                }
                                return IsNumber;
                            }
                        <?php echo '</script'; ?>
>
                    
                    
                    <?php if ($_smarty_tpl->tpl_vars['errors']->value) {?>
                        <ul class="errors">
                            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['e'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['e']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['name'] = 'e';
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['errors']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['e']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['e']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['e']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['e']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['e']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['e']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['e']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['e']['total']);
?> 
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'full_name') {?>
                                    <li>Please enter your full name!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'address') {?>
                                    <li>Please enter your address!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'city') {?>
                                    <li>Please enter your city!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'state') {?>
                                    <li>Please enter your state!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'zip') {?>
                                    <li>Please enter your zip!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'country') {?>
                                    <li>Please choose your country!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'username') {?>
                                    <li>Please enter valid username! It should contains English letters and digits only.
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'username_exists') {?>
                                    <li>Sorry, such user already exists! Please try another username. 
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'email_exists') {?>
                                    <li>Sorry, such email already exists! Please try another email. 
                                <?php }?> 
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'password') {?> 
                                    <li>Please enter a password!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'password_confirm') {?>
                                    <li>Please check your password!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'password_too_small') {?>
                                    <li>The password you provided is too small, please enter at least <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['min_user_password_length']);?>
 characters!
                                <?php }?> 
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'transaction_code') {?> 
                                    <li>Please enter the Transaction Code!
                                <?php }?> 
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'transaction_code_confirm') {?> 
                                    <li>Please check your Transaction Code!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'transaction_code_too_small') {?>
                                    <li>The Transaction Code you provided is too small, please enter at least <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['min_user_password_length']);?>
 characters!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'transaction_code_vs_password') {?> 
                                    <li>The Transaction Code should differ from the Password!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'email') {?> 
                                    <li>Please enter your e-mail!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'email2') {?> 
                                    <li>Please check your email!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'agree') {?>
                                    <li>You have to agree with the Terms and Conditions!
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'turing_image') {?>
                                    <li>Enter the verification code as it is shown in the corresponding box.
                                <?php }?> 
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'no_upline') {?>
                                    <li>The system requires an upline to register. <?php if ($_smarty_tpl->tpl_vars['settings']->value['get_rand_ref']) {?>You have to be agreed to random one or found a referral link in the net.<?php }?>
                                <?php }?> 
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'ip_exists_in_database') {?>
                                    <li>Your IP already exists in our database. Sorry, but registration impossible.
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'invalid_account_format') {?>
                                    <?php
$_from = $_smarty_tpl->tpl_vars['account_errors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['err'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['err']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->_loop = true;
$foreach_err_Sav = $_smarty_tpl->tpl_vars['err'];
?>
                                    <li><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['err']->value);?>

                                    <?php
$_smarty_tpl->tpl_vars['err'] = $foreach_err_Sav;
}
?>
                                <?php }?>
                            <?php endfor; endif; ?>
                        </ul>
                    <?php }?> 
                    <form method=post onsubmit="return checkform()" name="regform">
                        <input type=hidden name=a value="signup">
                        <input type=hidden name=action value="signup">
                        <div class="in">
                            <div class="lineInputs">
                                <label for="">YOUR USERNAME<span class="imp">*</span>:</label>
                                <input type=text name=username value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['frm']->value['username']));?>
'>
                            </div>
                            <div class="lineInputs">
                                <label for="">DEFINE PASSWORD<span class="imp">*</span>:</label>
                                <input type=password name=password value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['frm']->value['password']));?>
'>
                            </div>
                            <div class="lineInputs">
                                <label for="">YOUR FULL NAME<span class="imp">*</span>:</label>
                                <input type=text name=fullname value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['frm']->value['fullname']));?>
'>
                            </div>
                            <div class="lineInputs">
                                <label for="">RETYPE PASSWORD<span class="imp">*</span>:</label>
                                <input type=password name=password2 value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['frm']->value['password2']));?>
'>
                            </div>
                            <div class="lineInputs">
                                <label for="">YOUR E-MAIL ADDRESS<span class="imp">*</span>:</label>
                                <input type=text name=email value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['frm']->value['email']));?>
'>
                            </div>
                            <div class="lineInputs">
                                <label for="">SECRET QUESTION<span class="imp">*</span>:</label>
                                <input type=text name=sq value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['frm']->value['sq']));?>
'>
                            </div>
                            <div class="lineInputs">
                                <label for="">RETYPE YOUR E-MAIL<span class="imp">*</span>:</label>
                                <input type=text name=email1 value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['frm']->value['email1']));?>
'>
                            </div>
                            <div class="lineInputs">
                                <label for="">SECRET ANSWER<span class="imp">*</span>:</label>
                                <input type=text name=sa value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['frm']->value['sa']));?>
'>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['settings']->value['use_transaction_code']) {?>
                                <div class="lineInputs">
                                    <label for="">Define Transaction Code</label>
                                    <input type=password name=transaction_code value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['frm']->value['transaction_code']));?>
'>
                                </div>
                                <div class="lineInputs">
                                    <label for="">Retype Transaction Code</label>
                                    <input type=password name=transaction_code2 value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['frm']->value['transaction_code2']));?>
'>
                                </div>
                            <?php }?>
                            <div class="lineInputs">
                                <label for="">UPLINE:</label>
                                <input type="text" value="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['referer']->value['name']);?>
" disabled="">
                            </div>
                            <?php
$_from = $_smarty_tpl->tpl_vars['pay_accounts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ps'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ps']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ps']->value) {
$_smarty_tpl->tpl_vars['ps']->_loop = true;
$foreach_ps_Sav = $_smarty_tpl->tpl_vars['ps'];
?>
                                <div class="lineInputs">
                                    <label for=""><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value['name']);?>
:</label>
                                    <input type=text name=pay_account[<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value['id']);?>
] value="<?php echo smarty_modifier_myescape(htmlspecialchars($_smarty_tpl->tpl_vars['ps']->value['account'], ENT_QUOTES, 'UTF-8', true));?>
" data-validate="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value['validate']['func']);?>
" data-validate-<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value['validate']['func']);?>
="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value['validate'][$_smarty_tpl->tpl_vars['ps']->value['validate']['func']]);?>
" data-validate-notice="<?php echo smarty_modifier_myescape(htmlspecialchars($_smarty_tpl->tpl_vars['ps']->value['validate']['notification'], ENT_QUOTES, 'UTF-8', true));?>
">
                                </div>                            
                            <?php
$_smarty_tpl->tpl_vars['ps'] = $foreach_ps_Sav;
}
?>                                                    

                            <?php if ($_smarty_tpl->tpl_vars['ti']->value['check']['signup']) {?>
                                <div class="imageCodeBl">
                                    <label for="">INPUT IMAGE CODE<span class="imp">*</span>:</label>
                                    <div class="imageCode"><img src="<?php echo smarty_modifier_myescape(encurl("?a=show_validation_image&".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['name'])."=".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['id'])."&rand=".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['rand'])));?>
"></div>
                                    <input type=text name=validation_number>
                                </div>
                            <?php }?>
                            
                            <div class="chekBl">
                                <input type="checkbox" id="chk1" name=agree value=1 checked>
                                <label for="chk1">I agree <a href="<?php echo smarty_modifier_myescape(encurl("?a=rules"));?>
" target="_blank">Terms and conditions</a></label>
                            </div>
                            <button type="submit" class="btn btnYellow">register</button>
                        </div>
                    </form>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="ball right"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer-reg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>