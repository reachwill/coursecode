<style>

    .file{
        list-style: url(images/icons/icon_arrow.gif);
    }
    
    .folder{
        list-style: url(images/icons/folder_icon.png);
    }

</style>
   
<link rel="stylesheet" href="colorbox-master/example1/colorbox.css">    
     
      
        
    <?php

    class TreeNavigator{
        
        
        function __construct($dir){
            $this->listFilesInFolder($dir);
        }
        
        private function listFilesInFolder($dir){
            $items = scandir($dir);
            
//            echo '<pre>';
//            var_dump($items);
            
            echo '<ul>';
            //loop thru each item and display as a list item
            foreach($items as $item){
                if($item[0] != '.'){
                    
                    //set the class property of the list item
                    (is_dir($dir . '/' . $item))?$class='folder':$class='file';
                    
echo '<li class="' . $class . '"><a href="' . $dir . '/' . $item . '">' . $item . '</a>' ;
                    
                    //check if $item is a directory
                    if(is_dir($dir . '/' . $item)){
                        $this->listFilesInFolder($dir . '/' . $item);
                    }
                    
                    echo '</li>';
                    
                }
            }
            
            echo '</ul>';
 
        }
 
    }
?>


<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
 <script src="colorbox-master/jquery.colorbox-min.js"></script> 

  
<script>
    
    $(document).ready(function(){
        $('ul ul').hide();
        
        $('.folder > a').click(function(e){
            e.preventDefault();
            var list = $(this).parent().find('>ul');
            list.toggle('fade');
        });
        
        
        $('.file > a').colorbox({
            rel:'group1',
            width:'50%'
        });
        
        
    });

</script>













