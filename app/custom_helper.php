<?php

function regenToken()
    {
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL,"https://login.windows.net/common/oauth2/token");
      curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
                   "client_id=42283739-1b72-4a4c-af9e-6655ea649bd6&client_secret=kgR24]Ian9-M./7LoiODZ1FRb8rBv[=h&username=signum.powerbi@kiteservices.com&password=Hoj71537&resource=https://analysis.windows.net/powerbi/api&grant_type=password&scopes=openid");
     
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
      // receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $server_output = curl_exec ($ch);
      curl_close ($ch);
      $responses = json_decode($server_output,true);
      
      if(!isset($responses['access_token'])){
          print_r($responses['error_description']);
          exit();
      }

      session(['timegenerated' => time()]);

      session(['accessToken' => $responses['access_token']]);
    
    return $responses['access_token'];
    }

    function splitUrlVals($url)
    {
      $url = str_replace("https://app.powerbi.com/","",$url);

      $urlArr = explode("/",$url);

      $groupId = $urlArr[1];
      $reportId = $urlArr[3];
      $sectionId =  isset($urlArr[4]) ? $urlArr[4] : '';

      return [$groupId,$reportId,$sectionId];
    }