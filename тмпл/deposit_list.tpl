{include file="header.tpl"}

<h2 class="capTitle">Deposits</h2>
<div class="depositList">
    {foreach from=$plans item=p}
        {foreach from=$p.deposits item=d}            
            {$daily_percent = $d.plan_percent}
            {$common_percent = $p.q_days*$daily_percent}
            {if $p.period=='Monthly'}
                {$daily_percent = $d.plan_percent/30}
                {$common_percent = $p.q_days*$daily_percent}
            {elseif $p.period==NULL}
                {$daily_percent = $d.plan_percent/$p.q_days}
                {$common_percent = $d.plan_percent}
            {/if}

            <div class="depositLine blBlueCircle">
                <div class="prBl{if $p.id>=6} vip{/if}">
                    <span class="pr">{$common_percent}%</span>
                    <span class="desr">After {$p.q_days} Day(s)</span>
                </div>
                <div class="list">
                    <div class="listTopInfo">
                        <div class="col">
                            <span class="icon-calendar-38"></span>
                            <span class="tit">Opening date:</span>
                            <span class="val">{$d.deposit_date}</span>
                        </div>
                        <div class="col">
                            <span class="icon-low-price2"></span>
                            <span class="tit">Profit:</span>
                            <span class="val">{$currency_sign} {$p.total_profit}</span>
                        </div>
                        <div class="col">
                            <span class="icon-coins-12"></span>
                            <span class="tit">Deposit amount:</span>
                            <span class="val">{$currency_sign} {$d.deposit}</span>
                        </div>
                    </div>
                    <div class="listBotInfo">
                        <div class="col">
                            <ul>
                                <li>
                                    <span class="tit">Daily percentage:</span>
                                    <span class="val">{$daily_percent|round:2}%</span>
                                </li>
                                <li>
                                    <span class="tit">Common:</span>
                                    <span class="val">{$common_percent|round:2}%</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li>
                                    <span class="tit">Deposit period: </span>
                                    <span class="val">{$p.q_days} Days</span>
                                </li>
                                <li>
                                    <span class="tit">Payment system</span>
                                    <span class="val">{$d.ec_name}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li>
                                    <span class="tit">Following charge: </span>
                                    <span class="val">{$d.next_earn_sec|date_format:"%d.%m.%Y  %H:%I:%S"}</span>
                                </li>
                                <li>
                                    <span class="tit">Previous charge:</span>
                                    <span class="val">{$d.last_paid_sec|date_format:"%d.%m.%Y  %H:%I:%S"}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="progressBl">
                    <div class="txtProg">
                        <span>Accrued: <b>{$d.duration}</b> out of <b>{$d.expire_in}</b></span>
                    </div>
                    <div class="prog">
                        <div class="value" style="width: {($d.duration*100/$d.expire_in)|round:2}%"></div>
                    </div>
                </div>
                <div class="circlePr">
                    <input type="text" value="{($d.duration*100/$d.expire_in)|round:2}">
                </div>
            </div>                                 
        {/foreach}
    {/foreach}    
</div>

{include file="footer.tpl"}
