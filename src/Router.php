<?php

namespace Legocar;

class Router
{
    private $routes;
    private const ROUTES_PATH      = __DIR__ . '/../config/routes.php';
    public function __construct()
    {
        $this->routes = include(Router::ROUTES_PATH);
    }
    /**
     *
     * @return bool
     */
    public function run()
    {
        $uri = $_GET['url'];
        if ($uri === 'index.php') {
            $home = new \Legocar\Controllers\HomeController();
            return $home->index();
        }
        //находим необходимый контроллер и экшн, исходя из URL
        foreach ($this->routes as $pattern => $path) {
            if (preg_match("`$pattern`", $uri)) {
                $route      = preg_replace("`$pattern`", $path, $uri);
                $temp       = explode('/', $route);
                $controller = '\\Legocar\\Controllers\\' . array_shift($temp) . 'Controller';
                $action     = array_shift($temp);
                break;
            }
        }

        //если ничего не найдено, возвращаем 404
        if (empty($controller)) {
            return $this->error404();
        }

        //создаем контроллер и вызываем с необходимым экшеном
        $controllerObj = new $controller();
        return call_user_func_array([$controllerObj, $action], $temp);
    }
    /**
     *
     * @return bool
     */
    public function error404()
    {
        echo '404 Страницы не существует';
        return true;
    }
}
