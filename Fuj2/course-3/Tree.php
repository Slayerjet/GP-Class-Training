<style>
    
    .folder{
        list-style-image: url(images/icons/folder_icon.png);
    }
    .file{
        list-style-image: url(images/icons/icon_arrow.gif)
    }
    
</style>

<link rhel="stylesheet" href="colorbox-master/example1/colorbox.css">

<?php
   class Tree{
    
    function __construct($dir){
    
//        echo 'Object Created for ' . $dir;
        $this->listFilesAndFolders($dir);
    
    }//EO construct
       
    private function listFilesAndFolders($dir){
        
//        echo '"listFilesAndFolders" has been called';
        
        //Get all of the items in the $dir
        $items = scandir($dir);//$items is an array
//        var_dump($items);
        echo '<ul>';
        foreach($items as $item){
            if($item[0] != '.'){
                
                //Check if file or folder and set $class variable as required
                //Check if $item is a folder
                if(is_dir($dir . '/' . $item)){
                    $cssClass = 'folder';
                } else {
                    $cssClass = 'file';
                }
                
                echo '<li class="'.$cssClass.'"><a href="'.$dir . '/' . $item .'">' . $item . '</a>';
                //Check if $item is a folder
                if(is_dir($dir . '/' . $item)){
                    //Recursion is when a function calls itself
                    $this->listFilesAndFolders($dir . '/' . $item);
                }
                echo '</li>';
            }
        }
        echo '</ul>';
        
    }//EO listFilesAndFolders
    
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="colorbox-master/jquery.colorbox-min.js"></script>


<script>
    
    $(document).ready(function(){
        
        $('ul ul').hide();
        $('.folder > a').click(function(e){
            e.preventDefault();
            var listToToggle = $(this).parent().find('>ul');
            listToToggle.toggle('fade');
        });//EO folder > a
        
    });//EO doc.rdy
    
</script>