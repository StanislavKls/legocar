<?php

namespace Legocar\Migrations;

require __DIR__ . './../vendor/autoload.php';

use Legocar\DB;

function migration ($sqlQuery)
{
    $myPDO = DB::connectDB();
    $myPDO->query($sqlQuery);
}
