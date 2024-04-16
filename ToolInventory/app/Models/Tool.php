<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    public function categoryTool()
    {
        return $this->belongsTo(CategoryTool::class, 'category_id');
    }
}
