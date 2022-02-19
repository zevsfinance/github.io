{include file="header.tpl"}

{literal}
    <script language=javascript>
    function go(p) {
        document.opts.page.value = p;
        document.opts.submit();
    }
    </script>
{/literal}

<h2 class="capTitle">History</h2>
<div class="filterBl blBlueCircle">
    <form method=post name=opts>
        <input type=hidden name=a value=earnings>
        <input type=hidden name=page value={$current_page}>
        <div class="wrapIn">
            <div class="dateTimeBl">
                <div class="col">
                    <span class="tit">From:</span>
                    <select name=month_from class="selectricBl">
                        {section name=month_from loop=$month}
                            <option value={$smarty.section.month_from.index+1} {if $smarty.section.month_from.index+1 == $frm.month_from}selected{/if}>{$month[month_from]}</option>
                        {/section}
                    </select>
                    <select name=day_from class="selectricBl">
                        {section name=day_from loop=$day}
                            <option value={$smarty.section.day_from.index+1} {if $smarty.section.day_from.index+1 == $frm.day_from}selected{/if}>{$day[day_from]}</option>
                        {/section}
                    </select>
                    <select name=year_from class="selectricBl">
                        {section name=year_from loop=$year}
                            <option value={$year[year_from]} {if $year[year_from] == $frm.year_from}selected{/if}>{$year[year_from]}</option>
                        {/section}
                    </select>
                </div>
                <div class="col">
                    <span class="tit">to:</span>
                    <select name=month_to class="selectricBl">
                        {section name=month_to loop=$month}
                            <option value={$smarty.section.month_to.index+1} {if $smarty.section.month_to.index+1 == $frm.month_to}selected{/if}>{$month[month_to]}</option>
                        {/section}
                    </select>
                    <select name=day_to class="selectricBl">
                        {section name=day_to loop=$day}
                            <option value={$smarty.section.day_to.index+1} {if $smarty.section.day_to.index+1 == $frm.day_to}selected{/if}>{$day[day_to]}</option>
                        {/section}
                    </select>
                    <select name=year_to class="selectricBl">
                        {section name=year_to loop=$year}
                            <option value={$year[year_to]} {if $year[year_to] == $frm.year_to}selected{/if}>{$year[year_to]}</option>
                        {/section}
                    </select>
                </div>
            </div>
            <div class="payBl">
                <span class="tit">payment:</span>
                <select class="selectricBl" name="ec">
                    <option value=-1>All eCurrencies</option>
                    {section name=ec loop=$ecs}
                        <option value={$ecs[ec].id} {if $frm.ec eq $ecs[ec].id}selected{/if}>{$ecs[ec].name}</option>
                    {/section}
                </select>
            </div>
            <div class="transactionBl">
                <span class="tit">transaction:</span>
                <select class="selectricBl" name="type">
                    <option value="">All operations</option>
                    {section name=opt loop=$options}
                        <option value="{$options[opt].type}" {if $options[opt].selected}selected{/if}>{$options[opt].type_name}</option>
                    {/section}
                </select>
            </div>
            <button class="btn btnYellow" type="submit">search</button>
        </div>
    </form>
</div>
<div class="tableHistory">
    <div class="thead">        
        <div class="col">
            <span>Date</span>
        </div>
        <div class="col">
            <span>Transaction</span>
        </div>
        <div class="col">
            <span>Payment system</span>
        </div>
        <div class="col">
            <span>credit</span>
        </div>
        <div class="col">
            <span>debit</span>
        </div>
        <div class="col">
            <span>balance</span>
        </div>
        <div class="col">
            <span>comment</span>
        </div>
    </div>
    <div class="tbody">
        {section name=trans loop=$trans}
            <div class="line">
                <div class="col">
                    <span class="mobileTitleTable">Date</span>
                    <span class="name">{$trans[trans].d}</span>
                </div>
                <div class="col">
                    <span class="mobileTitleTable">Transaction</span>
                    <span class="name">{$trans[trans].transtype}</span>
                </div>
                <div class="col">
                    <span class="mobileTitleTable">Payment system</span>
                    <div class="pic" style="background-image: url(img/ps_s/{$trans[trans].ec}.png)"></div>
                </div>
                <div class="col">
                    <span class="mobileTitleTable">credit</span>
                    <span class="val credit">
                        {if $trans[trans].debitcredit == 0}
                            {$currency_sign}{$trans[trans].actual_amount}
                        {else}
                            {$currency_sign}0
                        {/if}
                    </span>
                </div>
                <div class="col">
                    <span class="mobileTitleTable">debit</span>
                    <span class="val debit">
                        {if $trans[trans].debitcredit == 1}
                            {$currency_sign}{$trans[trans].actual_amount}
                        {else}
                            {$currency_sign}0
                        {/if}
                    </span>
                </div>
                <div class="col">
                    <span class="mobileTitleTable">balance</span>
                    <span class="val balance">{$currency_sign}{$trans[trans].balance|default:0}</span>
                </div>
                <div class="col">
                    <span class="mobileTitleTable">comment</span>
                    <p>{$trans[trans].description} {if $trans[trans].transtype eq 'Withdrawal request'} <a href=?a=cancelwithdraw&id={$trans[trans].id} onclick="return confirm('Are you sure you want to delete this request?')">[cancel]</a>{/if}</p>
                </div>
            </div>
        {/section}                     
    </div>
</div>

{paginator col=$paginator.col cur=$paginator.cur url="javascript:go('%s')"}

{include file="footer.tpl"}