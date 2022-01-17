<?php
    function oneSignalApi() {
        $curl = curl_init();
        $headers = array(
            'Authorization: Basic YOUR_APIKEY',
            'Content-Type: application/json; charset=utf-8'
        );
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://onesignal.com/api/v1/players/csv_export?app_id=YOUR APP ID",
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
    function getUserFile(){
        $userIdListLink = substr(oneSignalApi(),17,-2);
        $userIdListUrl = $userIdListLink." ";

        $content = file_get_contents($userIdListUrl);
        file_put_contents("app-user-informations.csv.gz",$content);
    }

    getUserFile();
