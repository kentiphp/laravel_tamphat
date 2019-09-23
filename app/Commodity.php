<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commodity extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name' , 'specifications', 'unit', 'entry_price', 'price_out', 'product_carton', 'note', 'supplier_code','warehouse'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 25;

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
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_code', 'code');
    }

    public function importOrders() {
        return $this->hasMany(ImportOrder::class, 'commodity_code', 'code');
    }

    public function unitToString() {
        $result = '';
        switch ($this->unit) {
            case "box":
                $result = "Hộp";
                break;
            default:
                $result = 'Không Rõ';
                break;
        }
        return $result;
    }
}
