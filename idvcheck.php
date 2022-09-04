<?php

$memberId = $_POST['memberid'];
// $memberId = '8505145663084';
// echo $memberId;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://publicapi.honeycombonline.co.za/natural-person-idv-no-photo",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"MatterPerson.Surname\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"MatterPerson.FirstName\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"IdBookFront\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"MatterPerson.Passport\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"DriversBack\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"IdCardBack\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"PassportFront\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"IdCardFront\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"DriversFront\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"MatterPerson.IdentityNumber\"\r\n\r\n".$memberId."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJBY2Nlc3NLZXkiOiJjYmZkMjM2MC05NmU1LTRhNTgtODBhOS1lYTBlZTQwN2I0N2QiLCJDbGllbnRJZCI6IjEyOCIsIlVzZXJJZCI6IjJmZGFjMGE4LTU4MzItNDBjZC1hNWFhLWQ1ZTQ5NGMyYWFjNSIsIm5iZiI6MTYzNjk2MjYxNCwiZXhwIjo0NzkyNjM2MjE0LCJpYXQiOjE2MzY5NjI2MTQsImF1ZCI6IkJlZXNXYXgifQ.6EFDXMUjg3H8WH1FyREYuo533O3vaAaljOubeVMlWzU",
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // $response = "[".$response."]";
  // $response = $response;
  echo $response;
}



?>