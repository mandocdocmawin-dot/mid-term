<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class CoffeeSupply extends Model
{
    use HasFactory, HasUuids;

    // 1. Sabihin sa Laravel na 'uuid' ang primary key natin
    protected $primaryKey = 'uuid';

    // 2. Sabihin sa Laravel na hindi ito auto-incrementing number (dahil letters and numbers ang UUID)
    public $incrementing = false;

    // 3. Sabihin sa Laravel na string (text) ang data type nito, hindi integer
    protected $keyType = 'string';

    protected $fillable = [
        'coffee_id',
        'name',
        'category',
        'quantity',
        'unit_of_measure',
        'price'
    ];
}
