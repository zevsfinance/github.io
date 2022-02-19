{include file="header.tpl"}

{loaddata name="user_notices" var=notices}
{if $notices}

    <ul style="color:red">
        {foreach from=$notices item=n}
            <li><b>{$n.title}</b> {$n.text|nl2br}
            <form method=post>
                <input type=hidden name=a value=user_notices>
                <input type=hidden name=action value=notified>
                <input type=hidden name=id value={$n.id}>
                <input type=submit value="Dismiss">
            </form>
        {/foreach}
    </ul>
{/if}

<h2 class="capTitle">My Account</h2>
<div class="accountBl">
    <div class="linksBl" id="Referral offers">
        <div class="item">
            <div class="pic" style="background-image: url(img/bllinkx.png)"></div>
            <span class="tit">Your Referral Link:</span>
            <a href="{$settings.site_url}{"?ref=`$userinfo.username`"|encurl}" class="link">{$settings.site_url}{"?ref=`$userinfo.username`"|encurl}</a>
        </div>
        <div class="item">
            <div class="pic" style="background-image: url(img/bllinka.png)"></div>
            {if $referral.email != ""}
                <span class="tit">Your Referral : <span class="name">{$referral.name}</span></span>
                <a href="mailto:{$referral.email}" class="link">{$referral.email}</a>
            {else}
                <span class="tit">Your Referral: <span class="name">---</span></span>
                <a class="link">---</a>
            {/if}
        </div>
    </div>
    <div class="statBl">
        <div class="left">
            <span class="tit">Investment Statistics:</span>
            <div class="list">
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">Last deposit:</span>
                    <span class="val">{$currency_sign} {$last_deposit|default:"n/a"}</span>
                </div>
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">Active deposits:</span>
                    <span class="val">{$currency_sign} {$ab_formated.active_deposit}</span>
                </div>
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">Total deposits:</span>
                    <span class="val">{$currency_sign} {$ab_formated.deposit}</span>
                </div>
            </div>
        </div>
        <div class="right">
            <span class="tit">Statistic Withdrawals:</span>
            <div class="list">
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">Earned toral:</span>
                    <span class="val">{$currency_sign} {$ab_formated.earning}</span>
                </div>
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">pending withdrawals:</span>
                    <span class="val">{$currency_sign} {$ab_formated.withdraw_pending}</span>
                </div>
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">Total withdrawals:</span>
                    <span class="val">{$currency_sign} {$ab_formated.withdrawal}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   $.ajax({
      url: "?a=referals",
      context: document.body
   }).done(function(data) {      
      $('#referral').html($(data).find('#referral').html());            
   });
</script>

{include file="footer.tpl"}