<?php

namespace App\Models;
use App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];
    public function products(){
        return $this->hasMany(Courses::class);
        // SQL Statement -> SELECT * FROM products WHERE category_id = $this->id
    }
}
