<?php

require_once '../vendor/autoload.php';

$app = new \GupoMedical\Application([
    'hid' => 1,
    'base_url' => '',
    'header' => [
//        'Token' => '25c526204cbdf3a1e3db6c841d3f8954',
//        'Timestamp' => 1623395946000
    ]
]);
var_dump($app->inpatient->getList([
    'size' => 2,
    'permission_code' => 'A'
]));