<?php

namespace App;

use App\Traits\DatesTranslator;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    //
    use DatesTranslator;
}
