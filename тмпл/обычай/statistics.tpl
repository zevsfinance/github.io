{assign var="meta_title" value="Statistics"}
{include file="header.tpl" title="Statistics"}
<style>
body{
background-image: url('img/statistics-bg.jpg');
}
</style>
<div class="affilateMain">
    <div class="container">
        <div style="padding-right: 346px;padding-left:0;" class="in">
            <div class="bitAffilate"></div>
   
            <div class="infoAffilate {*wow slideInLeft*}">
                <div class="left">
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate1.png)"></div>
                        <span class="tit">TOTAL DEPOSIT</span>
                        <span class="val">{$currency_sign} {$settings.info_box_deposit_funds_generated}</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate2.png)"></div>
                        <span class="tit">TOTAL WITHDRAW</span>
                        <span class="val">{$currency_sign} {$settings.info_box_withdraw_funds_generated}</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate3.png)"></div>
                        <span class="tit">VISITORS ONLINE</span>
                        <span class="val">{$settings.info_box_visitor_online_generated}</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate4.png)"></div>
                        <span class="tit">RUNNING DAYS</span>
                        <span class="val">{$settings.site_days_online_generated}</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate5.png)"></div>
                        <span class="tit">MEMBERS ONLINe</span>
                        <span class="val">{$settings.show_info_box_members_online_generated}</span>
                    </div>
                </div>
                <div class="right">
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate6.png)"></div>
                        <span class="tit">TOTAL ACCOUNTS</span>
                        <span class="val">{$settings.info_box_total_accounts_generated}</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate7.png)"></div>
                        <span class="tit">active ACCOUNTS</span>
                        <span class="val">{$settings.info_box_total_active_accounts_generated}</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate8.png)"></div>
                        <span class="tit">LAST DEPOSIT</span>
                        <span class="val">{$currency_sign} {$stat_last_deposit.amount|number_format:2}</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate9.png)"></div>
                        <span class="tit">LAST WITHDRAW</span>
                        <span class="val">{$currency_sign} {$stat_last_withdrawal.amount|number_format:2}</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate0.png)"></div>
                        <span class="tit">new users</span>
                        <span class="val">{if $settings.show_info_box_newest_member_generated}{$settings.show_info_box_newest_member_generated}{else}N/A{/if}</span>
                    </div>
                </div>
                <div class="logoAffilate"></div>
            </div>
        </div>
    </div>
</div>

<div class="lastOper {*wow fadeInDown*}" style="margin-top: 50px;">
    <div class="container">
        <div class="in">
            <h2 class="capTitle">Last Operations</h2>
            <div class="list">                
                {include file="index_top_investors.tpl"}
                {include file="index_last_deposits.tpl"}
                {include file="index_last_withdrawals.tpl"}                
            </div>
            
            <div class="pic_bit"></div>
        </div>
        <div class="bigFon"></div>
        <div class="circleBig"></div>
    </div>
</div>

{include file="footer.tpl"}