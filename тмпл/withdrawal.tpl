{include file="header.tpl"}

{if !$preview}

    <h2 class="capTitle">Withdrawal</h2>
    <form method=post class="payOut">
        <input type=hidden name=a value=withdraw>
        <input type=hidden name=action value=preview>
        <input type=hidden name=say value="">
        <div class="makeBl with">
            <ul class="errors"><li>
                {if $say eq 'ec_forbidden' || $errors.ec_forbidden}
                    Sorry, withdraw for this processing is temproary forbidden.<br><br>
                {/if}
                {if $say eq 'on_hold' || $errors.on_hold}
                    Sorry, this amount on hold now.<br><br>
                {/if}
                {if $say eq 'zero' || $errors.zero}
                    Sorry, you can't request a withdraw smaller than {$currency_sign}0.00 only<br><br>
                {/if}
                {if $say eq 'less_min' || $errors.less_min}
                    Sorry, you can request not less than {$currency_sign}{*$settings.min_withdrawal_amount*}{$fees.amount_min}<br><br>
                {/if}
                {if $say eq 'greater_max' || $errors.greater_max}
                    Sorry, you can request not greater than {$currency_sign}{*$settings.max_withdrawal_amount*}{$fees.amount_max}<br><br>
                {/if}
                {if $say eq 'daily_limit' || $errors.daily_limit}
                    Sorry, you have exceeded a daily limit<br><br>
                {/if}
                {if $say eq 'not_enought' || $errors.not_enought}
                    Sorry, you have requested the amount larger than the one on your balance.<br><br>
                {/if}
                {if $say eq 'invalid_transaction_code' || $errors.invalid_transaction_code}
                    You have entered the invalid transaction code.<br><br>
                {/if}
                {if $say eq 'invalid_tfa_code' || $errors.invalid_tfa_code}
                    You have entered invalid 2FA code.<br><br>
                {/if}
                {if $say eq 'no_deposits' || $errors.no_deposits}
                    You have not done any deposits yet. Withdrawal function will be available after a deposit.
                    <br><br>
                {/if}
                {if $say eq 'no_active_deposits' || $errors.no_active_deposits}
                    You must have active deposit to withdraw.
                {/if}
                {if $errors.turing_image}Invalid turing image<br><br>{/if}

                {if $say eq 'processed'}
                    {if $batch eq ''}Withdrawal request has been successfully saved.{else} Withdrawal has been processed. Batch id: {$batch}{/if}
                {/if}
                {if $fatals.times_limit}
                    You can withdraw {$settings.limit_withdraw_period_times} per {$settings.limit_withdraw_period_date} only.
                {/if}
            </li></ul>
            <div class="selectPlan blBlueCircle">
                <div class="numer"></div>
                <span class="title"><b>Select</b> Payment Method:</span>
                <div class="listPayment">
                    {foreach from=$ps item=p}{if $p.id}
                        <div class="item">
                            <input type="radio" id="plwal{$p.id}" name="ec" value="{$p.id}"{if $p@first} checked{/if}>
                            <label for="plwal{$p.id}">
                                <div class="pic" style="background-image: url(img/ps_b/{$p.id}.png)"></div>
                                {* <div class="info">
                                    <span class="tit">Available amount:</span>
                                    <span class="val">{$currency_sign} {$p.available|round:6}</span>
                                </div> *}
                            </label>
                        </div>
                    {/if}{/foreach}                                        
                </div>
            </div>
            <div class="enterBl">
                <div class="amount blBlueCircle">
                    <div class="numer"></div>
                    <span class="title"><b>Enter</b> Amount:</span>
                    <div class="inputLine">
                        <input id="summ" type=number name=amount value="{$frm.amount|amount_format|default:"10.00"}" class="enterNum" step="any" lang="en">
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

    <script>
        jQuery(document).ready(function(){
            jQuery('#summ').on('change keyup', function(){
                jQuery('#summ2').html(jQuery('#summ').val() + " $");
            });

            jQuery('#summ2').html(jQuery('#summ').val() + " $");
        });
    </script>    

{else}

    <h2 class="capTitle">Withdrawal funds</h2>
    <div class="default_table">
        <form method=post>
            <input type=hidden name=a value=withdraw>
            <input type=hidden name=action value=withdraw>
            <input type=hidden name=amount value={$amount}>
            <input type=hidden name=ec value={$ec}>
            <input type=hidden name=comment value="{$comment|escape:html}">

            <table cellspacing=0 cellpadding=2 border=0 class="form deposit_confirm">
            <tr>
            <th>Payment System:</th>
            <td>{$currency}</td>
            </tr>
            <tr>
            <th>Account:</th>
            <td>{$account}</td>
            </tr>
            <tr>
            <th>Debit Amount:</th>
            <td>{$currency_sign}{$amount}</td>
            </tr>
            {* old
            <tr>
            <th>Withdrawal Fee:</th>
            <td>
            {if $settings.withdrawal_fee > 0 || $settings.withdrawal_fee_min > 0}
            {if $settings.withdrawal_fee > 0}{$settings.withdrawal_fee}%{/if} 
            {if $settings.withdrawal_fee_min > 0}min. {$currency_sign}{$settings.withdrawal_fee_min}{/if}
            {else}
            We have no fee for this operation.
            {/if}
            </td>
            </tr>
            *}
            <tr>
            <th>Withdrawal Fee:</th>
            <td>
            {if $fees.fee > 0}
            {$fees.percent}% + {$currency_sign}{$fees.add_amount} (min. {$currency_sign}{$fees.fee_min} max. {if $fees.fee_max}{$currency_sign}{$fees.fee_max}{else}no{/if})
            {else}
            We have no fee for this operation.
            {/if}
            </td>
            </tr>

            {if $converted}
            <tr>
            <th>Credit Amount:</th>
            <td>{$currency_sign}{$converted.amount}</td>
            </tr>
            <tr>
            <th>{$converted.fiat} Amount:</th>
            <td>{$to_withdraw}</td>
            </tr>
            {else}
            <tr>
            <th>Credit Amount:</th>
            <td>{$currency_sign}{$to_withdraw}</td>
            </tr>
            {/if}

            {*
            <tr>
            <td colspan=2>You are withdrawing <b>{$currency_sign}{$amount}</b> of {$currency}. 
            {if $settings.withdrawal_fee > 0 || $settings.withdrawal_fee_min > 0} Our fee is 
            {if $settings.withdrawal_fee > 0}<b>{$settings.withdrawal_fee}%</b>{/if}
            {if $settings.withdrawal_fee > 0 && $settings.withdrawal_fee_min > 0} or {/if}
            {if $settings.withdrawal_fee_min > 0} <b>{$currency_sign}{$settings.withdrawal_fee_min}</b>{if $settings.withdrawal_fee > 0} as a minimum{/if}{/if}
            .
            {else}
            We have no fee for this operation. 
            {/if}
            </td>
            </tr>
            <tr>
            <td colspan=2>Actually you will acquire the total of <b>{$currency_sign}{$to_withdraw}</b> on your {$currency} account {if $account}{$account}{/if}.</td>
            </tr>
            *}
            {if $comment}
            <tr>
            <th>Note:</th>
            <td>{$comment|escape:html}</td>
            </tr>
            {/if}
            {if $settings.use_transaction_code && $userinfo.transaction_code}
            <tr>
            <th>Transaction Code:</th>
            <td><input type="password" name="transaction_code" class=inpts size=15></td>
            </tr>
            {/if}
            {if $ti.check.withdrawal}
            <tr>
            <td class=menutxt align=right><img src="{"?a=show_validation_image&`$ti.session.name`=`$ti.session.id`&rand=`$ti.session.rand`"|encurl}"></td>
            <td><input type=text name=validation_number class=inpts size=15></td>
            </tr>
            {/if}
            {if $userinfo.tfa_settings.withdraw}
            <tr>
            <th>2FA Code:</th>
            <td><input type="text" name="tfa_code" class=inpts size=15> <input type="hidden" name="tfa_time" id="tfa_time"></td>
            </tr>
            {literal}
            <script language=javascript>
            document.getElementById('tfa_time').value = (new Date()).getTime();
            </script>
            {/literal}
            {/if}
            <tr>
            <td colspan=2><input type=submit value="Confirm" class=sbmt></td>
            </tr></table>
        </form>
    </div>

{/if}

{include file="footer.tpl"}