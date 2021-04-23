<?php

namespace Legocar\Controllers;

use Legocar\Auth;
use Legocar\Models\User;

class HomeController
{
    private const VIEWS = __DIR__ . './../views/';
    public function index()
    {
        require_once(HomeController::VIEWS . 'index.php');
        return true;
    }
    public function login()
    {
        $data['password'] = $_POST['pass'];
        $data['name']     = $_POST['name'];
        if (Auth::auth($data)) {
            echo 'Вы вошли';
        } else {
            echo 'Неправильный логин или пароль';
        }
        require_once(HomeController::VIEWS . 'index.php');
        return true;
    }
}
