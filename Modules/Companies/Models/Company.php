<?php

namespace Modules\Companies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Address\Models\Address;
use Modules\Customer\Models\Customer;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'corporate_name',
        'fantasy_name',
        'document_cnpj',
        'state_registration'
    ];

    protected $casts = [
        'customer_id' => 'integer',
        'corporate_name' => 'string',
        'fantasy_name' => 'string',
        'document_cnpj' => 'integer',
        'state_registration' => 'string'
    ];

    public static array $rules = [
        'customer_id' => 'integer|required',
        'corporate_name' => 'string|required|unique:companies',
        'fantasy_name' => 'string|required|unique:companies',
        'document_cnpj' => 'integer|required|unique:companies',
        'state_registration' => 'string|unique:companies'
    ];

    public static array $rulesUpdate = [
        'customer_id' => 'integer|required',
        'corporate_name' => 'string|required|unique:companies',
        'fantasy_name' => 'string|required|unique:companies',
        'document_cnpj' => 'integer|required|unique:companies',
        'state_registration' => 'string|unique:companies'
    ];

    public static array $filters = [
        'customer_id' => 'digit',
        'document_cnpj' => 'digit'
    ];

    final public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }

    final public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'id', 'customer_id');
    }
}
