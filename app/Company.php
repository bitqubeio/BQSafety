<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'company_name',
        'company_description',
        'company_status'
    ];
}
