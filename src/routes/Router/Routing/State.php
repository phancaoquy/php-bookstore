<?php

namespace PhpRouter\Routing;

use PhpRouter\Routing\Route;

class State
{
  private string $prefix;

  private array $middleware;

  private ?string $domain;

  public function __construct(
    string $prefix = '',
    array $middleware = [],
    ?string $domain = null
  ) {
    $this->prefix = $prefix;
    $this->middleware = $middleware;
    $this->domain = $domain;
  }

  public function append(array $attributes): void
  {
    $this->domain = $attributes[Attributes::DOMAIN] ?? null;
    $this->prefix .= $attributes[Attributes::DOMAIN] ?? null;
    $this->middleware = array_merge($this->middleware, $attributes[Attributes::MIDDLEWARE] ?? []);
  }

  public function getPrefix(): string
  {
    return $this->prefix;
  }

  public function getMiddleware(): array
  {
    return $this->middleware;
  }

  public function getDomain(): ?string
  {
    return $this->domain;
  }
}
