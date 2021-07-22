<?php

namespace Modules\Customer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Customer\Models\Customer;

class CustomerStoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'document' => str_replace(['.', '-'], '', $this->document),
            'income' => str_replace([',', '.'], '', $this->income),
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    final public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    final public function rules(): array
    {
        return Customer::$rules;
    }
}
