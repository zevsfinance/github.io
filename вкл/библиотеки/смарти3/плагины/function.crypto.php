<?php

function smarty_function_crypto($params, $template) {
    $tick = file_get_contents('https://api.coinmarketcap.com/v2/ticker/?limit=40');
    //валюта Dogecoin на 19 позиции, поэтому используем ?limit=19
    $data = json_decode($tick, TRUE);
    $data = $data['data'];

    return '
        <ul>
            <li>
                <span class="iconBl" style="background-image: url(img/ic-cur1.png)"></span>
                <span class="val">'.round($data[1]['quotes']["USD"]['price'],2).'$</span>
                <span class="pr">('.round($data[1]['quotes']["USD"]['percent_change_24h'],2).'%)</span>
            </li>
            <li>
                <span class="iconBl" style="background-image: url(img/ic-cur2.png)"></span>
                <span class="val">'.round($data[1027]['quotes']["USD"]['price'],2).'$</span>
                <span class="pr">('.round($data[1027]['quotes']["USD"]['percent_change_24h'],2).'%)</span>
            </li>
            <li>
                <span class="iconBl" style="background-image: url(img/ic-cur3.png)"></span>
                <span class="val">'.round($data[2]['quotes']["USD"]['price'],2).'$</span>
                <span class="pr">('.round($data[2]['quotes']["USD"]['percent_change_24h'],2).'%)</span>
            </li>
            <li>
                <span class="iconBl" style="background-image: url(img/ic-cur4.png)"></span>
                <span class="val">'.round($data[1831]['quotes']["USD"]['price'],2).'$</span>
                <span class="pr">('.round($data[1831]['quotes']["USD"]['percent_change_24h'],2).'%)</span>
            </li>
            <li>
                <span class="iconBl" style="background-image: url(img/ic-cur5.png)"></span>
                <span class="val">'.round($data[74]['quotes']["USD"]['price'],6).'$</span>
                <span class="pr">('.round($data[74]['quotes']["USD"]['percent_change_24h'],6).'%)</span>
            </li>
        </ul>       
    ';
}
