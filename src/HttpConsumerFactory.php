<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\HttpPsr;

use PhpCfdi\SatEstadoCfdi\Contracts\ConsumerClientResponseInterface;
use PhpCfdi\SatEstadoCfdi\Utils\ConsumerClientResponse;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * Use this HttpConsumerFactory as a helper to
 * store http client (psr-18)
 * store request factory and stream factory (psr-17)
 * and create the ConsumerClientResponse implementation (phpcfdi/sat-estado-cfdi)
 */
class HttpConsumerFactory implements HttpConsumerFactoryInterface
{
    /** @var ClientInterface */
    private $httpClient;

    /** @var RequestFactoryInterface */
    private $requestFactory;

    /** @var StreamFactoryInterface */
    private $streamFactory;

    public function __construct(
        ClientInterface $httpClient,
        RequestFactoryInterface $requestFactoryInterface,
        StreamFactoryInterface $streamFactoryInterface
    ) {
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactoryInterface;
        $this->streamFactory = $streamFactoryInterface;
    }

    public function httpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    public function requestFactory(): RequestFactoryInterface
    {
        return $this->requestFactory;
    }

    public function streamFactory(): StreamFactoryInterface
    {
        return $this->streamFactory;
    }

    public function newConsumerClientResponse(): ConsumerClientResponseInterface
    {
        return new ConsumerClientResponse();
    }
}
