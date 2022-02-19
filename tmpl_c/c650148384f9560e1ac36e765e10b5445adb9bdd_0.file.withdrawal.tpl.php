<?php /* Smarty version 3.1.27, created on 2021-11-14 23:29:43
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/withdrawal.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:487438031619171b7dd6aa5_72624561%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c650148384f9560e1ac36e765e10b5445adb9bdd' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/withdrawal.tpl',
      1 => 1636235680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '487438031619171b7dd6aa5_72624561',
  'variables' => 
  array (
    'preview' => 0,
    'say' => 0,
    'errors' => 0,
    'currency_sign' => 0,
    'fees' => 0,
    'batch' => 0,
    'fatals' => 0,
    'settings' => 0,
    'ps' => 0,
    'p' => 0,
    'frm' => 0,
    'amount' => 0,
    'ec' => 0,
    'comment' => 0,
    'currency' => 0,
    'account' => 0,
    'converted' => 0,
    'to_withdraw' => 0,
    'userinfo' => 0,
    'ti' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_619171b7e12ad3_31103682',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619171b7e12ad3_31103682')) {
function content_619171b7e12ad3_31103682 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '487438031619171b7dd6aa5_72624561';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<?php if (!$_smarty_tpl->tpl_vars['preview']->value) {?>

    <h2 class="capTitle">Withdrawal</h2>
    <form method=post class="payOut">
        <input type=hidden name=a value=withdraw>
        <input type=hidden name=action value=preview>
        <input type=hidden name=say value="">
        <div class="makeBl with">
            <ul class="errors"><li>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'ec_forbidden' || $_smarty_tpl->tpl_vars['errors']->value['ec_forbidden']) {?>
                    Sorry, withdraw for this processing is temproary forbidden.<br><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'on_hold' || $_smarty_tpl->tpl_vars['errors']->value['on_hold']) {?>
                    Sorry, this amount on hold now.<br><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'zero' || $_smarty_tpl->tpl_vars['errors']->value['zero']) {?>
                    Sorry, you can't request a withdraw smaller than <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
0.00 only<br><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'less_min' || $_smarty_tpl->tpl_vars['errors']->value['less_min']) {?>
                    Sorry, you can request not less than <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['fees']->value['amount_min']);?>
<br><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'greater_max' || $_smarty_tpl->tpl_vars['errors']->value['greater_max']) {?>
                    Sorry, you can request not greater than <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['fees']->value['amount_max']);?>
<br><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'daily_limit' || $_smarty_tpl->tpl_vars['errors']->value['daily_limit']) {?>
                    Sorry, you have exceeded a daily limit<br><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'not_enought' || $_smarty_tpl->tpl_vars['errors']->value['not_enought']) {?>
                    Sorry, you have requested the amount larger than the one on your balance.<br><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'invalid_transaction_code' || $_smarty_tpl->tpl_vars['errors']->value['invalid_transaction_code']) {?>
                    You have entered the invalid transaction code.<br><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'invalid_tfa_code' || $_smarty_tpl->tpl_vars['errors']->value['invalid_tfa_code']) {?>
                    You have entered invalid 2FA code.<br><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'no_deposits' || $_smarty_tpl->tpl_vars['errors']->value['no_deposits']) {?>
                    You have not done any deposits yet. Withdrawal function will be available after a deposit.
                    <br><br>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'no_active_deposits' || $_smarty_tpl->tpl_vars['errors']->value['no_active_deposits']) {?>
                    You must have active deposit to withdraw.
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['errors']->value['turing_image']) {?>Invalid turing image<br><br><?php }?>

                <?php if ($_smarty_tpl->tpl_vars['say']->value == 'processed') {?>
                    <?php if ($_smarty_tpl->tpl_vars['batch']->value == '') {?>Withdrawal request has been successfully saved.<?php } else { ?> Withdrawal has been processed. Batch id: <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['batch']->value);
}?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['fatals']->value['times_limit']) {?>
                    You can withdraw <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['limit_withdraw_period_times']);?>
 per <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['limit_withdraw_period_date']);?>
 only.
                <?php }?>
            </li></ul>
            <div class="selectPlan blBlueCircle">
                <div class="numer"></div>
                <span class="title"><b>Select</b> Payment Method:</span>
                <div class="listPayment">
                    <?php
$_from = $_smarty_tpl->tpl_vars['ps']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['p']->_loop = false;
$_smarty_tpl->tpl_vars['p']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
$_smarty_tpl->tpl_vars['p']->iteration++;
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration == 1;
$foreach_p_Sav = $_smarty_tpl->tpl_vars['p'];
if ($_smarty_tpl->tpl_vars['p']->value['id']) {?>
                        <div class="item">
                            <input type="radio" id="plwal<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['id']);?>
" name="ec" value="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['id']);?>
"<?php if ($_smarty_tpl->tpl_vars['p']->first) {?> checked<?php }?>>
                            <label for="plwal<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['id']);?>
">
                                <div class="pic" style="background-image: url(img/ps_b/<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['id']);?>
.png)"></div>
                                
                            </label>
                        </div>
                    <?php }
$_smarty_tpl->tpl_vars['p'] = $foreach_p_Sav;
}
?>                                        
                </div>
            </div>
            <div class="enterBl">
                <div class="amount blBlueCircle">
                    <div class="numer"></div>
                    <span class="title"><b>Enter</b> Amount:</span>
                    <div class="inputLine">
                        <input id="summ" type=number name=amount value="<?php echo smarty_modifier_myescape((($tmp = @amount_smarty_format($_smarty_tpl->tpl_vars['frm']->value['amount']))===null||$tmp==='' ? "10.00" : $tmp));?>
" class="enterNum" step="any" lang="en">
                        <span class="dollar">$</span>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="title"><b>Your</b> comment:</span>
                    <div class="inputLine">
                        <textarea name=comment class=inpts cols=45 rows=4></textarea>
                    </div>
                </div>
            </div>
            <div class="totalBl blBlueCircle">
                <div class="col profit">
                    <span class="tit">You will receive:</span>
                    <span class="val" id="summ2">1204.00$</span>
                </div>
                <button type="submit" class="btn btnYellow">withdraw funds</button>
            </div>
        </div>
    </form>

    <?php echo '<script'; ?>
>
        jQuery(document).ready(function(){
            jQuery('#summ').on('change keyup', function(){
                jQuery('#summ2').html(jQuery('#summ').val() + " $");
            });

            jQuery('#summ2').html(jQuery('#summ').val() + " $");
        });
    <?php echo '</script'; ?>
>    

<?php } else { ?>

    <h2 class="capTitle">Withdrawal funds</h2>
    <div class="default_table">
        <form method=post>
            <input type=hidden name=a value=withdraw>
            <input type=hidden name=action value=withdraw>
            <input type=hidden name=amount value=<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['amount']->value);?>
>
            <input type=hidden name=ec value=<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ec']->value);?>
>
            <input type=hidden name=comment value="<?php echo smarty_modifier_myescape(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value, ENT_QUOTES, 'UTF-8', true));?>
">

            <table cellspacing=0 cellpadding=2 border=0 class="form deposit_confirm">
            <tr>
            <th>Payment System:</th>
            <td><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency']->value);?>
</td>
            </tr>
            <tr>
            <th>Account:</th>
            <td><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['account']->value);?>
</td>
            </tr>
            <tr>
            <th>Debit Amount:</th>
            <td><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['amount']->value);?>
</td>
            </tr>
            
            <tr>
            <th>Withdrawal Fee:</th>
            <td>
            <?php if ($_smarty_tpl->tpl_vars['fees']->value['fee'] > 0) {?>
            <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['fees']->value['percent']);?>
% + <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['fees']->value['add_amount']);?>
 (min. <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['fees']->value['fee_min']);?>
 max. <?php if ($_smarty_tpl->tpl_vars['fees']->value['fee_max']) {
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['fees']->value['fee_max']);
} else { ?>no<?php }?>)
            <?php } else { ?>
            We have no fee for this operation.
            <?php }?>
            </td>
            </tr>

            <?php if ($_smarty_tpl->tpl_vars['converted']->value) {?>
            <tr>
            <th>Credit Amount:</th>
            <td><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['converted']->value['amount']);?>
</td>
            </tr>
            <tr>
            <th><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['converted']->value['fiat']);?>
 Amount:</th>
            <td><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['to_withdraw']->value);?>
</td>
            </tr>
            <?php } else { ?>
            <tr>
            <th>Credit Amount:</th>
            <td><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['to_withdraw']->value);?>
</td>
            </tr>
            <?php }?>

            
            <?php if ($_smarty_tpl->tpl_vars['comment']->value) {?>
            <tr>
            <th>Note:</th>
            <td><?php echo smarty_modifier_myescape(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value, ENT_QUOTES, 'UTF-8', true));?>
</td>
            </tr>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['settings']->value['use_transaction_code'] && $_smarty_tpl->tpl_vars['userinfo']->value['transaction_code']) {?>
            <tr>
            <th>Transaction Code:</th>
            <td><input type="password" name="transaction_code" class=inpts size=15></td>
            </tr>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['ti']->value['check']['withdrawal']) {?>
            <tr>
            <td class=menutxt align=right><img src="<?php echo smarty_modifier_myescape(encurl("?a=show_validation_image&".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['name'])."=".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['id'])."&rand=".((string)$_smarty_tpl->tpl_vars['ti']->value['session']['rand'])));?>
"></td>
            <td><input type=text name=validation_number class=inpts size=15></td>
            </tr>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['tfa_settings']['withdraw']) {?>
            <tr>
            <th>2FA Code:</th>
            <td><input type="text" name="tfa_code" class=inpts size=15> <input type="hidden" name="tfa_time" id="tfa_time"></td>
            </tr>
            
            <?php echo '<script'; ?>
 language=javascript>
            document.getElementById('tfa_time').value = (new Date()).getTime();
            <?php echo '</script'; ?>
>
            
            <?php }?>
            <tr>
            <td colspan=2><input type=submit value="Confirm" class=sbmt></td>
            </tr></table>
        </form>
    </div>

<?php }?>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>