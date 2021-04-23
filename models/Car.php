<?php

namespace Legocar\Models;

use Legocar\DB;

class Car
{
    public static function all()
    {
        $myPDO = DB::connectDB();
        $result = $myPDO->query("SELECT cars.id, brands.name as brand, models.name as model, cars.year, cars.color, users.name as user, cars.created_at
                                 FROM cars 
                                 LEFT JOIN brands ON cars.brand_id = brands.id
                                 LEFT JOIN models ON cars.model_id = models.id
                                 LEFT JOIN users ON cars.user_id = users.id"
                                );
        return $result->fetchAll();
    }
    public function getModels()
    {
        $myPDO = DB::connectDB();
        $result = $myPDO->query("SELECT * FROM models ORDER BY id DESC;");
        return $result->fetchAll();
    }
    public function getBrands()
    {
        $myPDO = DB::connectDB();
        $result = $myPDO->query("SELECT * FROM brands ORDER BY id DESC;");
        return $result->fetchAll();
    }
    public function fill($data)
    {
        $myPDO = DB::connectDB();
        $sqlQuery = "INSERT
                     INTO cars (brand_id, model_id, year, color, user_id, created_at, image_path, image_size) 
                     VALUES (
                             '{$data['brand_id']}',
                             '{$data['model_id']}',
                             '{$data['year']}',
                             '{$data['color']}',
                             '{$data['user_id']}',
                             '{$data['created_at']}',
                             '{$data['image']}',
                             '{$data['size']}'
                             )";
        $myPDO->query($sqlQuery);
        return true;
    }
    /**
     * Проверка картинки на уникальность по имени файла и размеру
     *
     * @return bool
     */
    public static function isImageUnique($name, $size)
    {
        $myPDO = DB::connectDB();
        $result = $myPDO->query("SELECT image_path, image_size FROM cars")->fetchAll($myPDO::FETCH_ASSOC);
        if (empty($result)) {
            return true;
        }
        foreach ($result as $item) {
            if ($item['image_path'] === $name || $item['image_size'] === $size) {
                return false;
            }
        }
        return true;
    }
}
