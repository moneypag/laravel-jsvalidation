<?php

namespace MoneyPag\JsValidation\Support;

use MoneyPag\JsValidation\Tests\TestCase;

class UseDelegatedValidatorTraitTest extends TestCase
{
    public function testGetterAndSetter()
    {
        $mockTrait = $this->getMockForTrait(\MoneyPag\JsValidation\Support\UseDelegatedValidatorTrait::class);
        $mockDelegated = $this->getMockBuilder(\MoneyPag\JsValidation\Support\DelegatedValidator::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockTrait->setDelegatedValidator($mockDelegated);
        $value = $mockTrait->getDelegatedValidator($mockDelegated);

        $this->assertEquals($mockDelegated, $value);
    }
}
