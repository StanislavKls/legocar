<?php

namespace Legocar\Models;

use Legocar\DB;

class User
{
    public static function all(): array
    {
        $myPDO = DB::connectDB();
        $result = $myPDO->query("SELECT * FROM users");
        return $result->fetchAll($myPDO::FETCH_ASSOC);
    }
    public function fill($data): bool
    {
        $myPDO = DB::connectDB();
        $sqlQuery = "INSERT
                     INTO users (name, password, role, created_at) 
                     VALUES ('{$data['name']}', '{$data['password']}', '{$data['role']}', '{$data['created_at']}')";
        $myPDO->query($sqlQuery);
        return true;
    }
    public static function delete(int $id): \PDOStatement
    {
        $myPDO = DB::connectDB();
        $sqlQuery = "DELETE FROM users WHERE id = {$id}";
        return $myPDO->query($sqlQuery);
    }
    public static function getID($name): \PDOStatement
    {
        $myPDO = DB::connectDB();
        $sqlQuery = "DELETE FROM users WHERE name = {$name}";
        return $myPDO->query($sqlQuery);
    }
    public static function isAdmin(int $id): bool
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
