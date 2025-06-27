<?php

namespace PhpRouter\Publisher;

use Psr\Http\Message\ResponseInterface;


class HttpPublisher implements Publisher
{

  public function publish($response): void
  {
    $output = fopen('php://output', 'a');

    if ($response instanceof ResponseInterface) {
      http_response_code($response->getStatusCode());

      foreach ($response->getHeader() as $name => $value) {
        @header($name . ': ' . $response->getHeaderLine($name));
      }

      fwrite($output, $response->getBody());
    } else if (is_scalar($response)) {
      fwrite($output, $response);
    } else if ($response === null) {
      fwrite($output, '');
    } else {
      fwrite($output, json_encode($response));
    }

    fclose($output);
  }
}