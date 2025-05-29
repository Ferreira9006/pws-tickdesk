<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    
    protected $fillable = ['name', 'status', 'level_id'];
}