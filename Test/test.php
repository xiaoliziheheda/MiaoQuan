<?php
require_once __DIR__ . '/../vendor/autoload.php';

$config = [];
$res =  \Miao\Factory::make($config)->convert(['content' => '$FaAp1cNYjrq$']);
print_r($res);