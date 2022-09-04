<?php

$accholdername = $_POST['accholdername'];
$accholdersurname = $_POST['accholdersurname'];
$accholderid = $_POST['accholderid'];
$accnumber = $_POST['accnumber'];
$acctype = $_POST['acctype'];
$bankname = $_POST['bankname'];
$branchcode = $_POST['branchcode'];

global $response;
global $response2;
global $response3;
global $response4;
global $response5;
global $response6;
$response6 = array();

$curl = curl_init();

$postfields = "{\"matterPerson\":{\"firstName\":\"".$accholdername."\",\"surname\":\"".$accholdersurname."\",\"identityNumber\":\"".$accholderid."\",\"passport\":\"\"},\"accNo\":\"".$accnumber."\",\"bankName\":\"".$bankname."\",\"branchCode\":\"".$branchcode."\",\"accType\":\"".$acctype."\"}";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://publicapi.honeycombonline.co.za/natural-person-account-verification-real-time",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $postfields,
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJBY2Nlc3NLZXkiOiJjYmZkMjM2MC05NmU1LTRhNTgtODBhOS1lYTBlZTQwN2I0N2QiLCJDbGllbnRJZCI6IjEyOCIsIlVzZXJJZCI6IjJmZGFjMGE4LTU4MzItNDBjZC1hNWFhLWQ1ZTQ5NGMyYWFjNSIsIm5iZiI6MTYzNjk2MjYxNCwiZXhwIjo0NzkyNjM2MjE0LCJpYXQiOjE2MzY5NjI2MTQsImF1ZCI6IkJlZXNXYXgifQ.6EFDXMUjg3H8WH1FyREYuo533O3vaAaljOubeVMlWzU",
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
    // echo $response."<br/><br/>";
    
    $response2 = json_decode($response, true);
    
    if($response2['outputVerificationResponse'] != null){
      $response3 = $response2['outputVerificationResponse']['idNumberValid'];
      $response4 = $response2['outputVerificationResponse']['accountNumberValid'];
      $response5 = $response2['outputVerificationResponse']['accountStatus'];
    }

    // if ($response3 === true && $response4 === true && $response5 === 'Open'){
      echo $response;
    // }
    
    // if($response3 === false || $response4 === false || $response5 === 'Closed'){//$retry = 6 && $response3 !== 'Yes'){
    //   // $response6['outputVerificationResponse'] = array(null);
    //   // $response6 = json_decode($reponse6, true);
    //   {
    //     echo $response;
    //   }
    //   // toastr.warning("bank verification failed");
    //   //           console.log(response)
    
    // }
}

?>