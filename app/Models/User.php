<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return array
     */
    public static function rules(): array
    {
        return array(
            'name' => 'required|min:3|max:255',
            'gender' => 'in:male,female,other',
            'document' => 'required|unique:users|min:11',
            'document_secondary' => 'required|unique:users|min:8|max:12',
            'document_secondary_complement' => 'required',
            'date_of_birth' => 'required|date_format:d/m/Y',
            'place_of_birth' => 'string',
            'civil_status' => 'required|in:married,separated,single,divorced,widower',
            'cover' => 'required',
            'occupation' => 'required',
            'income' => 'required',
            'company_work' => 'required',
            'zipcode' => 'required',
            'street' => 'required',
            'number' => 'required',
            'complement' => 'required',
            'neighborhood' => 'required',
            'state' => 'required',
            'city' => 'required',
            'telephone' => 'required',
            'cell' => 'required',
            'email' => 'required',
            'password' => 'required',

            'type_of_communion' => 'required_if:civil_status,married,separated|in:Comunhão Universal de Ben,Comunhão Parcial de Bens,Separação Total de Bens,Participação Final de Aquestos',
            'spouse_name' => 'required_if:civil_status,married,separated',
            'spouse_genre' => 'required_if:civil_status,married,separated',
            'spouse_document' => 'required_if:civil_status,married,separated',
            'spouse_document_secondary' => 'required_if:civil_status,married,separated',
            'spouse_document_secondary_complement' => 'required_if:civil_status,married,separated',
            'spouse_date_of_birth' => 'required_if:civil_status,married,separated',
            'spouse_place_of_birth' => 'required_if:civil_status,married,separated',
            'spouse_occupation' => 'required_if:civil_status,married,separated',
            'spouse_income' => 'required_if:civil_status,married,separated',
            'spouse_company_work' => 'required_if:civil_status,married,separated'
        );
    }
}
