<?php

namespace MoneyPag\JsValidation;

use Closure;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Http\Request;
use MoneyPag\JsValidation\Remote\Resolver;
use MoneyPag\JsValidation\Remote\Validator as RemoteValidator;

class RemoteValidationMiddleware
{
    /**
     * Validator factory instance to wrap.
     *
     * @var \Illuminate\Contracts\Validation\Factory
     */
    protected $factory;

    /**
     * Field used to detect Javascript validation.
     *
     * @var mixed
     */
    protected $field;

    /**
     * Whether to escape messages or not.
     *
     * @var bool
     */
    protected $escape;

    /**
     * RemoteValidationMiddleware constructor.
     *
     * @param  \Illuminate\Contracts\Validation\Factory  $validator
     * @param  \Illuminate\Contracts\Config\Repository  $config
     */
    public function __construct(ValidationFactory $validator, Config $config)
    {
        $this->factory = $validator;
        $this->field = $config->get('jsvalidation.remote_validation_field');
        $this->escape = (bool) $config->get('jsvalidation.escape', false);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has($this->field)) {
            $this->wrapValidator();
        }

        return $next($request);
    }

    /**
     * Wraps Validator resolver with RemoteValidator resolver.
     *
     * @return void
     */
    protected function wrapValidator()
    {
        $resolver = new Resolver($this->factory, $this->escape);
        $this->factory->resolver($resolver->resolver($this->field));
        $this->factory->extend(RemoteValidator::EXTENSION_NAME, $resolver->validatorClosure());
    }
}
