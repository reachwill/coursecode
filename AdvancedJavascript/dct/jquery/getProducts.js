//set dataURL var to data file
var dataURL = 'HTML5CSS3Start/products.txt';

//set table var to target table in HTML document
var table = $('.productsTable tbody');

$(document).ready(function(){
	
	
	//go get the JSON data using AJAX
	$.ajax({
		url:dataURL,
		type:'get',
		dataType:'json',
		success: function(data){
			//alert(data.products[0].desc)
			displayData(data)
		},
		error:function(message){
			//alert(message)
		}
	})

})

function displayData(data){
	table.html('');
	var numProducts = data.products.length;
	for(var i=0;i<numProducts;i++){
		var desc = data.products[i].desc;
		var name = data.products[i].name;
		var cost = data.products[i].cost;
		var htmlStr = '<tr data-prodCost='+cost+'>';
		htmlStr += '<td>'+name+'</td>';
		htmlStr += '<td>'+desc+'</td>';
		htmlStr += '<td>'+cost+'</td>';	
		htmlStr += '</tr>';
		table.append(htmlStr);
	}
	
	addTableFilter($('.productsTable'));
	
		
}