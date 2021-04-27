<?php

namespace Legocar\Controllers;

use Legocar\Auth;
use Legocar\Models\User;

class HomeController
{
    private const VIEWS = __DIR__ . './../views/';
    public function index(): bool
    {
        session_start();
        require_once(HomeController::VIEWS . 'index.php');
        return true;
    }
    public function login(): bool
    {
        $data['password'] = $_POST['pass'];
        $data['name']     = $_POST['name'];
        if (Auth::auth($data)) {
            header("Location: /index.php", true, 301);
            exit();
        } else {
            echo 'Неправильный логин или пароль';
        }
        require_once(HomeController::VIEWS . 'index.php');
        return true;
    }
    public function exit(): bool
    {
        session_start();
        session_unset();
        header("Location: /index.php", true, 301);
        exit();
        return true;
    }
}
