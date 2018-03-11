
var edgel = {};
edgel.communicator = {};
edgel.communicator.getData = function(dataUrl,callback){
    $.ajax({
        url:dataUrl,
        type:'get',
        dataType:'json',
        success:function(returnedData){
            callback(returnedData);
        },
        error:function(http,message,status){
            console.log(message);
        }
    });
};




edgel.view = {}
edgel.view.renderMessageA = function(data){
    document.getElementById("title").innerHTML = data["title"]; 
    var source   = document.getElementById('text-template').innerHTML;
    var template = Handlebars.compile(source);
    var html    = template(data);
    document.getElementById("text").innerHTML = html;
};


edgel.view.renderCars = function(data){ 
    var source   = document.getElementById('carsTable-template').innerHTML;
    var template = Handlebars.compile(source);
    var html    = template(data);   
    $('#carsTable tbody').html(html);  
};




edgel.communicator.getData('../data.json', edgel.view.renderMessageA);

edgel.communicator.getData('../../data.json', edgel.view.renderCars);





 
//edgel.communicator.getData('../data.json', function(data) {
//    document.getElementById("title").innerHTML = data["title"];
// 
//    var source   = document.getElementById('text-template').innerHTML;
//    var template = Handlebars.compile(source);
//    var html    = template(data);
// 
//    document.getElementById("text").innerHTML = html;
//});