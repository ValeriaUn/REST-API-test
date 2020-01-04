<?php

// required headers
use src\models\DB;
use src\models\User;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../models/User.php';
include_once '../models/DB.php';

$database = (new DB())->getConnection();
$user = new User($database);

parse_str(file_get_contents("php://input"), $data);
$data = (object)$data;
$statusCode = 200;
$status = 'Ok';

if (!$user->delete($data->id)) {
    $statusCode = 503;
    $status = 'Error';
}

http_response_code($statusCode);

echo json_encode(['status' => $status]);
exit;