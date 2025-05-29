<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }

    protected $fillable = [
        'title', 
        'description', 
        'category_id', 
        'priority_id', 
        'user_id', 
        'status', 
        'closed_at'
    ];
}
