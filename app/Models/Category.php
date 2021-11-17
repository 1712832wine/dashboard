<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'id',
        'name',
        'slug',
        'parent'
    ];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
