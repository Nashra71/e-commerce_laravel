<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
    // use HasFactory;

}
