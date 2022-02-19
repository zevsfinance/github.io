{include file="header.tpl"}

{if $false_data != 1}
<h3>Please confirm your deposit:</h3><br><br>

<form method="post" action="https://capitalsure.com/index.php">
Your Capitalsure account <b>{$account}</b><br>
Amount ($US): <b>{$amount_format}</b><br>
{if $use_compound}
{if $compound_min_percents == $compound_max_percents && !$compound_percents}
<input type=hidden name=compound value="{$compound_min_percents}">
{else}
<table cellspacing=0 cellpadding=2 border=0>
<tr><td nowrap width=1%>Compounding percent: </td>
  {if $compound_percents}
<td><select name='compound' class=inpts>
{section name=p loop=$compound_percents}<option value="{$compound_percents[p].percent}">{$compound_percents[p].percent}%</option>{/section}
</select></td>
  {else}
<td width=99%><input type=text name='compound' value="{$compound_min_percents}" class=inpts size=5></td></tr>
<tr><td nowrap colspan=2>(You can set any percent between <b>{$compound_min_percents}%</b> and <b>{$compound_max_percents}%</b>)</td>
  {/if}
</tr>
</table>
{/if}
{else}
<input type=hidden name=compound value="0">
{/if}

<input type=hidden name=a value="capitalsure_postback">
<input type=hidden name=account value="{$settings.def_payee_account_capitalsure}">
<input type=hidden name=f value=send>
<input type=hidden name=currency value=usd>
<input type=hidden name=name value="{$settings.sitename}">
<input type=hidden name=amount value="{$amount}">
<input type=hidden name=payment_id value="{$pid}">
<input type=hidden name=custom_fields value="a,compound">
<INPUT type=hidden value="Deposit to {$settings.site_name} user {$userinfo.username}" name=description>
<INPUT type=hidden name=status_url value="{$settings.site_url}/index.php">
<INPUT type=hidden name=status_url_method value="post">
<INPUT type=hidden name=success_url value="{$settings.site_url}/index.php?a=return_egold&process=yes">
<INPUT type=hidden name=success_url_method value="post">
<INPUT type=hidden name=fail_url value="{$settings.site_url}/index.php?a=return_egold&process=no">
  
<br><input type=submit value="Process" class=sbmt> &nbsp;
<input type=button class=sbmt value="Cancel" onclick="document.location='?a=account'">
</form>
{/if}
{include file="footer.tpl"}