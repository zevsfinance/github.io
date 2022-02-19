<?php /* Smarty version 3.1.27, created on 2021-11-14 23:30:50
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/account_main.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:641034695619171fa5b9068_86348941%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4eb1c98bf7f5552c59c95d908eca3ce0b7dacbc' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/account_main.tpl',
      1 => 1633508220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '641034695619171fa5b9068_86348941',
  'variables' => 
  array (
    'notices' => 0,
    'n' => 0,
    'settings' => 0,
    'userinfo' => 0,
    'referral' => 0,
    'currency_sign' => 0,
    'last_deposit' => 0,
    'ab_formated' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_619171fa5d3051_34788265',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619171fa5d3051_34788265')) {
function content_619171fa5d3051_34788265 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '641034695619171fa5b9068_86348941';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<?php echo loaddata_smarty(array('name'=>"user_notices",'var'=>'notices'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['notices']->value) {?>

    <ul style="color:red">
        <?php
$_from = $_smarty_tpl->tpl_vars['notices']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['n']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['n']->value) {
$_smarty_tpl->tpl_vars['n']->_loop = true;
$foreach_n_Sav = $_smarty_tpl->tpl_vars['n'];
?>
            <li><b><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['n']->value['title']);?>
</b> <?php echo smarty_modifier_myescape(nl2br($_smarty_tpl->tpl_vars['n']->value['text']));?>

            <form method=post>
                <input type=hidden name=a value=user_notices>
                <input type=hidden name=action value=notified>
                <input type=hidden name=id value=<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['n']->value['id']);?>
>
                <input type=submit value="Dismiss">
            </form>
        <?php
$_smarty_tpl->tpl_vars['n'] = $foreach_n_Sav;
}
?>
    </ul>
<?php }?>

<h2 class="capTitle">My Account</h2>
<div class="accountBl">
    <div class="linksBl" id="Referral offers">
        <div class="item">
            <div class="pic" style="background-image: url(img/bllinkx.png)"></div>
            <span class="tit">Your Referral Link:</span>
            <a href="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);
echo smarty_modifier_myescape(encurl("?ref=".((string)$_smarty_tpl->tpl_vars['userinfo']->value['username'])));?>
" class="link"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);
echo smarty_modifier_myescape(encurl("?ref=".((string)$_smarty_tpl->tpl_vars['userinfo']->value['username'])));?>
</a>
        </div>
        <div class="item">
            <div class="pic" style="background-image: url(img/bllinka.png)"></div>
            <?php if ($_smarty_tpl->tpl_vars['referral']->value['email'] != '') {?>
                <span class="tit">Your Referral : <span class="name"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['referral']->value['name']);?>
</span></span>
                <a href="mailto:<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['referral']->value['email']);?>
" class="link"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['referral']->value['email']);?>
</a>
            <?php } else { ?>
                <span class="tit">Your Referral: <span class="name">---</span></span>
                <a class="link">---</a>
            <?php }?>
        </div>
    </div>
    <div class="statBl">
        <div class="left">
            <span class="tit">Investment Statistics:</span>
            <div class="list">
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">Last deposit:</span>
                    <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape((($tmp = @$_smarty_tpl->tpl_vars['last_deposit']->value)===null||$tmp==='' ? "n/a" : $tmp));?>
</span>
                </div>
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">Active deposits:</span>
                    <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ab_formated']->value['active_deposit']);?>
</span>
                </div>
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">Total deposits:</span>
                    <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ab_formated']->value['deposit']);?>
</span>
                </div>
            </div>
        </div>
        <div class="right">
            <span class="tit">Statistic Withdrawals:</span>
            <div class="list">
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">Earned toral:</span>
                    <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ab_formated']->value['earning']);?>
</span>
                </div>
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">pending withdrawals:</span>
                    <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ab_formated']->value['withdraw_pending']);?>
</span>
                </div>
                <div class="item">
                    <span class="iconBl icon-low-price"></span>
                    <span class="name">Total withdrawals:</span>
                    <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ab_formated']->value['withdrawal']);?>
</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo '<script'; ?>
>
   $.ajax({
      url: "?a=referals",
      context: document.body
   }).done(function(data) {      
      $('#referral').html($(data).find('#referral').html());            
   });
<?php echo '</script'; ?>
>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>