<?php /* Smarty version 3.1.27, created on 2021-11-15 12:27:12
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/custom/invest.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:171878693619227f012dd76_00444556%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec791b3a52f77fc2ef52a505adcf4ac92f012178' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/custom/invest.tpl',
      1 => 1633843428,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171878693619227f012dd76_00444556',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_619227f0137248_10517211',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619227f0137248_10517211')) {
function content_619227f0137248_10517211 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '171878693619227f012dd76_00444556';
$_smarty_tpl->tpl_vars["allow"] = new Smarty_Variable("all", null, 0);?>
<?php $_smarty_tpl->tpl_vars["meta_title"] = new Smarty_Variable("Investment Plans", null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Investment Plans"), 0);
?>

<style>
body{
background-image: url('img/invest-bg.jpg')
}
</style>
<div class="investPage">
    <div class="invesPlanBl">
        <div class="container">                            
            <?php echo $_smarty_tpl->getSubTemplate ("block.calc.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('page'=>"invest"), 0);
?>
            
        </div>
    </div>
    <div class="textInvestDesr">
        <div class="container">
            <div class="textBlock">
                <p>We are pleased to present you 9 regular investment plans with profit after just 30 days, 7days and 1 dey. These plans are an affordable and easy way to implement your plans, putting a minimum of effort into this. The entire amount of profit is accumulated and paid out together with the principal deposit after the end of the investment period. We have made a fairly low threshold to start earning, you can become an active company investor with only $10.</p>
                <p>To calculate your income please use our easy-to-use profit calculator that is placed above. Please, select the investment plan, enter the amount of investment and you will see your potential profit. You can also set different amounts and compare the results.</p>
                              
                
            </div>
        </div>
    </div>
    <div class="whyBl">
        <div class="ball"></div>
        <div class="container">
            <div class="in">
                <div class="affilateMain">
    <div class="container">
    
        <div class="in">
            <div class="bitAffilate"></div>
            
            <div class="top">
            
                <span class="pr">5%</span>
                <div class="textBlock ">
                    <h2 class="capTitle">Affiliate<br>Program</h2>
                    <p>Become part of a promising and fast growing company! Partnership with PAYDEL is first and foremost the ability to generate passive income. Partnership with PAYDEL is also an opportunity for everyone to build their affiliate network. Partners will receive even more income, while working as a team. With unlimited referrals, your earning potential is endless!</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>