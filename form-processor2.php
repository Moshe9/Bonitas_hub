    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/nav.css">
        <link rel="stylesheet" type="text/css" href="../frontend/fonts/font-awesome/css/font-awesome.min.css">
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
                        <a href="http://bonitasmedicalfund.co.za/hub-home" class="brand-logo"></a>
                        <ul class="right hide-on-med-and-down">
                                            <li><a href="http://bonitasmedicalfund.co.za/hub-home">HOME</a></li>
                                            <li><a href="http://bonitasmedicalfund.co.za/marketing-elements">MARKETING ELEMENTS</a></li>
                            <li><a href="http://bonitasmedicalfund.co.za/query">GOT A QUERY?</a></li>
                            <li><a href="http://bonitasmedicalfund.co.za/my-account/11">MY ACCOUNT</a></li>
                            <li><a href="http://bonitasmedicalfund.co.za/logout"><i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
    </body>
    </html>
<?php
// if(!isset($_POST['submit'])){
//     echo "An error occured please go back and try again. Sorry for any inconvenience caused.";
// }
// print_r($_POST);
// print_r($_FILES);
// Files required to PDF and Email
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;


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



// Body message and data
$mdob = substr($_POST['mainid-number'], 0, 6);
$mdob2 = date_create_from_format('ymd', $mdob);
$mdob2 = date_format($mdob2, 'Y-m-d');// Set current date
$date = date('Y-m-d');
if ($mdob2 > $date) {
  $mdob2 = $mdob2 - 100;
}
$newmdob = $mdob2;
// if($_POST['thirdpartycheckfield'] === 'yes'){
// echo 'accoutn full name : '.$_POST['contrib-accholdname'].' '.$_POST['contrib-accholdsurname'];}
// rel type setting

if($_POST['d1-rel'] === 'SPO'){
    $d1Type ='ADEP';
    $d1relation = 'SPO';
}
if($_POST['d1-rel'] === 'DSPO'){
    $d1Type ='ADEP';
    $d1relation = 'DSPO';
}
if($_POST['d1-rel'] === 'CLSPO'){
    $d1Type ='ADEP';
    $d1relation = 'CLSPO';
}
if($_POST['d1-rel'] === 'PAR'){
    $d1Type ='ADEP';
    $d1relation = 'PAR';
}
if($_POST['d1-rel'] === 'OTHER'){
    $d1Type ='ADEP';
    $d1relation = 'OTHER';
}
if($_POST['d1-rel'] === 'CHI'){
    $d1Type ='CDEP';
    $d1relation = 'CHI';
}
if($_POST['d1-rel'] === 'CHISTU'){
    $d1Type ='STU';
    $d1relation = 'CHI';
}
if($_POST['d1-rel'] === 'FCHI'){
    $d1Type ='CDEP';
    $d1relation = 'FCHI';
}
if($_POST['d1-rel'] === 'CHIADO'){
    $d1Type ='CDEP';
    $d1relation = 'CHI';
}
if($_POST['d1-rel'] === 'DCHI'){
    $d1Type ='ADEP';
    $d1relation = 'DCHI';
}
if($_POST['d1-rel'] === 'DCHIC'){
    $d1Type ='CDEP';
    $d1relation = 'DCHI';
}
if($_POST['d1-rel'] === 'OCHI'){
    $d1Type ='ADEP';
    $d1relation = 'OCHI';
}
if($_POST['d1-rel'] === 'GCHI'){
    $d1Type ='CDEP';
    $d1relation = 'GCHI';
}
if($_POST['d1-rel'] === 'SIBC'){
    $d1Type ='CDEP';
    $d1relation = 'SIB';
}
if($_POST['d1-rel'] === 'SIBA'){
    $d1Type ='ADEP';
    $d1relation = 'SIB';
}
if($_POST['d1-rel'] === 'OTHERA'){
    $d1Type ='ADEP';
    $d1relation = 'OTHER';
}
if($_POST['d1-rel'] === 'OTHERC'){
    $d1Type ='CDEP';
    $d1relation = 'OTHER';
}

///

if($_POST['d2-rel'] === 'SPO'){
    $d2Type ='ADEP';
    $d2relation = 'SPO';
}
if($_POST['d2-rel'] === 'DSPO'){
    $d2Type ='ADEP';
    $d2relation = 'DSPO';
}
if($_POST['d2-rel'] === 'CLSPO'){
    $d2Type ='ADEP';
    $d2relation = 'CLSPO';
}
if($_POST['d2-rel'] === 'PAR'){
    $d2Type ='ADEP';
    $d2relation = 'PAR';
}
if($_POST['d2-rel'] === 'OTHER'){
    $d2Type ='ADEP';
    $d2relation = 'OTHER';
}
if($_POST['d2-rel'] === 'CHI'){
    $d2Type ='CDEP';
    $d2relation = 'CHI';
}
if($_POST['d2-rel'] === 'CHISTU'){
    $d2Type ='STU';
    $d2relation = 'CHI';
}
if($_POST['d2-rel'] === 'FCHI'){
    $d2Type ='CDEP';
    $d2relation = 'FCHI';
}
if($_POST['d2-rel'] === 'CHIADO'){
    $d2Type ='CDEP';
    $d2relation = 'CHI';
}
if($_POST['d2-rel'] === 'DCHI'){
    $d2Type ='ADEP';
    $d2relation = 'DCHI';
}
if($_POST['d2-rel'] === 'DCHIC'){
    $d2Type ='CDEP';
    $d2relation = 'DCHI';
}
if($_POST['d2-rel'] === 'OCHI'){
    $d2Type ='ADEP';
    $d2relation = 'OCHI';
}
if($_POST['d2-rel'] === 'GCHI'){
    $d2Type ='CDEP';
    $d2relation = 'GCHI';
}
if($_POST['d2-rel'] === 'SIBC'){
    $d2Type ='CDEP';
    $d2relation = 'SIB';
}
if($_POST['d2-rel'] === 'SIBA'){
    $d2Type ='ADEP';
    $d2relation = 'SIB';
}
if($_POST['d2-rel'] === 'OTHERA'){
    $d2Type ='ADEP';
    $d2relation = 'OTHER';
}
if($_POST['d2-rel'] === 'OTHERC'){
    $d2Type ='CDEP';
    $d2relation = 'OTHER';
}

///

if($_POST['d3-rel'] === 'SPO'){
    $d3Type ='ADEP';
    $d3relation = 'SPO';
}
if($_POST['d3-rel'] === 'DSPO'){
    $d3Type ='ADEP';
    $d3relation = 'DSPO';
}
if($_POST['d3-rel'] === 'CLSPO'){
    $d3Type ='ADEP';
    $d3relation = 'CLSPO';
}
if($_POST['d3-rel'] === 'PAR'){
    $d3Type ='ADEP';
    $d3relation = 'PAR';
}
if($_POST['d3-rel'] === 'OTHER'){
    $d3Type ='ADEP';
    $d3relation = 'OTHER';
}
if($_POST['d3-rel'] === 'CHI'){
    $d3Type ='CDEP';
    $d3relation = 'CHI';
}
if($_POST['d3-rel'] === 'CHISTU'){
    $d3Type ='STU';
    $d3relation = 'CHI';
}
if($_POST['d3-rel'] === 'FCHI'){
    $d3Type ='CDEP';
    $d3relation = 'FCHI';
}
if($_POST['d3-rel'] === 'CHIADO'){
    $d3Type ='CDEP';
    $d3relation = 'CHI';
}
if($_POST['d3-rel'] === 'DCHI'){
    $d3Type ='ADEP';
    $d3relation = 'DCHI';
}
if($_POST['d3-rel'] === 'DCHIC'){
    $d3Type ='CDEP';
    $d3relation = 'DCHI';
}
if($_POST['d3-rel'] === 'OCHI'){
    $d3Type ='ADEP';
    $d3relation = 'OCHI';
}
if($_POST['d3-rel'] === 'GCHI'){
    $d3Type ='CDEP';
    $d3relation = 'GCHI';
}
if($_POST['d3-rel'] === 'SIBC'){
    $d3Type ='CDEP';
    $d3relation = 'SIB';
}
if($_POST['d3-rel'] === 'SIBA'){
    $d3Type ='ADEP';
    $d3relation = 'SIB';
}
if($_POST['d3-rel'] === 'OTHERA'){
    $d3Type ='ADEP';
    $d3relation = 'OTHER';
}
if($_POST['d3-rel'] === 'OTHERC'){
    $d3Type ='CDEP';
    $d3relation = 'OTHER';
}

//

if($_POST['d4-rel'] === 'SPO'){
    $d4Type ='ADEP';
    $d4relation = 'SPO';
}
if($_POST['d4-rel'] === 'DSPO'){
    $d4Type ='ADEP';
    $d4relation = 'DSPO';
}
if($_POST['d4-rel'] === 'CLSPO'){
    $d4Type ='ADEP';
    $d4relation = 'CLSPO';
}
if($_POST['d4-rel'] === 'PAR'){
    $d4Type ='ADEP';
    $d4relation = 'PAR';
}
if($_POST['d4-rel'] === 'OTHER'){
    $d4Type ='ADEP';
    $d4relation = 'OTHER';
}
if($_POST['d4-rel'] === 'CHI'){
    $d4Type ='CDEP';
    $d4relation = 'CHI';
}
if($_POST['d4-rel'] === 'CHISTU'){
    $d4Type ='STU';
    $d4relation = 'CHI';
}
if($_POST['d4-rel'] === 'FCHI'){
    $d4Type ='CDEP';
    $d4relation = 'FCHI';
}
if($_POST['d4-rel'] === 'CHIADO'){
    $d4Type ='CDEP';
    $d4relation = 'CHI';
}
if($_POST['d4-rel'] === 'DCHI'){
    $d4Type ='ADEP';
    $d4relation = 'DCHI';
}
if($_POST['d4-rel'] === 'DCHIC'){
    $d4Type ='CDEP';
    $d4relation = 'DCHI';
}
if($_POST['d4-rel'] === 'OCHI'){
    $d4Type ='ADEP';
    $d4relation = 'OCHI';
}
if($_POST['d4-rel'] === 'GCHI'){
    $d4Type ='CDEP';
    $d4relation = 'GCHI';
}
if($_POST['d4-rel'] === 'SIBC'){
    $d4Type ='CDEP';
    $d4relation = 'SIB';
}
if($_POST['d4-rel'] === 'SIBA'){
    $d4Type ='ADEP';
    $d4relation = 'SIB';
}
if($_POST['d4-rel'] === 'OTHERA'){
    $d4Type ='ADEP';
    $d4relation = 'OTHER';
}
if($_POST['d4-rel'] === 'OTHERC'){
    $d4Type ='CDEP';
    $d4relation = 'OTHER';
}

////

$expr = '/(?<=\s|^)[a-z]/i';
$d1initial = preg_match_all($expr, $_POST['d1-firstname'], $d1initial1);
$d1initial = implode('', $d1initial1[0]);
$d1initial = strtoupper($d1initial);
$d2initial = preg_match_all($expr, $_POST['d2-firstname'], $d2initial1);
$d2initial = implode('', $d2initial1[0]);
$d2initial = strtoupper($d2initial);
$d3initial = preg_match_all($expr, $_POST['d3-firstname'], $d3initial1);
$d3initial = implode('', $d3initial1[0]);
$d3initial = strtoupper($d3initial);
$d4initial = preg_match_all($expr, $_POST['d4-firstname'], $d4initial1);
$d4initial = implode('', $d4initial1[0]);
$d4initial = strtoupper($d4initial);

$idNum = $_POST['mainid-number'];
//   $emailaddress = 'larry.kenmuir@gmail.com';
$optionsnomination = $_POST['optionsconstinp'];
$emailaddress = $_POST['advisoremail'];
$emailname = $_POST['advisor-namesurname'];
$consentanswer = '';

if($_POST['prevmed-namesurname1'] !== ''){$prevmedicalis = 'yes';}else{$prevmedicalis = 'no';}

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
if($_POST['mainid-pobox'] == "PO BOX"){$poboxanswer = "Yes";}else{$poboxanswer = "No";}
if($_POST['contrib-accholdname']){
  $caccholdernameid = $_POST['contrib-accholdname'];
  if(isset($_POST[$caccholdernameid.'c'])){
    $caccholdernameis = $_POST[$caccholdernameid.'c'];
  }
}
// if($_POST['refund-accholdname']){
//   $raccholdernameid = $_POST['refund-accholdname'];
//   $raccholdernameis = $_POST[$raccholdernameid.'r'];
// }
if($_POST['contrib-accholdname'] !== ""){ $accid = $_POST['contrib-accholdname']; if(isset($_POST['$accid'])){$acchname = $_POST['$accid'];}}

// setting medical questions on or off
if(isset($_POST['medicalquestion1-radios']) || isset($_POST['medicalquestion2-radios']) || isset($_POST['medicalquestion3-radios']) || isset($_POST['medicalquestion4-radios'])){
    if($_POST['medicalquestion1-radios'] == "yes"){$mq1r = "Y";}if($_POST['medicalquestion1-radios'] == "no"){$mq1r = "N";}
    if($_POST['medicalquestion1-radios'] == "yes"){$mq12r = "Y";}if($_POST['medicalquestion1-radios'] == "no"){$mq12r = "N";}
    if($_POST['medicalquestion1-radios'] == "yes"){$mq13r = "Y";}if($_POST['medicalquestion1-radios'] == "no"){$mq13r = "N";}
    if($_POST['medicalquestion1-radios'] == "yes"){$mq14r = "Y";}if($_POST['medicalquestion1-radios'] == "no"){$mq14r = "N";}
    if($_POST['medicalquestion2-radios'] == "yes"){$mq2r = "Y";}if($_POST['medicalquestion2-radios'] == "no"){$mq2r = "N";}
    if($_POST['medicalquestion2-radios'] == "yes"){$mq22r = "Y";}if($_POST['medicalquestion2-radios'] == "no"){$mq22r = "N";}
    if($_POST['medicalquestion2-radios'] == "yes"){$mq23r = "Y";}if($_POST['medicalquestion2-radios'] == "no"){$mq23r = "N";}
    if($_POST['medicalquestion2-radios'] == "yes"){$mq24r = "Y";}if($_POST['medicalquestion2-radios'] == "no"){$mq24r = "N";}
    if($_POST['medicalquestion3-radios'] == "yes"){$mq3r = "Y";}if($_POST['medicalquestion3-radios'] == "no"){$mq3r = "N";}
    if($_POST['medicalquestion3-radios'] == "yes"){$mq32r = "Y";}if($_POST['medicalquestion3-radios'] == "no"){$mq32r = "N";}
    if($_POST['medicalquestion3-radios'] == "yes"){$mq33r = "Y";}if($_POST['medicalquestion3-radios'] == "no"){$mq33r = "N";}
    if($_POST['medicalquestion3-radios'] == "yes"){$mq34r = "Y";}if($_POST['medicalquestion3-radios'] == "no"){$mq34r = "N";}
    if($_POST['medicalquestion4-radios'] == "yes"){$mq4r = "Y";}if($_POST['medicalquestion4-radios'] == "no"){$mq4r = "N";}
    if($_POST['medicalquestion4-radios'] == "yes"){$mq42r = "Y";}if($_POST['medicalquestion4-radios'] == "no"){$mq42r = "N";}
    if($_POST['medicalquestion4-radios'] == "yes"){$mq43r = "Y";}if($_POST['medicalquestion4-radios'] == "no"){$mq43r = "N";}
    if($_POST['medicalquestion4-radios'] == "yes"){$mq44r = "Y";}if($_POST['medicalquestion4-radios'] == "no"){$mq44r = "N";}

    if($_POST['medicalquestion1-radios'] == "Y"){$mq1r = "Y";}if($_POST['medicalquestion1-radios'] == "N"){$mq1r = "N";}
    if($_POST['medicalquestion1-radios'] == "Y"){$mq12r = "Y";}if($_POST['medicalquestion1-radios'] == "N"){$mq12r = "N";}
    if($_POST['medicalquestion1-radios'] == "Y"){$mq13r = "Y";}if($_POST['medicalquestion1-radios'] == "N"){$mq13r = "N";}
    if($_POST['medicalquestion1-radios'] == "Y"){$mq14r = "Y";}if($_POST['medicalquestion1-radios'] == "N"){$mq14r = "N";}
    if($_POST['medicalquestion2-radios'] == "Y"){$mq2r = "Y";}if($_POST['medicalquestion2-radios'] == "N"){$mq2r = "N";}
    if($_POST['medicalquestion2-radios'] == "Y"){$mq22r = "Y";}if($_POST['medicalquestion2-radios'] == "N"){$mq22r = "N";}
    if($_POST['medicalquestion2-radios'] == "Y"){$mq23r = "Y";}if($_POST['medicalquestion2-radios'] == "N"){$mq23r = "N";}
    if($_POST['medicalquestion2-radios'] == "Y"){$mq24r = "Y";}if($_POST['medicalquestion2-radios'] == "N"){$mq24r = "N";}
    if($_POST['medicalquestion3-radios'] == "Y"){$mq3r = "Y";}if($_POST['medicalquestion3-radios'] == "N"){$mq3r = "N";}
    if($_POST['medicalquestion3-radios'] == "Y"){$mq32r = "Y";}if($_POST['medicalquestion3-radios'] == "N"){$mq32r = "N";}
    if($_POST['medicalquestion3-radios'] == "Y"){$mq33r = "Y";}if($_POST['medicalquestion3-radios'] == "N"){$mq33r = "N";}
    if($_POST['medicalquestion3-radios'] == "Y"){$mq34r = "Y";}if($_POST['medicalquestion3-radios'] == "N"){$mq34r = "N";}
    if($_POST['medicalquestion4-radios'] == "Y"){$mq4r = "Y";}if($_POST['medicalquestion4-radios'] == "N"){$mq4r = "N";}
    if($_POST['medicalquestion4-radios'] == "Y"){$mq42r = "Y";}if($_POST['medicalquestion4-radios'] == "N"){$mq42r = "N";}
    if($_POST['medicalquestion4-radios'] == "Y"){$mq43r = "Y";}if($_POST['medicalquestion4-radios'] == "N"){$mq43r = "N";}
    if($_POST['medicalquestion4-radios'] == "Y"){$mq44r = "Y";}if($_POST['medicalquestion4-radios'] == "N"){$mq44r = "N";}
}


// compile full names to check if med questions match members
$mainfullname = $_POST['main-firstname'].' '.$_POST['main-surname'];
// echo 'main full name : '.$mainfullname;
$dep1fullname = $_POST['d1-firstname'].' '.$_POST['d1-surname'];
$dep2fullname = $_POST['d2-firstname'].' '.$_POST['d2-surname'];
$dep3fullname = $_POST['d3-firstname'].' '.$_POST['d3-surname'];
$dep4fullname = $_POST['d4-firstname'].' '.$_POST['d4-surname'];

// submit data into nexus
//
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
              "endpoint": "http://www.fedhealth.co.za/"
          },
          "destination": {
              "name": "Helios ITS",
              "endpoint": "http://heliosits.com/soa/rest/"
          }
      },
      "messagePayload": {
          "scheme": {
              "schemeCode": "FDH",
              "joinDate": "'.$_POST["medstart-date"].'",
              "option": "'.$_POST['option-radio'].'"
          },
          "intermediary": {
              "intermediaryCode": "'.$_POST['broker-code'].'",
              "intermediaryName": "'.$_POST['advisor-brokeragename'].'",
              "contact": {
                  "contactType": "email",
                  "contactValue": "'.$_POST['advisor-email'].'"
              },
              "paypoint": "FDH514DPM"
          },
          "beneficiary": [
              {
                  "memberType": "PM",
                  "relationshipToPrimaryMember": "SELF",
                  "title": "'.$_POST['main-title'].'",
                  "firstNames": "'.$_POST['main-firstname'].'",
                  "initials": "'.$_POST['main-initial'].'",
                  "surname": "'.$_POST['main-surname'].'",
                  "gender": "'.$_POST['mgender-radio'].'",
                  "dateOfBirth": "'.$_POST['m-dob'].'",
                  "identification": {
                      "idType": "'.$_POST['idPassType'].'",
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
              $subdata .= '],';
    // if previous medical scheme for main is filled in, add this
    if(($_POST['prevmed-namesurname1']!=='' && $_POST['prevmed-namesurname1'] === $mainfullname) || ($_POST['prevmed-namesurname2']!=='' && $_POST['prevmed-namesurname2'] === $mainfullname) || ($_POST['prevmed-namesurname3']!=='' && $_POST['prevmed-namesurname3'] === $mainfullname) || ($_POST['prevmed-namesurname4']!=='' && $_POST['prevmed-namesurname4'] === $mainfullname) || ($_POST['prevmed-namesurname5']!=='' && $_POST['prevmed-namesurname5'] === $mainfullname)){
      $subdata .= '"previousMedicalAid": {';
      if($_POST['prevmed-namesurname1']!=='' && $_POST['prevmed-namesurname1'] === $mainfullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme1'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum1'].'",
                          "startDate": "'.$_POST['prevmed-djoin1'].'",
                          "endDate": "'.$_POST['prevmed-dend1'].'"
                  }';
          }
      if($_POST['prevmed-namesurname2']!=='' && $_POST['prevmed-namesurname2'] === $mainfullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme2'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum2'].'",
                          "startDate": "'.$_POST['prevmed-djoin2'].'",
                          "endDate": "'.$_POST['prevmed-dend2'].'"
                  }';
          }
      if($_POST['prevmed-namesurname3']!=='' && $_POST['prevmed-namesurname3'] === $mainfullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme3'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum3'].'",
                          "startDate": "'.$_POST['prevmed-djoin3'].'",
                          "endDate": "'.$_POST['prevmed-dend3'].'"
                  }';
          }
      if($_POST['prevmed-namesurname4']!=='' && $_POST['prevmed-namesurname4'] === $mainfullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme4'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum4'].'",
                          "startDate": "'.$_POST['prevmed-djoin4'].'",
                          "endDate": "'.$_POST['prevmed-dend4'].'"
                  }';
          }
      if($_POST['prevmed-namesurname5']!=='' && $_POST['prevmed-namesurname5'] === $mainfullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme5'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum5'].'",
                          "startDate": "'.$_POST['prevmed-djoin5'].'",
                          "endDate": "'.$_POST['prevmed-dend5'].'"
                  }';
          }
      $subdata .= ']
        },';
    }
    else{
    $subdata .= '"previousMedicalAid": [],';
    }
    // if conditions for main is filled in, add this
    if(($_POST['mq1-radio']==='yes' || $_POST['mq2-radio']==='yes' || $_POST['mq3-radio']==='yes' || $_POST['mq4-radio']==='yes') && ($_POST['medicalquestion1-name'] === $mainfullname || $_POST['medicalquestion2-name'] === $mainfullname || $_POST['medicalquestion3-name'] === $mainfullname || $_POST['medicalquestion4-name'] === $mainfullname)){
      $subdata .= '"conditions": {
            "condition": [';
            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion1-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion1code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion1-illness'].'",
                    "current": "'.$mq1r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion1-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion1-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion1-name'] !== '' && ($_POST['medicalquestion12-name'] !== '' || $_POST['medicalquestion13-name'] !== '' || $_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }
            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion12-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion1code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion12-illness'].'",
                    "current": "'.$mq12r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion12-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion12-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion12-name'] !== '' && ($_POST['medicalquestion13-name'] !== '' || $_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }
            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion13-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion1code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion13-illness'].'",
                    "current": "'.$mq1r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion13-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion13-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion13-name'] !== '' && ($_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }
            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion14-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion1code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion14-illness'].'",
                    "current": "'.$mq1r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion14-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion14-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion14-name'] !== '' && ($_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }

            if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion2-name'] === $mainfullname){
                    $subdata .= '{
                    "questionCode": "'.$_POST['medquestion2code'].'",
                        "conditionCode": null,
                        "detail": "'.$_POST['medicalquestion2-illness'].'",
                        "current": "'.$mq2r.'",
                        "lastTreatmentDate": "'.$_POST['medicalquestion2-lasttreat'].'",
                        "receivedTreatment": "Y",
                        "treatingDoctor": "'.$_POST['medicalquestion2-gpspec'].'",
                        "conditionResolved": null';
                        if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion2-name'] !== '' && ($_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
                }
            if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion22-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion2code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion22-illness'].'",
                    "current": "'.$mq12r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion22-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion22-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion22-name'] !== '' && ($_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }
            if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion23-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion2code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion23-illness'].'",
                    "current": "'.$mq1r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion23-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion23-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion23-name'] !== '' && ($_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }
            if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion24-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion2code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion24-illness'].'",
                    "current": "'.$mq1r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion24-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion24-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion24-name'] !== '' && ($_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }

            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion3-name'] === $mainfullname){
                    $subdata .= '{
                    "questionCode": "'.$_POST['medquestion3code'].'",
                        "conditionCode": null,
                        "detail": "'.$_POST['medicalquestion3-illness'].'",
                        "current": "'.$mq3r.'",
                        "lastTreatmentDate": "'.$_POST['medicalquestion3-lasttreat'].'",
                        "receivedTreatment": "Y",
                        "treatingDoctor": "'.$_POST['medicalquestion3-gpspec'].'",
                        "conditionResolved": null';
                        if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion3-name'] !== '' && ($_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }
            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion32-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion3code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion32-illness'].'",
                    "current": "'.$mq12r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion32-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion32-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion32-name'] !== '' && ($_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }
            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion33-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion3code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion33-illness'].'",
                    "current": "'.$mq1r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion33-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion33-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion33-name'] !== '' && ($_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }
            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion34-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion3code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion34-illness'].'",
                    "current": "'.$mq1r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion34-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion34-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion34-name'] !== '' && ($_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }

            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion4-name'] === $mainfullname){
                    $subdata .= '{
                    "questionCode": "'.$_POST['medquestion4code'].'",
                        "conditionCode": null,
                        "detail": "'.$_POST['medicalquestion4-illness'].'",
                        "current": "'.$mq4r.'",
                        "lastTreatmentDate": "'.$_POST['medicalquestion4-lasttreat'].'",
                        "receivedTreatment": "Y",
                        "treatingDoctor": "'.$_POST['medicalquestion4-gpspec'].'",
                        "conditionResolved": null';
                        if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion4-name'] !== '' && ($_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                            $subdata .= '},';
                        }
                        else{
                            $subdata .= '}';
                        }
            }
            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion42-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion4code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion42-illness'].'",
                    "current": "'.$mq12r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion42-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion42-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion42-name'] !== '' && ($_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }
            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion43-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion4code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion43-illness'].'",
                    "current": "'.$mq1r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion43-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion43-gpspec'].'",
                    "conditionResolved": null';
                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion43-name'] !== '' && $_POST['medicalquestion44-name'] !== ''){
                        $subdata .= '},';
                    }
                    else{
                        $subdata .= '}';
                    }
            }
            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion44-name'] === $mainfullname){
                $subdata .= '{
                    "questionCode": "'.$_POST['medquestion4code'].'",
                    "conditionCode": null,
                    "detail": "'.$_POST['medicalquestion44-illness'].'",
                    "current": "'.$mq1r.'",
                    "lastTreatmentDate": "'.$_POST['medicalquestion44-lasttreat'].'",
                    "receivedTreatment": "Y",
                    "treatingDoctor": "'.$_POST['medicalquestion44-gpspec'].'",
                    "conditionResolved": null';
                      $subdata .= '}';
            }
            $subdata .= ']
            }';
    }
    else{
    $subdata .= '"conditions": []';
    }
    $subdata .= '}';
    // if dependant 1 is filled in, add this
    if(isset($_POST['d1-firstname']) && $_POST['d1-firstname'] !== ''){
        $subdata .= ',{
                    "memberType": "'.$d1Type.'",
                    "relationshipToPrimaryMember": "'.$d1relation.'",
                    "title": "'.$_POST['dep1-title'].'",
                    "firstNames": "'.$_POST['d1-firstname'].'",
                    "initials": "'.$d1initial.'",
                    "surname": "'.$_POST['d1-surname'].'",
                    "gender": "'.$_POST['d1-gender-radio'].'",
                    "dateOfBirth": "'.$_POST['d1-dob'].'",
                    "identification": {
                        "idType": "RSA",
                        "idNumber": "'.$_POST['d1-idpass'].'"
                    },
                    "language": "ENG",
                    "ethnicity": "'.$_POST['d1-race'].'",
                    "maritalStatus": "'.$_POST['d1-marital'].'",
                    "contact": [
                        {
                            "contactType": "personalMobile",
                            "contactValue": "'.$_POST['d1-contact'].'"
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
                        // no po box
                        else{
                        $subdata .= '{
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
                $subdata .= '],';

    if(($_POST['prevmed-namesurname1']!=='' && $_POST['prevmed-namesurname1'] === $dep1fullname) || ($_POST['prevmed-namesurname2']!=='' && $_POST['prevmed-namesurname2'] === $dep1fullname) || ($_POST['prevmed-namesurname3']!=='' && $_POST['prevmed-namesurname3'] === $dep1fullname) || ($_POST['prevmed-namesurname4']!=='' && $_POST['prevmed-namesurname4'] === $dep1fullname) || ($_POST['prevmed-namesurname5']!=='' && $_POST['prevmed-namesurname5'] === $dep1fullname)){
      $subdata .= '"previousMedicalAid": {';
      if($_POST['prevmed-namesurname1']!=='' && $_POST['prevmed-namesurname1'] === $dep1fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme1'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum1'].'",
                          "startDate": "'.$_POST['prevmed-djoin1'].'",
                          "endDate": "'.$_POST['prevmed-dend1'].'"
                  }';
          }
      if($_POST['prevmed-namesurname2']!=='' && $_POST['prevmed-namesurname2'] === $dep1fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme2'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum2'].'",
                          "startDate": "'.$_POST['prevmed-djoin2'].'",
                          "endDate": "'.$_POST['prevmed-dend2'].'"
                  }';
          }
      if($_POST['prevmed-namesurname3']!=='' && $_POST['prevmed-namesurname3'] === $dep1fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme3'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum3'].'",
                          "startDate": "'.$_POST['prevmed-djoin3'].'",
                          "endDate": "'.$_POST['prevmed-dend3'].'"
                  }';
          }
      if($_POST['prevmed-namesurname4']!=='' && $_POST['prevmed-namesurname4'] === $dep1fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme4'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum4'].'",
                          "startDate": "'.$_POST['prevmed-djoin4'].'",
                          "endDate": "'.$_POST['prevmed-dend4'].'"
                  }';
          }
      if($_POST['prevmed-namesurname5']!=='' && $_POST['prevmed-namesurname5'] === $dep1fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme5'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum5'].'",
                          "startDate": "'.$_POST['prevmed-djoin5'].'",
                          "endDate": "'.$_POST['prevmed-dend5'].'"
                  }';
          }
      $subdata .= ']
        },';
    }
    else{
    $subdata .= '"previousMedicalAid": [],';
    }
                            // if conditions for main is filled in, add this
                            if(($_POST['mq1-radio']==='yes' || $_POST['mq2-radio']==='yes' || $_POST['mq3-radio']==='yes' || $_POST['mq4-radio']==='yes') && ($_POST['medicalquestion1-name'] === $dep1fullname || $_POST['medicalquestion2-name'] === $dep1fullname || $_POST['medicalquestion3-name'] === $dep1fullname || $_POST['medicalquestion4-name'] === $dep1fullname)){
                                $subdata .= '"conditions": {
                                    "condition": [';
                                        if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion1-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion1-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion1-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion1-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion1-name'] !== '' && ($_POST['medicalquestion12-name'] !== '' || $_POST['medicalquestion13-name'] !== '' || $_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion12-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion12-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion12-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion12-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion12-name'] !== '' && ($_POST['medicalquestion13-name'] !== '' || $_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion13-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion13-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion13-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion13-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion13-name'] !== '' && ($_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion14-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion14-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion14-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion14-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion14-name'] !== '' && ($_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }

                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion2-name'] === $dep1fullname){
                                            $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                                "conditionCode": null,
                                                "detail": "'.$_POST['medicalquestion2-illness'].'",
                                                "current": "'.$mq2r.'",
                                                "lastTreatmentDate": "'.$_POST['medicalquestion2-lasttreat'].'",
                                                "receivedTreatment": "Y",
                                                "treatingDoctor": "'.$_POST['medicalquestion2-gpspec'].'",
                                                "conditionResolved": null';
                                            if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion2-name'] !== '' && ($_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                        }
                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion22-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion22-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion22-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion22-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion22-name'] !== '' && ($_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion23-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion23-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion23-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion23-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion23-name'] !== '' && ($_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion24-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion24-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion24-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion24-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion24-name'] !== '' && ($_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }

                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion3-name'] === $dep1fullname){
                                            $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                                "conditionCode": null,
                                                "detail": "'.$_POST['medicalquestion3-illness'].'",
                                                "current": "'.$mq3r.'",
                                                "lastTreatmentDate": "'.$_POST['medicalquestion3-lasttreat'].'",
                                                "receivedTreatment": "Y",
                                                "treatingDoctor": "'.$_POST['medicalquestion3-gpspec'].'",
                                                "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion3-name'] !== '' && ($_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion32-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion32-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion32-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion32-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion32-name'] !== '' && ($_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion33-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion33-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion33-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion33-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion33-name'] !== '' && ($_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion34-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion34-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion34-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion34-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion34-name'] !== '' && ($_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }

                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion4-name'] === $dep1fullname){
                                            $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                                "conditionCode": null,
                                                "detail": "'.$_POST['medicalquestion4-illness'].'",
                                                "current": "'.$mq4r.'",
                                                "lastTreatmentDate": "'.$_POST['medicalquestion4-lasttreat'].'",
                                                "receivedTreatment": "Y",
                                                "treatingDoctor": "'.$_POST['medicalquestion4-gpspec'].'",
                                                "conditionResolved": null';
                                                if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion4-name'] !== '' && ($_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                    $subdata .= '},';
                                                }
                                                else{
                                                    $subdata .= '}';
                                                }
                                    }
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion42-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion42-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion42-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion42-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion42-name'] !== '' && ($_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion43-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion43-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion43-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion43-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion43-name'] !== '' && $_POST['medicalquestion44-name'] !== ''){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion44-name'] === $dep1fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion44-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion44-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion44-gpspec'].'",
                                            "conditionResolved": null';
                                            $subdata .= '}';
                                    }
                                    $subdata .= ']
                                    }';
                            }
                            else{
                            $subdata .= '"conditions": []';
                            }

                            $subdata .= '}';
    }
    // if dependant 2 is filled in, add this
    if(isset($_POST['d2-firstname']) && $_POST['d2-firstname'] !== ''){
        $subdata .= ',{
                    "memberType": "'.$d2Type.'",
                    "relationshipToPrimaryMember": "'.$d2relation.'",
                    "title": "'.$_POST['dep2-title'].'",
                    "firstNames": "'.$_POST['d2-firstname'].'",
                    "initials": "'.$d2initial.'",
                    "surname": "'.$_POST['d2-surname'].'",
                    "gender": "'.$_POST['d2-gender-radio'].'",
                    "dateOfBirth": "'.$_POST['d2-dob'].'",
                    "identification": {
                        "idType": "RSA",
                        "idNumber": "'.$_POST['d2-idpass'].'"
                    },
                    "language": "ENG",
                    "ethnicity": "'.$_POST['d2-race'].'",
                    "maritalStatus": "'.$_POST['d2-marital'].'",
                    "contact": [
                        {
                            "contactType": "personalMobile",
                            "contactValue": "'.$_POST['d2-contact'].'"
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
                        // no po box
                        else{
                        $subdata .= '{
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
                $subdata .= '],';

    if(($_POST['prevmed-namesurname1']!=='' && $_POST['prevmed-namesurname1'] === $dep2fullname) || ($_POST['prevmed-namesurname2']!=='' && $_POST['prevmed-namesurname2'] === $dep2fullname) || ($_POST['prevmed-namesurname3']!=='' && $_POST['prevmed-namesurname3'] === $dep2fullname) || ($_POST['prevmed-namesurname4']!=='' && $_POST['prevmed-namesurname4'] === $dep2fullname) || ($_POST['prevmed-namesurname5']!=='' && $_POST['prevmed-namesurname5'] === $dep2fullname)){
      $subdata .= '"previousMedicalAid": {';
      if($_POST['prevmed-namesurname1']!=='' && $_POST['prevmed-namesurname1'] === $dep2fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme1'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum1'].'",
                          "startDate": "'.$_POST['prevmed-djoin1'].'",
                          "endDate": "'.$_POST['prevmed-dend1'].'"
                  }';
          }
      if($_POST['prevmed-namesurname2']!=='' && $_POST['prevmed-namesurname2'] === $dep2fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme2'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum2'].'",
                          "startDate": "'.$_POST['prevmed-djoin2'].'",
                          "endDate": "'.$_POST['prevmed-dend2'].'"
                  }';
          }
      if($_POST['prevmed-namesurname3']!=='' && $_POST['prevmed-namesurname3'] === $dep2fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme3'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum3'].'",
                          "startDate": "'.$_POST['prevmed-djoin3'].'",
                          "endDate": "'.$_POST['prevmed-dend3'].'"
                  }';
          }
      if($_POST['prevmed-namesurname4']!=='' && $_POST['prevmed-namesurname4'] === $dep2fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme4'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum4'].'",
                          "startDate": "'.$_POST['prevmed-djoin4'].'",
                          "endDate": "'.$_POST['prevmed-dend4'].'"
                  }';
          }
      if($_POST['prevmed-namesurname5']!=='' && $_POST['prevmed-namesurname5'] === $dep2fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme5'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum5'].'",
                          "startDate": "'.$_POST['prevmed-djoin5'].'",
                          "endDate": "'.$_POST['prevmed-dend5'].'"
                  }';
          }
      $subdata .= ']
        },';
    }
    else{
    $subdata .= '"previousMedicalAid": [],';
    }
                            // if conditions for main is filled in, add this
                            if(($_POST['mq1-radio']==='yes' || $_POST['mq2-radio']==='yes' || $_POST['mq3-radio']==='yes' || $_POST['mq4-radio']==='yes') && ($_POST['medicalquestion1-name'] === $dep2fullname || $_POST['medicalquestion2-name'] === $dep2fullname || $_POST['medicalquestion3-name'] === $dep2fullname || $_POST['medicalquestion4-name'] === $dep2fullname)){
                            $subdata .= '"conditions": {
                                    "condition": [';
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion1-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion1-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion1-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion1-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion1-name'] !== '' && ($_POST['medicalquestion12-name'] !== '' || $_POST['medicalquestion13-name'] !== '' || $_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion12-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion12-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion12-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion12-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion12-name'] !== '' && ($_POST['medicalquestion13-name'] !== '' || $_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion13-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion13-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion13-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion13-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion13-name'] !== '' && ($_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion14-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion14-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion14-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion14-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion14-name'] !== '' && ($_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }

                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion2-name'] === $dep2fullname){
                                            $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                                "conditionCode": null,
                                                "detail": "'.$_POST['medicalquestion2-illness'].'",
                                                "current": "'.$mq2r.'",
                                                "lastTreatmentDate": "'.$_POST['medicalquestion2-lasttreat'].'",
                                                "receivedTreatment": "Y",
                                                "treatingDoctor": "'.$_POST['medicalquestion2-gpspec'].'",
                                                "conditionResolved": null';
                                                if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion2-name'] !== '' && ($_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                        }
                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion22-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion22-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion22-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion22-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion22-name'] !== '' && ($_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion23-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion23-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion23-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion23-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion23-name'] !== '' && ($_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion24-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion24-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion24-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion24-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion24-name'] !== '' && ($_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }

                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion3-name'] === $dep2fullname){
                                            $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                                "conditionCode": null,
                                                "detail": "'.$_POST['medicalquestion3-illness'].'",
                                                "current": "'.$mq3r.'",
                                                "lastTreatmentDate": "'.$_POST['medicalquestion3-lasttreat'].'",
                                                "receivedTreatment": "Y",
                                                "treatingDoctor": "'.$_POST['medicalquestion3-gpspec'].'",
                                                "conditionResolved": null';
                                                if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion3-name'] !== '' && ($_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion32-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion32-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion32-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion32-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion32-name'] !== '' && ($_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion33-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion33-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion33-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion33-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion33-name'] !== '' && ($_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion34-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion34-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion34-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion34-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion34-name'] !== '' && ($_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }

                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion4-name'] === $dep2fullname){
                                            $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                                "conditionCode": null,
                                                "detail": "'.$_POST['medicalquestion4-illness'].'",
                                                "current": "'.$mq4r.'",
                                                "lastTreatmentDate": "'.$_POST['medicalquestion4-lasttreat'].'",
                                                "receivedTreatment": "Y",
                                                "treatingDoctor": "'.$_POST['medicalquestion4-gpspec'].'",
                                                "conditionResolved": null';
                                                if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion4-name'] !== '' && ($_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                    $subdata .= '},';
                                                }
                                                else{
                                                    $subdata .= '}';
                                                }
                                    }
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion42-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion42-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion42-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion42-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion42-name'] !== '' && ($_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion43-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion43-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion43-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion43-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion43-name'] !== '' && $_POST['medicalquestion44-name'] !== ''){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion44-name'] === $dep2fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion44-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion44-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion44-gpspec'].'",
                                            "conditionResolved": null';
                                                $subdata .= '}';
                                    }
                                    $subdata .= ']
                                    }';
                            }
                            else{
                            $subdata .= '"conditions": []';
                            }

                            $subdata .= '}';
    }
    // if dependant 3 is filled in, add this
    if(isset($_POST['d3-firstname']) && $_POST['d3-firstname'] !== ''){
        $subdata .= ',{
                    "memberType": "'.$d3Type.'",
                    "relationshipToPrimaryMember": "'.$d3relation.'",
                    "title": "'.$_POST['dep3-title'].'",
                    "firstNames": "'.$_POST['d3-firstname'].'",
                    "initials": "'.$d3initial.'",
                    "surname": "'.$_POST['d3-surname'].'",
                    "gender": "'.$_POST['d3-gender-radio'].'",
                    "dateOfBirth": "'.$_POST['d3-dob'].'",
                    "identification": {
                        "idType": "RSA",
                        "idNumber": "'.$_POST['d3-idpass'].'"
                    },
                    "language": "ENG",
                    "ethnicity": "'.$_POST['d3-race'].'",
                    "maritalStatus": "'.$_POST['d3-marital'].'",
                    "contact": [
                        {
                            "contactType": "personalMobile",
                            "contactValue": "'.$_POST['d3-contact'].'"
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
                        // no po box
                        else{
                        $subdata .= '{
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
                $subdata .= '],';

    if(($_POST['prevmed-namesurname1']!=='' && $_POST['prevmed-namesurname1'] === $dep3fullname) || ($_POST['prevmed-namesurname2']!=='' && $_POST['prevmed-namesurname2'] === $dep3fullname) || ($_POST['prevmed-namesurname3']!=='' && $_POST['prevmed-namesurname3'] === $dep3fullname) || ($_POST['prevmed-namesurname4']!=='' && $_POST['prevmed-namesurname4'] === $dep3fullname) || ($_POST['prevmed-namesurname5']!=='' && $_POST['prevmed-namesurname5'] === $dep3fullname)){
      $subdata .= '"previousMedicalAid": {';
      if($_POST['prevmed-namesurname1']!=='' && $_POST['prevmed-namesurname1'] === $dep3fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme1'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum1'].'",
                          "startDate": "'.$_POST['prevmed-djoin1'].'",
                          "endDate": "'.$_POST['prevmed-dend1'].'"
                  }';
          }
      if($_POST['prevmed-namesurname2']!=='' && $_POST['prevmed-namesurname2'] === $dep3fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme2'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum2'].'",
                          "startDate": "'.$_POST['prevmed-djoin2'].'",
                          "endDate": "'.$_POST['prevmed-dend2'].'"
                  }';
          }
      if($_POST['prevmed-namesurname3']!=='' && $_POST['prevmed-namesurname3'] === $dep3fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme3'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum3'].'",
                          "startDate": "'.$_POST['prevmed-djoin3'].'",
                          "endDate": "'.$_POST['prevmed-dend3'].'"
                  }';
          }
      if($_POST['prevmed-namesurname4']!=='' && $_POST['prevmed-namesurname4'] === $dep3fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme4'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum4'].'",
                          "startDate": "'.$_POST['prevmed-djoin4'].'",
                          "endDate": "'.$_POST['prevmed-dend4'].'"
                  }';
          }
      if($_POST['prevmed-namesurname5']!=='' && $_POST['prevmed-namesurname5'] === $dep3fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme5'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum5'].'",
                          "startDate": "'.$_POST['prevmed-djoin5'].'",
                          "endDate": "'.$_POST['prevmed-dend5'].'"
                  }';
          }
      $subdata .= ']
        },';
    }
    else{
    $subdata .= '"previousMedicalAid": [],';
    }
                            
                            // if conditions for main is filled in, add this
                            if(($_POST['mq1-radio']==='yes' || $_POST['mq2-radio']==='yes' || $_POST['mq3-radio']==='yes' || $_POST['mq4-radio']==='yes') && ($_POST['medicalquestion1-name'] === $dep3fullname || $_POST['medicalquestion2-name'] === $dep3fullname || $_POST['medicalquestion3-name'] === $dep3fullname || $_POST['medicalquestion4-name'] === $dep3fullname)){
                            $subdata .= '"conditions": {
                                    "condition": [';
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion1-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion1-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion1-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion1-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion1-name'] !== '' && ($_POST['medicalquestion12-name'] !== '' || $_POST['medicalquestion13-name'] !== '' || $_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion12-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion12-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion12-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion12-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion12-name'] !== '' && ($_POST['medicalquestion13-name'] !== '' || $_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion13-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion13-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion13-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion13-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion13-name'] !== '' && ($_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion14-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion1code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion14-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion14-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion14-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion14-name'] !== '' && ($_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }

                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion2-name'] === $dep3fullname){
                                            $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                                "conditionCode": null,
                                                "detail": "'.$_POST['medicalquestion2-illness'].'",
                                                "current": "'.$mq2r.'",
                                                "lastTreatmentDate": "'.$_POST['medicalquestion2-lasttreat'].'",
                                                "receivedTreatment": "Y",
                                                "treatingDoctor": "'.$_POST['medicalquestion2-gpspec'].'",
                                                "conditionResolved": null';
                                                if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion2-name'] !== '' && ($_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                        }
                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion22-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion22-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion22-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion22-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion22-name'] !== '' && ($_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion23-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion23-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion23-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion23-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion23-name'] !== '' && ($_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion24-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion2code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion24-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion24-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion24-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion24-name'] !== '' && ($_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }

                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion3-name'] === $dep3fullname){
                                            $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                                "conditionCode": null,
                                                "detail": "'.$_POST['medicalquestion3-illness'].'",
                                                "current": "'.$mq3r.'",
                                                "lastTreatmentDate": "'.$_POST['medicalquestion3-lasttreat'].'",
                                                "receivedTreatment": "Y",
                                                "treatingDoctor": "'.$_POST['medicalquestion3-gpspec'].'",
                                                "conditionResolved": null';
                                                if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion3-name'] !== '' && ($_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion32-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion32-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion32-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion32-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion32-name'] !== '' && ($_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion33-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion33-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion33-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion33-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion33-name'] !== '' && ($_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion34-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion3code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion34-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion34-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion34-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion34-name'] !== '' && ($_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }

                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion4-name'] === $dep3fullname){
                                            $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                                "conditionCode": null,
                                                "detail": "'.$_POST['medicalquestion4-illness'].'",
                                                "current": "'.$mq4r.'",
                                                "lastTreatmentDate": "'.$_POST['medicalquestion4-lasttreat'].'",
                                                "receivedTreatment": "Y",
                                                "treatingDoctor": "'.$_POST['medicalquestion4-gpspec'].'",
                                                "conditionResolved": null';
                                                if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion4-name'] !== '' && ($_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                    $subdata .= '},';
                                                }
                                                else{
                                                    $subdata .= '}';
                                                }
                                    }
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion42-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion42-illness'].'",
                                            "current": "'.$mq12r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion42-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion42-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion42-name'] !== '' && ($_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion43-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion43-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion43-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion43-gpspec'].'",
                                            "conditionResolved": null';
                                            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion43-name'] !== '' && $_POST['medicalquestion44-name'] !== ''){
                                                $subdata .= '},';
                                            }
                                            else{
                                                $subdata .= '}';
                                            }
                                    }
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion44-name'] === $dep3fullname){
                                        $subdata .= '{
                                            "questionCode": "'.$_POST['medquestion4code'].'",
                                            "conditionCode": null,
                                            "detail": "'.$_POST['medicalquestion44-illness'].'",
                                            "current": "'.$mq1r.'",
                                            "lastTreatmentDate": "'.$_POST['medicalquestion44-lasttreat'].'",
                                            "receivedTreatment": "Y",
                                            "treatingDoctor": "'.$_POST['medicalquestion44-gpspec'].'",
                                            "conditionResolved": null';
                                                $subdata .= '}';
                                    }
                                    $subdata .= ']
                                    }';
                            }
                            else{
                            $subdata .= '"conditions": []';
                            }

                            $subdata .= '}';
    }
    // if dependant 4 is filled in, add this
    if(isset($_POST['d4-firstname']) && $_POST['d4-firstname'] !== ''){
        $subdata .= ',{
                    "memberType": "'.$d4Type.'",
                    "relationshipToPrimaryMember": "'.$d4relation.'",
                    "title": "'.$_POST['dep4-title'].'",
                    "firstNames": "'.$_POST['d4-firstname'].'",
                    "initials": "'.$d4initial.'",
                    "surname": "'.$_POST['d4-surname'].'",
                    "gender": "'.$_POST['d4-gender-radio'].'",
                    "dateOfBirth": "'.$_POST['d4-dob'].'",
                    "identification": {
                        "idType": "RSA",
                        "idNumber": "'.$_POST['d4-idpass'].'"
                    },
                    "language": "ENG",
                    "ethnicity": "'.$_POST['d4-race'].'",
                    "maritalStatus": "'.$_POST['d4-marital'].'",
                    "contact": [
                        {
                            "contactType": "personalMobile",
                            "contactValue": "'.$_POST['d4-contact'].'"
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
                // no po box
                else{
                $subdata .= '{
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
        $subdata .= '],';

    if(($_POST['prevmed-namesurname1']!=='' && $_POST['prevmed-namesurname1'] === $dep4fullname) || ($_POST['prevmed-namesurname2']!=='' && $_POST['prevmed-namesurname2'] === $dep4fullname) || ($_POST['prevmed-namesurname3']!=='' && $_POST['prevmed-namesurname3'] === $dep4fullname) || ($_POST['prevmed-namesurname4']!=='' && $_POST['prevmed-namesurname4'] === $dep4fullname) || ($_POST['prevmed-namesurname5']!=='' && $_POST['prevmed-namesurname5'] === $dep4fullname)){
      $subdata .= '"previousMedicalAid": {';
      if($_POST['prevmed-namesurname1']!=='' && $_POST['prevmed-namesurname1'] === $dep4fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme1'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum1'].'",
                          "startDate": "'.$_POST['prevmed-djoin1'].'",
                          "endDate": "'.$_POST['prevmed-dend1'].'"
                  }';
          }
      if($_POST['prevmed-namesurname2']!=='' && $_POST['prevmed-namesurname2'] === $dep4fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme2'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum2'].'",
                          "startDate": "'.$_POST['prevmed-djoin2'].'",
                          "endDate": "'.$_POST['prevmed-dend2'].'"
                  }';
          }
      if($_POST['prevmed-namesurname3']!=='' && $_POST['prevmed-namesurname3'] === $dep4fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme3'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum3'].'",
                          "startDate": "'.$_POST['prevmed-djoin3'].'",
                          "endDate": "'.$_POST['prevmed-dend3'].'"
                  }';
          }
      if($_POST['prevmed-namesurname4']!=='' && $_POST['prevmed-namesurname4'] === $dep4fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme4'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum4'].'",
                          "startDate": "'.$_POST['prevmed-djoin4'].'",
                          "endDate": "'.$_POST['prevmed-dend4'].'"
                  }';
          }
      if($_POST['prevmed-namesurname5']!=='' && $_POST['prevmed-namesurname5'] === $dep4fullname){
          $subdata .= '"medicalAid": [
                  {
                          "medicalAidName": "'.$_POST['prevmed-medscheme5'].'",
                          "memberNumber": "'.$_POST['prevmed-memnum5'].'",
                          "startDate": "'.$_POST['prevmed-djoin5'].'",
                          "endDate": "'.$_POST['prevmed-dend5'].'"
                  }';
          }
      $subdata .= ']
        },';
    }
    else{
    $subdata .= '"previousMedicalAid": [],';
    }

                    // if conditions for main is filled in, add this
                    if(($_POST['mq1-radio']==='yes' || $_POST['mq2-radio']==='yes' || $_POST['mq3-radio']==='yes' || $_POST['mq4-radio']==='yes') && ($_POST['medicalquestion1-name'] === $dep4fullname || $_POST['medicalquestion2-name'] === $dep4fullname || $_POST['medicalquestion3-name'] === $dep4fullname || $_POST['medicalquestion4-name'] === $dep4fullname)){
                    $subdata .= '"conditions": {
                            "condition": [';
                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion1-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion1code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion1-illness'].'",
                                    "current": "'.$mq1r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion1-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion1-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion1-name'] !== '' && ($_POST['medicalquestion12-name'] !== '' || $_POST['medicalquestion13-name'] !== '' || $_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }
                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion12-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion1code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion12-illness'].'",
                                    "current": "'.$mq12r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion12-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion12-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion12-name'] !== '' && ($_POST['medicalquestion13-name'] !== '' || $_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }
                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion13-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion1code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion13-illness'].'",
                                    "current": "'.$mq1r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion13-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion13-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion13-name'] !== '' && ($_POST['medicalquestion14-name'] !== '' || $_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }
                            if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion14-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion1code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion14-illness'].'",
                                    "current": "'.$mq1r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion14-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion14-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq1-radio']==='yes' && $_POST['medicalquestion14-name'] !== '' && ($_POST['medicalquestion2-name'] !== '' || $_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }

                            if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion2-name'] === $dep4fullname){
                                    $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion2code'].'",
                                        "conditionCode": null,
                                        "detail": "'.$_POST['medicalquestion2-illness'].'",
                                        "current": "'.$mq2r.'",
                                        "lastTreatmentDate": "'.$_POST['medicalquestion2-lasttreat'].'",
                                        "receivedTreatment": "Y",
                                        "treatingDoctor": "'.$_POST['medicalquestion2-gpspec'].'",
                                        "conditionResolved": null';
                                    if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion2-name'] !== '' && ($_POST['medicalquestion22-name'] !== '' || $_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                                }
                            if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion22-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion2code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion22-illness'].'",
                                    "current": "'.$mq12r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion22-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion22-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion22-name'] !== '' && ($_POST['medicalquestion23-name'] !== '' || $_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }
                            if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion23-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion2code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion23-illness'].'",
                                    "current": "'.$mq1r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion23-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion23-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion23-name'] !== '' && ($_POST['medicalquestion24-name'] !== '' || $_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }
                            if($_POST['mq2-radio']==='yes' && $_POST['medicalquestion24-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion2code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion24-illness'].'",
                                    "current": "'.$mq1r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion24-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion24-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion24-name'] !== '' && ($_POST['medicalquestion3-name'] !== '' || $_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }

                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion3-name'] === $dep4fullname){
                                    $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion3code'].'",
                                        "conditionCode": null,
                                        "detail": "'.$_POST['medicalquestion3-illness'].'",
                                        "current": "'.$mq3r.'",
                                        "lastTreatmentDate": "'.$_POST['medicalquestion3-lasttreat'].'",
                                        "receivedTreatment": "Y",
                                        "treatingDoctor": "'.$_POST['medicalquestion3-gpspec'].'",
                                        "conditionResolved": null';
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion3-name'] !== '' && ($_POST['medicalquestion32-name'] !== '' || $_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }
                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion32-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion3code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion32-illness'].'",
                                    "current": "'.$mq12r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion32-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion32-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion32-name'] !== '' && ($_POST['medicalquestion33-name'] !== '' || $_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }
                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion33-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion3code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion33-illness'].'",
                                    "current": "'.$mq1r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion33-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion33-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion33-name'] !== '' && ($_POST['medicalquestion34-name'] !== '' || $_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }
                            if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion34-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion3code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion34-illness'].'",
                                    "current": "'.$mq1r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion34-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion34-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq3-radio']==='yes' && $_POST['medicalquestion34-name'] !== '' && ($_POST['medicalquestion4-name'] !== '' || $_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }

                            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion4-name'] === $dep4fullname){
                                    $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion4code'].'",
                                        "conditionCode": null,
                                        "detail": "'.$_POST['medicalquestion4-illness'].'",
                                        "current": "'.$mq4r.'",
                                        "lastTreatmentDate": "'.$_POST['medicalquestion4-lasttreat'].'",
                                        "receivedTreatment": "Y",
                                        "treatingDoctor": "'.$_POST['medicalquestion4-gpspec'].'",
                                        "conditionResolved": null';
                                        if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion4-name'] !== '' && ($_POST['medicalquestion42-name'] !== '' || $_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                            $subdata .= '},';
                                        }
                                        else{
                                            $subdata .= '}';
                                        }
                            }
                            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion42-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion4code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion42-illness'].'",
                                    "current": "'.$mq12r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion42-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion42-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion42-name'] !== '' && ($_POST['medicalquestion43-name'] !== '' || $_POST['medicalquestion44-name'] !== '')){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }
                            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion43-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion4code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion43-illness'].'",
                                    "current": "'.$mq1r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion43-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion43-gpspec'].'",
                                    "conditionResolved": null';
                                    if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion43-name'] !== '' && $_POST['medicalquestion44-name'] !== ''){
                                        $subdata .= '},';
                                    }
                                    else{
                                        $subdata .= '}';
                                    }
                            }
                            if($_POST['mq4-radio']==='yes' && $_POST['medicalquestion44-name'] === $dep4fullname){
                                $subdata .= '{
                                    "questionCode": "'.$_POST['medquestion4code'].'",
                                    "conditionCode": null,
                                    "detail": "'.$_POST['medicalquestion44-illness'].'",
                                    "current": "'.$mq1r.'",
                                    "lastTreatmentDate": "'.$_POST['medicalquestion44-lasttreat'].'",
                                    "receivedTreatment": "Y",
                                    "treatingDoctor": "'.$_POST['medicalquestion44-gpspec'].'",
                                    "conditionResolved": null';
                                        $subdata .= '}';
                            }
                            $subdata .= ']
                            }';
                    }
                    else{
                    $subdata .= '"conditions": []';
                    }
                    $subdata .= '}';
}
// Bank accounts add
$subdata .= '],
        "bankAccounts": {
            "bankAccount": [
                {';
if($_POST['accsamecontrib'] === 'copy'){
      $subdata .= '"usage": "A",
                  "bankName": "'.$_POST['contrib-bankname'].'",
                  "bankCode": "'.$_POST['contrib-bankname'].'",
                  "branchName": "'.$_POST['contributionbranchname'].'",
                  "branchCode": '.$_POST['contributionbranchcode'].',';
                  if($_POST['thirdpartycheckfield'] === 'no'){
                  $subdata .= '"accountHolderName": "'.$_POST['contributionaccountholder'].'",';
                  }
                  if($_POST['thirdpartycheckfield'] === 'yes'){
                      $subdata .= '"accountHolderName": "'.$_POST['contrib-accholdname'].' '.$_POST['contrib-accholdsurname'].'",';
                  }
      $subdata .= '"accountType": "'.$_POST['contributionaccounttype'].'",
                  "accountNumber": "'.$_POST['contrib-accnum'].'"
                },';
}
else{
          $subdata .= '"usage": "Z",
                          "bankName": "'.$_POST['refund-bankname'].'",
                          "bankCode": "'.$_POST['refund-bankname'].'",
                          "branchName": "'.$_POST['refundbranchname'].'",
                          "branchCode": '.$_POST['refundbranchcode'].',
                          "accountHolderName": "'.$_POST['refundaccountholder'].'",';
                          if($_POST['refthirdpartycheckfield'] === 'no'){
                          $subdata .= '"accountHolderName": "'.$_POST['refundaccountholder'].'",';
                          }
                          if($_POST['refthirdpartycheckfield'] === 'yes'){
                              $subdata .= '"accountHolderName": "'.$_POST['refund-accholdname'].' '.$_POST['refund-accholdsurname'].'",';
                          }
              $subdata .= '"accountType": "'.$_POST['refundaccounttype'].'",
                          "accountNumber": "'.$_POST['refund-accnum'].'"
                      },';
  }
if($_POST['accsamecontrib'] === 'copy'){
      $subdata .= '{
                  "usage": "A",
                  "bankName": "'.$_POST['contrib-bankname'].'",
                  "bankCode": "'.$_POST['contrib-bankname'].'",
                  "branchName": "'.$_POST['contributionbranchname'].'",
                  "branchCode": '.$_POST['contributionbranchcode'].',';
                  if($_POST['thirdpartycheckfield'] === 'no'){
                  $subdata .= '"accountHolderName": "'.$_POST['contributionaccountholder'].'",';
                  }
                  if($_POST['thirdpartycheckfield'] === 'yes'){
                      $subdata .= '"accountHolderName": "'.$_POST['contrib-accholdname'].' '.$_POST['contrib-accholdsurname'].'",';
                  }
      $subdata .= '"accountType": "'.$_POST['contributionaccounttype'].'",
                  "accountNumber": "'.$_POST['contrib-accnum'].'"
              }';
}
else{
  $subdata .= '{
          "usage": "D",
          "bankName": "'.$_POST['contrib-bankname'].'",
          "bankCode": "'.$_POST['contrib-bankname'].'",
          "branchName": "'.$_POST['contributionbranchname'].'",
          "branchCode": '.$_POST['contributionbranchcode'].',';
          if($_POST['thirdpartycheckfield'] !== 'yes'){
          $subdata .= '"accountHolderName": "'.$_POST['contributionaccountholder'].'",';
          }
          else{
              $subdata .= '"accountHolderName": "'.$_POST['[contrib-accholdname'].' '.$_POST['[contrib-accholdsurname'].'",';
          }
  $subdata .= '"accountType": "'.$_POST['contributionaccounttype'].'",
          "accountNumber": "'.$_POST['contrib-accnum'].'"
      }';
              }
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
//   echo "<br><br><br>Submitted Data Printout<br><br>";
//   echo "<pre>".var_dump($submitdata2)."</pre>";

set_time_limit(0);
function submitnexus(){
    // curl submit to nexus
    $curl = curl_init();
    global $submitdata;
    curl_setopt_array($curl, array(
      CURLOPT_PORT => "7443",
      CURLOPT_URL => "https://services.webapi.heliosits.com:7443/applications",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => 1,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $submitdata,
      CURLOPT_HTTPHEADER => array(
        "authorization: Atmosphere atmosphere_app_id=\"helioswebapi-2KpETrqS0ZX9symBs2lbvA1D\"",
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
  // this isplay what nexus send back, error checking done here
      // echo "<br>nexus submit response message<br><br>";
      // echo $response;
      $response = json_decode($response, true);

    //   global $message2;
    global $submitsatus;
    global $errorcode;
    global $errormessage;
    global $membershipmessage;
    global $membershipnumber;
    global $submitqueryid;

      $submitsatus = $response['insertOnlineApplicationResponse']['insertOnlineApplicationResult']['OnlineDirectApplication']['Status'];
    if($submitsatus === 'OK'){
      $membershipmessage = $response['insertOnlineApplicationResponse']['insertOnlineApplicationResult']['OnlineDirectApplication']['StatusMessage'];
      $membershipnumber = substr($membershipmessage, -11);
      $submitqueryid = $response['insertOnlineApplicationResponse']['insertOnlineApplicationResult']['OnlineDirectApplication']['QueryID'];
    }
    if($submitsatus === 'ERROR'){
        $errorcode = $response['insertOnlineApplicationResponse']['insertOnlineApplicationResult']['OnlineDirectApplication']['ErrorCode'];
        $errormessage = $response['insertOnlineApplicationResponse']['insertOnlineApplicationResult']['OnlineDirectApplication']['StatusMessage'];
    }
    //   echo "<br><br>";
    //   echo "this is curl info :";
    //   echo "<br><br>";
    //   echo "<pre>";var_dump($infos);
    }
}
//
//
// end submit data into nexus

//   $membershipnumber = '02026772145';
//   $submitqueryid = '131221QVH9FB';

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

    $dir = "./feduploads/";
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

    $dir = "./feduploads/";
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

    $dir = "./feduploads/";
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

    $dir = "./feduploads/";
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

    $dir = "./feduploads/";
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

    $dir = "./feduploads/";
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


$message = '<div style="width:100%;background: #d4d4d4;"><table style="width:100%" CELLSPACING=0>
<tr style="background: #ffffff;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><img src="http://forms.afrocentricds.com/Fedhealth-Logo-Hires.jpg" width="200px"/></td></tr>';
if($submitsatus === 'OK'){
  $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Submission Details</h3></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Submit Status</td><td style="padding: 0 10px;color: #339100;">'. $submitsatus .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Membership Message and Number</td><td style="padding: 0 10px;color: #339100;">'. $membershipmessage .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Query ID</td><td style="padding: 0 10px;color: #339100;">'. $submitqueryid .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
  }
  else{
  $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Submission Details</h3></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Submit Status</td><td style="padding: 0 10px;color: #9d0000;">'. $submitsatus .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Error Code</td><td style="padding: 0 10px;color: #9d0000;">'. $errorcode .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Error Message</td><td style="padding: 0 10px;color: #9d0000;">'. $errormessage .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
  }
  $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Broker Details</h3></td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Brokerage Name</td><td style="padding: 0 10px;">'. $_POST['advisor-brokeragename'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Broker Name</td><td style="padding: 0 10px;">'. $_POST['advisor-namesurname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Broker Code</td><td style="padding: 0 10px;">'. $_POST['broker-code'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Broker Email</td><td style="padding: 0 10px;">'. $_POST['advisoremail'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Broker Telephone</td><td style="padding: 0 10px;">'. $_POST['advisor-tel'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical aid join date</td><td style="padding: 0 10px;">'. $_POST['medstart-date'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Options Details</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Selected option code</td><td style="padding: 0 10px;">'. $_POST['option-radio'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Main Member Details</h3></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Title</td><td style="padding: 0 10px;">'. $_POST['main-title'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Surname</td><td style="padding: 0 10px;">'. $_POST['main-surname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Name</td><td style="padding: 0 10px;">'. $_POST['main-firstname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Initials</td><td style="padding: 0 10px;">'. $_POST['main-initial'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID / Passport</td><td style="padding: 0 10px;">'. $_POST['idPassType'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID / Passport Number</td><td style="padding: 0 10px;">'. $_POST['mainid-number'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID Validation Notice</td><td style="padding: 0 10px;"><p>'. $_POST['idvalidnotice'] .'</p></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Marital Status</td><td style="padding: 0 10px;">'. $_POST['main-marital'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Gender</td><td style="padding: 0 10px;">'. $_POST['mgender-radio'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Date of Birth</td><td style="padding: 0 10px;">'. $_POST['m-dob'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Age</td><td style="padding: 0 10px;">'. $_POST['main-age'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Language</td><td style="padding: 0 10px;">'. $_POST['main-lang'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Ethnicity</td><td style="padding: 0 10px;">'. $_POST['m-race'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Dependants?</td><td style="padding: 0 10px;">'. $_POST['m-deps-radio'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Main Member Contact Details</h3></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Cellphone</td><td style="padding: 0 10px;">'. $_POST['m-cell'] .'</td></tr>';
  if($_POST['m-telh'] !== ''){
    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Telephone(h)</td><td style="padding: 0 10px;">'. $_POST['m-telh'] .'</td></tr>';
  }
  if($_POST['m-telw'] !== ''){
    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Telephone(w)</td><td style="padding: 0 10px;">'. $_POST['m-telw'] .'</td></tr>';
  }
  $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Email</td><td style="padding: 0 10px;">'. $_POST['m-email'] .'</td></tr>';
  if(isset($_POST['mtax'])){
    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Tax number</td><td style="padding: 0 10px;">'. $_POST['mtax'] .'</td></tr>';
  }
  $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Is it a PO Box?</td><td style="padding: 0 10px;">'. $poboxanswer .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Postal Number</td><td style="padding: 0 10px;">'. $_POST['m-psnum'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Postal Street Name</td><td style="padding: 0 10px;">'. $_POST['m-psname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Postal Street Type</td><td style="padding: 0 10px;">'. $_POST['m-pstype'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Postal Suburb</td><td style="padding: 0 10px;">'. $_POST['m-psuburb'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Postal Code</td><td style="padding: 0 10px;">'. $_POST['m-postalcode'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Town Code</td><td style="padding: 0 10px;">'. $_POST['mainptowncode'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Street Number</td><td style="padding: 0 10px;">'. $_POST['m-ssnum'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Street Name</td><td style="padding: 0 10px;">'. $_POST['m-ssname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Street Type</td><td style="padding: 0 10px;">'. $_POST['m-sstype'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Street Suburb</td><td style="padding: 0 10px;">'. $_POST['m-ssuburb'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Street Postal Code</td><td style="padding: 0 10px;">'. $_POST['m-spostalcode'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Town Code</td><td style="padding: 0 10px;">'. $_POST['mainstowncode'] .'</td></tr>';
  if($_POST['m-deps-radio'] == 'yes'){
  $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Dependant 1 Details</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Title</td><td style="padding: 0 10px;">'. $_POST['dep1-title'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name</td><td style="padding: 0 10px;">'. $_POST['d1-firstname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Surname</td><td style="padding: 0 10px;">'. $_POST['d1-surname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID / Passport Number</td><td style="padding: 0 10px;">'. $_POST['d1-idpass'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID Validation Notice</td><td style="padding: 0 10px;"><p>'. $_POST['d1-idvalidnotice'] .'</p></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Date of Birth</td><td style="padding: 0 10px;">'. $_POST['d1-dob'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Age</td><td style="padding: 0 10px;">'. $_POST['d1-age'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Marital Status</td><td style="padding: 0 10px;">'. $_POST['d1-marital'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Ethnicity</td><td style="padding: 0 10px;">'. $_POST['d1-race'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Gender</td><td style="padding: 0 10px;">'. $_POST['d1-gender-radio'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Relationship to main memeber</td><td style="padding: 0 10px;">'. $_POST['d1reltype'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Telephone number</td><td style="padding: 0 10px;">'. $_POST['d1-contact'] .'</td></tr>';
    if(isset($_POST['d1tax'])){
      $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Tax number</td><td style="padding: 0 10px;">'. $_POST['d1tax'] .'</td></tr>';
    }
    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
  
  if($_POST['d2-firstname'] !== ""){
  $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Dependant 2 Details</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Title</td><td style="padding: 0 10px;">'. $_POST['dep2-title'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name</td><td style="padding: 0 10px;">'. $_POST['d2-firstname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Surname</td><td style="padding: 0 10px;">'. $_POST['d2-surname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID / Passport Number</td><td style="padding: 0 10px;">'. $_POST['d2-idpass'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID Validation Notice</td><td style="padding: 0 10px;"><p>'. $_POST['d2-idvalidnotice'] .'</p></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Date of Birth</td><td style="padding: 0 10px;">'. $_POST['d2-dob'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Age</td><td style="padding: 0 10px;">'. $_POST['d2-age'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Marital Status</td><td style="padding: 0 10px;">'. $_POST['d2-marital'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Ethnicity</td><td style="padding: 0 10px;">'. $_POST['d2-race'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Gender</td><td style="padding: 0 10px;">'. $_POST['d2-gender-radio'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Relationship to main memeber</td><td style="padding: 0 10px;">'. $_POST['d2reltype'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Telephone number</td><td style="padding: 0 10px;">'. $_POST['d2-contact'] .'</td></tr>';
    if(isset($_POST['d2tax'])){
      $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Tax number</td><td style="padding: 0 10px;">'. $_POST['d2tax'] .'</td></tr>';
    }
    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
  }
  if($_POST['d3-firstname'] !== ""){
  $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Dependant 3 Details</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Title</td><td style="padding: 0 10px;">'. $_POST['dep3-title'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name</td><td style="padding: 0 10px;">'. $_POST['d3-firstname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Surname</td><td style="padding: 0 10px;">'. $_POST['d3-surname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID / Passport Number</td><td style="padding: 0 10px;">'. $_POST['d3-idpass'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID Validation Notice</td><td style="padding: 0 10px;"><p>'. $_POST['d3-idvalidnotice'] .'</p></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Date of Birth</td><td style="padding: 0 10px;">'. $_POST['d3-dob'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Age</td><td style="padding: 0 10px;">'. $_POST['d3-age'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Marital Status</td><td style="padding: 0 10px;">'. $_POST['d3-marital'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Ethnicity</td><td style="padding: 0 10px;">'. $_POST['d3-race'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Gender</td><td style="padding: 0 10px;">'. $_POST['d3-gender-radio'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Relationship to main memeber</td><td style="padding: 0 10px;">'. $_POST['d3reltype'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Telephone number</td><td style="padding: 0 10px;">'. $_POST['d3-contact'] .'</td></tr>';
    if(isset($_POST['d3tax'])){
      $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Tax number</td><td style="padding: 0 10px;">'. $_POST['d3tax'] .'</td></tr>';
    }
    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
  }
  if($_POST['d4-firstname'] !== ""){
  $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Dependant 4 Details</td></tr>
  <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Title</td><td style="padding: 0 10px;">'. $_POST['dep4-title'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name</td><td style="padding: 0 10px;">'. $_POST['d4-firstname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Surname</td><td style="padding: 0 10px;">'. $_POST['d4-surname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID / Passport Number</td><td style="padding: 0 10px;">'. $_POST['d4-idpass'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">ID Validation Notice</td><td style="padding: 0 10px;"><p>'. $_POST['d4-idvalidnotice'] .'</p></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Date of Birth</td><td style="padding: 0 10px;">'. $_POST['d4-dob'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Age</td><td style="padding: 0 10px;">'. $_POST['d4-age'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Marital Status</td><td style="padding: 0 10px;">'. $_POST['d4-marital'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Ethnicity</td><td style="padding: 0 10px;">'. $_POST['d4-race'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Gender</td><td style="padding: 0 10px;">'. $_POST['d4-gender-radio'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Relationship to main memeber</td><td style="padding: 0 10px;">'. $_POST['d4reltype'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Telephone number</td><td style="padding: 0 10px;">'. $_POST['d4-contact'] .'</td></tr>';
    if(isset($_POST['d4tax'])){
      $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Tax number</td><td style="padding: 0 10px;">'. $_POST['d4tax'] .'</td></tr>';
    }
  }
  }
  $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Banking Details</h3></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Is this a third party account</td><td style="padding: 0 10px;">'. $consentanswer .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Contributions</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Bank Name</td><td style="padding: 0 10px;">'. $_POST['contrib-bankname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Branch Name</td><td style="padding: 0 10px;">'. $_POST['contributionbranchname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Branch Code</td><td style="padding: 0 10px;">'. $_POST['contributionbranchcode'] .'</td></tr>';
    if($_POST['thirdpartycheckfield'] === 'yes'){
      $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Holder Name</td><td style="padding: 0 10px;">'. $_POST['contrib-accholdname'] .' '. $_POST['contrib-accholdsurname'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Holder ID Number</td><td style="padding: 0 10px;">'. $_POST['contrib-accholdid'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Holder ID Validation</td><td style="padding: 0 10px;">'. $_POST['thirdpartyidvalid'] .'</td></tr>';
    }
    else{
      $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Holder Name</td><td style="padding: 0 10px;">'. $_POST['contributionaccountholder'] .'</td></tr>';
    }
    $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Number</td><td style="padding: 0 10px;">'. $_POST['contrib-accnum'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account type</td><td style="padding: 0 10px;">'. $_POST['contributionaccounttype'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Validation Message</td><td style="width: 78%;padding: 0 10px;"><p>'. $_POST['contribverification'] .'</p></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Debit Order Date</td><td style="padding: 0 10px;">'. $_POST['contribdate-radio'] .'</td></tr>';
    if($_POST['thirdpartycheckfield'] === 'yes'){
        $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Letter of consent</td><td style="padding: 0 10px;">'. $uploadfilename6 .'</td></tr>';
    }
    $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
  if($_POST['accsamecontrib'] === 'copy'){
    $message .='<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Refunds</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Bank Name</td><td style="padding: 0 10px;">'. $_POST['contrib-bankname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Branch Name</td><td style="padding: 0 10px;">'. $_POST['contributionbranchname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Branch Code</td><td style="padding: 0 10px;">'. $_POST['contributionbranchcode'] .'</td></tr>';
    if($_POST['thirdpartycheckfield'] === 'yes'){
      $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Holder Name</td><td style="padding: 0 10px;">'. $_POST['contrib-accholdname'] .' '. $_POST['contrib-accholdsurname'] .'</td></tr>';
    }
    else{
      $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Holder Name</td><td style="padding: 0 10px;">'. $_POST['contributionaccountholder'] .'</td></tr>';
    }
    $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Number</td><td style="padding: 0 10px;">'. $_POST['contrib-accnum'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account type</td><td style="padding: 0 10px;">'. $_POST['contributionaccounttype'] .'</td></tr>';
  }
  else{
      $message .='<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Refunds</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Bank Name</td><td style="padding: 0 10px;">'. $_POST['refund-bankname'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Branch Name</td><td style="padding: 0 10px;">'. $_POST['refundbranchname'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Branch Code</td><td style="padding: 0 10px;">'. $_POST['refundbranchcode'] .'</td></tr>';
      if($_POST['refthirdpartycheckfield'] === 'yes'){
        $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Holder Name</td><td style="padding: 0 10px;">'. $_POST['refund-accholdname'] .' '. $_POST['refund-accholdsurname'] .'</td></tr>';
      }
      else{
        $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Holder Name</td><td style="padding: 0 10px;">'. $_POST['refundaccountholder'] .'</td></tr>';
      }
      $message .='<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account Number</td><td style="padding: 0 10px;">'. $_POST['refund-accnum'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Account type</td><td style="padding: 0 10px;">'. $_POST['refundaccounttype'] .'</td></tr>';
  }
  if($prevmedicalis == 'yes'){
      if($_POST['prevmed-namesurname1'] !== ''){
          //if prevmed 1
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Previous Medical Aid Details</h3></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Member 1</h3></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Members Name and Surname</td><td style="padding: 0 10px;">'. $_POST['prevmed-namesurname1'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Medical Scheme Name</td><td style="padding: 0 10px;">'. $_POST['prevmed-medscheme1'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Membership Number</td><td style="padding: 0 10px;">'. $_POST['prevmed-memnum1'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Join Date</td><td style="padding: 0 10px;">'. $_POST['prevmed-djoin1'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">End Date</td><td style="padding: 0 10px;">'. $_POST['prevmed-dend1'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Medical Scheme Certitifcate of membership</td><td style="padding: 0 10px;">'. $uploadfilename1 .'</td></tr>';
      }
      if($_POST['prevmed-namesurname2'] !== ''){
          //if prevmed 2
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Member 2</h3></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Members Name and Surname</td><td style="padding: 0 10px;">'. $_POST['prevmed-namesurname2'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Medical Scheme Name</td><td style="padding: 0 10px;">'. $_POST['prevmed-medscheme2'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Membership Number</td><td style="padding: 0 10px;">'. $_POST['prevmed-memnum2'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Join Date</td><td style="padding: 0 10px;">'. $_POST['prevmed-djoin2'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">End Date</td><td style="padding: 0 10px;">'. $_POST['prevmed-dend2'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Medical Scheme Certitifcate of membership</td><td style="padding: 0 10px;">'. $uploadfilename2 .'</td></tr>';
      }
      if($_POST['prevmed-namesurname3'] !== ''){
          //if prevmed 3
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Member 3</h3></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Members Name and Surname</td><td style="padding: 0 10px;">'. $_POST['prevmed-namesurname3'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Medical Scheme Name</td><td style="padding: 0 10px;">'. $_POST['prevmed-medscheme3'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Membership Number</td><td style="padding: 0 10px;">'. $_POST['prevmed-memnum3'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Join Date</td><td style="padding: 0 10px;">'. $_POST['prevmed-djoin3'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">End Date</td><td style="padding: 0 10px;">'. $_POST['prevmed-dend3'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Medical Scheme Certitifcate of membership</td><td style="padding: 0 10px;">'. $uploadfilename3 .'</td></tr>';
      }
      if($_POST['prevmed-namesurname4'] !== ''){
          //if prevmed 4
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Member 4</h3></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Members Name and Surname</td><td style="padding: 0 10px;">'. $_POST['prevmed-namesurname4'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Medical Scheme Name</td><td style="padding: 0 10px;">'. $_POST['prevmed-medscheme4'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Membership Number</td><td style="padding: 0 10px;">'. $_POST['prevmed-memnum4'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Join Date</td><td style="padding: 0 10px;">'. $_POST['prevmed-djoin4'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">End Date</td><td style="padding: 0 10px;">'. $_POST['prevmed-dend4'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Medical Scheme Certitifcate of membership</td><td style="padding: 0 10px;">'. $uploadfilename4 .'</td></tr>';
      }
      if($_POST['prevmed-namesurname5'] !== ''){
          //if prevmed 5
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Member 5</h3></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Members Name and Surname</td><td style="padding: 0 10px;">'. $_POST['prevmed-namesurname5'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Medical Scheme Name</td><td style="padding: 0 10px;">'. $_POST['prevmed-medscheme5'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Membership Number</td><td style="padding: 0 10px;">'. $_POST['prevmed-memnum5'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Join Date</td><td style="padding: 0 10px;">'. $_POST['prevmed-djoin5'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">End Date</td><td style="padding: 0 10px;">'. $_POST['prevmed-dend5'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Previous Medical Scheme Certitifcate of membership</td><td style="padding: 0 10px;">'. $uploadfilename5 .'</td></tr>';
      }
  }
  if($_POST['mq1-radio'] == 'yes'){
      if($_POST['medicalquestion1-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Medical Questions</h3></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 1</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion1code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion1-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion1-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion1-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion1-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion1-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion1-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion12-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 1</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion1code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion12-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion12-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion12-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion12-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion12-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion12-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion13-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 1</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion1code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion13-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion13-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion13-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion13-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion13-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion13-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion14-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 1</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion1code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion14-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion14-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion14-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion14-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion14-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion14-gpspec'] .'</td></tr>';
      }
  }
  if($_POST['mq2-radio'] == 'yes'){
      if($_POST['medicalquestion2-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 2</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion2code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion2-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion2-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion2-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion2-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion2-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion2-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion22-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 2</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion2code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion22-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion22-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion22-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion22-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion22-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion22-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion23-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 2</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion2code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion23-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion23-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion23-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion23-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion23-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion23-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion24-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 2</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion2code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion24-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion24-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion24-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion24-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion24-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion24-gpspec'] .'</td></tr>';
      }
  }
  if($_POST['mq3-radio'] == 'yes'){
      if($_POST['medicalquestion3-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 3</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion3code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion3-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion3-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion3-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion3-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion3-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion3-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion32-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 3</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion3code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion32-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion32-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion32-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion32-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion32-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion32-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion33-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 3</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion3code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion33-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion33-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion33-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion3-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion33-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion33-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion34-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 3</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion3code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion34-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion34-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion34-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion34-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion34-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion34-gpspec'] .'</td></tr>';
      }
  }
  if($_POST['mq4-radio'] == 'yes'){
      if($_POST['medicalquestion4-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 4</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion4code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion4-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion4-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion4-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion4-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion4-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion4-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion42-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 4</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion4code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion42-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion42-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion42-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion42-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion42-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion42-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion43-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 4</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion4code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion43-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion43-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion43-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion43-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion43-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion43-gpspec'] .'</td></tr>';
      }
      if($_POST['medicalquestion44-name'] !== ''){
          $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
          <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Medical Questions 4</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Medical Code</td><td style="padding: 0 10px;">'. $_POST['medquestion4code'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['medicalquestion44-name'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Illness</td><td style="padding: 0 10px;">'. $_POST['medicalquestion44-illness'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Currently being treated</td><td style="padding: 0 10px;">'. $_POST['medicalquestion44-radios'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion44-firsttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Last Treatment Date</td><td style="padding: 0 10px;">'. $_POST['medicalquestion44-lasttreat'] .'</td></tr>
          <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name of Doctor / Specialist</td><td style="padding: 0 10px;">'. $_POST['medicalquestion44-gpspec'] .'</td></tr>';
      }
  }
  if(isset($_POST['gpnow-mnamesurname'])){
    if($_POST['gpnow-mnamesurname'] && $_POST['m-deps-radio'] == 'no'){
    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
      <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">GP Nominations</h3></td></tr>
      <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Main Member</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['gpnow-mnamesurname'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-mdocname1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-mprcnum1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-mdocname2'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-mprcnum2'] .'</td></tr>';
    }
    if(($_POST['gpnow-mnamesurname'] || $_POST['gpnow-d1namesurname'] || $_POST['gpnow-d2namesurname'] || $_POST['gpnow-d3namesurname'] || $_POST['gpnow-d4namesurname']) && $_POST['m-deps-radio'] == 'yes'){
    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
      <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">GP Nominations</h3></td></tr>
      <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Main Member</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['gpnow-mnamesurname'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-mdocname1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-mprcnum1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-mdocname2'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-mprcnum2'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
    
    if($_POST['gpnow-d1namesurname']){
    $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Dependant 1 Member</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['gpnow-d1namesurname'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-d1docname1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-d1prcnum1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-d1docname2'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-d1prcnum2'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
    }
    if($_POST['gpnow-d2namesurname']){
    $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Dependant 2 Member</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['gpnow-d2namesurname'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-d2docname1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-d2prcnum1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-d2docname2'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-d2prcnum2'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
    }
    if($_POST['gpnow-d3namesurname']){
    $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Dependant 3 Member</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['gpnow-d3namesurname'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-d3docname1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-d3prcnum1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-d3docname2'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-d3prcnum2'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>';
    }
    if($_POST['gpnow-d4namesurname']){
    $message .=  '<tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;color: #ffffff;">Dependant 4 Member</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Name and Surname</td><td style="padding: 0 10px;">'. $_POST['gpnow-d4namesurname'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-d4docname1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">First GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-d4prcnum1'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Name</td><td style="padding: 0 10px;">'. $_POST['gpnow-d4docname2'] .'</td></tr>
      <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Second GP Practice Number</td><td style="padding: 0 10px;">'. $_POST['gpnow-d4prcnum2'] .'</td></tr>';
    }
  }
  }
    $message .=  '<tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;"></td><td style="padding: 0 10px;"></td></tr>
    <tr style="background: #3b3838;color: #ffffff;"><td colspan="2" style="height: 40px;margin: 0;padding: 0 10px;"><h3 style="margin: 0;color: #ffffff;">Declaration</h3></td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Agreed to Terms and Conditions</td><td style="padding: 0 10px;">'. $termsagree .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Date of Agreement</td><td style="padding: 0 10px;">'. $_POST['advisor-date'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Main Members Full Name</td><td style="padding: 0 10px;">'. $_POST['advisor-memfullname'] .'</td></tr>
    <tr><td style="width: 22%;border-right: solid 2px #3b3838;padding: 5px 10px;">Member Agreed</td><td style="padding: 0 10px;">'. $memagree .'</td></tr>
    </table>
    </div>';
  
  // Include mpdf library file
  require_once __DIR__ . '/vendor/autoload.php';
  $mpdf = new \Mpdf\Mpdf();
  
  // PDF builder scripts
  $mpdf->WriteHTML($message);
  echo $message;
  
  global $uploads;
  if($submitsatus == 'OK'){ //|| $submitsatus == 'ERROR'){
      // create, save and binary the pdf message
      //set pdf creation variables
  
      $filename = $membershipnumber."-".$submitqueryid."-summary.pdf";
      // ob_clean();
      $spdf = $mpdf->Output('feduploads/'.$filename, 'F');
  
      $file = file_get_contents('feduploads/'.$filename);
      $uploadbinary = base64_encode($file);
  
      if($_FILES['com1upload']['name']){
      $file1 = file_get_contents('feduploads/'.$filesname1);
      $uploadbinary1 = base64_encode($file1);
      echo $uploadbinary1;
      echo "yay";
      }
      else{
      $$uploadbinary1 = '';
      echo "boohooo";
      }
  
      if($_FILES['com2upload']['name']){
      $file2 = file_get_contents('feduploads/'.$filesname2);
      $uploadbinary2 = base64_encode($file2);
      // echo $uploadbinary2;
      }
      else{
      $$uploadbinary2 = '';
      }
  
      if($_FILES['com3upload']['name']){
      $file3 = file_get_contents('feduploads/'.$filesname3);
      $uploadbinary3 = base64_encode($file3);
      // echo $uploadbinary3;
      }
      else{
      $$uploadbinary3 = '';
      }
  
      if($_FILES['com4upload']['name']){
      $file4 = file_get_contents('feduploads/'.$filesname4);
      $uploadbinary4 = base64_encode($file4);
      // echo $uploadbinary4;
      }
      else{
      $$uploadbinary4 = '';
      }
  
      if($_FILES['com5upload']['name']){
      $file5 = file_get_contents('feduploads/'.$filesname5);
      $uploadbinary5 = base64_encode($file5);
      // echo $uploadbinary5;
      }
      else{
      $$uploadbinary5 = '';
      }
  
      if($_FILES['consentupload']['name']){
      $file6 = file_get_contents('feduploads/'.$filesname6);
      $uploadbinary6 = base64_encode($file6);
      // echo $uploadbinary6;
      }
      else{
      $$uploadbinary6 = '';
      }
  
      // $file = file_get_contents('http://forms.afrocentricds.com/feduploads/'.$filename);
      // echo $uploadbinary;
  
      // upload api
      $collectionstart = '{
      "resourceType": "Bundle",
      "meta": {
      },
      "versionId": "1",
      "lastUpdated": "2017-07-01T11:02:30.754",
      "type": "collection",
      "entry": [';
  
      $uploadpdf = '{
          "resourceType": "Binary",
          "id": "'.$filename.'",
          "contentType": "application/pdf",
          "content": "'.$uploadbinary.'"
      }';
      $uploadpdf1 = '{
          "resourceType": "Binary",
          "id": "'.$filesname1.'",
          "contentType": "'.$apptype1.'",
          "content": "'.$uploadbinary1.'"
      }';
      $uploadpdf2 = '{
          "resourceType": "Binary",
          "id": "'.$filesname2.'",
          "contentType": "'.$apptype2.'",
          "content": "'.$uploadbinary2.'"
      }';
      $uploadpdf3 = '{
          "resourceType": "Binary",
          "id": "'.$filesname3.'",
          "contentType": "'.$apptype3.'",
          "content": "'.$uploadbinary3.'"
      }';
      $uploadpdf4 = '{
          "resourceType": "Binary",
          "id": "'.$filesname4.'",
          "contentType": "'.$apptype4.'",
          "content": "'.$uploadbinary4.'"
      }';
      $uploadpdf5 = '{
          "resourceType": "Binary",
          "id": "'.$filesname5.'",
          "contentType": "'.$apptype5.'",
          "content": "'.$uploadbinary5.'"
      }';
      $uploadpdf6 = '{
          "resourceType": "Binary",
          "id": "'.$filesname6.'",
          "contentType": "'.$apptype6.'",
          "content": "'.$uploadbinary6.'"
      }';
  
      $collectionend = ']
      }';
  // echo "<br><br>upload binary : <br><br>".$uploadbinary;
  // echo "<br><br>upload binary : <br><br>".$uploadbinary1;
  // echo "<br><br>upload binary : <br><br>".$uploadbinary2;
  // echo "<br><br>upload binary : <br><br>".$uploadbinary3;
  // echo "<br><br>upload binary : <br><br>".$uploadbinary4;
  // echo "<br><br>upload binary : <br><br>".$uploadbinary5;
  // echo "<br><br>upload binary : <br><br>".$uploadbinary6;
  // echo "files size for empty : ".$_FILES['com4upload']['size'];
  
      $uploads = $collectionstart;
      $uploads .= '{"resource": ';
              $uploads .= $uploadpdf;
              if($uploadbinary !== '' && $_FILES['com1upload']['size'] !== 0){
                  $uploads .= '},
                              {"resource": ';
              }
              if($_FILES['com1upload']['size'] !== 0){
                  $uploads .= $uploadpdf1;
              }
              if($_FILES['com1upload']['size'] !== 0 && ($_FILES['com2upload']['size'] !== 0 || $_FILES['com3upload']['size'] !== 0 || $_FILES['com4upload']['size'] !== 0 || $_FILES['com5upload']['size'] !== 0 || $_FILES['consentupload']['size'] !== 0)){
                  $uploads .= '},
                              {"resource": ';
              }
              if($_FILES['com2upload']['size'] !== 0){
                  $uploads .= $uploadpdf2;
              }
              if($_FILES['com2upload']['size'] !== 0 && ($_FILES['com3upload']['size'] !== 0 || $_FILES['com4upload']['size'] !== 0 || $_FILES['com5upload']['size'] !== 0 || $_FILES['consentupload']['size'] !== 0)){
                  $uploads .= '},
                              {"resource": ';
              }
              if($_FILES['com3upload']['size'] !== 0){
                  $uploads .= $uploadpdf3;
              }
              if($_FILES['com3upload']['size'] !== 0 && ($_FILES['com4upload']['size'] !== 0 || $_FILES['com5upload']['size'] !== 0 || $_FILES['consentupload']['size'] !== 0)){
                  $uploads .= '},
                              {"resource": ';
              }
              if($_FILES['com4upload']['size'] !== 0){
                  $uploads .= $uploadpdf4;
              }
              if($_FILES['com4upload']['size'] !== 0 && ($_FILES['com5upload']['size'] !== 0 || $_FILES['consentupload']['size'] !== 0)){
                  $uploads .= '},
                              {"resource": ';
              }
              if($_FILES['com5upload']['size'] !== 0){
                  $uploads .= $uploadpdf5;
              }
              if($_FILES['com5upload']['size'] !== 0 && $_FILES['consentupload']['size'] !== 0){
                  $uploads .= '},
                              {"resource": ';
              }
              if($_FILES['consentupload']['size'] !== 0){
                  $uploads .= $uploadpdf6;
              }
      $uploads .= '}';
      $uploads .= $collectionend;
          // if($uploadbinary !== '' && $uploadbinary1 === '' && $uploadbinary2 === '' && $uploadbinary3 === '' && $uploadbinary4 === '' && $uploadbinary5 === '' && $uploadbinary6 === ''){
          //     $uploads = $uploadbinary;
  
          //     $uploadurl = "https://services.webapi.heliosits.com:9443/fhir/v3/dev/applications/FDH/".$membershipnumber."/documents?dependantNumber=00&queryId=".$submitqueryid."";
          //     $curl = curl_init();
  
          //     curl_setopt_array($curl, array(
          //     CURLOPT_PORT => "9443",
          //     CURLOPT_URL => $uploadurl,
          //     CURLOPT_RETURNTRANSFER => true,
          //     CURLOPT_ENCODING => "",
          //     CURLOPT_MAXREDIRS => 10,
          //     CURLOPT_TIMEOUT => 30,
          //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          //     CURLOPT_CUSTOMREQUEST => "POST",
          //     CURLOPT_POSTFIELDS => $uploads,
          //     CURLOPT_HTTPHEADER => array(
          //         "authorization: Atmosphere atmosphere_app_id=\"helioswebapi-2KpETrqS0ZX9symBs2lbvA1D\"",
          //         "cache-control: no-cache",
          //         "content-type: application/json"
          //     ),
          //     ));
  
          //     $response = curl_exec($curl);
          //     $err = curl_error($curl);
  
          //     curl_close($curl);
  
          //     if ($err) {
          //     echo "cURL Error #:" . $err;
          //     } else {
          // // response from nexus when uploading files good for file upload error checking
          //     // echo $response;
          //     // echo "<br><br>This is the json passed :<br><br>".$uploads;
          //     // echo 'File has been uploaded';
          //     }
          // }
          // else{
              $uploadurl = "https://services.webapi.heliosits.com:9443/fhir/v3/dev/applications/FDH/".$membershipnumber."/documents?dependantNumber=00&queryId=".$submitqueryid."";
              // $uploadurl = "/fhir/v3/dev/memberships/FDH/".$membershipnumber."/documents?dependantNumber=00";
              $curl = curl_init();
  
              curl_setopt_array($curl, array(
              CURLOPT_PORT => "9443",
              CURLOPT_URL => $uploadurl,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => $uploads,
              CURLOPT_HTTPHEADER => array(
                  "authorization: Atmosphere atmosphere_app_id=\"helioswebapi-2KpETrqS0ZX9symBs2lbvA1D\"",
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
          // }
  
          // create and send pdf via email
          $pdf = $mpdf->Output($filename, 'S');
  
          sendEmail($pdf);
  
      // Email scripts
  
    function sendEmail($pdf){
      //Create an instance; passing `true` enables exceptions
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
        $mail->Port       = 587;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        global $emailname;
        global $emailaddress;
        //Recipients
        $mail->setFrom('forms@afrocentricds.com', 'Fedhealth Applications');
        $mail->addAddress($emailaddress, $emailname);     //Add a recipient
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        global $filename;
        //Attachments
        $mail->addStringAttachment($pdf,$filename);
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
}


?>
