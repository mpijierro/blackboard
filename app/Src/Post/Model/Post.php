<?php

namespace Blackboard\Src\Post\Model;

use Blackboard\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'post';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $with = ['user'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
