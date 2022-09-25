<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'area_id' , 
        'genru_id', 
        'shop_content', 
        'image_path'
    ];

    public function getPostImageAttribute($value){
        return asset('storage/'.$value);
    }

    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
    public function genru(){
        return $this->belongsTo('App\Models\Genru');
    }
    public function favorite(){
        return $this->hasMany('App\Models\Favorite');
    }
    public function reserve(){
        return $this->hasMany('App\Models\Reserve');
    }

}
