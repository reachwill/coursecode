<style>
.file{
	list-style:url(images/icons/icon_arrow.gif);	
}

.folder{
	list-style:url(images/icons/folder_icon.png);	
}

</style>
<link rel="stylesheet" type="text/css" href="colorbox-master/example1/colorbox.css">

<?php
class Tree{
	
	private $dir = '';//variables in a class are referred to as class properties
	
	function __construct($dir){
		if($dir == ''){
			echo 'You forgot the param';
			exit();	
		}else{
            
            echo 'here';
        }
		//echo 'Tree object constructed and ready to display files and folders in ' .$dir;
		
		$this->listFilesInFolder($dir);	
	}
	
	private function listFilesInFolder($dir){
		$items = scandir($dir);
		echo '<ul>';
		foreach($items as $item){
			if($item != '.' && $item != '..'){
			
(is_dir($dir.'/'.$item)) ? $class = 'folder' : $class = 'file';
			
			echo '<li class="'.$class.'"><a href="'.$dir.'/'.$item.'">' . $item . '</a>';
			
			if(is_dir($dir.'/'.$item)){
				$this->listFilesInFolder($dir.'/'.$item);
			}
			
			echo '</li>';
			
			}
			
		}
		echo '</ul>';
	}
	
	private function getMimeType($item){
		return  mime_content_type($item);	
	}
}
?>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script type="text/javascript" src="colorbox-master/jquery.colorbox-min.js"></script>


<script>
$(document).ready(function(e) {
	
	
	
    $('ul ul').hide();
	$('.folder > a').click(function(e) {
        e.preventDefault();
		var list = $(this).parent().find('>ul');
		if(list.is(':visible')){
			list.fadeOut();	
		}else{
			list.fadeIn();	
		}
    });
	$(".file > a").colorbox({rel:'group1', width:"75%", height:"75%"})
});
</script>












