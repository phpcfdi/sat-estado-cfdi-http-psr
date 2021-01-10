<?php

declare(strict_types=1);

namespace PhpCfdi\SatEstadoCfdi\Tests\HttpPsr;

use PhpCfdi\SatEstadoCfdi\HttpPsr\HttpConsumerFactoryInterface;

class TestCase extends \PHPUnit\Framework\TestCase
{
    public function createHttpConsumerFactory(): HttpConsumerFactoryInterface
    {
        return new TestingHttpConsumerFactory();
    }

    public static function filePath(string $append = ''): string
    {
        return __DIR__ . '/_files/' . $append;
    }

    public static function fileContentPath(string $append): string
    {
        return static::fileContent(static::filePath($append));
    }

    public static function fileContent(string $path): string
    {
        if (! file_exists($path)) {
            return '';
        }
        return strval(file_get_contents($path));
    }
}
