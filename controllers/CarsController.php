<?php

namespace Legocar\Controllers;

class CarsController
{
    public function index()
    {
        echo 'Список машин';
        return true;
    }
    public function view($id)
    {
        echo 'Авто';
        return true;
    }
}
