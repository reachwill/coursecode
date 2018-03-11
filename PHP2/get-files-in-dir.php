<style>
.file{
	list-style-image:url(images/icons/icon_arrow.gif);
}

.folder{
	list-style-image:url(images/icons/folder_icon.png);
}

</style>



<?php
class FileList{
	
	function __construct($dir) {
		if($dir==''||$dir==undefined){
			 echo 'Error: expected $dir argument to declare folder to list';
		}else{
			$this->listFolderFiles($dir);	
		}
   	}
	
	private function listFolderFiles($dir){
		$ffs = scandir($dir);
		echo '<ul>';
		foreach($ffs as $ff){
			if($ff != '.' && $ff != '..'){
				//extract name
				$temp = explode( '.', $ff );
				//prepare appropriate class; file or folder
				($this->getMimeType($dir.'/'.$ff)=='directory') ? $class='folder' : $class='file';
				//write li a into page
				echo '<li class="'.$class.'"><a href="'.$dir.'/'.$ff.'" >'.$temp[0].'</a>';
				//if its a folder then recursive call to listFolderFiles
				if(is_dir($dir.'/'.$ff)) $this->listFolderFiles($dir.'/'.$ff);
				//close the li tag
				echo '</li>';
			}
		}
		echo '</ul>';
	}
	
	private function getMimeType($filename)
	{
		return $mimetype = mime_content_type($filename);
	}
	
	
}


?>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
$(document).ready(function(e) {
	$('ul ul').hide();
    $('.folder > a').on('click',function(e){
		e.preventDefault();
		var list = $(this).parent().find('>ul');
		if(list.is(':visible')){
			list.fadeOut();
		}else{
			list.fadeIn();	
		}
		//$(this).parent().find('ul').toggle();
	});
});
</script>
