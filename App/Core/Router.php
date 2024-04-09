<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($uri, $controller, $method)
    {
        // Extracting parameters from the URI
        $pattern = '/\{(.*?)\}/';
        preg_match_all($pattern, $uri, $matches);
        $params = $matches[1];
        foreach ($params as $param) {
            $uri = str_replace('{' . $param . '}', '', $uri);
        }
        $uri = rtrim($uri, '/');
        $uri == '' ? $uri = '/' : null;
        $this->routes[] = [
            'uri' => $uri,
            'controller' => [
                'class' => $controller[0],
                'method' => $controller[1],
                'params' => $params
            ],
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function middleware($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route($uri, $request_method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($request_method)) {
                // Apply the middleware if it exists
                Middleware::resolve($route['middleware']);

                extract($route['controller']);
                $class = new $class();
                if (empty($params)) {
                    // If the route does not specify any parameters, just call the method
                    return $class->$method();
                } else {
                    // Passing parameters from the request that the route specified
                    $post_params = [];
                    foreach ($params as $param) {
                        $post_params[] = $_POST[$param] ?? $_GET[$param] ?? null;
                    }
                    return call_user_func_array([$class, $method], $post_params);
                }
            }
        }
        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.view.php");

        die();
    }


}