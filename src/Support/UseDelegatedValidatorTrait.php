<?php

namespace MoneyPag\JsValidation\Support;

trait UseDelegatedValidatorTrait
{
    /**
     * Delegated validator.
     *
     * @var \MoneyPag\JsValidation\Support\DelegatedValidator
     */
    protected $validator;

    /**
     * Sets delegated Validator instance.
     *
     * @param  \MoneyPag\JsValidation\Support\DelegatedValidator  $validator
     * @return void
     */
    public function setDelegatedValidator(DelegatedValidator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Gets current DelegatedValidator instance.
     *
     * @return \MoneyPag\JsValidation\Support\DelegatedValidator
     */
    public function getDelegatedValidator()
    {
        return $this->validator;
    }
}
