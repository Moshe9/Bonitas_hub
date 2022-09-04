<?php
    $uploads = $_POST['files'];
    $memnum = $_POST['memnum'];
    $refid = $_POST['refid'];

    // $memnum = '27705374681';
    // $refid = '220322Q1HG92';
    $uploadurl = "https://zabryeos0.medscheme.com:1521/fhir/v3/dev/applications".$memnum."/documents?dependantNumber=00&queryId=".$refid."";
    // $uploadurl = "/fhir/v3/dev/memberships/BON/".$membershipnumber."/documents?dependantNumber=00";
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_PORT => "1521",
    CURLOPT_URL => $uploadurl,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $uploads,
    CURLOPT_HTTPHEADER => array(
        // "authorization: Atmosphere atmosphere_app_id=\"helioswebapi-4xxbQay6RUo2Prru0pjc0Iq2\"",
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
        //$response2 = json_encode($response);
        //$status2 = substr($status,-14,14);
        //var_dump($response2);
        echo $response;
    // echo "<br><br>This is the json passed :<br><br>".$uploads;
    // echo 'File has been uploaded';
    }

?>
