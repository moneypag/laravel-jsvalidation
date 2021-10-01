<?php

namespace MoneyPag\JsValidation\Tests {
    class  StubFormRequest extends \Illuminate\Foundation\Http\FormRequest {
        public function rules(){return ['name'=>'require'];}
        public function messages(){return [];}
        public function attributes(){return [];}
    }

    class StubFormRequest2 extends \MoneyPag\JsValidation\Remote\FormRequest {
        public function rules(){return ['name'=>'require'];}
        public function messages(){return [];}
        public function attributes(){return [];}
    }
}
