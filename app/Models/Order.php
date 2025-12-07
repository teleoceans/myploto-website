<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use Billable;
    use SoftDeletes;

    protected $fillable = [
        'service_id',
        'name',
        'phone_number',
        'city',
        'address',
        'expected_date',
        'notes',
        'email',
    ];
}
