function updateTime() {
    var now = new Date();
    var hours = Utilities.formatNumber(now.getHours());
    var mins = Utilities.formatNumber(now.getMinutes());
    var secs = Utilities.formatNumber(now.getSeconds());
    document.getElementById('clock').innerHTML = hours + ':' + mins + ':' + secs;
}

setInterval(updateTime, 1000);
