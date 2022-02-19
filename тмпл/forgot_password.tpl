{include file="header.tpl" title="Forgot password"}

{literal}
    <script language=javascript>
        function checkform() {
            if (document.forgotform.email.value == '') {
                alert("Please type your username or email!");
                document.forgotform.email.focus();
                return false;
            }
            return true;
        }
    </script>
{/literal}

<div class="loginBl">
    <div class="container">
        <div class="wrapIn">
            <div class="formaMessage">
                {if $errors.turing_image}
                    <ul class="errors">
                        <li>Invalid turing image</li>
                    </ul>
                {/if}

                {if $found_records == 2}
                    <ul class="errors">
                        <li>Your accound was found. Please check your e-mail address and follow confirm URL to reset your password.</li>
                    </ul>
                {else}
                    {if $found_records == 0}
                        <ul class="errors">
                            <li> No accounts found for provided info.</li>
                        </ul>
                    {elseif $found_records == 1}
                        <ul class="errors">
                            <li>Request was confirmed. Login and password was sent to your email address.</li>
                        </ul>
                    {/if}

                    <form method=post name=forgotform onsubmit="return checkform();">
                        <input type=hidden name=a value="forgot_password">
                        <input type=hidden name=action value="forgot_password">
                        <div class="in">
                            <div class="lineInputs" style="width: 100% !important;">
                                <label for="">Type your username or e-mail<span class="imp">*</span>:</label>
                                 <input type=text name='email' value="{$frm.email|escape:htmlall}">                          
                                <span class="icon-profile-1"></span>
                            </div>
                            {if $ti.check.forgot_password}
                                <div class="imageCodeBl">
                                    <div class="imageCode"><img src="{"?a=show_validation_image&`$ti.session.name`=`$ti.session.id`&rand=`$ti.session.rand`"|encurl}"></div>
                                    <input type=text name=validation_number>
                                </div>                            
                            {/if}     
                            
                            <button type="submit" class="btn btnYellow">Forgot</button>
                        </div>
                    </form>                    
                {/if}
                
            </div>
        </div>
    </div>
    <div class="ball right"></div>
</div>

{include file="footer.tpl"}
