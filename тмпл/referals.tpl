{include file="header.tpl"}

<div class="linksBl" id="refirral" style="display: none;">
    <div class="item">
        <div class="pic" style="background-image: url(img/bllinkx.png)"></div>
        <span class="tit">Your Refirral Link:</span>
        <a href="{$settings.site_url}{"?ref=`$userinfo.username`"|encurl}" class="link">{$settings.site_url}{"?ref=`$userinfo.username`"|encurl}</a>
    </div>
    <div class="item">
        <div class="pic" style="background-image: url(img/bllinka.png)"></div>
        {if $refirral.email != ""}
            <span class="tit">Your Refirral : <span class="name">{$refirral.name}</span></span>
            <a href="mailto:{$refirral.email}" class="link">{$refirral.email}</a>
        {else}
            <span class="tit">Your Refirral: <span class="name">---</span></span>
            <a class="link">---</a>
        {/if}
    </div>
</div>

<h2 class="capTitle">Referrals</h2>
<div class="referalsBl">
    <div class="accountBl">
        <div class="linksBl">
            <div class="item">
                <div class="pic" style="background-image: url(img/bllinka.png)"></div>
                {if $refirral.email != ""}
                    <span class="tit">Your Refirral: <span class="name">{$refirral.name}</span></span>
                    <a href="mailto:{$refirral.email}" class="link">{$refirral.email}</a>
                {else}
                    <span class="tit">Your Refirral: <span class="name">---</span></span>
                    <a class="link">---</a>
                {/if}
            </div>
            <div class="item">
                <div class="filterBl">
                    <form method=post name=opts>
                        <div class="wrapIn">
                            <div class="dateTimeBl">
                                <div class="col">
                                    <span class="tit">From:</span>
                                    <select name=month_from class=selectricBl>
                                        {section name=month_from loop=$month}
                                            <option value={$smarty.section.month_from.index+1} {if $smarty.section.month_from.index+1 == $frm.month_from}selected{/if}>{$month[month_from]}
                                        {/section}
                                    </select>
                                    <select name=day_from class=selectricBl>
                                        {section name=day_from loop=$day}
                                            <option value={$smarty.section.day_from.index+1} {if $smarty.section.day_from.index+1 == $frm.day_from}selected{/if}>{$day[day_from]}
                                        {/section}
                                    </select>
                                    <select name=year_from class=selectricBl>
                                        {section name=year_from loop=$year}
                                            <option value={$year[year_from]} {if $year[year_from] == $frm.year_from}selected{/if}>{$year[year_from]}
                                        {/section}
                                    </select>
                                </div>
                                <div class="col">
                                    <span class="tit">to:</span>
                                    <select name=month_to class=selectricBl>
                                        {section name=month_to loop=$month}
                                            <option value={$smarty.section.month_to.index+1} {if $smarty.section.month_to.index+1 == $frm.month_to}selected{/if}>{$month[month_to]}
                                        {/section}
                                    </select>
                                    <select name=day_to class=selectricBl>
                                        {section name=day_to loop=$day}
                                            <option value={$smarty.section.day_to.index+1} {if $smarty.section.day_to.index+1 == $frm.day_to}selected{/if}>{$day[day_to]}
                                        {/section}
                                    </select>
                                    <select name=year_to class=selectricBl>
                                        {section name=year_to loop=$year}
                                            <option value={$year[year_to]} {if $year[year_to] == $frm.year_to}selected{/if}>{$year[year_to]}
                                        {/section}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="innerBtn" type="submit" style="display: none;">Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="genetalStat">
        <div class="left">
            <div class="line">
                <span class="icon-teamwork-9"></span>
                <span class="tit">Total referral comission:</span>
                <span class="val">{$currency_sign}{$commissions}</span>
            </div>
            <div class="line">
                <span class="icon-people-1"></span>
                <span class="tit">Referrals:</span>
                <span class="val">{$total_ref}</span>
            </div>
            <div class="line">
                <span class="icon-settings-28"></span>
                <span class="tit">Active referrals:</span>
                <span class="val">{$active_ref}</span>
            </div>
        </div>
        <div class="right">
            <div class="tableInfoRef">
                {section name=s loop=$refstat}
                    <div class="line">
                        <div class="col">
                            <span class="tit">date:</span>
                            <span class="val">{$refstat[s].date}</span>
                        </div>
                        <div class="col">
                            <span class="tit">ins:</span>
                            <span class="val">{$refstat[s].income}</span>
                        </div>
                        <div class="col">
                            <span class="tit">signup:</span>
                            <span class="val">{$refstat[s].reg}</span>
                        </div>
                    </div>
                {/section}
            </div>
        </div>
    </div>

    <div class="tableReferals">
        <h2 class="cap">Your Referrals:</h2>
        <div class="list">
            {section name=s loop=$referals}
                {$email = "@"|explode:$referals[s].email}
                <div class="item">
                    <div class="infoLine">
                        <div class="col">
                            <span class="icon-profile-1"></span>
                            <span class="tit">Nickname:</span>
                            <span class="val">{$referals[s].username}</span>
                        </div>
                        <div class="col">
                            <span class="icon-email-32"></span>
                            <span class="tit">E-mail:</span>
                            <a href="mailto:{$referals[s].email}" class="link">{$referals[s].email}</a>
                        </div>
                        <div class="col">
                            <span class="icon-maps-and-flags"></span>
                            <span class="tit">status:</span>
                            <a class="val">{if $referals[s].q_deposits > 0}$ {$referals[s].q_deposits}{else}No deposit eat{/if}</a>
                        </div>
                    </div>
                    <div class="desrLine">
                        <p>
                            User referral:
                            {section name=l loop=$referals[s].ref_stats}
                                <b>{$referals[s].ref_stats[l].cnt_active}</b> active of <b>{$referals[s].ref_stats[l].cnt}</b> on level {$referals[s].ref_stats[l].level}{if !$smarty.section.l.last};{/if}
                            {/section}
                        </p>
                    </div>
                </div>                                              
            {/section}
        </div>
    </div>
</div>

{include file="footer.tpl"}