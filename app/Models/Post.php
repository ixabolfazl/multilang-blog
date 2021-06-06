<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, Translatable, softDeletes;

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

}
