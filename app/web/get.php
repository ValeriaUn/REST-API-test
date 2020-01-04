<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../models/User.php';

$database = (new \src\models\DB())->getConnection();
$model = new \src\models\User($database);

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