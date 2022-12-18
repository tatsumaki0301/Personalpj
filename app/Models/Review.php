<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'comment',
        'user_id',
        'shop_id',
        'reserve_id',
        'star_id',
    ];

    public function reserve()
    {
        return $this->belongsTo('App\Models\Reserve');
    }
    public function star()
    {
        return $this->belongsTo('App\Models\Star');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

}
