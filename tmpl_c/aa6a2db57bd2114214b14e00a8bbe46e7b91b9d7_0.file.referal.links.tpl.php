<?php /* Smarty version 3.1.27, created on 2021-11-13 10:46:47
         compiled from "/home/c/cs70150/fusion_paydel/public_html/tmpl/referal.links.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:931990478618f6d67070ad4_29940712%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa6a2db57bd2114214b14e00a8bbe46e7b91b9d7' => 
    array (
      0 => '/home/c/cs70150/fusion_paydel/public_html/tmpl/referal.links.tpl',
      1 => 1633553556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '931990478618f6d67070ad4_29940712',
  'variables' => 
  array (
    'settings' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_618f6d67087908_46829257',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_618f6d67087908_46829257')) {
function content_618f6d67087908_46829257 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_myescape')) require_once '/home/c/cs70150/fusion_paydel/public_html/inc/libs/smarty3/plugins/modifier.myescape.php';

$_smarty_tpl->properties['nocache_hash'] = '931990478618f6d67070ad4_29940712';
echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<h2 class="capTitle">Reffiral Link</h2>
<div class="adretingBl">
    <div class="refLink blBlueCircle">
        <div class="copyLinkBl">
            <span class="tit">your referral link:</span>
            <input type="text" value="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);
echo smarty_modifier_myescape(encurl("?ref=".((string)$_smarty_tpl->tpl_vars['user']->value['username'])));?>
" id="refLink">
            <button class="copyLink btn btnYellow" data-clipboard-target="#refLink">COPY LINK</button>
        </div>
    </div>
    <div class="bannersBl blBlueCircle">
        <div class="in">
            <div class="tabs">
                <ul class="listTabs">
                    <li><a href="#tabs-1" class="link">BANNER 125X125</a></li>
                    <li><a href="#tabs-2" class="link">BANNER 160X600</a></li>
                    <li><a href="#tabs-3" class="link">BANNER 300X600</a></li>
                    <li><a href="#tabs-4" class="link">BANNER 468X60</a></li>
                    <li><a href="#tabs-5" class="link">BANNER 728X90</a></li>
                    <li><a href="#tabs-6" class="link">BANNER 1200X150</a></li>
                </ul>
                <div class="tabsBody" id="tabs-1">
                    <div class="pictureBanners"><img src="ttr/125_en.gif" alt=""></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);
echo smarty_modifier_myescape(encurl("?ref=".((string)$_smarty_tpl->tpl_vars['user']->value['username'])));?>
"><img src="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);?>
ttr/125_en.gif" alt=""></a>' id="banLink1">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink1">COPY LINK</button>
                    </div>
                </div>
                <div class="tabsBody" id="tabs-2">
                    <div class="pictureBanners"><img src="ttr/160_en.gif" alt=""></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);
echo smarty_modifier_myescape(encurl("?ref=".((string)$_smarty_tpl->tpl_vars['user']->value['username'])));?>
"><img src="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);?>
ttr/160_en.gif" alt=""></a>' id="banLink2">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink2">COPY LINK</button>
                    </div>
                </div>
                <div class="tabsBody" id="tabs-3">
                    <div class="pictureBanners"><img src="ttr/300_en.gif" alt="" style="max-width: 100%;"></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);
echo smarty_modifier_myescape(encurl("?ref=".((string)$_smarty_tpl->tpl_vars['user']->value['username'])));?>
"><img src="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);?>
ttr/300_en.gif" alt=""></a>' id="banLink3">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink3">COPY LINK</button>
                    </div>
                </div>
                <div class="tabsBody" id="tabs-4">
                    <div class="pictureBanners"><img src="ttr/468_en.gif" alt="" style="max-width: 100%;"></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);
echo smarty_modifier_myescape(encurl("?ref=".((string)$_smarty_tpl->tpl_vars['user']->value['username'])));?>
"><img src="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);?>
ttr/468_en.gif" alt=""></a>' id="banLink4">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink4">COPY LINK</button>
                    </div>
                </div>
                <div class="tabsBody" id="tabs-5">
                    <div class="pictureBanners"><img src="ttr/728_en.gif" alt="" style="max-width: 100%;"></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);
echo smarty_modifier_myescape(encurl("?ref=".((string)$_smarty_tpl->tpl_vars['user']->value['username'])));?>
"><img src="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);?>
ttr/728_en.gif" alt=""></a>' id="banLink5">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink5">COPY LINK</button>
                    </div>
                </div>
                <div class="tabsBody" id="tabs-6">
                    <div class="pictureBanners"><img src="ttr/1200_en.gif" alt="" style="max-width: 100%;"></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);
echo smarty_modifier_myescape(encurl("?ref=".((string)$_smarty_tpl->tpl_vars['user']->value['username'])));?>
"><img src="<?php echo smarty_modifier_myescape($_smarty_tpl->tpl_vars['settings']->value['site_url']);?>
ttr/1200_en.gif" alt=""></a>' id="banLink6">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink6">COPY LINK</button>
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