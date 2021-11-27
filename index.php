<?php
require 'vendor/autoload.php';

$sharedConfig = [
    'credentials' => [
        'key'      => 'ysxJuclmSULzCJmYFad_',
        'secret'   => 's6keNRIxyaEZxITgBUz_B09ZmxKEIw7_wySZWl1u',
    ],
    'region'   => 'us-east-1',
    'endpoint' => 'https://storage.yandexcloud.net',
    'version'  => 'latest',
];

$sdk = new Aws\Sdk($sharedConfig);
$s3Client = $sdk->createS3();

$result = $s3Client->getObject([
    'Bucket' => 'static.haton.ru',
    'Key' => 'page_018ff7cd3eeecb374fca215df761a725'
]);

echo $result['Body'];
echo $result['LastModified'];

// $key = 'page_' . md5('https://haton.ru' . $_SERVER['REQUEST_URI']);
// $html = file_get_contents('page_0a90f7e091d6ba352959853bf9621035');
// echo $html;
