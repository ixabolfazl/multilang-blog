<?php

namespace App\Models;

use App\Traits\Scopes;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, Translatable, softDeletes, Scopes, Sluggable;

    public $translatedAttributes = ['title', 'description', 'body', 'meta', 'keywords'];
    protected $fillable = ['slug', 'status', 'user_id', 'image',];

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
        return !is_null($value) ? $value : $this->translate($mainLocal)->title;
    }

    /**
     * Return author_name post.
     *
     */
    public function getAuthorAttribute()
    {
        return is_null($this->user) ? null : $this->user->name;
    }

    /**
     * Return local created_at post.
     *
     */
    public function getDateAttribute()
    {
        return app()->getLocale() == 'fa' ? Verta::instance($this->created_at)->format('Y/m/d') : ($this->created_at)->format('Y/m/d');
    }

    /**
     * Return image path.
     * @param $value
     * @return string
     */
    public function getImageAttribute($value)
    {
        return 'uploads/posts/image/' . $value;
    }

    /**
     * Return author post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Return posts of category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    /**
     * Return comments of posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
