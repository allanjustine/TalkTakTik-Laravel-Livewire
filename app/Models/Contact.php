<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSearch($query, $terms)
    {
        collect(explode(" ", $terms))
            ->filter()
            ->each(function ($term)use ($query) {
                $term= '%' .$term . '%';
                $query->where('name', 'like', $term)
                ->orWhere('address', 'like', $term);
            });
    }
}
