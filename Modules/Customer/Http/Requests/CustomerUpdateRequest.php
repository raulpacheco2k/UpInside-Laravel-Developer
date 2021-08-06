<?php

namespace Modules\Customer\Http\Requests;

use Modules\Customer\Models\Customer;

class CustomerUpdateRequest extends CustomerRequest
{
    final public function rules(): array
    {
        $rulesUpdate = Customer::$rulesUpdate;

        $rulesUpdate['document'] .= $this->route('customer');
        $rulesUpdate['document_secondary'] .= $this->route('customer');
        $rulesUpdate['telephone'] .= $this->route('customer');
        $rulesUpdate['cell'] .= $this->route('customer');
        $rulesUpdate['email'] .= $this->route('customer');

        return array_merge(Customer::$rules, $rulesUpdate);
    }

}
