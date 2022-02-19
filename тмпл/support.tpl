{include file="header.tpl" title="Contact us"}
<style>
body{
background-image: url('img/contact-bg.jpg');
font-weight:900;
}
</style>
<script language=javascript>
    {if $userinfo.logged == 1}
        {literal}
            function checkform() { 
                if (document.mainform.message.value == '') {
                alert("Please type your message!");
                document.mainform.message.focus();
                return false;
                }
                return true;
            }
            {/literal}
            {else}
            {literal}
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
        {/literal}
    {/if}
</script>

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

                {* <div class="register">
                    <div class="in">
                        <div class="pic" style="background-image: url(img/logoregister.png)"></div>
                        <span class="tit">Register company</span>
                        <span class="num">13596322</span>
                        <a href="http://wck2.companieshouse.gov.uk" target="_blank" class="link">check certificate</a>
                    </div>
                </div> *}
            </div>
            <div class="right">
                <div class="formaMessage">
                    <span class="tit">Send Message</span>
                    {if $say eq 'send'}
                        Message has been successfully sent. We will back to you in next 24 hours. Thank you.<br><br>
                    {else} 

                        {if $errors}
                            <ul class="errors">
                                {if $errors.turing_image == 1}
                                    <li>Invalid turing image</li>
                                {/if}
                                {if $errors.invalid_email == 1}
                                    <li>Invalid email address</li>
                                {/if}
                            </ul>
                        {/if}

                        <form method=post name=mainform onsubmit="return checkform()">
                            <input type=hidden name=a value=support>
                            <input type=hidden name=action value=send>
                            <div class="in">
                                <div class="lineInputs">
                                    <label for="">YOUR NAME<span class="imp">*</span>:</label>
                                    {if $userinfo.logged}
                                        <input type="text" name="name" value="{$userinfo.name}" disabled="">
                                    {else}
                                        <input type="text" name="name" value="{$frm.name|escape:htmlall}">
                                    {/if}    
                                </div>
                                <div class="lineInputs">
                                    <label for="">E-MAIL<span class="imp">*</span>:</label>
                                    {if $userinfo.logged}
                                        <input type="text" name="email" value="{$userinfo.email}" disabled="">
                                    {else}
                                        <input type="text" name="email" value="{$frm.email|escape:htmlall}">
                                    {/if}   
                                </div>
                                <div class="lineInputs">
                                    <label for="">YOUR MESSAGE<span class="imp">*</span>:</label>
                                    <textarea name="message" placeholder="Message">{$frm.message|escape:htmlall}</textarea>
                                </div>
                                {if $userinfo.validation_enabled == 1}
                                    <div class="imageCodeBl">
                                        <label for="">INPUT IMAGE CODE<span class="imp">*</span>:</label>
                                        <div class="imageCode"><img src="{"?a=show_validation_image&`$userinfo.session_name`=`$userinfo.session_id`&rand=`$userinfo.rand`"|encurl}"></div>
                                        <input type="text" name="validation_number">
                                    </div>                                  
                                {/if}                                
                                <button type="submit" class="btn btnYellow">send message</button>
                            </div>
                        </form>                                             
                    {/if}
                </div>
            </div>
        </div>
    </div>
    <div class="ball right"></div>
    <div class="circleBlue"></div>
    <div class="bitPicture"></div>
</div>

{include file="footer.tpl"}