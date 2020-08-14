<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'restaurant_packages_id', 'users_id', 'additional_price', 'transaction_total', 'transaction_status'
    ];

    protected $hidden = [
        //
    ];

    public function transaction_detail() {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    public function restaurant_package() {
        return $this->belongsTo(RestaurantPackage::class, 'restaurant_packages_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
