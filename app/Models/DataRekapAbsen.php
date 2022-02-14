<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRekapAbsen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rekapabsen()
    {
        return $this->belongsTo(RekapAbsen::class);
    }
}
