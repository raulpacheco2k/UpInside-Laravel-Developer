<?php

namespace Modules\Companies\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'corporate_name',
        'fantasy_name',
        'document_cnpj',
        'state_registration'
    ];

    protected static function newFactory()
    {
        return \Modules\Companies\Database\factories\CompaniesFactory::new();
    }
}
