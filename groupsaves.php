<?php

include_once 'groupcon.php';

$currentTab = $_POST['currenttab'];
$depsconst = '';
if($currentTab >= 3){
    $depsconst = $_POST['depsconst'];
}

$optionsconst = '';
if($currentTab >= 3){
    $optionsconst = $_POST['optionsconst'];
}

if($currentTab === '0'){
    $userId = $_POST['userId'];
    $medicalstart = $_POST['medicalstart'];
    $capturedby = $_POST['capturedby'];
    $brokercode = $_POST['brokercode'];
    $paypointcode = $_POST['paypointcode'];
    $brokeragename = $_POST['brokeragename'];
    $brokername = $_POST['brokername'];
    $brokeremail = $_POST['brokeremail'];
    $brokertel = $_POST['brokertel'];
    // $created_at = CURDATE();
    // $updated_at = CURDATE();
    if($userId === 'empty'){
        $sql = "INSERT INTO grp_advisors (medstart_date,capturedby,brokercode,paypointcode,brokeragename,brokername,brokeremail,brokertel, created_at, updated_at)
        VALUES ('$medicalstart','$capturedby','$brokercode','$paypointcode','$brokeragename','$brokername','$brokeremail','$brokertel', now(), now())";
        if (mysqli_query($conn, $sql)) {
            // echo "New record has been added successfully !";
            // echo $userId = intval($_REQUEST['user_id']);
            $userId = $conn->insert_id;
        
            // echo "Saving Has been initiated Successfully!";
            $response = ['userId'=>$userId, 'message'=>"New Membership Application has just been initiated!"];
            echo json_encode($response);

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    else{
        $sql = "UPDATE grp_advisors SET medstart_date = '$medicalstart',capturedby = '$capturedby',brokercode = '$brokercode',paypointcode = '$paypointcode',brokeragename = '$brokeragename',brokername = '$brokername',brokeremail = '$brokeremail',brokertel = '$brokertel',
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
}

if($currentTab === '1')
{
    $userId = $_POST['userId'];
    $userId = intval($userId);
    $policyoption = $_POST['policyoption'];
    $incomeband = $_POST['incomeband'];
    $boncapupload = $_POST['boncapupload'];

        $sql = "UPDATE grp_advisors SET policy_option = '$policyoption' WHERE user_id = '$userId'";
        if (mysqli_query($conn, $sql)) {

            echo " Record has been updated successfully!";

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }

    //Boncap Upload statements
        $get_id = mysqli_query($conn,"SELECT user_id FROM incomebands WHERE user_id = $userId");
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
            $sql = "INSERT INTO incomebands (user_id,
            incomeband,
            boncapupload
            ) VALUES('$userId', '$incomeband', '$boncapupload')";
            if (mysqli_query($conn, $sql)) {
                echo "Boncap Information added successfully ! ". $userId;
            } else {
                echo "Error: " . $sql . ":-" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }else{
            $sql_upload = "UPDATE incomebands SET incomeband = '$incomeband', boncapupload = '$boncapupload' WHERE user_id = '$userId'";
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
    $mainIdnumber = $_POST['mainIdnumber'];
    $maintitle = $_POST['maintitle'];
    $taxnum = $_POST['taxnum'];
    $mainsurname = $_POST['mainsurname'];
    $mainfirstname = $_POST['mainfirstname'];
    $mainemployer = $_POST['mainemployer'];
    $employeenum = $_POST['employeenum'];
    $empdate = $_POST['empdate'];
    $department = $_POST['department'];
    $mainmarital = $_POST['mainmarital'];
    $gender = $_POST['gender'];
    $race = $_POST['race'];
    $dependents = $_POST['dependents'];
    $comm_method = $_POST['comm_method'];
    $cellphone = $_POST['cellphone'];
    $hometel = $_POST['hometel'];
    $email = $_POST['email'];
    $streetnum = $_POST['streetnum'];
    $streetname = $_POST['streetname'];
    $streettype = $_POST['streettype'];
    $suburb = $_POST['suburb'];
    $postalcode = $_POST['postalcode'];

    $get_id = mysqli_query($conn,"SELECT user_id FROM grp_members WHERE user_id = $userId");
    $result = mysqli_fetch_row($get_id);
    if($result != NULL)
    {
        $result =  $result[0];
    }else{
        $result = 'empty';
    }
        // var_dump($result);
    if($result != $userId){
        $sql = "INSERT INTO grp_members (user_id,
        mainid_number,
        taxnum,
        main_title, 
        main_surname, 
        main_firstname,
        employername,
        employeenum,
        empdate,
        department,
        main_marital, 
        mgender_radio, 
        m_race,
        m_deps_radio,
        m_comm_method,
        m_cell,
        m_telh,
        m_email,
        m_psnum,
        m_psname,
        m_pstype,
        m_psuburb,
        m_postalcode)
        VALUES ('$userId','$mainIdnumber','$taxnum','$maintitle','$mainsurname',
        '$mainfirstname','$mainemployer','$employeenum','$empdate','$department','$mainmarital','$gender','$race','$dependents','$comm_method','$cellphone','$hometel',
        '$email','$streetnum','$streetname','$streettype','$suburb','$postalcode')";
        if (mysqli_query($conn, $sql)) {
            echo "New record has been added successfully ! ";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }else{
        $sql = "UPDATE grp_members SET mainid_number = '$mainIdnumber', taxnum = '$taxnum', main_title = '$maintitle',main_surname = '$mainsurname',main_firstname = '$mainfirstname',employername = '$mainemployer',
         employeenum = '$employeenum', empdate = '$empdate', department = '$department' ,main_marital = '$mainmarital', mgender_radio = '$gender', m_race = '$race',m_deps_radio = '$dependents', m_comm_method = '$comm_method',
         m_cell = '$cellphone', m_telh = '$hometel', m_email = '$email', m_psnum = '$streetnum', m_psname = '$streetname', m_pstype = '$streettype', m_psuburb = '$suburb', m_postalcode = '$postalcode' WHERE user_id = '$userId'";
        if (mysqli_query($conn, $sql)) {

            echo "Record has been updated successfully !";

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

if($depsconst == 'yes' && $currentTab == 3){
    $userId = $_POST['userId'];
    $userId = intval($userId);
    $counter2 = 0;
    $depArray = $_POST['depArray'];
    $counter = count($depArray);
    

    
    $get_id = mysqli_query($conn,"SELECT COUNT(*) FROM grp_dependents WHERE user_id = $userId");
    $result = $get_id->fetch_row();

    if($result[0] > 0)
    {
        
        $delete = ("DELETE FROM grp_dependents WHERE user_id = $userId");
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

        
            $sql = "INSERT INTO grp_dependents (user_id,
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

if(($depsconst == 'no' && $currentTab == 3) || ($depsconst == 'yes' && $currentTab == 4))
{
    
    $userId = $_POST['userId'];
    $userId = intval($userId);
    $refundbank = $_POST['refundbank'];
    $refundaccholder = $_POST['refundaccholder'];
    $refundaccnum = $_POST['refundaccnum'];
    $refundacctype= $_POST['refundacctype'];

    $id = mysqli_query($conn,"SELECT user_id FROM grp_banks_refunds WHERE user_id = $userId");
    $resultId = mysqli_fetch_row($id);
    if($resultId != NULL)
    {
        $resultId =  $resultId[0];
    }else{
        $resultId = 'empty';
    }

    if($resultId != $userId){
        $sql = "INSERT INTO grp_banks_refunds (user_id,
        bankname,
        accholder,
        accnum,
        acctype
        )
        VALUES ('$userId','$refundbank','$refundaccholder','$refundaccnum','$refundacctype')";
        if (mysqli_query($conn, $sql)) {
            echo "New record has been added successfully ! ";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }else{
        $sql = "UPDATE grp_banks_refunds SET bankname = '$refundbank', accholder = '$refundaccholder',
            accnum = '$refundaccnum',acctype = '$refundacctype' WHERE user_id = '$userId'";
        if (mysqli_query($conn, $sql)) {

            echo "Record has been updated successfully !";

        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}

if(($depsconst == 'no' && $currentTab == 4) || ($depsconst == 'yes' && $currentTab == 5)){
    $userId = $_POST['userId'];
   $userId = intval($userId);
    $counter2 = 0;
    $gpnArray = $_POST['gpnArray'];
    $counter = count($gpnArray);
    //var_dump($gpnArray);

    $get_id = mysqli_query($conn,"SELECT COUNT(*) FROM grp_gpnominations WHERE user_id = $userId");
    $result = $get_id->fetch_row();

    if($result[0] > 0)
    {
        
        $delete = ("DELETE FROM grp_gpnominations WHERE user_id = $userId");
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
        $sql = "INSERT INTO grp_gpnominations(
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

    $sql = "UPDATE grp_advisors SET terms_agreement = '$terms_agreement',
           advisor_dates = '$advisor_dates', advisor_memfullname = '$advisor_memfullname', mem_declaration = '$mem_declaration', popi_declaration = '$popi'
           WHERE user_id = '$userId' ";
    
    if(mysqli_query($conn, $sql)){
        echo "Record has been updated successfully !";
    }else{
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
}
?>