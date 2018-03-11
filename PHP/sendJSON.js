function saveClip() 
{
	var inVal = $('#inVal').val();
	var endVal = $('#endVal').val();
	var clipTitle = $('#clipTitle').val();
	var category = $('#categoriesSelect').val();
	var clipDescription = $('#clipDescription').val();
	var duration = Math.round(Number(endVal)-Number(inVal));
	$.ajax({
		type : 'POST',
		url : 'php/saveClip.php',
		dataType : 'json',
		data: {
			inVal : $('#inVal').val(),
			endVal : $('#endVal').val(),
			vidID : selectedVideoData.ytID,
			title : clipTitle,
			duration : duration,
			userID : 0,
			categoryID : category,
			description : clipDescription
		},
		success : function(data){
			//alert(data.msg);
			addClipToView(selectedVideoData.ytID,inVal,endVal,clipTitle,duration,category);//clip-manager.js
			clearEditFields();//player.js
			//confirm clip saved message
			
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			alert('error');
		}
	});

	return false;
}

function getClips() 
{
	$.ajax({
		type : 'POST',
		url : 'php/getClips.php',
		dataType : 'json',
		data: {
			userID:0,
		},
		success : function(data){
			//alert(JSON.stringify(data));
			displayClips(data);//clip-manager.js
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			alert('error');
		}
	});

	return false;
}

function addCategory(catTitle) 
{
	$.ajax({
		type : 'POST',
		url : 'php/addCategory.php',
		dataType : 'json',
		data: {
			userID:0,
			catTitle:catTitle
		},
		success : function(data){
			//alert(JSON.stringify(data));
			addCategoryToView(data);//clip-manager.js
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			alert(errorThrown);
		}
	});

	return false;
}

function getCategories() 
{
	$.ajax({
		type : 'POST',
		url : 'php/getCategories.php',
		dataType : 'json',
		data: {
			userID:0,
		},
		success : function(data){
			//alert(JSON.stringify(data));
			displayCategories(data);//clip-manager.js
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			alert('error');
		}
	});

	return false;
}

$(document).ready(function(){

});