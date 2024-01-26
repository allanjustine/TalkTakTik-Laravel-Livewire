<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function isEditable(){
        return auth()->user()->role=='editor' || auth()->user()->id==$this->user_id;
    }
    public function scopeSearch($query, $terms)
    {
        collect(explode(" ", $terms))
            ->filter()
            ->each(function ($term)use ($query) {
                $term= '%' .$term . '%';
                $query->where('title', 'like', $term)
                ->orWhere('content', 'like', $term);
        });
    }
}
