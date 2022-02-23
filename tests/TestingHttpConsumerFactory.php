<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\Tests\HttpPsr;

use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerFactory;
use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerFactoryInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Sunrise\Http\Factory\RequestFactory as SunriseRequestFactory;
use Sunrise\Http\Factory\ResponseFactory as SunriseResponseFactory;
use Sunrise\Http\Factory\StreamFactory as SunriseStreamFactory;
use Symfony\Component\HttpClient\Psr18Client as SymfonyHttpClient;

final class TestingHttpConsumerFactory extends HttpConsumerFactory implements HttpConsumerFactoryInterface
{
    public function __construct(
        ClientInterface $httpClient = null,
        RequestFactoryInterface $requestFactoryInterface = null,
        StreamFactoryInterface $streamFactoryInterface = null
    ) {
        $streamFactoryInterface = $streamFactoryInterface ?? new SunriseStreamFactory();
        $requestFactoryInterface = $requestFactoryInterface ?? new SunriseRequestFactory();
        $httpClient = $httpClient ?? new SymfonyHttpClient(null, new SunriseResponseFactory(), $streamFactoryInterface);
        parent::__construct($httpClient, $requestFactoryInterface, $streamFactoryInterface);
    }
}
