<?php

namespace Modules\Companies\Http\Requests;

use Modules\Companies\Models\Company;

class CompanyUpdateRequest extends CompanyRequest
{
    public function rules(): array
    {
        $rulesUpdate = Company::$rulesUpdate;

        $rulesUpdate['corporate_name'] .= $this->route('company');
        $rulesUpdate['fantasy_name'] .= $this->route('company');
        $rulesUpdate['document_cnpj'] .= $this->route('company');
        $rulesUpdate['state_registration'] .= $this->route('company');

        return $rulesUpdate;
    }
}
