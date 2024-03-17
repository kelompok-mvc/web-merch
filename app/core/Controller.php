<?php
class Controller
{
    public function view($view, $data = [])
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['name_admin'])) {
            require_once '../app/views/admin/login.php';
        } else {
            require_once '../app/views/' . $view . '.php';
        }
    }
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
