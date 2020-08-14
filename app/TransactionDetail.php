<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date_reservation', 'transactions_id', 'username'
    ];

    protected $hidden = [
        //
    ];

    public function transaction() {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }
}
