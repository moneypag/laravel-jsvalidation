<?php

namespace MoneyPag\JsValidation\Support;

use MoneyPag\JsValidation\Tests\TestCase;

class ProtectedClassStubTest
{
    protected $protectedProperty = true;

    protected function protectedMethod()
    {
        return true;
    }
}

class AccessProtectedTraitTest extends TestCase
{
    private $mockTrait;
    private $stubInstance;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->mockTrait = $this->getMockForTrait(\MoneyPag\JsValidation\Support\AccessProtectedTrait::class);
        $this->stubInstance = new ProtectedClassStubTest();
    }

    public function testCreateProtectedCaller()
    {
        $stubInstance = $this->stubInstance;
        $caller = function () use ($stubInstance) {
            return $this->createProtectedCaller($stubInstance);
        };

        $testCaller = $caller->bindTo($this->mockTrait, $this->mockTrait);

        $this->assertInstanceOf('Closure', $testCaller());
    }

    public function testGetProtected()
    {
        $stubInstance = $this->stubInstance;
        $caller = function () use ($stubInstance) {
            return $this->getProtected($stubInstance,'protectedProperty');
        };

        $testCaller = $caller->bindTo($this->mockTrait, $this->mockTrait);

        $this->assertTrue($testCaller());
    }

    public function testCallProtected()
    {
        $stubInstance = $this->stubInstance;
        $caller = function () use ($stubInstance) {
            return $this->callProtected($stubInstance,'protectedMethod');
        };

        $testCaller = $caller->bindTo($this->mockTrait, $this->mockTrait);

        $this->assertTrue($testCaller());
    }
}
