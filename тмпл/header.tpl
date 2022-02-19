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
    <link rel="stylesheet" type="text/css"    
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
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
                            <ul>
    
                                <li><a href="{"?a=about"|encurl}"{if $smarty.get.a=='about'} class="active"{/if}>About Us</a></li>
                                <li><a href="{"?a=invest"|encurl}"{if $smarty.get.a=='invest'} class="active"{/if}>Investment plan</a></li>
                                <li><a href="{"?a=statistics"|encurl}"{if $smarty.get.a=='statistics'} class="active"{/if}>Statistics</a></li>
                                <li><a href="{"?a=faq"|encurl}"{if $smarty.get.a=='faq'} class="active"{/if}>FAQ</a></li>
                                <li><a href="{"?a=rules"|encurl}"{if $smarty.get.a=='rules'} class="active"{/if}>Rules</a></li>
                                <li><a href="{"?a=rateus"|encurl}"{if $smarty.get.a=='rateus'} class="active"{/if}>Rate Us</a></li>
                                <li><a href="{"?a=banners"|encurl}"{if $smarty.get.a=='banners'} class="active"{/if}>Banners</a></li>
                                <li><a href="{"?a=support"|encurl}"{if $smarty.get.a=='support'} class="active"{/if}>Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="loginLinks">
                            <ul>
                                {if $userinfo.id}
                                    <li><a class="account-link" href="{"?a=account"|encurl}">Account</a></li>
                                {else}
                                    <li><a href="{"?a=login"|encurl}">Sign In</a></li>
                                    <li><a href="{"?a=signup"|encurl}">Sign Up</a></li>                   
                                {/if}
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
                            {include file="block.soc.tpl" class=""}
                        </div>
                    </div>
                    {if $page=='home'}
                        <div class="grettingsMain wow slideInLeft">
                            <h1 class="cap">Cryptocurrency<br>Mining Today!</h1>
                            <span class="desr">Become a part of a promising and rapidly growing
investment mining company.</span>
                            <a href="{if $userinfo.id}{"?a=account"|encurl}{else}{"?a=signup"|encurl}{/if}" class="btn">start mining</a>
                        </div>                        
                        <div class="lineCurrents wow slideInRight">
                            {crypto}                            
                        </div>
                    {else}
                        <div class="grettings">
                            <h1 class="cap">{$title}<br></h1>
                        </div>
                    {/if}
                    <button class="menuBtn">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
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
                        <a href="{"?a=about"|encurl}"></a>
                        <img src="img/logo.png" alt="">
                        <span class="txt">PAYDEL</span>
                    </div>
                    <div class="lkInfoUser">
                        <ul>
                            <li>
                            <img src="https://img.icons8.com/office/36/000000/person-male-skin-type-4.png"/>
                                <span class="tit">Username:</span>
                                <span class="val">{$userinfo.username}</span>
                            </li>
                            <li>
                               <img src="https://img.icons8.com/dusk/36/000000/calendar--v2.png"/>
                                <span class="tit">Last seen:</span>
                                <span class="val">{$userinfo.last_access_time}</span>
                            </li>
                            <li>
                                <img src="https://img.icons8.com/dusk/36/000000/server.png"/>
                                <span class="tit">With IP adress:</span>
                                <span class="val">{$userinfo.last_access_ip}</span>
                            </li>
                            <li>
                               <img src="https://img.icons8.com/doodle/36/000000/coins--v1.png"/>
                                <span class="tit">Your balance:</span>
                                <b class="val" id="balance">{$currency_sign} {$ab_formated.total}</b>
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
                            {include file="block.soc.tpl" class=""}
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
                        <ul>
                            <li><a href="{"?a=account"|encurl}"{if $smarty.get.a=='account'} class="active"{/if}><img src="https://img.icons8.com/color/40/000000/client-management.png"/>  </span>MY Account</a></li>
                            <li><a href="{"?a=deposit"|encurl}"{if $smarty.get.a=='deposit'} class="active"{/if}><img src="https://img.icons8.com/color/40/000000/initiate-money-transfer.png"/>   </span>Make deposit</a></li>
                       <li><a href="{"?a=deposit_list"|encurl}"{if $smarty.get.a=='deposit_list'} class="active"{/if}><img src="https://img.icons8.com/external-prettycons-lineal-color-prettycons/40/000000/external-bitcoin-crypto-and-currency-prettycons-lineal-color-prettycons-5.png"/>   </span>deposits</a></li>
                            <li><a href="{"?a=withdraw"|encurl}"{if $smarty.get.a=='withdraw'} class="active"{/if}><img src="https://img.icons8.com/color/40/000000/request-money.png"/>   </span>withdrawal</a></li>
               <li><a href="{"?a=edit_account"|encurl}"{if $smarty.get.a=='edit_account'} class="active"{/if}><img src="https://img.icons8.com/color/40/000000/job--v1.png"/>    </span>settings</a></li>
                            <li><a href="{"?a=security"|encurl}"{if $smarty.get.a=='security'} class="active"{/if}><img src="https://img.icons8.com/color/40/000000/privacy.png"/> 
                              </span>security</a></li>                        
                            <li><a href="{"?a=earnings"|encurl}"{if $smarty.get.a=='earnings'} class="active"{/if}><img src="https://img.icons8.com/color/40/000000/overtime.png"/>   </span>history</a></li>                                          <li><a href="{"?a=referals"|encurl}"{if $smarty.get.a=='referals'} class="active"{/if}><img src="https://img.icons8.com/color/40/000000/commercial-development-management.png"/>    </span>referrals</a></li>
                            <li><a href="{"?a=referallinks"|encurl}"{if $smarty.get.a=='referallinks'} class="active"{/if}><img src="https://img.icons8.com/color/40/000000/change.png"/>  </span>Refirrals    
  links</a></li>
                            <li><a href="{"?a=tell_friend"|encurl}"{if $smarty.get.a=='tell_friend'} class="active"{/if}><img src="https://img.icons8.com/color/40/000000/commercial.png"/>   </span>Tell friend</a></li>
                            <li><a href="{"?a=logout"|encurl}"><img src="https://img.icons8.com/color/40/000000/door-sensor-alarmed.png"/>   </span>LOGOUT</a></li>
                        </ul>
                    </div>
                    <div class="lkRightContent">
        {/if}