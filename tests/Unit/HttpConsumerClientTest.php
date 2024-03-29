<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\Tests\HttpPsr\Unit;

use PhpCfdi\SatEstadoCfdi\Contracts\ConsumerClientInterface;
use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerClient;
use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerFactoryInterface;
use PhpCfdi\SatEstadoCfdi\Tests\HttpPsr\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Http\Client\ClientInterface as HttpClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Sunrise\Http\Message\ResponseFactory;

final class HttpConsumerClientTest extends TestCase
{
    public function testConstructor(): void
    {
        $factory = $this->createHttpConsumerFactory();
        $client = new HttpConsumerClient($factory);
        $this->assertInstanceOf(ConsumerClientInterface::class, $client);
        $this->assertSame($factory, $client->getFactory());
    }

    public function testCreateSoapHttpRequest(): void
    {
        $expectedFile = $this->filePath('soap-request-foobar.xml');
        $expectedUri = 'http://example.com/';
        $expectedContentType = 'text/xml; charset=utf-8';
        $expectedSoapAction = 'http://tempuri.org/IConsultaCFDIService/Consulta';

        $factory = $this->createHttpConsumerFactory();
        $client = new HttpConsumerClient($factory);

        $request = $client->createHttpRequest($expectedUri, '?a=foo&b=bar');

        $this->assertSame($expectedUri, strval($request->getUri()));
        $this->assertSame($expectedContentType, implode('', $request->getHeader('Content-Type')));
        $this->assertSame($expectedSoapAction, implode('', $request->getHeader('SOAPAction')));
        $this->assertXmlStringEqualsXmlFile($expectedFile, $request->getBody()->getContents());
    }

    public function testCreateConsumerClientResponse(): void
    {
        $sourceFile = $this->fileContentPath('soap-response.xml');

        $factory = $this->createHttpConsumerFactory();
        $client = new HttpConsumerClient($factory);

        $container = $client->createConsumerClientResponse($sourceFile);

        $this->assertSame('S - Comprobante obtenido satisfactoriamente.', $container->get('CodigoEstatus'));
        $this->assertSame('Cancelable con aceptación', $container->get('EsCancelable'));
        $this->assertSame('Vigente', $container->get('Estado'));
        $this->assertSame('Solicitud rechazada', $container->get('EstatusCancelacion'));
    }

    public function testConsume(): void
    {
        $xmlContent = $this->fileContentPath('soap-response.xml');
        $factory = $this->createHttpConsumerFactory();
        $preparedResponse = (new ResponseFactory())->createResponse(200)
            ->withBody($factory->streamFactory()->createStream($xmlContent));

        // create a class that intercept sendRequest and return a prepared Response object
        /**
         * @var HttpConsumerClient&MockObject $client
         * @noinspection PhpDeprecationInspection
         */
        $client = $this->getMockBuilder(HttpConsumerClient::class)
            ->enableOriginalConstructor()
            ->setConstructorArgs([$factory])
            ->setMethods(['sendRequest'])
            ->getMock();
        $client->method('sendRequest')->willReturn($preparedResponse);

        $container = $client->consume('http://example.com/', '');
        $this->assertSame('S - Comprobante obtenido satisfactoriamente.', $container->get('CodigoEstatus'));
    }

    public function testMethodSendRequest(): void
    {
        $request = $this->createMock(RequestInterface::class);
        $response = $this->createMock(ResponseInterface::class);

        /** @var HttpClientInterface&MockObject $httpClient */
        $httpClient = $this->createMock(HttpClientInterface::class);
        $httpClient->expects($this->once())
            ->method('sendRequest')
            ->with($request)
            ->willReturn($response);

        /** @var HttpConsumerFactoryInterface&MockObject $factory */
        $factory = $this->createMock(HttpConsumerFactoryInterface::class);
        $factory->expects($this->once())
            ->method('httpClient')
            ->willReturn($httpClient);

        $httpConsumetClient = new class ($factory) extends HttpConsumerClient {
            /** @noinspection PhpOverridingMethodVisibilityInspection */
            public function sendRequest(RequestInterface $request): ResponseInterface // phpcs:ignore
            {
                return parent::sendRequest($request);
            }
        };

        $this->assertSame($response, $httpConsumetClient->sendRequest($request));
    }
}
