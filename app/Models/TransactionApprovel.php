<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionApprovel extends Model
{
    use HasFactory;
    protected $table = 'transaction_approvel';
    protected $guarded = [];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function usersForward()
    {
        return $this->belongsTo(User::class, 'users_id_forward', 'id');
    }
}
