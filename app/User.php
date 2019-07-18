<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages()
    {
        return $this->hasMany('App\Messages');
    }

     /**
     * Returns last users last activity
     *
     */
    public function time_since_last_activity( $option = null)
    {
        $last_activity = Carbon::createFromTimeStamp(strtotime($this->last_activity_at));

        if( $option == 'h')
            return $last_activity->diffForHumans();

        if( $option == 'm')
            return $last_activity->floatDiffInMinutes();

        if( $option == null)
            return $last_activity;
    }
}
