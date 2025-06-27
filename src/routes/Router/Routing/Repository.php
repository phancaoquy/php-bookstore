<?php

namespace PhpRouter\Routing;

use Closure;

class Repository
{
  private array $routes = [];

  public function save(
    string $method,
    string $path,
    $controller,
    ?string $name,
    array $middleware,
    ?string $domain,
  ): void {
    $route = new Route($method, $path, $controller, $name, $middleware, $domain);

    $this->routes['method'][$method][] = $route;

    if ($name !== null) {
      $this->routes['name'][$name] = $route;
    }
  }


  public function findByMethod(string $method): array
  {
    $route = array_merge(
      $this->routes['method']['*'] ?? [],
      $this->routes['method'][$method] ?? []
    );

    krsort($routes);

    return $routes;
  }

  public function findByName(string $name): ?Route
  {
    return $this->routes['name'][$name] ?? null;
  }

  public function all(): array
  {
    $all = [];

    foreach ($this->routes['method'] as $group) {
      foreach ($group as $route) {
        $all[] = $route;
      }
    }
    return $all;
  }
}
