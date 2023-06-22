<?php

namespace Tests\Unit;

use App\Services\BoicotPeatonalNameGenerator;
use PHPUnit\Framework\TestCase;

class BoicotPeatonalNameGeneratorTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testNameGenerator(): void
    {
        $result = BoicotPeatonalNameGenerator::generate();
        $this->assertIsString($result);
    }
}
