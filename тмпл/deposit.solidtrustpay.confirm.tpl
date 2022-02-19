{include file="header.tpl"}

{if $false_data != 1}
<h3>Please confirm your deposit:</h3><br><br>

<form name=spend method=post action="https://solidtrustpay.com/handle.php">

Your solidtrustpay account number <b>{$account}</b><br>
Amount ({$currency_sign}): <b>{$amount_format}</b><br>
{if $use_compound}
{if $compound_min_percents == $compound_max_percents && !$compound_percents}
<input type=hidden name=user2 value="{$compound_min_percents}">
{else}
<table cellspacing=0 cellpadding=2 border=0>
<tr><td nowrap width=1%>Compounding percent: </td>
  {if $compound_percents}
<td><select name='user2' class=inpts>
{section name=p loop=$compound_percents}<option value="{$compound_percents[p].percent}">{$compound_percents[p].percent}%</option>{/section}
</select></td>
  {else}
<td width=99%><input type=text name='user2' value="{$compound_min_percents}" class=inpts size=5></td></tr>
<tr><td nowrap colspan=2>(You can set any percent between <b>{$compound_min_percents}%</b> and <b>{$compound_max_percents}%</b>)</td>
  {/if}
</tr>
<!--tr><td colspan=2><small>Example: {$compounding}% of your earning will be accumulate on deposit.</small></td></tr-->
</table>
{/if}
{else}
<input type=hidden name=compound value="0">
{/if}

<br>

<input type=hidden name=item_id value={$pid}>
<input type=hidden name=user3 value={$pid}>
<input type=hidden name=user1 value="solidtrustpay_postback">
<input type=hidden name=sci_name value="{$settings.def_payee_store_solidtrustpay}" >
<INPUT type=hidden name=amount value="{$amount}">
<INPUT type=hidden name=merchantAccount value="{$settings.def_payee_account_solidtrustpay}" >
<INPUT type=hidden name=notify_url value="{$settings.site_url}/index.php">
<input type=hidden name="currency" value="USD" />

<INPUT type=hidden name=return_url value="{$settings.site_url}/index.php?a=return_egold&process=yes">
<INPUT type=hidden name=cancel_url value="{$settings.site_url}/index.php?a=return_egold&process=no">
<INPUT type=hidden value="Deposit to {$settings.site_name} user {$userinfo.username}" name=memo>
<INPUT type=hidden value="Deposit to {$settings.site_name} user {$userinfo.username}" name=item_id>
<br><input type=submit value="Process" class=sbmt> &nbsp;
<input type=button class=sbmt value="Cancel" onclick="document.location='?a=account'">
</form>
{/if}
{include file="footer.tpl"}