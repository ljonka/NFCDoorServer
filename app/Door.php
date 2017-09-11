<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Door extends Model
{
    protected $fillable = ['name', 'description'];
}
