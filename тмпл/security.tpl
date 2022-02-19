{include file="header.tpl"}

<h2 class="capTitle">Security</h2>
<div class="settingsBl blBlueCircle" style="padding: 0;">
    <div class="tabs">        
        <div class="formaMessage">        
            <form action="{"?a=security"|encurl}" method=post class="cfix">
                <input type=hidden name=a value="security">
                <input type=hidden name=action value="save">
                <div class="in">
                    <div class="left">
                        <div class="titListChek">Detect ip adress change sensitivity:</div>
                        <div class="chekBl">
                            <input id="chek1" type=radio name=ip value=disabled {if $security.detect_ip == 'disabled'}checked{/if}>
                            <label for="chek1">Disabled</label>
                        </div>
                        <div class="chekBl">
                            <input id="chek3" type=radio name=ip value=medium {if $security.detect_ip == 'medium'}checked{/if}>
                            <label for="chek3">Medium</label>
                        </div>
                        <div class="chekBl">
                            <input id="chek2" type=radio name=ip value=high {if $security.detect_ip == 'high'}checked{/if}>
                            <label for="chek2">High</label>
                        </div>
                        <div class="chekBl">
                            <input id="chek4" type=radio name=ip value=always {if $security.detect_ip == 'always'}checked{/if}>
                            <label for="chek4">Paranoic</label>
                        </div>
                    </div>
                    <div class="right">
                        <div class="titListChek">detect browsers chahge:</div>
                        <div class="chekBl">
                            <input id="chek5" type=radio name=browser value=disabled {if $security.detect_browser == 'disabled'}checked{/if}>
                            <label for="chek5">Disabled</label>
                        </div>
                        <div class="chekBl">
                            <input id="chek6" type=radio name=browser value=enabled {if $security.detect_browser == 'enabled'}checked{/if}>
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

{include file="footer.tpl"}