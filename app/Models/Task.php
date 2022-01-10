<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //use HasFactory;

    protected $fillable = [
        'name', 
        'priority_id', 
    ];
    public function priorities()
    {
        return $this->belongsTo('App\Models\Priority', 'priority_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id');        
    }
}
