<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address_1',
        'address_2',
        'postal_code',
        'state',
        'country',
        'tax_identification_number',
    ];
}
