<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        'zipcode',
        'state',
        'city',
        'neighborhood',
        'street',
        'number',
        'complement'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
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
     * @return array
     */
    public static $rules = [
        'name' => 'required|min:3|max:255',
        'gender' => 'required|in:' . Gender::TYPES,
        'document' => 'required|min:11', // unique:users
        'i' => 'nullable|min:8|max:12', // unique:users
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
        'spouse_document' => 'required_with:type_of_communion',
        'spouse_occupation' => 'required_with:type_of_communion',
        'spouse_income' => 'required_with:type_of_communion',

        // TODO: Criar um modelo para endereço
        'zipcode' => 'required',
        'state' => 'required',
        'city' => 'required',
        'neighborhood' => 'required',
        'street' => 'required',
        'number' => 'required',
        'complement' => 'nullable',
    ];
}
