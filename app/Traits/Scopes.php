<?php

namespace App\Traits;

trait Scopes
{
    /**
     * Return records where status is enable post.
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'enable');
    }

}
