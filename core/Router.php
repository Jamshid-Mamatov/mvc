
<?php


class Router {
    protected $routes = [];

    public function add($route, $controllerAction) {
        // Convert dynamic segments (e.g., ":id") to regex patterns 
        $route = preg_replace('/:([a-zA-Z0-9]+)/', '(?P<$1>[a-zA-Z0-9-]+)', $route);
        $route = "#^$route$#i"; // The "i" makes it case-insensitive
        // var_dump($route);
        $this->routes[$route] = $controllerAction;
    }

    public function dispatch($url) {
        $url = '/' . trim(parse_url($url, PHP_URL_PATH), '/');
        echo "<pre>Requested URL: $url</pre>"; // Debug
    
        foreach ($this->routes as $route => $controllerAction) {
            echo "<pre>Testing route: $route</pre>"; // Debug
            if (preg_match($route, $url, $matches)) {
                echo "<pre>Matched route: $route</pre>"; // Debug
                // Split controller and action
                // var_dump($controllerAction);
                $controllerAction = explode('@', $controllerAction);
                $controllerName = $controllerAction[0];
                $action = $controllerAction[1];

                // Include controller
                require_once "../app/Controllers/$controllerName.php";

                // Extract URL parameters (e.g., "id")
                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }

                // Call the controller action with parameters
                $controller = new $controllerName();
                call_user_func_array([$controller, $action], $params);
                return;
            }
        }

        // 404 if no route matches
        // http_response_code(404);
        echo "404 Not Found";
    }
}