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

    public function uri(): string
    {
        return $this->uri;
    }

    /**
     * Extract the information from expected soap response
     *
     * @param string $xmlResponse
     * @return array<string, string>
     */
    public function extractDataFromXmlResponse(string $xmlResponse): array
    {
        $extracted = [];
        $document = new DOMDocument();
        $document->loadXML($xmlResponse);
        /** @var DOMElement $consultaResult */
        foreach ($document->getElementsByTagNameNS($this->uri(), 'ConsultaResult') as $consultaResult) {
            foreach ($consultaResult->childNodes as $children) {
                if (! $children instanceof DOMElement) {
                    continue;
                }
                $extracted[$children->localName] = $children->textContent;
            }
            break; // exit loop if for any reason got more than 1 element ConsultaResult
        }
        return $extracted;
    }

    public function createXmlRequest(string $expression): string
    {
        $soap = 'http://schemas.xmlsoap.org/soap/envelope/';
        $document = new DOMDocument('1.0', 'UTF-8');
        $document->appendChild($document->createElementNS($soap, 's:Envelope'))
            ->appendChild($document->createElementNS($soap, 's:Body'))
            ->appendChild($document->createElementNS($this->uri(), 'c:Consulta'))
            ->appendChild($document->createElementNS($this->uri(), 'c:expresionImpresa'))
            ->appendChild($document->createTextNode($expression));
        $xml = $document->saveXML() ?: '';
        return $xml;
    }
}
