<?php /* Smarty version 3.1.27, created on 2021-11-15 15:57:37
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/footer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:27671366461925941304715_83637363%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '703a5524404697036edf0a648f79871aba750b9f' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/footer.tpl',
      1 => 1632558378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27671366461925941304715_83637363',
  'variables' => 
  array (
    'userinfo' => 0,
    'account_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_61925941341eb5_15269886',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_61925941341eb5_15269886')) {
function content_61925941341eb5_15269886 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '27671366461925941304715_83637363';
$_smarty_tpl->tpl_vars['account_page'] = new Smarty_Variable(0, null, 0);?>
<?php if ($_GET['a'] == 'account' || $_GET['a'] == 'deposit_list' || $_GET['a'] == 'deposit' || $_GET['a'] == 'withdraw' || $_GET['a'] == 'earnings' || $_GET['a'] == 'referals' || $_GET['a'] == 'referallinks' || $_GET['a'] == 'edit_account' || $_GET['a'] == 'security' || $_GET['a'] == 'deposit_history' || $_GET['a'] == 'withdraw_history' || $_GET['a'] == 'apply_representative' || $_GET['a'] == 'tell_friend' || $_GET['a'] == 'history') {?>
    <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['id']) {
$_smarty_tpl->tpl_vars['account_page'] = new Smarty_Variable(1, null, 0);
}?>
<?php }?>
<?php if (!$_smarty_tpl->tpl_vars['account_page']->value) {?>
            <div class="paymentBl ">
                <div class="container">
                    <div class="list">
                        <div class="item" style="background-image: url(img/pay1.png)"></div>
                        <div class="item" style="background-image: url(img/pay2.png)"></div>
                        <div class="item" style="background-image: url(img/pay3.png)"></div>
                        <div class="item" style="background-image: url(img/pay4.png)"></div>
                        <div class="item" style="background-image: url(img/pay5.png)"></div>
                        <div class="item" style="background-image: url(img/pay6.png)"></div>
                        <div class="item" style="background-image: url(img/pay7.png)"></div>
                    </div>
                </div>
            </div>
            <footer class="">
                <div class="container">
                    <div class="in">
                        <div class="left">
                            <div class="logo invisLink">
                                <a href="<?php echo smarty_modifier_myescape(encurl("?a=home"));?>
"></a>
                                <img src="img/logo.png" alt="">
                                <span class="txt">PAYDEL</span>
                            </div>
                            <div class="copyTxt"><p>Copyright &#64; Company LTD</p></div>
                        </div>
                        <div class="right">
                            <div class="listFot">
                                <div class="col">
                                    <span class="tit">OUR ADDRESS:</span>
                                    <p class="adress">22, Stephenson Way, London,<br/>NW1 2HD, UNITED KINGDOM</p>
                                </div>
                                <div class="col">
                                    <span class="tit">company number:</span>
                                    <span class="numer">13596322</span>
                                    <a href="https://find-and-update.company-information.service.gov.uk/company/13596322" target="_blank" class="link">check certificate</a>
                                </div>
                                <div class="col">
                                    <span class="tit">Contact us:</span>
                                    <span class="phone">Phone:<a href="#">+(44) 208-089-5882</a></span>
                                    <span class="email">E-mail:<a href="mailto:admin@paydel.finance" class="link">admin@paydel.finance</a></span>
                                </div>
                                <div class="col">
                                    <span class="tit">follow us:</span>
                                    <?php echo $_smarty_tpl->getSubTemplate ("block.soc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('class'=>"soc"), 0);
?>

                                </div>
                            </div>
                            <div class="menuFut">
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
                        </div>
                    </div>
                </div>
                <div class="blickBl"></div>
            </footer>
<?php } else { ?>
                </div>
            </div>
            <div class="lkFooter">
            
                <div class="left">
                
                <div class="logo invisLink">
                                <a href="<?php echo smarty_modifier_myescape(encurl("?a=about"));?>
"></a>
                                <img src="img/logo.png" alt="">
                                <span class="txt">PAYDEL</span>
                 </div>
                 <div class="copyTxt">
                    <p>Copyright 2019 &#64; Company LTD</p>
                </div>
                </div>
                <div class="lkMenuFot">
                
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
                <?php echo $_smarty_tpl->getSubTemplate ("block.soc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('class'=>"soc"), 0);
?>

            </div>
        </div>

        <?php if ($_GET['a'] != 'account') {?>
            <?php echo '<script'; ?>
>
                $.ajax({
                    url: "?a=account",
                    context: document.body
                }).done(function(data) {            
                    $('#balance').html($(data).find('#balance').html());
                    $('#infodata').html($(data).find('#infodata').html());         
                });
            <?php echo '</script'; ?>
>
        <?php }?>
<?php }?>
    </section>
</body>
</html><?php }
}
?>