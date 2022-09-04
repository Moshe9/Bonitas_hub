<?php
    require("connection.php");
    ini_set ('display_errors', 1);  
    ini_set ('display_startup_errors', 1);  
    error_reporting (E_ALL);

    $sqlLastRecord = "SELECT * FROM tbl_advisors ORDER BY user_id DESC LIMIT 1";
    $result = $conn->query($sqlLastRecord);

    if ($conn->query($sqlLastRecord)) {
        $lastRecord = $result->fetch_assoc();
        if($lastRecord){
            if(intval($lastRecord["user_id"]) > 0){
                echo "<script>sessionStorage.setItem('userid', '".(intval($lastRecord["user_id"]) + 1)."')</script>";
            }
        }else{
            echo "<script>sessionStorage.setItem('userid', '1')</script>";
        }
        
    }else{
        echo "<script>sessionStorage.setItem('userid', '1')</script>";
    }
