<?php

namespace Legocar\Models;

use Legocar\DB;

class User
{
    public static function all()
    {
        $myPDO = DB::connectDB();
        $result = $myPDO->query("SELECT * FROM users");
        return $result->fetchAll();
    }
    public function get($id)
    {
        return true;
    }
    public function fill($data)
    {
        $myPDO = DB::connectDB();
        $sqlQuery = "INSERT
                     INTO users (name, password, role, created_at) 
                     VALUES ('{$data['name']}', '{$data['password']}', '{$data['role']}', '{$data['created_at']}')";
        $myPDO->query($sqlQuery);
        return true;
    }
    public static function delete($id)
    {
        $myPDO = DB::connectDB();
        $sqlQuery = "DELETE FROM users WHERE id = {$id}";
        return $myPDO->query($sqlQuery);
    }
    public static function isAdmin($id)
    {
        $myPDO = DB::connectDB();
        $result = $myPDO->query("SELECT role FROM users WHERE id = {$id}");
        $data = $result->fetchAll();
        if ($data[0]['role'] === 'admin') {
            return true;
        }
        return false;
    }
}
