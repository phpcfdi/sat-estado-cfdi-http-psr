<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\Tests\HttpPsr\Compliance;

use PhpCfdi\SatEstadoCfdi\ComplianceTester\ComplianceTester;
use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerClient;
use PhpCfdi\SatEstadoCfdi\Tests\HttpPsr\TestCase;

class ComplianceTest extends TestCase
{
    public function testCompliance(): void
    {
        $sunriseFactory = $this->createSunriseFactory();

        $client = new HttpConsumerClient($sunriseFactory);
        $tester = new ComplianceTester($client);
        $this->assertTrue($tester->runComplianceTests());
    }
}
