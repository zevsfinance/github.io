<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{$settings.site_name}</title>
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

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/detect.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.selectric.min.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>
    <script type="text/javascript" src="js/clipboard.min.js"></script>
    <script type="text/javascript" src="js/jquery.knob.js"></script>
    <script type="text/javascript" src="js/clock.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</head>
{$account_page = 0}
{if $smarty.get.a=='account' || $smarty.get.a=='deposit_list' || $smarty.get.a=='deposit' || $smarty.get.a=='withdraw' || $smarty.get.a=='earnings' || $smarty.get.a=='referals' || $smarty.get.a=='referallinks' || $smarty.get.a=='edit_account' || $smarty.get.a=='security' || $smarty.get.a=='deposit_history' || $smarty.get.a=='withdraw_history' || $smarty.get.a=='apply_representative' || $smarty.get.a=='tell_friend' || $smarty.get.a=='history'}
    {if $userinfo.id}{$account_page = 1}{/if}
{/if}
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
        {if !$account_page}
            <header class="head{if $page=='home'}Main{else}Page{/if}">
                <div class="container">
                    <div class="lineTop">
                        <div class="logo invisLink">
                            <a href="{"?a=about"|encurl}"></a>
                            <img src="img/logo.png" alt="">
                            <span class="txt">PAYDEL</span>
                        </div>
                        <div class="menu">
                            </div>
                        <div class="loginLinks">
                            <ul>
                                {if $userinfo.id}
                                    <li><a href="{"?a=account"|encurl}">Account</a></li>
                                {else}
                                    <li><a href="{"?a=login"|encurl}">Sign In</a></li>
                                    <li><a href="{"?a=signup"|encurl}">Sign Up</a></li>                   
                                {/if}
                            </ul>
                        </div>
                    </div>
                    
                    {if $page=='home'}
                        <div style="margin-top:0;" class="grettingsMain wow slideInLeft">
                            <br>
                            <h1 class="cap">Cryptocurrency 
                           <br> Mining Today!<br>
                         <span class="desr"><br> Become a part of a promising and rapidly growing <br>investment mining company</span>
                            <a href="{if $userinfo.id}{"?a=account"|encurl}{else}{"?a=signup"|encurl}{/if}" class="btn">start mining</a>
                        </div>                        
                        
                    {else}
                        <div class="grettings">
                            <h1 class="cap">{$title}<br></h1>
                        </div>
                    {/if}
                    
                    {if $page=='home'}
                        <div class="circleMain"></div>
                        <div class="circleBig"></div>
                        <div class="blickBl"></div>
                        <div class="blickBlTwo"></div>
                    {/if}
                </div>
            </header>
            <div class="content">
        {else}
            <div class="lkPage">
                <div class="lkLineTop">
                    <div class="logo invisLink">
                        <a href="{"?a=home"|encurl}"></a>
                        <img src="img/logo.png" alt="">
                        <span class="txt">PAYDEL>
                    </div>
                    <div class="lkInfoUser">
                        <ul>
                            <li>
                                <span class="icon-profile-1"></span>
                                <span class="tit">Username:</span>
                                <span class="val">{$userinfo.username}</span>
                            </li>
                            <li>
                                <span class="icon-calendar-38"></span>
                                <span class="tit">Last seen:</span>
                                <span class="val">{$userinfo.last_access_time}</span>
                            </li>
                            <li>
                                <span class="icon-server-9"></span>
                                <span class="tit">With IP adress:</span>
                                <span class="val">{$userinfo.last_access_ip}</span>
                            </li>
                            <li>
                                <span class="icon-coins-12"></span>
                                <span class="tit">Your balance:</span>
                                <b class="val" id="balance">{$currency_sign} {$ab_formated.total}</b>
                            </li>
                        </ul>
                    </div>
                    </div>
                <div class="lkLineDep">
                    <div class="list" id="infodata">
                        {foreach $ps as $p}{if $p.status}                            
                            <div class="item">
                                <div class="pic" style="background-image: url(img/ps_s/{$p.id|lower}.png)"></div>    
                                <div class="col">
                                    <span class="tit">Balance</span>
                                    <span class="val">{$currency_sign} {$p.balance|default:0}</span>
                                </div>
                                <div class="col">
                                    <span class="tit">Pending</span>
                                    <span class="val">{if $p.pending_col > 0}{$currency_sign} {$p.pending_amount}{else}$ 0{/if}</span>
                                </div>                                
                            </div>                                              
                        {/if}{/foreach}                                                
                    </div>
                </div>
                <div class="lkContent">
                    <div class="lkMenu">
                        
                    </div>
                    <div class="lkRightContent">
        {/if}