<?php

namespace Legocar;

use Legocar\DB;

class Auth
{
    public static function auth($data)
    {
        $myPDO = DB::connectDB();
        $result = $myPDO->query("SELECT id, name, password FROM users WHERE name = '{$data['name']}'")->fetchAll();
        if ($result[0]['name'] === $data['name'] && password_verify ( $data['password'] , $result[0]['password'])) {
            return true;
        }
        return false;
    }
}
