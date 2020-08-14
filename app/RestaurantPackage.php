<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RestaurantPackage extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'reservation_date', 'price', 'about', 'location', 'reservation', 'restaurant_type', 'slug', 'title'
    ];

    protected $hidden = [
        //
    ];

    public function gallery() {
        return $this->hasMany(Gallery::class, 'restaurant_packages_id', 'id');
    }
}
