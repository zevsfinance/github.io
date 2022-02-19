<?php /* Smarty version 3.1.27, created on 2021-11-14 23:30:34
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/deposit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1710173972619171ea834b22_42202329%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fa887ce3bb96443b6eede3e9ec7c0a5a81239a9' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/deposit.tpl',
      1 => 1631282966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1710173972619171ea834b22_42202329',
  'variables' => 
  array (
    'qplans' => 0,
    'frm' => 0,
    'errors' => 0,
    'currency_sign' => 0,
    'plans' => 0,
    'p' => 0,
    'percent' => 0,
    'daily_percent' => 0,
    'i' => 0,
    'common_percent' => 0,
    'min' => 0,
    'max' => 0,
    'ps' => 0,
    'j' => 0,
    'pp' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_619171ea87d444_13363165',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619171ea87d444_13363165')) {
function content_619171ea87d444_13363165 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '1710173972619171ea834b22_42202329';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>



<?php echo '<script'; ?>
 language="javascript"><!--
function openCalculator(id)
{

  w = 225; h = 400;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window.open('?a=calendar&type=' + id, 'calculator' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=0");


  <?php if ($_smarty_tpl->tpl_vars['qplans']->value > 1) {?>

  for (i = 0; i < document.spendform.h_id.length; i++)
  {
    if (document.spendform.h_id[i].value == id)
    {
      document.spendform.h_id[i].checked = true;
    }
  }

  <?php }?>


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
--><?php echo '</script'; ?>
>


<h2 class="capTitle">Make Deposit</h2>
<?php if ($_smarty_tpl->tpl_vars['frm']->value['say'] == 'deposit_success') {?>
    <h3>The deposit has been successfully saved.</h3>
    <br><br>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['frm']->value['say'] == 'deposit_saved') {?>
    <h3>The deposit has been saved. It will become active when the administrator checks statistics.</h3><br><br>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['errors']->value) {?>
    <?php if ($_smarty_tpl->tpl_vars['errors']->value['less_min']) {?>
        Sorry, you can deposit not less than <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['errors']->value['less_min']);?>
 with selected processing<br><br>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['errors']->value['greater_max']) {?>
        Sorry, you can deposit not greater than <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['errors']->value['greater_max']);?>
 with selected processing<br><br>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['errors']->value['ec_forbidden']) {?>
        Sorry, deposit with selected processing is temproary forbidden.<br><br>
    <?php }?>
<?php }?>
<form method=post name="spendform">
    <input type=hidden name=a value=deposit>
    <div class="makeBl">
        <div class="selectPlan blBlueCircle">
            <div class="numer"></div>
            <span class="title">Select Plan:</span>
            <div class="listPlans">
                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['plans'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['plans']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['name'] = 'plans';
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['plans']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['plans']['total']);
?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['plans'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['p']->_loop = false;
$_smarty_tpl->tpl_vars['p']->total= $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['p']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
$_smarty_tpl->tpl_vars['p']->iteration++;
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration == 1;
$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration == $_smarty_tpl->tpl_vars['p']->total;
$foreach_p_Sav = $_smarty_tpl->tpl_vars['p'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['p']->first) {
$_smarty_tpl->tpl_vars['min'] = new Smarty_Variable(round($_smarty_tpl->tpl_vars['p']->value['min_deposit'],2), null, 0);
}?>
                        <?php if ($_smarty_tpl->tpl_vars['p']->last) {
$_smarty_tpl->tpl_vars['max'] = new Smarty_Variable(round($_smarty_tpl->tpl_vars['p']->value['max_deposit'],2), null, 0);
}?>
                        <?php $_smarty_tpl->tpl_vars['percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['p']->value['percent'], null, 0);?>
                    <?php
$_smarty_tpl->tpl_vars['p'] = $foreach_p_Sav;
}
?>

                    <?php $_smarty_tpl->tpl_vars['daily_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['percent']->value, null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['common_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['q_days']*$_smarty_tpl->tpl_vars['daily_percent']->value, null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['period'] == 'Monthly') {?>
                        <?php $_smarty_tpl->tpl_vars['daily_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['percent']->value/30, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars['common_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['q_days']*$_smarty_tpl->tpl_vars['daily_percent']->value, null, 0);?>
                    <?php } elseif ($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['period'] == NULL) {?>
                        <?php $_smarty_tpl->tpl_vars['daily_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['percent']->value/$_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['q_days'], null, 0);?>
                        <?php $_smarty_tpl->tpl_vars['common_percent'] = new Smarty_Variable($_smarty_tpl->tpl_vars['percent']->value, null, 0);?>
                    <?php }?>
                    <div class="item<?php if ($_smarty_tpl->tpl_vars['i']->value >= 6) {?> vip<?php }?>">
                        <input type="radio" name="h_id" id="plan<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['id']);?>
" value="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['id']);?>
" data-days="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['q_days']);?>
" data-perc="<?php echo smarty_modifier_myescape(round($_smarty_tpl->tpl_vars['percent']->value,2));?>
" data-min="<?php echo smarty_modifier_myescape(round($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['min_deposit'],2));?>
" data-max="<?php echo smarty_modifier_myescape(round($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['max_deposit'],2));?>
" data-period="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['period']);?>
" data-name="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['dsnamec']);?>
"<?php if ($_smarty_tpl->tpl_vars['i']->value == 0) {?> checked<?php }?>>
                        <label for="plan<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['id']);?>
">
                            <?php if ($_smarty_tpl->tpl_vars['i']->value >= 6) {?><span class="vip">VIP PLAN</span><?php }?>
                            <span class="pr"><?php echo smarty_modifier_myescape(round($_smarty_tpl->tpl_vars['common_percent']->value,2));?>
%</span>
                            <span class="day">After <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['q_days']);?>
 Day<?php if ($_smarty_tpl->tpl_vars['plans']->value[$_smarty_tpl->getVariable('smarty')->value['section']['plans']['index']]['q_days'] > 1) {?>s<?php }?></span>
                            <ul>
                                <li><span class="tit">Min:</span><span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['min']->value);?>
$</span></li>
                                <li><span class="tit">Max:</span><span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['max']->value);?>
$</span></li>
                            </ul>
                        </label>
                    </div>
                    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
                <?php endfor; endif; ?>
            </div>
        </div>
        <div class="enterBl">
            <div class="amount blBlueCircle">
                <div class="numer"></div>
                <span class="title">Enter Amount:</span>
                <div class="inputLine">
                    <input type=text name=amount value='10' id="calc_amount">
                    <span class="dollar">$</span>
                </div>
            </div>
            <div class="payment blBlueCircle">
                <div class="numer"></div>
                <span class="title">Enter Amount:</span>
                <select class="selectricBl payMet1" data-id="payMet1" name="type">
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['p'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['p']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['name'] = 'p';
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ps']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['total']);
?>
                        <?php if ($_smarty_tpl->tpl_vars['ps']->value[$_smarty_tpl->getVariable('smarty')->value['section']['p']['index']]['status']) {?>
                            <option value="process_<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value[$_smarty_tpl->getVariable('smarty')->value['section']['p']['index']]['id']);?>
"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value[$_smarty_tpl->getVariable('smarty')->value['section']['p']['index']]['name']);?>
 (via merchant)</option>
                        <?php }?>
                    <?php endfor; endif; ?>
                </select>
                <select class="selectricBl payMet2" data-id="payMet2">
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['p'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['p']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['name'] = 'p';
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ps']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['p']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['p']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['p']['total']);
?>
                        <?php if ($_smarty_tpl->tpl_vars['ps']->value[$_smarty_tpl->getVariable('smarty')->value['section']['p']['index']]['status'] && $_smarty_tpl->tpl_vars['ps']->value[$_smarty_tpl->getVariable('smarty')->value['section']['p']['index']]['balance'] > 0) {?>
                            <option value="account_<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value[$_smarty_tpl->getVariable('smarty')->value['section']['p']['index']]['id']);?>
"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value[$_smarty_tpl->getVariable('smarty')->value['section']['p']['index']]['name']);?>
 (<?php echo smarty_modifier_myescape(round($_smarty_tpl->tpl_vars['ps']->value[$_smarty_tpl->getVariable('smarty')->value['section']['p']['index']]['balance'],6));?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ps']->value[$_smarty_tpl->getVariable('smarty')->value['section']['p']['index']]['fiat']);?>
)</option>
                        <?php }?>
                    <?php endfor; endif; ?>                                    
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

<?php echo '<script'; ?>
 type="text/javascript">
    var plans = new Array;
    <?php
$_from = $_smarty_tpl->tpl_vars['plans']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['p']->_loop = false;
$_smarty_tpl->tpl_vars['p']->total= $_smarty_tpl->_count($_from);
$_smarty_tpl->tpl_vars['p']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
$_smarty_tpl->tpl_vars['p']->iteration++;
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration == 1;
$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration == $_smarty_tpl->tpl_vars['p']->total;
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
            <?php if ($_smarty_tpl->tpl_vars['pp']->first) {?>plans[<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['id']);?>
] = new Array;<?php }?>
            plans[<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['id']);?>
][<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['j']->value);?>
] = new Array(<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['pp']->value['min_deposit']);?>
, <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['pp']->value['max_deposit']);?>
, <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['pp']->value['percent']);?>
, <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['q_days']);?>
);
            <?php $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable($_smarty_tpl->tpl_vars['j']->value+1, null, 0);?>
        <?php
$_smarty_tpl->tpl_vars['pp'] = $foreach_pp_Sav;
}
?>
    <?php }
}
$_smarty_tpl->tpl_vars['p'] = $foreach_p_Sav;
}
?>

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
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>