<?php /* Smarty version 3.1.27, created on 2021-11-15 13:24:56
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/footer-reg.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:16107673736192357874e957_42419612%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d59a36b8fd86a5ce64c280c4f2a488eaed76ae4' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/footer-reg.tpl',
      1 => 1632418137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16107673736192357874e957_42419612',
  'variables' => 
  array (
    'userinfo' => 0,
    'account_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_619235787659a9_54055081',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619235787659a9_54055081')) {
function content_619235787659a9_54055081 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '16107673736192357874e957_42419612';
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
                                    <span class="email">E-mail:<a href="mailto:admin@streambit.biz" class="link">admin@streambit.biz</a></span>
                                </div>
                                <div class="col">
                                    <span class="tit">follow us:</span>
                                    <?php echo $_smarty_tpl->getSubTemplate ("block.soc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('class'=>"soc"), 0);
?>

                                </div>
                            </div>
                            <div class="menuFut">
                               
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
                <div class="copyTxt">
                    <p>Copyright 2019 &#64; Company LTD</p>
                </div>
                <div class="lkMenuFot">
                    
                </div>
                
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