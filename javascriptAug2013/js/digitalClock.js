function formatNumber(num){
	var numStr = num;
	if(num < 10){
		numStr = '0' + num;	
	}
	return numStr;
}
//alert(formatNumber(2))
function updateTime(){
	var now = new Date();
	//console.log(now.getHours());
	var hours = formatNumber(now.getHours());
	var mins =formatNumber (now.getMinutes());
	var secs = formatNumber(now.getSeconds());
	var timeStr = hours + ':' + mins + ':' + secs;
	document.getElementById('clock').innerHTML = timeStr;
}

function init(){
	updateTime();
	setInterval(updateTime,1000);
}

window.onload = init;