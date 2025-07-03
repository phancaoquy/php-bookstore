<?php

namespace PhpRouter\Routing;

use Closure;

/**
 * Single Define Route
 */

class Route
{
  /**
   *  The Route Name
   */
  private ?string $name;

  /**
   * The Route Path
   */
  private string $path;

  /**
   * The Route Http Method
   */
  private ?string $method;

  /**
   * The Route Controller
   * 
   * @var Closure|string|array
   */
  private $controller;

  /**
   * The Route Middleware
   */
  private array $middleware;

  /**
   * The Route Domain
   */
  private ?string $domain;

  /**
   * The Route Uri from user request
   * {post-property}
   */
  private ?string $uri = null;

  /**
   * The Route Parameters from user request 
   * {post-property}
   * 
   * @var array[]
   */
  private array $parameter = [];

  /**
   * __construct
   * 
   * @param string $name
   * @param string $path
   * @param string $method
   * @param string $controller
   * @param array $middleware
   * @param mixed $domain
   */
  public function __construct(
    string $name,
    string $path,
    string $method,
    string $controller,
    array $middleware,
    ?string $domain,
  ) {
    $this->name = $name;
    $this->path = $path;
    $this->method = $method;
    $this->controller = $controller;
    $this->middleware = $middleware;
    $this->domain = $domain;
  }

  /**
   * Summary of toArray
   * @return array
   * {
   * controllers: string, 
   * domain: string|null, 
   * method: string, 
   * middlewares: array, 
   * name: string|null, 
   * parameters: array, 
   * path: string, 
   * uri: string|null
   * }
   */
  public function toArray(): array
  {
    return [
      "method" => $this->getMethod(),
      "path" => $this->getPath(),
      "controllers" => $this->getController(),
      "name" => $this->getName(),
      "middlewares" => $this->getMiddleware(),
      "domain" => $this->getDomain(),
      "uri" => $this->getUri(),
      "parameters" => $this->getParameters(),
    ];
  }

  public function setParameters(array $parameters): void
  {
    $this->parameter = $parameters;
  }

  public function setUri(?string $uri): void
  {
    $this->uri = $uri;
  }

  public function toJson(): string
  {
    return json_encode(self::toArray());
  }

  public function __toString(): string
  {
    return $this->toJson();
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function getPath(): string
  {
    return $this->path;
  }

  public function getMethod(): string
  {
    return $this->method;
  }

  public function getController()
  {
    return $this->controller;
  }

  public function getMiddleware(): array
  {
    return $this->middleware;
  }

  public function getDomain(): ?string
  {
    return $this->domain;
  }

  public function getParameters(): array
  {
    return $this->parameter;
  }

  public function getUri(): ?string
  {
    return $this->uri;
  }
}
