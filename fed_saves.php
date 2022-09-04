<?php
include_once 'fed_connection.php';

$currentTab = $_POST['currenttab'];
$depsconst = '';
if($currentTab >= 4){
    $depsconst = $_POST['depsconst'];
}

$optionsconst = '';
if($currentTab >= 4){
    $optionsconst = $_POST['optionsconst'];
}




// $sqlDelete = "DELETE FROM fed_tbl_advisors WHERE user_id = ".intval($_REQUEST['userid']);
// if ($conn->query($sqlDelete) === FALSE) {
//     echo "Error deleting data: " . $conn->error;
// }

if($currentTab === '0'){
    $userId = $_POST['userId'];
    $medicalstart = $_POST['medicalstart'];
    $capturedby = $_POST['capturedby'];
    $brokercode = $_POST['brokercode'];
    $brokeragename = $_POST['brokeragename'];
    $brokername = $_POST['brokername'];
    $brokeremail = $_POST['brokeremail'];
    $brokertel = $_POST['brokertel'];
    // $created_at = CURDATE();
    // $updated_at = CURDATE();
    if($userId === 'empty'){
        $sql = "INSERT INTO fed_tbl_advisors (medstart_date,capturedby,brokercode,brokeragename,brokername,brokeremail,brokertel, created_at, updated_at)
        VALUES ('$medicalstart','$capturedby','$brokercode','$brokeragename','$brokername','$brokeremail','$brokertel', now(), now())";
        if (mysqli_query($conn, $sql)) {
            // echo "New record has been added successfully !";
            // echo $userId = intval($_REQUEST['user_id']);
            $userId = $conn->insert_id;
        
            //echo $userId;
            $response = ['userId'=>$userId, 'message'=>"New Membership Application has just been initiated!"];
            echo json_encode($response);

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
}
else{
    $sql = "UPDATE fed_tbl_advisors SET medstart_date = '$medicalstart',capturedby = '$capturedby',brokercode = '$brokercode',brokeragename = '$brokeragename',brokername = '$brokername',brokeremail = '$brokeremail',brokertel = '$brokertel',
            updated_at = now() WHERE user_id = '$userId'";
        if (mysqli_query($conn, $sql)) {
            // echo "New record has been added successfully !";
            // echo $userId = intval($_REQUEST['user_id']);
            // $userId = $conn->insert_id;
            $response = ['userId'=>$userId, 'message'=>"New Membership Application has just been initiated!"];
            echo json_encode($response);

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
}



// echo $userId;

    // $json = array("medical start date"=>$medicalstart, "captured by"=>$capturedby,"broker code"=>$brokercode);
    // $json = json_encode($json);
    // // echo $json;

    // $sql = "INSERT INTO users2 (brokerstep)
    // VALUES ('$json')";
    // if (mysqli_query($conn, $sql)) {
    //     echo "New record has been added successfully !";
    // } else {
    //     echo "Error: " . $sql . ":-" . mysqli_error($conn);
    // }
    // mysqli_close($conn);
}

if($currentTab === '1')
{
    $userId = $_POST['userId'];
    $userId = intval($userId);
    $policyoption = $_POST['policyoption'];
    $incomebound = $_POST['incomebound'];
    $boncapamount = $_POST['boncapamount'];

    // $get_id = mysqli_query($conn,"SELECT user_id FROM fed_tbl_members WHERE user_id = $userId");
    // $result = mysqli_fetch_row($get_id);
    // if($result != NULL)
    // {
    //     $result =  $result[0];
    // }else{
    //     $result = 'empty';
    // }

    $sql = "UPDATE fed_tbl_advisors SET policy_option = '$policyoption' WHERE user_id = '$userId'";
        if (mysqli_query($conn, $sql)) {

            echo " Record has been updated successfully!";

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
     //mysqli_close($conn);

     //Boncap Upload statements
     $get_id = mysqli_query($conn,"SELECT user_id FROM incomebounds WHERE user_id = $userId");
     $result = mysqli_fetch_row($get_id);
     if($result != NULL)
     {
         $result =  $result[0];
     }else{
         $result = 'empty';
     }
     //echo "userID : " . $userId . " BonCap Option : " . $incomeband . " Filename : " . $boncapupload;
     if($result != $userId)
     {
         $sql = "INSERT INTO incomebounds (user_id,
         incomebound,
         boncapupload
         ) VALUES('$userId', '$incomebound', '$boncapamount')";
         if (mysqli_query($conn, $sql)) {
             echo "Boncap Information added successfully ! ". $userId;
         } else {
             echo "Error: " . $sql . ":-" . mysqli_error($conn);
         }
         mysqli_close($conn);
     }else{
         $sql_upload = "UPDATE incomebounds SET incomebound = '$incomebound', boncapupload = '$boncapamount' WHERE user_id = '$userId'";
         if (mysqli_query($conn, $sql_upload)) {
             echo "Boncap Information successfully updated! " . $userId;
         } else {
             echo "Error: " . $sql_upload . ":-" . mysqli_error($conn);
         }
         mysqli_close($conn);
     }
    
}


if($currentTab === '2'){
    $userId = $_POST['userId'];
    $userId = intval($userId);
    $idPassType = $_POST['idPassType']; //First check if the ID already exists.
    $mainIdnumber = $_POST['mainIdnumber'];
    $maintitle = $_POST['maintitle'];
    $mainsurname = $_POST['mainsurname'];
    $mainfirstname = $_POST['mainfirstname'];
    $maininitial = $_POST['maininitial'];
    $mainmarital = $_POST['mainmarital'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $language = $_POST['language'];
    $race = $_POST['race'];
    $dependents = $_POST['dependents'];

    $get_id = mysqli_query($conn,"SELECT user_id FROM fed_tbl_members WHERE user_id = $userId");
    $result = mysqli_fetch_row($get_id);
    if($result != NULL)
    {
        $result =  $result[0];
    }else{
        $result = 'empty';
    }
        // var_dump($result);
    if($result != $userId){
        $sql = "INSERT INTO fed_tbl_members (user_id,
        idPassType,
        mainid_number,
        main_title,
        main_surname,
        main_firstname,
        main_initial,
        main_marital,
        mgender_radio,
        m_dob,
        main_lang,
        m_race,
        m_deps_radio)
        VALUES ('$userId','$idPassType','$mainIdnumber','$maintitle','$mainsurname',
        '$mainfirstname','$maininitial','$mainmarital','$gender','$dob','$language','$race','$dependents')";
        if (mysqli_query($conn, $sql)) {
            echo "New record has been added successfully ! ";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }else{
        $sql = "UPDATE fed_tbl_members SET idPassType = '$idPassType',mainid_number = '$mainIdnumber',main_title = '$maintitle',main_surname = '$mainsurname',main_firstname = '$mainfirstname',main_initial = '$maininitial',main_marital = '$mainmarital',
          mgender_radio = '$gender', m_dob = '$dob', main_lang = '$language', m_race = '$race',m_deps_radio = '$dependents' WHERE user_id = '$userId'";
        if (mysqli_query($conn, $sql)) {

            echo "Record has been updated successfully !";

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

if($currentTab == 3){
    $userId = $_POST['userId'];
    $userId = intval($userId);
    $cell = $_POST['cell']; 
    $hometel = $_POST['hometel']; 
    $worktel= $_POST['worktel']; 
    $taxnumber= $_POST['taxnumber'];
    $comm_method= $_POST['comm_method'];
    $email= $_POST['email'];  
    $pobox= $_POST['pobox']; 
    $postalstreetnum= $_POST['postalstreetnum'];
    $postalstreetname= $_POST['postalstreetname']; 
    $postalstreetntype= $_POST['postalstreetntype']; 
    $postalsuburb= $_POST['postalsuburb']; 
    $postalcode= $_POST['postalcode']; 
    $streetnum= $_POST['streetnum']; 
    $streetname= $_POST['streetname']; 
    $streettype= $_POST['streettype']; 
    $suburb= $_POST['suburb']; 
    $streetpostalcode= $_POST['streetpostalcode'];

    $get_id = mysqli_query($conn,"SELECT user_id FROM fed_tbl_members_contacts WHERE user_id = $userId");
    $result = mysqli_fetch_row($get_id);
    if($result != NULL)
    {
        $result =  $result[0];
    }else{
        $result = 'empty';
    }
        // var_dump($result);
    if($result != $userId){
        $sql = "INSERT INTO fed_tbl_members_contacts (user_id,
        m_cell,
        m_telh,
        m_telw,
        mtax,
        m_comm_method,
        m_email,
        mainid_pobox,
        m_psnum,
        m_psname,
        m_pstype,
        m_psuburb,
        m_postalcode,
        m_ssnum,
        m_ssname,
        m_sstype,
        m_ssuburb,
        m_spostalcode)
        VALUES ('$userId','$cell','$hometel','$worktel','$taxnumber','$comm_method',
        '$email','$pobox','$postalstreetnum','$postalstreetname','$postalstreetntype','$postalsuburb','$postalcode','$streetnum',
        '$streetname', '$streettype', '$suburb', '$streetpostalcode')";
        if (mysqli_query($conn, $sql)) {
            echo "New record has been added successfully ! ";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }else{
        $sql = "UPDATE fed_tbl_members_contacts as mc, fed_tbl_advisors as a SET mc.m_cell = '$cell',mc.m_telh = '$hometel',mc.m_telw = '$worktel',mc.mtax = '$taxnumber',mc.m_comm_method ='$comm_method',
            mc.m_email = '$email',mc.mainid_pobox = '$pobox',mc.m_psnum = '$postalstreetnum', mc.m_psname = '$postalstreetname', mc.m_pstype = '$postalstreetntype',
            mc.m_psuburb = '$postalsuburb',mc.m_postalcode = '$postalcode',mc.m_ssnum = '$streetnum',mc.m_ssname = '$streetname'
          ,mc.m_sstype = '$streettype',mc.m_ssuburb = '$suburb',mc.m_spostalcode = '$streetpostalcode', a.updated_at = now() WHERE mc.user_id = '$userId' AND a.user_id = '$userId'";
        if (mysqli_query($conn, $sql)) {

            echo "Record has been updated successfully !";

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

if($depsconst == 'yes' && $currentTab == 4){
    $userId = $_POST['userId'];
    $userId = intval($userId);
    $counter2 = 0;
    $depArray = $_POST['depArray'];
    $counter = count($depArray);
    

    
    $get_id = mysqli_query($conn,"SELECT COUNT(*) FROM fed_tbl_dependents WHERE user_id = $userId");
    $result = $get_id->fetch_row();

    if($result[0] > 0)
    {
        
        $delete = ("DELETE FROM fed_tbl_dependents WHERE user_id = $userId");
        if (mysqli_query($conn, $delete)) {

            echo "All record has been deleted successfully ! ";

        } else {

            echo "Error: " . $delete . ":-" . mysqli_error($conn);

        }
    }
    while($counter2 < $counter)
    {
        $title = $depArray[$counter2][0];
        $idnum = $depArray[$counter2][1];
        $firstname = $depArray[$counter2][2];
        $surname = $depArray[$counter2][3];
        $dob = $depArray[$counter2][4];
        $marital_status = $depArray[$counter2][5];
        $race = $depArray[$counter2][6];
        $gender = $depArray[$counter2][7];
        $relationship = $depArray[$counter2][8];
        $contact = $depArray[$counter2][9];
        $taxnum = $depArray[$counter2][10];

        
            $sql = "INSERT INTO fed_tbl_dependents (user_id,
            dep_title,
            d_idpass,
            d_firstname,
            d_surname,
            d_dob,
            d_marital,
            d_race,
            d_gender_radio,
            d_rel,
            d_contact,
            d_tax )
            VALUES ('$userId','$title','$idnum','$firstname','$surname','$dob',

            '$marital_status','$race','$gender','$relationship','$contact','$taxnum')";
            if (mysqli_query($conn, $sql)) {

            echo "New record has been added successfully ! ";

            } else {

            echo "Error: " . $sql . ":-" . mysqli_error($conn);

            }
         $counter2++;
    }
    mysqli_close($conn);
}

if(($depsconst == 'no' && $currentTab == 4) || ($depsconst == 'yes' && $currentTab == 5))
{
    $banking = $_POST['banking'];

    // echo $banking['userId'];
    $userId = $banking['userId'];
    $userId = intval($userId);
    $contribbank =$banking['contribbank'];
    //$contribaccholder =$banking['contribaccholder'];
    $contribaccnum =$banking['contribaccnum'];
    $contribacctype =$banking['contribacctype'];
    $contribaccholderid = $banking['contribaccholderid'];
    $contribaccholdname = $banking['contribaccholdname'];
    $contribaccholdsurname = $banking['contribaccholdsurname'];
    $contrdebidate = $banking['contrdebidate'];
    $refundbank = $banking['refundbank'];
    $refundaccholder = $banking['refundaccholder'];
    $refundaccnum = $banking['refundaccnum'];
    $refundacctype= $banking['refundacctype'];
    $refundaccholderid = $banking['refundaccholderid'];
    //$refundaccholdname = $banking['refundaccholdname'];
    $refundaccholdsurname = $banking['refundaccholdsurname'];
    // $thirdpartyidvalid = $banking['thirdpartyidvalid'];
    $checkcontribcopy = $banking['checkcontribcopy'];
    $verification = $banking['verification']; //goes into contributions
    $thirdpartycheckfield = $banking['thirdpartycheckfield'];
    $refthirdpartycheckfield = $banking['refthirdpartycheckfield'];
    $consentupload = $_POST['consentupload'];



    if($verification == "Has not been verified"){
        $verification =json_encode(array(
            'error'=> $verification
        ));
    }else{
        $verification =json_encode(array(
            'valid'=> $verification
        ));
    }



    $get_id = mysqli_query($conn,"SELECT user_id FROM fed_tbl_banks_contributions WHERE user_id = $userId");
    $result = mysqli_fetch_row($get_id);
    if($result != NULL)
    {
        $result =  $result[0];
    }else{
        $result = 'empty';
    }

    //bank contribution saves start
    if($result != $userId){
        $sql = "INSERT INTO fed_tbl_banks_contributions (user_id,
        thirdpartycheck,
        bankname,
        accholderid,
        accholder, 
        accholdersurname,
        accnum,
        acctype,
        debitdate,
        verification,
        consentupload
        )
        VALUES ('$userId','$thirdpartycheckfield','$contribbank','$contribaccholderid','$contribaccholdname',
        '$contribaccholdsurname','$contribaccnum','$contribacctype','$contrdebidate', '$verification','$consentupload')";
        if (mysqli_query($conn, $sql)) {
            echo "New record has been added successfully ! ";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        // mysqli_close($conn);
    }else{
        $sql = "UPDATE fed_tbl_banks_contributions SET thirdpartycheck = '$thirdpartycheckfield',bankname = '$contribbank',accholderid = '$contribaccholderid',accholder = '$contribaccholdname',
            accholdersurname = '$contribaccholdsurname',accnum = '$contribaccnum',acctype = '$contribacctype', debitdate = '$contrdebidate', verification = '$verification',
            consentupload= '$consentupload' WHERE user_id = '$userId'";
        if (mysqli_query($conn, $sql)) {

            echo "Record has been updated successfully !";

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        // mysqli_close($conn);
    }
    //bank contribution saves end


    $id = mysqli_query($conn,"SELECT user_id FROM fed_tbl_banks_refunds WHERE user_id = $userId");
    $resultId = mysqli_fetch_row($id);
    if($resultId != NULL)
    {
        $resultId =  $resultId[0];
    }else{
        $resultId = 'empty';
    }

    if($resultId != $userId){
        $sql = "INSERT INTO fed_tbl_banks_refunds (user_id,
        thirdpartycheck,
        sameacccheck,
        bankname,
        accholderid,
        accholder,
        accholdersurname,
        accnum,
        acctype,
        debitdate
        )
        VALUES ('$userId','$refthirdpartycheckfield','$checkcontribcopy','$refundbank','$refundaccholderid','$refundaccholder',
        '$refundaccholdsurname','$refundaccnum','$refundacctype','$contrdebidate')";
        if (mysqli_query($conn, $sql)) {
            echo "New record has been added successfully ! ";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }else{
        $sql = "UPDATE fed_tbl_banks_refunds SET thirdpartycheck = '$refthirdpartycheckfield',sameacccheck = '$checkcontribcopy', bankname = '$refundbank',accholderid = '$refundaccholderid',
            accholder = '$refundaccholder',
            accholdersurname = '$refundaccholdsurname',accnum = '$refundaccnum',acctype = '$refundacctype', debitdate = '$contrdebidate'
            WHERE user_id = '$userId'";
        if (mysqli_query($conn, $sql)) {

            echo "Record has been updated successfully !";

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

if(($depsconst == 'no' && $currentTab == 5) || ($depsconst == 'yes' && $currentTab == 6)){
   $userId = $_POST['userId'];
   $userId = intval($userId);

    $counter2 = 0;
    $pmArray = $_POST['pmArray'];
    $counter = count($pmArray);


    $get_id = mysqli_query($conn,"SELECT COUNT(*) FROM fed_tbl_medical_scheme WHERE user_id = $userId");
    $result = $get_id->fetch_row();

    if($result[0] > 0)
    {
        
        $delete = ("DELETE FROM fed_tbl_medical_scheme WHERE user_id = $userId");
        if (mysqli_query($conn, $delete)) {

            echo "All record has been deleted successfully ! ";

        } else {

            echo "Error: " . $delete . ":-" . mysqli_error($conn);

        }
    }

    while($counter2 < $counter )
    {
        $namesurname = $pmArray[$counter2][0];
        $medschemename = $pmArray[$counter2][1];
        $memshipnumber = $pmArray[$counter2][2];
        $joindate = $pmArray[$counter2][3];
        $enddate = $pmArray[$counter2][4];
        $comupload = $pmArray[$counter2][5];

        

            $sql = "INSERT INTO fed_tbl_medical_scheme(
                    user_id,
                    fullname,
                    medscheme,
                    membership_num,
                    medjoindate,
                    medenddate,
                    comupload
            )
            VALUES ('$userId','$namesurname','$medschemename','$memshipnumber', '$joindate','$enddate', '$comupload')";
            if(mysqli_query($conn, $sql)){
                echo "New record has been added successfully !";
            }else{
                echo "Error: " .$sql . ":-" . mysqli_error($conn);
            }
        $counter2++;
    }//while loop
   mysqli_close($conn);
    
}

if(($depsconst == 'no' && $currentTab == 6) || ($depsconst == 'yes' && $currentTab == 7))
{
    $userId = $_POST['userId'];
    $userId = intval($userId);
     $amqArray = $_POST['amqArray'];
    //  var_dump($amqArray);
    
    
    $get_id = mysqli_query($conn,"SELECT COUNT(*) FROM fed_tbl_medical_questions WHERE user_id = $userId");
    $result = $get_id->fetch_row();

    if($result[0] > 0)
    {
        
        $delete = ("DELETE FROM fed_tbl_medical_questions WHERE user_id = $userId");
        if (mysqli_query($conn, $delete)) {

            echo "All record has been deleted successfully ! ";

        } else {

            echo "Error: " . $delete . ":-" . mysqli_error($conn);

        }
    }

    foreach($amqArray as $mqArray)
    {
        foreach($mqArray as $value)
        {
            $fullname = $value[0];
            $illness = $value[1];
            $treated = $value[2];
            $firsttreatmentdate = $value[3];
            $lasttreatmentdate = $value[4];
            $gpfullname = $value[5];
            $medicalquestion = $value[6];
            $medication = $value[7];


            $sql = "INSERT INTO fed_tbl_medical_questions(
                  user_id,
                  medical_questions,
                  fullname,
                  illness,
                  treated,
                  firsttreatmentdate,
                  lasttreatmentdate,
                  gpfullname,
                  medication
                )
                     VALUES ('$userId','$medicalquestion','$fullname','$illness','$treated', '$firsttreatmentdate','$lasttreatmentdate', '$gpfullname','$medication')";
                    if(mysqli_query($conn, $sql)){
                        echo "New record has been added successfully !";
                    }else{
                        echo "Error: " .$sql . ":-" . mysqli_error($conn);
                    }
        }
    }
    mysqli_close($conn);
}

if(($depsconst == 'no' && $currentTab == 7 && $optionsconst == 'select' ) || ($depsconst == 'yes' && $currentTab == 8 && $optionsconst == 'select')){
    $userId = $_POST['userId'];
   $userId = intval($userId);
    $counter2 = 0;
    $gpnArray = $_POST['gpnArray'];
    $counter = count($gpnArray);
    var_dump($gpnArray);

    $get_id = mysqli_query($conn,"SELECT COUNT(*) FROM fed_tbl_gpnominations WHERE user_id = $userId");
    $result = $get_id->fetch_row();

    if($result[0] > 0)
    {
        
        $delete = ("DELETE FROM fed_tbl_gpnominations WHERE user_id = $userId");
        if (mysqli_query($conn, $delete)) {

            echo "All record has been deleted successfully ! ";

        } else {

            echo "Error: " . $delete . ":-" . mysqli_error($conn);

        }
    }

    while($counter2 < $counter )
    {
        $fullname = $gpnArray[$counter2][0];
        $firstdocname = $gpnArray[$counter2][1];
        $firstdocpnum = $gpnArray[$counter2][2];
        $seconddocname = $gpnArray[$counter2][3];
        $seconddocpnum = $gpnArray[$counter2][4];
        
        //insert
        $sql = "INSERT INTO fed_tbl_gpnominations(
            user_id,
            fullname,
            firstdocname,
            firstdocpnum,
            seconddocname,
            seconddocpnum
        )
        VALUES ('$userId','$fullname','$firstdocname','$firstdocpnum','$seconddocname', '$seconddocpnum')";
        if(mysqli_query($conn, $sql)){
            echo "New record has been added successfully !";
        }else{
            echo "Error: " .$sql . ":-" . mysqli_error($conn);
        }
       $counter2++;    
    }
      
   mysqli_close($conn);
}

if(($depsconst == 'no' && $currentTab == 8 && $optionsconst == 'select' ) || ($depsconst == 'yes' && $currentTab == 9 && $optionsconst == 'select') || ($depsconst == 'yes' && $currentTab == 8 && $optionsconst != 'select') || ($depsconst == 'no' && $currentTab == 7 && $optionsconst != 'select')){
    $userId = $_POST['userId'];
    $userId = intval($userId);
    $terms_agreement = $_POST['terms_agreement'];
    $advisor_dates = $_POST['advisor_dates'];
    $advisor_memfullname = $_POST['advisor_memfullname'];
    $mem_declaration = $_POST['mem_declaration'];
    $popi = $_POST['popi'];

    $sql = "UPDATE fed_tbl_advisors SET terms_agreement = '$terms_agreement',
           advisor_dates = '$advisor_dates', advisor_memfullname = '$advisor_memfullname', mem_declaration = '$mem_declaration', popi_declaration = '$popi'
           WHERE user_id = '$userId' ";
    
    if(mysqli_query($conn, $sql)){
        echo "Record has been updated successfully !";
    }else{
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
}
        

?>