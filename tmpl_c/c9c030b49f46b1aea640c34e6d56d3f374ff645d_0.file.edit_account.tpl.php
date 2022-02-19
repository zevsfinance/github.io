<?php /* Smarty version 3.1.27, created on 2021-11-13 10:12:51
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/edit_account.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:584051432618f65733d18b8_74564633%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9c030b49f46b1aea640c34e6d56d3f374ff645d' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/edit_account.tpl',
      1 => 1631282966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '584051432618f65733d18b8_74564633',
  'variables' => 
  array (
    'settings' => 0,
    'frm' => 0,
    'errors' => 0,
    'account_errors' => 0,
    'err' => 0,
    'userinfo' => 0,
    'pay_accounts' => 0,
    'ps' => 0,
    'ti' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618f6573411e95_99580469',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618f6573411e95_99580469')) {
function content_618f6573411e95_99580469 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '584051432618f65733d18b8_74564633';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



    <?php echo '<script'; ?>
 language=javascript>
        function IsNumeric(sText) {
        var ValidChars = "0123456789.";
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

        function checkform() {
        if (document.editform.fullname.value == '') {
            alert("Please type your full name!");
            document.editform.fullname.focus();
            return false;
        }
        
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['use_user_location'] == 1) {?>
        
        if (document.editform.address.value == '') {
            alert("Please enter your address!");
            document.editform.address.focus();
            return false;
        }
        if (document.editform.city.value == '') {
            alert("Please enter your city!");
            document.editform.city.focus();
            return false;
        }
        if (document.editform.state.value == '') {
            alert("Please enter your state!");
            document.editform.state.focus();
            return false;
        }
        if (document.editform.zip.value == '') {
            alert("Please enter your ZIP!");
            document.editform.zip.focus();
            return false;
        }
        if (document.editform.country.options[document.editform.country.selectedIndex].text == '--SELECT--') {
            alert("Please choose your country!");
            document.editform.country.focus();
            return false;
        }
        
        <?php }?>
        
        if (document.editform.password.value != document.editform.password2.value) {
            alert("Please check your password!");
            document.editform.fullname.focus();
            return false;
        }
        
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['use_transaction_code']) {?>
        
        if (document.editform.transaction_code.value != document.editform.transaction_code2.value) {
            alert("Please check your transaction code!");
            document.editform.transaction_code2.focus();
            return false;
        }
        
        <?php }?>
        
        
        <?php if ($_smarty_tpl->tpl_vars['settings']->value['usercanchangeemail'] == 1) {?>
        
        if (document.editform.email.value == '') {
            alert("Please enter your e-mail address!");
            document.editform.email.focus();
            return false;
        }
        
        <?php }?>
        

        for (i in document.editform.elements) {
            f = document.editform.elements[i];
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

        return true;
        }
    <?php echo '</script'; ?>
>


<h2 class="capTitle">Settings</h2>
<div class="settingsBl blBlueCircle" style="padding: 0;">
    <div class="tabs">        
        <div class="formaMessage">
            <?php if ($_smarty_tpl->tpl_vars['frm']->value['say'] == 'changed') {?>
                Your account data has been updated successfully.<br><br>
            <?php }?>
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
                            <li>Please enter your Full Name!
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
                            <li>Please enter your username!
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'password') {?>
                            <li>Please enter a password!
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'password_confirm') {?> 
                            <li>Please check your password!
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'password_too_small') {?>
                            <li>Password is too small, please enter at least <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['min_user_password_length']);?>
 chars!
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'transaction_code') {?>
                            <li>Please enter the Transaction Code! <?php }?> <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'transaction_code_confirm') {?> 
                            <li>Please check your Transaction Code!
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'transaction_code_too_small') {?>
                            <li>Transaction Code is too small, please enter at least <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['min_user_password_length']);?>
 chars!
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'wrong_current_password') {?>
                            <li>You entered wrong current password
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'transaction_code_vs_password') {?>
                            <li>Transaction Code should be different then the Password! <?php }?> <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'invalid_transaction_code') {?> 
                            <li>You have provided invalid Current Transaction Code!
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'email') {?>
                            <li>Please enter your e-mail!
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'turing_image') {?>
                            <li>Enter the verification code as it is shown in the corresponding box.
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['errors']->value[$_smarty_tpl->getVariable('smarty')->value['section']['e']['index']] == 'tfa_code') {?> 
                            <li>Invalid 2FA code
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

            <form action="" method=post onsubmit="return checkform()" name=editform>
                <input type=hidden name=a value=edit_account>
                <input type=hidden name=action value=edit_account>
                <input type=hidden name=say value="">
                <div class="in">
                    <div class="lineInputs">
                        <label for="">username:</label>
                        <input type="text" value="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['userinfo']->value['username']);?>
" disabled="" />
                    </div>
                    <div class="lineInputs">
                        <label for="">full name:</label>
                        <input type=text name=fullname value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['userinfo']->value['name']));?>
'>
                    </div>
                    <div class="lineInputs">
                        <label for="">new password:</label>
                        <input type=password name=password value="">
                    </div>
                    <div class="lineInputs">
                        <label for="">e-mail:</label>
                        <input type=text name=email value='<?php echo smarty_modifier_myescape(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['userinfo']->value['email']));?>
'<?php if ($_smarty_tpl->tpl_vars['settings']->value['usercanchangeemail'] != 1) {?> disabled=""<?php }?>>
                    </div>
                    <div class="lineInputs">
                        <label for="">retype password:</label>
                        <input type=password name=password2 value="">
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
 account:</label>
                            <input type=text name="pay_account[<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value['id']);?>
]" value="<?php echo smarty_modifier_myescape(htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['frm']->value['pay_account'][$_smarty_tpl->tpl_vars['ps']->value['id']])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['ps']->value['account'] : $tmp), ENT_QUOTES, 'UTF-8', true));?>
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
                    <?php if ($_smarty_tpl->tpl_vars['settings']->value['use_transaction_code_edit_account'] == 1) {?>
                        <div class="lineInputs">
                            <label for="">Current Transaction Code:</label>
                            <input type=password name=transaction_code_current value="">
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['settings']->value['use_transaction_code']) {?>
                        <?php if ($_smarty_tpl->tpl_vars['settings']->value['use_transaction_code_edit_account'] != 1) {?>
                            <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['transaction_code'] != '') {?>
                                <div class="lineInputs">
                                    <label for="">Current Transaction Code:</label>
                                    <input type=password name=transaction_code_current value="">
                                </div>
                            <?php }?>
                        <?php }?>
                        <div class="lineInputs">
                            <label for="">New Transaction Code:</label>
                            <input type=password name="transaction_code" value="">
                        </div>
                        <div class="lineInputs">
                            <label for="">Retype Transaction Code:</label>
                            <input type=password name="transaction_code2" value="">
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['ti']->value['check']['edit_account']) {?>
                        <div class="lineInputs">
                            <label for="">Input image code: <img src="?a=show_validation_image&<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ti']->value['session']['name']);?>
=<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ti']->value['session']['id']);?>
&rand=<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ti']->value['session']['rand']);?>
"></label>
                            <input type=text name=validation_number>
                        </div>
                    <?php }?>
                    <div class="lineBtn">
                        <button type="submit" class="btn btnYellow">save settings</button>
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