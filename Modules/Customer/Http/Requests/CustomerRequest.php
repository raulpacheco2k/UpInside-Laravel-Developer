<?php

namespace Modules\Customer\Http\Requests;

use Elegant\Sanitizer\Laravel\SanitizesInput;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Customer\Models\Customer;

class CustomerRequest extends FormRequest
{
    use SanitizesInput;

    final public function filters(): array
    {
        return Customer::$filters;
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

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    final public function authorize(): bool
    {
        return true;
    }
}
