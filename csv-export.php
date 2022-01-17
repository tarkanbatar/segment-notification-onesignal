<?php
    function oneSignalApi() {
        $curl = curl_init();
        $headers = array(
            'Authorization: Basic your_APIKEY',
            'Content-Type: application/json; charset=utf-8'
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://onesignal.com/api/v1/players/csv_export?app_id=your_APPID",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => $headers
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    $userIdListLink = substr(oneSignalApi(),17,-2);
    $userIdListUrl = $userIdListLink." ";
    $filename= basename($userIdListUrl);

    $ch = curl_init($userIdListUrl);
    $dir = './';
    $saveFileLocation = $dir.$filename;

    $fp = fopen($saveFileLocation, 'wb');

    curl_setopt($ch, CURLOPT_FILE,$fp);


    echo $userIdListLink;
