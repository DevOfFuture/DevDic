<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'summary', 'description',
    ];
}