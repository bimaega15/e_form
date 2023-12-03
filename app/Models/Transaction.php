<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $guarded = [];

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function transactionApprovel()
    {
        return $this->hasMany(TransactionApprovel::class, 'transaction_id', 'id');
    }

    public function usersApproval()
    {
        return $this->hasMany(TransactionApprovel::class, 'transaction_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'metode_pembayaran_id', 'id');
    }
}
