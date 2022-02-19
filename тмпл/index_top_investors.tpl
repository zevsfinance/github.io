{loaddata name="top_investors" limit=$settings.index_top_investors var="top_investors" active=1}

<div class="item">
    <span class="name">Top investors</span>
    <div class="listLine">
        {if $settings.index_top_investors}
            {foreach from=$top_investors item=s}
                <div class="line">
                    <span class="iconBl" style="background-image: url(img/ic-lastoper.png)"></span>
                    <span class="tit">{$s.username}</span>
                    <span class="val">{$currency_sign}{$s.amount}</span>
                </div>
            {/foreach}
        {/if}
    </div>
</div>