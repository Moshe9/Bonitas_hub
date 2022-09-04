<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $idNum = $_POST['idnum'];
    $memnum = $_POST['memnum'];
    $refid = $_POST['refid'];

    $datefiles = date('Y-m-d\TH:i:s.s');

    $collectionstart = '{
        "resourceType": "Bundle",
        "meta": {
        },
        "versionId": "1",
        "lastUpdated": "'.$datefiles.'",
        "type": "collection",
        "entry": [';

    $collectionend = ']
    }';



    if(isset($_FILES['files']) && !empty($_FILES['files'])){
        $nofiles = count($_FILES['files']['name']);
        global $success;
        for($u = 0; $u < $nofiles; $u++){
            $filename = $idNum . "-" .  $_FILES['files']['name'][$u];
            if($_FILES['files']['error'][$u]){
                // echo '1';// "Error: " . $_FILES['files']['error'][$u] . "<br/>";
                // break 1;
            }else{
                if(file_exists('additional_files/'. $filename)){
                    // echo '2';// "File already exists! Please upload a different file.";
                    // break 1;
                }else{
                    move_uploaded_file($_FILES['files']['tmp_name'][$u], 'additional_files/'. $filename);
                    //$success .=  $filename . " uploaded successfully!";
                    $file1 = file_get_contents('./additional_files/'.$filename);
                }
            }
            $file = new SplFileInfo($filename);

            $filext = $file->getExtension();
            // echo "here is your file extension" . $filext;
            
            //$file1 = file_get_contents($_FILES['files']['name'][$u]);
            if($filext === 'pdf'){
                $apptype = 'application/pdf';
            }
            if($filext === 'doc' || $filext === 'docx'){
                $apptype = 'application/msword';
            }
            if($filext === 'jpeg' || $filext === 'jpg'){
                $apptype = 'image/jpeg';
            }
            if($filext === 'png'){
                $apptype = 'image/png';
            }
            $filebinary = base64_encode($file1);
            $fileupload = '{
                "resourceType": "Binary",
                "id": "'.$filename.'",
                "contentType": "'.$apptype.'",
                "content": "'.$filebinary.'"
            }';

            $collectionstart .= '{"resource": ';
            $collectionstart .= $fileupload;
            $collectionstart .= '}';
            if($u != $nofiles && $u != $nofiles -1)
            {
                $collectionstart .= ',';
            }
        }
        $collectionstart .= $collectionend;
        //$response = array($collectionstart, $success);
        echo $collectionstart;
    }else{
        echo "Please choose a file...";
    }
?>
