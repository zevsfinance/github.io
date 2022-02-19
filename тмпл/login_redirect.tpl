{include file="header.tpl" title="Welcome!"}
<META HTTP-EQUIV=Refresh CONTENT="0; URL={"?a=account"|encurl}">

<div class="loginBl">
    <div class="container">
        <div class="wrapIn">
            <div class="formaMessage" style="color: white;">            
                Hello {$userinfo.username}. You are redirecting to your  <a href=?a=account>account</a> now.
            </div>
        </div>
    </div>
    <div class="ball right"></div>
</div>

{include file="footer.tpl"}