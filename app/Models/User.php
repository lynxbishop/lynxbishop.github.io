<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected static function boot(){
        parent::boot();
        // auto-sets values on creation
        static::creating(function ($query) {
            $query->password = bcrypt('12345678');
        });
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'website'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verified_at',
        'id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function todos(){
        return $this->hasMany('App\Models\Todo','userId');
    }

    public function address(){
        return $this->hasOne('App\Models\Address','user_id');
    }

    public function company(){
        return $this->hasOne('App\Models\Company','user_id');
    }

    public function completed(){
        return $this->hasOne('App\Models\Report','userId');
    }

}
