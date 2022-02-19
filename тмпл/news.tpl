{include file="header.tpl"}

<div class="rulesBl">
    <div class="container">
        <div class="wrapIn">
            {if $frm.id}
                {loaddata name="news_item" id=$frm.id var=new}

                <h2 class="capTitle">{$new.title}</h2>
                <div class="lastUpdate">
                    <span class="iconBl icon-calendar-38"></span>
                    <span class="tit">Date: </span>
                    <span class="date">{$new.date}</span>
                </div>
                <div class="textBlock">
                    <p>{$new.full_text}</p>
                </div>

            {else}

                {loaddata name="news" var=news page=$frm.p limit=20 pages_var=pages}

                {foreach from=$news item=n}
                    <h2 class="capTitle"><a href="?a=news&id={$n.id}">{$n.title}</a></h2>
                    <div class="lastUpdate">
                        <span class="iconBl icon-calendar-38"></span>
                        <span class="tit">Date: </span>
                        <span class="date">{$n.date}</span>
                    </div>
                    <div class="textBlock">
                        <p>{$n.full_text}</p>
                    </div>
                    <br/><br/><br/>
                {/foreach}            

            {/if}
            
        </div>
    </div>
    <div class="ball right"></div>
    <div class="ball left"></div>
    <div class="circleBlue"></div>
    <div class="bitPicture big"></div>
</div>

{include file="footer.tpl"}