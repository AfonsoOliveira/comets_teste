<?php

function loadModel($model)
{
    $path = dirname(__DIR__) . '/models/' . $model . '.php';
    if (file_exists($path)) {
        require_once $path;
        if (class_exists($model)) {
            return new $model;
        }
    }
    return null;
}

function loadView($view, $data = array(), $print = true)
{
    $path = dirname(__DIR__) . '/views/' . $view . '.php';
    if (file_exists($path)) {
        if (is_array($data)) {
            extract($data);
        }
        ob_start();
        require_once $path;
        $response = ob_get_contents();
        ob_end_clean();
        if ($print === true) {
            echo $response;
        }
        return $response;
    }
}

function loadController($controller, $method, $params)
{
    $path = dirname(__DIR__) . '/controllers/' . $controller . '.php';
    if (file_exists($path)) {
        require_once $path;
        if (class_exists($controller)) {
            $class = new $controller;
            call_user_func_array(array($class, $method), $params);
        }
    }
}

function baseUrl($path = null)
{
    return is_string($path) ? BASE_URL . $path : BASE_URL;
}