<?php /* Smarty version 3.1.27, created on 2021-11-13 10:14:39
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/security.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1846382530618f65df7e1da5_92403549%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed84e2fe09d9f46b6fd4b9574bd1f209bca88482' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/security.tpl',
      1 => 1631282966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1846382530618f65df7e1da5_92403549',
  'variables' => 
  array (
    'security' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618f65df7f0d37_29330603',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618f65df7f0d37_29330603')) {
function content_618f65df7f0d37_29330603 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '1846382530618f65df7e1da5_92403549';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<h2 class="capTitle">Security</h2>
<div class="settingsBl blBlueCircle" style="padding: 0;">
    <div class="tabs">        
        <div class="formaMessage">        
            <form action="<?php echo smarty_modifier_myescape(encurl("?a=security"));?>
" method=post class="cfix">
                <input type=hidden name=a value="security">
                <input type=hidden name=action value="save">
                <div class="in">
                    <div class="left">
                        <div class="titListChek">Detect ip adress change sensitivity:</div>
                        <div class="chekBl">
                            <input id="chek1" type=radio name=ip value=disabled <?php if ($_smarty_tpl->tpl_vars['security']->value['detect_ip'] == 'disabled') {?>checked<?php }?>>
                            <label for="chek1">Disabled</label>
                        </div>
                        <div class="chekBl">
                            <input id="chek3" type=radio name=ip value=medium <?php if ($_smarty_tpl->tpl_vars['security']->value['detect_ip'] == 'medium') {?>checked<?php }?>>
                            <label for="chek3">Medium</label>
                        </div>
                        <div class="chekBl">
                            <input id="chek2" type=radio name=ip value=high <?php if ($_smarty_tpl->tpl_vars['security']->value['detect_ip'] == 'high') {?>checked<?php }?>>
                            <label for="chek2">High</label>
                        </div>
                        <div class="chekBl">
                            <input id="chek4" type=radio name=ip value=always <?php if ($_smarty_tpl->tpl_vars['security']->value['detect_ip'] == 'always') {?>checked<?php }?>>
                            <label for="chek4">Paranoic</label>
                        </div>
                    </div>
                    <div class="right">
                        <div class="titListChek">detect browsers chahge:</div>
                        <div class="chekBl">
                            <input id="chek5" type=radio name=browser value=disabled <?php if ($_smarty_tpl->tpl_vars['security']->value['detect_browser'] == 'disabled') {?>checked<?php }?>>
                            <label for="chek5">Disabled</label>
                        </div>
                        <div class="chekBl">
                            <input id="chek6" type=radio name=browser value=enabled <?php if ($_smarty_tpl->tpl_vars['security']->value['detect_browser'] == 'enabled') {?>checked<?php }?>>
                            <label for="chek6">Enabled</label>
                        </div>
                    </div>
                    <div class="lineBtn">
                        <button type="submit" class="btn btnYellow">save settings</button>
                    </div>
                </div>
            </form>
        </div>        
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>