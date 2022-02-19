{include file="header.tpl"}

<h2 class="capTitle">Tell friend</h2>
<div class="settingsBl blBlueCircle" style="padding: 0;">
    <div class="tabs">        
        <div class="formaMessage">
            {if $say eq 'invite_sent'}
                Your invite/invites has been successfully sent.<br><br>
            {/if}
            <form action="index.php" method=post >
                <input type=hidden name=a value=tell_friend>
                <input type=hidden name=action value=tell_friend>
                <div class="in">
                    <div class="lineInputs">
                        <label for="">Name 1:</label>
                        <input type=text name=name1>
                    </div>
                    <div class="lineInputs">
                        <label for="">Email 1:</label>
                        <input type=text name=email1>
                    </div>
                    <div class="lineInputs">
                        <label for="">Name 2:</label>
                        <input type=text name=name2>
                    </div>
                    <div class="lineInputs">
                        <label for="">Email 2:</label>
                        <input type=text name=email2>
                    </div>
                    <div class="lineInputs">
                        <label for="">Name 3:</label>
                        <input type=text name=name3>
                    </div>
                    <div class="lineInputs">
                        <label for="">Email 4:</label>
                        <input type=text name=email4>
                    </div>               
                    <div class="lineBtn">
                        <button type="submit" class="btn btnYellow">Send</button>
                    </div>
                </div>
            </form>
        </div>        
    </div>
</div>

{include file="footer.tpl"}