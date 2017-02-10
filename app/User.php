<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use DatesTranslator;

    use EntrustUserTrait;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_username',
        'user_names',
        'user_lastnames',
        'company_id',
        'user_code',
        'user_job',
        'user_area',
        'user_email',
        'user_status',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reportsheets()
    {
        return $this->hasMany(Reportsheet::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function setUserNamesAttribute($value)
    {
        $this->attributes['user_names'] = ucwords(Str::lower($value));
    }

    public function setUserLastnamesAttribute($value)
    {
        $this->attributes['user_lastnames'] = Str::upper($value);
    }

    public function setUserJobAttribute($value)
    {
        $this->attributes['user_job'] = ucwords(Str::lower($value));
    }

    public function setUserAreaAttribute($value)
    {
        $this->attributes['user_area'] = ucwords(Str::lower($value));
    }

    public function setUserEmailAttribute($value)
    {
        $this->attributes['user_email'] = Str::lower($value);
    }
}
