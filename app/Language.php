<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'summary', 'description', 'extension',
    ];

    /**
    *
    * Get the tutorials for the language.
    */
    public function tutorials()
    {
       return $this->hasMany('App\LanguageTutorial');
    }

    /**
    *
    * Get the articles for the language.
    */
    public function articles()
    {
        return $this->hasMany('App\LanguageTutorial');
    }

    /**
    *
    * Get the frameworks for the language.
    */
    public function frameworks()
    {
        return $this->hasMany('App\Framework');
    }

    /**
    *
    * Get the libraries for the language.
    */
    public function libraries()
    {
        return $this->hasMany('App\Library');
    }
}
