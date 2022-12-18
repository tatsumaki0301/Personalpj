<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Person extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'person';
    protected $table = 'persons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shops(){
        return $this->hasMany('App\Models\Shop');
    }
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
    public function genru(){
        return $this->belongsTo('App\Models\Genru');
    }


}
