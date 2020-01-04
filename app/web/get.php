<?php

namespace src\web;

use \src\models\DB;
use src\models\User;

// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../models/User.php';
include_once '../models/DB.php';

$database = (new DB())->getConnection();
$model = new User($database);

$id = isset($_GET['id']) ? $_GET['id'] : die();

$user = $model->get($id);
$statusCode = 200;
$status = 'Ok';

if(empty($user)){
    $statusCode = 503;
    $status = 'Error';
}

http_response_code($statusCode);

echo json_encode(['status' => $status, 'user' => $user]);exit;