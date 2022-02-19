<?php /* Smarty version 3.1.27, created on 2021-11-15 12:27:12
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/block.calc.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1645463726619227f019ca87_88837824%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0a1f5b64e0cecdc9bd437e4dae71054a1619ea5' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/block.calc.tpl',
      1 => 1636782248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1645463726619227f019ca87_88837824',
  'variables' => 
  array (
    'page' => 0,
    'plans' => 0,
    'l' => 0,
    'v' => 0,
    'percent' => 0,
    'daily_percent' => 0,
    'i' => 0,
    'common_percent' => 0,
    'min' => 0,
    'max' => 0,
    'userinfo' => 0,
    'p' => 0,
    'j' => 0,
    'pp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_619227f01cd573_94006021',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619227f01cd573_94006021')) {
function content_619227f01cd573_94006021 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '1645463726619227f019ca87_88837824';
?>
<form onsubmit="return calc()" method="post" class="in">
    <?php if ($_smarty_tpl->tpl_vars['page']->value == 'home') {?>
        <div class="textBlock ">
            <h2 class="capTitle">Investment Plans</h2>
            <p>PAYDEL is offering management of finances based on fixed conditions. Our team has developed the highly profitable investment plans with one-time accruals of income after a certain period.</p>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value == "invest") {?>
        <div class="textBlock">
            <h2 class="capTitle">PAYDEL provides its customers with the right solution at the right time.</h2>
            
            <h2 style="margin-top:122px;" class="capTitle">Choose your plan:</h2>
            <p>An investment in cryptocurrency mining can enhance anyone's portfolio returns. This is the reason we have decided to go online, and now you can invest in Cryptocurrency mining without the hassle of managing your own hardware. We provide professional investment services with a real focus on customer satisfaction.</p>
        </div>
    <?php }?>

    <div class="listPlan ">
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
        <?php
$_from = $_smarty_tpl->tpl_vars['plans']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['l'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['l']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['l']->value) {
$_smarty_tpl->tpl_vars['l']->_loop = true;
$foreach_l_Sav = $_smarty_tpl->tpl_vars['l'];
?>
            <?php $_smarty_tpl->tpl_vars['percent'] = new Smarty_Variable(0, null, 0);?>
            <?php
$_from = $_smarty_tpl->tpl_vars['l']->value['plans'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
$_smarty_tpl->tpl_vars['v']->total= $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['v']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$_smarty_tpl->tpl_vars['v']->iteration++;
$_smarty_tpl->tpl_vars['v']->first = $_smarty_tpl->tpl_vars['v']->iteration == 1;
$_smarty_tpl->tpl_vars['v']->last = $_smarty_tpl->tpl_vars['v']->iteration == $_smarty_tpl->tpl_vars['v']->total;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
                <?php if ($_smarty_tpl->tpl_vars['v']->first) {
$_smarty_tpl->tpl_vars['min'] = new Smarty_Variable(round($_smarty_tpl->tpl_vars['v']->value['min_deposit'],2), null, 0);
}?>
                <?php if ($_smarty_tpl->tpl_vars['v']->last) {
$_smarty_tpl->tpl_vars['max'] = new Smarty_Variable(round($_smarty_tpl->tpl_vars['v']->value['max_deposit'],2), null, 0);
}?>
                <?php $_smarty_tpl->tpl_vars['percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['v']->value['percent'], null, 0);?>
            <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
            <?php $_smarty_tpl->tpl_vars['daily_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['percent']->value, null, 0);?>
            <?php $_smarty_tpl->tpl_vars['common_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['l']->value['q_days']*$_smarty_tpl->tpl_vars['daily_percent']->value, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['l']->value['period'] == 'Monthly') {?>
                <?php $_smarty_tpl->tpl_vars['daily_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['percent']->value/30, null, 0);?>
                <?php $_smarty_tpl->tpl_vars['common_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['l']->value['q_days']*$_smarty_tpl->tpl_vars['daily_percent']->value, null, 0);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['l']->value['period'] == NULL) {?>
                <?php $_smarty_tpl->tpl_vars['daily_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['percent']->value/$_smarty_tpl->tpl_vars['l']->value['q_days'], null, 0);?>
                <?php $_smarty_tpl->tpl_vars['common_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['percent']->value, null, 0);?>
            <?php }?>
            <div class="item ">
                <input type="radio" name="plan" id="plan<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['i']->value);?>
" value="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['i']->value);?>
" data-name="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['l']->value['dsc']);?>
" data-percent="<?php echo smarty_modifier_myescape(round($_smarty_tpl->tpl_vars['percent']->value,2));?>
" data-days="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['l']->value['q_days']);?>
"<?php if ($_smarty_tpl->tpl_vars['i']->value == 0) {?> checked<?php }?>>
                <label for="plan<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['i']->value);?>
"></label>
                <div class="pr"><span class="prTxt"><?php echo smarty_modifier_myescape(round($_smarty_tpl->tpl_vars['common_percent']->value,2));?>
%</span></div>
                <ul>
                    <li><span>Min</span><span><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['min']->value);?>
$</span></li>
                    <li><span>Max</span><span><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['max']->value);?>
$</span></li>
                </ul>
                <span class="desr">After <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['l']->value['q_days']);?>
 Day<?php if ($_smarty_tpl->tpl_vars['l']->value['q_days'] > 1) {?>s<?php }?></span>
                <a href="<?php if ($_smarty_tpl->tpl_vars['userinfo']->value['id']) {
echo smarty_modifier_myescape(encurl("?a=account"));
} else {
echo smarty_modifier_myescape(encurl("?a=signup"));
}?>" class="link">invest now</a>
                <div class="fonBl" style="background-image: url(img/plan_active1.png)"></div>
            </div> 
            
            
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
        <?php
$_smarty_tpl->tpl_vars['l'] = $foreach_l_Sav;
}
?>
        <div class="logoPlan"></div>
        <div class="logoPlan"></div>
    </div>
    <div class="formaPlan ">
        
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
        <a href="<?php if ($_smarty_tpl->tpl_vars['userinfo']->value['id']) {
echo smarty_modifier_myescape(encurl("?a=deposit"));
} else {
echo smarty_modifier_myescape(encurl("?a=signup"));
}?>" class="btn btnYellow">invest now</a>
    </div>    
    <div class="ball"></div>
    <div class="pic_bit"></div>
    <input type="submit" style="display: none;" id="calc_btn">
</form>

<?php if ($_smarty_tpl->tpl_vars['plans']->value) {?>
<?php echo '<script'; ?>
>
    var plans = new Array;
    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
    <?php
$_from = $_smarty_tpl->tpl_vars['plans']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['p']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
$foreach_p_Sav = $_smarty_tpl->tpl_vars['p'];
if (!$_smarty_tpl->tpl_vars['p']->value['closed']) {
if ($_smarty_tpl->tpl_vars['p']->value['plans']) {?>
        <?php $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable(0, null, 0);?>
        <?php
$_from = $_smarty_tpl->tpl_vars['p']->value['plans'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['pp'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['pp']->_loop = false;
$_smarty_tpl->tpl_vars['pp']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['pp']->value) {
$_smarty_tpl->tpl_vars['pp']->_loop = true;
$_smarty_tpl->tpl_vars['pp']->iteration++;
$_smarty_tpl->tpl_vars['pp']->first = $_smarty_tpl->tpl_vars['pp']->iteration == 1;
$foreach_pp_Sav = $_smarty_tpl->tpl_vars['pp'];
?>
            <?php if ($_smarty_tpl->tpl_vars['pp']->first) {?>plans[<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['i']->value);?>
] = new Array;<?php }?>
            plans[<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['i']->value);?>
][<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['j']->value);?>
] = new Array(<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['pp']->value['min_deposit']);?>
, <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['pp']->value['max_deposit']);?>
, <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['pp']->value['percent']);?>
, <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['q_days']);?>
, '<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['period']);?>
');
            <?php $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable($_smarty_tpl->tpl_vars['j']->value+1, null, 0);?>
        <?php
$_smarty_tpl->tpl_vars['pp'] = $foreach_pp_Sav;
}
?>
        <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
    <?php }
}
$_smarty_tpl->tpl_vars['p'] = $foreach_p_Sav;
}
?>

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
<?php echo '</script'; ?>
>
<?php }
}
}
?>