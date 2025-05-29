<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
    protected $fillable = ['name', 'status'];
}
