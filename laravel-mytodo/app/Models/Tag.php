<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    public function team(){
        return $this->belongsTo(Team::class);
    }
    
    public function todos()
    {
        return $this->belongsToMany('App\Models\Todo','todo_tag','tag_id','todo_id');
        
    }
}
