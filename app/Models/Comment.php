<?php

namespace App\Models;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['is_approved', 'comment', 'comment_id', 'post_id', 'user_id'];
    /**
     * Return author of the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return replies of the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Return content of parent comment .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getParentContentAttribute()
    {
        return is_null($this->parent) ? null : $this->parent->content;
    }

    /**
     * Return parent of the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }


    /**
     * Return replies of the comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Return local created_at comment.
     *
     */
    public function getDateAttribute()
    {
        return app()->getLocale() == 'fa' ? Verta::instance($this->created_at)->format('Y/m/d') : ($this->created_at)->format('Y/m/d');
    }

}
