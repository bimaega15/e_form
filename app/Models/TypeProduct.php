<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    use HasFactory;
    protected $table = 'type_product';
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
