<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTime extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function users()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function times()
    {
        return $this->hasOne(Time::class,'id','time_id');
    }
    public function getUserEmailAttribute()
    {
        return $this->users->email;
    }
    public function getTimeStartAttribute()
    {
        return $this->times->start;
    }
    public function getTimeEndAttribute()
    {
        return $this->times->end;
    }
}
