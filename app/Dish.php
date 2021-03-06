<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'name',
        'description',
        'img_path',
        'price',
        'visible',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function orders() {
        return $this->belongsToMany('App\Order');
    }
}
