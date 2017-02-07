<?php

namespace App\Traits;

use Jenssegers\Date\Date;

trait DatesTranslator
{
    public function getCreatedAtAttribute($value)
    {
        return new Date($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return new Date($value);
    }
}