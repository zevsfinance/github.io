<form onsubmit="return calc()" method="post" class="in">
    {if $page=='home'}
        <div class="textBlock {*wow slideInLeft*}">
            <h2 class="capTitle">Investment Plans</h2>
            <p>PAYDEL is offering management of finances based on fixed conditions. Our team has developed the highly profitable investment plans with one-time accruals of income after a certain period.</p>
        </div>
    {elseif $page=="invest"}
        <div class="textBlock">
            <h2 class="capTitle">PAYDEL provides its customers with the right solution at the right time.</h2>
            
            <h2 style="margin-top:122px;" class="capTitle">Choose your plan:</h2>
            <p>An investment in cryptocurrency mining can enhance anyone's portfolio returns. This is the reason we have decided to go online, and now you can invest in Cryptocurrency mining without the hassle of managing your own hardware. We provide professional investment services with a real focus on customer satisfaction.</p>
        </div>
    {/if}

    <div class="listPlan {*wow slideInRight*}">
        {$i = 0}
        {foreach $plans as $l}
            {$percent = 0}
            {foreach $l.plans as $v}
                {if $v@first}{$min = $v.min_deposit|round:2}{/if}
                {if $v@last}{$max =$v.max_deposit|round:2}{/if}
                {$percent = $v.percent}
            {/foreach}
            {$daily_percent = $percent}
            {$common_percent = $l.q_days*$daily_percent}
            {if $l.period=='Monthly'}
                {$daily_percent = $percent/30}
                {$common_percent = $l.q_days*$daily_percent}
            {elseif $l.period==NULL}
                {$daily_percent = $percent/$l.q_days}
                {$common_percent = $percent}
            {/if}
            <div class="item {*vipItem*}">
                <input type="radio" name="plan" id="plan{$i}" value="{$i}" data-name="{$l.dsc}" data-percent="{$percent|round:2}" data-days="{$l.q_days}"{if $i==0} checked{/if}>
                <label for="plan{$i}"></label>
                <div class="pr"><span class="prTxt">{$common_percent|round:2}%</span></div>
                <ul>
                    <li><span>Min</span><span>{$min}$</span></li>
                    <li><span>Max</span><span>{$max}$</span></li>
                </ul>
                <span class="desr">After {$l.q_days} Day{if $l.q_days>1}s{/if}</span>
                <a href="{if $userinfo.id}{"?a=account"|encurl}{else}{"?a=signup"|encurl}{/if}" class="link">invest now</a>
                <div class="fonBl" style="background-image: url(img/plan_active1.png)"></div>
            </div> 
            
            
            {$i = $i + 1}
        {/foreach}
        <div class="logoPlan"></div>
        <div class="logoPlan"></div>
    </div>
    <div class="formaPlan {*wow fadeInDown*}">
        {* <div class="line">
            <label for="">select plan:</label>
            <select class="selectricBl" name="plan2">
                {$i = 0}
                {foreach $plans as $l}
                    {$percent = 0}
                    {foreach $l.plans as $v}
                        {if $v@first}{$min = $v.min_deposit|round:2}{/if}
                        {if $v@last}{$max =$v.max_deposit|round:2}{/if}
                        {$percent = $v.percent}
                    {/foreach}
                    {$daily_percent = $percent}
                    {$common_percent = $l.q_days*$daily_percent}
                    {if $l.period=='Monthly'}
                        {$daily_percent = $percent/30}
                        {$common_percent = $l.q_days*$daily_percent}
                    {elseif $l.period==NULL}
                        {$daily_percent = $percent/$l.q_days}
                        {$common_percent = $percent}
                    {/if}
                    <option value="{$i}"{if $i==0} selected{/if}>{$common_percent}% After {$l.q_days} Day</option>                
                    {$i = $i + 1}
                {/foreach}
            </select>
        </div> *}
        <div class="line">
            <label for="">Enter Amount:</label>
            <input type="number" value="10" id="calc_amount">
            <span class="dollar">$</span>
        </div>
        <ul class="summa">
            <li>
                <span class="tit">TOTAL PERCENT</span>
                <span class="val" id="percent_total"></span>
            </li>
            <li>
                <span class="tit">TOTAL Profit</span>
                <span class="val" id="profit_total"></span>
            </li>
        </ul>
        <a href="{if $userinfo.id}{"?a=deposit"|encurl}{else}{"?a=signup"|encurl}{/if}" class="btn btnYellow">invest now</a>
    </div>    
    <div class="ball"></div>
    <div class="pic_bit"></div>
    <input type="submit" style="display: none;" id="calc_btn">
</form>

{if $plans}
<script>
    var plans = new Array;
    {$i = 0}
    {foreach $plans as $p}{if !$p.closed}{if $p.plans}
        {$j = 0}
        {foreach $p.plans as $pp}
            {if $pp@first}plans[{$i}] = new Array;{/if}
            plans[{$i}][{$j}] = new Array({$pp.min_deposit}, {$pp.max_deposit}, {$pp.percent}, {$p.q_days}, '{$p.period}');
            {$j = $j + 1}
        {/foreach}
        {$i = $i + 1}
    {/if}{/if}{/foreach}

    function change_plan() {
        plan = plans[$('[name=plan]:checked').val()];
        $('#calc_amount').val(plan[0][0]);

        $('#calc_amount').attr('min', plan[0][0]);
        if (plan[plan.length-1][1]>0) $('#calc_amount').attr('max', plan[plan.length-1][1]);
        else $('#calc_amount').attr('max', '');
    }

    function calc() {
        amount = $('#calc_amount').val();      
        percent = 0;        

        for (var i = 0; i < plan.length; i++) {
            if ((amount >= plan[i][0]) && ((amount <= plan[i][1]) || (plan[i][1] == 0))) {
                percent = plan[i][2];
                days = plan[i][3];
                period = plan[i][4];
            }
        }

        profit = percent * amount / 100;
        if (period=='Daily') profit_total = percent * amount / 100  * days;
        else profit_total = percent * amount / 100;
        /*$('#profit_daily').html((profit).toFixed(2) + "$");*/
        $('#percent_total').html((percent).toFixed(2) + "%");
        $('#profit_total').html((profit_total).toFixed(2) + "$");
                        
        return false;
    }

    jQuery(document).ready(function(){
        jQuery('#calc_amount').on('keyup change', function(){
            jQuery('#calc_btn').click();
        });

        jQuery('[name=plan]').on('change', function(){
            change_plan();
            jQuery('#calc_btn').click();
        });

        change_plan();
        jQuery('#calc_btn').click();
    });
</script>
{/if}