<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectCategories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'filter_class',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }
}
