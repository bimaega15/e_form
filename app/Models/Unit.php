<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    protected $guarded = [];

    public function profile()
    {
        return $this->hasMany(Profile::class, 'unit_id', 'id');
    }
}
