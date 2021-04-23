<?php

namespace Legocar;

use PDOException;

class DB
{
    private const DB_CONFIG = __DIR__ . '/../config/db_config.php';
    public static function connectDB()
    {
        
        $params = include(DB::DB_CONFIG);
        try {
            return new \PDO("pgsql: host={$params['host']};
                                    port={$params['port']};
                                    dbname={$params['database']};
                                    user={$params['username']};
                                    password={$params['password']}");
        } catch (PDOException $e) {
            die("Не удалось подключиться: " . $e->getMessage());
        }
    }
}
