<?php

class Router {
    private $routes = [];

    public function addRoute($path, $method, $handler) {
        $this->routes[$path][$method] = $handler;
    }

    public function handleRequest($requestUri, $requestMethod) {
        // Remove query string from the request URI
        $requestUri = strtok($requestUri, '?');

        if (isset($this->routes[$requestUri])) {
            $handler = $this->routes[$requestUri][$requestMethod] ?? null;

            if ($handler instanceof Closure) {
                $handler($this->getRequestData());
            } else {
                $this->handleError(404);
            }
        } else {
            $this->handleError(404);
        }
    }

    private function getRequestData() {
        $requestData = file_get_contents('php://input');

        // Parse the request data based on the content type
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        $data = [];

        if (strpos($contentType, 'application/json') !== false) {
            // Parse JSON data
            $data = json_decode($requestData, true);
        } elseif (strpos($contentType, 'application/x-www-form-urlencoded') !== false) {
            // Parse URL-encoded form data
            parse_str($requestData, $data);
        }

        return $data;
    }

    private function handleError($statusCode) {
        switch ($statusCode) {
            case 404:
                echo '404 Not Found';
                break;
        }
    }
}