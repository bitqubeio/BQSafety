<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'location_name',
        'location_description',
        'location_status'
    ];

    public function reportsheets()
    {
        return $this->hasMany(Reportsheet::class);
    }
}
