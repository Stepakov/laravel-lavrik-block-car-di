<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function cars()
    {
        return $this->hasMany( Car::class );
    }

    public function country()
    {
        return $this->belongsTo( Country::class );
    }

    public function comments()
    {
        return $this->morphMany( Comment::class, 'commentable' );
    }
}
