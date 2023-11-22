<?php

namespace App\Models;

use App\Services\Enum\Status;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = false;

    protected $casts = [
        'status' => Status::class,
    ];

    public function brand()
    {
        return $this->belongsTo( Brand::class );
    }

    public function tags()
    {
        return $this->belongsToMany( Tag::class )->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany( Comment::class, 'commentable' );
    }

    public function getCantDeleteAttribute()
    {
        return $this->status == Status::ACTIVE || $this->status == Status::SOLD;
    }

    public function scopeActive( Builder $builder )
    {
        return $builder->where( 'status', Status::ACTIVE );
    }


}
