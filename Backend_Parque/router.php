<?php

// router.php

class Router {
    private $routes = [];

    public function addRoute($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function route() {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        var_dump($requestPath);
        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestPath) {
                $handler = $route['handler'];
                include_once "handlers.php";
                $handler();
                return;
            }
        }

        // Si no se encuentra ninguna ruta coincidente
        echo json_encode(array("message" => "Ruta no encontrada"), JSON_PRETTY_PRINT);
    }
}

?>