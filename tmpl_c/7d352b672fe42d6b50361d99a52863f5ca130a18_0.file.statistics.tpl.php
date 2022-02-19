<?php /* Smarty version 3.1.27, created on 2021-11-14 20:41:26
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/custom/statistics.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:116641262461914a46634093_83836075%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d352b672fe42d6b50361d99a52863f5ca130a18' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/custom/statistics.tpl',
      1 => 1633464769,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116641262461914a46634093_83836075',
  'variables' => 
  array (
    'currency_sign' => 0,
    'settings' => 0,
    'stat_last_deposit' => 0,
    'stat_last_withdrawal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_61914a46649b96_60130624',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_61914a46649b96_60130624')) {
function content_61914a46649b96_60130624 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '116641262461914a46634093_83836075';
$_smarty_tpl->tpl_vars["meta_title"] = new Smarty_Variable("Statistics", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Statistics"), 0);
?>

<style>
body{
background-image: url('img/statistics-bg.jpg');
}
</style>
<div class="affilateMain">
    <div class="container">
        <div style="padding-right: 346px;padding-left:0;" class="in">
            <div class="bitAffilate"></div>
   
            <div class="infoAffilate ">
                <div class="left">
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate1.png)"></div>
                        <span class="tit">TOTAL DEPOSIT</span>
                        <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['info_box_deposit_funds_generated']);?>
</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate2.png)"></div>
                        <span class="tit">TOTAL WITHDRAW</span>
                        <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['info_box_withdraw_funds_generated']);?>
</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate3.png)"></div>
                        <span class="tit">VISITORS ONLINE</span>
                        <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['info_box_visitor_online_generated']);?>
</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate4.png)"></div>
                        <span class="tit">RUNNING DAYS</span>
                        <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_days_online_generated']);?>
</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate5.png)"></div>
                        <span class="tit">MEMBERS ONLINe</span>
                        <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['show_info_box_members_online_generated']);?>
</span>
                    </div>
                </div>
                <div class="right">
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate6.png)"></div>
                        <span class="tit">TOTAL ACCOUNTS</span>
                        <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['info_box_total_accounts_generated']);?>
</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate7.png)"></div>
                        <span class="tit">active ACCOUNTS</span>
                        <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['info_box_total_active_accounts_generated']);?>
</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate8.png)"></div>
                        <span class="tit">LAST DEPOSIT</span>
                        <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape(number_format($_smarty_tpl->tpl_vars['stat_last_deposit']->value['amount'],2));?>
</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate9.png)"></div>
                        <span class="tit">LAST WITHDRAW</span>
                        <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape(number_format($_smarty_tpl->tpl_vars['stat_last_withdrawal']->value['amount'],2));?>
</span>
                    </div>
                    <div class="item">
                        <div class="iconBl" style="background-image: url(img/ic-affilate0.png)"></div>
                        <span class="tit">new users</span>
                        <span class="val"><?php if ($_smarty_tpl->tpl_vars['settings']->value['show_info_box_newest_member_generated']) {
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['show_info_box_newest_member_generated']);
} else { ?>N/A<?php }?></span>
                    </div>
                </div>
                <div class="logoAffilate"></div>
            </div>
        </div>
    </div>
</div>

<div class="lastOper " style="margin-top: 50px;">
    <div class="container">
        <div class="in">
            <h2 class="capTitle">Last Operations</h2>
            <div class="list">                
                <?php echo $_smarty_tpl->getSubTemplate ("index_top_investors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                <?php echo $_smarty_tpl->getSubTemplate ("index_last_deposits.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

                <?php echo $_smarty_tpl->getSubTemplate ("index_last_withdrawals.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
                
            </div>
            
            <div class="pic_bit"></div>
        </div>
        <div class="bigFon"></div>
        <div class="circleBig"></div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>