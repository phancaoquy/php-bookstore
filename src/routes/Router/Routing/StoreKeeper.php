<?php

namespace PhpRouter\Routing;

use Closure;

class StoreKeeper
{
  private Repository $repository;
  private State $state;

  public function __construct(
    Repository $repository,
    State $state
  ) {
    $this->repository = $repository;
    $this->state = $state;
  }

  public function add(
    string $method,
    string $path,
    $controller,
    ?string $name = null
  ): void {
    $this->repository->save(
      $method,
      $this->state->getPrefix() . $path,
      $controller,
      $name,
      $this->state->getMiddleware(),
      $this->state->getDomain()
    );
  }

  public function getState(): State
  {
    return $this->state;
  }

  public function setState(State $state): void
  {
    $this->state = $state;
  }

  public function getRepository(): Repository
  {
    return $this->repository;
  }
}
