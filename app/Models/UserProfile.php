<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserProfile
 *
 * @property $id
 * @property $user_id
 * @property $full_name
 * @property $city
 * @property $image
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class UserProfile extends Model
{

    static $rules = [
		'user_id' => 'required',
		'full_name' => 'required',
		'city' => 'required',
		'image' => 'required',
    ];

    protected $perPage = 20;
    protected $table = 'user_profile';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','full_name','city','image'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->hasMany('App\Models\Post');
    }



}
