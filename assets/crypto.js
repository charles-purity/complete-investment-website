//// Get the CryptoCurrency Information from the API
jQuery.ajax({
	url: "https://min-api.cryptocompare.com/data/pricemultifull",
	data: "fsyms=BTC,ETH,DASH,LTC,XRP,XMR,BCH,XLM&tsyms=USD",
	dataType : 'json',
}).done(function(data) 
{
    // console.log( "BTC : " + data.RAW.BTC.USD.CHANGEPCTDAY + ", ETH : " + data.RAW.ETH.USD.CHANGEPCTDAY + ", DASH : " + data.RAW.DASH.USD.CHANGEPCTDAY + ", LTC : " + data.RAW.LTC.USD.CHANGEPCTDAY + ", XRP : " + data.RAW.XRP.USD.CHANGEPCTDAY );
    //	console.log( "BTC : " + parseFloat(data.RAW.BTC.USD.CHANGEPCTDAY).toFixed(2) + ", ETH : " + parseFloat(data.RAW.ETH.USD.CHANGEPCTDAY).toFixed(2) + ", DASH : " + parseFloat(data.RAW.DASH.USD.CHANGEPCTDAY).toFixed(2) + ", LTC : " + parseFloat(data.RAW.LTC.USD.CHANGEPCTDAY).toFixed(2) + ", XRP : " + parseFloat(data.RAW.XRP.USD.CHANGEPCTDAY).toFixed(2) );

	jQuery(".dashCoin").html('$' + data.RAW.DASH.USD.PRICE);
	jQuery(".ethCoin").html('$' + data.RAW.ETH.USD.PRICE);
	jQuery(".bitCoin").html('$' + data.RAW.BTC.USD.PRICE);
	jQuery(".liteCoin").html('$' + data.RAW.LTC.USD.PRICE);
	jQuery(".xrpCoin").html('$' + data.RAW.XRP.USD.PRICE);
	jQuery(".xmrCoin").html('$' + data.RAW.XMR.USD.PRICE);
	jQuery(".bchCoin").html('$' + data.RAW.BCH.USD.PRICE);
	jQuery(".xlmCoin").html('$' + data.RAW.XLM.USD.PRICE);

	var dash = parseFloat(data.RAW.DASH.USD.CHANGEPCTDAY).toFixed(2);
	var eth  = parseFloat(data.RAW.ETH.USD.CHANGEPCTDAY).toFixed(2);
	var btc = parseFloat(data.RAW.BTC.USD.CHANGEPCTDAY).toFixed(2);
	var usd  = parseFloat(data.RAW.LTC.USD.CHANGEPCTDAY).toFixed(2);
	var xrp = parseFloat(data.RAW.XRP.USD.CHANGEPCTDAY).toFixed(2);
	var xmr  = parseFloat(data.RAW.XMR.USD.CHANGEPCTDAY).toFixed(2);
	var bch  = parseFloat(data.RAW.BCH.USD.CHANGEPCTDAY).toFixed(2);
	var xlm  = parseFloat(data.RAW.XLM.USD.CHANGEPCTDAY).toFixed(2);

	if( dash >= 0 ) jQuery(".dashCoin_change").addClass("greenup"); else jQuery(".dashCoin_change").addClass("purpledown");
	if( eth >= 0 ) jQuery(".ethCoin_change").addClass("greenup"); else jQuery(".ethCoin_change").addClass("purpledown");
	if( btc >= 0 ) jQuery(".bitCoin_change").addClass("greenup"); else jQuery(".bitCoin_change").addClass("purpledown");
	if( usd >= 0 ) jQuery(".liteCoin_change").addClass("greenup"); else jQuery(".liteCoin_change").addClass("purpledown");
	if( xrp >= 0 ) jQuery(".xrpCoin_change").addClass("greenup"); else jQuery(".xrpCoin_change").addClass("purpledown");
	if( xmr >= 0 ) jQuery(".xmrCoin_change").addClass("greenup"); else jQuery(".xmrCoin_change").addClass("purpledown");
	if( bch >= 0 ) jQuery(".bchCoin_change").addClass("greenup"); else jQuery(".bchCoin_change").addClass("purpledown");
	if( xlm >= 0 ) jQuery(".xlmCoin_change").addClass("greenup"); else jQuery(".xlmCoin_change").addClass("purpledown");

	jQuery(".dashCoin_change").html( dash + "%");
	jQuery(".ethCoin_change").html( eth + "%");
	jQuery(".bitCoin_change").html( btc + "%");
	jQuery(".liteCoin_change").html( usd + "%");
	jQuery(".xrpCoin_change").html( xrp + "%");
	jQuery(".xmrCoin_change").html( xmr + "%");
	jQuery(".bchCoin_change").html( bch + "%");
	jQuery(".xlmCoin_change").html( bch + "%");

    // VOLUME INFORMATION
    jQuery(".dashCoin_volume").html('Volume $' + data.RAW.DASH.USD.VOLUME24HOUR.toFixed(2));
	jQuery(".ethCoin_volume").html('Volume $' + data.RAW.ETH.USD.VOLUME24HOUR.toFixed(2));
	jQuery(".bitCoin_volume").html('Volume $' + data.RAW.BTC.USD.VOLUME24HOUR.toFixed(2));
	jQuery(".liteCoin_volume").html('Volume $' + data.RAW.LTC.USD.VOLUME24HOUR.toFixed(2));
	jQuery(".xrpCoin_volume").html('Volume $' + data.RAW.XRP.USD.VOLUME24HOUR.toFixed(2));
	jQuery(".xmrCoin_volume").html('Volume $' + data.RAW.XMR.USD.VOLUME24HOUR.toFixed(2));
	jQuery(".bchCoin_volume").html('Volume $' + data.RAW.BCH.USD.VOLUME24HOUR.toFixed(2));
	jQuery(".xlmCoin_volume").html('Volume $' + data.RAW.XLM.USD.VOLUME24HOUR.toFixed(2));

});

// JavaScript Document
var listCountries = ['South Africa', 'USA', 'Germany', 'France', 'Italy', 'South Africa', 'Australia', 'South Africa', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'South Africa', 'South Africa', 'Venezuela', 'South Africa', 'Sweden', 'South Africa', 'South Africa', 'Italy', 'South Africa', 'United Kingdom', 'South Africa', 'Greece', 'Cuba', 'South Africa', 'Portugal', 'Austria', 'South Africa', 'Panama', 'South Africa', 'South Africa', 'Netherlands', 'Switzerland', 'Belgium', 'Israel', 'Cyprus'];
        var listPlans = ['$500','$1,500','$1,000','$10,000','$2,000','$3,000','$4,000', '$600', '$700', '$2,500'];
        var transarray = ['just <b>invested</b>', 'has <b>withdrawn</b>', 'is <b>trading with</b>'];
        interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
        var run = setInterval(request, interval);
    
        function request() {
            clearInterval(run);
            interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
            var country = listCountries[Math.floor(Math.random() * listCountries.length)];
            var transtype = transarray[Math.floor(Math.random() * transarray.length)];
            var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
            var msg = 'Someone from <b>' + country + '</b> ' + transtype + ' <a href="javascript:void(0);" onclick="javascript:void(0);">' + plan + '</a>';
            $(".mgm .txt").html(msg);
            $(".mgm").stop(true).fadeIn(300);
            window.setTimeout(function() {
                $(".mgm").stop(true).fadeOut(300);
            }, 10000);
            run = setInterval(request, interval);
        }
