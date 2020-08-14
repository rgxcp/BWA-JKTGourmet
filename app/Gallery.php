<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'restaurant_packages_id', 'image'
    ];

    protected $hidden = [
        //
    ];

    public function restaurant_package() {
        return $this->belongsTo(RestaurantPackage::class, 'restaurant_packages_id', 'id');
    }
}
