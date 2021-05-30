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


    /**
     * Return parent category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Return childs category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany(Category::class);
    }

    public function getParentNameAttribute()
    {
        return is_null($this->parent) ? null : $this->parent->name;
    }
}
