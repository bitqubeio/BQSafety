<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Reportsheet extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'location_id',
        'reportsheet_classification',
        'reportsheet_description',
        'reportsheet_correctiveaction',
        'reportsheet_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function getTrackingReportSheetStartDateAttribute($date)
    {
        return Date::parse($date);
    }

    public function getTrackingReportSheetEndDateAttribute($date)
    {
        return Date::parse($date);
    }
}
