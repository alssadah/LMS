<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'thumbnail',
        'status'
    ];

    public function users() :BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function lessons() :HasMany
    {
        return $this->HasMany(Lesson::class);
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status',1);
    }
}
