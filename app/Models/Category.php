<?php

namespace App\Models;

use App\Casts\NameCart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $fillable = [
        'category_name', 'parent_id', 'user_id'
    ];

    protected $casts = [
        'options' => NameCart::class,
    ];

    public function getcategoryNameAttribute($value)
    {
        return ucfirst($value);
    }

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // public function setcategoryNameAttribute($value)
    // {
    //     $this->attributes['category_name'] = strtolower($value);    
        
    // }
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}