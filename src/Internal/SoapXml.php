<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\HttpPsr\Internal;

use DOMDocument;
use DOMElement;

/**
 * @internal
 */
class SoapXml
{
    /** @var string */
    private $uri;

    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    /**
     * Extract the information from expected soap response
     *
     * @param string $xmlResponse
     * @param string $elementName
     * @return array<string, string>
     */
    public function extractDataFromXmlResponse(string $xmlResponse, string $elementName): array
    {
        if ('' === $xmlResponse) {
            return [];
        }

        $document = new DOMDocument();
        $document->loadXML($xmlResponse);

        $consultaResult = $this->obtainFirstElement($document, $elementName);
        if (null === $consultaResult) {
            return [];
        }

        $extracted = [];
        foreach ($consultaResult->childNodes as $children) {
            if (! $children instanceof DOMElement) {
                continue;
            }
            $extracted[$children->localName] = $children->textContent;
        }

        return $extracted;
    }

    private function obtainFirstElement(DOMDocument $document, string $elementName): ?DOMElement
    {
        foreach ($document->getElementsByTagNameNS($this->uri, $elementName) as $consultaResult) {
            return $consultaResult;
        }
        return null;
    }

    public function createXmlRequest(string $expression): string
    {
        $soap = 'http://schemas.xmlsoap.org/soap/envelope/';
        $document = new DOMDocument('1.0', 'UTF-8');
        $document->appendChild($document->createElementNS($soap, 's:Envelope'))
            ->appendChild($document->createElementNS($soap, 's:Body'))
            ->appendChild($document->createElementNS($this->uri, 'c:Consulta'))
            ->appendChild($document->createElementNS($this->uri, 'c:expresionImpresa'))
            ->appendChild($document->createTextNode($expression));
        return $document->saveXML() ?: '';
    }
}
