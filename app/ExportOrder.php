<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExportOrder extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'customer_code',
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
    protected $primaryKey = 'code';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 25;

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_code', 'code');
    }

    public function details() {
        return $this->hasMany(ExportOrderDetail::class, 'order_code', 'code');
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->details as $detail) {
            $total += $detail->getAmount();
        }
        return $total;
    }
}
