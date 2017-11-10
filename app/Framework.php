<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Framework extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'summary', 'description',
    ];

    /**
    *
    */
    public function language()
    {
        return $this->belongsTo('App\Language');
    }
}