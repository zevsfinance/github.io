{include file="header.tpl"}

<div class="loginBl">
    <div class="container">
        <div class="wrapIn">
            <div class="formaMessage" style="color: white;">            
                <h3>Your Deposit status:</h3>
                <br>
                {if $process eq 'yes' || $frm.m_status eq 'success'}
                    We have received your deposit. Thank you!
                {else}
                    We have not received your deposit. Please try again.
                {/if}
            </div>
        </div>
    </div>
    <div class="ball right"></div>
</div>

{include file="footer.tpl"}