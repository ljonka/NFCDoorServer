<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Door;
use App\DoorUser;

class DoorUserGrant extends Model
{
    protected $fillable = ["door", "door_user", "grants"];

    public function doorModel(){
      return Door::find($this->door);
    }

    public function userModel(){
      return DoorUser::find($this->door_user);
    }
}
