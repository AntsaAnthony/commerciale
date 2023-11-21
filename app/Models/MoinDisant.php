<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Proforma;

class MoinDisant extends Model
{
    use HasFactory;

    public $product;
    public $proformat;
}
