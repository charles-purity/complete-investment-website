$(document).ready(function(){
	wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();



	calc( parseInt($("#Ultra").val()));
	//Calculator

	function calc(plan){	
		var money = parseFloat($("#money").val());

		switch (plan) {
		    case 1:
		        if(money >= 20 && money <= 3000){
					var profitDaily = money / 100 * 3;
					var profitTotal = money / 100 * 250;
					var profitNet = money / 100 * 150;
					var profitDaily = profitDaily.toFixed(2);
					var profitTotal = profitTotal.toFixed(2);
					var profitNet = profitNet.toFixed(2);
					
					$("#profitDaily").text("$" + profitDaily);
					$("#profitTotal").text("$" + profitTotal);
					$("#profitNet").text("$" + profitNet);
				//} else if(isNaN(money) == true) {
				}else{
					$("#profitDaily").text("Error!");
					$("#profitTotal").text("Error!");
					$("#profitNet").text("Error!");
				}
				break;
		    case 2:
		        if(money >= 3001 && money <= 10000){
					var profitDaily = money / 100 * 5;
					var profitTotal = money / 100 * 300;
					var profitNet = money / 100 * 200;
					var profitDaily = profitDaily.toFixed(2);
					var profitTotal = profitTotal.toFixed(2);
					var profitNet = profitNet.toFixed(2);
					
					$("#profitDaily").text("$" + profitDaily);
					$("#profitTotal").text("$" + profitTotal);
					$("#profitNet").text("$" + profitNet);
				//} else if(isNaN(money) == true) {
				}else{
					$("#profitDaily").text("Error!");
					$("#profitTotal").text("Error!");
					$("#profitNet").text("Error!");
				}
				break;
		    case 3:
		         if(money >= 10001 && money <= 100000){
					var profitDaily = money / 100 * 10;
					var profitTotal = money / 100 * 400;
					var profitNet = money / 100 * 300;
					var profitDaily = profitDaily.toFixed(2);
					var profitTotal = profitTotal.toFixed(2);
					var profitNet = profitNet.toFixed(2);
					
					$("#profitDaily").text("$" + profitDaily);
					$("#profitTotal").text("$" + profitTotal);
					$("#profitNet").text("$" + profitNet);
				//} else if(isNaN(money) == true) {
				}else{
					$("#profitDaily").text("Error!");
					$("#profitTotal").text("Error!");
					$("#profitNet").text("Error!");
				}
				break;
		}
	}
	$("#money").keyup(function(){
		calc( parseInt($("#Ultra").val()));
	});

	$("#Ultra").on('change', function() {
		calc(parseInt($(this).val()));
	})
	


});
