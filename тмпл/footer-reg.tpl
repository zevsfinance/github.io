{$account_page = 0}
{if $smarty.get.a=='account' || $smarty.get.a=='deposit_list' || $smarty.get.a=='deposit' || $smarty.get.a=='withdraw' || $smarty.get.a=='earnings' || $smarty.get.a=='referals' || $smarty.get.a=='referallinks' || $smarty.get.a=='edit_account' || $smarty.get.a=='security' || $smarty.get.a=='deposit_history' || $smarty.get.a=='withdraw_history' || $smarty.get.a=='apply_representative' || $smarty.get.a=='tell_friend' || $smarty.get.a=='history'}
    {if $userinfo.id}{$account_page = 1}{/if}
{/if}
{if !$account_page}
            <div class="paymentBl {*wow fadeInDown*}">
                <div class="container">
                    <div class="list">
                        <div class="item" style="background-image: url(img/pay1.png)"></div>
                        <div class="item" style="background-image: url(img/pay2.png)"></div>
                        <div class="item" style="background-image: url(img/pay3.png)"></div>
                        <div class="item" style="background-image: url(img/pay4.png)"></div>
                        <div class="item" style="background-image: url(img/pay5.png)"></div>
                        <div class="item" style="background-image: url(img/pay6.png)"></div>
                        <div class="item" style="background-image: url(img/pay7.png)"></div>
                    </div>
                </div>
            </div>
            <footer class="{*wow fadeInDown*}">
                <div class="container">
                    <div class="in">
                        <div class="left">
                            <div class="logo invisLink">
                                <a href="{"?a=home"|encurl}"></a>
                                <img src="img/logo.png" alt="">
                                <span class="txt">PAYDEL</span>
                            </div>
                            <div class="copyTxt"><p>Copyright &#64; Company LTD</p></div>
                        </div>
                        <div class="right">
                            <div class="listFot">
                                <div class="col">
                                    <span class="tit">OUR ADDRESS:</span>
                                    <p class="adress">22, Stephenson Way, London,<br/>NW1 2HD, UNITED KINGDOM</p>
                                </div>
                                <div class="col">
                                    <span class="tit">company number:</span>
                                    <span class="numer">13596322</span>
                                    <a href="https://find-and-update.company-information.service.gov.uk/company/13596322" target="_blank" class="link">check certificate</a>
                                </div>
                                <div class="col">
                                    <span class="tit">Contact us:</span>
                                    <span class="phone">Phone:<a href="#">+(44) 208-089-5882</a></span>
                                    <span class="email">E-mail:<a href="mailto:admin@streambit.biz" class="link">admin@streambit.biz</a></span>
                                </div>
                                <div class="col">
                                    <span class="tit">follow us:</span>
                                    {include file="block.soc.tpl" class="soc"}
                                </div>
                            </div>
                            <div class="menuFut">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blickBl"></div>
            </footer>
{else}
                </div>
            </div>
            <div class="lkFooter">
                <div class="copyTxt">
                    <p>Copyright 2019 &#64; Company LTD</p>
                </div>
                <div class="lkMenuFot">
                    
                </div>
                
            </div>
        </div>

        {if $smarty.get.a!='account'}
            <script>
                $.ajax({
                    url: "?a=account",
                    context: document.body
                }).done(function(data) {            
                    $('#balance').html($(data).find('#balance').html());
                    $('#infodata').html($(data).find('#infodata').html());         
                });
            </script>
        {/if}
{/if}
    </section>
</body>
</html>