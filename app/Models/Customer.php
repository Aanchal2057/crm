<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';

    protected $guarded = [];
    // protected static function booted()
    // {
    //     static::saving(function ($customer) {
    //         $Date = date('Y-m-d', strtotime('+1 year', strtotime($customer->date)));
    //         if ($Date== $customer->expirationdate) {
    //             $customer->expire = true;
    //         } else {
    //             $customer->expire = false;
    //         }
    //     });
    // }
}
