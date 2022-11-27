<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static add(string $f)
 */
class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'qty',
        'order_date_time',
        'product_id'
    ];
}
