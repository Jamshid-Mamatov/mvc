<?php


class Router
{
    protected $routes = [];


    public function add($route, $controller, $method = 'GET')
    {
        $this->routes[$route] = [
            'controller' => $controller,
            'method' => $method
        ];
    }

    // dispatch the reqeust to the appropriate controller
    public function dispatch($url)
    {
        // var_dump($this->routes[$url]);
        // var_dump(parse_url($url, PHP_URL_PATH));
        // $url = trim(parse_url($url, PHP_URL_PATH), '/');
        $url=parse_url($url, PHP_URL_PATH);
        // var_dump($url);
        if(!array_key_exists($url, $this->routes)) {
            echo('404');
            return;
        }
        else{
            $controllerAction = explode('@', $this->routes[$url]['controller']);
            $controller = $controllerAction[0];
            $action = $controllerAction[1];
            // var_dump(ROOT_PATH);
            require_once(ROOT_PATH.'/app/Controllers/'.$controller.'.php');

            $controller = new $controller();
            $controller->$action();
        }

    }
}