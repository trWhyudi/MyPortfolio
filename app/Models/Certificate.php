<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'issuer',
        'date',
        'description',
        'certificate_image',
        'certificate_url',
        'sort_order',
    ];
}
