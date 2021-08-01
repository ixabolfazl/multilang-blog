<?php

namespace App\Models;
use App\Traits\Scopes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements TranslatableContract
{

    use HasFactory, Translatable, Scopes, Sluggable;

    public $translatedAttributes = ['name', 'meta'];
    protected $fillable = ['slug', 'status', 'category_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }

    /**
     * Return slug
     * @param $value
     * @return string
     */
    public function getSlugAttribute($value)
    {

        $locals = (config('translatable.locales'));
        $mainLocal = array_shift($locals);
        return !is_null($value) ? $value : $this->translate($mainLocal)->name;
    }

    public function getParentNameAttribute()
    {
        return is_null($this->parent) ? null : $this->parent->name;
    }

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
     * Return children category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Return posts of category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }


}
