<?php

namespace PhpRouter\Publisher;

interface Publisher
{
  public function publish($response): void;
}
