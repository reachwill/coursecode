
<?php
//include 'get-files-in-dir.php';

//$filelist = new FileList('images');
//$filelist->listFolderFiles('images');

function listFolderFiles($dir){
    $ffs = scandir($dir);
    echo '<ol>';
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
            echo '<li><a href="'.$dir.'/'.$ff.'">'.$ff.'</a>';
            if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
            echo '</li>';
        }
    }
    echo '</ol>';
}

listFolderFiles('images');



/*$dir = new RecursiveDirectoryIterator('images',
    FilesystemIterator::SKIP_DOTS);

// Flatten the recursive iterator, folders come before their files
$it  = new RecursiveIteratorIterator($dir,
    RecursiveIteratorIterator::SELF_FIRST);

// Maximum depth is 1 level deeper than the base folder
$it->setMaxDepth(1);

// Basic loop displaying different messages based on file or folder
echo '<ul>';
foreach ($it as $fileinfo) {
    if ($fileinfo->isDir()) {
        //printf("Folder - %s\n", $fileinfo->getFilename());
		echo '<li>'.$fileinfo->getFilename().'</li>';
    } elseif ($fileinfo->isFile()) {
        //printf("File From %s - %s\n", $it->getSubPath(), $fileinfo->getFilename());
		echo '<li>'.$it->getSubPath().$fileinfo->getFilename().'</li>';
    }
}
echo '</ul>';*/

?>



