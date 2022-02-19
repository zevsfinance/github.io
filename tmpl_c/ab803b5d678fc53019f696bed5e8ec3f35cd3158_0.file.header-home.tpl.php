<?php /* Smarty version 3.1.27, created on 2021-11-15 17:04:38
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/header-home.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2061255189619268f66259e2_50604186%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab803b5d678fc53019f696bed5e8ec3f35cd3158' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/header-home.tpl',
      1 => 1633706063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2061255189619268f66259e2_50604186',
  'variables' => 
  array (
    'settings' => 0,
    'userinfo' => 0,
    'account_page' => 0,
    'page' => 0,
    'title' => 0,
    'currency_sign' => 0,
    'ab_formated' => 0,
    'ps' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_619268f665b623_11786204',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619268f665b623_11786204')) {
function content_619268f665b623_11786204 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '2061255189619268f66259e2_50604186';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_name']);?>
</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" type="text/css" href="fonts/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="css/selectric.css" />
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />

    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/detect.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-ui.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.selectric.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/modal.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/clipboard.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.knob.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/clock.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/wow.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/script.js"><?php echo '</script'; ?>
>
</head>
<?php $_smarty_tpl->tpl_vars['account_page'] = new Smarty_Variable(0, null, 0);?>
<?php if ($_GET['a'] == 'account' || $_GET['a'] == 'deposit_list' || $_GET['a'] == 'deposit' || $_GET['a'] == 'withdraw' || $_GET['a'] == 'earnings' || $_GET['a'] == 'referals' || $_GET['a'] == 'referallinks' || $_GET['a'] == 'edit_account' || $_GET['a'] == 'security' || $_GET['a'] == 'deposit_history' || $_GET['a'] == 'withdraw_history' || $_GET['a'] == 'apply_representative' || $_GET['a'] == 'tell_friend' || $_GET['a'] == 'history') {?>
    <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['id']) {
$_smarty_tpl->tpl_vars['account_page'] = new Smarty_Variable(1, null, 0);
}?>
<?php }?>
<style>
body{
background-image: url(../img/head_bg_v_2.jpg) !important;
background-size: cover;
background-repeat: no-repeat;
background-position:center;
}
</style>
<body>
    <section class="wrapper">
        <?php if (!$_smarty_tpl->tpl_vars['account_page']->value) {?>
            <header class="head<?php if ($_smarty_tpl->tpl_vars['page']->value == 'home') {?>Main<?php } else { ?>Page<?php }?>">
                <div class="container">
                    <div class="lineTop">
                        <div class="logo invisLink">
                            <a href="<?php echo smarty_modifier_myescape(encurl("?a=about"));?>
"></a>
                            <img src="img/logo.png" alt="">
                            <span class="txt">PAYDEL</span>
                        </div>
                        <div class="menu">
                            </div>
                        <div class="loginLinks">
                            <ul>
                                <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['id']) {?>
                                    <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=account"));?>
">Account</a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=login"));?>
">Sign In</a></li>
                                    <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=signup"));?>
">Sign Up</a></li>                   
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    
                    <?php if ($_smarty_tpl->tpl_vars['page']->value == 'home') {?>
                        <div style="margin-top:0;" class="grettingsMain wow slideInLeft">
                            <br>
                            <h1 class="cap">Cryptocurrency 
                           <br> Mining Today!<br>
                         <span class="desr"><br> Become a part of a promising and rapidly growing <br>investment mining company</span>
                            <a href="<?php if ($_smarty_tpl->tpl_vars['userinfo']->value['id']) {
echo smarty_modifier_myescape(encurl("?a=account"));
} else {
echo smarty_modifier_myescape(encurl("?a=signup"));
}?>" class="btn">start mining</a>
                        </div>                        
                        
                    <?php } else { ?>
                        <div class="grettings">
                            <h1 class="cap"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['title']->value);?>
<br></h1>
                        </div>
                    <?php }?>
                    
                    <?php if ($_smarty_tpl->tpl_vars['page']->value == 'home') {?>
                        <div class="circleMain"></div>
                        <div class="circleBig"></div>
                        <div class="blickBl"></div>
                        <div class="blickBlTwo"></div>
                    <?php }?>
                </div>
            </header>
            <div class="content">
        <?php } else { ?>
            <div class="lkPage">
                <div class="lkLineTop">
                    <div class="logo invisLink">
                        <a href="<?php echo smarty_modifier_myescape(encurl("?a=home"));?>
"></a>
                        <img src="img/logo.png" alt="">
                        <span class="txt">PAYDEL>
                    </div>
                    <div class="lkInfoUser">
                        <ul>
                            <li>
                                <span class="icon-profile-1"></span>
                                <span class="tit">Username:</span>
                                <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['userinfo']->value['username']);?>
</span>
                            </li>
                            <li>
                                <span class="icon-calendar-38"></span>
                                <span class="tit">Last seen:</span>
                                <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['userinfo']->value['last_access_time']);?>
</span>
                            </li>
                            <li>
                                <span class="icon-server-9"></span>
                                <span class="tit">With IP adress:</span>
                                <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['userinfo']->value['last_access_ip']);?>
</span>
                            </li>
                            <li>
                                <span class="icon-coins-12"></span>
                                <span class="tit">Your balance:</span>
                                <b class="val" id="balance"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ab_formated']->value['total']);?>
</b>
                            </li>
                        </ul>
                    </div>
                    </div>
                <div class="lkLineDep">
                    <div class="list" id="infodata">
                        <?php
$_from = $_smarty_tpl->tpl_vars['ps']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['p']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
$foreach_p_Sav = $_smarty_tpl->tpl_vars['p'];
if ($_smarty_tpl->tpl_vars['p']->value['status']) {?>                            
                            <div class="item">
                                <div class="pic" style="background-image: url(img/ps_s/<?php echo smarty_modifier_myescape(mb_strtolower($_smarty_tpl->tpl_vars['p']->value['id'], 'UTF-8'));?>
.png)"></div>    
                                <div class="col">
                                    <span class="tit">Balance</span>
                                    <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape((($tmp = @$_smarty_tpl->tpl_vars['p']->value['balance'])===null||$tmp==='' ? 0 : $tmp));?>
</span>
                                </div>
                                <div class="col">
                                    <span class="tit">Pending</span>
                                    <span class="val"><?php if ($_smarty_tpl->tpl_vars['p']->value['pending_col'] > 0) {
echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['p']->value['pending_amount']);
} else { ?>$ 0<?php }?></span>
                                </div>                                
                            </div>                                              
                        <?php }
$_smarty_tpl->tpl_vars['p'] = $foreach_p_Sav;
}
?>                                                
                    </div>
                </div>
                <div class="lkContent">
                    <div class="lkMenu">
                        
                    </div>
                    <div class="lkRightContent">
        <?php }
}
}
?>