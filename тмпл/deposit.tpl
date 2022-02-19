{include file="header.tpl"}

{literal}
<script language="javascript"><!--
function openCalculator(id)
{

  w = 225; h = 400;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window.open('?a=calendar&type=' + id, 'calculator' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=0");

{/literal}
  {if $qplans > 1}
{literal}
  for (i = 0; i < document.spendform.h_id.length; i++)
  {
    if (document.spendform.h_id[i].value == id)
    {
      document.spendform.h_id[i].checked = true;
    }
  }
{/literal}
  {/if}
{literal}

}

function updateCompound() {
  var id = 0;
  var tt = document.spendform.h_id.type;
  if (tt && tt.toLowerCase() == 'hidden') {
    id = document.spendform.h_id.value;
  } else {
    for (i = 0; i < document.spendform.h_id.length; i++) {
      if (document.spendform.h_id[i].checked) {
        id = document.spendform.h_id[i].value;
      }
    }
  }

  var cpObj = document.getElementById('compound_percents');
  if (cpObj) {
    while (cpObj.options.length != 0) {
      cpObj.options[0] = null;
    }
  }

  if (cps[id] && cps[id].length > 0) {
    document.getElementById('coumpond_block').style.display = '';

    for (i in cps[id]) {
      cpObj.options[cpObj.options.length] = new Option(cps[id][i]);
    }
  } else {
    document.getElementById('coumpond_block').style.display = 'none';
  }
}
var cps = {};
--></script>
{/literal}

<h2 class="capTitle">Make Deposit</h2>
{if $frm.say eq 'deposit_success'}
    <h3>The deposit has been successfully saved.</h3>
    <br><br>
{/if}

{if $frm.say eq 'deposit_saved'}
    <h3>The deposit has been saved. It will become active when the administrator checks statistics.</h3><br><br>
{/if}

{if $errors}
    {if $errors.less_min}
        Sorry, you can deposit not less than {$currency_sign}{$errors.less_min} with selected processing<br><br>
    {/if}
    {if $errors.greater_max}
        Sorry, you can deposit not greater than {$currency_sign}{$errors.greater_max} with selected processing<br><br>
    {/if}
    {if $errors.ec_forbidden}
        Sorry, deposit with selected processing is temproary forbidden.<br><br>
    {/if}
{/if}
<form method=post name="spendform">
    <input type=hidden name=a value=deposit>
    <div class="makeBl">
        <div class="selectPlan blBlueCircle">
            <div class="numer"></div>
            <span class="title">Select Plan:</span>
            <div class="listPlans">
                {$i = 0}
                {section name=plans loop=$plans}
                    {foreach $plans[plans].plans as $p}
                        {if $p@first}{$min = $p.min_deposit|round:2}{/if}
                        {if $p@last}{$max =$p.max_deposit|round:2}{/if}
                        {$percent = $p.percent}
                    {/foreach}

                    {$daily_percent = $percent}
                    {$common_percent = $plans[plans].q_days*$daily_percent}
                    {if $plans[plans].period=='Monthly'}
                        {$daily_percent = $percent/30}
                        {$common_percent = $plans[plans].q_days*$daily_percent}
                    {elseif $plans[plans].period==NULL}
                        {$daily_percent = $percent/$plans[plans].q_days}
                        {$common_percent = $percent}
                    {/if}
                    <div class="item{if $i>=6} vip{/if}">
                        <input type="radio" name="h_id" id="plan{$plans[plans].id}" value="{$plans[plans].id}" data-days="{$plans[plans].q_days}" data-perc="{$percent|round:2}" data-min="{$plans[plans].min_deposit|round:2}" data-max="{$plans[plans].max_deposit|round:2}" data-period="{$plans[plans].period}" data-name="{$plans[plans].dsnamec}"{if $i==0} checked{/if}>
                        <label for="plan{$plans[plans].id}">
                            {if $i>=6}<span class="vip">VIP PLAN</span>{/if}
                            <span class="pr">{$common_percent|round:2}%</span>
                            <span class="day">After {$plans[plans].q_days} Day{if $plans[plans].q_days>1}s{/if}</span>
                            <ul>
                                <li><span class="tit">Min:</span><span class="val">{$min}$</span></li>
                                <li><span class="tit">Max:</span><span class="val">{$max}$</span></li>
                            </ul>
                        </label>
                    </div>
                    {$i = $i + 1}
                {/section}
            </div>
        </div>
        <div class="enterBl">
            <div class="amount blBlueCircle">
                <div class="numer"></div>
                <span class="title">Enter Amount:</span>
                <div class="inputLine">
                    <input type=text name=amount value='10{*$min_deposit*}' id="calc_amount">
                    <span class="dollar">$</span>
                </div>
            </div>
            <div class="payment blBlueCircle">
                <div class="numer"></div>
                <span class="title">Enter Amount:</span>
                <select class="selectricBl payMet1" data-id="payMet1" name="type">
                    {section name=p loop=$ps}
                        {if $ps[p].status}
                            <option value="process_{$ps[p].id}">{$ps[p].name} (via merchant)</option>
                        {/if}
                    {/section}
                </select>
                <select class="selectricBl payMet2" data-id="payMet2">
                    {section name=p loop=$ps}
                        {if $ps[p].status && $ps[p].balance>0}
                            <option value="account_{$ps[p].id}">{$ps[p].name} ({$ps[p].balance|round:6} {$ps[p].fiat})</option>
                        {/if}
                    {/section}                                    
                </select>
                <div class="listChek">
                    <div class="chekBl">
                        <input type="radio" name="payMet" id="payMet1" checked>                        
                        <label for="payMet1">From payment system</label>
                    </div>
                    <div class="chekBl">
                        <input type="radio" name="payMet" id="payMet2">
                        <label for="payMet2">From balance</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="totalBl blBlueCircle">
            <div class="col percent">
                <span class="tit">Total Percent:</span>
                <span class="val" id="percent_total">1100%</span>
            </div>
            <div class="col profit">
                <span class="tit">Total Profit: </span>
                <span class="val" id="profit">1204.00$</span>
            </div>
            <button type="submit" class="btn btnYellow">Make deposit</button>
        </div>
    </div>
</form>

<script type="text/javascript">
    var plans = new Array;
    {foreach $plans as $p}{if !$p.closed}{if $p.plans}
        {$j = 0}
        {foreach $p.plans as $pp}
            {if $pp@first}plans[{$p.id}] = new Array;{/if}
            plans[{$p.id}][{$j}] = new Array({$pp.min_deposit}, {$pp.max_deposit}, {$pp.percent}, {$p.q_days});
            {$j = $j + 1}
        {/foreach}
    {/if}{/if}{/foreach}

    function calc() {        
        //period = jQuery('input[name=h_id]:checked').data('days');
        amount = jQuery('#calc_amount').val();

        plan = plans[$('input[name=h_id]:checked').val()];        
        for (var i = 0; i < plan.length; i++) {
            if ((amount >= plan[i][0]) && ((amount <= plan[i][1]) || (plan[i][1] == 0))) {
                percent = plan[i][2];
                days = plan[i][3];                
            }
        }

        //if (period>1) jQuery('#profit_day').html(' ' + (amount*percent/100).toFixed(2) + ' $');
        //else jQuery('#profit_day').html('-');
        jQuery('#percent_total').html(percent + '%');
        jQuery('#profit').html(' ' + (amount*percent/100).toFixed(2) + ' $');
    }

    jQuery(document).ready(function(){
        calc();

        jQuery('#calc_amount').on('change keyup', function(){
            calc();
        });

        jQuery('input[name=h_id]').on('change', function(){
            /*jQuery('#calc_amount').val(jQuery('#calc_plan option:checked').data('min'));
            jQuery('#calc_amount').attr('min', jQuery('input[name=h_id]:checked').data('min'));
            jQuery('#calc_amount').attr('max', jQuery('input[name=h_id]:checked').data('max'));*/

            jQuery('#calc_amount').val(jQuery('input[name=h_id]:checked').data('min'));            
            calc();
        });

        jQuery('input[name=payMet]').on('change', function(){            
            jQuery('.selectric-selectricBl').hide(0);
            jQuery('select[name=type]').attr('name', '');
            jQuery('select[data-id='+jQuery(this).attr('id')+']').attr('name', 'type');
            jQuery('.selectric-'+jQuery(this).attr('id')).show(0);
        })

        jQuery('.selectric-payMet2').hide(0);
    });    
</script>

{include file="footer.tpl"}