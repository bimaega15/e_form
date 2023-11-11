<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStatis extends Model
{
    use HasFactory;
    protected $table = 'data_statis';
    protected $guarded = ['id'];

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }

    public function scopeByJenisreferensiDatastatis($query, $jenis_referensi)
    {
        return $query->where('jenisreferensi_datastatis', $jenis_referensi);
    }
}
