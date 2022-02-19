{include file="header-home.tpl" title="Sign In"}

{literal}
    <script language=javascript>
        function checkform() {
            if (document.mainform.username.value=='') {
                alert("Please type your username!");
                document.mainform.username.focus();
                return false;
            }
            if (document.mainform.password.value=='') {
                alert("Please type your password!");
                document.mainform.password.focus();
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
                {if $frm.say eq 'invalid_login'}
                    <ul class="errors">
                        <li>Your login or password or turing image code is wrong. Please check this information.</li>
                    </ul>
                {/if}
                <form method=post name=mainform onsubmit="return checkform()">
                    <input type=hidden name=a value='do_login'>
                    <input type=hidden name=follow value='{$frm.follow}'>
                    <input type=hidden name=follow_id value='{$frm.follow_id}'>
                    <div class="in">
                        <div class="lineInputs">
                            <label for="">Login<span class="imp">*</span>:</label>
                            <input type=text name=username value='{$frm.username|escape:"html"}' autofocus="autofocus">
                            <div class="chekBl">
                                <input type="checkbox" id="chk1" name="agree" value="1" class="checkBtn" {*if $frm.agree}checked{/if*} checked>
                                <label for="chk1">Remember</label>
                            </div>
                            <span class="icon-profile-1"></span>
                        </div>
                        <div class="lineInputs">
                            <label for="">password<span class="imp">*</span>:</label>
                            <input type=password name=password value=''>
                            <a href="{"?a=forgot_password"|encurl}" class="link">Forgot password?</a>
                            <span class="icon-padlock-27"></span>
                        </div>
                        {if $ti.check.login}
                            <div class="imageCodeBl">
                                <div class="imageCode"><img src="{"?a=show_validation_image&`$ti.session.name`=`$ti.session.id`&rand=`$ti.session.rand`"|encurl}"></div>
                                <input type=text name=validation_number>
                            </div>                            
                        {/if}     
                        
                        <button type="submit" class="btn btnYellow">login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ball right"></div>
</div>

{include file="footer-reg.tpl"}
