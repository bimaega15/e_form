<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $table = 'transaction_detail';
    protected $guarded = [];    

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,'transaction_id','id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
