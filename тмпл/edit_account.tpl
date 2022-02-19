{include file="header.tpl"}

{literal}
    <script language=javascript>
        function IsNumeric(sText) {
        var ValidChars = "0123456789.";
        var IsNumber=true;
        var Char;
        if (sText == '') return false;
        for (i = 0; i < sText.length && IsNumber == true; i++) { 
            Char = sText.charAt(i); 
            if (ValidChars.indexOf(Char) == -1) {
            IsNumber = false;
            }
        }
        return IsNumber;
        }

        function checkform() {
        if (document.editform.fullname.value == '') {
            alert("Please type your full name!");
            document.editform.fullname.focus();
            return false;
        }
        {/literal}
        {if $settings.use_user_location == 1}
        {literal}
        if (document.editform.address.value == '') {
            alert("Please enter your address!");
            document.editform.address.focus();
            return false;
        }
        if (document.editform.city.value == '') {
            alert("Please enter your city!");
            document.editform.city.focus();
            return false;
        }
        if (document.editform.state.value == '') {
            alert("Please enter your state!");
            document.editform.state.focus();
            return false;
        }
        if (document.editform.zip.value == '') {
            alert("Please enter your ZIP!");
            document.editform.zip.focus();
            return false;
        }
        if (document.editform.country.options[document.editform.country.selectedIndex].text == '--SELECT--') {
            alert("Please choose your country!");
            document.editform.country.focus();
            return false;
        }
        {/literal}
        {/if}
        {literal}
        if (document.editform.password.value != document.editform.password2.value) {
            alert("Please check your password!");
            document.editform.fullname.focus();
            return false;
        }
        {/literal}
        {if $settings.use_transaction_code}
        {literal}
        if (document.editform.transaction_code.value != document.editform.transaction_code2.value) {
            alert("Please check your transaction code!");
            document.editform.transaction_code2.focus();
            return false;
        }
        {/literal}
        {/if}
        {literal}
        {/literal}
        {if $settings.usercanchangeemail == 1}
        {literal}
        if (document.editform.email.value == '') {
            alert("Please enter your e-mail address!");
            document.editform.email.focus();
            return false;
        }
        {/literal}
        {/if}
        {literal}

        for (i in document.editform.elements) {
            f = document.editform.elements[i];
            if (f.name && f.name.match(/^pay_account/)) {
            if (f.value == '') continue;
            var notice = f.getAttribute('data-validate-notice');
            var invalid = 0;
            if (f.getAttribute('data-validate') == 'regexp') {
                var re = new RegExp(f.getAttribute('data-validate-regexp'));
                if (!f.value.match(re)) {
                invalid = 1;
                }
            } else if (f.getAttribute('data-validate') == 'email') {
                var re = /^[^\@]+\@[^\@]+\.\w{2,4}$/;
                if (!f.value.match(re)) {
                invalid = 1;
                }
            }
            if (invalid) {
                alert('Invalid account format. Expected '+notice);
                f.focus();
                return false;
            }
            }
        }

        return true;
        }
    </script>
{/literal}

<h2 class="capTitle">Settings</h2>
<div class="settingsBl blBlueCircle" style="padding: 0;">
    <div class="tabs">        
        <div class="formaMessage">
            {if $frm.say eq 'changed'}
                Your account data has been updated successfully.<br><br>
            {/if}
            {if $errors}
                <ul class="errors">
                    {section name=e loop=$errors}
                        {if $errors[e] eq 'full_name'}
                            <li>Please enter your Full Name!
                        {/if}
                        {if $errors[e] eq 'address'}
                            <li>Please enter your address!
                        {/if}
                        {if $errors[e] eq 'city'}
                            <li>Please enter your city!
                        {/if}
                        {if $errors[e] eq 'state'}
                            <li>Please enter your state!
                        {/if}
                        {if $errors[e] eq 'zip'}
                            <li>Please enter your zip!
                        {/if}
                        {if $errors[e] eq 'country'}
                            <li>Please choose your country!
                        {/if}
                        {if $errors[e] eq 'username'}
                            <li>Please enter your username!
                        {/if}
                        {if $errors[e] eq 'password'}
                            <li>Please enter a password!
                        {/if}
                        {if $errors[e] eq 'password_confirm'} 
                            <li>Please check your password!
                        {/if}
                        {if $errors[e] eq 'password_too_small'}
                            <li>Password is too small, please enter at least {$settings.min_user_password_length} chars!
                        {/if}
                        {if $errors[e] eq 'transaction_code'}
                            <li>Please enter the Transaction Code! {/if} {if $errors[e] eq 'transaction_code_confirm'} 
                            <li>Please check your Transaction Code!
                        {/if}
                        {if $errors[e] eq 'transaction_code_too_small'}
                            <li>Transaction Code is too small, please enter at least {$settings.min_user_password_length} chars!
                        {/if}
                        {if $errors[e] eq 'wrong_current_password'}
                            <li>You entered wrong current password
                        {/if}
                        {if $errors[e] eq 'transaction_code_vs_password'}
                            <li>Transaction Code should be different then the Password! {/if} {if $errors[e] 
                            eq 'invalid_transaction_code'} 
                            <li>You have provided invalid Current Transaction Code!
                        {/if}
                        {if $errors[e] eq 'email'}
                            <li>Please enter your e-mail!
                        {/if}
                        {if $errors[e] eq 'turing_image'}
                            <li>Enter the verification code as it is shown in the corresponding box.
                        {/if}
                        {if $errors[e] eq 'tfa_code'} 
                            <li>Invalid 2FA code
                        {/if}
                        {if $errors[e] eq 'invalid_account_format'}
                            {foreach from=$account_errors item=err}
                                <li>{$err}
                            {/foreach}
                        {/if}
                    {/section}
                </ul>
            {/if}

            <form action="" method=post onsubmit="return checkform()" name=editform>
                <input type=hidden name=a value=edit_account>
                <input type=hidden name=action value=edit_account>
                <input type=hidden name=say value="">
                <div class="in">
                    <div class="lineInputs">
                        <label for="">username:</label>
                        <input type="text" value="{$userinfo.username}" disabled="" />
                    </div>
                    <div class="lineInputs">
                        <label for="">full name:</label>
                        <input type=text name=fullname value='{$userinfo.name|escape:"quotes"}'>
                    </div>
                    <div class="lineInputs">
                        <label for="">new password:</label>
                        <input type=password name=password value="">
                    </div>
                    <div class="lineInputs">
                        <label for="">e-mail:</label>
                        <input type=text name=email value='{$userinfo.email|escape:"quotes"}'{if $settings.usercanchangeemail != 1} disabled=""{/if}>
                    </div>
                    <div class="lineInputs">
                        <label for="">retype password:</label>
                        <input type=password name=password2 value="">
                    </div>
                    {foreach item=ps from=$pay_accounts}
                        <div class="lineInputs">
                            <label for="">{$ps.name} account:</label>
                            <input type=text name="pay_account[{$ps.id}]" value="{$frm.pay_account[$ps.id]|default:$ps.account|escape:html}" data-validate="{$ps.validate.func}" data-validate-{$ps.validate.func}="{$ps.validate[$ps.validate.func]}" data-validate-notice="{$ps.validate.notification|escape:html}">
                        </div>       
                    {/foreach}
                    {if $settings.use_transaction_code_edit_account == 1}
                        <div class="lineInputs">
                            <label for="">Current Transaction Code:</label>
                            <input type=password name=transaction_code_current value="">
                        </div>
                    {/if}
                    {if $settings.use_transaction_code}
                        {if $settings.use_transaction_code_edit_account != 1}
                            {if $userinfo.transaction_code != ''}
                                <div class="lineInputs">
                                    <label for="">Current Transaction Code:</label>
                                    <input type=password name=transaction_code_current value="">
                                </div>
                            {/if}
                        {/if}
                        <div class="lineInputs">
                            <label for="">New Transaction Code:</label>
                            <input type=password name="transaction_code" value="">
                        </div>
                        <div class="lineInputs">
                            <label for="">Retype Transaction Code:</label>
                            <input type=password name="transaction_code2" value="">
                        </div>
                    {/if}
                    {if $ti.check.edit_account}
                        <div class="lineInputs">
                            <label for="">Input image code: <img src="?a=show_validation_image&{$ti.session.name}={$ti.session.id}&rand={$ti.session.rand}"></label>
                            <input type=text name=validation_number>
                        </div>
                    {/if}
                    <div class="lineBtn">
                        <button type="submit" class="btn btnYellow">save settings</button>
                    </div>
                </div>
            </form>
        </div>        
    </div>
</div>

{include file="footer.tpl"}