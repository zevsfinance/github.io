<?php /* Smarty version 3.1.27, created on 2021-11-14 23:30:24
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/deposit_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1993406912619171e0313d77_17444988%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d2e2063c889dd4ea1350839f01c857016b5f2d9' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/deposit_list.tpl',
      1 => 1631282966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1993406912619171e0313d77_17444988',
  'variables' => 
  array (
    'plans' => 0,
    'p' => 0,
    'd' => 0,
    'daily_percent' => 0,
    'common_percent' => 0,
    'currency_sign' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_619171e03372c8_64664169',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619171e03372c8_64664169')) {
function content_619171e03372c8_64664169 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';
if (!is_callable('smarty_modifier_date_format')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '1993406912619171e0313d77_17444988';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<h2 class="capTitle">Deposits</h2>
<div class="depositList">
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
?>
        <?php
$_from = $_smarty_tpl->tpl_vars['p']->value['deposits'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['d']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['d']->value) {
$_smarty_tpl->tpl_vars['d']->_loop = true;
$foreach_d_Sav = $_smarty_tpl->tpl_vars['d'];
?>            
            <?php $_smarty_tpl->tpl_vars['daily_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['d']->value['plan_percent'], null, 0);?>
            <?php $_smarty_tpl->tpl_vars['common_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['p']->value['q_days']*$_smarty_tpl->tpl_vars['daily_percent']->value, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['p']->value['period'] == 'Monthly') {?>
                <?php $_smarty_tpl->tpl_vars['daily_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['d']->value['plan_percent']/30, null, 0);?>
                <?php $_smarty_tpl->tpl_vars['common_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['p']->value['q_days']*$_smarty_tpl->tpl_vars['daily_percent']->value, null, 0);?>
            <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['period'] == NULL) {?>
                <?php $_smarty_tpl->tpl_vars['daily_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['d']->value['plan_percent']/$_smarty_tpl->tpl_vars['p']->value['q_days'], null, 0);?>
                <?php $_smarty_tpl->tpl_vars['common_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['d']->value['plan_percent'], null, 0);?>
            <?php }?>

            <div class="depositLine blBlueCircle">
                <div class="prBl<?php if ($_smarty_tpl->tpl_vars['p']->value['id'] >= 6) {?> vip<?php }?>">
                    <span class="pr"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['common_percent']->value);?>
%</span>
                    <span class="desr">After <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['q_days']);?>
 Day(s)</span>
                </div>
                <div class="list">
                    <div class="listTopInfo">
                        <div class="col">
                            <span class="icon-calendar-38"></span>
                            <span class="tit">Opening date:</span>
                            <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['d']->value['deposit_date']);?>
</span>
                        </div>
                        <div class="col">
                            <span class="icon-low-price2"></span>
                            <span class="tit">Profit:</span>
                            <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['total_profit']);?>
</span>
                        </div>
                        <div class="col">
                            <span class="icon-coins-12"></span>
                            <span class="tit">Deposit amount:</span>
                            <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['d']->value['deposit']);?>
</span>
                        </div>
                    </div>
                    <div class="listBotInfo">
                        <div class="col">
                            <ul>
                                <li>
                                    <span class="tit">Daily percentage:</span>
                                    <span class="val"><?php echo smarty_modifier_myescape(round($_smarty_tpl->tpl_vars['daily_percent']->value,2));?>
%</span>
                                </li>
                                <li>
                                    <span class="tit">Common:</span>
                                    <span class="val"><?php echo smarty_modifier_myescape(round($_smarty_tpl->tpl_vars['common_percent']->value,2));?>
%</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li>
                                    <span class="tit">Deposit period: </span>
                                    <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['q_days']);?>
 Days</span>
                                </li>
                                <li>
                                    <span class="tit">Payment system</span>
                                    <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['d']->value['ec_name']);?>
</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li>
                                    <span class="tit">Following charge: </span>
                                    <span class="val"><?php echo smarty_modifier_myescape(smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['next_earn_sec'],"%d.%m.%Y  %H:%I:%S"));?>
</span>
                                </li>
                                <li>
                                    <span class="tit">Previous charge:</span>
                                    <span class="val"><?php echo smarty_modifier_myescape(smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['last_paid_sec'],"%d.%m.%Y  %H:%I:%S"));?>
</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="progressBl">
                    <div class="txtProg">
                        <span>Accrued: <b><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['d']->value['duration']);?>
</b> out of <b><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['d']->value['expire_in']);?>
</b></span>
                    </div>
                    <div class="prog">
                        <div class="value" style="width: <?php echo smarty_modifier_myescape(round(($_smarty_tpl->tpl_vars['d']->value['duration']*100/$_smarty_tpl->tpl_vars['d']->value['expire_in']),2));?>
%"></div>
                    </div>
                </div>
                <div class="circlePr">
                    <input type="text" value="<?php echo smarty_modifier_myescape(round(($_smarty_tpl->tpl_vars['d']->value['duration']*100/$_smarty_tpl->tpl_vars['d']->value['expire_in']),2));?>
">
                </div>
            </div>                                 
        <?php
$_smarty_tpl->tpl_vars['d'] = $foreach_d_Sav;
}
?>
    <?php
$_smarty_tpl->tpl_vars['p'] = $foreach_p_Sav;
}
?>    
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

<?php }
}
?>