<?php

namespace Legocar\Controllers;

use Legocar\Models\Car;
use Carbon\Carbon;

class CarsController
{
    private const VIEWS = __DIR__ . './../views/cars/';
    private const UPLOAD_DIR = __DIR__ . './../images/cars/';
    public function index($page = 1): bool
    {
        session_start();
        if ($page < 1) {
            $page = 1;
        }
        $cars = Car::all($page);
        require_once(CarsController::VIEWS . 'index.php');
        return true;
    }
    public function view($id): bool
    {
        session_start();
        $data  = Car::getItem($id);
        $car   = $data[0];
        require_once(CarsController::VIEWS . 'show.php');
        return true;
    }
    public function create(): bool
    {
        session_start();
        $car    = new Car();
        $models = $car::getModels();
        $brands = $car::getBrands();
        require_once(CarsController::VIEWS . 'create.php');
        return true;
    }
    public function store(): bool
    {
        session_start();
        $data['brand_id']   = $_POST['brand'];
        $data['model_id']   = $_POST['model'];
        $data['year']       = $_POST['year'];
        $data['color']      = $_POST['color'];
        $data['created_at'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['user_id']    = $_SESSION['id'];
        $data['size']       = $_FILES['image']['size'];
        $data['image']      = $_FILES['image']['name'];
        $type               = explode("/", $_FILES['image']['type']);
        $car                = new Car();

        //проверка изображения на уникальной (по имени и размеру), а также что это изображение
        if ($car::isImageUnique($data['image'], $data['size']) && $type[0] === 'image') {
            move_uploaded_file($_FILES['image']['tmp_name'], CarsController::UPLOAD_DIR . $data['image']);
            $car->fill($data);
            header("Location: /cars/page/1", true, 301);
            exit();
            return true;
        }
        echo 'Файл не является изображением или не уникален';
        return false;
    }
    public function update(int $id): bool
    {
        session_start();
        $data['brand_id']   = $_POST['brand'];
        $data['model_id']   = $_POST['model'];
        $data['year']       = $_POST['year'];
        $data['color']      = $_POST['color'];
        $car                = new Car();
        $car->update($data);
        header("Location: /cars/page/1", true, 301);
        exit();
        return true;
    }
    public function edit(int $id): bool
    {
        session_start();
        $data  = Car::getItem($id);
        $car   = $data[0];
        $models = Car::getModels();
        $brands = Car::getBrands();
        require_once(CarsController::VIEWS . 'edit.php');
        return true;
    }
}
