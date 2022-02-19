<?php /* Smarty version 3.1.27, created on 2021-11-15 15:57:37
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:136501363361925941297fb6_89076157%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70bfe4edb1f4fcef377d4b0f8eb5bcd461b202b8' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/header.tpl',
      1 => 1636643652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136501363361925941297fb6_89076157',
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
  'unifunc' => 'content_619259412f5565_75687084',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619259412f5565_75687084')) {
function content_619259412f5565_75687084 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';
if (!is_callable('smarty_function_crypto')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/function.crypto.php';

$_smarty_tpl->properties['nocache_hash'] = '136501363361925941297fb6_89076157';
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
    <link rel="stylesheet" type="text/css"    
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
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
                            <ul>
    
                                <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=about"));?>
"<?php if ($_GET['a'] == 'about') {?> class="active"<?php }?>>About Us</a></li>
                                <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=invest"));?>
"<?php if ($_GET['a'] == 'invest') {?> class="active"<?php }?>>Investment plan</a></li>
                                <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=statistics"));?>
"<?php if ($_GET['a'] == 'statistics') {?> class="active"<?php }?>>Statistics</a></li>
                                <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=faq"));?>
"<?php if ($_GET['a'] == 'faq') {?> class="active"<?php }?>>FAQ</a></li>
                                <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=rules"));?>
"<?php if ($_GET['a'] == 'rules') {?> class="active"<?php }?>>Rules</a></li>
                                <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=rateus"));?>
"<?php if ($_GET['a'] == 'rateus') {?> class="active"<?php }?>>Rate Us</a></li>
                                <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=banners"));?>
"<?php if ($_GET['a'] == 'banners') {?> class="active"<?php }?>>Banners</a></li>
                                <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=support"));?>
"<?php if ($_GET['a'] == 'support') {?> class="active"<?php }?>>Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="loginLinks">
                            <ul>
                                <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['id']) {?>
                                    <li><a class="account-link" href="<?php echo smarty_modifier_myescape(encurl("?a=account"));?>
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
                    <div class="lineInfoTop">
                        <div class="timeBl">
                            <img src="https://img.icons8.com/officel/40/000000/clock.png"/>
                            <span id="date"></span>
                            <span id="time"></span>
                        </div>
                        <div class="supportBl">
                           <img src="https://img.icons8.com/color/48/000000/laptop-e-mail.png"/>
                            <span class="tit">support</span>
                            <a href="mailto:support@paydel.finance" class="link">support@paydel.finance</a>
                        </div>
                            <div class="socialBl">
                            <img src="https://img.icons8.com/color/48/000000/internet--v2.png"/>
                            <span class="tit">follow us</span>
                            <?php echo $_smarty_tpl->getSubTemplate ("block.soc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('class'=>''), 0);
?>

                        </div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['page']->value == 'home') {?>
                        <div class="grettingsMain wow slideInLeft">
                            <h1 class="cap">Cryptocurrency<br>Mining Today!</h1>
                            <span class="desr">Become a part of a promising and rapidly growing
investment mining company.</span>
                            <a href="<?php if ($_smarty_tpl->tpl_vars['userinfo']->value['id']) {
echo smarty_modifier_myescape(encurl("?a=account"));
} else {
echo smarty_modifier_myescape(encurl("?a=signup"));
}?>" class="btn">start mining</a>
                        </div>                        
                        <div class="lineCurrents wow slideInRight">
                            <?php echo smarty_function_crypto(array(),$_smarty_tpl);?>
                            
                        </div>
                    <?php } else { ?>
                        <div class="grettings">
                            <h1 class="cap"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['title']->value);?>
<br></h1>
                        </div>
                    <?php }?>
                    <button class="menuBtn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
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
        <style>
        body{
background-image:url('img/account-bg.jpg');
}
.logo .txt{
font-size:30px;
}
</style>
            <div class="lkPage">
                <div class="lkLineTop">
                    <div class="logo invisLink">
                        <a href="<?php echo smarty_modifier_myescape(encurl("?a=about"));?>
"></a>
                        <img src="img/logo.png" alt="">
                        <span class="txt">PAYDEL</span>
                    </div>
                    <div class="lkInfoUser">
                        <ul>
                            <li>
                            <img src="https://img.icons8.com/office/36/000000/person-male-skin-type-4.png"/>
                                <span class="tit">Username:</span>
                                <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['userinfo']->value['username']);?>
</span>
                            </li>
                            <li>
                               <img src="https://img.icons8.com/dusk/36/000000/calendar--v2.png"/>
                                <span class="tit">Last seen:</span>
                                <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['userinfo']->value['last_access_time']);?>
</span>
                            </li>
                            <li>
                                <img src="https://img.icons8.com/dusk/36/000000/server.png"/>
                                <span class="tit">With IP adress:</span>
                                <span class="val"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['userinfo']->value['last_access_ip']);?>
</span>
                            </li>
                            <li>
                               <img src="https://img.icons8.com/doodle/36/000000/coins--v1.png"/>
                                <span class="tit">Your balance:</span>
                                <b class="val" id="balance"><?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['currency_sign']->value);?>
 <?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['ab_formated']->value['total']);?>
</b>
                            </li>
                        </ul>
                    </div>
                    <div class="lineInfoTop">
                        <div class="timeBl">
                            <img src="https://img.icons8.com/officel/36/000000/clock.png"/>
                            <span id="date"></span>
                            <span id="time"></span>
                        </div>
                        <div class="supportBl">
                            <img src="https://img.icons8.com/color/36/000000/laptop-e-mail.png"/>
                            <span class="tit">support</span>
                            <a href="mailto:admin@paydel.finance" class="link">admin@paydel.finance</a>
                        </div>
                        <div class="socialBl">
                            <img src="https://img.icons8.com/color/36/000000/internet--v2.png"/>
                            <span class="tit">follow us</span>
                            <?php echo $_smarty_tpl->getSubTemplate ("block.soc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('class'=>''), 0);
?>

                        </div>
                    </div>
                    <button class="menuBtn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
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
                        <ul>
                            <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=account"));?>
"<?php if ($_GET['a'] == 'account') {?> class="active"<?php }?>><img src="https://img.icons8.com/color/40/000000/client-management.png"/>  </span>MY Account</a></li>
                            <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=deposit"));?>
"<?php if ($_GET['a'] == 'deposit') {?> class="active"<?php }?>><img src="https://img.icons8.com/color/40/000000/initiate-money-transfer.png"/>   </span>Make deposit</a></li>
                       <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=deposit_list"));?>
"<?php if ($_GET['a'] == 'deposit_list') {?> class="active"<?php }?>><img src="https://img.icons8.com/external-prettycons-lineal-color-prettycons/40/000000/external-bitcoin-crypto-and-currency-prettycons-lineal-color-prettycons-5.png"/>   </span>deposits</a></li>
                            <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=withdraw"));?>
"<?php if ($_GET['a'] == 'withdraw') {?> class="active"<?php }?>><img src="https://img.icons8.com/color/40/000000/request-money.png"/>   </span>withdrawal</a></li>
               <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=edit_account"));?>
"<?php if ($_GET['a'] == 'edit_account') {?> class="active"<?php }?>><img src="https://img.icons8.com/color/40/000000/job--v1.png"/>    </span>settings</a></li>
                            <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=security"));?>
"<?php if ($_GET['a'] == 'security') {?> class="active"<?php }?>><img src="https://img.icons8.com/color/40/000000/privacy.png"/> 
                              </span>security</a></li>                        
                            <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=earnings"));?>
"<?php if ($_GET['a'] == 'earnings') {?> class="active"<?php }?>><img src="https://img.icons8.com/color/40/000000/overtime.png"/>   </span>history</a></li>                                          <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=referals"));?>
"<?php if ($_GET['a'] == 'referals') {?> class="active"<?php }?>><img src="https://img.icons8.com/color/40/000000/commercial-development-management.png"/>    </span>referrals</a></li>
                            <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=referallinks"));?>
"<?php if ($_GET['a'] == 'referallinks') {?> class="active"<?php }?>><img src="https://img.icons8.com/color/40/000000/change.png"/>  </span>Refirrals    
  links</a></li>
                            <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=tell_friend"));?>
"<?php if ($_GET['a'] == 'tell_friend') {?> class="active"<?php }?>><img src="https://img.icons8.com/color/40/000000/commercial.png"/>   </span>Tell friend</a></li>
                            <li><a href="<?php echo smarty_modifier_myescape(encurl("?a=logout"));?>
"><img src="https://img.icons8.com/color/40/000000/door-sensor-alarmed.png"/>   </span>LOGOUT</a></li>
                        </ul>
                    </div>
                    <div class="lkRightContent">
        <?php }
}
}
?>