<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'project_image',
        'technologies',
        'date',
        'client',
        'demo_url',
        'github_url',
        'sort_order',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategories::class, 'category_id');
    }


    public function getTechnologiesArrayAttribute()
    {
        return explode(',', $this->technologies);
    }
}
