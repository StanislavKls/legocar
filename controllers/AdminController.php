<?php

namespace Legocar\Controllers;

use Legocar\Models\User;
use Carbon\Carbon;
use Legocar\Models\Brand;

class AdminController
{
    private const VIEWS = __DIR__ . './../views/admin_panel/';
    public function index(): bool
    {
        session_start();
        require_once(AdminController::VIEWS . 'index.php');
        return true;
    }
    public function createUser(): bool
    {
        session_start();
        require_once(AdminController::VIEWS . 'create_user.php');
        return true;
    }
    public function addUser(): bool
    {
        $data = [];
        $data['name'] = $_POST['name'];
        $data['password'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $data['role'] = $_POST['role'];
        $data['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $user = new User();
        $user->fill($data);
        header("Location: ./users", true, 301);
        exit();
        return true;
    }
    public function users(): bool
    {
        session_start();
        $users = User::all();
        require_once(AdminController::VIEWS . 'users.php');
        return true;
    }
    public function brands(): bool
    {
        session_start();
        $brands = Brand::all();
        require_once(AdminController::VIEWS . 'brands.php');
        return true;
    }
    public function destroyUser(int $id): bool
    {
        if (!User::delete($id)) {
            echo 'Не удалось удалить';
            return false;
        }
        header("Location: /users", true, 301);
        exit();
        return true;
    }
    public function destroyBrand(int $id): bool
    {
        if (!Brand::delete($id)) {
            echo 'Не удалось удалить';
            return false;
        }
        header("Location: /brands", true, 301);
        exit();
        return true;
    }
}
