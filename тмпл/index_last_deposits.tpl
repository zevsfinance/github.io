{if $settings.index_last_deposits}
    {loaddata name="transactions" limit=$settings.index_last_deposits type="deposit" var="last_deposits"}
{/if}

<div class="item">
    <span class="name">Last Deposits</span>
    <div class="listLine">
        {if $last_deposits}
            {foreach from=$last_deposits item=s}
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