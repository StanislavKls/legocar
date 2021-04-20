<?php

namespace Legocar;

class Router
{
    private $routes;
    private const PATH_CONTROLLERS = __DIR__ . '/../controllers/';
    public function __construct()
    {
        $routesPath = __DIR__ . '/../config/routes.php';
        $this->routes = include($routesPath);
    }
    /**
     *
     * @return bool
     */
    public function run()
    {
        $uri = $_GET['url'];

        //находим необходимый контроллер и экшн, исходя из URL
        foreach ($this->routes as $pattern => $path) {
            if (preg_match("~$pattern~", $uri)) {
                $temp = explode('/', $path);
                $controller = '\\Legocar\\Controllers\\' . ucfirst($temp[0]) . 'Controller';
                $action = $temp[1];
                break;
            }
        }
        if (empty($controller)) {
            return $this->error404();
        }

        //подключаем файл контроллера
        $controllerFile = Router::PATH_CONTROLLERS . $controller . '.php';
        if (file_exists($controllerFile)) {
            include_once($controllerFile);
        }

        //создаем объект и вызываем экшн
        $controllerObj = new $controller();
        return $controllerObj->$action();
    }
    /**
     *
     * @return bool
     */
    private function error404()
    {
        echo '404 Страницы не существует';
        return true;
    }
}
