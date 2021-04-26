<?php

namespace Legocar;

use Legocar\DB;
use Legocar\Models\User;

class Auth
{
    public static function auth($data)
    {
        if ($data['name'] === '' || $data['password'] === '') {
            return false;
        }
        $myPDO = DB::connectDB();
        $result = $myPDO->query("SELECT id, name, password FROM users WHERE name = '{$data['name']}'")->fetchAll($myPDO::FETCH_ASSOC);
        if (empty($result)) {
            return false;
        }
        if ($result[0]['name'] === $data['name'] && password_verify ( $data['password'] , $result[0]['password'])) {
            session_start();
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['name'] = $result[0]['name'];
            $_SESSION['admin'] = User::isAdmin($result[0]['id']);
            return true;
        }
        return false;
    }
}
