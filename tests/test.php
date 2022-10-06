<?php 
require_once __DIR__ . '/../vendor/autoload.php'; 

use pTinosq\Prismic4D;

$api = new Prismic4D\API();
$api->setProjectName('project_name');
$api->setAccessToken('access_token');

$ref = $api->getRef();

$document = $api->getDocument($ref, 'page_name');

var_dump($document);