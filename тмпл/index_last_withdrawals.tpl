{if $settings.index_last_withdrawals}
    {loaddata name="transactions" limit=$settings.index_last_withdrawals type="withdrawal" var="last_withdrawals"}
{/if}

<div class="item">
    <span class="name">Last Withdrawals</span>
    <div class="listLine">
        {if $last_withdrawals}
            {foreach from=$last_withdrawals item=s}
                <div class="line">
                    <span class="iconBl" style="background-image: url(img/ic-lastoper.png)"></span>
                    <span class="tit">{$s.username}</span>
                    <span class="val">{$currency_sign}{$s.amount}</span>
                    <span class="iconPl" style="background-image: url(img/ps_s/{$s.ec}.png)"></span>
                </div>   
            {/foreach}
        {/if}           
    </div>
</div>