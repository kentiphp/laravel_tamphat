<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportOrderDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_code', 'commodity_code', 'unit', 'quantity', 'price',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the primary key ID.
     *
     * @var int
     */
    protected $keyType = 'int';

    public function importOrder() {
        return $this->belongsTo(ImportOrder::class, 'order_code', 'code');
    }

    public function commodity() {
        return $this->belongsTo(Commodity::class, 'commodity_code', 'code');
    }

    public function getAmount() {
        return $this->quantity * $this->price;
    }
}
