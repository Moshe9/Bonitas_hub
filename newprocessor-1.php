<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/nav.css">
        <link rel="stylesheet" type="text/css" href="../frontend/fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript" language="javascript"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="multifile/jquery.MultiFile.js" type="text/javascript" language="javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <style>
            .nav-wrapper{
                height: 70px;
                box-shadow: 2px 2px 5px grey;
                width: 100%;
            }

            .brand-logo{
                margin-left: 40px;
                padding-top: 80px;
            }

            ul li a{
                text-decoration: none;
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>
        <header class="page-topbar" id="header">
            <div class="navbar navbar-fixed ">
                <nav style="background: #ba0c35;">
                    <div class="nav-wrapper">
                        <a href="http://forms.afrocentricds.com/hub-home" class="brand-logo"></a>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="http://forms.afrocentricds.com/group-home">HOME</a></li>
                            <li><a href="http://forms.afrocentricds.com/marketing-elements">MARKETING ELEMENTS</a></li>
                            <li><a href="https://newaccount1613558039243.freshdesk.com/support/home" target="_blank">SYSTEM SUPPORT</a></li>
                            <li><a href="http://forms.afrocentricds.com/my-account/11">MY ACCOUNT</a></li>
                            <li><a href="http://forms.afrocentricds.com/logout"><i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
<!-- @extends('hub.hub_layout')
@section('content') -->
<?php
error_reporting(E_ERROR | E_PARSE);
    // if(!isset($_POST['submit'])){
    //     echo "An error occured please go back and try again. Sorry for any inconvenience caused.";
    // }
//  print_r($_POST);
    // print_r($_FILES);
    // Files required to PDF and Email
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doss_hubb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once 'C:\xampp\htdocs\doss_hub\vendor\autoload.php';
    
    global $consentanswer;
    global $refconsentanswer;
    global $message;
    global $filename;
    global $apptype1;
    global $apptype2;
    global $apptype3;
    global $apptype4;
    global $apptype5;
    global $apptype6;
    global $pmCount;
    global $policyoptions;

    $policyoptions = array();

    $policyoptions = ['PL477'=>"BonComprehensive", 'PL476'=>"BonClassic", 'PL472'=>"BonComplete", 'PL240'=>"BonSave", 'PL475'=>"BonFit Select", 'PL020'=>"Standard", 'PL021'=>"Standard Select", 'PL277'=>"Primary", 'PL469'=>"Primary Select", 'PL464'=>"BonStart", 'PL465'=>"BonStart plus", 'PL474'=>"Hospital Standard", 'PL479'=>"BonEssential", 'PL471'=>"BonEssential Select"];
    $relationshiptype = array("SPO"=>"ADEP", "DSPO"=>"ADEP", "CLSPO"=>"ADEP", "PAR"=>"ADEP", "OTHER"=>"ADEP", "CHI"=>"CDEP", "CHISTU"=>"STU", "FCHI"=>"CDEP", "CHIADO"=>"CDEP", "DCHI"=>"ADEP", "DCHIC"=>"CDEP", "OCHI"=>"ADEP", "GCHI"=>"CDEP", "SIBC"=>"CDEP", "SIBA"=>"ADEP", "OTHERA"=>"ADEP", "OTHERC"=>"CDEP");
    $relationship = array("SPO"=>"SPO", "DSPO"=>"DSPO", "CLSPO"=>"CLSPO", "PAR"=>"PAR", "OTHER"=>"OTHER", "CHI"=>"CHI", "CHISTU"=>"CHI", "FCHI"=>"FCHI", "CHIADO"=>"CHI", "DCHI"=>"DCHI", "DCHIC"=>"DCHI", "OCHI"=>"OCHI", "GCHI"=>"GCHI", "SIBC"=>"SIB", "SIBA"=>"SIB", "OTHERA"=>"OTHER", "OTHERC"=>"OTHER");
    $medcodes = array("1"=>"73", "2"=>"66", "3"=>"72", "4"=>"74");
if($_POST['refund-bankname']==='ABSA'){
        $refundbankname = 'ABSA';
        $refundbranchname = 'ABSA ELECTRONIC SETTLEMENT CNT';
        $refundBranchCode = 632005;
    }
    if($_POST['refund-bankname']==='AFRICAN'){
        $refundbankname = 'AFRICAN BANK';
        $refundbranchname = 'HEAD OFFICE';
        $refundBranchCode = 430000;
    }
    if($_POST['refund-bankname']==='MEEG'){
        $refundbankname = 'CAPITEC';
        $refundbranchname = 'CAPITEC BANK CPC';
        $refundBranchCode = 470010;
    }
    if($_POST['refund-bankname']==='DISC_BANK'){
        $refundbankname = 'DISCOVERY BANK';
        $refundbranchname = 'DISCOVERY UNIVERSAL BRANCH';
        $refundBranchCode = 679000;
    }
    if($_POST['refund-bankname']==='FNB'){
        $refundbankname = 'FNB';
        $refundbranchname = 'BRANCH 560';
        $refundBranchCode = 250655;
    }
    if($_POST['refund-bankname']==='INVESTEC'){
        $refundbankname = 'INVESTEC';
        $refundbranchname = 'INVESTEC BANK GRAYSTON DRIVE';
        $refundBranchCode = 580105;
    }
    if($_POST['refund-bankname']==='NEDCOR'){
        $refundbankname = 'NEDBANK';
        $refundbranchname = 'NEDBANK SOUTH AFRICA';
        $refundBranchCode = 198765;
    }
    if($_POST['refund-bankname']==='STANDARD'){
        $refundbankname = 'STANDARD BANK';
        $refundbranchname = 'STANDARD BANK SOUTH AFRICA';
        $refundBranchCode = 51001;
    }
    if($_POST['refund-bankname']==='TYMDG_BANK'){
        $refundbankname = 'TYME BANK';
        $refundbranchname = 'TYME ROSEBANK';
        $refundBranchCode = 678910;
    }
    // declare loop variables
    $prevmedarray = array();
    $dependantsCount = 1;
    $prevmedCount = 1;
    $mq1Count = 1;
    $mq2Count = 1;
    $mq3Count = 1;
    $mq4Count = 1;
    $gpnomCount = 1;
    $depCount = $_POST["depcounter"];
    $pmCount = $_POST["pmcounter"];
    $medq1Count = $_POST["mq1counter"];
    $medq2Count = $_POST["mq2counter"];
    $medq3Count = $_POST["mq3counter"];
    $medq4Count = $_POST["mq4counter"];
    $gpnCount = $_POST["gpncounter"];
    $relationshiptype = array("SPO"=>"ADEP", "DSPO"=>"ADEP", "CLSPO"=>"ADEP", "PAR"=>"ADEP", "OTHER"=>"ADEP", "CHI"=>"CDEP", "CHISTU"=>"STU", "FCHI"=>"CDEP", "CHIADO"=>"CDEP", "DCHI"=>"ADEP", "DCHIC"=>"CDEP", "OCHI"=>"ADEP", "GCHI"=>"CDEP", "SIBC"=>"CDEP", "SIBA"=>"ADEP", "OTHERA"=>"ADEP", "OTHERC"=>"CDEP");
    $relationship = array("SPO"=>"SPO", "DSPO"=>"DSPO", "CLSPO"=>"CLSPO", "PAR"=>"PAR", "OTHER"=>"OTHER", "CHI"=>"CHI", "CHISTU"=>"CHI", "FCHI"=>"FCHI", "CHIADO"=>"CHI", "DCHI"=>"DCHI", "DCHIC"=>"DCHI", "OCHI"=>"OCHI", "GCHI"=>"GCHI", "SIBC"=>"SIB", "SIBA"=>"SIB", "OTHERA"=>"OTHER", "OTHERC"=>"OTHER");

    if($_POST['refund-accholdname'] === $_POST['mainid-number'])
    {
        $refundaccountholder = $_POST['main-firstname'].' '.$_POST['main-surname'];
    }
    else{
        $dependantsCount = 1;
        while($dependantsCount<=$depCount){
            if($_POST['refund-accholdname'] === $_POST['d'.$dependantsCount.'-idpass']){
                $refundaccountholder = $_POST['d'.$dependantsCount.'-firstname'].' '.$_POST['d'.$dependantsCount.'-surname'];
            }
            $dependantsCount++;
        }
    }
    // check if array matches any member
    while($prevmedCount <= $pmCount){
        $prevmedarray[] = array("name-surname"=>$_POST["prevmed-namesurname".$prevmedCount],"medical-scheme-name"=>$_POST['prevmed-medscheme'.$prevmedCount], "membership-number"=>$_POST['prevmed-memnum'.$prevmedCount], "join-date"=>$_POST['prevmed-djoin'.$prevmedCount], "end-date"=>$_POST['prevmed-dend'.$prevmedCount], "com-upload"=>$_POST['ms'.$prevmedCount."upload"]);
        $prevmedCount++;
    }
    // echo '<br/><br/>please help<br/><br/>';
    // var_dump($prevmedarray);
	$dependantsCount = 1;
    while($dependantsCount <= $depCount){
        $depsarray[] = array("id-number"=>$_POST['d'.$dependantsCount.'-idpass'], "age"=>$_POST['d'.$dependantsCount.'-age'], "date-of-birth"=>$_POST['d'.$dependantsCount.'-dob'], "title"=>$_POST['dep'.$dependantsCount.'-title'], "name"=>$_POST['d'.$dependantsCount.'-firstname'], "surname"=>$_POST['d'.$dependantsCount.'-surname'], "marital-status"=>$_POST['d'.$dependantsCount.'-marital'], "race"=>$_POST['d'.$dependantsCount.'-race'], "gender"=>$_POST['d'.$dependantsCount.'-gender-radio'], "relationship"=>$_POST['d'.$dependantsCount.'-rel'], "contact"=>$_POST['d'.$dependantsCount.'-contact'], "tax-number"=>$_POST['d'.$dependantsCount.'tax']);
        $dependantsCount++;
    }
    if($_POST["medquestion1code"] != "" || $_POST["medquestion2code"] != "" || $_POST["medquestion3code"] != "" || $_POST["medquestion4code"] != ""){
        while($mq1Count <= $medq1Count){
            $mq1array[] = array("member-name"=>$_POST["medicalquestion1".$mq1Count."-name"],"medical-code"=>$_POST['medquestion1code'], "illness"=>$_POST['medicalquestion1'.$mq1Count.'-illness'], "treated"=>$_POST['medicalquestion1'.$mq1Count.'-radios'], "first-treatment"=>$_POST['medicalquestion1'.$mq1Count.'-firsttreat'], "last-treatment"=>$_POST['medicalquestion1'.$mq1Count.'-lasttreat'], "gp-name"=>$_POST['medicalquestion1'.$mq1Count.'-gpspec']);
            $mq1Count++;
        }
        // echo '<br/><br/>';
        // var_dump($mq1array);
        // echo '<br/><br/>';
        while($mq2Count <= $medq2Count){
            $mq2array[] = array("member-name"=>$_POST["medicalquestion2".$mq2Count."-name"],"medical-code"=>$_POST['medquestion2code'], "illness"=>$_POST['medicalquestion2'.$mq2Count.'-illness'], "treated"=>$_POST['medicalquestion2'.$mq2Count.'-radios'], "first-treatment"=>$_POST['medicalquestion2'.$mq2Count.'-firsttreat'], "last-treatment"=>$_POST['medicalquestion2'.$mq2Count.'-lasttreat'], "gp-name"=>$_POST['medicalquestion2'.$mq2Count.'-gpspec']);
            $mq2Count++;
        }
        // echo '<br/><br/>';
        // var_dump($mq2array);
        // echo '<br/><br/>';
        while($mq3Count <= $medq3Count){
            $mq3array[] = array("member-name"=>$_POST["medicalquestion3".$mq3Count."-name"],"medical-code"=>$_POST['medquestion3code'], "illness"=>$_POST['medicalquestion3'.$mq3Count.'-illness'], "treated"=>$_POST['medicalquestion3'.$mq3Count.'-radios'], "first-treatment"=>$_POST['medicalquestion3'.$mq3Count.'-firsttreat'], "last-treatment"=>$_POST['medicalquestion3'.$mq3Count.'-lasttreat'], "gp-name"=>$_POST['medicalquestion3'.$mq3Count.'-gpspec']);
            $mq3Count++;
        }
        // echo '<br/><br/>';
        // var_dump($mq3array);
        // echo '<br/><br/>';
        while($mq4Count <= $medq4Count){
            $mq4array[] = array("member-name"=>$_POST["medicalquestion4".$mq4Count."-name"],"medical-code"=>$_POST['medquestion4code'], "illness"=>$_POST['medicalquestion4'.$mq4Count.'-illness'], "treated"=>$_POST['medicalquestion4'.$mq4Count.'-radios'], "first-treatment"=>$_POST['medicalquestion4'.$mq4Count.'-firsttreat'], "last-treatment"=>$_POST['medicalquestion4'.$mq4Count.'-lasttreat'], "gp-name"=>$_POST['medicalquestion4'.$mq4Count.'-gpspec']);
            $mq4Count++;
        }
        // echo '<br/><br/>';
        // var_dump($mq4array);
        // echo '<br/><br/>';
    }
    while($gpnomCount <= $gpnCount){
        $gpnarray[] = array("member-name"=>$_POST["gpnow".$gpnomCount."-mnamesurname"], "first-gp-name"=>$_POST['gpnow'.$gpnomCount.'-mdocname1'], "first-gp-pn"=>$_POST['gpnow'.$gpnomCount.'-mprcnum1'], "second-gp-name"=>$_POST['gpnow'.$gpnomCount.'-mdocname2'], "second-gp-pn"=>$_POST['gpnow'.$gpnomCount.'-mprcnum2']);
        $gpnomCount++;
    }

    //reset declared variables after checks
    $dependantsCount = 1;
    $prevmedCount = 1;
    $gpnomCount = 1;
    $depCount = $_POST["depcounter"];
    $pmCount = $_POST["pmcounter"];
    $medq1Count = $_POST["mq1counter"];
    $medq2Count = $_POST["mq2counter"];
    $medq3Count = $_POST["mq3counter"];
    $medq4Count = $_POST["mq4counter"];
    $gpnCount = $_POST["gpncounter"];
    $members = "";
    // end declare variables

    global $consentanswer;
    global $refconsentanswer;
    global $message;
    global $filename;
    global $apptype1;
    global $apptype2;
    global $apptype3;
    global $apptype4;
    global $apptype5;
    global $apptype6;

    $idNum = $_POST['mainid-number'];
    $optionsnomination = $_POST['optionsconstinp'];
    $emailaddress = $_POST['advisoremail'];
    $emailname = $_POST['advisor-namesurname'];
    $consentanswer = '';

    if(isset($_POST['thirdpartycheckfield']) && isset($_POST['refthirdpartycheckfield'])){
        if($_POST['thirdpartycheckfield'] === 'yes'){$consentanswer = "Yes";}else{$consentanswer = "No";}
        if($_POST['refthirdpartycheckfield'] === 'yes'){$refconsentanswer = "Yes";}else{$refconsentanswer = "No";}
    }
    else{
        $consentanswer = "No";
        $refconsentanswer = "No";
    }
    if($_POST['tcagree'] == "on"){$termsagree = "Yes";}else{$termsagree = "No";}
    if($_POST['memdeclare'] == "on"){ $memagree = "Yes";}else{ $memagree = "No";}
    if($_POST['popi'] == "on"){ $popia = "Yes";}else{ $popia = "No";}
    if($_POST['mainid-pobox'] == "PO BOX"){$poboxanswer = "Yes";}else{$poboxanswer = "No";}
    $expr = '/(?<=\s|^)[a-z]/i';
    $maininitial = preg_match_all($expr, $_POST['main-firstname'], $maininitial1);
    $maininitial = implode('', $maininitial1[0]);
    $maininitial = strtoupper($maininitial);


    // compile full names to check if med questions match members
    $mainfullname = $_POST['main-firstname'].' '.$_POST['main-surname'];

//
// submit data into nexus
//
$subdata = '{
    "membershipApplication": {
        "messageHeader": {
            "identifier": "2b51021d-18a7-4e16-86e1-1110e9af12ad",
            "version": "1.0",
            "timestamp": "2020-08-27T09:18:03.8239451+02:00",
            "author": {
                "name": "WEBUSER"
            },
            "processAsCleanApp": false,
            "attachedDocs": false,
            "source": {
                "name": "EXTRANET",
                "endpoint": "http://www.bonitas.co.za/"
            },
            "destination": {
                "name": "Helios ITS",
                "endpoint": "http://heliosits.com/soa/rest/"
            }
        },
        "messagePayload": {
            "scheme": {
                "schemeCode": "BON",
                "joinDate": "'.$_POST["medstart-date"].'",
                "option": "'.$_POST['option-radio'].'"
            },
            "intermediary": {
                "intermediaryCode": "'.$_POST['broker-code'].'",
                "intermediaryName": "'.$_POST['advisor-brokeragename'].'",
                "contact": {
                    "contactType": "email",
                    "contactValue": "'.$_POST['advisoremail'].'"
                },
                "paypoint": "'.$_POST['advisor-paypointcode'].'"
            },
            "beneficiary": [
                {
                    "memberType": "PM",
                    "relationshipToPrimaryMember": "SELF",
                    "title": "'.$_POST['main-title'].'",
                    "firstNames": "'.$_POST['main-firstname'].'",
                    "initials": "'.$maininitial.'",
                    "surname": "'.$_POST['main-surname'].'",
                    "gender": "'.$_POST['mgender-radio'].'",
                    "dateOfBirth": "'.$_POST['m-dob'].'",
                    "identification": {
                        "idType": "RSA",
                        "idNumber": "'.$_POST['mainid-number'].'"
                    },
                    "language": "'.$_POST['main-lang'].'",
                    "ethnicity": "'.$_POST['m-race'].'",
                    "maritalStatus": "'.$_POST['main-marital'].'",
                    "contact": [
                        {
                            "contactType": "personalMobile",
                            "contactValue": "'.$_POST['m-cell'].'"
                        },';
        if($_POST['m-telw'] !== "" || $_POST['m-telw'] !== "na" || $_POST['m-telw'] !== "NA" || $_POST['m-telw'] !== "n/a" || $_POST['m-telw'] !== "N/A"){
            $subdata .= '{
                            "contactType": "workPhone",
                            "contactValue": "'.$_POST['m-telw'].'"
                        },';
                    }
            $subdata .= '{
                            "contactType": "workEmail",
                            "contactValue": "'.$_POST['m-email'].'"
                        }';
        if($_POST['m-telh'] !== "" || $_POST['m-telw'] !== "na" || $_POST['m-telw'] !== "NA" || $_POST['m-telw'] !== "n/a" || $_POST['m-telw'] !== "N/A"){
            $subdata .= ',{
                            "contactType": "homePhone",
                            "contactValue": "'.$_POST['m-telh'].'"
                        }';
                    }
        $subdata .= '],
                    "address": [
                        {
                            "addressType": "residentialAddress",
                            "streetName": "'.substr($_POST['m-ssname'], 0, 9).'",
                            "streetNumber": "'.$_POST['m-ssnum'].'",
                            "streetType": "'.$_POST['m-sstype'].'",
                            "suburb": "'.$_POST['m-ssuburb'].'",
                            "postalCode": "'.$_POST['m-spostalcode'].'",
                            "townCode": "'.$_POST['mainstowncode'].'",
                            "poBox": null,
                            "buildingName": null,
                            "streetSuffix": null,
                            "suiteNumber": null
                        },';

                        // postal po box
                        if($_POST['mainid-pobox'] == "PO BOX"){
                        $subdata .= '{
                                      "addressType": "postalAddress",
                                      "streetName": null,
                                      "streetNumber": null,
                                      "streetType": null,
                                      "suburb": "'.$_POST['m-psuburb'].'",
                                      "postalCode": "'.$_POST['m-postalcode'].'",
                                      "townCode": "'.$_POST['mainptowncode'].'",
                                      "poBox": "'.$_POST['mainid-pobox'].' '.$_POST['m-psnum'].'",
                                      "buildingName": null,
                                      "streetSuffix": null,
                                      "suiteNumber": null
                        }';
                        }
                        // if not po box, add this
                        else{
                        $subdata .= '{
                                    "addressType": "postalAddress",
                                    "streetName": "'.substr($_POST['m-psname'], 0, 9).'",
                                    "streetNumber": "'.$_POST['m-psnum'].'",
                                    "streetType": "'.$_POST['m-pstype'].'",
                                    "suburb": "'.$_POST['m-psuburb'].'",
                                    "postalCode": "'.$_POST['m-postalcode'].'",
                                    "townCode": "'.$_POST['mainptowncode'].'",
                                    "poBox": null,
                                    "buildingName": null,
                                    "streetSuffix": null,
                                    "suiteNumber": null
                                    }';
                            }
                $subdata .= '],';
    $members .= '"previousMedicalAid": [],';
    $members .= '"conditions": []';
    $subdata .= $members;
    $members = ""; // reset member var for next section
    $subdata .= '}';
    // dependants loop for json
    if($depCount > 0){
          if(count($depsarray) > 0){

        //while loop to create member array
        while($dependantsCount <= $depCount){


            $member = $_POST['d'.$dependantsCount.'-firstname'].' '.$_POST['d'.$dependantsCount.'-surname'];
            $mrtype = $relationshiptype[$_POST['d'.$dependantsCount.'-rel']];
            $mrel = $relationship[$_POST['d'.$dependantsCount.'-rel']];

            $expr = '/(?<=\s|^)[a-z]/i';
            $depinitial = preg_match_all($expr, $_POST['d'.$dependantsCount.'-firstname'], $depinitial1);
            $depinitial = implode('', $depinitial1[0]);
            $depinitial = strtoupper($depinitial);


            $members .= ',{
                "memberType": "'.$mrtype.'",
                "relationshipToPrimaryMember": "'.$mrel.'",
                "title": "'.$_POST['dep'.$dependantsCount.'-title'].'",
                "firstNames": "'.$_POST['d'.$dependantsCount.'-firstname'].'",
                "initials": "'.$depinitial.'",
                "surname": "'.$_POST['d'.$dependantsCount.'-surname'].'",
                "gender": "'.$_POST['d'.$dependantsCount.'-gender-radio'].'",
                "dateOfBirth": "'.$_POST['d'.$dependantsCount.'-dob'].'",
                "identification": {
                    "idType": "RSA",
                    "idNumber": "'.$_POST['d'.$dependantsCount.'-idpass'].'"
                },
                "language": "ENG",
                "ethnicity": "'.$_POST['d'.$dependantsCount.'-race'].'",
                "maritalStatus": "'.$_POST['d'.$dependantsCount.'-marital'].'",
                "contact": [
                    {
                        "contactType": "personalMobile",
                        "contactValue": "'.$_POST['d'.$dependantsCount.'-contact'].'"
                    }
                ],
                "address": [
                    {
                        "addressType": "residentialAddress",
                        "streetName": "'.$_POST['m-ssname'].'",
                        "streetNumber": "'.$_POST['m-ssnum'].'",
                        "streetType": "'.$_POST['m-sstype'].'",
                        "suburb": "'.$_POST['m-ssuburb'].'",
                        "postalCode": "'.$_POST['m-spostalcode'].'",
                        "townCode": "'.$_POST['mainstowncode'].'",
                        "poBox": null,
                        "buildingName": null,
                        "streetSuffix": null,
                        "suiteNumber": null
                    },';

                    // postal po box
                    if($_POST['mainid-pobox'] == "PO BOX"){
                    $members .= '{
                                "addressType": "postalAddress",
                                "streetName": null,
                                "streetNumber": null,
                                "streetType": null,
                                "suburb": "'.$_POST['m-psuburb'].'",
                                "postalCode": "'.$_POST['m-postalcode'].'",
                                "townCode": "'.$_POST['mainptowncode'].'",
                                "poBox": "'.$_POST['mainid-pobox'].' '.$_POST['m-psnum'].'",
                                "buildingName": null,
                                "streetSuffix": null,
                                "suiteNumber": null
                                }';
                    }
                    // no po box
                    else{
                    $members .= '{
                                "addressType": "postalAddress",
                                "streetName": "'.$_POST['m-psname'].'",
                                "streetNumber": "'.$_POST['m-psnum'].'",
                                "streetType": "'.$_POST['m-pstype'].'",
                                "suburb": "'.$_POST['m-psuburb'].'",
                                "postalCode": "'.$_POST['m-postalcode'].'",
                                "townCode": "'.$_POST['mainptowncode'].'",
                                "poBox": null,
                                "buildingName": null,
                                "streetSuffix": null,
                                "suiteNumber": null
                                }';
                    }
            $members .= '],';//closes address
            $members .= '"previousMedicalAid": [],';
            $members .= '"conditions": []';
            $members .= '}';

            $dependantsCount++;

        }
     }
    }

    $subdata .= $members;
  // Bank accounts add
  $subdata .= '],
          "bankAccounts": {
              "bankAccount": [
                  {';
// if($_POST['accsamecontrib'] === 'copy'){
//         $subdata .= '"usage": "A",
//                     "bankName": "'.$_POST['contrib-bankname'].'",
//                     "bankCode": "'.$_POST['contrib-bankname'].'",
//                     "branchName": "'.$_POST['contributionbranchname'].'",
//                     "branchCode": '.$_POST['contributionbranchcode'].',';
//                     if($_POST['thirdpartycheckfield'] === 'no'){
//                     $subdata .= '"accountHolderName": "'.$_POST['contributionaccountholder'].'",';
//                     }
//                     if($_POST['thirdpartycheckfield'] === 'yes'){
//                         $subdata .= '"accountHolderName": "'.$_POST['contrib-accholdname'].' '.$_POST['contrib-accholdsurname'].'",';
//                     }
//         $subdata .= '"accountType": "'.$_POST['contributionaccounttype'].'",
//                     "accountNumber": "'.$_POST['contrib-accnum'].'"
//                   },';
// }
// else{
            $subdata .= '"usage": "Z",
                            "bankName": "'.$refundbankname.'",
                            "bankCode": "'.$_POST['refund-bankname'].'",
                            "branchName": "'.$refundbranchname.'",
                            "branchCode": '.$refundBranchCode.',
                            "accountHolderName": "'.$refundaccountholder.'",';
                            // if($_POST['refthirdpartycheckfield'] === 'no'){
                            // $subdata .= '"accountHolderName": "'.$refundaccountholder.'",';
                            // }
                            // if($_POST['refthirdpartycheckfield'] === 'yes'){
                            //     $subdata .= '"accountHolderName": "'.$_POST['refund-accholdname'].' '.$_POST['refund-accholdsurname'].'",';
                            // }
                $subdata .= '"accountType": "'.$_POST['refundaccounttype'].'",
                            "accountNumber": "'.$_POST['refund-accnum'].'"
                        },';
    // }
    // if($_POST['accsamecontrib'] === 'copy'){
    //     $subdata .= '{
    //                 "usage": "A",
    //                 "bankName": "'.$_POST['contrib-bankname'].'",
    //                 "bankCode": "'.$_POST['contrib-bankname'].'",
    //                 "branchName": "'.$_POST['contributionbranchname'].'",
    //                 "branchCode": '.$_POST['contributionbranchcode'].',';
    //                 if($_POST['thirdpartycheckfield'] === 'no'){
    //                     $subdata .= '"accountHolderName": "'.$_POST['contributionaccountholder'].'",';
    //                 }
    //                 if($_POST['thirdpartycheckfield'] === 'yes'){
    //                     $subdata .= '"accountHolderName": "'.$_POST['contrib-accholdname'].' '.$_POST['contrib-accholdsurname'].'",';
    //                 }
    //     $subdata .= '"accountType": "'.$_POST['contributionaccounttype'].'",
    //                 "accountNumber": "'.$_POST['contrib-accnum'].'"
    //             }';
    // }
    // else{
        $subdata .= '{
                "usage": "D",
                            "bankName": "'.$refundbankname.'",
                            "bankCode": "'.$_POST['refund-bankname'].'",
                            "branchName": "'.$refundbranchname.'",
                            "branchCode": '.$refundBranchCode.',
                            "accountHolderName": "'.$refundaccountholder.'",';
                // if($_POST['thirdpartycheckfield'] !== 'yes'){
                //     $subdata .= '"accountHolderName": "'.$_POST['contributionaccountholder'].'",';
                // }
                // else{
                //     $subdata .= '"accountHolderName": "'.$_POST['[contrib-accholdname'].' '.$_POST['[contrib-accholdsurname'].'",';
                // }
          $subdata .= '"accountType": "'.$_POST['refundaccounttype'].'",
                            "accountNumber": "'.$_POST['refund-accnum'].'"
                        }';
    // }
    $subdata .= ']
            },
            "employment": null
        },
    "Errors": []
    }}';
    $submitdata = str_replace("\n", "",str_replace(" ", "",$subdata));

    $submitdata2 = str_replace('\n', '', json_encode($subdata));
    $submitdata2 = "[" . trim($submitdata2) . "]";
    $submitdata2 = json_decode($submitdata2, true);

    $subdata = json_encode($subdata);
    submitnexus();

    set_time_limit(0);

    // curl submit to nexus
    function submitnexus(){
        $curl = curl_init();
        global $submitdata;
        curl_setopt_array($curl, array(
        CURLOPT_PORT => "443",
        CURLOPT_URL => "https://services.webapi.heliosits.com:443/applications/v1",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => 1,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $submitdata,
        CURLOPT_HTTPHEADER => array(
            "authorization: Atmosphere atmosphere_app_id=\"helioswebapi-4xxbQay6RUo2Prru0pjc0Iq2\"",
            "cache-control: no-cache",
            "content-type: application/json",
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        $infos = curl_getinfo($curl);
        curl_close($curl);

        if ($err) {
        echo "<br>nexus submit error message:<br><br><br>";
        echo "cURL Error #:" . $err;
        // echo "<br><br>";
        // echo "this is curl info :";
        // echo "<br><br>";
        // echo "<pre>";var_dump($infos);
    } else {
        // this is to display what nexus sends back, error checking done here
        global $response2;
        $response2 = $response;
        $response = json_decode($response, true);

        // global $message2;
        global $submitsatus;
        global $errorcode;
        global $errormessage;
        global $membershipmessage;
        global $membershipnumber;
        global $submitqueryid;
        global $errorMsgdisplay;

        $submitsatus = $response['insertOnlineApplicationResponse']['insertOnlineApplicationResult']['OnlineDirectApplication']['Status'];
        if($submitsatus === 'OK'){
            $membershipmessage = $response['insertOnlineApplicationResponse']['insertOnlineApplicationResult']['OnlineDirectApplication']['StatusMessage'];
            $membershipnumber = substr($membershipmessage, -11);
            $submitqueryid = $response['insertOnlineApplicationResponse']['insertOnlineApplicationResult']['OnlineDirectApplication']['QueryID'];
        }
        if($submitsatus === 'ERROR'){
            $errorcode = $response['insertOnlineApplicationResponse']['insertOnlineApplicationResult']['OnlineDirectApplication']['ErrorCode'];
            $membershipmessage = $response['insertOnlineApplicationResponse']['insertOnlineApplicationResult']['OnlineDirectApplication']['StatusMessage'];
            $errorMsgdisplay = '';
            $appLoader = substr($membershipmessage,0,5);
            if($errorcode == 'A001')
            {
            	$errorMsgdisplay = "Date of Birth could not be set, ID validation is invalid";
            }
            if($errorcode == "ORC001" && $appLoader == 'Appli') 
            {
            	$errorMsgdisplay = "Member already exist / Duplicate dependent in the system.";
            }
            if($errorcode == 'ORC001' && $appLoader == 'Batch')
            {
            	$errorMsgdisplay = "Paypoint code is not valid";
            }
            $errormessage = $response2;
        }
    }
}
//
$userId = $_POST['userid'];

$get_status = mysqli_query($conn,"SELECT status FROM grp_advisors WHERE user_id = $userId");
$result = mysqli_fetch_row($get_status);


if($result[0] != '1')
{
    
	if($submitsatus == 'ERROR')
	{
	    $status = -1;
	    $sql = "UPDATE grp_advisors SET status = '$status', errormessage = '$errormessage', errorcode = '$errorcode' WHERE user_id = '$userId'";
	    
        if(mysqli_query($conn, $sql)){
		echo "Record has been updated successfully !";
	    }else{
		echo "Error: " . $sql . ":-" . mysqli_error($conn);
	    }
	}else if($submitsatus == 'OK')
	{
	    $status = 1;
	    $sql = "UPDATE grp_advisors SET status = '$status', reference_id
	     = '$submitqueryid', membership_num = '$membershipnumber' WHERE user_id = '$userId'";
	    if(mysqli_query($conn, $sql)){
		echo "Record has been updated successfully !";
	    }else{
		echo "Error: " . $sql . ":-" . mysqli_error($conn);
	    }
	}else{
	    echo "<p style='color: #ba0c35; font-weight: 800;'>There's an error reaching nexus system, Please ensure all required data is submitted.</p>";
        $status = -1;
        $sql = "UPDATE grp_advisors SET status = '$status', errormessage = 'Error reaching Nexus Submission', errorcode = 'F1001' WHERE user_id = '$userId'";
        
        if(mysqli_query($conn, $sql)){
        echo "<p style='color: green; font-weight: 800'>This record was saved in additional info summary table!</p>";
        }else{
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
	}
}else
{
	echo "This Member already has a successful application already and has not been updated";
}
 
//Advisors Update Ends
// end submit data into nexus
//@vincent file application type settings for nexus uploads
// com 1 upload
if($_FILES['com1upload']['name']){
    $file = new SplFileInfo($_FILES['com1upload']['name']);
    $filext = $file->getExtension();

    if($filext === 'pdf'){
        $apptype1 = 'application/pdf';
    }
    if($filext === 'doc' || $filext === 'docx'){
        $apptype1 = 'application/msword';
    }
    if($filext === 'jpeg' || $filext === 'jpg'){
        $apptype1 = 'image/jpeg';
    }
    if($filext === 'png'){
        $apptype1 = 'image/png';
    }

    $dir = "./uploads/";
    $filename1 = $membershipnumber.'-'.$submitqueryid;
    $filesname1 = $filename1.'-com1.'.$filext;
    $uploadfilename1 = $dir.$filename1.'-com1.'.$filext;

    // var_dump($_FILES);

    if(move_uploaded_file($_FILES['com1upload']['tmp_name'], $uploadfilename1)){
        // echo "<p>File was uploaded : ".$uploadfilename1."</p>";
    }
    else{
        echo "<p>Upload failed : ".$_FILES['com1upload']['name']."</p>";
    }
}
// com 2 upload
if($_FILES['com2upload']['name']){
    $file = new SplFileInfo($_FILES['com2upload']['name']);
    $filext = $file->getExtension();

    if($filext === 'pdf'){
        $apptype2 = 'application/pdf';
    }
    if($filext === 'doc' || $filext === 'docx'){
        $apptype2 = 'application/msword';
    }
    if($filext === 'jpeg' || $filext === 'jpg'){
        $apptype2 = 'image/jpeg';
    }
    if($filext === 'png'){
        $apptype2 = 'image/png';
    }

    $dir = "./uploads/";
    $filename2 = $membershipnumber.'-'.$submitqueryid;
    $filesname2 = $filename2.'-com2.'.$filext;
    $uploadfilename2 = $dir.$filename2.'-com2.'.$filext;

    // var_dump($_FILES);

    if(move_uploaded_file($_FILES['com2upload']['tmp_name'], $uploadfilename2)){
        // echo "<p>File was uploaded : ".$uploadfilename2."</p>";
    }
    else{
        echo "<p>Upload failed : ".$_FILES['com2upload']['name']."</p>";
    }
}
// com 3 upload
if($_FILES['com3upload']['name']){
    $file = new SplFileInfo($_FILES['com3upload']['name']);
    $filext = $file->getExtension();

    if($filext === 'pdf'){
        $apptype3 = 'application/pdf';
    }
    if($filext === 'doc' || $filext === 'docx'){
        $apptype3 = 'application/msword';
    }
    if($filext === 'jpeg' || $filext === 'jpg'){
        $apptype3 = 'image/jpeg';
    }
    if($filext === 'png'){
        $apptype3 = 'image/png';
    }

    $dir = "./uploads/";
    $filename3 = $membershipnumber.'-'.$submitqueryid;
    $filesname3 = $filename3.'-com3.'.$filext;
    $uploadfilename3 = $dir.$filename3.'-com3.'.$filext;

    // var_dump($_FILES);

    if(move_uploaded_file($_FILES['com3upload']['tmp_name'], $uploadfilename3)){
        // echo "<p>File was uploaded : ".$uploadfilename3."</p>";
    }
    else{
        echo "<p>Upload failed : ".$_FILES['com3upload']['name']."</p>";
    }
}
// com 4 upload
if($_FILES['com4upload']['name']){
    $file = new SplFileInfo($_FILES['com4upload']['name']);
    $filext = $file->getExtension();

    if($filext === 'pdf'){
        $apptype4 = 'application/pdf';
    }
    if($filext === 'doc' || $filext === 'docx'){
        $apptype4 = 'application/msword';
    }
    if($filext === 'jpeg' || $filext === 'jpg'){
        $apptype4 = 'image/jpeg';
    }
    if($filext === 'png'){
        $apptype4 = 'image/png';
    }

    $dir = "./uploads/";
    $filename4 = $membershipnumber.'-'.$submitqueryid;
    $filesname4 = $filename4.'-com4.'.$filext;
    $uploadfilename4 = $dir.$filename4.'-com4.'.$filext;

    // var_dump($_FILES);

    if(move_uploaded_file($_FILES['com4upload']['tmp_name'], $uploadfilename4)){
        // echo "<p>File was uploaded : ".$uploadfilename4."</p>";
    }
    else{
        echo "<p>Upload failed : ".$_FILES['com4upload']['name']."</p>";
    }
}
// com 5 upload
if($_FILES['com5upload']['name']){
    $file = new SplFileInfo($_FILES['com5upload']['name']);
    $filext = $file->getExtension();

    if($filext === 'pdf'){
        $apptype5 = 'application/pdf';
    }
    if($filext === 'doc' || $filext === 'docx'){
        $apptype5 = 'application/msword';
    }
    if($filext === 'jpeg' || $filext === 'jpg'){
        $apptype5 = 'image/jpeg';
    }
    if($filext === 'png'){
        $apptype5 = 'image/png';
    }

    $dir = "./uploads/";
    $filename5 = $membershipnumber.'-'.$submitqueryid;
    $filesname5 = $filename5.'-com5.'.$filext;
    $uploadfilename5 = $dir.$filename5.'-com5.'.$filext;

    // var_dump($_FILES);

    if(move_uploaded_file($_FILES['com4upload']['tmp_name'], $uploadfilename5)){
        // echo "<p>File was uploaded : ".$uploadfilename5."</p>";
    }
    else{
        echo "<p>Upload failed : ".$_FILES['com5upload']['name']."</p>";
    }
}
// third party consent upload
if($_FILES['consentupload']['name']){
    $file = new SplFileInfo($_FILES['consentupload']['name']);
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
    $filename6 = $membershipnumber.'-'.$submitqueryid;
    $filesname6 = $filename6.'-thirdpartyconsent.'.$filext;
    $uploadfilename6 = $dir.$filename6.'-thirdpartyconsent.'.$filext;

    // var_dump($_FILES);

    if(move_uploaded_file($_FILES['consentupload']['tmp_name'], $uploadfilename6)){
        // echo "<p>File was uploaded : ".$uploadfilename6."</p>";
    }
    else{
        echo "<p>Upload failed : ".$_FILES['consentupload']['name']."</p>";
    }
}

$mainidvalid = json_decode($_POST['idvalidnotice'], true);
if($mainidvalid['homeAffairsNoPhoto']['inputIDPassedCDV'] === true){$maincdv = 'Passed';} if($mainidvalid['homeAffairsNoPhoto']['idExists'] === true){$mainidexists = "ID Number Exists";}
$mainidvalid = 'inputIDPassedCDV : '.$maincdv.'<span style="margin-left: 50px;">idExists : '.$mainidexists.'</span>';


$message = '<div style="width:100%;background: #d4d4d4;"><table style="width:100%" CELLSPACING=0>
<tr style="background: #ffffff;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><img src="http://forms.afrocentricds.com/BonLogo2.png" width="200px"/></td></tr>';
if($submitsatus === 'OK'){
$message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Submission Details</h3></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Captured by</td><td style="padding: 0 10px;">'. $_POST['capturedname'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Submit Status</td><td style="padding: 0 10px;color: #339100;">'. $submitsatus .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Membership Message and Number</td><td style="padding: 0 10px;color: #339100;">'. $membershipmessage .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Query ID</td><td style="padding: 0 10px;color: #339100;">'. $submitqueryid .'</td></tr>';
$message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
}
else{
$message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Submission Details</h3></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Submit Status</td><td style="padding: 0 10px;color: #9d0000;">'. $submitsatus .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Error Code</td><td style="padding: 0 10px;color: #9d0000;">'. $errorcode .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Error Message</td><td style="padding: 0 10px;color: #9d0000;">'. $errorMsgdisplay .'</td></tr>';
$message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
}
$message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Broker Details</h3></td></tr>
<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Brokerage Name</td><td style="padding: 0 10px;">'. $_POST['advisor-brokeragename'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Broker Name</td><td style="padding: 0 10px;">'. $_POST['advisor-namesurname'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Broker Code</td><td style="padding: 0 10px;">'. $_POST['broker-code'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Paypoint Code</td><td style="padding: 0 10px;">'. $_POST['advisor-paypointcode'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Broker Email</td><td style="padding: 0 10px;">'. $_POST['advisoremail'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Broker Telephone</td><td style="padding: 0 10px;">'. $_POST['advisor-tel'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical aid join date</td><td style="padding: 0 10px;">'. $_POST['medstart-date'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Options Details</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Selected option code</td><td style="padding: 0 10px;">'. $policyoptions[$_POST['option-radio']] .' - '.$_POST['option-radio'].'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Main Member Details</h3></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Title</td><td style="padding: 0 10px;">'. $_POST['main-title'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Surname</td><td style="padding: 0 10px;">'. $_POST['main-surname'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Name</td><td style="padding: 0 10px;">'. $_POST['main-firstname'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Initials</td><td style="padding: 0 10px;">'. $maininitial .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID / Passport Number</td><td style="padding: 0 10px;">'. $_POST['mainid-number'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID Validation Notice</td><td style="padding: 0 10px;word-break: break-all; whitespace:normal;"><p>'. $_POST['idvalidnotice'] .'</p></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Marital Status</td><td style="padding: 0 10px;">'. $_POST['main-marital'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Gender</td><td style="padding: 0 10px;">'. $_POST['mgender-radio'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Date of Birth</td><td style="padding: 0 10px;">'. $_POST['m-dob'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Age</td><td style="padding: 0 10px;">'. $_POST['main-age'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Language</td><td style="padding: 0 10px;">English</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Ethnicity</td><td style="padding: 0 10px;">'. $_POST['m-race'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Dependants</td><td style="padding: 0 10px;">'. $_POST['m-deps-radio'] .'</td></tr>';
  if(isset($_POST['mtax'])){
    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Tax number</td><td style="padding: 0 10px;">'. $_POST['mtax'] .'</td></tr>';
  }
  $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Employer</td><td style="padding: 0 10px;">'. $_POST['main-employer'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Employee / Persal Numer</td><td style="padding: 0 10px;">'. $_POST['main-employeeNumber'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Employment Date</td><td style="padding: 0 10px;">'. $_POST['main-employeDate'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Department</td><td style="padding: 0 10px;">'. $_POST['main-department'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Main Member -ails</h3></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Cellphone</td><td style="padding: 0 10px;">'. $_POST['m-cell'] .'</td></tr>';
if($_POST['m-telh'] != ''){
  $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Telephone(h)</td><td style="padding: 0 10px;">'. $_POST['m-telh'] .'</td></tr>';
}
if($_POST['m-telw'] != ''){
  $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Telephone(w)</td><td style="padding: 0 10px;">'. $_POST['m-telw'] .'</td></tr>';
}
$message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Email</td><td style="padding: 0 10px;">'. $_POST['m-email'] .'</td></tr>';
$message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Is it a PO Box?</td><td style="padding: 0 10px;">'. $poboxanswer .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Postal Number</td><td style="padding: 0 10px;">'. $_POST['m-psnum'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Postal Street Name</td><td style="padding: 0 10px;">'. $_POST['m-psname'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Postal Street Type</td><td style="padding: 0 10px;">'. $_POST['m-pstype'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Postal Suburb</td><td style="padding: 0 10px;">'. $_POST['m-psuburb'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Postal Code</td><td style="padding: 0 10px;">'. $_POST['m-postalcode'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Town Code</td><td style="padding: 0 10px;">'. $_POST['mainptowncode'] .'</td></tr>';
if(!empty($depsarray)){
        $dependantsCount = 1;
    while($dependantsCount <= $depCount){
        $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Dependant '.$dependantsCount.' Details</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Title</td><td style="padding: 0 10px;">'. $_POST['dep'.$dependantsCount.'-title'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name</td><td style="padding: 0 10px;">'. $_POST['d'.$dependantsCount.'-firstname'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Surname</td><td style="padding: 0 10px;">'. $_POST['d'.$dependantsCount.'-surname'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID / Passport Number</td><td style="padding: 0 10px;">'. $_POST['d'.$dependantsCount.'-idpass'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID Validation Notice</td><td style="padding: 0 10px;word-break: break-all; whitespace:normal;"><p>'. $_POST['d'.$dependantsCount.'-idvalidnotice'] .'</p></td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Date of Birth</td><td style="padding: 0 10px;">'. $_POST['d'.$dependantsCount.'-dob'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Age</td><td style="padding: 0 10px;">'. $_POST['d'.$dependantsCount.'-age'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Marital Status</td><td style="padding: 0 10px;">'. $_POST['d'.$dependantsCount.'-marital'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Ethnicity</td><td style="padding: 0 10px;">'. $_POST['d'.$dependantsCount.'-race'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Gender</td><td style="padding: 0 10px;">'. $_POST['d'.$dependantsCount.'-gender-radio'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Relationship to main memeber</td><td style="padding: 0 10px;">'. $mrel .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Relationship type</td><td style="padding: 0 10px;">'. $mrtype .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Telephone number</td><td style="padding: 0 10px;">'. $_POST['d'.$dependantsCount.'-contact'] .'</td></tr>';

        if(isset($_POST['d'.$dependantsCount.'tax'])){
            $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Tax number</td><td style="padding: 0 10px;">'. $_POST['d'.$dependantsCount.'tax'] .'</td></tr>';
        }
        $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
                    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
                        $dependantsCount++;
    }
}
$message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Banking Details</h3></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Is this a third party account</td><td style="padding: 0 10px;">'. $consentanswer .'</td></tr>';
$message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
$message .='<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Refunds</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Bank Name</td><td style="padding: 0 10px;">'. $_POST['refund-bankname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Branch Name</td><td style="padding: 0 10px;">'. $refundbranchname .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Branch Code</td><td style="padding: 0 10px;">'. $refundBranchCode .'</td></tr>';
$message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Number</td><td style="padding: 0 10px;">'. $_POST['refund-accnum'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account type</td><td style="padding: 0 10px;">'. $_POST['refundaccounttype'] .'</td></tr>';
if(!empty($gpnarray) && !empty($mq1array)){

    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">GP Nominations</h3></td></tr>';
        $gpnomCount = 1;
    while($gpnomCount <= $gpnCount){
        $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Member '.$gpnomCount.' nominations</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['gpnow'.$gpnomCount.'-mnamesurname'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow'.$gpnomCount.'-mdocname1'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow'.$gpnomCount.'-mprcnum1'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow'.$gpnomCount.'-mdocname2'] .'</td></tr>
        <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow'.$gpnomCount.'-mprcnum2'] .'</td></tr>';
        $gpnomCount++;
    }
}
  $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
  <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Declaration</h3></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Agreed to Terms and Conditions</td><td style="padding: 0 10px;">'. $termsagree .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Date of Agreement</td><td style="padding: 0 10px;">'. $_POST['advisor-date'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Main Members Full Name</td><td style="padding: 0 10px;">'. $_POST['advisor-memfullname'] .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Member Agreed</td><td style="padding: 0 10px;">'. $memagree .'</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">I agree that Bonitas, Medscheme and its Contracted Third Parties may contact and provide Me and My Dependants with information about insurance, lifestyle rewards and products which have been negotiated on Your behalf by Bonitas. </br></br>Your consent, along with that of Your dependants, to the disclosure of Your Personal information is protected by the Protection of Personal Information Act, 4 of 2013 (which came into effect on 1 July 2020) (“POPIA”) and will principally be governed by the POPIA, as well as any other Applicable Data Protection Legislation of the Republic of South Africa.</br></br>You have the right to inform Us when You do not want to receive any automated direct-marketing information and You may opt out of receiving such information by using the unsubscribe / opt out options on the Platforms. I Agree</td><td style="padding: 0 10px;">'. $popia .'</td></tr>
  </table>
  </div>';

// @vincent check if this works on qa environment by uncommenting
// Include mpdf library file
// require_once __DIR__ . '/vendor/autoload.php';
// $mpdf = new Mpdf();

// // creating summary pdf for email
//DOMPDF starts================================================

 
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

$dompdf->load_html($message);
$dompdf->set_paper(array(0,0,975,1316), "portrait" );
$dompdf->render();

$output = $dompdf->output();

//DOMPDF Ends=====================================================
//Additional Uploads
if($submitsatus == 'OK')
{
?>
    <div class="full text flexrow" id="uploads">
        <div class="full text flexrow">
            <p>Additional Uploads for documents such as :</p>
            <ul>
                <li>Copy of ID</li>
                <li>Copy of Passport</li>
                <li>Copy of Marriage Certificate</li>
                <li>Proof of Registration (if Dependent is a student)</li>
                <li>Bank Statement for Third Party Account/ Company Account</li>
                <li>Etc.</li>
            </ul>
        </div>
        <form action="#" id="uploads" method="POST" enctype="multipart/form-data">
        <div class="input-field">
                <input class="multiple" id="multiple" multiple name="files[]" type="file"/>
                <p id="messages"></p>
                <input name="mainid" id="mainid" value="<?php echo $idNum; ?>" hidden/>
                <input name="memnum" id="memnum" value="<?php echo $membershipnumber; ?>" hidden/>
                <input name="refid" id="refid" value="<?php echo $submitqueryid; ?>" hidden/>
        </div>
        <div class="input-field">
            <input type="button" id="upload" value="upload">
        </form>
        <script>
            $(document).ready(function(){
                $('input.multiple').MultiFile({
                    accept: 'pdf|docx|doc|jpeg|png|jpg',
                    max: 6
                });
                $('#upload').on('click', function(e){
                    e.preventDefault();
                    var form_data = new FormData($(this).parents('form')[0]);
                    var file_data;
                    file_data.append('files',form_data)
                    var idnum = document.getElementById('mainid').value;
                    var memnum = document.getElementById('memnum').value;
                    var refid = document.getElementById('refid').value;
                    file_data.append('idnum',idnum);
                    file_data.append('memnum',memnum);
                    file_data.append('refid',refid);
                    console.log(file_data);
                    
                    $.ajax({
                        url: "file_uploads.php",
                        dataType: "text",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: file_data,
                        type: "POST",
                        success: function(response){
                            toastr.success(response);
                        },
                        error:function(response){
                            toastr.error(response);
                        }
                    })
                })
            });
        </script>
    </div>

<?php
}
//End of Editional Uploads

echo $message;
// echo "<br><br><br>Submitted Data Printout for live testing<br><br>";
// echo "<pre>".var_dump($submitdata2)."</pre>";
// echo "<br><br><br>Nexus Response for live testing<br><br>";
// echo $response2;

global $uploads;
if($submitsatus != 'OK')
{
    $filename = "ERROR- ". $_POST['mainid-number'].'-summary.pdf';
}else{
    $filename = $_POST['mainid-number'].'-summary.pdf';
}
    function sendEmail($output){
        //Create an instance; passing `true` enables exceptions
        if($submitsatus != 'OK')
        {
            $filename = "ERROR- ". $_POST['mainid-number'].'-summary.pdf';
        }else{
            $filename = $_POST['mainid-number'].'-summary.pdf';
        }
        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
            $mail->isSMTP();                                             //Send using SMTP
            $mail->Host       = 'SMTP.office365.com';                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
            $mail->Username   = 'forms@afrocentricds.com';               //SMTP username
            $mail->Password   = 'B0n!tas@123';                           //SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
            $mail->Port       = 587;                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            global $emailaddress;
            global $emailname;
            //Recipients
            $mail->setFrom('forms@afrocentricds.com', 'Bonitas Applications');
            $mail->addAddress($emailaddress, $emailname);     //Add a recipient
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // global $filename;
            //Attachments
            $mail->addStringAttachment($output,$filename);
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Application Membership Number- '.$membershipnumber."- Reference ID".$submitqueryid;
            $mail->Body    = 'This is an email to confirm an application has been made.';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $messagestatus = "sent";
            //echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    function sendMembership($output){
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $filename = $_POST['mainid-number'].'-summary.pdf';
        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Enable verbose debug output
            $mail->isSMTP();                                             //Send using SMTP
            $mail->Host       = 'SMTP.office365.com';                    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                    //Enable SMTP authentication
            $mail->Username   = 'forms@afrocentricds.com';               //SMTP username
            $mail->Password   = 'B0n!tas@123';                           //SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
            $mail->Port       = 587;                                      //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            global $emailaddress;
            global $emailname;
            //Recipients
            $mail->setFrom('forms@afrocentricds.com', 'Bonitas Applications');
            $mail->addAddress('leads@afrocentricds.com', 'Online Form');     //Add a recipient
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            // global $filename;
            //Attachments
            $mail->addStringAttachment($output,$filename);
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            
            $mail->Subject = 'Online member application for ID Number'.$_POST['mainid-number'];
            $mail->Body    = 'This is an email to confirm an application has been made.';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            $messagestatus = "sent";
            echo 'Message has been sent, if you do not recieve your email shortly please ensure to save this page as a PDF.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    // create, save and binary the pdf message
    //set pdf creation variables
    
    //$spdf = $dompdf->Output('uploads/'.$filename, 'F');
    $filename = $_POST['mainid-number'].'-summary.pdf';
    file_put_contents("C:/xampp/htdocs/doss_hub/public/includes/uploads/".$filename, $dompdf->output());
    $summary = file_get_contents('C:/xampp/htdocs/doss_hub/public/includes/uploads/'.$filename);
    $path = 'C:/xampp/htdocs/doss_hub/public/includes/uploads/'.$filename;
    $summaryxt = pathinfo($path, PATHINFO_EXTENSION);
    // echo "here is your file extension" . $summaryxt;
    
    if($summaryxt === 'pdf'){
        $apptype = 'application/pdf';
    }
    if($summaryxt === 'doc' || $summaryxt === 'docx'){
        $apptype = 'application/msword';
    }
    if($summaryxt === 'jpeg' || $summaryxt === 'jpg'){
        $apptype = 'image/jpeg';
    }
    if($summaryxt === 'png'){
        $apptype = 'image/png';
    }
    $summarybinary = base64_encode($summary);
    $summaryupload = '{
        "resourceType": "Binary",
        "id": "'.$filename.'",
        "contentType": "'.$summaryxt.'",
        "content": "'.$summarybinary.'"
    }';

    $files = mysqli_query($conn,"SELECT * FROM tbl_banks_contributions WHERE 'user_id' = $userId");
    $file_result = mysqli_fetch_row($files);
    
    if ($file_result['consentupload'] != '' || $file_result['consentupload'] != null) {
        $file = file_get_contents('uploads/'.$file_result['consentupload']);
        $filext = $file1->getExtension();     
    
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
        $uploadbinaryconsent = base64_encode($file);
        $uploadconsent = '{
            "resourceType": "Binary",
            "id": "'.$file.'",
            "contentType": "'.$filext.'",
            "content": "'.$uploadbinaryconsent.'"
        }';
    }
        
    // com 1 upload
    $files = "SELECT comupload FROM tbl_medical_scheme WHERE 'user_id' = $userId";
    $file_result = mysqli_query($conn, $files);
    
    if (mysqli_num_rows($file_result) > 0) {
      // output data of each row
      $rowcount = mysqli_num_rows($file_result);
      $count = 1;
      while($row = mysqli_fetch_assoc($file_result)) {
        $file = $row['comupload'];
        $file1 = file_get_contents('uploads/'.$file);
        $filext = $file1->getExtension();     
    
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
    
        $datefiles = date('Y-m-d\TH:i:s.s');
        $uploadbinary = base64_encode($file1);
    
        $collectionstart = '{
            "resourceType": "Bundle",
            "meta": {
            },
            "versionId": "1",
            "lastUpdated": "'.$datefiles.'",
            "type": "collection",
            "entry": [';
        
            $uploadpdf = '{
                "resourceType": "Binary",
                "id": "'.$file.'",
                "contentType": "'.$filext.'",
                "content": "'.$uploadbinary.'"
            }';
        
            $collectionend = ']
            }';
    
            $uploads = $collectionstart;
            $uploads .= '{"resource": ';
            $uploads .= $uploadpdf;
            $uploads .= '}';
            if($count < $rowcount && $rowcount >= 1){
                $uploads .= ',';
            } else{
                if($uploadbinaryconsent != '' || $uploadbinaryconsent != null)
                {
                    $uploads .= ',';
                    $uploads .= '{"resource": ';
                    $uploads .= $uploadconsent;
                    $uploads .= '}';
                }
                $uploads .= ',';
                $uploads .= '{"resource": ';
                $uploads .= $summaryupload;
                $uploads .= '}';
                $uploads .= $collectionend;
            }
           
            $count++;
      }
    } else {
      echo "0 results";
    }
    
    

    // $file = file_get_contents('http://forms.afrocentricds.com/uploads/'.$filename); // this is test values
    // echo $uploadbinary;

    // json building for nexus file upload api
    

    // echo "<br><br><br>file upload json : <br><br>";
    // echo $uploads;
    // echo "<br><br><br>files details : <br><br>";
    // var_dump($_FILES);

        $uploadurl = "https://services.webapi.heliosits.com:443/fhir/v3/applications/".$membershipnumber."/documents?dependantNumber=00&queryId=".$submitqueryid."";
        // $uploadurl = "/fhir/v3/dev/memberships/BON/".$membershipnumber."/documents?dependantNumber=00";
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_PORT => "443",
        CURLOPT_URL => $uploadurl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $uploads,
        CURLOPT_HTTPHEADER => array(
            "authorization: Atmosphere atmosphere_app_id=\"helioswebapi-4xxbQay6RUo2Prru0pjc0Iq2\"",
            "cache-control: no-cache",
            "content-type: application/json"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        // response from nexus when uploading files good for file upload error checking
        // echo $response;
        // echo "<br><br>This is the json passed :<br><br>".$uploads;
        // echo 'File has been uploaded';
        }

    // create and send pdf via email
    //$pdf = $mpdf->Output($filename, 'S');

    sendEmail($output);
    sendMembership($output);

    // Insert into CSV
    // $file_name = 'shortenedsubs.csv';
    // if($submitsatus == 'OK'){
    //     if (file_exists($file_name)){
    //             // echo 'file found!';
    //             $no_row = count(file($file_name));
    //             // echo 'number of rows'.$no_row;
    //             if($no_row <= 0){
    //                 $data = [
    //                     ['Submit Status', 'Membership Number', 'Query Number', 'Member Name', 'Member Surname', 'Member ID Number', 'Broker Code', 'Broker Name', 'Brokerage Name', 'Submission Date', 'Captured by', 'ID Validation String', 'Bank Validation String'],
    //                     [''.$submitsatus.'', ''.$membershipnumber.'', ''.$submitqueryid.'', ''.$_POST['main-firstname'].'', ''.$_POST['main-surname'].'', ''.$_POST['mainid-number'].'', ''.$_POST['broker-code'].'', ''.$_POST['advisor-namesurname'].'', ''.$_POST['advisor-brokeragename'].'', ''.$date.'', ''.$_POST['capturedname'].'', ''.$_POST['idvalidnotice'].'', ''.$_POST['contribverification'].''],
    //                 ];

    //             $writefile = fopen($file_name,'w');
    //             }
    //             else{
    //                 $data = [
    //                     [''.$submitsatus.'', ''.$membershipnumber.'', ''.$submitqueryid.'', ''.$_POST['main-firstname'].'', ''.$_POST['main-surname'].'', ''.$_POST['mainid-number'].'', ''.$_POST['broker-code'].'', ''.$_POST['advisor-namesurname'].'', ''.$_POST['advisor-brokeragename'].'', ''.$date.'', ''.$_POST['capturedname'].'', ''.$_POST['idvalidnotice'].'', ''.$_POST['contribverification'].''],
    //                 ];

    //             $writefile = fopen($file_name,'a');
    //             }
    //             // write each row at a time to a file

    //             foreach ($data as $row) {
    //                 // fwrite($writefile, $row);
    //                 fputcsv($writefile, $row);
    //             }
    //             fclose($writefile);
    //     }
    //     else{
    //             echo '<br><br><span style="color: #9d0000;"><strong>CSV Add Error :</strong></span><br><span style="color: #9d0000;">shortenedsubs.csv does not exist</span>';
    //     }
    // }

// else{
//     echo "There was an error submitting the application";

//     $message =  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Submission Details</h3></td></tr>
//     <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Submit Status</td><td style="padding: 0 10px;color: #339100;">'. $submitsatus .'</td></tr>
//     <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Membership Message and Number</td><td style="padding: 0 10px;color: #339100;">'. $membershipmessage .'</td></tr>
//     <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Query ID</td><td style="padding: 0 10px;color: #339100;">'. $submitqueryid .'</td></tr>
//     <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
//     <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';

//     echo $message;
// }


?>
    </body>
</html>
<!-- @endsection -->
