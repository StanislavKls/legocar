<?php

namespace Legocar\Models;

use Legocar\DB;

class Brand
{
    public static function all()
    {
        $myPDO = DB::connectDB();
        $result = $myPDO->query("SELECT * FROM brands");
        return $result->fetchAll($myPDO::FETCH_ASSOC);
    }
    public static function delete(int $id)
    {
        $myPDO = DB::connectDB();
        $sqlQuery0 = "DELETE FROM cars WHERE brand_id = {$id}";
        $sqlQuery1 = "DELETE FROM brands WHERE id = {$id}";
        $myPDO->query($sqlQuery0);
        return $myPDO->query($sqlQuery1);;
    }
}
