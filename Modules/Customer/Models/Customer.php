<?php

namespace Modules\Customer\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Address\Models\Address;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'document',
        'document_secondary',
        'document_secondary_complement',
        'date_of_birth',
        'place_of_birth',
        'civil_status',
        'occupation',
        'cover',
        'income',
        'telephone',
        'cell',
        'lessor',
        'lessee',
        'type_of_communion',
        'spouse_document',
        'spouse_occupation',
        'spouse_income',
        'address_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected  $casts = [
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'gender' => 'integer',
        'document' => 'integer',
        'document_secondary' => 'integer',
        'document_secondary_complement' => 'string',
        'date_of_birth' => 'date',
        'place_of_birth' => 'string',
        'civil_status' => 'integer',
        'cover' => 'string',
        'occupation' => 'string',
        'income' => 'integer',
        'telephone' => 'integer',
        'cell' => 'integer',
        'lessor' => 'boolean',
        'lessee' => 'boolean',
        'type_of_communion' => 'integer',
        'spouse_document' => 'integer',
        'spouse_occupation' => 'string',
        'spouse_income' => 'integer',
        'zipcode' => 'integer',
        'state' => 'string',
        'city' => 'string',
        'neighborhood' => 'string',
        'street' => 'string',
        'number' => 'integer',
        'complement' => 'string',
    ];

    /**
     * @var array
     */
    public static array $rules = [
        'name' => 'required|min:3|max:255',
        'gender' => 'required|in:' . Gender::TYPES,
        'document' => 'required|min:11', // unique:users
        'document_secondary' => 'nullable|min:7|max:12', // unique:users
        'document_secondary_complement' => 'nullable',
        'date_of_birth' => 'required|date|date_format:Y-m-d',
        'place_of_birth' => 'string',
        'civil_status' => 'required|in:' . MaritalStatus::TYPES,
        'cover' => 'file|nullable',
        'income' => 'required',
        'telephone' => 'nullable',
        'cell' => 'required',
        'email' => 'required',

        // TODO: Criar um modelo para o tipo de cliente
        'lessor' => 'required_without:lessee|bool',
        'lessee' => 'required_without:lessor|bool',

        // TODO: Criar um modelo para cônjuge
        'type_of_communion' => 'required_if:civil_status, '. MaritalStatus::MARRIED .  '|in:' . MarriagePropertyRegimes::TYPES,
        'spouse_document' => 'required_if:civil_status, '. MaritalStatus::MARRIED,
        'spouse_occupation' => 'required_if:civil_status, '. MaritalStatus::MARRIED,
        'spouse_income' => 'required_if:civil_status, '. MaritalStatus::MARRIED,

        // TODO: Criar um modelo para endereço
        'address.zipcode' => 'required',
        'address.state' => 'required',
        'address.city' => 'required',
        'address.neighborhood' => 'required',
        'address.street' => 'required',
        'address.number' => 'required',
        'address.complement' => 'nullable',
    ];

    final public function address()
    {
        $this->hasOne(Address::class);
    }
}
