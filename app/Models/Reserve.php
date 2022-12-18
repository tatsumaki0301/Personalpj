<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'user_number',
        'datetime'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

}
