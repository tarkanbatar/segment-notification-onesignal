<?php 

declare(strict_types=1);

use OneSignal\Config;
use OneSignal\OneSignal;
use Symfony\Component\HttpClient\Psr18Client;
use Nyholm\Psr7\Factory\Psr17Factory;

require __DIR__ . '/vendor/autoload.php';

$config = new Config('fd4cc3d1-03f7-48b0-ad80-937081dc386f','NjdjMjVlNDUtYTVjMS00OTE3LTk5ZjctNGM0OGUwOTY3ODFj','NzIyNTIzMDgtNTllMi00NTY5LWI0OGYtMTkwZTM0MmE5NTg3');
$httpClient = new Psr18Client();
$requestFactory = $streamFactory = new Psr17Factory();

$oneSignal = new OneSignal($config,$httpClient, $requestFactory, $streamFactory);
$headings = array(
    "en" => 'Tarkan Batar'
);

// Nyholm fonksiyonlarını kontrol et çıkarabiliyorsan çıkar, resim ekle

$response = $oneSignal->notifications()->add([
   'contents'=>[
     "en" => 'Şampiyon TS',
   ],
    'content_available' => true,
    'included_segments' => array(
        'test'
    ),
//    'filters' => [
//        [
//            'fields' => 'tag',
//            'key' => 'user_type',
//            'relation' => '=',
//            'value' => ' basic'
//        ]
//    ],
    'headings' => $headings,
    'data' => ['foo'=>'bar']
]);

print_r($response);
