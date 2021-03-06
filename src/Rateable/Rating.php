<?php namespace willvincent\Rateable;

use Config;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    
    /**
     * The table name for this model
     *
     * @var string
     */
    protected $table = 'user_ratings';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['rating', 'description'];

    /**
     * @return mixed
     */
    public function rateable()
    {
        return $this->morphTo();
    }

    /**
     * Rating belongs to a user.
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(Config::get('auth.model'));
    }
}
