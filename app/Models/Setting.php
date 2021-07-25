<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang',
        'site_name',
        'description',
        'logo_url',
        'breaking_title_category',
        'address',
        'phone_number',
        'email',
        'about'
    ];


    public function breaking_title_category()
    {
        $this->hasOne(Category::class, 'breaking_title_category');
    }
}
