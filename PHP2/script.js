$(document).ready(function(){
	
	$('#productsTable').hide();
	
	//instantiate the accordion
	$('#accordion').accordion({
		headerText:'h3',
		autoHeight:false,
	});
	
	
	
	//instantiate login dialog 
	$('#loginDialog').dialog({
		autoOpen:false,
		modal:true,
		
	});
	
	
	$('#insertBtn').click(function(){
		insertProduct();
	});
	
	
	
	$('#loginLink').click(function(){
		$('#loginDialog').dialog('open');
	});
	
	
	$('#search').keyup(function(){
		$('#productsTable').hide();
		
		var q = $('#search').val();
		
		$.ajax({
			url:'getProducts.php?q='+q,
			type:'GET',
			dataType:'json',
			error:function(){
				console.log('problemo');
			},
			success:function(data){
				console.log(data);
				displayData(data)
			}
			
		});
	});
	
	
});


function insertProduct(){
	$.ajax({
		type:'POST',
		url:'insertProduct.php',
		dataType:"json",
		data:{
			'productName':$('#prodName').val(),
			'productDescription':$('#prodDesc').val(),
			'MSRP':$('#prodCost').val(),
			'productCode':Math.round(Math.random()*4000)
		},
		error:function(err){
			console.log(err);	
		},
		success:function(data){
			console.log(data);
			//alert(data.message);
			$('#search').val($('#prodName').val());
		}
	});	
}





function displayData(data){
	$('#productsTable tbody,#productsTable thead').html('');
	
	//header row
$('<tr><th>Product Name</th><th>Description</th><th>Cost</th></tr>')
	.appendTo('#productsTable thead');
	
	//build the rows of actula product data
	$.each(data,function(index,value){
		$('<tr><td>'+data[index].productName+'</td><td>'+
		data[index].productDescription+'</td><td class="amount">'+
		Number(data[index].MSRP).toFixed(2)+'</td></tr>')
		.appendTo('#productsTable tbody');
	});
	$('#productsTable').fadeIn();
}