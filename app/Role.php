<?php

namespace App;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    public $guarded = [];


      public function users()
    {
        return $this->hasMany('App\User');
    }

}
