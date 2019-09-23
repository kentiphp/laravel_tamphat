<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExportOrderDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_code', 'commodity_code', 'unit', 'quantity', 'price','profit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function exportOrder() {
        return $this->belongsTo(ExportOrder::class, 'order_code', 'code');
    }

    public function commodity() {
        return $this->belongsTo(Commodity::class, 'commodity_code', 'code');
    }

    public function getAmount() {
        return $this->quantity * $this->price;
    }
}
