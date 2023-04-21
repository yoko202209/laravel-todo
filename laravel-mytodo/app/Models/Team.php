<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany('App\Models\User','team_user','team_id','user_id');
    }
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
