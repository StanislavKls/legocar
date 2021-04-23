<?php

namespace Legocar\Controllers;

use Legocar\Models\Car;
use Carbon\Carbon;

class CarsController
{
    private const VIEWS = __DIR__ . './../views/cars/';
    private const UPLOAD_DIR = __DIR__ . './../images/cars/';
    public function index()
    {
        $cars = Car::all();
        require_once(CarsController::VIEWS . 'index.php');
        return true;
    }
    public function view($id)
    {
        require_once(CarsController::VIEWS . 'show.php');
        return true;
    }
    public function create()
    {
        $car    = new Car();
        $models = $car->getModels();
        $brands = $car->getBrands();
        require_once(CarsController::VIEWS . 'create.php');
        return true;
    }
    public function store()
    {
        
        $data['brand_id']   = $_POST['brand'];
        $data['model_id']   = $_POST['model'];
        $data['year']       = $_POST['year'];
        $data['color']      = $_POST['color'];
        $data['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['user_id']    = 1;
        $data['size']       = $_FILES['image']['size'];
        $data['image']      = $_FILES['image']['name'];
        $type               = explode("/", $_FILES['image']['type']);
        $car                = new Car();

        if ($car::isImageUnique($data['image'], $data['size']) && $type[0] === 'image') {
            move_uploaded_file($_FILES['image']['tmp_name'], CarsController::UPLOAD_DIR . $data['image']);
            $car->fill($data);
            header("Location: /cars", true, 301);
            exit();
            return true;
        }
        echo 'Файл не является изображением или не уникален';
        return false;
    }
}
