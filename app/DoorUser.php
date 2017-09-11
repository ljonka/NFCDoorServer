<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoorUser extends Model
{
    protected $fillable = ['chip_uuid', 'name', 'phone', 'email', 'note'];
}
