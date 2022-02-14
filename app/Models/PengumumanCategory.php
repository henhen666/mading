<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class);
    }
}
