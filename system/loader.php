<?php
require_once dirname(__DIR__) . '/system/functions.php';
$page = isset($_GET['page']) ? $_GET['page'] : CONTROLLER_DEFAULT;
$page = explode('/', $page);
$controller = $page[0];
$method = isset($page[1]) ? $page[1] : 'index';
$params = array_slice($page, 2);
loadController($controller, $method, $params);