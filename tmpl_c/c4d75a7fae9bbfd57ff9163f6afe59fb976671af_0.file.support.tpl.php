<?php /* Smarty version 3.1.27, created on 2021-11-14 21:09:33
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/support.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:591145352619150dd447fe2_27704114%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4d75a7fae9bbfd57ff9163f6afe59fb976671af' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/support.tpl',
      1 => 1636913368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '591145352619150dd447fe2_27704114',
  'variables' => 
  array (
    'userinfo' => 0,
    'say' => 0,
    'errors' => 0,
    'frm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_619150dd462b18_17412937',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_619150dd462b18_17412937')) {
function content_619150dd462b18_17412937 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '591145352619150dd447fe2_27704114';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Contact us"), 0);
?>

<style>
body{
background-image: url('img/contact-bg.jpg');
font-weight:900;
}
</style>
<?php echo '<script'; ?>
 language=javascript>
    <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['logged'] == 1) {?>
        
            function checkform() { 
                if (document.mainform.message.value == '') {
                alert("Please type your message!");
                document.mainform.message.focus();
                return false;
                }
                return true;
            }
            
            <?php } else { ?>
            
            function checkform() {
                if (document.mainform.name.value == '') {
                alert("Please type your full name!");
                document.mainform.name.focus();
                return false;
                }
                if (document.mainform.email.value == '') {
                alert("Please enter your e-mail address!");
                document.mainform.email.focus();
                return false;
                }
                if (document.mainform.message.value == '') {
                alert("Please type your message!");
                document.mainform.message.focus();
                return false;
                }
                return true;
            }
        
    <?php }?>
<?php echo '</script'; ?>
>

<div class="contactsBl">
    <div class="container">
        <div class="wrapIn">
            <div class="left">
                <div class="textBlock">
                    <h2 class="capTitle">Contact Information</h2>
                    <p>If you have any questions, please feel free to contact us. We will do our best to help you with any question. You can contact our customer service by various different means: either by filling our customer support form provided below, or by Email/Tel. Please don't hesitate to ask for any assistance you need. We will be pleased to be of help to you.</p>
                </div>
                <div class="info">
                    <ul class="infoList">
                      
                   </div>

                
            </div>
            <div class="right">
                <div class="formaMessage">
                    <span class="tit">Send Message</span>
                    <?php if ($_smarty_tpl->tpl_vars['say']->value == 'send') {?>
                        Message has been successfully sent. We will back to you in next 24 hours. Thank you.<br><br>
                    <?php } else { ?> 

                        <?php if ($_smarty_tpl->tpl_vars['errors']->value) {?>
                            <ul class="errors">
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value['turing_image'] == 1) {?>
                                    <li>Invalid turing image</li>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['errors']->value['invalid_email'] == 1) {?>
                                    <li>Invalid email address</li>
                                <?php }?>
                            </ul>
                        <?php }?>

                        <form method=post name=mainform onsubmit="return checkform()">
                            <input type=hidden name=a value=support>
                            <input type=hidden name=action value=send>
                            <div class="in">
                                <div class="lineInputs">
                                    <label for="">YOUR NAME<span class="imp">*</span>:</label>
                                    <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['logged']) {?>
                                        <input type="text" name="name" value="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['userinfo']->value['name']);?>
" disabled="">
                                    <?php } else { ?>
                                        <input type="text" name="name" value="<?php echo smarty_modifier_myescape(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['frm']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
">
                                    <?php }?>    
                                </div>
                                <div class="lineInputs">
                                    <label for="">E-MAIL<span class="imp">*</span>:</label>
                                    <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['logged']) {?>
                                        <input type="text" name="email" value="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['userinfo']->value['email']);?>
" disabled="">
                                    <?php } else { ?>
                                        <input type="text" name="email" value="<?php echo smarty_modifier_myescape(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['frm']->value['email'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
">
                                    <?php }?>   
                                </div>
                                <div class="lineInputs">
                                    <label for="">YOUR MESSAGE<span class="imp">*</span>:</label>
                                    <textarea name="message" placeholder="Message"><?php echo smarty_modifier_myescape(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['frm']->value['message'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
</textarea>
                                </div>
                                <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['validation_enabled'] == 1) {?>
                                    <div class="imageCodeBl">
                                        <label for="">INPUT IMAGE CODE<span class="imp">*</span>:</label>
                                        <div class="imageCode"><img src="<?php echo smarty_modifier_myescape(encurl("?a=show_validation_image&".((string)$_smarty_tpl->tpl_vars['userinfo']->value['session_name'])."=".((string)$_smarty_tpl->tpl_vars['userinfo']->value['session_id'])."&rand=".((string)$_smarty_tpl->tpl_vars['userinfo']->value['rand'])));?>
"></div>
                                        <input type="text" name="validation_number">
                                    </div>                                  
                                <?php }?>                                
                                <button type="submit" class="btn btnYellow">send message</button>
                            </div>
                        </form>                                             
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <div class="ball right"></div>
    <div class="circleBlue"></div>
    <div class="bitPicture"></div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>