<?php
    require_once('connection.php');

    //  var_dump($_FILES);

    $userId = $_POST['userId'];
    $page = $_POST['page'];

    if($_FILES['file']['name']){

    

        $file = new SplFileInfo($_FILES['file']['name']);
        
        $filext = $file->getExtension();
        
        
        
        if($filext === 'pdf'){
        
        $apptype6 = 'application/pdf';
        
        }
        
        if($filext === 'doc' || $filext === 'docx'){
        
        $apptype6 = 'application/msword';
        
        }
        
        if($filext === 'jpeg' || $filext === 'jpg'){
        
        $apptype6 = 'image/jpeg';
        
        }
        
        if($filext === 'png'){
        
        $apptype6 = 'image/png';
        
        }
        
        
        
        $dir = "./uploads/";
        
        $filename6 = $userId;
        if($page == 'banking'){

        $filesname6 = $filename6.'-thirdpartyconsent.'.$filext;
        
        $uploadfilename6 = $dir.$filename6.'-thirdpartyconsent.'.$filext;
        }

        if($page == 'medicalscheme')
        {
            $hiddenId = $_POST['hiddenid'];
            $comId = $_POST['comId'];

            $filesname6 = $comId.'-com'.$hiddenId.'.'.$filext;
            

        
            $uploadfilename6 = $dir.$filesname6;

        }

        if($page == 'boncap')
        {
            $filesname6 = $userId. '-Boncap' . '.'.$filext;
            $uploadfilename6 = $dir.$filesname6;
        }
        
        
        
        // var_dump($_FILES);
        
        
        
        if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfilename6)){
        
         echo $filesname6;
        
        }
        
        else{
        
        echo "<p>Upload failed : ".$_FILES['file']['name']."</p>";
        
        }
        
    }

?>