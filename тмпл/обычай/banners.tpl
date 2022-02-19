{include file="header.tpl" title="Banners"}
<style>
body{
background-image:url('img/banner-bg.jpg');
font-weight:700;
}
</style>
<div class="bannersBl">
    <div class="container">
        <div class="in">
            <div class="textBlock">
                <p>Use banners in advertising process of our program containing your referral link. It will allow you to use most effectively opportunities for advertising and promotion of our investment products and to get the additional earnings in the PAYDEL program.</p>
            </div>
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
                        <input type="text" value='<a href="{$settings.site_url}{"?ref=`$user.username`"|encurl}"><img src="{$settings.site_url}/ttr/125_en.gif" alt=""></a>' id="banLink1">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink1">COPY LINK</button>
                    </div>
                </div>
                <div class="tabsBody" id="tabs-2">
                    <div class="pictureBanners"><img src="ttr/160_en.gif" alt=""></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="{$settings.site_url}{"?ref=`$user.username`"|encurl}"><img src="{$settings.site_url}/ttr/160_en.gif" alt=""></a>' id="banLink2">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink2">COPY LINK</button>
                    </div>
                </div>
                <div class="tabsBody" id="tabs-3">
                    <div class="pictureBanners"><img src="ttr/300_en.gif" alt="" style="max-width: 100%;"></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="{$settings.site_url}{"?ref=`$user.username`"|encurl}"><img src="{$settings.site_url}/ttr/300_en.gif" alt=""></a>' id="banLink3">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink3">COPY LINK</button>
                    </div>
                </div>
                <div class="tabsBody" id="tabs-4">
                    <div class="pictureBanners"><img src="ttr/468_en.gif" alt="" style="max-width: 100%;"></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="{$settings.site_url}{"?ref=`$user.username`"|encurl}"><img src="{$settings.site_url}/ttr/468_en.gif" alt=""></a>' id="banLink4">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink4">COPY LINK</button>
                    </div>
                </div>
                <div class="tabsBody" id="tabs-5">
                    <div class="pictureBanners"><img src="ttr/728_en.gif" alt="" style="max-width: 100%;"></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="{$settings.site_url}{"?ref=`$user.username`"|encurl}"><img src="{$settings.site_url}/ttr/728_en.gif" alt=""></a>' id="banLink5">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink5">COPY LINK</button>
                    </div>
                </div>
                <div class="tabsBody" id="tabs-6">
                    <div class="pictureBanners"><img src="ttr/1200_en.gif" alt="" style="max-width: 100%;"></div>
                    <div class="copyLinkBl">
                        <input type="text" value='<a href="{$settings.site_url}{"?ref=`$user.username`"|encurl}"><img src="{$settings.site_url}/ttr/1200_en.gif" alt=""></a>' id="banLink6">
                        <button class="copyLink btn btnYellow" data-clipboard-target="#banLink6">COPY LINK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="circleBlue"></div>
    <div class="bitPicture"></div>
</div>

{include file="footer.tpl"}