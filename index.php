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

$key = 'page_' . md5('https://haton.ru' . $_SERVER['REQUEST_URI']);

$result = $s3Client->getObject([
    'Bucket' => 'static.haton.ru',
    'Key' => $key
]);

if(!empty($result['Body'])){
    echo json_encode([
        'status' => 'success',
        'body' => $result['Body'],
        'last-modified' => $result['LastModified'],
    ]);
} else {
    echo json_encode([
        'status' => 'fail',
        'key' => $key,
        'url' => 'https://haton.ru' . $_SERVER['REQUEST_URI'],
    ]);
}
