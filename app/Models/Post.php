<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Translatable;

    public $translatedAttributes = ['title', 'description', 'body', 'meta', 'keywords'];
    protected $fillable = ['slug', 'status', 'user_id', 'image',];

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
     * Return author_name post.
     *
     */
    public function getAuthorAttribute()
    {
        return is_null($this->user) ? null : $this->user->name;
    }
}
