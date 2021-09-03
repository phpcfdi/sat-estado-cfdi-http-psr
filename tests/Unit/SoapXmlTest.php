<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\Tests\HttpPsr\Unit;

use PhpCfdi\SatEstadoCfdi\HttpPsr\Internal\SoapXml;
use PhpCfdi\SatEstadoCfdi\Tests\HttpPsr\TestCase;

final class SoapXmlTest extends TestCase
{
    public function testExtractDataFromXmlResponse(): void
    {
        $xml = <<< XML
            <s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
                <s:Body>
                    <ResponseResponse xmlns="http://tempuri.org/">
                        <Result xmlns:a="http://tempuri.org/a" xmlns:b="http://tempuri.org/b">
                            <first>x-first</first>
                            <a:second>x-second</a:second>
                            <b:third>x-third</b:third>
                        </Result>
                        <Result xmlns:a="http://tempuri.org/a" xmlns:b="http://tempuri.org/b">
                            <first>must be ignored</first>
                        </Result>
                    </ResponseResponse>
                </s:Body>
            </s:Envelope>
            XML;

        $soapXml = new SoapXml('http://tempuri.org/');
        $extracted = $soapXml->extractDataFromXmlResponse($xml, 'Result');

        $expected = [
            'first' => 'x-first',
            'second' => 'x-second',
            'third' => 'x-third',
        ];
        $this->assertSame($expected, $extracted);
    }

    public function testCreateConsumerClientResponse(): void
    {
        $xmlns = 'http://tempuri.org/';
        $expression = 'Expresión con caracteres & y Ñ';

        $expressionXml = htmlspecialchars($expression, ENT_XML1);
        $expected = <<< XML
            <s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
                <s:Body>
                    <c:Consulta xmlns:c="$xmlns">
                        <c:expresionImpresa>$expressionXml</c:expresionImpresa>
                    </c:Consulta>
                </s:Body>
            </s:Envelope>
            XML;

        $soapXml = new SoapXml($xmlns);
        $createdXml = $soapXml->createXmlRequest($expression);

        $this->assertXmlStringEqualsXmlString($expected, $createdXml);
    }
}
