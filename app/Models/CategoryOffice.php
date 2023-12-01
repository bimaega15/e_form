<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOffice extends Model
{
    use HasFactory;
    protected $table = 'category_office';
    protected $guarded = [];

    public function profile()
    {
        return $this->hasMany(Profile::class, 'category_office_id', 'id');
    }
}
