<?php

$suburbchosen2 = strtoupper($_POST['suburbchosen']);
// $suburbchosen2 = 'ROOIHUISKRAAL';
$suburbchosen3 = str_replace(' ', '%20', $suburbchosen2);
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_PORT => "9443",
  CURLOPT_URL => "https://services.webapi.heliosits.com:9443/services/online/uat/data/suburbs/".$suburbchosen3."",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "authorization: Atmosphere atmosphere_app_id=\"helioswebapi-2KpETrqS0ZX9symBs2lbvA1D\"",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
//   echo $response;
  $array = json_decode(json_encode((array)simplexml_load_string($response)),true);
  if ( ! empty($array)) {
    $i=0;
    foreach ($array['town'] as $elem) {
      $arr[$i]['code'] = $elem['code'];
      $arr[$i]['countryCode'] = $elem['countryCode'];
      $arr[$i]['latitude'] = $elem['latitude'];
      $arr[$i]['longitude'] = $elem['longitude'];
      $arr[$i]['name'] = $elem['name'];
      $arr[$i]['postalCode'] = $elem['postalCode'];
      $arr[$i]['postalType'] = $elem['postalType'];
      $arr[$i]['printPostalCode'] = $elem['printPostalCode'];
      $arr[$i]['printSuburb'] = $elem['printSuburb'];
      $arr[$i]['printTown'] = $elem['printTown'];
      $arr[$i]['region'] = $elem['region'];
      $arr[$i]['suburb'] = $elem['suburb'];
     ++$i;
    }
   }
    //    echo '<pre>';print_r($array);
    // echo print_R($array['town']);
    // $arr2 = array_map(function($suburbs) {
    //     return $suburbs['suburb'];
    // }, $array['town']);


    $arr2 = array();
    $arr3 = array();
    // foreach ($array['town'] as $suburbs) {
    //     $arr2[] = $suburbs['suburb'];
    // }
    // foreach ($array['town'] as $code) {
    //     $arr3[] = $code['code'];
    // }
    // $suburblist = array_combine($arr3, $arr2);
    // echo '<pre>';print_r($suburblist);
    // var_dump($array);echo"<br><br>";
    foreach($array['town'] as $listedsubs){
      // echo"variable dump first foreach ";var_dump($listedsubs);
      foreach($listedsubs as $key=>$value){
        // echo "\r\nKey : ".$key."<br>";
        // echo " Value : ".$value."<br><br>";
        if(($key === "suburb" && $value === $suburbchosen2) && $listedsubs['postalType'] === 'S'){
          // echo $value." ".$suburbchosen2."<br>";
          // echo $listedsubs['code']."<br>";
          // echo $listedsubs['postalCode']."<br>";
          // echo $listedsubs['suburb']."<br><br>";
          $addysaves = [$listedsubs['code'],$listedsubs['postalCode'],$listedsubs['suburb']];
          // save the JSON encoded array
          $jsonData = json_encode($addysaves); 
          
          echo $jsonData;
        }
      }
    }

}