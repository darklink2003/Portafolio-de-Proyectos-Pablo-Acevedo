<?php
require_once '../config/database.php';
require_once '../app/controllers/AuthController.php';

$page = $_GET['page'] ?? 'login';
$controller = new AuthController($pdo);

switch ($page) {
    case 'register':
        $controller->register();
        break;
    case 'dashboard':
        $controller->dashboard();
        break;
    case 'logout':
        $controller->logout();
        break;
    case 'login':
    default:
        $controller->login();
        break;
}

?>