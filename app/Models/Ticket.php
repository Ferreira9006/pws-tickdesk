<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'category_id', 
        'priority_id', 
        'level_id', 
        'user_id', 
        'status', 
        'closed_at'
    ];
}
