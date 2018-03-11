<?php
$title = 'Home Page';
$username = 'Will';
?>

<?php
include 'header.php';
?>

<style>
.folder{
	list-style:url(images/icons/folder_icon.png);	
}

.file{
	list-style:url(images/icons/icon_arrow.gif);
}

</style>


<?php
function listFilesInFolder($dir){
	$items = scandir($dir);
	echo '<ul>';
	foreach($items as $item){
		if($item != '.' && $item != '..'){
			
			if(is_dir($dir.'/'.$item)){
				$class='folder';
			}else{
				$class='file';
			}
			
			echo '<li class="'.$class.'"><a href="'.$dir.'/'.$item.'">'. $item .'</a>';
			
			if(is_dir($dir.'/'.$item)){
				listFilesInFolder($dir.'/'.$item);
				
			}
			echo '</li>';
		}
	}
	
	echo '</ul>';
}

listFilesInFolder('images');

?>


<script src="jqueryui/js/jquery-1.8.0.min.js"></script>
<script>
$(document).ready(function(e) {
    $('ul ul').hide();
	
	$('.folder a').click(function(e) {
		if($(this).parent().hasClass('folder')){
			e.preventDefault();//stop the browser doing what it has been programmed to do
			var list = $(this).parent().find('>ul');
			if(list.is(':visible')){
				list.fadeOut();	
			}else{
				list.fadeIn();	
			}
		}
    });
	
});
</script>



<?php
include 'footer.php';
?>





