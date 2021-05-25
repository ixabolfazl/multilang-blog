<?php

namespace App\Models;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TranslatableContract
{

    use HasFactory, Translatable;

    public $translatedAttributes = ['name', 'meta'];
    protected $fillable = ['slug', 'status', 'category_id'];

    public function getParentNameAttribute()
    {
        return Category::find($this->category_id)->name ?: null;
    }
}
