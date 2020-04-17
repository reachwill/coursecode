var utilities = {
    generateArray: function(str,sort,delimiter){
        var cities = str.split(delimiter);
        if(sort == true){
            cities.sort();//predefined method of the Array class
        }
        return cities;
    },
    formatNum: function(num){
        if(num < 10){
            num = '0' + num;
        }
        return num;
    }
}