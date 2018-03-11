<style>
    .folder {
        list-style: url(icons/folder_icon.png);
    }
    
    .file {
        list-style: url(icons/icon_arrow.gif);
    }
</style>


<?php
class Tree{
    
    
    //constructor function always runs auto when object instantiated
    function __construct($dir){
        
        $this->listFilesInFolder($dir);
    }
    
    //define a private method of the class
    private function listFilesInFolder($dir){
        $items = scandir($dir);
        echo '<ul>';
        foreach($items as $item){
            if($item{0}!='.'){
                (is_dir($dir.'/'.$item))?$class = 'folder':$class = 'file';
                echo '<li class="'.$class.'"><a href="'.$dir.'/'.$item.'">'.$item.'</a>';

                if(is_dir($dir.'/'.$item)){ 
                    $this->listFilesInFolder($dir.'/'.$item); 
                }
                
            }
            echo '</li>';
        }
        echo '</ul>';
    }
}

?>

    <script>
        $(document).ready(function () {
            $('ul ul').hide();
            $('.folder > a').click(function (e) {
                e.preventDefault();
                var list = $(this).parent().find('>ul');
                list.toggle('fade');
            });
        });
    </script>